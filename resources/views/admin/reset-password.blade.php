<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Set New Password | Premium Building & Pest Inspections</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Google Font: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <style>
        :root {
            --brand-green: #499B08;
            --brand-green-hover: #3e8506;
            --brand-green-light: #5ab80d;
            --brand-green-glow: rgba(73, 155, 8, 0.35);
            --brand-navy: #063464;
            --brand-navy-dark: #05213F;
            --brand-navy-deep: #031427;
            --brand-navy-light: #0d4680;
            --text-main: #0F172A;
            --text-muted: #64748B;
            --border-color: #E2E8F0;
            --card-bg: #FFFFFF;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html,
        body {
            height: 100%;
            width: 100%;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            color: #FFFFFF;
            background-color: var(--brand-navy-dark);
            overflow-x: hidden;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        @media (min-width: 992px) {
            body {
                overflow: hidden;
            }
        }

        .login-universe {
            position: relative;
            min-height: 100vh;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            background:
                radial-gradient(circle at 12% 20%, rgba(73, 155, 8, 0.18) 0%, transparent 40%),
                radial-gradient(circle at 88% 85%, rgba(13, 70, 128, 0.35) 0%, transparent 45%),
                radial-gradient(circle at 50% 50%, rgba(6, 52, 100, 0.55) 0%, transparent 70%),
                linear-gradient(
                    135deg,
                    rgba(3, 20, 39, 0.94) 0%,
                    rgba(5, 33, 63, 0.90) 50%,
                    rgba(6, 52, 100, 0.88) 100%
                ),
                url('{{ asset('images/service banner.jpg') }}') center center / cover no-repeat fixed;
        }

        .login-universe::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image:
                linear-gradient(rgba(255, 255, 255, 0.025) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255, 255, 255, 0.025) 1px, transparent 1px);
            background-size: 48px 48px;
            pointer-events: none;
            z-index: 1;
        }

        .ambient-flare {
            position: absolute;
            width: 500px;
            height: 500px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(73, 155, 8, 0.14) 0%, rgba(73, 155, 8, 0) 70%);
            top: -100px;
            left: -100px;
            filter: blur(60px);
            pointer-events: none;
            z-index: 1;
        }

        .portal-container {
            position: relative;
            z-index: 2;
            width: 100%;
            max-width: 1280px;
            padding: 30px 40px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 50px;
        }

        .brand-hero-section {
            flex: 1.15;
            max-width: 620px;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            text-align: left;
            animation: fadeInHero 0.7s cubic-bezier(0.16, 1, 0.3, 1);
        }

        @keyframes fadeInHero {
            from {
                opacity: 0;
                transform: translateX(-24px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .status-capsule {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.16);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            padding: 6px 14px;
            border-radius: 50px;
            margin-bottom: 22px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .pulse-beacon {
            position: relative;
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background-color: #52c41a;
        }

        .pulse-beacon::after {
            content: '';
            position: absolute;
            inset: -4px;
            border-radius: 50%;
            background-color: rgba(82, 196, 26, 0.5);
            animation: pulseWave 2s infinite ease-out;
        }

        @keyframes pulseWave {
            0% {
                transform: scale(0.8);
                opacity: 1;
            }
            100% {
                transform: scale(2.4);
                opacity: 0;
            }
        }

        .status-text {
            font-size: 11.5px;
            font-weight: 700;
            letter-spacing: 0.6px;
            color: rgba(255, 255, 255, 0.95);
            text-transform: uppercase;
        }

        .status-divider {
            color: rgba(255, 255, 255, 0.35);
            font-size: 10px;
        }

        .status-highlight {
            color: #7ee030;
            font-weight: 600;
            font-size: 11.5px;
        }

        .brand-logo-holder {
            margin-bottom: 22px;
            display: block;
            width: 100%;
            text-align: left;
        }

        .brand-logo-img {
            max-width: 195px;
            width: 195px;
            height: auto;
            display: block;
            filter: brightness(0) invert(1) drop-shadow(0 4px 14px rgba(0, 0, 0, 0.5));
        }

        .hero-headline {
            font-size: clamp(32px, 3.4vw, 44px);
            font-weight: 900;
            line-height: 1.15;
            letter-spacing: -0.8px;
            margin-bottom: 14px;
            color: #FFFFFF;
        }

        .hero-headline .text-brand-accent {
            color: #7ee030;
            background: linear-gradient(135deg, #7ee030 0%, #499B08 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            display: block;
        }

        .hero-subhead {
            font-size: 14px;
            line-height: 1.65;
            color: rgba(255, 255, 255, 0.82);
            max-width: 510px;
            margin-bottom: 26px;
            font-weight: 400;
        }

        .auth-card-section {
            flex: 0.95;
            max-width: 440px;
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            animation: fadeInCard 0.7s cubic-bezier(0.16, 1, 0.3, 1);
        }

        @keyframes fadeInCard {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .glass-auth-card {
            width: 100%;
            background: #FFFFFF;
            border-radius: 20px;
            padding: 34px 34px 28px;
            box-shadow:
                0 25px 65px -12px rgba(0, 15, 40, 0.65),
                0 4px 20px rgba(0, 0, 0, 0.12);
            border: 1px solid rgba(255, 255, 255, 0.4);
            position: relative;
            overflow: hidden;
        }

        .glass-auth-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #499B08 0%, #063464 60%, #499B08 100%);
        }

        .card-auth-header {
            margin-bottom: 20px;
        }

        .portal-label-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(73, 155, 8, 0.10);
            color: var(--brand-green);
            font-size: 10.5px;
            font-weight: 800;
            letter-spacing: 1.4px;
            text-transform: uppercase;
            padding: 5px 11px;
            border-radius: 6px;
            margin-bottom: 10px;
            border: 1px solid rgba(73, 155, 8, 0.2);
        }

        .card-auth-header h2 {
            font-size: 25px;
            font-weight: 800;
            color: var(--brand-navy-dark);
            margin: 0 0 6px;
            letter-spacing: -0.4px;
            line-height: 1.2;
        }

        .card-auth-header p {
            font-size: 13px;
            color: var(--text-muted);
            margin: 0;
            line-height: 1.45;
        }

        .auth-alert {
            padding: 10px 14px;
            border-radius: 10px;
            font-size: 12.5px;
            margin-bottom: 16px;
            display: flex;
            align-items: flex-start;
            gap: 9px;
            line-height: 1.4;
        }

        .auth-alert.alert-danger {
            background-color: #FEF2F2;
            border: 1px solid #FECACA;
            color: #991B1B;
        }

        .auth-alert i {
            font-size: 15px;
            margin-top: 1px;
            flex-shrink: 0;
        }

        .auth-alert ul {
            margin: 0;
            padding-left: 14px;
        }

        .auth-field-group {
            margin-bottom: 15px;
        }

        .auth-field-label {
            display: flex;
            align-items: center;
            justify-content: space-between;
            color: var(--brand-navy-dark);
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 0.6px;
            text-transform: uppercase;
            margin-bottom: 5px;
        }

        .input-relative-box {
            position: relative;
        }

        .input-field-icon {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #94A3B8;
            font-size: 16px;
            pointer-events: none;
            transition: color 0.2s ease;
            z-index: 2;
        }

        .auth-input {
            width: 100%;
            height: 44px;
            background: #F8FAFC;
            border: 1.5px solid var(--border-color);
            border-radius: 10px;
            padding: 0 42px 0 42px;
            font-size: 13.5px;
            font-weight: 500;
            color: var(--text-main);
            transition: all 0.22s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .auth-input:focus {
            outline: none;
            background: #FFFFFF;
            border-color: var(--brand-green);
            box-shadow: 0 0 0 4px rgba(73, 155, 8, 0.15);
        }

        .auth-input:focus ~ .input-field-icon {
            color: var(--brand-green);
        }

        .toggle-password-btn {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            padding: 6px;
            color: #94A3B8;
            font-size: 16px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 6px;
            transition: all 0.2s ease;
            z-index: 3;
        }

        .toggle-password-btn:hover {
            color: var(--brand-navy-dark);
            background: #F1F5F9;
        }

        .btn-portal-submit {
            width: 100%;
            height: 48px;
            background: linear-gradient(135deg, var(--brand-green) 0%, var(--brand-green-hover) 100%);
            color: #FFFFFF;
            border: none;
            border-radius: 10px;
            font-size: 13.5px;
            font-weight: 800;
            letter-spacing: 0.8px;
            text-transform: uppercase;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            box-shadow: 0 8px 24px -4px var(--brand-green-glow);
            transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
            margin-top: 10px;
        }

        .btn-portal-submit:hover {
            background: linear-gradient(135deg, var(--brand-green-light) 0%, var(--brand-green) 100%);
            transform: translateY(-2px);
            box-shadow: 0 12px 28px -2px rgba(73, 155, 8, 0.45);
            color: #FFFFFF;
        }

        .back-to-login-strip {
            margin-top: 18px;
            text-align: center;
        }

        .back-to-login-link {
            color: var(--brand-navy);
            font-size: 12.5px;
            font-weight: 700;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: color 0.2s ease;
        }

        .back-to-login-link:hover {
            color: var(--brand-green);
            text-decoration: underline;
        }

        .auth-copyright {
            margin-top: 14px;
            text-align: center;
            font-size: 11px;
            color: rgba(255, 255, 255, 0.55);
        }

        .auth-copyright strong {
            color: rgba(255, 255, 255, 0.85);
            font-weight: 600;
        }

        @media (max-width: 991px) {
            body {
                overflow-y: auto !important;
            }

            .login-universe {
                min-height: 100vh;
                height: auto;
                padding: 40px 16px;
            }

            .portal-container {
                flex-direction: column;
                align-items: center;
                text-align: center;
                padding: 0;
                gap: 36px;
            }

            .brand-hero-section {
                max-width: 540px;
                display: flex;
                flex-direction: column;
                align-items: center;
            }

            .auth-card-section {
                max-width: 440px;
                width: 100%;
            }

            .glass-auth-card {
                text-align: left;
            }
        }
    </style>
</head>

<body>

    <main class="login-universe">
        <div class="ambient-flare"></div>

        <div class="portal-container">

            <!-- Left Column -->
            <section class="brand-hero-section">

                <!-- Brand Logo (Top Left) -->
                <div class="brand-logo-holder">
                    <a href="{{ route('home') }}" title="Back to Premium Building & Pest Inspections">
                        <img
                            src="{{ asset('images/logo.png') }}"
                            alt="Premium Building & Pest Inspections"
                            class="brand-logo-img"
                        >
                    </a>
                </div>

                <!-- Status Capsule -->
                <div class="status-capsule">
                    <span class="pulse-beacon"></span>
                    <span class="status-text">Password Reset</span>
                    <span class="status-divider">•</span>
                    <span class="status-highlight">Secure Verification</span>
                </div>

                <h1 class="hero-headline">
                    Set Your New
                    <span class="text-brand-accent">Admin Password</span>
                </h1>

                <p class="hero-subhead">
                    Choose a strong, unique password with at least 8 characters to ensure your administration dashboard remains secure.
                </p>

            </section>

            <!-- Right Column -->
            <section class="auth-card-section">

                <div class="glass-auth-card">

                    <div class="card-auth-header">
                        <div class="portal-label-badge">
                            <i class="bi bi-shield-check"></i>
                            <span>Security Credentials</span>
                        </div>
                        <h2>Create New Password</h2>
                        <p>Enter and confirm your new password below.</p>
                    </div>

                    @if($errors->any())
                        <div class="auth-alert alert-danger" role="alert">
                            <i class="bi bi-exclamation-triangle-fill"></i>
                            <div>
                                <div class="fw-bold mb-1">Reset Failed</div>
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif

                    <form action="{{ route('password.update') }}" method="POST" id="resetPasswordForm">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <!-- Email -->
                        <div class="auth-field-group">
                            <label for="email" class="auth-field-label">
                                <span>Administrator Email</span>
                            </label>
                            <div class="input-relative-box">
                                <i class="bi bi-envelope input-field-icon"></i>
                                <input
                                    type="email"
                                    id="email"
                                    name="email"
                                    class="auth-input"
                                    value="{{ old('email', $email) }}"
                                    required
                                    readonly
                                    style="background: #F1F5F9; color: #475569;"
                                >
                            </div>
                        </div>

                        <!-- New Password -->
                        <div class="auth-field-group">
                            <label for="password" class="auth-field-label">
                                <span>New Password</span>
                            </label>
                            <div class="input-relative-box">
                                <i class="bi bi-lock input-field-icon"></i>
                                <input
                                    type="password"
                                    id="password"
                                    name="password"
                                    class="auth-input"
                                    placeholder="Minimum 8 characters"
                                    required
                                    autofocus
                                >
                                <button
                                    type="button"
                                    class="toggle-password-btn"
                                    id="togglePassword"
                                    aria-label="Toggle password visibility"
                                >
                                    <i class="bi bi-eye" id="togglePasswordIcon"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Confirm Password -->
                        <div class="auth-field-group">
                            <label for="password_confirmation" class="auth-field-label">
                                <span>Confirm New Password</span>
                            </label>
                            <div class="input-relative-box">
                                <i class="bi bi-shield-lock input-field-icon"></i>
                                <input
                                    type="password"
                                    id="password_confirmation"
                                    name="password_confirmation"
                                    class="auth-input"
                                    placeholder="Re-enter your new password"
                                    required
                                >
                                <button
                                    type="button"
                                    class="toggle-password-btn"
                                    id="toggleConfirmPassword"
                                    aria-label="Toggle password confirmation visibility"
                                >
                                    <i class="bi bi-eye" id="toggleConfirmPasswordIcon"></i>
                                </button>
                            </div>
                        </div>

                        <button type="submit" class="btn-portal-submit" id="submitBtn">
                            <i class="bi bi-check-circle-fill"></i>
                            <span id="submitBtnText">Update Password</span>
                        </button>

                    </form>

                    <div class="back-to-login-strip">
                        <a href="{{ route('login') }}" class="back-to-login-link">
                            <i class="bi bi-arrow-left"></i>
                            <span>Return to Sign In</span>
                        </a>
                    </div>

                </div>

                <div class="auth-copyright">
                    © {{ date('Y') }} <strong>Premium Building &amp; Pest Inspections</strong>. All rights reserved.
                </div>

            </section>

        </div>
    </main>

    <script>
        function setupToggle(buttonId, inputId, iconId) {
            const btn = document.getElementById(buttonId);
            const input = document.getElementById(inputId);
            const icon = document.getElementById(iconId);
            if (btn && input && icon) {
                btn.addEventListener('click', function () {
                    if (input.type === 'password') {
                        input.type = 'text';
                        icon.classList.remove('bi-eye');
                        icon.classList.add('bi-eye-slash');
                    } else {
                        input.type = 'password';
                        icon.classList.remove('bi-eye-slash');
                        icon.classList.add('bi-eye');
                    }
                });
            }
        }

        setupToggle('togglePassword', 'password', 'togglePasswordIcon');
        setupToggle('toggleConfirmPassword', 'password_confirmation', 'toggleConfirmPasswordIcon');

        const resetForm = document.getElementById('resetPasswordForm');
        const submitBtn = document.getElementById('submitBtn');
        const submitBtnText = document.getElementById('submitBtnText');

        if (resetForm && submitBtn && submitBtnText) {
            resetForm.addEventListener('submit', function () {
                submitBtn.disabled = true;
                submitBtn.style.opacity = '0.85';
                submitBtnText.textContent = 'Updating Password...';
            });
        }
    </script>

</body>

</html>
