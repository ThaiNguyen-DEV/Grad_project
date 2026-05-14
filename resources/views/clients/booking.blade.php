@include('clients.blocks.header')
@include('clients.blocks.banner')

<section class="booking-page py-80 bg-light">
    <div class="container">
        <div class="row mb-4">
            <div class="col-12 text-center">
                <h2 class="fw-bold text-primary mb-3">Xác Nhận Đặt Tour</h2>
                <div class="d-flex justify-content-center align-items-center mb-4">
                    <div class="step active text-center me-4">
                        <div class="step-icon bg-primary text-white rounded-circle d-flex align-items-center justify-content-center mx-auto mb-2" style="width: 40px; height: 40px;"><i class="fal fa-user"></i></div>
                        <span class="fw-bold" style="font-size: 14px;">1. Thông tin</span>
                    </div>
                    <div class="step text-center me-4" style="opacity: 0.5;">
                        <div class="step-icon bg-secondary text-white rounded-circle d-flex align-items-center justify-content-center mx-auto mb-2" style="width: 40px; height: 40px;"><i class="fal fa-credit-card"></i></div>
                        <span class="fw-bold" style="font-size: 14px;">2. Thanh toán</span>
                    </div>
                    <div class="step text-center" style="opacity: 0.5;">
                        <div class="step-icon bg-secondary text-white rounded-circle d-flex align-items-center justify-content-center mx-auto mb-2" style="width: 40px; height: 40px;"><i class="fal fa-check"></i></div>
                        <span class="fw-bold" style="font-size: 14px;">3. Hoàn tất</span>
                    </div>
                </div>
            </div>
        </div>

        <form action="{{ route('create-booking') }}" method="post" class="booking-form">
            @csrf
            <div class="row">
                <div class="col-lg-8">
                    <!-- Contact Information -->
                    <div class="bg-white p-4 p-md-5 rounded-4 shadow-sm mb-4">
                        <h4 class="fw-bold mb-4 pb-2 border-bottom text-primary"><i class="fal fa-id-card me-2"></i>Thông Tin Liên Lạc</h4>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="username" class="fw-bold mb-2">Họ và tên <span class="text-danger">*</span></label>
                                    <input type="text" id="username" class="form-control rounded-3 p-3 bg-light border-0" placeholder="Nhập Họ và tên" name="fullName" required>
                                    <span class="error-message text-danger" id="usernameError"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="email" class="fw-bold mb-2">Email <span class="text-danger">*</span></label>
                                    <input type="email" id="email" class="form-control rounded-3 p-3 bg-light border-0" placeholder="sample@gmail.com" name="email" required>
                                    <span class="error-message text-danger" id="emailError"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="tel" class="fw-bold mb-2">Số điện thoại <span class="text-danger">*</span></label>
                                    <input type="number" id="tel" class="form-control rounded-3 p-3 bg-light border-0" placeholder="Nhập số điện thoại" name="tel" required>
                                    <span class="error-message text-danger" id="telError"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="address" class="fw-bold mb-2">Địa chỉ <span class="text-danger">*</span></label>
                                    <input type="text" id="address" class="form-control rounded-3 p-3 bg-light border-0" placeholder="Nhập địa chỉ" name="address" required>
                                    <span class="error-message text-danger" id="addressError"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Passenger Details -->
                    <div class="bg-white p-4 p-md-5 rounded-4 shadow-sm mb-4">
                        <h4 class="fw-bold mb-4 pb-2 border-bottom text-primary"><i class="fal fa-users me-2"></i>Hành Khách</h4>
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="p-4 bg-light rounded-4 d-flex flex-column justify-content-between h-100 border border-light-subtle shadow-sm transition-hover quantity-selector">
                                    <div class="mb-3 d-flex align-items-center">
                                        <div class="bg-white p-2 rounded-circle shadow-sm me-3 text-primary d-flex align-items-center justify-content-center" style="width: 45px; height: 45px;">
                                            <i class="fal fa-user-tie fs-4"></i>
                                        </div>
                                        <div>
                                            <h6 class="fw-bold mb-1 text-dark">Người lớn</h6>
                                            <span class="badge bg-primary-subtle text-primary border border-primary-subtle">> 12 tuổi</span>
                                        </div>
                                    </div>
                                    <div class="input-group mt-auto" style="width: 100%; max-width: 200px; margin: 0 auto;">
                                        <button type="button" class="btn btn-outline-primary quantity-btn fw-bold px-3 shadow-sm" style="border-radius: 20px 0 0 20px;">-</button>
                                        <input type="number" class="form-control text-center fw-bold text-dark border-primary quantity-input px-0 shadow-sm" value="1" min="1" id="numAdults" name="numAdults" data-price-adults="{{ $tour->priceAdult }}" readonly style="background-color: #f8f9fa;">
                                        <button type="button" class="btn btn-outline-primary quantity-btn fw-bold px-3 shadow-sm" style="border-radius: 0 20px 20px 0;">+</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="p-4 bg-light rounded-4 d-flex flex-column justify-content-between h-100 border border-light-subtle shadow-sm transition-hover quantity-selector">
                                    <div class="mb-3 d-flex align-items-center">
                                        <div class="bg-white p-2 rounded-circle shadow-sm me-3 text-info d-flex align-items-center justify-content-center" style="width: 45px; height: 45px;">
                                            <i class="fal fa-child fs-4"></i>
                                        </div>
                                        <div>
                                            <h6 class="fw-bold mb-1 text-dark">Trẻ em</h6>
                                            <span class="badge bg-info-subtle text-info border border-info-subtle">Từ 5 - 11 tuổi</span>
                                        </div>
                                    </div>
                                    <div class="input-group mt-auto" style="width: 100%; max-width: 200px; margin: 0 auto;">
                                        <button type="button" class="btn btn-outline-info quantity-btn fw-bold px-3 shadow-sm" style="border-radius: 20px 0 0 20px;">-</button>
                                        <input type="number" class="form-control text-center fw-bold text-dark border-info quantity-input px-0 shadow-sm" value="0" min="0" id="numChildren" name="numChildren" data-price-children="{{ $tour->priceChild }}" readonly style="background-color: #f8f9fa;">
                                        <button type="button" class="btn btn-outline-info quantity-btn fw-bold px-3 shadow-sm" style="border-radius: 0 20px 20px 0;">+</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Payment Method -->
                    <div class="bg-white p-4 p-md-5 rounded-4 shadow-sm mb-4">
                        <h4 class="fw-bold mb-4 pb-2 border-bottom text-primary"><i class="fal fa-wallet me-2"></i>Phương Thức Thanh Toán</h4>

                        <div class="payment-methods">
                            <label class="payment-option d-block border rounded-3 p-3 mb-3 cursor-pointer position-relative" style="transition: all 0.3s; cursor: pointer;">
                                <div class="d-flex align-items-center">
                                    <div class="form-check">
                                        <input class="form-check-input fs-5" type="radio" name="payment" value="office-payment" required>
                                    </div>
                                    <img src="{{ asset('clients/assets/images/contact/icon.png') }}" alt="Office Payment" class="mx-3 rounded" style="width: 40px; height: 40px; object-fit: contain;">
                                    <div>
                                        <h6 class="fw-bold mb-0">Thanh toán tại văn phòng</h6>
                                        <span class="text-muted" style="font-size: 13px;">Thanh toán trực tiếp tại văn phòng LOTUSMILE</span>
                                    </div>
                                </div>
                            </label>

                            <label class="payment-option d-block border rounded-3 p-3 mb-3 cursor-pointer position-relative" style="transition: all 0.3s; cursor: pointer;">
                                <div class="d-flex align-items-center">
                                    <div class="form-check">
                                        <input class="form-check-input fs-5" type="radio" name="payment" value="paypal-payment" required>
                                    </div>
                                    <img src="{{ asset('clients/assets/images/booking/cong-thanh-toan-paypal.jpg') }}" alt="PayPal" class="mx-3 rounded border" style="width: 40px; height: 40px; object-fit: cover;">
                                    <div>
                                        <h6 class="fw-bold mb-0">Thanh toán bằng PayPal</h6>
                                        <span class="text-muted" style="font-size: 13px;">Thanh toán an toàn qua cổng PayPal</span>
                                    </div>
                                </div>
                            </label>

                            <label class="payment-option d-block border rounded-3 p-3 mb-3 cursor-pointer position-relative" style="transition: all 0.3s; cursor: pointer;">
                                <div class="d-flex align-items-center">
                                    <div class="form-check">
                                        <input class="form-check-input fs-5" type="radio" name="payment" value="momo-payment" required>
                                    </div>
                                    <img src="{{ asset('clients/assets/images/booking/thanh-toan-momo.jpg') }}" alt="MoMo" class="mx-3 rounded border" style="width: 40px; height: 40px; object-fit: cover;">
                                    <div>
                                        <h6 class="fw-bold mb-0">Thanh toán bằng Momo</h6>
                                        <span class="text-muted" style="font-size: 13px;">Thanh toán tiện lợi qua ví điện tử MoMo</span>
                                    </div>
                                </div>
                                @if (!is_null($transIdMomo))
                                <input type="hidden" name="transactionIdMomo" value="{{ $transIdMomo }}">
                                @endif
                            </label>

                            <input type="hidden" name="payment_hidden" id="payment_hidden">
                        </div>
                    </div>

                    <!-- Privacy Agreement Section -->
                    <div class="bg-white p-4 rounded-4 shadow-sm mb-4 mb-lg-0 border-start border-4 border-primary">
                        <div class="form-check d-flex align-items-center">
                            <input class="form-check-input fs-5 mt-0 me-3" type="checkbox" id="agree" name="agree" required>
                            <label class="form-check-label text-muted" for="agree">
                                Tôi đã đọc và đồng ý với <a href="#" target="_blank" class="fw-bold text-primary">Điều khoản thanh toán</a> và quy định của LOTUSMILE.
                            </label>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="booking-summary bg-white rounded-4 shadow-sm overflow-hidden" style="position: sticky; top: 120px;">
                        <div class="bg-primary text-white p-4">
                            <h5 class="fw-bold mb-0 text-white">Tóm tắt chuyến đi</h5>
                        </div>
                        <div class="p-4">
                            <div class="tour-info pb-3 border-bottom mb-3">
                                <div class="d-flex mb-3">
                                    <img src="{{ asset('admin/assets/images/gallery-tours/' . $tour->images[0]) }}" alt="Tour" class="rounded-3" style="width: 80px; height: 80px; object-fit: cover;">
                                    <div class="ms-3">
                                        <span class="badge bg-secondary-subtle text-secondary mb-1">Mã tour: {{ $tour->tourId }}</span>
                                        <input type="hidden" name="tourId" id="tourId" value="{{ $tour->tourId }}">
                                        <h6 class="fw-bold mb-0" style="line-height: 1.4; font-size: 15px;">{{ $tour->title }}</h6>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between mb-2 text-muted" style="font-size: 14px;">
                                    <span>Khởi hành:</span>
                                    <span class="fw-bold text-dark">{{ date('d-m-Y', strtotime($tour->startDate)) }}</span>
                                </div>
                                <div class="d-flex justify-content-between mb-2 text-muted" style="font-size: 14px;">
                                    <span>Kết thúc:</span>
                                    <span class="fw-bold text-dark">{{ date('d-m-Y', strtotime($tour->endDate)) }}</span>
                                </div>
                                <div class="d-flex justify-content-between text-muted" style="font-size: 14px;">
                                    <span>Số chỗ còn nhận:</span>
                                    <span class="fw-bold text-success quantityAvailable">{{ $tour->quantity }}</span>
                                </div>
                            </div>

                            <div class="order-details pb-3 border-bottom mb-3">
                                <h6 class="fw-bold mb-3">Chi tiết giá</h6>
                                <div class="summary-item d-flex justify-content-between mb-2">
                                    <span class="text-muted">Người lớn:</span>
                                    <div class="fw-600">
                                        <span class="quantity__adults">1</span> x <span class="total-price">{{ number_format($tour->priceAdult, 0, ',', '.') }} VNĐ</span>
                                    </div>
                                </div>
                                <div class="summary-item d-flex justify-content-between mb-2">
                                    <span class="text-muted">Trẻ em:</span>
                                    <div class="fw-600">
                                        <span class="quantity__children">0</span> x <span class="total-price">0 VNĐ</span>
                                    </div>
                                </div>
                                <div class="summary-item d-flex justify-content-between text-success">
                                    <span>Giảm giá:</span>
                                    <div class="fw-600">
                                        <span class="total-price">0 VNĐ</span>
                                    </div>
                                </div>
                            </div>

                            <div class="order-coupon d-flex mb-4">
                                <input type="text" class="form-control rounded-start-pill bg-light border-0" placeholder="Mã giảm giá">
                                <button type="button" class="btn btn-secondary rounded-end-pill px-3 btn-coupon">Áp dụng</button>
                            </div>

                            <div class="total-amount d-flex justify-content-between align-items-center mb-4">
                                <span class="fw-bold fs-5">Tổng cộng:</span>
                                <span class="fw-bold text-primary fs-3 total-price-display">{{ number_format($tour->priceAdult, 0, ',', '.') }} <small class="fs-6 text-muted">VNĐ</small></span>
                                <input type="hidden" class="totalPrice" name="totalPrice" value="{{ $tour->priceAdult }}">
                            </div>

                            <div id="paypal-button-container" class="mb-3"></div>

                            <!-- <button type="submit" class="booking-btn btn-submit-booking">Xác Nhận</button> -->
                            <button type="submit" class="btn btn-primary w-100 rounded-pill py-3 fw-bold shadow-sm text-uppercase booking-btn btn-submit-bookingg">Xác Nhận Đặt Tour</button>

                            <button id="btn-momo-payment" type="button" class="btn btn-danger w-100 rounded-pill py-3 fw-bold shadow-sm text-uppercase mt-2 d-flex align-items-center justify-content-center" style="display: none !important; background-color: #a50064; border-color: #a50064;" data-urlmomo="{{ route('createMomoPayment') }}">
                                Thanh toán qua Momo
                                <img src="{{ asset('clients/assets/images/booking/icon-thanh-toan-momo.png') }}" alt="Momo" class="ms-2" style="height: 20px;">
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>


@include('clients.blocks.footer')