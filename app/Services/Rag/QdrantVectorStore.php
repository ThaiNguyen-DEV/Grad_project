<?php

namespace App\Services\Rag;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;
use RuntimeException;

class QdrantVectorStore
{
    public function enabled(): bool
    {
        return (bool) config('services.qdrant.enabled');
    }

    public function ensureCollection(bool $recreate = false): void
    {
        if ($recreate) {
            $this->request()->delete($this->collectionPath());
        }

        if ($this->request()->get($this->collectionPath())->successful()) {
            return;
        }

        $response = $this->request()->put($this->collectionPath(), [
            'vectors' => [
                'size' => (int) config('services.qdrant.vector_size'),
                'distance' => 'Cosine',
            ],
        ]);

        if ($response->failed()) {
            throw new RuntimeException('Không thể tạo Qdrant collection: '.$response->body());
        }
    }

    public function upsert(array $points): void
    {
        if ($points === []) {
            return;
        }

        $response = $this->request()->put($this->collectionPath().'/points?wait=true', [
            'points' => array_values($points),
        ]);
        if ($response->failed()) {
            throw new RuntimeException('Không thể lưu vector vào Qdrant: '.$response->body());
        }
    }

    public function search(array $vector, int $limit = 8): array
    {
        if (! $this->enabled()) {
            return [];
        }

        $response = $this->request()->post($this->collectionPath().'/points/search', [
            'vector' => $vector,
            'limit' => $limit,
            'with_payload' => true,
            'score_threshold' => 0.25,
        ]);
        if ($response->failed()) {
            throw new RuntimeException('Qdrant search lỗi: '.$response->body());
        }

        return $response->json('result', []);
    }

    private function request(): PendingRequest
    {
        $request = Http::baseUrl(rtrim(config('services.qdrant.url'), '/'))->acceptJson()->timeout(5);
        if (config('services.qdrant.api_key')) {
            $request = $request->withHeaders(['api-key' => config('services.qdrant.api_key')]);
        }

        return $request;
    }

    private function collectionPath(): string
    {
        return '/collections/'.rawurlencode(config('services.qdrant.collection'));
    }
}
