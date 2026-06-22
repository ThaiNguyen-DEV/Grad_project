<?php

namespace App\Services\Rag;

class TourDocument
{
    public static function fromTour(object $tour, array $timelines = []): string
    {
        $description = trim(preg_replace('/\s+/u', ' ', strip_tags((string) ($tour->description ?? ''))));
        $itinerary = collect($timelines)
            ->map(fn ($item) => trim(($item->title ?? '').' '.strip_tags((string) ($item->description ?? ''))))
            ->filter()->implode('. ');

        return implode("\n", array_filter([
            'Tên tour: '.($tour->title ?? ''),
            'Điểm đến: '.($tour->destination ?? ''),
            'Loại tour: '.($tour->domain ?? ''),
            'Thời gian: '.($tour->time ?? ''),
            'Mô tả: '.$description,
            $itinerary ? 'Lịch trình: '.$itinerary : null,
        ]));
    }
}
