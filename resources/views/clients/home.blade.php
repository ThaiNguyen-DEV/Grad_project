@include('clients.blocks.header_home')
@include('clients.blocks.banner_home')

<!--Form Back Drop-->
<div class="form-back-drop"></div>

<!-- Hot Deals Area start -->
<section class="hot-deals-area pt-100 pb-70 rel z-1" style="background-color: #f9f9f9;">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="section-title text-center mb-60" data-aos="fade-up"
                    data-aos-duration="1500" data-aos-offset="50">
                    <h2 class="fw-bold" style="color: var(--primary-color);">Ưu Đãi Đặc Biệt (Hot Deals)</h2>
                    <p class="text-muted fs-5">Những hành trình với mức giá tốt nhất dành riêng cho bạn</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            @foreach ($tours as $tour)
            <div class="col-xxl-3 col-xl-4 col-md-6 mb-4">
                <div class="destination-item bg-white rounded-4 shadow-sm h-100 overflow-hidden d-flex flex-column" data-aos="fade-up" data-aos-duration="1500"
                    data-aos-offset="50" style="transition: all 0.3s;">
                    <div class="image position-relative" style="height: 220px; overflow: hidden;">
                        <span class="badge bg-danger position-absolute top-0 start-0 m-3 z-3" style="font-size: 14px;">HOT</span>
                        <div class="position-absolute bottom-0 start-0 m-3 z-3 text-white fw-bold" style="text-shadow: 1px 1px 3px rgba(0,0,0,0.8);"><i class="fas fa-star text-warning"></i> {{ number_format($tour->rating, 1) }}</div>
                        <!-- <a href="#" class="heart position-absolute top-0 end-0 m-3 z-3 text-white fs-4"><i class="far fa-heart"></i></a> -->
                        <img src="{{ asset('admin/assets/images/gallery-tours/' . $tour->images[0] . '') }}"
                            alt="Destination" class="w-100 h-100 object-fit-cover" style="transition: transform 0.5s;">
                    </div>
                    <div class="content p-4 flex-grow-1 d-flex flex-column">
                        <span class="location d-block text-muted mb-2" style="font-size: 14px;"><i class="fal fa-map-marker-alt text-primary me-2"></i>{{ $tour->destination }}</span>
                        <h5 class="mb-3" style="line-height: 1.4;"><a href="{{ route('tour-detail', ['id' => $tour->tourId]) }}" class="text-dark text-decoration-none">{{ $tour->title }}</a>
                        </h5>
                        <span class="time d-block text-muted mt-auto mb-0" style="font-size: 14px;"><i class="fal fa-clock me-2"></i>{{ $tour->time }}</span>
                    </div>
                    <div class="destination-footer d-flex justify-content-between align-items-center p-4 border-top bg-light mt-auto">
                        <span class="price fw-bold" style="color: var(--primary-color); font-size: 18px;">{{ number_format($tour->priceAdult, 0, ',', '.') }} <small class="text-muted fw-normal fs-6">VND</small></span>
                        <a href="{{ route('tour-detail', ['id' => $tour->tourId]) }}" class="btn btn-outline-primary rounded-pill px-4 py-2 fw-600" style="border-color: var(--primary-color); color: var(--primary-color);">ĐẶT NGAY</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('tours') }}" class="btn rounded-pill px-5 py-3 fw-bold text-white shadow-sm" style="background-color: var(--primary-color);">Xem tất cả ưu đãi <i class="fal fa-arrow-right ms-2"></i></a>
        </div>
    </div>
</section>
<!-- Hot Deals Area end -->


<!-- About Us Area start -->
<section class="about-us-area py-100 rpb-90 rel z-1">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-5 col-lg-6">
                <div class="about-us-content rmb-55" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">
                    <div class="section-title mb-25">
                        <h2>Du lịch với sự tự tin Lý do hàng đầu để chọn công ty chúng tôi</h2>
                    </div>
                    <p>Chúng tôi sẽ nỗ lực hết mình để biến giấc mơ du lịch của bạn thành hiện thực những viên ngọc ẩn
                        và những điểm tham quan không thể bỏ qua</p>
                    <div class="divider counter-text-wrap mt-45 mb-55"><span>Chúng tôi có <span><span
                                    class="count-text plus" data-speed="3000" data-stop="10">0</span>
                                Năm</span> kinh nghiệm</span></div>
                    <div class="row">
                        <div class="col-6">
                            <div class="counter-item counter-text-wrap">
                                <span class="count-text k-plus" data-speed="2000" data-stop="1">0</span>
                                <span class="counter-title">Điểm đến phổ biến</span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="counter-item counter-text-wrap">
                                <span class="count-text m-plus" data-speed="3000" data-stop="90">0</span>
                                <span class="counter-title">Khách hàng hài lòng</span>
                            </div>
                        </div>
                    </div>
                    <a href="destination1.html" class="theme-btn mt-10 style-two">
                        <span data-hover="Khám phá Điểm đến">Khám phá Điểm đến</span>
                        <i class="fal fa-arrow-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-xl-7 col-lg-6" data-aos="fade-right" data-aos-duration="1500" data-aos-offset="50">
                <div class="about-us-image">
                    <div class="shape"><img src="{{ asset('clients/assets/images/about/shape1.png') }}" alt="Shape">
                    </div>
                    <div class="shape"><img src="{{ asset('clients/assets/images/about/shape2.png') }}" alt="Shape">
                    </div>
                    <div class="shape"><img src="{{ asset('clients/assets/images/about/shape3.png') }}"
                            alt="Shape"></div>
                    <div class="shape"><img src="{{ asset('clients/assets/images/about/shape4.png') }}"
                            alt="Shape"></div>
                    <div class="shape"><img src="{{ asset('clients/assets/images/about/shape5.png') }}"
                            alt="Shape"></div>
                    <div class="shape"><img src="{{ asset('clients/assets/images/about/shape6.png') }}"
                            alt="Shape"></div>
                    <div class="shape"><img src="{{ asset('clients/assets/images/about/shape7.png') }}"
                            alt="Shape"></div>
                    <img src="{{ asset('clients/assets/images/about/about.png') }}" alt="About">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About Us Area end -->


<!-- Popular Destinations Area start -->
<section class="popular-destinations-area rel z-1 pb-50">
    <div class="container-fluid px-0">
        <div class="popular-destinations-wrap bg-white">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="section-title text-center mb-50 mt-4" data-aos="fade-up"
                        data-aos-duration="1500" data-aos-offset="50">
                        <h2 class="fw-bold" style="color: var(--primary-color);">Điểm Đến Yêu Thích Trong Nước</h2>
                        <p class="text-muted fs-5">Khám phá các điểm đến được yêu thích nhất cùng LOTUSMILE</p>
                    </div>
                </div>
            </div>
            <div class="container-fluid" style="padding: 0 4%;">
                <div class="row justify-content-center g-4">
                    @foreach ($toursPopular as $tour)
                    <!-- Chia 3 ô 1 hàng đều nhau -->
                    <div class="col-lg-4 col-md-6 mb-4 item">
                        <div class="destination-item position-relative rounded-4 overflow-hidden shadow-sm" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50" style="transition: all 0.3s; background-color: transparent; border: none; padding: 0;">
                            <div class="image" style="height: 360px; margin: 0;">
                                <!-- Loại bỏ hoàn toàn lớp phủ overlay đen -->
                                <img src="{{ asset('admin/assets/images/gallery-tours/' . $tour->images[0]) }}"
                                    alt="Destination" class="w-100 h-100 object-fit-cover" style="transition: transform 0.5s;">
                            </div>
                            <div class="content position-absolute bottom-0 start-0 w-100 p-4 z-3 text-white" style="background: linear-gradient(to top, rgba(0,0,0,0.6) 0%, transparent 100%);">
                                <h4 class="tour-title text-white mb-2" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.8);"><a
                                        href="{{ route('tour-detail', ['id' => $tour->tourId]) }}" class="text-white text-decoration-none">{{ $tour->title }}</a>
                                </h4>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="time fs-6" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.8);"><i class="fal fa-clock me-2"></i>{{ $tour->time }}</span>
                                    <!-- <a href="{{ route('tour-detail', ['id' => $tour->tourId]) }}" class="btn btn-sm btn-light rounded-circle text-secondary shadow" style="width: 35px; height: 35px; line-height: 25px;"><i
                                            class="fas fa-chevron-right"></i>
                                    </a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Popular Destinations Area end -->


<!-- Features Area start -->
<section class="features-area py-80 rel z-1" style="background-color: var(--lighter-color);">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-6">
                <div class="features-content-part mb-55" data-aos="fade-right" data-aos-duration="1500"
                    data-aos-offset="50">
                    <div class="section-title mb-40">
                        <h2 class="fw-bold" style="color: var(--primary-color);">Vì Sao Chọn Chúng Tôi?</h2>
                        <p class="text-muted fs-5">Mạng lưới bán tour số 1 Việt Nam với các sản phẩm độc đáo</p>
                    </div>
                    <div class="features-customer-box bg-white p-4 rounded-4 shadow-sm d-flex align-items-center">
                        <div class="image me-4" style="width: 150px; height: 150px; border-radius: 50%; overflow: hidden;">
                            <img src="{{ asset('clients/assets/images/features/features-box.jpg') }}" alt="Features" class="w-100 h-100 object-fit-cover">
                        </div>
                        <div class="content">
                            <h5 class="fw-bold mb-2">99% Khách hàng hài lòng</h5>
                            <div class="d-flex align-items-center mb-2">
                                <i class="fas fa-star text-warning me-1"></i>
                                <i class="fas fa-star text-warning me-1"></i>
                                <i class="fas fa-star text-warning me-1"></i>
                                <i class="fas fa-star text-warning me-1"></i>
                                <i class="fas fa-star text-warning me-2"></i>
                                <span class="fw-bold">5.0</span>
                            </div>
                            <p class="text-muted mb-0">Với hơn 10 năm kinh nghiệm đồng hành cùng du khách trên mọi nẻo đường.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">
                <style>
                    .custom-feature-card {
                        transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
                        border: 1px solid rgba(0, 0, 0, 0.03);
                        position: relative;
                        overflow: hidden;
                        z-index: 1;
                    }

                    .custom-feature-card::before {
                        content: '';
                        position: absolute;
                        top: 0;
                        left: 0;
                        width: 4px;
                        height: 0;
                        background-color: var(--primary-color);
                        transition: all 0.4s ease;
                        z-index: -1;
                    }

                    .custom-feature-card:hover {
                        transform: translateY(-8px);
                        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.08) !important;
                    }

                    .custom-feature-card:hover::before {
                        height: 100%;
                    }

                    .custom-icon-box {
                        width: 70px;
                        height: 70px;
                        background-color: #f5f7fa;
                        transition: all 0.4s ease;
                    }

                    .custom-feature-card:hover .custom-icon-box {
                        background-color: var(--primary-color);
                        color: white !important;
                        transform: scale(1.1) rotate(5deg);
                    }
                </style>
                <div class="row g-4">
                    <!-- Card 1 -->
                    <div class="col-md-6">
                        <div class="feature-item custom-feature-card bg-white p-4 p-lg-5 rounded-4 shadow-sm h-100 d-flex flex-column">
                            <div class="icon custom-icon-box rounded-circle d-flex align-items-center justify-content-center mb-4 text-primary fs-1">
                                <i class="flaticon-tent"></i>
                            </div>
                            <h5 class="fw-bold mb-3"><a href="{{ route('tours') }}" class="text-dark text-decoration-none">Chất lượng dịch vụ</a></h5>
                            <p class="text-muted mb-0 flex-grow-1" style="font-size: 15px; line-height: 1.6;">Đảm bảo trải nghiệm tuyệt vời nhất với tiêu chuẩn dịch vụ cao cấp và tận tâm.</p>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="col-md-6">
                        <div class="feature-item custom-feature-card bg-white p-4 p-lg-5 rounded-4 shadow-sm h-100 d-flex flex-column">
                            <div class="icon custom-icon-box rounded-circle d-flex align-items-center justify-content-center mb-4 text-primary fs-1">
                                <i class="flaticon-tent"></i>
                            </div>
                            <h5 class="fw-bold mb-3"><a href="{{ route('tours') }}" class="text-dark text-decoration-none">Hướng dẫn viên</a></h5>
                            <p class="text-muted mb-0 flex-grow-1" style="font-size: 15px; line-height: 1.6;">Đội ngũ giàu kinh nghiệm, nhiệt tình và am hiểu sâu sắc văn hóa địa phương.</p>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="col-md-6">
                        <div class="feature-item custom-feature-card bg-white p-4 p-lg-5 rounded-4 shadow-sm h-100 d-flex flex-column">
                            <div class="icon custom-icon-box rounded-circle d-flex align-items-center justify-content-center mb-4 text-primary fs-1">
                                <i class="flaticon-tent"></i>
                            </div>
                            <h5 class="fw-bold mb-3"><a href="{{ route('tours') }}" class="text-dark text-decoration-none">Hỗ trợ 24/7</a></h5>
                            <p class="text-muted mb-0 flex-grow-1" style="font-size: 15px; line-height: 1.6;">Luôn đồng hành, sẵn sàng giải đáp và hỗ trợ mọi vấn đề của khách hàng mọi lúc.</p>
                        </div>
                    </div>

                    <!-- Card 4 -->
                    <div class="col-md-6">
                        <div class="feature-item custom-feature-card bg-white p-4 p-lg-5 rounded-4 shadow-sm h-100 d-flex flex-column">
                            <div class="icon custom-icon-box rounded-circle d-flex align-items-center justify-content-center mb-4 text-primary fs-1">
                                <i class="flaticon-tent"></i>
                            </div>
                            <h5 class="fw-bold mb-3"><a href="{{ route('tours') }}" class="text-dark text-decoration-none">Giá cả hợp lý</a></h5>
                            <p class="text-muted mb-0 flex-grow-1" style="font-size: 15px; line-height: 1.6;">Mức giá vô cùng cạnh tranh cùng hàng loạt chương trình ưu đãi tri ân hấp dẫn.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Features Area end -->

<!-- CTA Area start -->
<section class="cta-area pt-100 rel z-1">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-4 col-md-6" data-aos="zoom-in-down" data-aos-duration="1500" data-aos-offset="50">
                <div class="cta-item"
                    style="background-image: url( {{ asset('clients/assets/images/cta/cta1.jpg') }});">
                    <span class="category">Khám Phá Vẻ Đẹp Văn Hóa Việt</span>
                    <h2>Tìm hiểu những giá trị văn hóa độc đáo của các vùng miền Việt Nam.</h2>
                    <a href="{{ route('tours') }}" class="theme-btn style-two bgc-primary">
                        <span data-hover="Khám phá">Khám phá</span>
                        <i class="fal fa-arrow-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-xl-4 col-md-6" data-aos="zoom-in-down" data-aos-delay="50" data-aos-duration="1500"
                data-aos-offset="50">
                <div class="cta-item"
                    style="background-image: url( {{ asset('clients/assets/images/cta/cta2.jpg') }});">
                    <span class="category">Bãi biển Sea</span>
                    <h2>Bãi trong xanh dạt dào ở Việt Nam</h2>
                    <a href="{{ route('tours') }}" class="theme-btn style-two">
                        <span data-hover="Khám phá">Khám phá</span>
                        <i class="fal fa-arrow-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-xl-4 col-md-6" data-aos="zoom-in-down" data-aos-delay="100" data-aos-duration="1500"
                data-aos-offset="50">
                <div class="cta-item"
                    style="background-image: url( {{ asset('clients/assets/images/cta/cta3.jpg') }});">
                    <span class="category">Thác nước</span>
                    <h2>Thác nước lớn nhất Việt Nam</h2>
                    <a href="{{ route('tours') }}" class="theme-btn style-two bgc-primary">
                        <span data-hover="Khám phá">Khám phá</span>
                        <i class="fal fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- CTA Area end -->


@include('clients.blocks.footer_home')