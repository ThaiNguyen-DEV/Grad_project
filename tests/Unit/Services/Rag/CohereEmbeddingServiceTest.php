<?php

namespace Tests\Unit\Services\Rag;

use App\Services\Rag\CohereEmbeddingService;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class CohereEmbeddingServiceTest extends TestCase
{
    public function test_it_uses_the_correct_input_types_for_query_and_documents(): void
    {
        config()->set('services.cohere.api_key', 'test-key');
        config()->set('services.cohere.embed_model', 'embed-multilingual-v3.0');
        config()->set('services.cohere.stream_handler', false);
        Http::fake([
            'api.cohere.com/*' => Http::response(['embeddings' => [[0.1, 0.2]]]),
        ]);

        $service = app(CohereEmbeddingService::class);
        $this->assertSame([0.1, 0.2], $service->embedQuery('tour biển'));
        $this->assertSame([[0.1, 0.2]], $service->embedDocuments(['Tour Phú Quốc']));

        Http::assertSentCount(2);
        Http::assertSent(fn ($request) => $request['input_type'] === 'search_query');
        Http::assertSent(fn ($request) => $request['input_type'] === 'search_document');
    }
}
