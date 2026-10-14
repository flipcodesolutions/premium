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
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

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
           FULL-PAGE BACKGROUND (100% SCREEN COVERAGE, NO SCROLL)
        ===================================================== */
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
            overflow: hidden; /* Prevent desktop scrollbar completely */
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            background:
                linear-gradient(
                    135deg,
                    rgba(7, 28, 52, 0.92),
                    rgba(11, 49, 88, 0.86)
                ),
                url('{{ asset('images/service banner.jpg') }}') center/cover no-repeat fixed;
        }

        .admin-login-wrapper {
            height: 100vh;
            max-height: 100vh;
            width: 100%;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        /* =====================================================
           LEFT BRAND PANEL
        ===================================================== */
        .admin-brand-panel {
            flex: 1.1;
            height: 100vh;
            max-height: 100vh;
            background: transparent;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px 40px 24px 60px;
            position: relative;
            z-index: 2;
        }

        .brand-content {
            max-width: 520px;
            width: 100%;
        }

        /* =====================================================
           LOGO (PURE WHITE LOGO ON TRANSPARENT BG)
        ===================================================== */
        .brand-logo {
            display: inline-block;
            background: transparent !important;
            padding: 0 !important;
            margin-bottom: 18px;
        }

        .brand-logo a {
            display: inline-block;
            text-decoration: none;
        }

        .brand-logo img,
        .brand-logo img.white-logo,
        img.white-logo {
            max-width: 155px !important;
            width: 155px !important;
            height: auto !important;
            display: block !important;
            background: transparent !important;
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
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 8px;
            text-shadow: 0 1px 3px rgba(0, 0, 0, 0.4);
        }

        .brand-content h1 {
            color: #ffffff;
            font-family: 'Inter', sans-serif;
            font-size: clamp(28px, 3.2vw, 42px);
            line-height: 1.1;
            font-weight: 900;
            margin: 0 0 12px;
            letter-spacing: -0.5px;
        }

        .brand-content h1 span {
            display: block;
            color: #7ee030;
        }

        .brand-description {
            max-width: 480px;
            color: rgba(255, 255, 255, 0.82);
            font-size: 13px;
            line-height: 1.6;
            margin-bottom: 22px;
        }

        /* TRUST ITEMS */
        .brand-trust-list {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
            max-width: 490px;
        }

        .brand-trust-item {
            display: flex;
            align-items: center;
            gap: 10px;
            color: rgba(255, 255, 255, 0.92);
            font-size: 12px;
            font-weight: 600;
            padding: 10px 14px;
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
            font-size: 17px;
            flex-shrink: 0;
        }

        /* =====================================================
           RIGHT LOGIN PANEL (FLOATING WHITE CARD ON FULL BG)
        ===================================================== */
        .admin-login-panel {
            flex: 0.95;
            height: 100vh;
            max-height: 100vh;
            background: transparent;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 16px 36px;
            position: relative;
            z-index: 2;
        }

        .login-card {
            width: 100%;
            max-width: 430px;
            background: #ffffff;
            border-radius: 12px;
            padding: 26px 30px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.45);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        /* HEADER */
        .login-header {
            margin-bottom: 14px;
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
            font-family: 'Inter', sans-serif;
            font-size: 24px;
            font-weight: 800;
            margin: 3px 0 5px;
            line-height: 1.2;
        }

        .login-header p {
            color: var(--text);
            font-size: 12.5px;
            line-height: 1.45;
            margin: 0;
        }

        /* ALERTS */
        .login-alert {
            border-radius: 6px;
            font-size: 12px;
            margin-bottom: 12px;
            padding: 8px 12px;
        }

        .login-alert ul {
            margin: 0;
            padding-left: 16px;
        }

        /* FORM */
        .login-form-group {
            margin-bottom: 12px;
        }

        .login-form-label {
            display: block;
            color: var(--navy);
            font-size: 10.5px;
            font-weight: 800;
            letter-spacing: 0.5px;
            margin-bottom: 4px;
        }

        .login-input-wrapper {
            position: relative;
        }

        .login-input-icon {
            position: absolute;
            left: 13px;
            top: 50%;
            transform: translateY(-50%);
            color: #8995A2;
            font-size: 15px;
            z-index: 2;
        }

        .login-input {
            width: 100%;
            height: 42px;
            border: 1px solid var(--border);
            border-radius: 6px;
            padding: 0 38px 0 38px;
            font-size: 13.5px;
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
            font-size: 13px;
        }

        /* PASSWORD TOGGLE */
        .password-toggle {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #8995A2;
            cursor: pointer;
            padding: 4px;
            font-size: 15px;
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
            margin-bottom: 14px;
            font-size: 12px;
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
            width: 14px;
            height: 14px;
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
            height: 44px;
            background: var(--green);
            color: #fff;
            border: none;
            border-radius: 6px;
            font-size: 13px;
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

        /* SECURITY FOOTER INSIDE CARD */
        .login-security {
            margin-top: 12px;
            padding: 8px 12px;
            background: #f6f8fb;
            border-radius: 6px;
            border: 1px solid #e7ecf2;
            display: flex;
            align-items: center;
            gap: 9px;
        }

        .login-security i {
            color: var(--green);
            font-size: 16px;
            flex-shrink: 0;
        }

        .login-security p {
            margin: 0;
            font-size: 11px;
            line-height: 1.4;
            color: #6d7b8b;
        }

        /* PAGE FOOTER */
        .login-page-footer {
            margin-top: 12px;
            text-align: center;
            color: rgba(255, 255, 255, 0.75);
            font-size: 11.5px;
        }

        .login-page-footer p {
            margin: 0;
        }

        .login-page-footer strong {
            color: #ffffff;
        }

        /* =====================================================
           COMPACT VIEWPORT HEIGHT FIX (< 760px HEIGHT)
        ===================================================== */
        @media (min-width: 992px) and (max-height: 760px) {
            .admin-brand-panel {
                padding: 16px 30px 16px 50px;
            }

            .brand-logo {
                margin-bottom: 12px;
            }

            .brand-logo img,
            .brand-logo img.white-logo,
            img.white-logo {
                max-width: 135px !important;
                width: 135px !important;
            }

            .brand-content h1 {
                font-size: 30px;
                margin-bottom: 8px;
            }

            .brand-description {
                font-size: 12px;
                line-height: 1.5;
                margin-bottom: 14px;
            }

            .brand-trust-item {
                padding: 7px 10px;
                font-size: 11px;
            }

            .admin-login-panel {
                padding: 10px 24px;
            }

            .login-card {
                padding: 20px 24px;
                max-width: 410px;
            }

            .login-header {
                margin-bottom: 10px;
            }

            .login-header h2 {
                font-size: 21px;
                margin: 2px 0 3px;
            }

            .login-header p {
                font-size: 11.5px;
            }

            .login-alert {
                margin-bottom: 8px;
                padding: 6px 10px;
                font-size: 11px;
            }

            .login-form-group {
                margin-bottom: 9px;
            }

            .login-input {
                height: 38px;
                font-size: 13px;
            }

            .login-options {
                margin-bottom: 10px;
                font-size: 11.5px;
            }

            .login-button {
                height: 38px;
                font-size: 12px;
            }

            .login-security {
                margin-top: 8px;
                padding: 6px 10px;
            }

            .login-page-footer {
                margin-top: 8px;
                font-size: 11px;
            }
        }

        /* =====================================================
           RESPONSIVE (MOBILE & TABLETS)
        ===================================================== */
        @media (max-width: 991px) {
            html,
            body {
                height: auto;
                min-height: 100vh;
                overflow-x: hidden;
                overflow-y: auto !important; /* Allow natural scroll on mobile */
            }

            .admin-login-wrapper {
                height: auto;
                min-height: 100vh;
                max-height: none;
                flex-direction: column;
                overflow: visible;
            }

            .admin-brand-panel {
                height: auto;
                min-height: auto;
                padding: 40px 25px 20px;
                text-align: center;
            }

            .brand-content {
                max-width: 600px;
            }

            .brand-trust-list {
                margin: 0 auto;
            }

            .admin-login-panel {
                height: auto;
                min-height: auto;
                padding: 15px 20px 40px;
            }
        }

        @media (max-width: 575px) {
            .login-card {
                padding: 24px 20px;
            }

            .login-header h2 {
                font-size: 21px;
            }

            .brand-content h1 {
                font-size: 28px;
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
                                value="{{ old('email') }}"
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