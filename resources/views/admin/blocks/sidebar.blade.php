<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title d-flex align-items-center justify-content-center" style="border: 0; padding: 15px 0;">
            <a href="{{ route('admin.dashboard') }}" class="site_title text-center text-white" style="padding-left: 0;">
                <i class="fa fa-paper-plane"></i> <span class="font-weight-bold" style="font-family: 'Outfit', sans-serif;">LOTUSMILE</span>
            </a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix mt-2 mb-4 px-3">
            <div class="profile_pic" style="width: 25%; float: left;">
                <img src="{{ asset('admin/assets/images/user-profile/avt_admin.jpg') }}" alt="..."
                    class="img-circle profile_img" style="border: 2px solid rgba(255,255,255,0.2); width: 45px; height: 45px; margin: 0;">
            </div>
            <div class="profile_info" style="width: 70%; float: left; padding-left: 10px;">
                <span style="font-size: 12px; color: #cbd5e1;">Xin chào,</span>
                <h2 style="font-size: 15px; font-weight: 600; color: #fff; margin: 0;">Admin</h2>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3 style="color: #cbd5e1; font-size: 11px; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 10px; padding-left: 20px;">Quản lý hệ thống</h3>
                <ul class="nav side-menu">
                    <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-th-large"></i> Bảng điều khiển</a> </li>
                    <li><a href="{{ route('admin.admin') }}"><i class="fa fa-shield"></i> Quản trị viên</a> </li>
                    <li><a href="{{ route('admin.users') }}"><i class="fa fa-users"></i> Người dùng</a> </li>
                    <li><a><i class="fa fa-map-o"></i> Quản lý Tours<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('admin.page-add-tours') }}">Thêm Tour mới</a></li>
                            <li><a href="{{ route('admin.tours') }}">Danh sách Tours</a></li>
                        </ul>
                    </li>

                    <li><a href="{{ route('admin.booking') }}"><i class="fa fa-credit-card"></i> Quản lý Đặt chỗ</a> </li>
                    <li><a href="{{ route('admin.contact') }}"><i class="fa fa-envelope-o"></i> Tin nhắn liên hệ </a> </li>
                </ul>
            </div>
        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{ route('admin.logout') }}">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>

<!-- top navigation -->
<div class="top_nav">
    <div class="nav_menu">
        <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
        </div>
        <nav class="nav navbar-nav">
            <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                    <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown"
                        data-toggle="dropdown" aria-expanded="false" style="color: #333; font-weight: 500;">
                        <img src="{{ asset('admin/assets/images/user-profile/avt_admin.jpg') }}" alt="" style="border: 2px solid #e9ecef;">
                        @if (session()->has('admin'))
                            {{ session('admin') }}
                        @endif
                    </a>
                    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="javascript:;"><i class="fa fa-user pull-right"></i> Thông tin cá nhân</a>
                        <a class="dropdown-item" href="{{ route('admin.logout') }}"><i
                                class="fa fa-sign-out pull-right"></i> Đăng xuất</a>
                    </div>
                </li>

                <li role="presentation" class="nav-item dropdown open">
                    <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1"
                        data-toggle="dropdown" aria-expanded="false" style="color: #6c757d;">
                        <i class="fa fa-bell-o" style="font-size: 18px;"></i>
                        <span class="badge bg-green" style="font-size: 10px; padding: 3px 6px;">{{ $unreadCount }}</span>
                    </a>
                    <ul class="dropdown-menu list-unstyled msg_list shadow" role="menu" aria-labelledby="navbarDropdown1" style="border-radius: 8px; border: none;">
                        @foreach ($unreadContacts->take(3) as $item)
                            <li class="nav-item" style="border-bottom: 1px solid #f4f6f9;">
                                <a class="dropdown-item" href="{{ route('admin.contact') }}">
                                    <span>
                                        <b style="color: #333;">{{ $item->fullName }}</b>
                                        <span class="time" style="color: #999; font-size: 11px;">{{ $item->phoneNumber }}</span>
                                    </span>
                                    <span class="message text-contact-truncate" style="color: #666; font-size: 13px;" >{{ $item->message }} </span>
                                </a>
                            </li>
                        @endforeach
                        <li>
                            <div class="text-center">
                                <a href="{{ route('admin.contact') }}" style="color: var(--primary-color); font-weight: 500;">
                                    <strong>Xem tất cả thông báo</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>
<!-- /top navigation -->
