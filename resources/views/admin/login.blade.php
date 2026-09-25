<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Login | Premium Building & Pest Inspections</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --navy: #0B1F3A;
            --blue: #123F67;
            --green: #48A900;
            --green-dark: #398700;
            --light: #F4F7FA;
            --text: #667384;
            --border: #E0E6EC;
        }

        * {
            box-sizing: border-box;
        }

        /* =====================================================
           FULL-PAGE BACKGROUND (100% SCREEN COVERAGE)
        ===================================================== */
        body {
            margin: 0;
            min-height: 100vh;
            font-family: 'Poppins', sans-serif;
            background:
                linear-gradient(
                    135deg,
                    rgba(7, 28, 52, 0.92),
                    rgba(11, 49, 88, 0.86)
                ),
                url('{{ asset('images/service banner.jpg') }}') center/cover no-repeat fixed;
        }

        .admin-login-wrapper {
            min-height: 100vh;
            width: 100%;
            display: flex;
            align-items: stretch;
            position: relative;
        }

        /* =====================================================
           LEFT BRAND PANEL
        ===================================================== */
        .admin-brand-panel {
            flex: 1.1;
            min-height: 100vh;
            background: transparent; /* Background image shines through completely */
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 60px 50px 60px 70px;
            position: relative;
            z-index: 2;
        }

        .brand-content {
            max-width: 540px;
            width: 100%;
        }

        /* =====================================================
           LOGO (NO WHITE BACKGROUND, PURE WHITE LOGO)
        ===================================================== */
        .brand-logo {
            display: inline-block;
            background: transparent !important; /* White box removed */
            padding: 0 !important;
            margin-bottom: 28px;
        }

        .brand-logo a {
            display: inline-block;
            text-decoration: none;
        }

        .brand-logo img,
        .brand-logo img.white-logo,
        img.white-logo {
            max-width: 170px !important;
            width: 170px !important;
            height: auto !important;
            display: block !important;
            background: transparent !important;
            /* Pure crisp white logo */
            filter: brightness(0) invert(1) drop-shadow(0 2px 8px rgba(0, 0, 0, 0.4)) !important;
            transition: transform 0.25s ease;
        }

        .brand-logo img:hover {
            transform: scale(1.04);
        }

        /* BRAND TEXT */
        .brand-small-title {
            display: inline-block;
            color: #7ee030;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 2.2px;
            text-transform: uppercase;
            margin-bottom: 12px;
            text-shadow: 0 1px 3px rgba(0, 0, 0, 0.4);
        }

        .brand-content h1 {
            color: #ffffff;
            font-family: 'Montserrat', sans-serif;
            font-size: clamp(34px, 3.8vw, 50px);
            line-height: 1.08;
            font-weight: 900;
            margin: 0 0 18px;
            letter-spacing: -0.5px;
        }

        .brand-content h1 span {
            display: block;
            color: #7ee030;
        }

        .brand-description {
            max-width: 480px;
            color: rgba(255, 255, 255, 0.82);
            font-size: 13.5px;
            line-height: 1.75;
            margin-bottom: 34px;
        }

        /* TRUST ITEMS */
        .brand-trust-list {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
            max-width: 500px;
        }

        .brand-trust-item {
            display: flex;
            align-items: center;
            gap: 10px;
            color: rgba(255, 255, 255, 0.92);
            font-size: 12px;
            font-weight: 600;
            padding: 12px 14px;
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.14);
            border-radius: 8px;
            backdrop-filter: blur(8px);
            transition: all 0.2s ease;
        }

        .brand-trust-item:hover {
            background: rgba(255, 255, 255, 0.12);
            transform: translateY(-2px);
        }

        .brand-trust-item i {
            color: #7ee030;
            font-size: 18px;
            flex-shrink: 0;
        }

        /* =====================================================
           RIGHT LOGIN PANEL (FLOATING WHITE CARD ON FULL BG)
        ===================================================== */
        .admin-login-panel {
            flex: 0.95;
            min-height: 100vh;
            background: transparent; /* No white background covering half screen */
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 50px 40px;
            position: relative;
            z-index: 2;
        }

        .login-card {
            width: 100%;
            max-width: 450px;
            background: #ffffff;
            border-radius: 12px;
            padding: 38px 36px;
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.45);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        /* HEADER */
        .login-header {
            margin-bottom: 22px;
        }

        .login-header .login-label {
            color: var(--green);
            font-size: 10px;
            font-weight: 900;
            letter-spacing: 1.8px;
            text-transform: uppercase;
            display: inline-block;
        }

        .login-header h2 {
            color: var(--navy);
            font-family: 'Montserrat', sans-serif;
            font-size: 27px;
            font-weight: 800;
            margin: 6px 0 8px;
            line-height: 1.2;
        }

        .login-header p {
            color: var(--text);
            font-size: 13px;
            line-height: 1.6;
            margin: 0;
        }

        /* ALERTS */
        .login-alert {
            border-radius: 6px;
            font-size: 12px;
            margin-bottom: 20px;
            padding: 12px 14px;
        }

        .login-alert ul {
            margin: 0;
            padding-left: 17px;
        }

        /* FORM */
        .login-form-group {
            margin-bottom: 18px;
        }

        .login-form-label {
            display: block;
            color: var(--navy);
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 0.5px;
            margin-bottom: 7px;
        }

        .login-input-wrapper {
            position: relative;
        }

        .login-input-icon {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #8995A2;
            font-size: 16px;
            z-index: 2;
        }

        .login-input {
            width: 100%;
            height: 48px;
            border: 1px solid var(--border);
            border-radius: 6px;
            padding: 0 42px 0 42px;
            font-size: 14px;
            color: var(--navy);
            background: #fbfcfd;
            transition: all 0.2s ease;
        }

        .login-input:focus {
            outline: none;
            background: #fff;
            border-color: var(--green) !important;
            box-shadow: 0 0 0 3px rgba(72, 169, 0, 0.15) !important;
        }

        .login-input::placeholder {
            color: #9aa7b5;
            font-size: 13.5px;
        }

        /* PASSWORD TOGGLE */
        .password-toggle {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #8995A2;
            cursor: pointer;
            padding: 4px;
            font-size: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: color 0.2s ease;
            z-index: 3;
        }

        .password-toggle:hover {
            color: var(--navy);
        }

        /* OPTIONS */
        .login-options {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 22px;
            font-size: 12.5px;
        }

        .remember-check {
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            color: var(--text);
            margin: 0;
            user-select: none;
        }

        .remember-check input {
            accent-color: var(--green);
            width: 15px;
            height: 15px;
            cursor: pointer;
        }

        .forgot-link {
            color: var(--blue);
            text-decoration: none;
            font-weight: 600;
            transition: color 0.2s ease;
        }

        .forgot-link:hover {
            color: var(--green);
            text-decoration: underline;
        }

        /* SUBMIT BUTTON */
        .login-button {
            width: 100%;
            height: 48px;
            background: var(--green);
            color: #fff;
            border: none;
            border-radius: 6px;
            font-size: 13.5px;
            font-weight: 800;
            letter-spacing: 0.8px;
            text-transform: uppercase;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: all 0.25s ease;
            box-shadow: 0 4px 14px rgba(72, 169, 0, 0.28);
        }

        .login-button:hover {
            background: var(--green-dark);
            transform: translateY(-1px);
            box-shadow: 0 6px 20px rgba(72, 169, 0, 0.38);
        }

        .login-button:active {
            transform: translateY(0);
        }

        /* SWITCH TO REGISTER */
        .switch-auth-link {
            text-align: center;
            margin-top: 18px;
            padding-top: 16px;
            border-top: 1px solid var(--border);
            font-size: 13px;
            color: var(--text);
        }

        .switch-auth-link a {
            color: var(--blue);
            font-weight: 700;
            text-decoration: none;
            margin-left: 4px;
        }

        .switch-auth-link a:hover {
            color: var(--green);
            text-decoration: underline;
        }

        /* SECURITY FOOTER INSIDE CARD */
        .login-security {
            margin-top: 20px;
            padding: 12px 14px;
            background: #f6f8fb;
            border-radius: 6px;
            border: 1px solid #e7ecf2;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .login-security i {
            color: var(--green);
            font-size: 18px;
            flex-shrink: 0;
        }

        .login-security p {
            margin: 0;
            font-size: 11px;
            line-height: 1.5;
            color: #6d7b8b;
        }

        /* PAGE FOOTER */
        .login-page-footer {
            margin-top: 20px;
            text-align: center;
            color: rgba(255, 255, 255, 0.75);
            font-size: 12px;
        }

        .login-page-footer strong {
            color: #ffffff;
        }

        /* RESPONSIVE */
        @media (max-width: 991px) {
            .admin-login-wrapper {
                flex-direction: column;
            }

            .admin-brand-panel {
                min-height: auto;
                padding: 50px 30px 20px;
                text-align: center;
            }

            .brand-content {
                max-width: 600px;
            }

            .brand-trust-list {
                margin: 0 auto;
            }

            .admin-login-panel {
                min-height: auto;
                padding: 20px 20px 50px;
            }
        }

        @media (max-width: 575px) {
            .login-card {
                padding: 28px 22px;
            }

            .login-header h2 {
                font-size: 23px;
            }

            .brand-content h1 {
                font-size: 30px;
            }

            .brand-trust-list {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

    <div class="admin-login-wrapper">

        <!-- =====================================================
             LEFT BRAND PANEL (WHITE LOGO ON TRANSPARENT BG)
        ====================================================== -->
        <section class="admin-brand-panel">
            <div class="brand-content">

                <!-- PURE WHITE LOGO -->
                <div class="brand-logo">
                    <a href="{{ route('home') }}" title="Return to Website">
                        <img
                            src="{{ asset('images/logo.png') }}"
                            alt="Premium Building & Pest Inspections"
                            class="white-logo"
                            style="max-width: 170px !important; width: 170px !important; height: auto !important; filter: brightness(0) invert(1) !important; background: transparent !important; display: block;"
                        >
                    </a>
                </div>

                <span class="brand-small-title">
                    ADMINISTRATION PORTAL
                </span>

                <h1>
                    PREMIUM BUILDING
                    <span>&amp; PEST INSPECTIONS</span>
                </h1>

                <p class="brand-description">
                    Manage your inspection services, enquiries, bookings,
                    customers, reviews and website content from one secure
                    administration dashboard.
                </p>

                <!-- 4 TRUST ITEMS -->
                <div class="brand-trust-list">
                    <div class="brand-trust-item">
                        <i class="bi bi-shield-check"></i>
                        <span>Secure Admin Access</span>
                    </div>

                    <div class="brand-trust-item">
                        <i class="bi bi-speedometer2"></i>
                        <span>Centralised Dashboard</span>
                    </div>

                    <div class="brand-trust-item">
                        <i class="bi bi-calendar-check"></i>
                        <span>Manage Bookings</span>
                    </div>

                    <div class="brand-trust-item">
                        <i class="bi bi-chat-square-text"></i>
                        <span>Manage Enquiries</span>
                    </div>
                </div>

            </div>
        </section>

        <!-- =====================================================
             RIGHT LOGIN PANEL (FLOATING WHITE CARD OVER FULL BG)
        ====================================================== -->
        <section class="admin-login-panel">

            <div class="login-card">

                <!-- HEADER -->
                <div class="login-header">
                    <span class="login-label">
                        ADMIN PORTAL
                    </span>

                    <h2>
                        Welcome Back
                    </h2>

                    <p>
                        Sign in to access your Premium Building & Pest Inspections administration dashboard.
                    </p>
                </div>

                <!-- SUCCESS MESSAGE -->
                @if(session('success'))
                    <div class="alert alert-success login-alert">
                        <i class="bi bi-check-circle-fill me-1"></i>
                        {{ session('success') }}
                    </div>
                @endif

                <!-- ERROR MESSAGE -->
                @if($errors->any())
                    <div class="alert alert-danger login-alert">
                        <div class="fw-bold mb-1">
                            <i class="bi bi-exclamation-triangle-fill me-1"></i> Login failed
                        </div>
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- LOGIN FORM -->
                <form action="{{ route('login') }}" method="POST" autocomplete="on">
                    @csrf

                    <!-- EMAIL -->
                    <div class="login-form-group">
                        <label for="email" class="login-form-label">
                            EMAIL ADDRESS
                        </label>

                        <div class="login-input-wrapper">
                            <i class="bi bi-envelope login-input-icon"></i>

                            <input
                                type="email"
                                id="email"
                                name="email"
                                class="login-input"
                                placeholder="Enter your admin email"
                                value="{{ old('email', session('registered_email')) }}"
                                autocomplete="email"
                                required
                                autofocus
                            >
                        </div>
                    </div>

                    <!-- PASSWORD -->
                    <div class="login-form-group">
                        <label for="password" class="login-form-label">
                            PASSWORD
                        </label>

                        <div class="login-input-wrapper">
                            <i class="bi bi-lock login-input-icon"></i>

                            <input
                                type="password"
                                id="password"
                                name="password"
                                class="login-input"
                                placeholder="Enter your password"
                                autocomplete="current-password"
                                required
                            >

                            <button
                                type="button"
                                class="password-toggle"
                                id="passwordToggle"
                                aria-label="Show password"
                            >
                                <i class="bi bi-eye" id="passwordIcon"></i>
                            </button>
                        </div>
                    </div>

                    <!-- OPTIONS -->
                    <div class="login-options">
                        <label class="remember-check">
                            <input
                                type="checkbox"
                                name="remember"
                                value="1"
                                {{ old('remember') ? 'checked' : '' }}
                            >
                            <span>Remember me</span>
                        </label>

                        <a href="#" class="forgot-link" onclick="return false;">
                            Forgot Password?
                        </a>
                    </div>

                    <!-- LOGIN BUTTON -->
                    <button type="submit" class="login-button">
                        <i class="bi bi-box-arrow-in-right"></i>
                        SIGN IN TO ADMIN PANEL
                    </button>

                    <!-- SWITCH TO REGISTER -->
                    <div class="switch-auth-link">
                        Don't have an admin account?
                        <a href="{{ route('register') }}">Create an Account</a>
                    </div>

                </form>

                <!-- SECURITY -->
                <div class="login-security">
                    <i class="bi bi-shield-lock-fill"></i>
                    <p>
                        Restricted administration area. Authorised administrators only.
                    </p>
                </div>

            </div>

            <!-- FOOTER -->
            <div class="login-page-footer">
                <p>
                    © {{ date('Y') }} <strong>Premium Building & Pest Inspections</strong>. All rights reserved.
                </p>
            </div>

        </section>

    </div>

    <!-- =====================================================
         PASSWORD SHOW / HIDE SCRIPT
    ====================================================== -->
    <script>
        const passwordInput = document.getElementById('password');
        const passwordToggle = document.getElementById('passwordToggle');
        const passwordIcon = document.getElementById('passwordIcon');

        passwordToggle.addEventListener('click', function () {
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                passwordIcon.classList.remove('bi-eye');
                passwordIcon.classList.add('bi-eye-slash');
                passwordToggle.setAttribute('aria-label', 'Hide password');
            } else {
                passwordInput.type = 'password';
                passwordIcon.classList.remove('bi-eye-slash');
                passwordIcon.classList.add('bi-eye');
                passwordToggle.setAttribute('aria-label', 'Show password');
            }
        });
    </script>

</body>

</html>