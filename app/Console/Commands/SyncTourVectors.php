<?php

namespace App\Console\Commands;

use App\Services\Rag\CohereEmbeddingService;
use App\Services\Rag\QdrantVectorStore;
use App\Services\Rag\TourDocument;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class SyncTourVectors extends Command
{
    protected $signature = 'rag:sync-tours {--recreate : Xóa collection cũ trước khi đồng bộ}';

    protected $description = 'Tạo embedding và đồng bộ dữ liệu tour sang Qdrant';

    public function handle(CohereEmbeddingService $embeddings, QdrantVectorStore $vectors): int
    {
        if (! $vectors->enabled()) {
            $this->error('QDRANT_ENABLED đang tắt.');

            return self::FAILURE;
        }

        $vectors->ensureCollection((bool) $this->option('recreate'));
        $count = 0;
        DB::table('tbl_tours')->where('availability', 1)->orderBy('tourId')->chunk(64, function ($tours) use ($embeddings, $vectors, &$count) {
            $tourIds = $tours->pluck('tourId');
            $timelines = DB::table('tbl_timeline')->whereIn('tourId', $tourIds)->get()->groupBy('tourId');
            $documents = $tours->map(fn ($tour) => TourDocument::fromTour($tour, $timelines->get($tour->tourId, collect())->all()))->all();
            $documentVectors = $embeddings->embedDocuments($documents);
            $points = [];

            foreach ($tours->values() as $index => $tour) {
                $points[] = [
                    'id' => (int) $tour->tourId,
                    'vector' => $documentVectors[$index],
                    'payload' => [
                        'tour_id' => (int) $tour->tourId,
                        'title' => $tour->title,
                        'destination' => $tour->destination,
                    ],
                ];
            }

            $vectors->upsert($points);
            $count += count($points);
            $this->info("Đã đồng bộ {$count} tour...");
        });

        $this->info("Hoàn tất: {$count} tour đã có vector.");

        return self::SUCCESS;
    }
}
