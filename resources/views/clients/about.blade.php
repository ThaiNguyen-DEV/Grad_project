@include('clients.blocks.header')
@include('clients.blocks.banner')


<!-- 1. Our Story Area -->
<section class="about-story-area py-100 rel z-1 bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1500">
                <div class="about-image-part position-relative">
                    <img src="{{ asset('clients/assets/images/about/about-page.jpg') }}" class="img-fluid rounded-4 shadow-lg w-100" style="object-fit: cover; height: 500px;" alt="Về chúng tôi">
                    <div class="experience-badge position-absolute bg-white rounded-3 shadow p-4 text-center" style="bottom: -30px; right: -30px; border-bottom: 4px solid var(--primary-color);">
                        <h2 class="text-primary mb-0 fw-bold">10+</h2>
                        <span class="fw-600 text-muted">Năm Kinh Nghiệm</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 ps-lg-5 mt-5 mt-lg-0" data-aos="fade-left" data-aos-duration="1500">
                <div class="about-content-part">
                    <span class="text-primary fw-bold text-uppercase tracking-wider mb-2 d-block">Câu Chuyện Của Chúng Tôi</span>
                    <h2 class="mb-4 fw-bold" style="font-size: 2.5rem; line-height: 1.2;">Hành trình kết nối những tâm hồn đam mê khám phá</h2>
                    <p class="text-muted mb-4 fs-5">LOTUSMILE ra đời với sứ mệnh mang đến những trải nghiệm du lịch tuyệt vời nhất, nơi mỗi chuyến đi không chỉ là những điểm đến mới, mà là những kỷ niệm khó quên đọng lại mãi trong tim.</p>
                    <p class="text-muted mb-4">Chúng tôi tự hào sở hữu đội ngũ chuyên gia tận tâm, am hiểu sâu sắc văn hóa bản địa, luôn sẵn sàng đồng hành cùng bạn trên mọi nẻo đường. Từ những cung đường phượt đầy hoang dã đến những kỳ nghỉ dưỡng sang trọng, chúng tôi cam kết mang lại sự hài lòng tuyệt đối.</p>

                    <div class="row mt-4">
                        <div class="col-sm-6 mb-3">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-check-circle text-success fs-4 me-3"></i>
                                <span class="fw-600">Đội ngũ chuyên nghiệp</span>
                            </div>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-check-circle text-success fs-4 me-3"></i>
                                <span class="fw-600">Chi phí hợp lý</span>
                            </div>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-check-circle text-success fs-4 me-3"></i>
                                <span class="fw-600">Trải nghiệm độc đáo</span>
                            </div>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-check-circle text-success fs-4 me-3"></i>
                                <span class="fw-600">Hỗ trợ 24/7</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 2. Statistics Banner -->
<section class="statistics-area py-80 bg-light pb-100">
    <div class="container">
        <div class="row justify-content-center text-center">
            <!-- Stat 1 -->
            <div class="col-xl-3 col-md-6 mb-4 mb-xl-0" data-aos="fade-up" data-aos-duration="1500">
                <div class="stat-card bg-white p-4 rounded-4 shadow-sm h-100 position-relative overflow-hidden">
                    <div class="icon-box text-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 70px; height: 70px; background-color: rgba(var(--primary-color-rgb), 0.1);">
                        <i class="fal fa-map-marked-alt fs-2"></i>
                    </div>
                    <h2 class="count-text fw-bold mb-1 text-dark" data-speed="3000" data-stop="1000">1.000+</h2>
                    <span class="fs-6 text-muted fw-bold text-uppercase tracking-wider" style="font-size: 13px;">Điểm đến hấp dẫn</span>
                </div>
            </div>
            <!-- Stat 2 -->
            <div class="col-xl-3 col-md-6 mb-4 mb-xl-0" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1500">
                <div class="stat-card bg-white p-4 rounded-4 shadow-sm h-100 position-relative overflow-hidden">
                    <div class="icon-box text-info rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 70px; height: 70px; background-color: rgba(23, 162, 184, 0.1);">
                        <i class="fal fa-users fs-2"></i>
                    </div>
                    <h2 class="count-text fw-bold mb-1 text-dark" data-speed="3000" data-stop="5000">90%</h2>
                    <span class="fs-6 text-muted fw-bold text-uppercase tracking-wider" style="font-size: 13px;">Khách hàng hài lòng</span>
                </div>
            </div>
            <!-- Stat 3 -->
            <div class="col-xl-3 col-md-6 mb-4 mb-md-0" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1500">
                <div class="stat-card bg-white p-4 rounded-4 shadow-sm h-100 position-relative overflow-hidden">
                    <div class="icon-box text-warning rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 70px; height: 70px; background-color: rgba(255, 193, 7, 0.1);">
                        <i class="fal fa-award fs-2"></i>
                    </div>
                    <h2 class="count-text fw-bold mb-1 text-dark" data-speed="3000" data-stop="25">10</h2>
                    <span class="fs-6 text-muted fw-bold text-uppercase tracking-wider" style="font-size: 13px;">Giải thưởng danh giá</span>
                </div>
            </div>
            <!-- Stat 4 -->
            <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="300" data-aos-duration="1500">
                <div class="stat-card bg-white p-4 rounded-4 shadow-sm h-100 position-relative overflow-hidden">
                    <div class="icon-box text-success rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 70px; height: 70px; background-color: rgba(40, 167, 69, 0.1);">
                        <i class="fal fa-star fs-2"></i>
                    </div>
                    <h2 class="count-text fw-bold mb-1 text-dark">99%</h2>
                    <span class="fs-6 text-muted fw-bold text-uppercase tracking-wider" style="font-size: 13px;">Đánh giá 5 sao</span>
                </div>
            </div>
        </div>
    </div>
    <style>
        .stat-card {
            transition: all 0.3s ease;
            border-bottom: 3px solid transparent;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08) !important;
            border-bottom-color: var(--primary-color);
        }
    </style>
</section>

<!-- 3. Core Values / Why Choose Us -->
<section class="core-values-area py-100 rel z-1">
    <div class="container">
        <div class="section-title text-center mb-60" data-aos="fade-up" data-aos-duration="1500">
            <span class="text-primary fw-bold text-uppercase tracking-wider mb-2 d-block">Giá Trị Cốt Lõi</span>
            <h2 class="fw-bold" style="font-size: 2.5rem;">Vì sao nên chọn LOTUSMILE?</h2>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-duration="1500">
                <div class="value-card bg-white p-5 rounded-4 shadow-sm text-center h-100" style="transition: all 0.3s ease; border-bottom: 4px solid transparent;">
                    <div class="icon-wrapper bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 80px; height: 80px;">
                        <i class="fal fa-shield-check fs-1 text-primary"></i>
                    </div>
                    <h4 class="fw-bold mb-3">An toàn tuyệt đối</h4>
                    <p class="text-muted mb-0">Sự an toàn của bạn luôn được chúng tôi đặt lên hàng đầu trong mọi chuyến đi, với bảo hiểm đầy đủ và quy trình chuẩn mực.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1500">
                <div class="value-card bg-white p-5 rounded-4 shadow-sm text-center h-100" style="transition: all 0.3s ease; border-bottom: 4px solid transparent;">
                    <div class="icon-wrapper bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 80px; height: 80px;">
                        <i class="fal fa-gem fs-1 text-primary"></i>
                    </div>
                    <h4 class="fw-bold mb-3">Chất lượng 5 sao</h4>
                    <p class="text-muted mb-0">Chúng tôi không ngừng nâng cao chất lượng dịch vụ, mang đến những trải nghiệm đẳng cấp và khác biệt.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1500">
                <div class="value-card bg-white p-5 rounded-4 shadow-sm text-center h-100" style="transition: all 0.3s ease; border-bottom: 4px solid transparent;">
                    <div class="icon-wrapper bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 80px; height: 80px;">
                        <i class="fal fa-headset fs-1 text-primary"></i>
                    </div>
                    <h4 class="fw-bold mb-3">Hỗ trợ tận tâm</h4>
                    <p class="text-muted mb-0">Đội ngũ chăm sóc khách hàng hoạt động 24/7, sẵn sàng giải quyết mọi vấn đề để bạn an tâm tận hưởng.</p>
                </div>
            </div>
        </div>
    </div>
    <style>
        .value-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1) !important;
            border-bottom-color: var(--primary-color) !important;
        }
    </style>
</section>

<!-- 4. Our Team -->
<section class="about-team-area pb-100 rel z-1 bg-light pt-100">
    <div class="container">
        <div class="section-title text-center mb-60" data-aos="fade-up" data-aos-duration="1500">
            <span class="text-primary fw-bold text-uppercase tracking-wider mb-2 d-block">Đội Ngũ Chuyên Gia</span>
            <h2 class="fw-bold" style="font-size: 2.5rem;">Những người truyền lửa đam mê</h2>
        </div>
        <div class="row justify-content-center">
            <!-- Team Member 1 -->
            <div class="col-xl-3 col-lg-4 col-sm-6 mb-4">
                <div class="team-card bg-white rounded-4 overflow-hidden shadow-sm position-relative h-100 d-flex flex-column" data-aos="fade-up" data-aos-duration="1500">
                    <div class="team-img position-relative overflow-hidden">
                        <img src="{{ asset('clients/assets/images/team/thai.jpg') }}" class="w-100" style="height: 350px; object-fit: cover;" alt="Guide">
                        <div class="team-social position-absolute d-flex flex-column gap-2 p-3">
                            <a href="#" class="bg-white text-primary rounded-circle d-flex align-items-center justify-content-center shadow" style="width: 40px; height: 40px;"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="bg-white text-primary rounded-circle d-flex align-items-center justify-content-center shadow" style="width: 40px; height: 40px;"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="team-info p-4 text-center flex-grow-1 d-flex flex-column justify-content-center">
                        <h5 class="fw-bold mb-1">Nguyễn Đinh Duy Thái</h5>
                        <span class="text-muted mt-auto" style="font-size: 14px;">CEO & Founder</span>
                    </div>
                </div>
            </div>
            <!-- Team Member 2 -->
            <div class="col-xl-3 col-lg-4 col-sm-6 mb-4">
                <div class="team-card bg-white rounded-4 overflow-hidden shadow-sm position-relative h-100 d-flex flex-column" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1500">
                    <div class="team-img position-relative overflow-hidden">
                        <img src="{{ asset('clients/assets/images/team/thach.jpg') }}" class="w-100" style="height: 350px; object-fit: cover;" alt="Guide">
                        <div class="team-social position-absolute d-flex flex-column gap-2 p-3">
                            <a href="#" class="bg-white text-primary rounded-circle d-flex align-items-center justify-content-center shadow" style="width: 40px; height: 40px;"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="bg-white text-primary rounded-circle d-flex align-items-center justify-content-center shadow" style="width: 40px; height: 40px;"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="team-info p-4 text-center flex-grow-1 d-flex flex-column justify-content-center">
                        <h5 class="fw-bold mb-1">Phan Ngọc Thạch</h5>
                        <span class="text-muted mt-auto" style="font-size: 14px;">Tour Manager</span>
                    </div>
                </div>
            </div>
            <!-- Team Member 3 -->
            <div class="col-xl-3 col-lg-4 col-sm-6 mb-4">
                <div class="team-card bg-white rounded-4 overflow-hidden shadow-sm position-relative h-100 d-flex flex-column" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1500">
                    <div class="team-img position-relative overflow-hidden">
                        <img src="{{ asset('clients/assets/images/team/phong.png') }}" class="w-100" style="height: 350px; object-fit: cover;" alt="Guide">
                        <div class="team-social position-absolute d-flex flex-column gap-2 p-3">
                            <a href="#" class="bg-white text-primary rounded-circle d-flex align-items-center justify-content-center shadow" style="width: 40px; height: 40px;"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="bg-white text-primary rounded-circle d-flex align-items-center justify-content-center shadow" style="width: 40px; height: 40px;"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="team-info p-4 text-center flex-grow-1 d-flex flex-column justify-content-center">
                        <h5 class="fw-bold mb-1">Nguyễn Quang Phong</h5>
                        <span class="text-muted mt-auto" style="font-size: 14px;">Senior Guide</span>
                    </div>
                </div>
            </div>
            <!-- Team Member 4 -->
            <div class="col-xl-3 col-lg-4 col-sm-6 mb-4">
                <div class="team-card bg-white rounded-4 overflow-hidden shadow-sm position-relative h-100 d-flex flex-column" data-aos="fade-up" data-aos-delay="300" data-aos-duration="1500">
                    <div class="team-img position-relative overflow-hidden">
                        <img src="{{ asset('clients/assets/images/team/phuc.jpg') }}" class="w-100" style="height: 350px; object-fit: cover;" alt="Guide">
                        <div class="team-social position-absolute d-flex flex-column gap-2 p-3">
                            <a href="#" class="bg-white text-primary rounded-circle d-flex align-items-center justify-content-center shadow" style="width: 40px; height: 40px;"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="bg-white text-primary rounded-circle d-flex align-items-center justify-content-center shadow" style="width: 40px; height: 40px;"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="team-info p-4 text-center flex-grow-1 d-flex flex-column justify-content-center">
                        <h5 class="fw-bold mb-1">Dương Hiển Minh Phúc</h5>
                        <span class="text-muted mt-auto" style="font-size: 14px;">Customer Support</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .team-card {
            transition: all 0.3s ease;
        }

        .team-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1) !important;
        }

        .team-social {
            top: 10px;
            right: -50px;
            transition: all 0.3s ease;
            opacity: 0;
        }

        .team-card:hover .team-social {
            right: 10px;
            opacity: 1;
        }

        .team-social a {
            transition: all 0.2s ease;
            text-decoration: none;
        }

        .team-social a:hover {
            background-color: var(--primary-color) !important;
            color: white !important;
        }
    </style>
</section>

<!-- 5. CTA Area -->
<section class="cta-area py-100 rel z-1">
    <div class="container">
        <div class="bg-white rounded-4 shadow text-center position-relative overflow-hidden" style="padding: 100px 40px;" data-aos="zoom-in" data-aos-duration="1500">
            <!-- Background Decoration -->
            <div class="position-absolute top-0 start-0 w-100 h-100" style="background: linear-gradient(135deg, rgba(var(--primary-color-rgb), 0.05) 0%, rgba(var(--secondary-color-rgb), 0.05) 100%); z-index: -1;"></div>
            <i class="fal fa-paper-plane text-primary opacity-25 position-absolute" style="font-size: 80px; top: -10px; right: 20px; transform: rotate(15deg);"></i>
            <i class="fal fa-globe-americas text-secondary opacity-25 position-absolute" style="font-size: 100px; bottom: -20px; left: -20px;"></i>

            <h2 class="fw-bold mb-3" style="font-size: 2.5rem;">Bạn đã sẵn sàng cho chuyến đi tiếp theo?</h2>
            <p class="text-muted mb-4 mx-auto fs-5" style="max-width: 600px;">Hãy để LOTUSMILE biến những kỳ nghỉ mơ ước của bạn thành hiện thực với những ưu đãi đặc biệt nhất ngay hôm nay.</p>
            <a href="{{ route('tours') }}" class="btn btn-primary rounded-pill px-5 py-3 mt-3 fw-bold fs-5 text-uppercase tracking-wider shadow" style="background-color: var(--primary-color); border: none;">
                Khám phá Tours ngay <i class="fal fa-arrow-right ms-2"></i>
            </a>
        </div>
    </div>
</section>



@include('clients.blocks.footer')