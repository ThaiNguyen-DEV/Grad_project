<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Đăng nhập - LOTUSMILE Admin</title>

    <link href="{{ asset('admin/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <link href="{{ asset('admin/assets/css/custom-css.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/assets/css/admin-saas.css') }}" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Be Vietnam Pro', sans-serif;
            min-height: 100vh;
            display: flex;
            background: #f0f4f8;
        }

        /* ── Left panel ── */
        .panel-left {
            width: 55%;
            background: linear-gradient(145deg, #0a2342 0%, #1a4a7a 50%, #0d3460 100%);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 60px 50px;
            position: relative;
            overflow: hidden;
        }

        .panel-left::before {
            content: '';
            position: absolute;
            width: 500px;
            height: 500px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.04);
            top: -100px;
            left: -100px;
        }

        .panel-left::after {
            content: '';
            position: absolute;
            width: 350px;
            height: 350px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.04);
            bottom: -80px;
            right: -80px;
        }

        .panel-left .brand {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 60px;
            position: relative;
            z-index: 1;
        }

        .panel-left .brand-icon {
            width: 52px;
            height: 52px;
            background: rgba(255, 255, 255, 0.15);
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .panel-left .brand-icon i {
            font-size: 24px;
            color: #fff;
        }

        .panel-left .brand-name {
            font-size: 22px;
            font-weight: 700;
            color: #fff;
            letter-spacing: 1px;
        }

        .panel-left .brand-name span {
            color: #64b5f6;
        }

        .panel-left .hero-text {
            text-align: center;
            position: relative;
            z-index: 1;
        }

        .panel-left .hero-text h1 {
            font-size: 38px;
            font-weight: 700;
            color: #fff;
            line-height: 1.25;
            margin-bottom: 16px;
        }

        .panel-left .hero-text h1 span {
            color: #64b5f6;
        }

        .panel-left .hero-text p {
            font-size: 15px;
            color: rgba(255, 255, 255, 0.6);
            line-height: 1.7;
            max-width: 340px;
            margin: 0 auto 40px;
        }

        .stat-grid {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 16px;
            width: 100%;
            max-width: 380px;
            position: relative;
            z-index: 1;
        }

        .stat-card {
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.12);
            border-radius: 12px;
            padding: 16px 12px;
            text-align: center;
            backdrop-filter: blur(10px);
        }

        .stat-card .num {
            font-size: 22px;
            font-weight: 700;
            color: #64b5f6;
            display: block;
        }

        .stat-card .lbl {
            font-size: 11px;
            color: rgba(255, 255, 255, 0.5);
            margin-top: 2px;
            display: block;
        }

        /* ── Right panel ── */
        .panel-right {
            width: 45%;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 60px 50px;
            background: #fff;
        }

        .login-box {
            width: 100%;
            max-width: 380px;
        }

        .login-box .greeting {
            margin-bottom: 36px;
        }

        .login-box .greeting h2 {
            font-size: 28px;
            font-weight: 700;
            color: #0a2342;
            margin-bottom: 6px;
        }

        .login-box .greeting p {
            font-size: 14px;
            color: #8a9ab0;
        }

        .form-label-custom {
            font-size: 13px;
            font-weight: 600;
            color: #4a5568;
            margin-bottom: 6px;
            display: block;
        }

        .input-wrap {
            position: relative;
            margin-bottom: 20px;
        }

        .input-wrap .icon {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #b0bcc8;
            font-size: 15px;
            pointer-events: none;
        }

        .input-wrap input {
            width: 100%;
            padding: 12px 14px 12px 40px;
            border: 1.5px solid #e2e8f0;
            border-radius: 10px;
            font-size: 14px;
            font-family: 'Be Vietnam Pro', sans-serif;
            color: #0a2342;
            background: #f8fafc;
            transition: all 0.2s;
            outline: none;
        }

        .input-wrap input:focus {
            border-color: #1a4a7a;
            background: #fff;
            box-shadow: 0 0 0 3px rgba(26, 74, 122, 0.08);
        }

        .input-wrap input::placeholder {
            color: #b0bcc8;
        }

        .btn-login {
            width: 100%;
            padding: 13px;
            background: linear-gradient(135deg, #0a2342, #1a4a7a);
            color: #fff;
            border: none;
            border-radius: 10px;
            font-size: 15px;
            font-weight: 600;
            font-family: 'Be Vietnam Pro', sans-serif;
            cursor: pointer;
            transition: all 0.25s;
            margin-top: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-login:hover {
            background: linear-gradient(135deg, #0d2d54, #1f5491);
            transform: translateY(-1px);
            box-shadow: 0 6px 20px rgba(10, 35, 66, 0.25);
        }

        .btn-login:active {
            transform: translateY(0);
        }

        .divider {
            display: flex;
            align-items: center;
            gap: 12px;
            margin: 24px 0;
            color: #c5ced8;
            font-size: 12px;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: #e8edf2;
        }

        .footer-note {
            text-align: center;
            margin-top: 32px;
            font-size: 12px;
            color: #a0aab4;
        }

        @media (max-width: 768px) {
            .panel-left {
                display: none;
            }

            .panel-right {
                width: 100%;
                padding: 40px 24px;
            }
        }
    </style>
</head>

<body>

    {{-- Left panel --}}
    <div class="panel-left">
        <div class="brand">
            <div class="brand-icon"><i class="fa fa-paper-plane"></i></div>
            <div class="brand-name">LOTUS<span>SMILE</span></div>
        </div>

        <div class="hero-text">
            <h1>Hệ thống<br>quản trị <span>du lịch</span></h1>
            <p>Quản lý toàn bộ hoạt động đặt tour, khách hàng và doanh thu tại một nơi duy nhất.</p>
        </div>

        <div class="stat-grid">
            <div class="stat-card">
                <span class="num">500+</span>
                <span class="lbl">Tour đang mở</span>
            </div>
            <div class="stat-card">
                <span class="num">12K</span>
                <span class="lbl">Khách hàng</span>
            </div>
            <div class="stat-card">
                <span class="num">98%</span>
                <span class="lbl">Hài lòng</span>
            </div>
        </div>
    </div>

    {{-- Right panel --}}
    <div class="panel-right">
        <div class="login-box">
            <div class="greeting">
                <h2>Xin chào 👋</h2>
                <p>Đăng nhập để tiếp tục vào trang quản trị</p>
            </div>

            <form action="{{ route('admin.login-account') }}" method="POST" id="formLoginAdmin">
                @csrf

                <label class="form-label-custom">Tên đăng nhập</label>
                <div class="input-wrap">
                    <i class="fa fa-user icon"></i>
                    <input type="text" name="username" id="username" placeholder="Nhập tên đăng nhập" required>
                </div>

                <label class="form-label-custom">Mật khẩu</label>
                <div class="input-wrap">
                    <i class="fa fa-lock icon"></i>
                    <input type="password" name="password" id="password" placeholder="Nhập mật khẩu" required>
                </div>

                <button type="submit" class="btn-login">
                    <i class="fa fa-sign-in"></i> Đăng nhập hệ thống
                </button>
            </form>

            <div class="divider">LOTUSMILE Admin v1.0</div>

            <div class="footer-note">
                © {{ date('Y') }} LOTUSMILE. Dành riêng cho quản trị viên.
            </div>
        </div>
    </div>

    <script src="{{ asset('admin/vendors/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="{{ asset('admin/assets/js/custom-js.js') }}"></script>
</body>

</html>