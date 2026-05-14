@include('clients.blocks.header')
<div class="user-profile py-80 bg-light">
    <div class="container-xl px-4 mt-4">
        <div class="row">
            <div class="col-12 mb-4">
                <h3 class="fw-bold text-primary">Tài Khoản Của Tôi</h3>
                <p class="text-muted">Quản lý thông tin hồ sơ và bảo mật tài khoản</p>
            </div>
            <div class="col-xl-4">
                <div class="card border-0 shadow-sm rounded-4 mb-4 mb-xl-0">
                    <div class="card-header bg-white border-bottom-0 pt-4 pb-0 text-center">
                        <h5 class="fw-bold mb-0">Ảnh đại diện</h5>
                    </div>
                    <div class="card-body text-center p-4">
                        <div class="position-relative d-inline-block mb-3">
                            <img id="avatarPreview" class="img-account-profile rounded-circle object-fit-cover border border-4 border-light shadow-sm"
                                src="{{ asset('admin/assets/images/user-profile/' . $user->avatar) }}"
                                style="width:160px; height: 160px;" alt="Ảnh đại diện">
                            <label for="avatar" class="position-absolute bottom-0 end-0 bg-primary text-white rounded-circle d-flex align-items-center justify-content-center cursor-pointer shadow" style="width: 40px; height: 40px; cursor: pointer;">
                                <i class="fal fa-camera"></i>
                            </label>
                        </div>

                        <div class="small text-muted mb-4">Định dạng JPG, PNG. Kích thước tối đa 5MB</div>
                        <input type="file" name="avatar" id="avatar" class="d-none" accept="image/*">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" class="__token">
                        <input type="hidden" name="" value="{{ route('change-avatar') }}" class="label_avatar">
                    </div>
                </div>

                <div class="card border-0 shadow-sm rounded-4 mt-4">
                    <div class="card-body p-0">
                        <div class="nav flex-column nav-pills p-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <button class="nav-link active text-start mb-2 px-4 py-3 fw-bold rounded-3 d-flex align-items-center" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab">
                                <i class="fal fa-user me-3 fs-5"></i> Thông tin cá nhân
                            </button>
                            <button class="nav-link text-start px-4 py-3 fw-bold rounded-3 d-flex align-items-center" id="v-pills-security-tab" data-bs-toggle="pill" data-bs-target="#v-pills-security" type="button" role="tab">
                                <i class="fal fa-shield-check me-3 fs-5"></i> Bảo mật & Mật khẩu
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-xl-8">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel">
                        <div class="card border-0 shadow-sm rounded-4 mb-4">
                            <div class="card-header bg-white border-bottom pt-4 pb-3 px-4 px-md-5">
                                <h5 class="fw-bold mb-0 text-primary"><i class="fal fa-address-card me-2"></i>Chi tiết tài khoản</h5>
                            </div>
                            <div class="card-body p-4 p-md-5">
                                <form action="{{ route('update-user-profile') }}" method="POST" name="updateUser" class="updateUser">
                                    @csrf
                                    <div class="row g-4">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="fw-bold mb-2 text-dark" for="inputFullName">Họ và tên</label>
                                                <input class="form-control bg-light border-0 p-3 rounded-3" id="inputFullName" type="text"
                                                    placeholder="Nhập họ và tên" value="{{ $user->fullName }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="fw-bold mb-2 text-dark" for="inputPhone">Số điện thoại</label>
                                                <input class="form-control bg-light border-0 p-3 rounded-3" id="inputPhone" type="number"
                                                    placeholder="Nhập số điện thoại" value="{{ $user->phoneNumber }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="fw-bold mb-2 text-dark" for="inputEmailAddress">Email liên hệ</label>
                                                <input class="form-control bg-light border-0 p-3 rounded-3" id="inputEmailAddress" type="email" 
                                                    placeholder="Nhập email" value="{{ $user->email }}" required readonly>
                                                <small class="text-muted mt-1 d-block"><i class="fal fa-info-circle me-1"></i>Email dùng để đăng nhập nên không thể thay đổi.</small>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="fw-bold mb-2 text-dark" for="inputLocation">Địa chỉ hiện tại</label>
                                                <input class="form-control bg-light border-0 p-3 rounded-3" id="inputLocation" type="text" 
                                                    placeholder="Nhập địa chỉ đầy đủ" value="{{ $user->address }}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="my-4">
                                    <div class="text-end">
                                        <button class="btn btn-primary rounded-pill px-5 py-2 fw-bold" type="submit" id="update_profile">Lưu Thay Đổi</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                    <div class="tab-pane fade" id="v-pills-security" role="tabpanel">
                        <div class="card border-0 shadow-sm rounded-4 mb-4">
                            <div class="card-header bg-white border-bottom pt-4 pb-3 px-4 px-md-5">
                                <h5 class="fw-bold mb-0 text-primary"><i class="fal fa-key me-2"></i>Đổi mật khẩu</h5>
                            </div>
                            <div class="card-body p-4 p-md-5" id="card_change_password">
                                <div class="alert alert-info border-0 rounded-3 mb-4">
                                    <div class="d-flex">
                                        <i class="fal fa-info-circle fs-4 me-3 mt-1"></i>
                                        <div>
                                            <h6 class="fw-bold mb-1">Bảo mật tài khoản</h6>
                                            <p class="mb-0 fs-6">Sử dụng mật khẩu mạnh bao gồm chữ hoa, chữ thường, số và ký tự đặc biệt để bảo vệ tài khoản của bạn.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="invalid-feedback mb-3" id="validate_password"></div>
                                <form action="{{ route('change-password') }}" method="post" class="change_password_profile">
                                    @csrf
                                    <div class="row g-4">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="fw-bold mb-2 text-dark" for="inputOldPass">Mật khẩu hiện tại</label>
                                                <input class="form-control bg-light border-0 p-3 rounded-3" id="inputOldPass" type="password"
                                                    placeholder="Nhập mật khẩu cũ" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="fw-bold mb-2 text-dark" for="inputNewPass">Mật khẩu mới</label>
                                                <input class="form-control bg-light border-0 p-3 rounded-3" id="inputNewPass" type="password"
                                                    placeholder="Nhập mật khẩu mới" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="fw-bold mb-2 text-dark" for="inputConfirmPass">Xác nhận mật khẩu mới</label>
                                                <input class="form-control bg-light border-0 p-3 rounded-3" id="inputConfirmPass" type="password"
                                                    placeholder="Nhập lại mật khẩu mới" required>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="my-4">
                                    <div class="text-end">
                                        <button class="btn btn-primary rounded-pill px-5 py-2 fw-bold" type="submit">Cập Nhật Mật Khẩu</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('clients.blocks.footer')
