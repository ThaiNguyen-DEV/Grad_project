@foreach ($tours as $tour)
<div class="col-xl-4 col-md-6 mb-4">
    <div class="destination-item bg-white rounded-4 shadow-sm h-100 overflow-hidden d-flex flex-column"
        data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">

        {{-- Ảnh --}}
        <div class="position-relative" style="height: 200px; overflow: hidden;">

            {{-- Badge Đặc Biệt: chỉ hiện nếu tour có đánh dấu, hoặc bỏ điều kiện nếu muốn luôn hiện --}}
            @if($tour->is_special ?? true)
            <span class="badge position-absolute top-0 start-0 m-3 z-3"
                style="font-size: 12px; background-color: var(--secondary-color); z-index: 10;">
                Đặc Biệt
            </span>
            @endif

            {{-- Rating: chỉ hiện nếu > 0 --}}
            @if($tour->rating > 0)
            <div class="position-absolute bottom-0 start-0 m-3 text-white fw-bold"
                style="text-shadow: 1px 1px 3px rgba(0,0,0,0.8); z-index: 10; font-size: 14px;">
                <i class="fas fa-star text-warning"></i>
                {{ number_format($tour->rating, 1) }}
            </div>
            @endif

            <img src="{{ asset('admin/assets/images/gallery-tours/' . $tour->images[0]) }}"
                alt="{{ $tour->title }}"
                class="w-100 h-100 object-fit-cover"
                style="transition: transform 0.5s;">
        </div>

        {{-- Nội dung --}}
        <div class="content p-3 d-flex flex-column flex-grow-1">

            {{-- Điểm đến --}}
            <p class="text-muted mb-1" style="font-size: 12px;">
                <i class="fal fa-map-marker-alt text-primary me-1"></i>
                {{ $tour->destination }}
            </p>

            {{-- Tên tour — cố định 2 dòng để card đều nhau --}}
            <h6 class="mb-2 flex-grow-1" style="
                line-height: 1.5;
                display: -webkit-box;
                -webkit-line-clamp: 2;
                -webkit-box-orient: vertical;
                overflow: hidden;
                min-height: 3em;
            ">
                <a href="{{ route('tour-detail', ['id' => $tour->tourId]) }}"
                    class="text-dark text-decoration-none">
                    {{ $tour->title }}
                </a>
            </h6>

            {{-- Thời gian & số chỗ --}}
            <ul class="list-unstyled d-flex gap-3 text-muted mb-3" style="font-size: 12px;">
                <li><i class="fal fa-clock me-1 text-primary"></i>{{ $tour->time }}</li>
                <li><i class="fal fa-user me-1 text-primary"></i>{{ $tour->quantity }} chỗ</li>
            </ul>

            {{-- Giá & nút --}}
            <div class="d-flex justify-content-between align-items-center pt-3 border-top mt-auto">
                <span class="fw-bold text-nowrap" style="color: var(--primary-color); font-size: 15px;">
                    {{ number_format($tour->priceAdult, 0, ',', '.') }}
                    <small class="text-muted fw-normal" style="font-size: 12px;">VND</small>
                </span>
                <a href="{{ route('tour-detail', ['id' => $tour->tourId]) }}"
                    class="btn btn-sm btn-outline-primary rounded-pill px-3 fw-semibold text-nowrap"
                    style="font-size: 13px;">
                    Chi Tiết <i class="fal fa-arrow-right ms-1"></i>
                </a>
            </div>

        </div>
    </div>
</div>
@endforeach

<div class="col-lg-12 mt-4">
    <style>
        .pagination-tours .page-link {
            color: var(--primary-color);
            border-radius: 8px;
            margin: 0 4px;
            border: 1px solid #eee;
            font-weight: 600;
            transition: all 0.3s;
        }
        .pagination-tours .page-item.active .page-link {
            background-color: var(--primary-color) !important;
            border-color: var(--primary-color) !important;
            color: white !important;
        }
        .pagination-tours .page-item:not(.active) .page-link:hover {
            background-color: #f8f9fa !important;
            border-color: var(--primary-color) !important;
            color: var(--primary-color) !important;
        }
        .pagination-tours .page-item.disabled .page-link {
            color: #ccc;
            background-color: #f8f9fa;
            border-color: #eee;
        }
    </style>
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