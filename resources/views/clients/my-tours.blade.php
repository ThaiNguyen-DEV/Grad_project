@include('clients.blocks.header')
@include('clients.blocks.banner')
<!-- Tour List Area start -->
<section class="tour-list-page py-80 bg-light">
    <div class="container-xl px-4 mt-4">
        <div class="row">
            <div class="col-12 mb-4">
                <h3 class="fw-bold text-primary">Tours Của Tôi</h3>
                <p class="text-muted">Quản lý và theo dõi các tour du lịch bạn đã đặt</p>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-10 rmb-75">
                <div class="sidebar-sticky" style="position: sticky; top: 120px;">
                    @if (!$toursPopular->isEmpty())
                        <div class="widget widget-tour bg-white p-4 rounded-4 shadow-sm" data-aos="fade-up" data-aos-duration="1500"
                            data-aos-offset="50">
                            <h5 class="fw-bold mb-4 pb-2 border-bottom">Phổ biến Tours</h5>
                            @foreach ($toursPopular as $tour)
                                <div class="d-flex align-items-center mb-3 pb-3 border-bottom">
                                    <div class="image me-3" style="width: 80px; height: 80px; border-radius: 10px; overflow: hidden; flex-shrink: 0;">
                                        <img src="{{ asset('admin/assets/images/gallery-tours/' . $tour->images[0]) }}"
                                            alt="Tour" class="w-100 h-100 object-fit-cover">
                                    </div>
                                    <div class="content">
                                        <div class="destination-header mb-1">
                                            <span class="location text-muted" style="font-size: 12px;"><i class="fal fa-map-marker-alt me-1"></i>{{ $tour->destination }}</span>
                                        </div>
                                        <h6 class="mb-1" style="line-height: 1.4; font-size: 14px;">
                                            <a href="{{ route('tour-detail', ['id' => $tour->tourId]) }}" class="text-dark text-decoration-none">{{ $tour->title }}</a>
                                        </h6>
                                        <div class="ratting text-warning" style="font-size: 12px;">
                                            <i class="fas fa-star"></i>
                                            <span class="text-muted ms-1">({{ $tour->rating }})</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>

            </div>
            <div class="col-lg-9">
                <div class="bg-white p-4 p-md-5 rounded-4 shadow-sm mb-4">
                    <h5 class="fw-bold mb-4 pb-2 border-bottom text-primary"><i class="fal fa-suitcase me-2"></i>Danh sách Tour đã đặt</h5>
                    
                    @if($myTours->isEmpty())
                        <div class="text-center py-5">
                            <div class="text-muted mb-3"><i class="fal fa-box-open fs-1"></i></div>
                            <h6 class="fw-bold">Bạn chưa đặt tour nào</h6>
                            <p class="text-muted">Hãy khám phá các tour du lịch tuyệt vời của chúng tôi và đặt ngay hôm nay!</p>
                            <a href="{{ route('tours') }}" class="btn btn-primary rounded-pill px-4 mt-2">Khám phá Tours</a>
                        </div>
                    @else
                        <div class="row g-4">
                            @foreach ($myTours as $tour)
                                <div class="col-12" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                                    <div class="card border border-light-subtle rounded-4 overflow-hidden h-100 tour-card-horizontal transition-hover shadow-sm">
                                        <div class="row g-0 h-100">
                                            <div class="col-md-4 position-relative">
                                                @if ($tour->bookingStatus == 'b')
                                                    <span class="badge bg-warning position-absolute top-0 start-0 m-3 px-3 py-2 rounded-pill z-1">Đợi xác nhận</span>
                                                @elseif ($tour->bookingStatus == 'y')
                                                    <span class="badge bg-info position-absolute top-0 start-0 m-3 px-3 py-2 rounded-pill z-1">Sắp khởi hành</span>
                                                @elseif ($tour->bookingStatus == 'f')
                                                    <span class="badge bg-success position-absolute top-0 start-0 m-3 px-3 py-2 rounded-pill z-1">Hoàn thành</span>
                                                @elseif ($tour->bookingStatus == 'c')
                                                    <span class="badge bg-danger position-absolute top-0 start-0 m-3 px-3 py-2 rounded-pill z-1">Đã hủy</span>
                                                @endif

                                                <img src="{{ asset('admin/assets/images/gallery-tours/' . $tour->images[0] . '') }}"
                                                    alt="Tour List" class="w-100 h-100 object-fit-cover" style="min-height: 200px;">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body p-4 d-flex flex-column h-100">
                                                    <div class="d-flex justify-content-between align-items-start mb-2">
                                                        <span class="badge bg-light text-primary mb-2"><i class="fal fa-map-marker-alt me-1"></i>{{ $tour->destination }}</span>
                                                        <div class="ratting text-warning" style="font-size: 14px;">
                                                            @for ($i = 0; $i < 5; $i++)
                                                                @if ($tour->rating && $i < $tour->rating)
                                                                    <i class="fas fa-star"></i>
                                                                @else
                                                                    <i class="far fa-star"></i>
                                                                @endif
                                                            @endfor
                                                        </div>
                                                    </div>
                                                    
                                                    <h5 class="fw-bold mb-3 line-clamp-2">
                                                        <a href="{{ route('tour-booked', ['bookingId' => $tour->bookingId, 'checkoutId' => $tour->checkoutId]) }}" class="text-dark text-decoration-none text-hover-primary">{{ $tour->title }}</a>
                                                    </h5>
                                                    
                                                    <div class="text-muted mb-3 line-clamp-2" style="font-size: 14px; line-height: 1.6;">
                                                        {!! strip_tags($tour->description) !!}
                                                    </div>

                                                    <div class="mt-auto pt-3 border-top d-flex justify-content-between align-items-center">
                                                        <ul class="list-inline mb-0 text-muted" style="font-size: 13px;">
                                                            <li class="list-inline-item me-3"><i class="fal fa-clock text-primary me-1"></i>{{ $tour->time }}</li>
                                                            <li class="list-inline-item"><i class="fal fa-users text-primary me-1"></i> {{ $tour->numAdults + $tour->numChildren }} người</li>
                                                        </ul>
                                                        
                                                        <div class="text-end">
                                                            <span class="d-block text-muted" style="font-size: 12px;">Tổng tiền</span>
                                                            <span class="text-primary fw-bold fs-5">{{ number_format($tour->totalPrice, 0, ',', '.') }} đ</span>
                                                        </div>
                                                    </div>
                                                    
                                                    @if ($tour->bookingStatus == 'f')
                                                        <div class="mt-3 text-end">
                                                            <a href="{{ route('tour-detail', ['id' => $tour->tourId]) }}"
                                                                class="btn {{ $tour->rating ? 'btn-outline-secondary' : 'btn-primary' }} rounded-pill btn-sm px-3 fw-bold">
                                                                @if ($tour->rating)
                                                                    <i class="fas fa-check-circle me-1"></i> Đã đánh giá
                                                                @else
                                                                    <i class="fal fa-star me-1"></i> Đánh giá ngay
                                                                @endif
                                                            </a>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Tour List Area end -->
@include('clients.blocks.footer')
