<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Registration | Premium Building & Pest Inspections</title>

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
            background: transparent;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 40px 40px 60px;
            position: relative;
            z-index: 2;
        }

        .brand-content {
            max-width: 500px;
            width: 100%;
        }

        /* =====================================================
           LOGO: SMALL SIZE + PURE WHITE + NO WHITE BACKGROUND
        ===================================================== */
        .brand-logo {
            display: inline-block;
            background: transparent !important;
            padding: 0 !important;
            margin-bottom: 20px;
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
            /* Turns logo into crisp pure white */
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
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 8px;
            text-shadow: 0 1px 3px rgba(0, 0, 0, 0.4);
        }

        .brand-content h1 {
            color: #ffffff;
            font-family: 'Montserrat', sans-serif;
            font-size: clamp(30px, 3.2vw, 42px);
            line-height: 1.1;
            font-weight: 900;
            margin: 0 0 14px;
            letter-spacing: -0.5px;
        }

        .brand-content h1 span {
            display: block;
            color: #7ee030;
        }

        .brand-description {
            max-width: 450px;
            color: rgba(255, 255, 255, 0.82);
            font-size: 12.5px;
            line-height: 1.65;
            margin-bottom: 24px;
        }

        /* TRUST ITEMS */
        .brand-trust-list {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
            max-width: 460px;
        }

        .brand-trust-item {
            display: flex;
            align-items: center;
            gap: 9px;
            color: rgba(255, 255, 255, 0.92);
            font-size: 11px;
            font-weight: 600;
            padding: 9px 12px;
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.14);
            border-radius: 6px;
            backdrop-filter: blur(8px);
            transition: all 0.2s ease;
        }

        .brand-trust-item:hover {
            background: rgba(255, 255, 255, 0.12);
            transform: translateY(-2px);
        }

        .brand-trust-item i {
            color: #7ee030;
            font-size: 15px;
            flex-shrink: 0;
        }

        /* =====================================================
           RIGHT REGISTER PANEL - COMPACT / SLEEK SIZING
        ===================================================== */
        .admin-login-panel {
            flex: 0.95;
            min-height: 100vh;
            background: transparent;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 30px 25px;
            position: relative;
            z-index: 2;
        }

        /* COMPACT CARD */
        .login-card {
            width: 100%;
            max-width: 390px;
            background: #ffffff;
            border-radius: 10px;
            padding: 22px 24px;
            box-shadow: 0 18px 45px rgba(0, 0, 0, 0.42);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        /* HEADER */
        .login-header {
            margin-bottom: 12px;
        }

        .login-header .login-label {
            color: var(--green);
            font-size: 9px;
            font-weight: 900;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            display: inline-block;
        }

        .login-header h2 {
            color: var(--navy);
            font-family: 'Montserrat', sans-serif;
            font-size: 20px;
            font-weight: 800;
            margin: 3px 0 4px;
            line-height: 1.2;
        }

        .login-header p {
            color: var(--text);
            font-size: 11.5px;
            line-height: 1.45;
            margin: 0;
        }

        /* ALERTS */
        .login-alert {
            border-radius: 5px;
            font-size: 11px;
            margin-bottom: 10px;
            padding: 7px 10px;
        }

        .login-alert ul {
            margin: 0;
            padding-left: 14px;
        }

        /* FORM */
        .login-form-group {
            margin-bottom: 9px;
        }

        .login-form-label {
            display: block;
            color: var(--navy);
            font-size: 9.5px;
            font-weight: 800;
            letter-spacing: 0.4px;
            margin-bottom: 3px;
        }

        .login-input-wrapper {
            position: relative;
        }

        .login-input-icon {
            position: absolute;
            left: 11px;
            top: 50%;
            transform: translateY(-50%);
            color: #8995A2;
            font-size: 13px;
            z-index: 2;
        }

        .login-input {
            width: 100%;
            height: 38px;
            border: 1px solid var(--border);
            border-radius: 5px;
            padding: 0 34px 0 34px;
            font-size: 12.5px;
            color: var(--navy);
            background: #fbfcfd;
            transition: all 0.2s ease;
        }

        .login-input:focus {
            outline: none;
            background: #fff;
            border-color: var(--green) !important;
            box-shadow: 0 0 0 2px rgba(72, 169, 0, 0.15) !important;
        }

        .login-input::placeholder {
            color: #9aa7b5;
            font-size: 12px;
        }

        /* PASSWORD TOGGLE */
        .password-toggle {
            position: absolute;
            right: 9px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #8995A2;
            cursor: pointer;
            padding: 2px;
            font-size: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: color 0.2s ease;
            z-index: 3;
        }

        .password-toggle:hover {
            color: var(--navy);
        }

        /* SUBMIT BUTTON */
        .login-button {
            width: 100%;
            height: 39px;
            background: var(--green);
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 12px;
            font-weight: 800;
            letter-spacing: 0.6px;
            text-transform: uppercase;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            transition: all 0.25s ease;
            box-shadow: 0 3px 10px rgba(72, 169, 0, 0.22);
            margin-top: 5px;
        }

        .login-button:hover {
            background: var(--green-dark);
            transform: translateY(-1px);
            box-shadow: 0 5px 14px rgba(72, 169, 0, 0.32);
        }

        .login-button:active {
            transform: translateY(0);
        }

        /* SWITCH TO LOGIN */
        .switch-auth-link {
            text-align: center;
            margin-top: 10px;
            padding-top: 8px;
            border-top: 1px solid var(--border);
            font-size: 11.5px;
            color: var(--text);
        }

        .switch-auth-link a {
            color: var(--blue);
            font-weight: 700;
            text-decoration: none;
            margin-left: 3px;
        }

        .switch-auth-link a:hover {
            color: var(--green);
            text-decoration: underline;
        }

        /* SECURITY FOOTER */
        .login-security {
            margin-top: 9px;
            padding: 6px 10px;
            background: #f6f8fb;
            border-radius: 4px;
            border: 1px solid #e7ecf2;
            display: flex;
            align-items: center;
            gap: 7px;
        }

        .login-security i {
            color: var(--green);
            font-size: 14px;
            flex-shrink: 0;
        }

        .login-security p {
            margin: 0;
            font-size: 10px;
            line-height: 1.35;
            color: #6d7b8b;
        }

        /* PAGE FOOTER */
        .login-page-footer {
            margin-top: 12px;
            text-align: center;
            color: rgba(255, 255, 255, 0.75);
            font-size: 11px;
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
                padding: 35px 25px 10px;
                text-align: center;
            }

            .brand-content {
                max-width: 500px;
            }

            .brand-trust-list {
                margin: 0 auto;
            }

            .admin-login-panel {
                min-height: auto;
                padding: 10px 15px 35px;
            }
        }

        @media (max-width: 575px) {
            .login-card {
                padding: 18px 16px;
            }

            .login-header h2 {
                font-size: 19px;
            }

            .brand-content h1 {
                font-size: 26px;
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
             LEFT BRAND PANEL (SMALL WHITE LOGO ON TRANSPARENT BG)
        ====================================================== -->
        <section class="admin-brand-panel">
            <div class="brand-content">

                <!-- SMALL PURE WHITE LOGO -->
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
                    Set up your administrator credentials to access and manage the
                    inspection portal, bookings, customer enquiries, and reports.
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
             RIGHT REGISTER PANEL - COMPACT / SLEEK SIZING
        ====================================================== -->
        <section class="admin-login-panel">

            <div class="login-card">

                <!-- HEADER -->
                <div class="login-header">
                    <span class="login-label">
                        ADMIN ONBOARDING
                    </span>

                    <h2>
                        Create Account
                    </h2>

                    <p>
                        Set up your administrator credentials to access the dashboard.
                    </p>
                </div>

                <!-- ERROR MESSAGE -->
                @if($errors->any())
                    <div class="alert alert-danger login-alert">
                        <div class="fw-bold mb-1">
                            <i class="bi bi-exclamation-triangle-fill me-1"></i> Registration failed
                        </div>
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- REGISTRATION FORM -->
                <form action="{{ route('register.submit') }}" method="POST" autocomplete="on">
                    @csrf

                    <!-- NAME -->
                    <div class="login-form-group">
                        <label for="name" class="login-form-label">
                            FULL NAME
                        </label>

                        <div class="login-input-wrapper">
                            <i class="bi bi-person login-input-icon"></i>

                            <input
                                type="text"
                                id="name"
                                name="name"
                                class="login-input"
                                placeholder="Enter your full name"
                                value="{{ old('name') }}"
                                autocomplete="name"
                                required
                                autofocus
                            >
                        </div>
                    </div>

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
                                placeholder="Enter your email address"
                                value="{{ old('email') }}"
                                autocomplete="email"
                                required
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
                                placeholder="Create a password (min. 8 characters)"
                                autocomplete="new-password"
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

                    <!-- CONFIRM PASSWORD -->
                    <div class="login-form-group">
                        <label for="password_confirmation" class="login-form-label">
                            CONFIRM PASSWORD
                        </label>

                        <div class="login-input-wrapper">
                            <i class="bi bi-shield-lock login-input-icon"></i>

                            <input
                                type="password"
                                id="password_confirmation"
                                name="password_confirmation"
                                class="login-input"
                                placeholder="Confirm your password"
                                autocomplete="new-password"
                                required
                            >

                            <button
                                type="button"
                                class="password-toggle"
                                id="passwordConfirmToggle"
                                aria-label="Show confirm password"
                            >
                                <i class="bi bi-eye" id="passwordConfirmIcon"></i>
                            </button>
                        </div>
                    </div>

                    <!-- SUBMIT BUTTON -->
                    <button type="submit" class="login-button">
                        <i class="bi bi-person-plus-fill"></i>
                        CREATE ADMIN ACCOUNT
                    </button>

                    <!-- SWITCH TO LOGIN -->
                    <div class="switch-auth-link">
                        Already have an admin account?
                        <a href="{{ route('login') }}">Sign In Here</a>
                    </div>

                </form>

                <!-- SECURITY -->
                <div class="login-security">
                    <i class="bi bi-shield-lock-fill"></i>
                    <p>
                        Admin access grants full administrative permissions over the inspection portal.
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
         PASSWORD SHOW / HIDE SCRIPTS
    ====================================================== -->
    <script>
        function setupPasswordToggle(inputId, toggleId, iconId) {
            const input = document.getElementById(inputId);
            const toggle = document.getElementById(toggleId);
            const icon = document.getElementById(iconId);

            if (!input || !toggle || !icon) return;

            toggle.addEventListener('click', function () {
                if (input.type === 'password') {
                    input.type = 'text';
                    icon.classList.remove('bi-eye');
                    icon.classList.add('bi-eye-slash');
                    toggle.setAttribute('aria-label', 'Hide password');
                } else {
                    input.type = 'password';
                    icon.classList.remove('bi-eye-slash');
                    icon.classList.add('bi-eye');
                    toggle.setAttribute('aria-label', 'Show password');
                }
            });
        }

        setupPasswordToggle('password', 'passwordToggle', 'passwordIcon');
        setupPasswordToggle('password_confirmation', 'passwordConfirmToggle', 'passwordConfirmIcon');
    </script>

</body>

</html>
