<!DOCTYPE html>
<html lang="zxx">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>LOTUSMILE - {{ $title }}</title>
    <!-- Favicon Icon -->
    <link rel="shortcut icon" href="{{ asset('clients/assets/images/logos/logo.png') }}" type="image/x-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&amp;display=swap"
        rel="stylesheet">

    <!-- Flaticon -->
    <link rel="stylesheet" href="{{ asset('clients/assets/css/flaticon.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('clients/assets/css/fontawesome-5.14.0.min.css') }}">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('clients/assets/css/bootstrap.min.css') }}">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{ asset('clients/assets/css/magnific-popup.min.css') }}">
    <!-- Nice Select -->
    <link rel="stylesheet" href="{{ asset('clients/assets/css/nice-select.min.css') }}">
    <!-- jQuery UI -->
    <link rel="stylesheet" href="{{ asset('clients/assets/css/jquery-ui.min.css') }}">
    <!-- Animate -->
    <link rel="stylesheet" href="{{ asset('clients/assets/css/aos.css') }}">
    <!-- Slick -->
    <link rel="stylesheet" href="{{ asset('clients/assets/css/slick.min.css') }}">
    <!-- Main Style -->
    <link rel="stylesheet" href="{{ asset('clients/assets/css/style.css') }}">

    {{-- boxicons --}}
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    {{-- Login  --}}
    <!-- Font Icon -->
    <link rel="stylesheet"
        href="{{ asset('clients/assets/css/css-login/fonts/material-icon/css/material-design-iconic-font.min.css') }}">
    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('clients/assets/css/css-login/style.css') }}">
    <link rel="stylesheet" href="{{ asset('clients/assets/css/custom-css.css') }}" />

    {{-- User Profile  --}}
    <link rel="stylesheet" href="{{ asset('clients/assets/css/user-profile.css') }}" />

    <!-- Import CSS for Toastr -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />

</head>

<body>
    <div class="page-wrapper">

        <!-- Preloader -->
        <div class="preloader">
            <div class="custom-loader"></div>
        </div>

        <!-- main header -->
        <header class="main-header header-vietravel">
            <!-- Top Bar -->
            <div class="header-top bgc-lighter py-1 border-bottom" style="font-size: 13px;">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-md-6 col-12 text-center text-md-start text-muted">
                            <span class="me-4"><i class="fas fa-phone-alt me-1" style="color: var(--primary-color);"></i> Hotline: <strong class="text-dark">1900 123 456</strong></span>
                            <span><i class="fas fa-envelope me-1" style="color: var(--primary-color);"></i> contact@lotusmile.com</span>
                        </div>
                        <div class="col-md-6 col-12 text-center text-md-end d-flex justify-content-center justify-content-md-end align-items-center">
                            <div class="social-style-one d-inline-block me-3">
                                <a href="#" class="text-muted"><i class="fab fa-facebook-f"></i></a>
                                <a href="#" class="text-muted"><i class="fab fa-twitter"></i></a>
                                <a href="#" class="text-muted"><i class="fab fa-instagram"></i></a>
                            </div>
                            <div class="language-switcher user-dropdown-wrap dropdown d-inline-block border-start ps-3">
                                <a href="#" class="text-muted text-decoration-none dropdown-toggle" id="langDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-globe me-1"></i> {{ strtoupper(app()->getLocale()) }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--Header-Upper-->
            <div class="header-upper shadow-sm bg-white sticky-top py-1">
                <div class="container-fluid clearfix">
                    <div class="header-inner rel d-flex align-items-center justify-content-between" style="min-height: 50px;">

                        <div class="d-flex align-items-center">
                            <!-- Mobile Toggle -->
                            <button type="button" class="navbar-toggle d-lg-none me-3" data-bs-toggle="collapse" data-bs-target=".navbar-collapse" style="background: transparent; border: none; font-size: 20px;">
                                <i class="fas fa-bars"></i>
                            </button>

                            <!-- Logo -->
                            <div class="logo-outer me-4">
                                <div class="logo"><a href="{{ route('home') }}"><img
                                            src="{{ asset('clients/assets/images/logos/logo.png') }}" alt="Logo"
                                            title="Logo" style="max-height: 100px;"></a></div>
                            </div>

                            <!-- Main Navigation (Mega Menu Style) -->
                            <nav class="main-menu navbar-expand-lg d-none d-lg-block">
                                <div class="navbar-collapse collapse clearfix">
                                    <ul class="navigation d-flex m-0 p-0 custom-nav-links align-items-center" style="list-style: none;">
                                        <li class="{{ Request::url() == route('home') ? 'active' : '' }}"><a href="{{ route('home') }}" class="text-dark px-3 py-1 d-block fw-600 text-decoration-none">TRANG CHỦ</a></li>
                                        <li class="dropdown {{ Request::is('tours') || Request::is('team') || Request::is('tour-detail/*') ? 'active' : '' }}">
                                            <a href="{{ route('tours') }}" class="text-dark px-3 py-1 d-block fw-600 text-decoration-none">TOURS DU LỊCH</a>
                                            <ul class="dropdown-menu shadow-sm border-0" style="border-radius: 8px;">
                                                <li><a href="{{ route('tours') }}" class="dropdown-item py-2">Khám phá tất cả Tours</a></li>
                                                <!-- <li><a href="{{ route('tours') }}" class="dropdown-item py-2">Tour Trong Nước</a></li>
                                                <li><a href="{{ route('tours') }}" class="dropdown-item py-2">Tour Quốc Tế</a></li> -->
                                                <li><a href="{{ route('team') }}" class="dropdown-item py-2">Đội ngũ Hướng Dẫn Viên</a></li>
                                            </ul>
                                        </li>
                                        <li class="{{ Request::url() == route('destination') ? 'active' : '' }}"><a href="{{ route('destination') }}" class="text-dark px-3 py-1 d-block fw-600 text-decoration-none">ĐIỂM ĐẾN</a></li>
                                        <li class="{{ Request::url() == route('about') ? 'active' : '' }}"><a href="{{ route('about') }}" class="text-dark px-3 py-1 d-block fw-600 text-decoration-none">GIỚI THIỆU</a></li>
                                        <li class="{{ Request::url() == route('contact') ? 'active' : '' }}"><a href="{{ route('contact') }}" class="text-dark px-3 py-1 d-block fw-600 text-decoration-none">LIÊN HỆ</a></li>
                                    </ul>
                                </div>
                            </nav>
                        </div>

                        <div class="d-flex align-items-center gap-3">
                            <!-- Search Bar (Compact Style) -->
                            <div class="header-search-bar d-none d-xl-block">
                                <form action="{{ route('search-voice-text') }}" method="GET" class="d-flex align-items-center border rounded-pill overflow-hidden" style="background: #f5f7fa; padding: 0px 4px; width: 250px;">
                                    <i class="fas fa-search text-muted ms-3" style="font-size: 13px;"></i>
                                    <input type="text" name="keyword" placeholder="Tìm kiếm tour..." class="form-control border-0 bg-transparent shadow-none" style="padding: 4px 10px; height: auto; font-size: 13px;" required>
                                    <!-- <button type="button" id="voice-search" class="btn btn-link text-muted p-0 me-2" style="font-size: 14px;"><i class="fa fa-microphone"></i></button> -->
                                </form>
                            </div>

                            <!-- Right Section (User / Cart) -->
                            <div class="menu-btns d-flex align-items-center">
                                <div class="user-dropdown-wrap dropdown">
                                    <a href="#" class="d-flex align-items-center text-dark text-decoration-none" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                        @if (session()->has('avatar'))
                                        @php
                                        $avatar = session()->get('avatar', 'user_avatar.jpg');
                                        @endphp
                                        <img class="rounded-circle shadow-sm" src="{{ asset('admin/assets/images/user-profile/' . $avatar) }}" style="width: 30px; height: 30px; object-fit: cover; border: 1px solid #eaeaea;">
                                        @else
                                        <div class="rounded-circle bg-light d-flex align-items-center justify-content-center shadow-sm" style="width: 30px; height: 30px; border: 1px solid #eaeaea;">
                                            <i class="fas fa-user" style="color: var(--primary-color); font-size: 14px;"></i>
                                        </div>
                                        @endif
                                        <div class="ms-2 d-none d-sm-block text-start">
                                            <span class="d-block fw-600" style="font-size: 13px; line-height: 1.2; color: var(--heading-color);">{{ session()->get('username', 'Đăng nhập') }} <i class="fas fa-angle-down ms-1" style="font-size: 10px;"></i></span>
                                        </div>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end shadow border-0" aria-labelledby="userDropdown" style="border-radius: 12px; overflow: hidden; min-width: 200px;">
                                        @if (session()->has('username'))
                                        <li><a class="dropdown-item py-2" href="{{ route('user-profile') }}"><i class="fas fa-id-card me-2 text-muted"></i>Thông tin cá nhân</a></li>
                                        <li><a class="dropdown-item py-2" href="{{ route('my-tours') }}"><i class="fas fa-suitcase-rolling me-2 text-muted"></i>Tour đã đặt</a></li>
                                        <li>
                                            <hr class="dropdown-divider m-0">
                                        </li>
                                        <li><a class="dropdown-item py-2 text-danger" href="{{ route('logout') }}"><i class="fas fa-sign-out-alt me-2"></i>Đăng xuất</a></li>
                                        @else
                                        <li><a class="dropdown-item py-2 fw-600" href="{{ route('login') }}" style="color: var(--primary-color);"><i class="fas fa-sign-in-alt me-2"></i>Đăng nhập</a></li>
                                        <li><a class="dropdown-item py-2" href="{{ route('login') }}"><i class="fas fa-user-plus me-2 text-muted"></i>Đăng ký</a></li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End Header Upper-->
        </header>