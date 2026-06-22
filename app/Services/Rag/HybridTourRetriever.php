<?php

namespace App\Services\Rag;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class HybridTourRetriever
{
    public function __construct(
        private CohereEmbeddingService $embeddings,
        private QdrantVectorStore $vectors
    ) {}

    public function retrieve(string $message, int $limit = 4): Collection
    {
        $semantic = $this->semanticRanks($message);
        $lexical = $this->lexicalRanks($message);
        $scores = [];

        foreach ($semantic as $tourId => $rank) {
            $scores[$tourId] = ($scores[$tourId] ?? 0) + 1 / (60 + $rank);
        }
        foreach ($lexical as $tourId => $rank) {
            $scores[$tourId] = ($scores[$tourId] ?? 0) + 1 / (60 + $rank);
        }

        if ($scores === []) {
            return collect();
        }

        arsort($scores);
        $ids = array_slice(array_keys($scores), 0, $limit);
        $tours = DB::table('tbl_tours')
            ->where('availability', 1)
            ->whereIn('tourId', $ids)
            ->get()
            ->keyBy('tourId');

        return collect($ids)->map(fn ($id) => $tours->get($id))->filter()->values();
    }

    private function semanticRanks(string $message): array
    {
        if (! $this->vectors->enabled()) {
            return [];
        }

        try {
            $results = $this->vectors->search($this->embeddings->embedQuery($message));
            $ranks = [];
            foreach ($results as $index => $result) {
                $tourId = data_get($result, 'payload.tour_id', $result['id'] ?? null);
                if ($tourId !== null) {
                    $ranks[(int) $tourId] = $index + 1;
                }
            }

            return $ranks;
        } catch (\Throwable $exception) {
            Log::warning('Semantic tour retrieval unavailable; using SQL fallback.', [
                'error' => $exception->getMessage(),
            ]);

            return [];
        }
    }

    private function lexicalRanks(string $message): array
    {
        $stopWords = ['có', 'không', 'cho', 'tôi', 'mình', 'hỏi', 'về', 'tour', 'du', 'lịch', 'đi', 'đâu', 'nào', 'cái', 'gì', 'khi', 'bao', 'nhiêu', 'như', 'thế'];
        $words = preg_split('/[^\p{L}\p{N}]+/u', mb_strtolower($message), -1, PREG_SPLIT_NO_EMPTY);
        $words = array_values(array_unique(array_filter($words, fn ($word) => mb_strlen($word) > 2 && ! in_array($word, $stopWords, true))));
        if ($words === []) {
            return [];
        }

        $query = DB::table('tbl_tours')->where('availability', 1);
        $query->where(function ($builder) use ($words) {
            foreach ($words as $word) {
                $builder->orWhere('title', 'like', "%{$word}%")
                    ->orWhere('destination', 'like', "%{$word}%")
                    ->orWhere('description', 'like', "%{$word}%")
                    ->orWhere('domain', 'like', "%{$word}%");
            }
        });

        return $query->limit(8)->pluck('tourId')->values()
            ->mapWithKeys(fn ($id, $index) => [(int) $id => $index + 1])->all();
    }
}
