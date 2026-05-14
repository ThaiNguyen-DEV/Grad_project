@include('clients.blocks.header')
@include('clients.blocks.banner')

<!-- Tour Grid Area start -->
<section class="tour-grid-page py-80 rel z-1" style="background-color: #f5f7fa;">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-10 rmb-75">
                <div class="shop-sidebar bg-white p-4 rounded-4 shadow-sm" style="border: 1px solid #eee;">
                    <div class="d-flex justify-content-between align-items-center mb-4 pb-2 border-bottom">
                        <h5 class="fw-bold mb-0 text-dark">Bộ Lọc Tour</h5>
                        <button class="btn btn-sm btn-light text-primary rounded-pill px-3 fw-600" name="btn_clear" onclick="window.location.href='{{ route('tours') }}'">
                            Xóa lọc
                        </button>
                    </div>

                    <div class="widget widget-filter mb-4" data-aos="fade-up" data-aos-delay="50" data-aos-duration="1500"
                        data-aos-offset="50">
                        <h6 class="widget-title fw-bold mb-3">Lọc theo giá</h6>
                        <div class="price-filter-wrap">
                            <div class="price-slider-range mb-3"></div>
                            <div class="price fw-500 text-muted" style="font-size: 14px;">
                                <span>Giá: </span>
                                <input type="text" id="price" readonly class="border-0 bg-transparent text-dark fw-bold" style="width: 100%;">
                            </div>
                        </div>
                    </div>

                    <div class="widget widget-activity mb-4" data-aos="fade-up" data-aos-duration="1500"
                        data-aos-offset="50">
                        <h6 class="widget-title fw-bold mb-3">Điểm đến</h6>
                        <ul class="list-unstyled mb-0" style="font-size: 14px;">
                            <li class="mb-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="domain" id="id_mien_bac" value="b">
                                    <label class="form-check-label d-flex justify-content-between w-100 text-muted" for="id_mien_bac">
                                        Miền Bắc <span class="badge bg-light text-dark rounded-pill">{{ $domainsCount['mien_bac'] }}</span>
                                    </label>
                                </div>
                            </li>
                            <li class="mb-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="domain" id="id_mien_trung" value="t">
                                    <label class="form-check-label d-flex justify-content-between w-100 text-muted" for="id_mien_trung">
                                        Miền Trung <span class="badge bg-light text-dark rounded-pill">{{ $domainsCount['mien_trung'] }}</span>
                                    </label>
                                </div>
                            </li>
                            <li class="mb-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="domain" id="id_mien_nam" value="n">
                                    <label class="form-check-label d-flex justify-content-between w-100 text-muted" for="id_mien_nam">
                                        Miền Nam <span class="badge bg-light text-dark rounded-pill">{{ $domainsCount['mien_nam'] }}</span>
                                    </label>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div class="widget widget-reviews mb-4" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                        <h6 class="widget-title fw-bold mb-3">Đánh giá</h6>
                        <ul class="list-unstyled mb-0" style="font-size: 14px;">
                            <li class="mb-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="filter_star" id="5star" value="5">
                                    <label class="form-check-label text-warning" for="5star">
                                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                        <span class="text-muted ms-1">Từ 5 sao</span>
                                    </label>
                                </div>
                            </li>
                            <li class="mb-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="filter_star" id="4star" value="4">
                                    <label class="form-check-label text-warning" for="4star">
                                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>
                                        <span class="text-muted ms-1">Từ 4 sao</span>
                                    </label>
                                </div>
                            </li>
                            <li class="mb-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="filter_star" id="3star" value="3">
                                    <label class="form-check-label text-warning" for="3star">
                                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>
                                        <span class="text-muted ms-1">Từ 3 sao</span>
                                    </label>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div class="widget widget-duration" data-aos="fade-up" data-aos-duration="1500"
                        data-aos-offset="50">
                        <h6 class="widget-title fw-bold mb-3">Thời gian</h6>
                        <ul class="list-unstyled mb-0" style="font-size: 14px;">
                            <li class="mb-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="duration" id="3ngay2dem" value="3n2d">
                                    <label class="form-check-label text-muted" for="3ngay2dem">3 ngày 2 đêm</label>
                                </div>
                            </li>
                            <li class="mb-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="duration" id="4ngay3dem" value="4n3d">
                                    <label class="form-check-label text-muted" for="4ngay3dem">4 ngày 3 đêm</label>
                                </div>
                            </li>
                            <li class="mb-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="duration" id="5ngay4dem" value="5n4d">
                                    <label class="form-check-label text-muted" for="5ngay4dem">5 ngày 4 đêm</label>
                                </div>
                            </li>
                        </ul>
                    </div>

                </div>

                <div class="widget widget-cta mt-4 rounded-4 overflow-hidden position-relative" data-aos="fade-up" data-aos-duration="1500"
                    data-aos-offset="50">
                    <div class="image w-100 h-100 position-absolute top-0 start-0 z-0">
                        <img src="{{ asset('clients/assets/images/widgets/cta-widget.png') }}" alt="CTA" class="w-100 h-100 object-fit-cover">
                        <div class="overlay" style="background: linear-gradient(to top, rgba(0,0,0,0.4), rgba(0,0,0,0.1)); position: absolute; top:0; left:0; right:0; bottom:0;"></div>
                    </div>
                    <div class="content text-white position-relative z-1 p-4 text-center d-flex flex-column justify-content-center" style="height: 350px;">
                        <span class="h6 text-uppercase fw-600 mb-2" style="letter-spacing: 2px;">Khám Phá Việt Nam</span>
                        <h3 class="mb-4 text-white fw-bold">Trải nghiệm du lịch tốt nhất</h3>
                        <a href="{{ route('tours') }}" class="btn rounded-pill px-4 py-2 fw-600 mx-auto" style="background-color: var(--secondary-color); color: white;">
                            Khám phá ngay <i class="fal fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="shop-shorter bg-white p-3 rounded-4 shadow-sm mb-4 d-flex flex-wrap align-items-center justify-content-between">
                    <div class="sort-text fw-600 text-dark">
                        Tất cả Tours
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="sort-text me-3 text-muted" style="font-size: 14px;">
                            Sắp xếp theo:
                        </div>
                        <select id="sorting_tours" class="form-select form-select-sm rounded-pill shadow-none fw-600" style="width: auto; min-width: 150px; cursor: pointer;">
                            <option value="default" selected="">Mặc định</option>
                            <option value="new">Mới nhất</option>
                            <option value="old">Cũ nhất</option>
                            <option value="hight-to-low">Giá: Cao đến thấp</option>
                            <option value="low-to-high">Giá: Thấp đến cao</option>
                        </select>
                    </div>
                </div>

                <div class="tour-grid-wrap position-relative">
                    <div class="loader" style="display: none; position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(255,255,255,0.7); z-index: 10; justify-content: center; align-items: center;">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                    <div class="row" id="tours-container">
                        @include('clients.partials.filter-tours')
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- Tour Grid Area end -->

@include('clients.blocks.new_letter')
@include('clients.blocks.footer')
<script>
    var filterToursUrl = "{{ route('filter-tours') }}";
</script>
