@foreach ($tours as $tour)
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="destination-item bg-white rounded-4 shadow-sm h-100 overflow-hidden" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50" style="transition: all 0.3s;">
            <div class="image position-relative" style="height: 200px; overflow: hidden;">
                <span class="badge position-absolute top-0 start-0 m-3 z-3" style="font-size: 13px; background-color: var(--secondary-color);">Đặc Biệt</span>
                <a href="#" class="heart position-absolute top-0 end-0 m-3 z-3 text-white fs-4"><i class="far fa-heart"></i></a>
                <img src="{{ asset('admin/assets/images/gallery-tours/' . $tour->images[0] . '') }}" alt="Tour List" class="w-100 h-100 object-fit-cover" style="transition: transform 0.5s;">
            </div>
            <div class="content p-4">
                <div class="destination-header d-flex justify-content-between align-items-center mb-2">
                    <span class="location text-muted" style="font-size: 13px;"><i class="fal fa-map-marker-alt text-primary me-2"></i>{{ $tour->destination }}</span>
                    <div class="ratting text-warning" style="font-size: 12px;">
                        @for ($i = 0; $i < 5; $i++)
                            @if ($tour->rating && $i < $tour->rating)
                                <i class="fas fa-star"></i>
                            @else
                                <i class="far fa-star"></i>
                            @endif
                        @endfor
                    </div>
                </div>
                <h6 class="mb-3" style="min-height: 40px; line-height: 1.4;"><a href="{{ route('tour-detail', ['id' => $tour->tourId]) }}" class="text-dark text-decoration-none">{{ $tour->title }}</a></h6>
                <ul class="blog-meta d-flex list-unstyled mb-3 text-muted" style="font-size: 13px; gap: 15px;">
                    <li><i class="fal fa-clock me-1 text-primary"></i> {{ $tour->time }}</li>
                    <li><i class="fal fa-user me-1 text-primary"></i> {{ $tour->quantity }} chỗ</li>
                </ul>
                <div class="destination-footer d-flex justify-content-between align-items-center pt-3 border-top">
                    <span class="price fw-bold" style="color: var(--secondary-color); font-size: 16px;">{{ number_format($tour->priceAdult, 0, ',', '.') }} <small class="text-muted fw-normal fs-6">VND</small></span>
                    <a href="{{ route('tour-detail', ['id' => $tour->tourId]) }}" class="btn btn-sm btn-outline-primary rounded-pill px-3 fw-600" style="border-color: var(--primary-color); color: var(--primary-color);">Chi Tiết <i class="fal fa-arrow-right ms-1"></i></a>
                </div>
            </div>
        </div>
    </div>
@endforeach

<div class="col-lg-12">
    <ul class="pagination justify-content-center pt-15 flex-wrap pagination-tours" data-aos="fade-up"
        data-aos-duration="1500" data-aos-offset="50">
        <!-- Previous Page Link -->
        @if ($tours->onFirstPage())
            <li class="page-item disabled">
                <span class="page-link"><i class="far fa-chevron-left"></i></span>
            </li>
        @else
            <li class="page-item">
                <a class="page-link" href="{{ $tours->previousPageUrl() }}"><i class="far fa-chevron-left"></i></a>
            </li>
        @endif

        <!-- Page Numbers -->
        @for ($i = 1; $i <= $tours->lastPage(); $i++)
            <li class="page-item @if ($i == $tours->currentPage()) active @endif">
                <a class="page-link" href="{{ $tours->url($i) }}">{{ $i }}</a>
            </li>
        @endfor

        <!-- Next Page Link -->
        @if ($tours->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{ $tours->nextPageUrl() }}"><i class="far fa-chevron-right"></i></a>
            </li>
        @else
            <li class="page-item disabled">
                <span class="page-link"><i class="far fa-chevron-right"></i></span>
            </li>
        @endif
    </ul>
</div>
