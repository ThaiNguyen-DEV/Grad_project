@include('clients.blocks.header')

<style>
    .auth-wrapper {
        background-color: #f8f9fa;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 50px 15px;
        font-family: 'Inter', sans-serif;
    }

    .auth-logo {
        margin-bottom: 30px;
    }

    .auth-logo img {
        max-height: 80px;
        /* Tăng kích thước logo một chút cho nổi bật */
        object-fit: contain;
    }

    .auth-card {
        background: #ffffff;
        border-radius: 16px;
        padding: 40px;
        width: 100%;
        max-width: 500px;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.04);
    }

    .auth-title {
        font-size: 24px;
        font-weight: 700;
        color: #002b5e;
        /* Vietravel blue approximation */
        text-align: center;
        margin-bottom: 30px;
    }

    .auth-form-group {
        margin-bottom: 20px;
    }

    .auth-label {
        display: flex;
        justify-content: space-between;
        font-size: 14px;
        font-weight: 500;
        color: #333;
        margin-bottom: 8px;
    }

    .auth-label .required {
        color: red;
    }

    .auth-label a {
        color: #0056b3;
        text-decoration: none;
    }

    .auth-label a:hover {
        text-decoration: underline;
    }

    .auth-input-wrapper {
        position: relative;
    }

    .auth-input {
        width: 100%;
        padding: 12px 16px;
        background-color: #f5f5f5;
        border: 1px solid transparent;
        border-radius: 24px;
        font-size: 14px;
        color: #333;
        transition: all 0.3s;
        outline: none;
    }

    .auth-input:focus {
        border-color: #0056b3;
        background-color: #fff;
    }

    .auth-input-icon {
        position: absolute;
        right: 16px;
        top: 50%;
        transform: translateY(-50%);
        color: #666;
        cursor: pointer;
    }

    .auth-recaptcha {
        display: flex;
        align-items: center;
        justify-content: space-between;
        background: #fafafa;
        border: 1px solid #e0e0e0;
        border-radius: 4px;
        padding: 10px 16px;
        margin-bottom: 24px;
    }

    .auth-recaptcha-left {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .auth-recaptcha-checkbox {
        width: 24px;
        height: 24px;
        border: 2px solid #ccc;
        border-radius: 2px;
        background: #fff;
        cursor: pointer;
    }

    .auth-recaptcha-checkbox.checked {
        background: #4285F4;
        border-color: #4285F4;
        position: relative;
    }

    .auth-recaptcha-checkbox.checked::after {
        content: '\2713';
        color: white;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 16px;
    }

    .auth-recaptcha-text {
        font-size: 14px;
        color: #333;
    }

    .auth-recaptcha-logo {
        text-align: center;
        font-size: 10px;
        color: #999;
    }

    .auth-recaptcha-logo img {
        width: 24px;
        margin-bottom: 2px;
    }

    .auth-actions {
        display: flex;
        gap: 16px;
        margin-bottom: 24px;
    }

    .auth-btn {
        flex: 1;
        padding: 12px;
        border-radius: 24px;
        font-size: 15px;
        font-weight: 600;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s;
        border: none;
    }

    .auth-btn-outline {
        background: #fff;
        color: #0056b3;
        border: 1px solid #0056b3;
    }

    .auth-btn-outline:hover {
        background: #f0f7ff;
    }

    .auth-btn-solid {
        background: #0046a6;
        /* Deep blue */
        color: #fff;
    }

    .auth-btn-solid:hover {
        background: #003380;
    }

    .auth-divider {
        display: flex;
        align-items: center;
        text-align: center;
        color: #999;
        font-size: 14px;
        margin-bottom: 24px;
    }

    .auth-divider::before,
    .auth-divider::after {
        content: '';
        flex: 1;
        border-bottom: 1px solid #e0e0e0;
    }

    .auth-divider span {
        padding: 0 16px;
        font-weight: 500;
    }

    .auth-social-btn {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 12px;
        width: 100%;
        padding: 12px;
        border-radius: 24px;
        border: 1px solid #e0e0e0;
        background: #fff;
        color: #555;
        font-size: 14px;
        font-weight: 500;
        margin-bottom: 12px;
        text-decoration: none;
        transition: all 0.3s;
    }

    .auth-social-btn:hover {
        background: #f9f9f9;
        color: #333;
    }

    .auth-social-btn img {
        width: 20px;
    }

    .auth-social-btn i.fa-facebook {
        color: #1877F2;
        font-size: 20px;
    }

    /* Hide unselected form */
    .auth-form-container {
        display: none;
    }

    .auth-form-container.active {
        display: block;
        animation: fadeIn 0.4s ease-in-out;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Validation feedback fixes */
    .invalid-feedback {
        font-size: 13px;
        color: #dc3545;
        margin-top: 5px;
    }
</style>

<div class="auth-wrapper">
    <!-- <div class="auth-logo">
        <a href="{{ route('home') }}">
            <img src="{{ asset('clients/assets/images/logos/logo.png') }}" alt="Logo" style="max-height: 100px;">
        </a>
    </div> -->

    <div class="auth-card">
        <!-- Sign In Form -->
        <div id="signin-section" class="auth-form-container active">
            <h2 class="auth-title">Đăng nhập</h2>

            <form action="{{ route('user-login') }}" method="POST" id="login-form">
                @csrf
                <div class="auth-form-group">
                    <div class="auth-label">
                        <span>Số điện thoại hoặc email <span class="required">(*)</span></span>
                    </div>
                    <div class="auth-input-wrapper">
                        <input type="text" name="username_login" id="username_login" class="auth-input" placeholder="Số điện thoại hoặc email" required>
                    </div>
                    <div class="invalid-feedback" id="validate_username"></div>
                </div>

                <div class="auth-form-group">
                    <div class="auth-label">
                        <span>Mật khẩu <span class="required">(*)</span></span>
                        <a href="#">Quên mật khẩu</a>
                    </div>
                    <div class="auth-input-wrapper">
                        <input type="password" name="password_login" id="password_login" class="auth-input" placeholder="Nhập mật khẩu" required>
                        <i class="far fa-eye auth-input-icon" id="toggle-login-password"></i>
                    </div>
                    <div class="invalid-feedback" id="validate_password"></div>
                </div>

                <!-- Fake reCAPTCHA for visual matching -->
                <!-- <div class="auth-recaptcha" onclick="this.querySelector('.auth-recaptcha-checkbox').classList.toggle('checked')">
                    <div class="auth-recaptcha-left">
                        <div class="auth-recaptcha-checkbox"></div>
                        <span class="auth-recaptcha-text">I'm not a robot</span>
                    </div>
                    <div class="auth-recaptcha-logo">
                        <img src="https://www.gstatic.com/recaptcha/api2/logo_48.png" alt="reCAPTCHA">
                        <div>reCAPTCHA</div>
                    </div>
                </div> -->

                <div class="auth-actions">
                    <button type="button" class="auth-btn auth-btn-outline" id="btn-show-signup">Đăng ký ngay</button>
                    <button type="submit" class="auth-btn auth-btn-solid" name="signin" id="signin">Đăng nhập</button>
                </div>
            </form>

            <div class="auth-divider">
                <span>Hoặc</span>
            </div>

            <a href="#" class="auth-social-btn">
                <i class="fab fa-facebook"></i> Tiếp tục với Facebook
            </a>
            <a href="{{ route('login-google') }}" class="auth-social-btn">
                <img src="https://cdn-icons-png.flaticon.com/512/2991/2991148.png" alt="Google"> Tiếp tục với Google
            </a>
        </div>

        <!-- Sign Up Form -->
        <div id="signup-section" class="auth-form-container">
            <h2 class="auth-title">Đăng ký</h2>

            <form action="{{ route('register') }}" method="POST" id="register-form">
                @csrf
                <div class="auth-form-group">
                    <div class="auth-label">
                        <span>Tên tài khoản <span class="required">(*)</span></span>
                    </div>
                    <div class="auth-input-wrapper">
                        <input type="text" name="username_register" id="username_register" class="auth-input" placeholder="Tên tài khoản" required>
                    </div>
                    <div class="invalid-feedback" id="validate_username_regis"></div>
                </div>

                <div class="auth-form-group">
                    <div class="auth-label">
                        <span>Email <span class="required">(*)</span></span>
                    </div>
                    <div class="auth-input-wrapper">
                        <input type="email" name="email_register" id="email_register" class="auth-input" placeholder="Email" required>
                    </div>
                    <div class="invalid-feedback" id="validate_email_regis"></div>
                </div>

                <div class="auth-form-group">
                    <div class="auth-label">
                        <span>Mật khẩu <span class="required">(*)</span></span>
                    </div>
                    <div class="auth-input-wrapper">
                        <input type="password" name="password_register" id="password_register" class="auth-input" placeholder="Mật khẩu" required>
                        <i class="far fa-eye auth-input-icon toggle-password" data-target="password_register"></i>
                    </div>
                    <div class="invalid-feedback" id="validate_password_regis"></div>
                </div>

                <div class="auth-form-group">
                    <div class="auth-label">
                        <span>Nhập lại mật khẩu <span class="required">(*)</span></span>
                    </div>
                    <div class="auth-input-wrapper">
                        <input type="password" name="re_pass" id="re_pass" class="auth-input" placeholder="Nhập lại mật khẩu" required>
                        <i class="far fa-eye auth-input-icon toggle-password" data-target="re_pass"></i>
                    </div>
                    <div class="invalid-feedback" id="validate_repass"></div>
                </div>

                <div class="auth-actions">
                    <button type="button" class="auth-btn auth-btn-outline" id="btn-show-signin">Trở lại Đăng nhập</button>
                    <button type="submit" class="auth-btn auth-btn-solid" name="signup" id="signup">Đăng ký</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const btnShowSignup = document.getElementById('btn-show-signup');
        const btnShowSignin = document.getElementById('btn-show-signin');
        const signinSection = document.getElementById('signin-section');
        const signupSection = document.getElementById('signup-section');

        if (btnShowSignup) {
            btnShowSignup.addEventListener('click', function() {
                signinSection.classList.remove('active');
                signupSection.classList.add('active');
            });
        }

        if (btnShowSignin) {
            btnShowSignin.addEventListener('click', function() {
                signupSection.classList.remove('active');
                signinSection.classList.add('active');
            });
        }

        // Toggle password visibility
        const toggleLoginPassword = document.getElementById('toggle-login-password');
        if (toggleLoginPassword) {
            toggleLoginPassword.addEventListener('click', function() {
                const input = document.getElementById('password_login');
                if (input.type === 'password') {
                    input.type = 'text';
                    this.classList.remove('fa-eye');
                    this.classList.add('fa-eye-slash');
                } else {
                    input.type = 'password';
                    this.classList.remove('fa-eye-slash');
                    this.classList.add('fa-eye');
                }
            });
        }

        const togglePasswords = document.querySelectorAll('.toggle-password');
        togglePasswords.forEach(function(icon) {
            icon.addEventListener('click', function() {
                const targetId = this.getAttribute('data-target');
                const input = document.getElementById(targetId);
                if (input.type === 'password') {
                    input.type = 'text';
                    this.classList.remove('fa-eye');
                    this.classList.add('fa-eye-slash');
                } else {
                    input.type = 'password';
                    this.classList.remove('fa-eye-slash');
                    this.classList.add('fa-eye');
                }
            });
        });
    });
</script>
@include('clients.blocks.footer')