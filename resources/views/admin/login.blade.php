<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Portal Login | Premium Building & Pest Inspections</title>

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

        /* Prevent desktop body scroll while keeping content nicely centered */
        @media (min-width: 992px) {
            body {
                overflow: hidden;
            }
        }

        /* =====================================================
           ATMOSPHERIC HERO BACKGROUND & MESH OVERLAY
        ===================================================== */
        .login-universe {
            position: relative;
            min-height: 100vh;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            background:
                /* Ambient radial glow top-left */
                radial-gradient(circle at 12% 20%, rgba(73, 155, 8, 0.18) 0%, transparent 40%),
                /* Ambient blue glow bottom-right */
                radial-gradient(circle at 88% 85%, rgba(13, 70, 128, 0.35) 0%, transparent 45%),
                /* Center subtle glow */
                radial-gradient(circle at 50% 50%, rgba(6, 52, 100, 0.55) 0%, transparent 70%),
                /* Rich dark navy photo overlay */
                linear-gradient(
                    135deg,
                    rgba(3, 20, 39, 0.94) 0%,
                    rgba(5, 33, 63, 0.90) 50%,
                    rgba(6, 52, 100, 0.88) 100%
                ),
                url('{{ asset('images/service banner.jpg') }}') center center / cover no-repeat fixed;
        }

        /* Subtle architectural grid pattern overlay */
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

        /* Glowing ambient light flare */
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

        /* =====================================================
           MAIN CONTAINER & TWO-COLUMN SPLIT
        ===================================================== */
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

        /* =====================================================
           LEFT COLUMN: BRAND HERO & HIGHLIGHTS
        ===================================================== */
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

        /* Live Status Pill */
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

        /* Logo Brand Badge */
        .brand-logo-holder {
            margin-bottom: 22px;
            display: block;
            width: 100%;
            text-align: left;
        }

        .brand-logo-holder a {
            display: inline-block;
            text-decoration: none;
            transition: transform 0.25s ease;
        }

        .brand-logo-holder a:hover {
            transform: scale(1.03);
        }

        .brand-logo-img {
            max-width: 195px;
            width: 195px;
            height: auto;
            display: block;
            filter: brightness(0) invert(1) drop-shadow(0 4px 14px rgba(0, 0, 0, 0.5));
        }

        /* Heading & Subtitle */
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

        /* Feature Cards Grid (2x2) */
        .hero-features-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
            max-width: 530px;
        }

        .feature-card {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            padding: 12px 14px;
            background: rgba(255, 255, 255, 0.06);
            border: 1px solid rgba(255, 255, 255, 0.12);
            border-radius: 12px;
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            transition: all 0.25s ease;
        }

        .feature-card:hover {
            background: rgba(255, 255, 255, 0.11);
            border-color: rgba(126, 224, 48, 0.4);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.25);
        }

        .feature-icon-bubble {
            width: 34px;
            height: 34px;
            border-radius: 9px;
            background: rgba(73, 155, 8, 0.22);
            border: 1px solid rgba(126, 224, 48, 0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #7ee030;
            font-size: 16px;
            flex-shrink: 0;
        }

        .feature-card-content h4 {
            font-size: 12.5px;
            font-weight: 700;
            color: #FFFFFF;
            margin: 0 0 2px;
            line-height: 1.25;
        }

        .feature-card-content p {
            font-size: 11px;
            color: rgba(255, 255, 255, 0.65);
            margin: 0;
            line-height: 1.35;
        }

        /* Trust bar footer in left hero */
        .hero-trust-bar {
            margin-top: 24px;
            display: flex;
            align-items: center;
            gap: 14px;
            padding-top: 18px;
            border-top: 1px solid rgba(255, 255, 255, 0.12);
            max-width: 530px;
        }

        .trust-stars {
            color: #FFC107;
            font-size: 12px;
            display: flex;
            gap: 3px;
        }

        .trust-note {
            font-size: 11.5px;
            color: rgba(255, 255, 255, 0.72);
            font-weight: 500;
        }

        /* =====================================================
           RIGHT COLUMN: AUTHENTICATION CARD
        ===================================================== */
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

        /* Top decorative accent ribbon */
        .glass-auth-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #499B08 0%, #063464 60%, #499B08 100%);
        }

        /* Card Header */
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

        .portal-label-badge i {
            font-size: 11px;
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

        /* Alert notifications */
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

        .auth-alert.alert-success {
            background-color: #F0FDF4;
            border: 1px solid #BBF7D0;
            color: #166534;
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

        /* Input Form Groups */
        .auth-field-group {
            margin-bottom: 16px;
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
            margin-bottom: 6px;
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
            height: 46px;
            background: #F8FAFC;
            border: 1.5px solid var(--border-color);
            border-radius: 10px;
            padding: 0 42px 0 42px;
            font-size: 13.5px;
            font-weight: 500;
            color: var(--text-main);
            transition: all 0.22s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .auth-input::placeholder {
            color: #94A3B8;
            font-weight: 400;
            font-size: 13px;
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

        /* Password visibility toggle button */
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

        /* Options Row (Remember & Forgot) */
        .auth-options-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
            font-size: 12.5px;
        }

        .remember-checkbox-label {
            display: flex;
            align-items: center;
            gap: 8px;
            color: var(--text-muted);
            cursor: pointer;
            user-select: none;
            font-weight: 500;
            margin: 0;
        }

        .remember-checkbox-label input {
            accent-color: var(--brand-green);
            width: 15px;
            height: 15px;
            border-radius: 4px;
            cursor: pointer;
        }

        .forgot-password-link {
            color: var(--brand-navy);
            text-decoration: none;
            font-weight: 600;
            transition: color 0.2s ease;
        }

        .forgot-password-link:hover {
            color: var(--brand-green);
            text-decoration: underline;
        }

        /* Sign In Button */
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
            position: relative;
            overflow: hidden;
        }

        .btn-portal-submit:hover {
            background: linear-gradient(135deg, var(--brand-green-light) 0%, var(--brand-green) 100%);
            transform: translateY(-2px);
            box-shadow: 0 12px 28px -2px rgba(73, 155, 8, 0.45);
            color: #FFFFFF;
        }

        .btn-portal-submit:active {
            transform: translateY(0);
        }

        .btn-portal-submit i {
            font-size: 16px;
            transition: transform 0.2s ease;
        }

        .btn-portal-submit:hover i {
            transform: translateX(4px);
        }

        /* Security Assurance Bar */
        .security-assurance-bar {
            margin-top: 18px;
            padding: 9px 12px;
            background: #F8FAFC;
            border: 1px solid #E2E8F0;
            border-radius: 9px;
            display: flex;
            align-items: center;
            gap: 9px;
        }

        .security-assurance-bar i {
            color: var(--brand-green);
            font-size: 16px;
            flex-shrink: 0;
        }

        .security-assurance-bar p {
            font-size: 11px;
            color: var(--text-muted);
            margin: 0;
            line-height: 1.35;
            font-weight: 500;
        }

        /* Return to Website Link below card */
        .return-to-site-link {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            color: rgba(255, 255, 255, 0.85);
            font-size: 12.5px;
            font-weight: 600;
            text-decoration: none;
            margin-top: 16px;
            padding: 6px 14px;
            border-radius: 30px;
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.14);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            transition: all 0.2s ease;
        }

        .return-to-site-link:hover {
            color: #FFFFFF;
            background: rgba(255, 255, 255, 0.16);
            border-color: rgba(255, 255, 255, 0.3);
            transform: translateX(-3px);
        }

        .return-to-site-link i {
            font-size: 12px;
            transition: transform 0.2s ease;
        }

        .return-to-site-link:hover i {
            transform: translateX(-2px);
        }

        /* Footer Copyright */
        .auth-copyright {
            margin-top: 12px;
            text-align: center;
            font-size: 11px;
            color: rgba(255, 255, 255, 0.55);
        }

        .auth-copyright strong {
            color: rgba(255, 255, 255, 0.85);
            font-weight: 600;
        }

        /* =====================================================
           RESPONSIVE ADJUSTMENTS
        ===================================================== */
        /* Medium / Small Laptops (height <= 800px) */
        @media (min-width: 992px) and (max-height: 800px) {
            .portal-container {
                padding: 16px 30px;
                gap: 30px;
            }

            .brand-logo-holder {
                margin-bottom: 12px;
            }

            .brand-logo-img {
                max-width: 145px;
                width: 145px;
            }

            .status-capsule {
                margin-bottom: 14px;
                padding: 4px 10px;
            }

            .hero-headline {
                font-size: 32px;
                margin-bottom: 8px;
            }

            .hero-subhead {
                font-size: 12.5px;
                line-height: 1.5;
                margin-bottom: 16px;
            }

            .feature-card {
                padding: 8px 10px;
            }

            .feature-icon-bubble {
                width: 28px;
                height: 28px;
                font-size: 13px;
            }

            .feature-card-content h4 {
                font-size: 11.5px;
            }

            .feature-card-content p {
                font-size: 10px;
            }

            .hero-trust-bar {
                margin-top: 14px;
                padding-top: 12px;
            }

            .glass-auth-card {
                padding: 24px 26px 20px;
                max-width: 410px;
            }

            .card-auth-header {
                margin-bottom: 14px;
            }

            .card-auth-header h2 {
                font-size: 21px;
            }

            .auth-field-group {
                margin-bottom: 12px;
            }

            .auth-input {
                height: 40px;
                font-size: 13px;
            }

            .btn-portal-submit {
                height: 42px;
                font-size: 12.5px;
            }

            .security-assurance-bar {
                margin-top: 12px;
                padding: 7px 10px;
            }

            .return-to-site-link {
                margin-top: 10px;
                font-size: 11.5px;
                padding: 4px 12px;
            }

            .auth-copyright {
                margin-top: 8px;
                font-size: 10.5px;
            }
        }

        /* Tablets & Mobile Screens (max-width: 991px) */
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

            .hero-headline .text-brand-accent {
                display: inline;
            }

            .hero-features-grid {
                width: 100%;
                text-align: left;
            }

            .hero-trust-bar {
                justify-content: center;
                width: 100%;
            }

            .auth-card-section {
                max-width: 440px;
                width: 100%;
            }

            .glass-auth-card {
                text-align: left;
            }
        }

        /* Small Phones (max-width: 575px) */
        @media (max-width: 575px) {
            .hero-features-grid {
                grid-template-columns: 1fr;
            }

            .glass-auth-card {
                padding: 24px 20px;
                border-radius: 16px;
            }

            .hero-headline {
                font-size: 26px;
            }

            .auth-options-row {
                flex-direction: column;
                align-items: flex-start;
                gap: 8px;
            }
        }
    </style>
</head>

<body>

    <main class="login-universe">
        <div class="ambient-flare"></div>

        <div class="portal-container">

            <!-- =====================================================
                 LEFT COLUMN: BRANDING & SYSTEM OVERVIEW
            ====================================================== -->
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

                <!-- System Operational Beacon Pill -->
                <div class="status-capsule">
                    <span class="pulse-beacon"></span>
                    <span class="status-text">Official Admin Portal</span>
                    <span class="status-divider">•</span>
                    <span class="status-highlight">System Operational</span>
                </div>

                <!-- Headline -->
                <h1 class="hero-headline">
                    Premium Building
                    <span class="text-brand-accent">&amp; Pest Inspections</span>
                </h1>

                <!-- Subhead -->
                <p class="hero-subhead">
                    Centralised administration suite for booking dispatch, quotation management,
                    inspection agreements, customer inquiries, and certified property compliance reports.
                </p>

                <!-- 4 Highlight Micro-Cards (2x2) -->
                <div class="hero-features-grid">

                    <div class="feature-card">
                        <div class="feature-icon-bubble">
                            <i class="bi bi-shield-check"></i>
                        </div>
                        <div class="feature-card-content">
                            <h4>Secure Access</h4>
                            <p>256-bit encrypted authentication</p>
                        </div>
                    </div>

                    <div class="feature-card">
                        <div class="feature-icon-bubble">
                            <i class="bi bi-calendar-check"></i>
                        </div>
                        <div class="feature-card-content">
                            <h4>Booking Hub</h4>
                            <p>Real-time client inspection dispatch</p>
                        </div>
                    </div>

                    <div class="feature-card">
                        <div class="feature-icon-bubble">
                            <i class="bi bi-file-earmark-text"></i>
                        </div>
                        <div class="feature-card-content">
                            <h4>Instant Quotes</h4>
                            <p>Fast turnaround quotation inquiries</p>
                        </div>
                    </div>

                    <div class="feature-card">
                        <div class="feature-icon-bubble">
                            <i class="bi bi-patch-check"></i>
                        </div>
                        <div class="feature-card-content">
                            <h4>Client Agreements</h4>
                            <p>Signed inspection compliance</p>
                        </div>
                    </div>

                </div>

                <!-- Trust Strip -->
                <div class="hero-trust-bar">
                    <div class="trust-stars">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                    </div>
                    <span class="trust-note">
                        Certified &amp; Licensed Building &amp; Pest Inspectors • Melbourne &amp; Regional Victoria
                    </span>
                </div>

            </section>

            <!-- =====================================================
                 RIGHT COLUMN: AUTHENTICATION CARD
            ====================================================== -->
            <section class="auth-card-section">

                <div class="glass-auth-card">

                    <!-- Header -->
                    <div class="card-auth-header">
                        <div class="portal-label-badge">
                            <i class="bi bi-person-badge"></i>
                            <span>Admin Portal</span>
                        </div>
                        <h2>Welcome Back</h2>
                        <p>Sign in to access your administrative dashboard.</p>
                    </div>

                    <!-- Flash Message: Success -->
                    @if(session('success'))
                        <div class="auth-alert alert-success" role="alert">
                            <i class="bi bi-check-circle-fill"></i>
                            <div>{{ session('success') }}</div>
                        </div>
                    @endif

                    <!-- Flash Message: Validation Errors -->
                    @if($errors->any())
                        <div class="auth-alert alert-danger" role="alert">
                            <i class="bi bi-exclamation-triangle-fill"></i>
                            <div>
                                <div class="fw-bold mb-1">Authentication Failed</div>
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif

                    <!-- Login Form -->
                    <form action="{{ route('login.submit') }}" method="POST" autocomplete="on" id="adminLoginForm">
                        @csrf

                        <!-- Email Field -->
                        <div class="auth-field-group">
                            <label for="email" class="auth-field-label">
                                <span>Email Address</span>
                            </label>
                            <div class="input-relative-box">
                                <i class="bi bi-envelope input-field-icon"></i>
                                <input
                                    type="email"
                                    id="email"
                                    name="email"
                                    class="auth-input"
                                    placeholder="admin@premiumbuildinginspections.com.au"
                                    value="{{ old('email') }}"
                                    autocomplete="email"
                                    required
                                    autofocus
                                >
                            </div>
                        </div>

                        <!-- Password Field -->
                        <div class="auth-field-group">
                            <label for="password" class="auth-field-label">
                                <span>Password</span>
                            </label>
                            <div class="input-relative-box">
                                <i class="bi bi-lock input-field-icon"></i>
                                <input
                                    type="password"
                                    id="password"
                                    name="password"
                                    class="auth-input"
                                    placeholder="Enter your secure password"
                                    autocomplete="current-password"
                                    required
                                >
                                <button
                                    type="button"
                                    class="toggle-password-btn"
                                    id="passwordToggleBtn"
                                    aria-label="Toggle password visibility"
                                    title="Show/hide password"
                                >
                                    <i class="bi bi-eye" id="passwordToggleIcon"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Options: Remember & Forgot -->
                        <div class="auth-options-row">
                            <label class="remember-checkbox-label">
                                <input
                                    type="checkbox"
                                    name="remember"
                                    value="1"
                                    {{ old('remember') ? 'checked' : '' }}
                                >
                                <span>Keep me signed in</span>
                            </label>

                            <a href="{{ route('password.request') }}" class="forgot-password-link">
                                Forgot Password?
                            </a>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn-portal-submit" id="submitBtn">
                            <i class="bi bi-box-arrow-in-right"></i>
                            <span id="submitBtnText">Sign In to Dashboard</span>
                        </button>

                    </form>

                    <!-- Security Badge Inside Card -->
                    <div class="security-assurance-bar">
                        <i class="bi bi-shield-lock-fill"></i>
                        <p>
                            Restricted administration area. 256-bit SSL encrypted &amp; monitored session.
                        </p>
                    </div>

                </div>

                <!-- Return to Public Website -->
                <a href="{{ route('home') }}" class="return-to-site-link">
                    <i class="bi bi-arrow-left"></i>
                    <span>Return to Public Website</span>
                </a>

                <!-- Footer Copyright -->
                <div class="auth-copyright">
                    © {{ date('Y') }} <strong>Premium Building &amp; Pest Inspections</strong>. All rights reserved.
                </div>

            </section>

        </div>
    </main>

    <!-- Interactive Scripts -->
    <script>
        // Password Visibility Toggle
        const passwordInput = document.getElementById('password');
        const passwordToggleBtn = document.getElementById('passwordToggleBtn');
        const passwordToggleIcon = document.getElementById('passwordToggleIcon');

        if (passwordToggleBtn && passwordInput && passwordToggleIcon) {
            passwordToggleBtn.addEventListener('click', function () {
                const isPassword = passwordInput.getAttribute('type') === 'password';
                if (isPassword) {
                    passwordInput.setAttribute('type', 'text');
                    passwordToggleIcon.classList.remove('bi-eye');
                    passwordToggleIcon.classList.add('bi-eye-slash');
                } else {
                    passwordInput.setAttribute('type', 'password');
                    passwordToggleIcon.classList.remove('bi-eye-slash');
                    passwordToggleIcon.classList.add('bi-eye');
                }
            });
        }

        // Form Submit Loading Feedback
        const loginForm = document.getElementById('adminLoginForm');
        const submitBtn = document.getElementById('submitBtn');
        const submitBtnText = document.getElementById('submitBtnText');

        if (loginForm && submitBtn && submitBtnText) {
            loginForm.addEventListener('submit', function (e) {
                if (!loginForm.checkValidity()) {
                    return;
                }
                submitBtn.disabled = true;
                submitBtn.style.opacity = '0.85';
                submitBtnText.textContent = 'Verifying Credentials...';
            });
        }
    </script>

</body>

</html>