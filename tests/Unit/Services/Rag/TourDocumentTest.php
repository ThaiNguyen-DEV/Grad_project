<?php

namespace Tests\Unit\Services\Rag;

use App\Services\Rag\TourDocument;
use PHPUnit\Framework\TestCase;

class TourDocumentTest extends TestCase
{
    public function test_it_builds_clean_semantic_content_from_a_tour(): void
    {
        $tour = (object) [
            'title' => 'Tour Phú Quốc',
            'destination' => 'Phú Quốc',
            'domain' => 'Trong nước',
            'time' => '3 ngày 2 đêm',
            'description' => '<p>Nghỉ dưỡng   bên biển</p>',
        ];
        $timeline = [(object) ['title' => 'Ngày 1', 'description' => '<b>Tham quan đảo</b>']];

        $document = TourDocument::fromTour($tour, $timeline);

        $this->assertStringContainsString('Tour Phú Quốc', $document);
        $this->assertStringContainsString('Nghỉ dưỡng bên biển', $document);
        $this->assertStringContainsString('Ngày 1 Tham quan đảo', $document);
        $this->assertStringNotContainsString('<p>', $document);
    }
}
