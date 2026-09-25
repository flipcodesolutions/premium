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
           FULL PAGE BACKGROUND IMAGE
        ===================================================== */
        body {
            margin: 0;
            min-height: 100vh;
            font-family: 'Poppins', sans-serif;
            background:
                linear-gradient(
                    135deg,
                    rgba(8, 31, 58, 0.92),
                    rgba(14, 52, 88, 0.86)
                ),
                url('{{ asset('images/service banner.jpg') }}') center/cover no-repeat fixed;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 45px 15px;
        }

        /* =====================================================
           CONTAINER
        ===================================================== */
        .admin-login-container {
            width: 100%;
            max-width: 490px;
            margin: 0 auto;
        }

        /* =====================================================
           BRAND LOGO (PURE WHITE LOGO ON TRANSPARENT BG)
        ===================================================== */
        .brand-logo-area {
            text-align: center;
            margin-bottom: 24px;
        }

        .brand-logo-link {
            display: inline-block;
            background: transparent !important;
            padding: 0 !important;
            text-decoration: none;
            transition: transform 0.25s ease;
        }

        .brand-logo-link:hover {
            transform: scale(1.03);
        }

        .brand-white-logo {
            max-width: 270px;
            width: 100%;
            height: auto;
            display: block;
            margin: 0 auto;
            background: transparent !important;
            filter: brightness(0) invert(1) drop-shadow(0 3px 12px rgba(0, 0, 0, 0.3));
        }

        .brand-portal-badge {
            display: inline-block;
            color: #7ee030;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 2.2px;
            text-transform: uppercase;
            margin-top: 12px;
            text-shadow: 0 1px 3px rgba(0, 0, 0, 0.4);
        }

        /* =====================================================
           REGISTER CARD
        ===================================================== */
        .login-card {
            background: #ffffff;
            border-radius: 12px;
            padding: 38px 36px;
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.38);
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
            margin-top: 10px;
        }

        .login-button:hover {
            background: var(--green-dark);
            transform: translateY(-1px);
            box-shadow: 0 6px 20px rgba(72, 169, 0, 0.38);
        }

        .login-button:active {
            transform: translateY(0);
        }

        /* SWITCH TO LOGIN */
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
            margin-top: 24px;
            text-align: center;
            color: rgba(255, 255, 255, 0.75);
            font-size: 12px;
        }

        .login-page-footer strong {
            color: #ffffff;
        }

        @media (max-width: 575px) {
            .login-card {
                padding: 28px 22px;
            }

            .login-header h2 {
                font-size: 23px;
            }

            .brand-white-logo {
                max-width: 230px;
            }
        }
    </style>
</head>

<body>

    <div class="admin-login-container">

        <!-- =====================================================
             BRAND LOGO (PURE WHITE LOGO ON TRANSPARENT BG)
        ====================================================== -->
        <div class="brand-logo-area">
            <a href="{{ route('home') }}" class="brand-logo-link" title="Return to Website">
                <img
                    src="{{ asset('images/logo.png') }}"
                    alt="Premium Building & Pest Inspections"
                    class="brand-white-logo"
                >
            </a>
            <div class="brand-portal-badge">
                ADMINISTRATION PORTAL
            </div>
        </div>

        <!-- =====================================================
             REGISTER CARD
        ====================================================== -->
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
                    Set up your administrator credentials to access the Premium Building & Pest Inspections dashboard.
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
