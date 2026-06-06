<!-- Hero Area Start -->
<section class="hero-area pt-150 pb-100 rel z-2" style="background-color: var(--lighter-color);">
    <div class="container-fluid px-0">
        <div class="main-hero-image bgs-cover position-relative"
            style="background-image: url({{ asset('clients/assets/images/banner/danang.jpg') }}); height: 500px; border-radius: 0 0 30px 30px; overflow: hidden;">
            <div class="overlay" style="background: linear-gradient(to bottom, rgba(0,0,0,0.2) 0%, rgba(0,0,0,0.6) 100%); position: absolute; top:0; left:0; right:0; bottom:0;"></div>
            <div class="container h-100">
                <div class="row h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-8 position-relative z-3">
                        <h1 class="text-white mb-3 fw-bold" data-aos="fade-up" data-aos-duration="1000" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.5);">Đồng hành cùng bạn trên mọi nẻo đường</h1>
                        <p class="text-white fs-5 mb-0" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">Khám phá thế giới với các tour du lịch đa dạng và hấp dẫn</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container position-relative z-3" style="margin-top: -60px;">
        <div class="bg-white rounded-4 shadow-lg p-4" data-aos="zoom-in-up" data-aos-duration="1000">
            <!-- Tabs (Mockup for future extensions) -->
            <!-- <ul class="nav nav-pills mb-4 border-bottom pb-3">
                <li class="nav-item">
                    <a class="nav-link active rounded-pill px-4 fw-600" aria-current="page" href="#" style="background-color: var(--primary-color);">
                        <i class="fas fa-suitcase-rolling me-2"></i>Tour trọn gói
                    </a>
                </li>
            </ul> -->

            <form action="{{ route('search') }}" method="GET" id="search_form">
                <div class="row g-3 align-items-end">
                    <div class="col-md-3">
                        <label class="form-label text-muted fw-bold mb-1" style="font-size: 13px;">Bạn muốn đi đâu?</label>
                        <div class="input-group border rounded bg-white" style="height: 50px;">
                            <span class="input-group-text bg-transparent border-0 text-muted pe-2 d-flex align-items-center"><i class="fal fa-map-marker-alt"></i></span>
                            <select name="destination" id="destination" class="form-control border-0 ps-0 shadow-none fw-500 bg-transparent h-100 destination-select" style="cursor: pointer; appearance: none; -webkit-appearance: none; -moz-appearance: none; background-image: none !important; padding-top: 0; padding-bottom: 0; line-height: 50px;">
                                <option value="" selected disabled hidden>Chọn điểm đến</option>
                                <option value="dn">Đà Nẵng</option>
                                <option value="cd">Côn Đảo</option>
                                <option value="hn">Hà Nội</option>
                                <option value="hcm">TP. Hồ Chí Minh</option>
                                <option value="hl">Hạ Long</option>
                                <option value="nb">Ninh Bình</option>
                                <option value="pq">Phú Quốc</option>
                                <option value="dl">Đà Lạt</option>
                                <option value="qt">Quảng Trị</option>
                                <option value="kh">Khánh Hòa (Nha Trang)</option>
                                <option value="ct">Cần Thơ</option>
                                <option value="vt">Vũng Tàu</option>
                                <option value="qn">Quảng Ninh</option>
                                <option value="la">Lào Cai (Sa Pa)</option>
                                <option value="bd">Bình Định (Quy Nhơn)</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label text-muted fw-bold mb-1" style="font-size: 13px;">Ngày khởi hành</label>
                        <div class="input-group border rounded bg-white" style="height: 50px;">
                            <span class="input-group-text bg-transparent border-0 text-muted pe-2 d-flex align-items-center"><i class="fal fa-calendar-alt"></i></span>
                            <input type="text" id="start_date" name="start_date" class="form-control border-0 ps-0 shadow-none datetimepicker datetimepicker-custom fw-500 bg-transparent h-100" placeholder="Chọn ngày đi" readonly style="padding-top: 0; padding-bottom: 0; line-height: 50px;">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label text-muted fw-bold mb-1" style="font-size: 13px;">Ngày kết thúc</label>
                        <div class="input-group border rounded bg-white" style="height: 50px;">
                            <span class="input-group-text bg-transparent border-0 text-muted pe-2 d-flex align-items-center"><i class="fal fa-calendar-alt"></i></span>
                            <input type="text" id="end_date" name="end_date" class="form-control border-0 ps-0 shadow-none datetimepicker datetimepicker-custom fw-500 bg-transparent h-100" placeholder="Chọn ngày về" readonly style="padding-top: 0; padding-bottom: 0; line-height: 50px;">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <button class="btn w-100 fw-bold rounded-3 shadow-sm d-flex align-items-center justify-content-center" type="submit" style="background-color: var(--primary-color); color: white; height: 50px; transition: all 0.3s; border: 1px solid var(--primary-color);">
                            <i class="far fa-search me-2"></i> TÌM KIẾM
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- Hero Area End -->