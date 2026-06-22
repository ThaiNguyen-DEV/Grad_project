<?php

namespace App\Services\Rag;

use GuzzleHttp\Handler\StreamHandler;
use Illuminate\Support\Facades\Http;
use RuntimeException;

class CohereEmbeddingService
{
    public function embedQuery(string $text): array
    {
        return $this->embed([$text], 'search_query')[0];
    }

    public function embedDocuments(array $texts): array
    {
        return $this->embed($texts, 'search_document');
    }

    private function embed(array $texts, string $inputType): array
    {
        $apiKey = config('services.cohere.api_key');
        if (! $apiKey) {
            throw new RuntimeException('COHERE_API_KEY chưa được cấu hình.');
        }

        $options = ['verify' => config('services.cohere.ca_bundle') ?: true];
        if (config('services.cohere.stream_handler')) {
            $options['handler'] = new StreamHandler;
        }

        $response = Http::withToken($apiKey)
            ->withOptions($options)
            ->acceptJson()->timeout(30)->retry(2, 300)
            ->post('https://api.cohere.com/v1/embed', [
                'texts' => array_values($texts),
                'model' => config('services.cohere.embed_model'),
                'input_type' => $inputType,
                'truncate' => 'END',
            ]);

        if ($response->failed()) {
            throw new RuntimeException('Cohere Embed API lỗi: '.$response->body());
        }

        $embeddings = $response->json('embeddings');
        if (! is_array($embeddings) || count($embeddings) !== count($texts)) {
            throw new RuntimeException('Cohere Embed API trả về dữ liệu không hợp lệ.');
        }

        return $embeddings;
    }
}
