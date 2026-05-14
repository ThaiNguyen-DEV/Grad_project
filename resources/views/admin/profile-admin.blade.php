@include('admin.blocks.header')
<div class="container body">
    <div class="main_container">
        @include('admin.blocks.sidebar')


        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Thông tin admin</h3>
                    </div>

                    <div class="title_right">
                        <div class="col-md-5 col-sm-5  form-group pull-right top_search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for...">
                                <span class="input-group-btn">
                                    <button class="btn btn-secondary" type="button">Go!</button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 ">
                        <div class="x_panel border-0 shadow-sm" style="border-radius: 12px;">
                            <div class="x_title border-0 pb-0 d-flex justify-content-between align-items-center mb-4">
                                <h2 class="font-weight-bold" style="color: var(--primary-color); font-size: 20px;"><i class="fa fa-user me-2"></i> Hồ sơ của tôi</h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content pt-3">
                                <div class="col-md-3 col-sm-3 profile_left text-center">
                                    <div class="profile_img mb-3">
                                        <div id="crop-avatar">
                                            <!-- Current avatar -->
                                            <img id="avatarAdminPreview" class="img-responsive avatar-view rounded-circle shadow-sm mx-auto"
                                                src="{{ asset('admin/assets/images/user-profile/avt_admin.jpg') }}"
                                                alt="Avatar" style="width:150px; height: 150px; object-fit: cover; border: 4px solid #fff;" title="Change the avatar">
                                            <input type="file" name="avatarAdmin" id="avatarAdmin" style="display: none"
                                                accept="image/*">
                                        </div>
                                    </div>
                                    <label for="avatarAdmin" id="btn_avatar" class="btn btn-outline-primary rounded-pill shadow-sm px-4 mb-4" action={{ route('admin.update-avatar') }}>
                                        <i class="fa fa-camera me-2"></i> Đổi ảnh đại diện
                                    </label>
                                    <h3 id="nameAdmin" class="font-weight-bold" style="color: var(--primary-color);">{{ $admin->fullName }}</h3>

                                    <ul class="list-unstyled user_data text-muted mt-3">
                                        <li class="mb-2">
                                            <i class="fa fa-map-marker user-profile-icon me-2 text-danger"></i> <span
                                                id="emailAdmin">{{ $admin->address }}</span>
                                        </li>
                                        <li>
                                            <i class="fa fa-envelope user-profile-icon me-2 text-info"></i> <span
                                                id="addressAdmin">{{ $admin->email }}</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-9 col-sm-9 pl-md-5">
                                    <div class="bg-light p-4 rounded-3 shadow-sm border">
                                        <form action="{{ route('admin.update-admin') }}" id="formProfileAdmin"
                                            class="form-horizontal form-label-left">
                                            @csrf
                                            <div class="item form-group mb-4">
                                                <label class="col-form-label col-md-3 col-sm-3 fw-bold text-dark"
                                                    for="fullName">Họ và tên <span class="text-danger">*</span></label>
                                                <div class="col-md-8 col-sm-8">
                                                    <input type="text" id="fullName" name="fullName" required
                                                        class="form-control rounded-pill px-3 shadow-sm" placeholder="Nhập tên admin"
                                                        value="{{ $admin->fullName }}">
                                                </div>
                                            </div>

                                            <div class="item form-group mb-4">
                                                <label class="col-form-label col-md-3 col-sm-3 fw-bold text-dark"
                                                    for="password">Mật khẩu <span class="text-danger">*</span></label>
                                                <div class="col-md-8 col-sm-8">
                                                    <input type="password" id="password" name="password" required
                                                        class="form-control rounded-pill px-3 shadow-sm" placeholder="Nhập mật khẩu"
                                                        value="{{ $admin->password }}">
                                                </div>
                                            </div>

                                            <div class="item form-group mb-4">
                                                <label for="email"
                                                    class="col-form-label col-md-3 col-sm-3 fw-bold text-dark">Email</label>
                                                <div class="col-md-8 col-sm-8">
                                                    <input id="email" class="form-control rounded-pill px-3 shadow-sm" type="email" name="email"
                                                        required placeholder="Nhập email" value="{{ $admin->email }}">
                                                </div>
                                            </div>

                                            <div class="item form-group mb-4">
                                                <label for="address"
                                                    class="col-form-label col-md-3 col-sm-3 fw-bold text-dark">Địa chỉ</label>
                                                <div class="col-md-8 col-sm-8">
                                                    <input id="address" class="form-control rounded-pill px-3 shadow-sm" type="text"
                                                        name="address" required placeholder="Nhập địa chỉ"
                                                        value="{{ $admin->address }}">
                                                </div>
                                            </div>

                                            <div class="ln_solid my-4 border-top"></div>

                                            <div class="item form-group mb-0">
                                                <div class="col-md-8 col-sm-8 offset-md-3">
                                                    <button type="submit" class="btn btn-primary rounded-pill px-5 shadow-sm fw-bold"><i class="fa fa-save me-2"></i> Cập nhật thông tin</button>
                                                </div>
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
        <!-- /page content -->

    </div>
</div>

@include('admin.blocks.footer')
