<!-- footer area start -->
<footer class="main-footer bg-white border-top rel z-1 pt-60">
    <div class="container">
        <div class="row align-items-center mb-5 pb-4 border-bottom">
            <div class="col-lg-6 mb-4 mb-lg-0" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                <div class="d-flex align-items-center">
                    <img src="{{ asset('clients/assets/images/logos/logo.png') }}" alt="Logo" style="max-height: 150px; margin-right: 20px;">
                    <div>
                        <h4 class="mb-1" style="color: var(--primary-color);">LOTUSMILE - Nâng Tầm Giá Trị Cuộc Sống</h4>
                        <p class="mb-0 text-muted">Hành trình trọn vẹn, trải nghiệm đỉnh cao</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="50" data-aos-duration="1500" data-aos-offset="50">
                <form class="newsletter-form d-flex align-items-center" action="#" style="max-width: 500px; margin-left: auto;">
                    <div class="input-group bg-white rounded-pill overflow-hidden" style="border: 1px solid var(--border-color); box-shadow: 0 4px 15px rgba(0,0,0,0.05);">
                        <span class="input-group-text bg-transparent border-0 pe-2 ps-4"><i class="fas fa-envelope text-muted"></i></span>
                        <input type="email" class="form-control border-0 ps-1 shadow-none" placeholder="Nhập email nhận ưu đãi..." required style="background: transparent; min-height: 50px;">
                        <button type="submit" class="btn px-4 fw-bold rounded-pill m-1" style="background-color: var(--primary-color); color: white; transition: 0.3s;">Đăng ký</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="widget-area pt-20 pb-20">
            <div class="row row-cols-xl-5 row-cols-lg-4 row-cols-md-3 row-cols-2">
                <div class="col col-small" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                    <div class="footer-widget footer-links">
                        <div class="footer-title">
                            <h5 class="fw-bold" style="color: var(--heading-color);">Dịch vụ</h5>
                        </div>
                        <ul class="list-style-three text-muted">
                            <li><a href="{{ route('team') }}" class="text-muted">Hướng dẫn viên</a></li>
                            <li><a href="{{ route('tours') }}" class="text-muted">Đặt tour</a></li>
                            <li><a href="{{ route('tours') }}" class="text-muted">Khuyến mãi</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col col-small" data-aos="fade-up" data-aos-delay="50" data-aos-duration="1500"
                    data-aos-offset="50">
                    <div class="footer-widget footer-links">
                        <div class="footer-title">
                            <h5 class="fw-bold" style="color: var(--heading-color);">Công ty</h5>
                        </div>
                        <ul class="list-style-three text-muted">
                            <li><a href="{{ route('about') }}" class="text-muted">Về chúng tôi</a></li>
                            <li><a href="{{ route('contact') }}" class="text-muted">Tuyển dụng</a></li>
                            <li><a href="{{ route('contact') }}" class="text-muted">Liên hệ</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col col-small" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1500"
                    data-aos-offset="50">
                    <div class="footer-widget footer-links">
                        <div class="footer-title">
                            <h5 class="fw-bold" style="color: var(--heading-color);">Điểm đến</h5>
                        </div>
                        <ul class="list-style-three text-muted">
                            <li><a href="{{ route('destination') }}" class="text-muted">Miền Bắc</a></li>
                            <li><a href="{{ route('destination') }}" class="text-muted">Miền Trung</a></li>
                            <li><a href="{{ route('destination') }}" class="text-muted">Miền Nam</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col col-small" data-aos="fade-up" data-aos-delay="150" data-aos-duration="1500"
                    data-aos-offset="50">
                    <div class="footer-widget footer-links">
                        <div class="footer-title">
                            <h5 class="fw-bold" style="color: var(--heading-color);">Chính sách</h5>
                        </div>
                        <ul class="list-style-three text-muted">
                            <li><a href="{{ route('about') }}" class="text-muted">Điều khoản sử dụng</a></li>
                            <li><a href="{{ route('about') }}" class="text-muted">Chính sách bảo mật</a></li>
                            <li><a href="{{ route('about') }}" class="text-muted">Quy định thanh toán</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col col-md-6 col-10 col-small" data-aos="fade-up" data-aos-delay="200"
                    data-aos-duration="1500" data-aos-offset="50">
                    <div class="footer-widget footer-contact">
                        <div class="footer-title">
                            <h5 class="fw-bold" style="color: var(--heading-color);">Liên hệ</h5>
                        </div>
                        <ul class="list-style-one text-muted">
                            <li><i class="fal fa-map-marker-alt text-primary"></i>166 Hà Bồng, Hòa Xuân, Đà Nẵng</li>
                            <li><i class="fal fa-envelope text-primary"></i> <a href="mailto:contact@lotusmile.com" class="text-muted">contact@lotusmile.com</a></li>
                            <li><i class="fal fa-phone-alt text-primary"></i> <a href="tel:1900123456" class="text-muted fw-bold" style="color: var(--primary-color) !important;">1900 123 456</a></li>
                        </ul>
                        <div class="social-style-two mt-3">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-youtube"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom py-3" style="background-color: var(--primary-color);">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6 text-center mb-3 mb-lg-0">
                    <p class="text-white mb-0" style="font-size: 14px;">Bản quyền © 2026 LOTUSMILE. Đã đăng ký bản quyền.</p>
                </div>
                <!-- <div class="col-lg-6 text-center text-lg-end">
                    <img src="{{ asset('clients/assets/images/icons/payment-methods.png') }}" alt="Payments" style="max-height: 30px; filter: brightness(0) invert(1);">
                </div> -->
            </div>
        </div>
    </div>
</footer>
<!-- footer area end -->

</div>
<!--End pagewrapper-->

@if (session('error'))
<script>
    alert("{{ session('error') }}");
</script>
@endif
<!-- Jquery -->
<script src="{{ asset('clients/assets/js/jquery-3.6.0.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('clients/assets/js/bootstrap.min.js') }}"></script>
<!-- Appear Js -->
<script src="{{ asset('clients/assets/js/appear.min.js') }}"></script>
<!-- Slick -->
<script src="{{ asset('clients/assets/js/slick.min.js') }}"></script>
<!-- Magnific Popup -->
<script src="{{ asset('clients/assets/js/jquery.magnific-popup.min.js') }}"></script>
<!-- Nice Select -->
<script src="{{ asset('clients/assets/js/jquery.nice-select.min.js') }}"></script>
<!-- Image Loader -->
<script src="{{ asset('clients/assets/js/imagesloaded.pkgd.min.js') }}"></script>
<!-- Skillbar -->
<script src="{{ asset('clients/assets/js/skill.bars.jquery.min.js') }}"></script>
<!-- Jquery UI -->
<script src="{{ asset('clients/assets/js/jquery-ui.min.js') }}"></script>
<!-- Isotope -->
<script src="{{ asset('clients/assets/js/isotope.pkgd.min.js') }}"></script>
<!--  AOS Animation -->
<script src="{{ asset('clients/assets/js/aos.js') }}"></script>
<!-- Custom script -->
<script src="{{ asset('clients/assets/js/script.js') }}"></script>
{{-- jquery-toast  --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<!-- Custom script by Dev dien-->
<script src="{{ asset('clients/assets/js/custom-js.js') }}"></script>
<script src="{{ asset('clients/assets/js/jquery.datetimepicker.full.min.js') }}"></script>
<script>
    window.chtlConfig = {
        chatbotId: "8852774698"
    }
</script>
<script async data-id="8852774698" id="chtl-script" type="text/javascript" src="https://chatling.ai/js/embed.js"></script>
</body>

</html>