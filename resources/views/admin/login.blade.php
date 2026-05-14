<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Đăng nhập</title>

    <!-- Bootstrap -->
    <link href="{{ asset('admin/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('admin/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('admin/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- Animate.css -->
    <link href="{{ asset('admin/vendors/animate.css/animate.min.css') }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset('admin/build/css/custom.min.css') }}" rel="stylesheet">
    <!-- Import CSS for Toastr -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    {{-- Custom css by DevDien  --}}
    <link href="{{ asset('admin/assets/css/custom-css.css') }}" rel="stylesheet" />
    {{-- SaaS Theme Override --}}
    <link href="{{ asset('admin/assets/css/admin-saas.css') }}" rel="stylesheet" />

    <style>
        body.login {
            background: var(--bg-color);
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
            font-family: 'Inter', sans-serif;
        }
        .login_wrapper {
            max-width: 400px;
            width: 100%;
            margin: 0 auto;
        }
        .login_content {
            background: #fff;
            padding: 40px;
            border-radius: 16px;
            box-shadow: var(--shadow-md);
            text-shadow: none;
        }
        .login_content h1 {
            color: var(--primary-color);
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 30px;
            letter-spacing: -0.5px;
            text-align: center;
        }
        .login_content input[type="text"],
        .login_content input[type="password"] {
            border-radius: 8px;
            box-shadow: none;
            border: 1px solid var(--border-color);
            padding: 12px 15px;
            height: auto;
            margin-bottom: 20px;
        }
        .login_content input[type="text"]:focus,
        .login_content input[type="password"]:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(44, 62, 80, 0.1);
        }
        .login_content .btn-submit {
            background: var(--primary-color);
            color: #fff;
            border-radius: 8px;
            padding: 12px;
            width: 100%;
            font-weight: 600;
            font-size: 16px;
            border: none;
            transition: all 0.3s ease;
            margin: 0;
            text-shadow: none;
        }
        .login_content .btn-submit:hover {
            background: #1a252f;
            transform: translateY(-1px);
        }
        .login_content form {
            margin: 0;
        }
        .logo-placeholder {
            text-align: center;
            margin-bottom: 20px;
        }
        .logo-placeholder i {
            font-size: 48px;
            color: var(--primary-color);
        }
    </style>
</head>

<body class="login">
    <div>
        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <div class="logo-placeholder">
                        <i class="fa fa-plane"></i>
                    </div>
                    <form action="{{ route('admin.login-account') }}" method="POST" id="formLoginAdmin">
                        <h1>Quản trị viên</h1>
                        @csrf
                        <div>
                            <input type="text" class="form-control" name="username" id="username"
                                placeholder="Tên đăng nhập" required />
                        </div>
                        <div>
                            <input type="password" class="form-control" name="password" id="password"
                                placeholder="Mật khẩu" required />
                        </div>
                        <div>
                            <button class="btn btn-submit" type="submit">Đăng nhập hệ thống</button>
                        </div>
                        <div class="clearfix"></div>
                    </form>
                </section>
            </div>
        </div>
    </div>
    
    <!-- Scripts -->
    <script src="{{ asset('admin/vendors/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="{{ asset('admin/assets/js/custom-js.js') }}"></script>
</body>
</html>
