@include('clients.blocks.header')
@include('clients.blocks.banner')
<!-- Tour Grid Area start -->
<style>
    .search-page-btn.theme-btn:hover,
    .search-page-btn.theme-btn::before,
    .search-page-btn.theme-btn::after {
        background-color: var(--primary-color) !important;
        border-color: var(--primary-color) !important;
    }

    /* Fix ảnh đồng nhất kích thước */
    .destination-item .image {
        width: 100%;
        height: 220px;
        overflow: hidden;
        position: relative;
        background-color: #f0f0f0;
    }

    .destination-item .image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        display: block;
        transition: transform 0.4s ease;
    }

    .destination-item:hover .image img {
        transform: scale(1.05);
    }
</style>
<section class="tour-grid-page py-100 rel z-2">
    <div class="container">
        <div class="row">
            @if ($tours->isEmpty())
            <h4 class="alert alert-danger">Không có tour nào liên quan đến tìm kiếm của bạn. Thử tìm kiếm với từ khóa khác nhé!</h4>
            @else
            @foreach ($tours as $tour)
            <div class="col-xl-4 col-md-6" style="margin-bottom: 30px">
                <div class="destination-item tour-grid style-three bgc-lighter equal-block-fix" data-aos="fade-up"
                    data-aos-duration="1500" data-aos-offset="50">
                    <div class="image">
                        @if (count($tour->images) > 0)
                        <img src="{{ asset('admin/assets/images/gallery-tours/' . $tour->images[0]) }}"
                            alt="{{ $tour->title }}" loading="lazy">
                        @else
                        <img src="{{ asset('admin/assets/images/no-image.jpg') }}" alt="No Image Available" loading="lazy">
                        @endif
                    </div>
                    <div class="content equal-content-fix">
                        <div class="destination-header">
                            <span class="location"><i class="fal fa-map-marker-alt"></i>
                                {{ $tour->destination }}</span>
                            <div class="ratting">
                                @for ($i = 0; $i < 5; $i++)
                                    @if ($tour->rating && $i < $tour->rating)
                                        <i class="fas fa-star"></i>
                                        @else
                                        <i class="far fa-star"></i>
                                        @endif
                                        @endfor
                            </div>
                        </div>
                        <h5><a
                                href="{{ route('tour-detail', ['id' => $tour->tourId]) }}">{{ $tour->title }}</a>
                        </h5>
                        <ul class="blog-meta">
                            <li><i class="far fa-clock"></i>{{ $tour->time }}</li>
                            <li><i class="far fa-user"></i>{{ $tour->quantity }}</li>
                        </ul>
                        <div class="destination-footer">
                            <span
                                class="price"><span>{{ number_format($tour->priceAdult, 0, ',', '.') }}</span>
                                VND / người</span>
                            <a href="{{ route('tour-detail', ['id' => $tour->tourId]) }}"
                                class="theme-btn style-two style-three search-page-btn">
                                <span data-hover="Đặt ngay">Đặt ngay</span>
                                <i class="fal fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @endif

        </div>
    </div>
</section>
<!-- Tour Grid Area end -->

@include('clients.blocks.new_letter')
@include('clients.blocks.footer')