@include('clients.blocks.header')
<section class="page-banner-two rel z-1">
    <div class="container-fluid">
        <hr class="mt-0">
        <div class="container">
            <div class="banner-inner pt-15 pb-25">
                <h2 class="page-title mb-10 aos-init aos-animate" data-aos="fade-left" data-aos-duration="1500"
                    data-aos-offset="50">{{ $tourDetail->destination }}</h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center mb-20 aos-init aos-animate" data-aos="fade-right"
                        data-aos-delay="200" data-aos-duration="1500" data-aos-offset="50">
                        <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
                        <li class="breadcrumb-item active">{{ $title }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- Tour Gallery start -->
<div class="tour-gallery py-4 bg-light gallery">
    <div class="container">
        <div class="row g-2 rounded-4 overflow-hidden shadow-sm" style="height: 400px;">
            <div class="col-md-6 h-100">
                <div class="gallery-item h-100 position-relative">
                    <a href="{{ asset('admin/assets/images/gallery-tours/' . $tourDetail->images[0]) }}" class="d-block w-100 h-100">
                        <img src="{{ asset('admin/assets/images/gallery-tours/' . $tourDetail->images[0]) }}"
                            alt="Destination" class="w-100 h-100 object-fit-cover" style="transition: transform 0.5s;">
                        <!-- <div class="overlay" style="background: linear-gradient(to top, rgba(0,0,0,0.5), rgba(0,0,0,0)); position: absolute; top:0; left:0; right:0; bottom:0;"></div> -->
                    </a>
                </div>
            </div>
            <div class="col-md-6 h-100">
                <div class="row g-2 h-100">
                    <div class="col-6 h-50">
                        <div class="gallery-item h-100">
                            <a href="{{ asset('admin/assets/images/gallery-tours/' . $tourDetail->images[1]) }}" class="d-block w-100 h-100">
                                <img src="{{ asset('admin/assets/images/gallery-tours/' . $tourDetail->images[1]) }}"
                                    alt="Destination" class="w-100 h-100 object-fit-cover">
                            </a>
                        </div>
                    </div>
                    <div class="col-6 h-50">
                        <div class="gallery-item h-100">
                            <a href="{{ asset('admin/assets/images/gallery-tours/' . $tourDetail->images[2]) }}" class="d-block w-100 h-100">
                                <img src="{{ asset('admin/assets/images/gallery-tours/' . $tourDetail->images[2]) }}"
                                    alt="Destination" class="w-100 h-100 object-fit-cover">
                            </a>
                        </div>
                    </div>
                    <div class="col-6 h-50">
                        <div class="gallery-item h-100">
                            <a href="{{ asset('admin/assets/images/gallery-tours/' . $tourDetail->images[3]) }}" class="d-block w-100 h-100">
                                <img src="{{ asset('admin/assets/images/gallery-tours/' . $tourDetail->images[3]) }}"
                                    alt="Destination" class="w-100 h-100 object-fit-cover">
                            </a>
                        </div>
                    </div>
                    <div class="col-6 h-50">
                        <div class="gallery-item h-100 position-relative">
                            <a href="{{ asset('admin/assets/images/gallery-tours/' . $tourDetail->images[4]) }}" class="d-block w-100 h-100">
                                <img src="{{ asset('admin/assets/images/gallery-tours/' . $tourDetail->images[4]) }}"
                                    alt="Destination" class="w-100 h-100 object-fit-cover">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Tour Gallery End -->


<!-- Tour Header Area start -->
<section class="tour-header-area pt-50 pb-30 bg-white border-bottom">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-xl-8 col-lg-7">
                <div class="tour-header-content" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                    <div class="d-flex align-items-center mb-2">
                        <span class="badge bg-primary me-2 px-3 py-2 rounded-pill"><i class="fal fa-map-marker-alt me-1"></i> {{ $tourDetail->destination }}</span>
                        <div class="ratting text-warning">
                            @for ($i = 0; $i < 5; $i++)
                                @if ($avgStar && $i < $avgStar)
                                <i class="fas fa-star"></i>
                                @else
                                <i class="far fa-star"></i>
                                @endif
                                @endfor
                                <span class="text-muted ms-1 fs-6">({{ $avgStar ? number_format($avgStar, 1) : 0 }} sao)</span>
                        </div>
                    </div>
                    <h2 class="fw-bold mb-0 text-dark">{{ $tourDetail->title }}</h2>
                </div>
            </div>
            <div class="col-xl-4 col-lg-5 text-lg-end mt-4 mt-lg-0" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                <div class="tour-header-social d-flex justify-content-lg-end gap-2">
                    <button class="btn btn-outline-secondary rounded-pill px-4"><i class="far fa-share-alt me-2"></i>Chia sẻ</button>
                    <button class="btn btn-outline-danger rounded-pill px-4"><i class="far fa-heart me-2"></i>Yêu thích</button>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Tour Header Area end -->


<!-- Tour Details Area start -->
<section class="tour-details-page py-80 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="tour-details-content bg-white p-4 p-md-5 rounded-4 shadow-sm mb-4">
                    <h4 class="fw-bold mb-4 pb-2 border-bottom text-primary">Tổng quan hành trình</h4>
                    <div class="text-muted" style="line-height: 1.8;">
                        <p>{!! $tourDetail->description !!}</p>
                    </div>

                    <div class="row pt-4 pb-2">
                        <div class="col-md-6 mb-4 mb-md-0">
                            <div class="tour-include bg-light p-4 rounded-4 h-100">
                                <h5 class="fw-bold text-success mb-3"><i class="fal fa-check-circle me-2"></i>Bao gồm</h5>
                                <ul class="list-unstyled mb-0 text-muted" style="line-height: 2;">
                                    <li><i class="fas fa-check text-success me-2" style="font-size: 12px;"></i> Dịch vụ đón và trả khách</li>
                                    <li><i class="fas fa-check text-success me-2" style="font-size: 12px;"></i> 1 bữa ăn mỗi ngày</li>
                                    <li><i class="fas fa-check text-success me-2" style="font-size: 12px;"></i> Tham quan các địa điểm nổi bật</li>
                                    <li><i class="fas fa-check text-success me-2" style="font-size: 12px;"></i> Nước đóng chai trên xe buýt</li>
                                    <li><i class="fas fa-check text-success me-2" style="font-size: 12px;"></i> Di chuyển Xe du lịch hạng sang</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="tour-exclude bg-light p-4 rounded-4 h-100">
                                <h5 class="fw-bold text-danger mb-3"><i class="fal fa-times-circle me-2"></i>Không bao gồm</h5>
                                <ul class="list-unstyled mb-0 text-muted" style="line-height: 2;">
                                    <li><i class="fas fa-times text-danger me-2" style="font-size: 12px;"></i> Tiền TIP cho HDV</li>
                                    <li><i class="fas fa-times text-danger me-2" style="font-size: 12px;"></i> Chi phí cá nhân</li>
                                    <li><i class="fas fa-times text-danger me-2" style="font-size: 12px;"></i> Dịch vụ bổ sung ngoài chương trình</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tour-timeline bg-white p-4 p-md-5 rounded-4 shadow-sm mb-4">
                    <h4 class="fw-bold mb-4 pb-2 border-bottom text-primary">Chương trình Tour</h4>
                    <div class="accordion accordion-flush" id="faq-accordion-two">
                        @php $day = 1; @endphp
                        @foreach ($tourDetail->timeline as $index => $timeline)
                        <div class="accordion-item mb-3 border rounded-3 overflow-hidden">
                            <h5 class="accordion-header">
                                <button class="accordion-button {{ $index == 0 ? '' : 'collapsed' }} fw-bold bg-light" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo{{ $timeline->timeLineId }}">
                                    <span class="badge bg-primary me-3">Ngày {{ $day++ }}</span> {{ $timeline->title }}
                                </button>
                            </h5>
                            <div id="collapseTwo{{ $timeline->timeLineId }}" class="accordion-collapse collapse {{ $index == 0 ? 'show' : '' }}"
                                data-bs-parent="#faq-accordion-two">
                                <div class="accordion-body text-muted" style="line-height: 1.8;">
                                    <p>{!! $timeline->description !!}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="tour-reviews bg-white p-4 p-md-5 rounded-4 shadow-sm mb-4">
                    <h4 class="fw-bold mb-4 pb-2 border-bottom text-primary">Đánh giá từ khách hàng</h4>
                    <div id="partials_reviews">
                        @include('clients.partials.reviews')
                    </div>

                    <div class="{{ $checkDisplay }} mt-5 pt-4 border-top">
                        <h5 class="fw-bold mb-3">Viết đánh giá của bạn</h5>
                        <form id="comment-form" class="comment-form bg-light p-4 rounded-3"
                            name="review-form" action="{{ route('reviews') }}" method="post" data-aos="fade-up"
                            data-aos-duration="1500" data-aos-offset="50">
                            @csrf
                            <div class="comment-review-wrap mb-4">
                                <span class="fw-bold d-block mb-2">Chất lượng:</span>
                                <div class="ratting text-warning fs-5" id="rating-stars" style="cursor: pointer;">
                                    <i class="far fa-star" data-value="1"></i>
                                    <i class="far fa-star" data-value="2"></i>
                                    <i class="far fa-star" data-value="3"></i>
                                    <i class="far fa-star" data-value="4"></i>
                                    <i class="far fa-star" data-value="5"></i>
                                </div>
                            </div>

                            <div class="row g-3">
                                <div class="col-12">
                                    <div class="form-group mb-3">
                                        <label for="message" class="fw-bold mb-2">Chia sẻ trải nghiệm của bạn</label>
                                        <textarea name="message" id="message" class="form-control rounded-3" rows="4" placeholder="Nội dung đánh giá..." required=""></textarea>
                                    </div>
                                </div>
                                <div class="col-12 text-end">
                                    <button type="submit" class="btn btn-primary rounded-pill px-5 fw-bold" id="submit-reviews"
                                        data-url-checkBooking="{{ route('checkBooking') }}"
                                        data-tourId-reviews="{{ $tourDetail->tourId }}">
                                        Gửi Đánh Giá <i class="fal fa-paper-plane ms-2"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 mt-5 mt-lg-0">
                <div class="sidebar-sticky" style="position: sticky; top: 120px;">
                    @php $isTourExpired = \Carbon\Carbon::today()->gt(\Carbon\Carbon::parse($tourDetail->startDate)); @endphp
                    <div class="widget widget-booking bg-white p-4 rounded-4 shadow-sm mb-4 border-top border-4 {{ $isTourExpired ? 'border-danger' : 'border-primary' }}">
                        <h4 class="fw-bold mb-4 text-center">{{ $isTourExpired ? 'Tour đã kết thúc' : 'Đặt Tour Ngay' }}</h4>
                        <div class="price-tag text-center mb-4">
                            <span class="d-block text-muted fs-6 mb-1">Giá chỉ từ</span>
                            <h3 class="{{ $isTourExpired ? 'text-muted' : 'text-primary' }} fw-bold mb-0">{{ number_format($tourDetail->priceAdult, 0, ',', '.') }} <span class="fs-6 text-muted fw-normal">VND</span></h3>
                        </div>

                        <div class="bg-light p-3 rounded-3 mb-4">
                            <div class="row g-3">
                                <div class="col-6 border-end">
                                    <small class="text-muted d-block fw-bold mb-1">Khởi hành</small>
                                    <span class="fw-600 text-dark">{{ date('d/m/Y', strtotime($tourDetail->startDate)) }}</span>
                                </div>
                                <div class="col-6 pl-3">
                                    <small class="text-muted d-block fw-bold mb-1">Kết thúc</small>
                                    <span class="fw-600 text-dark">{{ date('d/m/Y', strtotime($tourDetail->endDate)) }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="time-duration mb-4 text-center">
                            <span class="badge bg-secondary-subtle text-secondary px-3 py-2 rounded-pill fs-6"><i class="fal fa-clock me-2"></i>{{ $tourDetail->time }}</span>
                        </div>

                        <div class="ticket-types mb-4">
                            <h6 class="fw-bold mb-3 border-bottom pb-2">Bảng Giá</h6>
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="text-dark">Người lớn</span>
                                <span class="fw-bold">{{ number_format($tourDetail->priceAdult, 0, ',', '.') }} đ</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-dark">Trẻ em</span>
                                <span class="fw-bold">{{ number_format($tourDetail->priceChild, 0, ',', '.') }} đ</span>
                            </div>
                        </div>

                        @if ($isTourExpired)
                            <div class="alert alert-danger text-center rounded-pill py-3 fw-bold mb-3" role="alert">
                                <i class="fal fa-calendar-times me-2"></i> Tour này đã kết thúc
                            </div>
                            <div class="text-center">
                                <a href="{{ route('contact') }}" class="text-muted text-decoration-none" style="font-size: 14px;"><i class="fal fa-info-circle me-1"></i> Liên hệ để xem tour khác</a>
                            </div>
                        @else
                            <form action="{{ route('booking', ['id' => $tourDetail->tourId]) }}" method="POST">
                                @csrf
                                <input type="hidden" name="startdate" value="{{ $tourDetail->startDate }}">
                                <input type="hidden" name="enddate" value="{{ $tourDetail->endDate }}">
                                <input type="hidden" name="time" value="{{ $tourDetail->time }}">
                                <button type="submit" class="btn btn-primary w-100 rounded-pill py-3 fw-bold shadow-sm mb-3 text-uppercase fs-6">
                                    Đặt Chỗ Ngay <i class="fal fa-arrow-right ms-2"></i>
                                </button>
                                <div class="text-center">
                                    <a href="{{ route('contact') }}" class="text-muted text-decoration-none" style="font-size: 14px;"><i class="fal fa-info-circle me-1"></i> Cần tư vấn thêm? Liên hệ</a>
                                </div>
                            </form>
                        @endif
                    </div>

                    @if (!empty($tourRecommendations))
                    <div class="widget widget-tour bg-white p-4 rounded-4 shadow-sm">
                        <h5 class="fw-bold mb-4 pb-2 border-bottom">Có Thể Bạn Quan Tâm</h5>
                        @foreach ($tourRecommendations as $tour)
                        <div class="d-flex align-items-center mb-3 pb-3 border-bottom">
                            <div class="image me-3" style="width: 80px; height: 80px; border-radius: 10px; overflow: hidden; flex-shrink: 0;">
                                <img src="{{ asset('admin/assets/images/gallery-tours/' . $tour->images[0]) }}"
                                    alt="Tour" class="w-100 h-100 object-fit-cover">
                            </div>
                            <div class="content">
                                <h6 class="mb-1" style="line-height: 1.4; font-size: 14px;">
                                    <a href="{{ route('tour-detail', ['id' => $tour->tourId]) }}" class="text-dark text-decoration-none">{{ $tour->title }}</a>
                                </h6>
                                <span class="text-primary fw-bold" style="font-size: 14px;">{{ number_format($tour->priceAdult, 0, ',', '.') }} đ</span>
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
<!-- Tour Details Area end -->

@include('clients.blocks.new_letter')
@include('clients.blocks.footer')