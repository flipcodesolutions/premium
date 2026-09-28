@extends('layouts.app')

@section('title', 'New Build Handover Inspection Melbourne | Premium Building & Pest Inspections')

@section('content')

<style>
/* =========================================================
   NEW BUILD HANDOVER INSPECTION PAGE STYLES
   Designed 1:1 to match reference layout
   With increased / larger font sizes as requested
========================================================= */

.d-page {
    --d-navy: #073763;
    --d-navy-dark: #052646;
    --d-green: #42a900;
    --d-green-dark: #358c00;
    --d-light-green: #eaf6e6;
    --d-choose-bg: #d8edd5;
    --d-cyan: #1b9eea;
    --d-text: #2d3748;
    --d-muted: #4a5568;
    --d-border: #e2e8f0;
    --d-orange: #ffb400;

    font-family: Arial, Helvetica, sans-serif;
    color: var(--d-text);
    overflow-x: hidden;
    position: relative;
    font-size: 17.5px;
    line-height: 1.8;
}

/* Container */
.d-container {
    width: 92%;
    max-width: 1180px;
    margin: 0 auto;
}

.d-section {
    padding: 75px 0;
}

/* Headings with larger font sizes */
.d-heading {
    text-align: center;
    margin-bottom: 42px;
}

.d-heading .small-title {
    display: block;
    margin-bottom: 12px;
    color: var(--d-green);
    font-size: 17px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 1.2px;
}

.d-heading h2 {
    margin: 0;
    color: var(--d-navy);
    font-size: clamp(28px, 3.8vw, 38px);
    line-height: 1.25;
    font-weight: 900;
    text-transform: uppercase;
}

.d-heading p {
    max-width: 820px;
    margin: 16px auto 0;
    color: var(--d-muted);
    font-size: 18px;
    line-height: 1.8;
}

/* Buttons with larger text & touch target */
.d-btn {
    display: inline-flex;
    justify-content: center;
    align-items: center;
    padding: 16px 32px;
    background: var(--d-green);
    color: #fff !important;
    border: 0;
    border-radius: 4px;
    font-size: 17px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 0.6px;
    text-decoration: none;
    transition: all 0.25s ease;
}

.d-btn:hover {
    background: var(--d-green-dark);
    transform: translateY(-2px);
    box-shadow: 0 8px 22px rgba(66, 169, 0, 0.35);
}

/* Floating Right Tab */
.d-floating-tab {
    position: fixed;
    right: 0;
    top: 48%;
    transform: translateY(-50%);
    background: var(--d-green);
    color: #fff !important;
    padding: 16px 12px;
    font-size: 14.5px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 0.8px;
    border-radius: 6px 0 0 6px;
    z-index: 999;
    box-shadow: -3px 4px 16px rgba(0, 0, 0, 0.25);
    text-decoration: none;
    writing-mode: vertical-rl;
    text-orientation: mixed;
    transform-origin: center;
    display: flex;
    align-items: center;
    gap: 8px;
    transition: all 0.25s ease;
}

.d-floating-tab:hover {
    background: var(--d-green-dark);
    padding-right: 16px;
}

/* =========================================================
   1. HERO SECTION
========================================================= */
.d-hero {
    position: relative;
    background:
        linear-gradient(
            90deg,
            rgba(7, 43, 76, 0.95) 0%,
            rgba(7, 43, 76, 0.88) 52%,
            rgba(7, 43, 76, 0.65) 100%
        ),
        url("{{ asset('images/schedule.jpeg') }}") center center / cover no-repeat;
    color: #fff;
    padding: 30px 0;
}

.d-hero-inner {
    display: grid;
    grid-template-columns: 1.15fr 0.85fr;
    gap: 45px;
    align-items: center;
    padding: 65px 0 75px;
}

.d-hero-content h1 {
    font-size: clamp(32px, 4.4vw, 46px);
    line-height: 1.18;
    font-weight: 900;
    color: #ffffff;
    margin: 0 0 18px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.d-hero-tag {
    display: inline-block;
    color: #ffffff;
    font-size: 16px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 1.2px;
    margin-bottom: 18px;
    opacity: 0.95;
}

.d-hero-content p {
    color: rgba(255, 255, 255, 0.94);
    font-size: 18px;
    line-height: 1.8;
    margin: 0 0 28px;
    max-width: 640px;
}

.d-hero-license {
    display: inline-block;
    margin-top: 18px;
    font-size: 14.5px;
    color: rgba(255, 255, 255, 0.85);
    font-weight: 600;
}

/* Hero Form */
.d-hero-form {
    background: #ffffff;
    border-radius: 8px;
    padding: 30px 28px;
    box-shadow: 0 12px 35px rgba(0, 0, 0, 0.28);
    color: var(--d-text);
}

.d-form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 12px;
    margin-bottom: 12px;
}

.d-hero-form input,
.d-hero-form select,
.d-hero-form textarea {
    width: 100%;
    padding: 13px 15px;
    border: 1px solid #d2d6dc;
    border-radius: 4px;
    font-size: 15.5px;
    color: #2d3748;
    outline: none;
    transition: border-color 0.2s ease;
    background: #fff;
    margin-bottom: 12px;
}

.d-hero-form input:focus,
.d-hero-form select:focus,
.d-hero-form textarea:focus {
    border-color: var(--d-green);
}

.d-hero-form textarea {
    resize: vertical;
    min-height: 80px;
}

.d-hero-form .d-submit {
    width: 100%;
    padding: 16px;
    background: var(--d-green);
    color: #fff;
    border: 0;
    border-radius: 4px;
    font-size: 17px;
    font-weight: 900;
    text-transform: uppercase;
    letter-spacing: 0.6px;
    cursor: pointer;
    transition: background 0.2s ease;
    margin-top: 4px;
}

.d-hero-form .d-submit:hover {
    background: var(--d-green-dark);
}

/* =========================================================
   2. WELCOME SECTION + INSPECTOR CARD
========================================================= */
.d-welcome-grid {
    display: grid;
    grid-template-columns: 1.15fr 0.85fr;
    gap: 50px;
    align-items: center;
}

.d-welcome-content .small-title {
    display: block;
    margin-bottom: 12px;
    color: var(--d-green);
    font-size: 16px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.d-welcome-content h2 {
    color: var(--d-navy);
    font-size: clamp(28px, 3.6vw, 38px);
    line-height: 1.25;
    font-weight: 900;
    margin: 0 0 20px;
    text-transform: uppercase;
}

.d-welcome-content > p {
    color: var(--d-muted);
    font-size: 17.5px;
    line-height: 1.8;
    margin: 0 0 20px;
}

.d-feature-mini {
    display: flex;
    gap: 18px;
    margin-bottom: 18px;
    align-items: flex-start;
}

.d-feature-mini-icon {
    width: 42px;
    height: 42px;
    min-width: 42px;
    border-radius: 50%;
    background: #e8f4fc;
    color: var(--d-cyan);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 19px;
    margin-top: 2px;
}

.d-feature-mini h4 {
    margin: 0 0 6px;
    color: var(--d-navy);
    font-size: 17.5px;
    font-weight: 800;
    text-transform: uppercase;
}

.d-feature-mini p {
    margin: 0;
    color: var(--d-muted);
    font-size: 16px;
    line-height: 1.7;
}

/* Inspector Card */
.d-inspector-card {
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
    text-align: center;
}

.d-inspector-title {
    background: #111111;
    color: #ffffff;
    font-size: 16px;
    font-weight: 900;
    text-transform: uppercase;
    letter-spacing: 1.2px;
    padding: 12px 18px;
}

.d-inspector-card img {
    width: 100%;
    height: 360px;
    object-fit: cover;
    object-position: center top;
    display: block;
}

.d-inspector-name {
    padding: 16px 14px 12px;
    font-size: 16.5px;
    font-weight: 800;
    color: var(--d-navy);
    text-transform: uppercase;
}

.d-inspector-btn {
    display: block;
    background: var(--d-green);
    color: #ffffff !important;
    text-decoration: none;
    padding: 14px;
    font-size: 17px;
    font-weight: 900;
    letter-spacing: 0.6px;
    transition: background 0.2s ease;
}

.d-inspector-btn:hover {
    background: var(--d-green-dark);
}

/* =========================================================
   3. WHY HANDOVER INSPECTIONS MATTER (2x2 GRID)
========================================================= */
.d-matters {
    background: #fbfcfc;
}

.d-matters-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
    max-width: 1060px;
    margin: 0 auto;
}

.d-matters-card {
    background: #ffffff;
    border: 1px solid #e5e9ec;
    border-radius: 6px;
    padding: 22px 24px;
    display: flex;
    align-items: flex-start;
    gap: 18px;
    box-shadow: 0 3px 10px rgba(0, 0, 0, 0.03);
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.d-matters-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08);
}

.d-check-icon {
    width: 32px;
    height: 32px;
    min-width: 32px;
    border-radius: 50%;
    background: var(--d-green);
    color: #ffffff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 16px;
    font-weight: 900;
    margin-top: 3px;
}

.d-matters-card-content h4 {
    margin: 0 0 8px;
    color: var(--d-navy);
    font-size: 18px;
    font-weight: 800;
}

.d-matters-card-content p {
    margin: 0;
    color: var(--d-muted);
    font-size: 16px;
    line-height: 1.7;
}

/* =========================================================
   4. COMPREHENSIVE HANDOVER INSPECTION PROCESS (SCOPE & g6.jpeg)
========================================================= */
.d-scope-grid {
    display: grid;
    grid-template-columns: 1.15fr 0.85fr;
    gap: 45px;
    align-items: center;
}

.d-scope-content h3 {
    font-size: clamp(24px, 3vw, 32px);
    line-height: 1.25;
    font-weight: 900;
    color: var(--d-navy);
    margin: 0 0 16px;
    text-transform: uppercase;
}

.d-scope-content > p {
    color: var(--d-muted);
    font-size: 17.5px;
    line-height: 1.8;
    margin-bottom: 24px;
}

.d-scope-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.d-scope-item {
    display: flex;
    gap: 18px;
    margin-bottom: 20px;
    align-items: flex-start;
}

.d-scope-badge {
    width: 34px;
    height: 34px;
    min-width: 34px;
    border-radius: 50%;
    background: var(--d-green);
    color: #fff;
    font-size: 16px;
    font-weight: 900;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-top: 2px;
}

.d-scope-info strong {
    display: block;
    color: var(--d-navy);
    font-size: 18px;
    font-weight: 800;
    margin-bottom: 5px;
}

.d-scope-info span {
    display: block;
    color: var(--d-muted);
    font-size: 16px;
    line-height: 1.7;
}

.d-scope-image-wrapper {
    position: relative;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.12);
    height: 440px;
}

.d-scope-image-wrapper img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center center;
    display: block;
}

/* Slider Arrows on Image */
.d-slide-arrow {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    width: 42px;
    height: 42px;
    border: 0;
    background: rgba(255, 255, 255, 0.88);
    color: #333;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 19px;
    cursor: pointer;
    box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2);
    transition: all 0.2s ease;
}

.d-slide-arrow:hover {
    background: #fff;
    color: var(--d-green);
}

.d-slide-prev {
    left: 14px;
}

.d-slide-next {
    right: 14px;
}

/* =========================================================
   5. WHY CHOOSE US (LIGHT GREEN BOX)
========================================================= */
.d-choose {
    padding: 60px 40px;
    background: var(--d-choose-bg);
    border-radius: 18px;
}

.d-choose-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 24px;
}

.d-choose-item {
    text-align: center;
    background: #ffffff;
    padding: 30px 22px;
    border-radius: 8px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
    transition: transform 0.3s ease;
}

.d-choose-item:hover {
    transform: translateY(-4px);
}

.d-choose-icon {
    width: 58px;
    height: 58px;
    margin: 0 auto 18px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: var(--d-green);
    color: #fff;
    border-radius: 6px;
    font-size: 26px;
}

.d-choose-item h4 {
    margin: 0 0 10px;
    color: var(--d-navy);
    font-size: 17.5px;
    font-weight: 900;
    text-transform: uppercase;
}

.d-choose-item p {
    margin: 0;
    color: #4a5568;
    font-size: 15.5px;
    line-height: 1.7;
}

/* =========================================================
   6. PRICING PACKAGES (3 CARDS)
========================================================= */
.d-pricing {
    background: #fff;
}

.d-price-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 28px;
    max-width: 1080px;
    margin: 0 auto;
}

.d-price-card {
    background: #fff;
    border: 1px solid #e4e4e4;
    border-top: 3px solid var(--d-green);
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.06);
    text-align: center;
    padding: 34px 24px;
    border-radius: 4px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.d-price-icon {
    font-size: 38px;
    color: var(--d-navy);
    margin-bottom: 14px;
}

.d-price-card h3 {
    margin: 0 0 12px;
    color: var(--d-navy);
    font-size: 19px;
    font-weight: 900;
    text-transform: uppercase;
}

.d-price {
    color: var(--d-green);
    font-size: 40px;
    font-weight: 900;
    margin-bottom: 18px;
}

.d-price small {
    color: #666;
    font-size: 15px;
    font-weight: 700;
}

.d-price-list {
    list-style: none;
    padding: 0;
    margin: 0 0 26px;
    text-align: left;
    flex-grow: 1;
}

.d-price-list li {
    padding: 10px 0;
    border-bottom: 1px solid #eee;
    color: #4a5568;
    font-size: 16px;
    display: flex;
    align-items: flex-start;
}

.d-price-list li::before {
    content: "✓";
    color: var(--d-green);
    margin-right: 12px;
    font-weight: 900;
    font-size: 16px;
}

.d-price-btn {
    display: block;
    width: 100%;
    padding: 15px;
    background: var(--d-green);
    color: #fff !important;
    text-decoration: none;
    font-size: 16.5px;
    font-weight: 900;
    text-transform: uppercase;
    letter-spacing: 0.6px;
    border-radius: 3px;
    transition: all 0.25s ease;
}

.d-price-btn:hover {
    background: var(--d-green-dark);
}

/* =========================================================
   7. CTA BANNER (ENSURE YOUR NEW HOME IS PERFECT)
========================================================= */
.d-cta {
    min-height: 400px;
    display: flex;
    align-items: center;
    background:
        linear-gradient(
            90deg,
            rgba(4, 43, 75, 0.96) 0%,
            rgba(4, 43, 75, 0.88) 55%,
            rgba(4, 43, 75, 0.40) 100%
        ),
        url("{{ asset('images/g7.jpeg') }}") center right / cover no-repeat;
}

.d-cta-content {
    max-width: 680px;
    color: #fff;
    padding: 60px 0;
}

.d-cta-content h2 {
    margin: 0 0 18px;
    font-size: clamp(28px, 3.8vw, 40px);
    line-height: 1.2;
    font-weight: 900;
    text-transform: uppercase;
    color: #fff;
}

.d-cta-content p {
    margin: 0 0 28px;
    color: rgba(255, 255, 255, 0.94);
    font-size: 18px;
    line-height: 1.8;
}

/* =========================================================
   8. REVIEWS SECTION
========================================================= */
.d-reviews {
    background: #fff;
}

.d-review-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 24px;
}

.d-review-card {
    text-align: center;
    padding: 32px 24px;
    border-bottom: 3px solid #eee;
    box-shadow: 0 7px 20px rgba(0, 0, 0, 0.06);
    border-radius: 4px;
    background: #fff;
}

.d-review-quote {
    color: var(--d-cyan);
    font-size: 44px;
    line-height: 1;
    margin-bottom: 10px;
}

.d-review-card p {
    min-height: 80px;
    color: #4a5568;
    font-size: 16.5px;
    line-height: 1.75;
}

.d-stars {
    color: var(--d-orange);
    letter-spacing: 3px;
    font-size: 19px;
    margin: 16px 0 18px;
}

.d-review-card h4 {
    margin: 0;
    color: var(--d-navy);
    font-size: 17px;
    font-weight: 800;
}

/* =========================================================
   9. FAQ ACCORDION SECTION
========================================================= */
.d-faq {
    background: #fff;
    padding-bottom: 80px;
}

.d-faq-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 16px 24px;
}

.d-faq-item {
    border: 1px solid #e4e4e4;
    background: #fff;
    border-radius: 4px;
    overflow: hidden;
    margin-bottom: 12px;
}

.d-faq-question {
    width: 100%;
    padding: 18px 22px;
    border: 0;
    background: #fff;
    color: var(--d-navy);
    display: flex;
    justify-content: space-between;
    align-items: center;
    text-align: left;
    font-size: 17px;
    font-weight: 800;
    cursor: pointer;
    transition: all 0.2s ease;
}

.d-faq-question:hover {
    background: #f7f9fa;
}

.d-faq-answer {
    display: none;
    padding: 0 22px 20px;
    color: #4a5568;
    font-size: 16.5px;
    line-height: 1.8;
}

/* Active FAQ Item: Green background on header */
.d-faq-item.active .d-faq-question {
    background: var(--d-green);
    color: #fff;
}

.d-faq-item.active .d-faq-answer {
    display: block;
    background: #fff;
    padding-top: 18px;
}

.d-faq-item.active .d-faq-icon {
    transform: rotate(180deg);
    color: #fff;
}

.d-faq-icon {
    font-size: 18px;
    transition: transform 0.25s ease;
}

/* =========================================================
   RESPONSIVE MEDIA QUERIES
========================================================= */
@media (max-width: 991px) {
    .d-hero-inner,
    .d-welcome-grid,
    .d-scope-grid {
        grid-template-columns: 1fr;
        gap: 40px;
    }

    .d-hero-inner {
        padding: 50px 0;
    }

    .d-choose-grid {
        grid-template-columns: repeat(2, 1fr);
    }

    .d-price-grid {
        grid-template-columns: 1fr;
        max-width: 480px;
    }
}

@media (max-width: 767px) {
    .d-section {
        padding: 50px 0;
    }

    .d-hero-inner {
        padding: 40px 0;
    }

    .d-form-row,
    .d-matters-grid,
    .d-review-grid,
    .d-faq-grid {
        grid-template-columns: 1fr;
    }

    .d-choose {
        padding: 35px 22px;
    }

    .d-choose-grid {
        grid-template-columns: 1fr 1fr;
        gap: 16px 12px;
    }

    .d-scope-image-wrapper {
        height: 320px;
    }

    .d-floating-tab {
        display: none;
    }
}

@media (max-width: 500px) {
    .d-choose-grid {
        grid-template-columns: 1fr;
    }
}
</style>

<div class="d-page">

    {{-- FLOATING RIGHT TAB --}}
    <a href="#quote-form" class="d-floating-tab">
        <i class="bi bi-calendar-check me-1"></i> BOOK AN INSPECTION
    </a>

    {{-- =====================================================
         1. HERO SECTION
    ====================================================== --}}
    <section class="d-hero">
        <div class="d-container">
            <div class="d-hero-inner">

                <div class="d-hero-content" data-aos="fade-right" data-aos-duration="850">
                    <span class="d-hero-tag">
                        TOP-RATED, CERTIFIED & INSURED INSPECTORS
                    </span>

                    <h1>
                        NEW BUILD HANDOVER<br>INSPECTION IN<br>MELBOURNE
                    </h1>

                    <p>
                        A professional handover inspection helps identify visible defects, incomplete works and finishing issues before you accept your newly built property and release final payment.
                    </p>

                    <div>
                        <a href="tel:0466001551" class="d-btn btn-glow">
                            <i class="bi bi-telephone-fill me-2"></i>
                            0466 001 551
                        </a>
                    </div>

                    <div class="d-hero-license">
                        VBA Building Inspector Licence No. IN-PS 74654 &nbsp;|&nbsp; Domestic Builder Licence No. DB-L 100200
                    </div>
                </div>

                {{-- HERO FORM --}}
                <div id="quote-form" class="d-hero-form hover-lift" data-aos="fade-left" data-aos-duration="850">
                    @if(session('success'))
                        <div class="alert alert-success py-2 mb-2" style="font-size: 15px;">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('quote.store') }}" method="POST">
                        @csrf

                        <div class="d-form-row">
                            <input type="text" name="name" placeholder="Name *" value="{{ old('name') }}" required>
                            <input type="tel" name="phone" placeholder="Phone *" value="{{ old('phone') }}" required>
                        </div>

                        <div class="d-form-row">
                            <input type="email" name="email" placeholder="Email *" value="{{ old('email') }}" required>
                            <input type="text" name="property_address" placeholder="Property Address" value="{{ old('property_address') }}">
                        </div>

                        <select name="service_type" required>
                            <option value="new-build-handover-inspection" selected>New Build Handover Inspection</option>
                            <option value="building-stage-by-stage-inspection">Building Stage By Stage Inspection</option>
                            <option value="pre-purchase-building-and-pest-inspection">Pre-Purchase Building & Pest Inspection</option>
                            <option value="dilapidation-report">Dilapidation Inspection</option>
                            <option value="apartment-building-inspection">Apartment Building Inspection</option>
                            <option value="rising-damp-inspection">Rising Damp Inspection</option>
                            <option value="pool-barrier-inspection">Pool Barrier Inspection</option>
                            <option value="vendor-inspection">Vendor Inspection</option>
                            <option value="builders-warranty-inspection">Builders Warranty Inspection</option>
                        </select>

                        <textarea name="message" placeholder="Message / Details (e.g. 4-bedroom double storey in Tarneit, handover next week)">{{ old('message') }}</textarea>

                        <button type="submit" class="d-submit">
                            BOOK MY QUOTE
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </section>


    {{-- =====================================================
         2. WELCOME SECTION + INSPECTOR CARD
    ====================================================== --}}
    <section class="d-section d-welcome">
        <div class="d-container">

            <div class="d-welcome-grid">

                <div class="d-welcome-content" data-aos="fade-right">
                    <span class="small-title">Expert Handover Inspections</span>
                    <h2>
                        WELCOME TO PREMIUM NEW BUILD & PEST INSPECTIONS
                    </h2>

                    <p>
                        A newly constructed property may look perfect at first glance, but small defects and incomplete works can sometimes be overlooked during an emotional walkthrough.
                    </p>

                    <p>
                        Our New Build Handover Inspection (Practical Completion Inspection - PCI) provides an exhaustive visual and diagnostic assessment of accessible areas, helping identify visible workmanship issues, defects and items that require builder rectification before handover.
                    </p>

                    <div class="d-feature-mini">
                        <div class="d-feature-mini-icon">
                            <i class="bi bi-search"></i>
                        </div>
                        <div>
                            <h4>Comprehensive Defect Detection</h4>
                            <p>Identifying cracks, poor workmanship, misalignment, paint defects and cosmetic blemishes across every room.</p>
                        </div>
                    </div>

                    <div class="d-feature-mini">
                        <div class="d-feature-mini-icon">
                            <i class="bi bi-search"></i>
                        </div>
                        <div>
                            <h4>Victorian Standards Compliance</h4>
                            <p>Ensuring all construction and finishing works adhere to the VBA Guide to Standards and Tolerances.</p>
                        </div>
                    </div>

                    <div class="d-feature-mini">
                        <div class="d-feature-mini-icon">
                            <i class="bi bi-search"></i>
                        </div>
                        <div>
                            <h4>Detailed Photographic Report</h4>
                            <p>Fast digital report delivered with high-definition photos and clear explanations for your builder to rectify.</p>
                        </div>
                    </div>

                    <div class="d-feature-mini">
                        <div class="d-feature-mini-icon">
                            <i class="bi bi-search"></i>
                        </div>
                        <div>
                            <h4>Independent Peace of Mind</h4>
                            <p>We work 100% for you—giving you the expert backing and leverage needed before final settlement.</p>
                        </div>
                    </div>

                    <div style="margin-top: 28px;">
                        <a href="#quote-form" class="d-btn btn-glow">
                            BOOK AN INSPECTION <i class="bi bi-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>

                {{-- INSPECTOR CARD --}}
                <div class="d-inspector-card hover-lift" data-aos="fade-left">
                    <div class="d-inspector-title">
                        VBA REGISTERED
                    </div>

                    <img
                        src="{{ asset('images/ronak gami.jpeg') }}"
                        alt="Ronak Gami - VBA Registered Building Inspector"
                    >

                    <div class="d-inspector-name">
                        RONAK GAMI - VBA REGISTERED INSPECTOR & DOMESTIC BUILDER
                    </div>

                    <a href="tel:0466001551" class="d-inspector-btn">
                        <i class="bi bi-telephone-fill me-2"></i>
                        CALL 0466 001 551
                    </a>
                </div>

            </div>

        </div>
    </section>


    {{-- =====================================================
         3. WHY HANDOVER INSPECTIONS MATTER (2x2 GRID)
    ====================================================== --}}
    <section class="d-section d-matters">
        <div class="d-container">

            <div class="d-heading" data-aos="fade-up">
                <span class="small-title">Protect Your Investment</span>
                <h2>WHY A NEW BUILD HANDOVER INSPECTION IS IMPORTANT</h2>
                <p>
                    Before you sign off on practical completion and make your final drawdown payment, an independent handover inspection protects your rights.
                </p>
            </div>

            <div class="d-matters-grid">

                {{-- CARD 1 --}}
                <div class="d-matters-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="d-check-icon">✓</div>
                    <div class="d-matters-card-content">
                        <h4>Identifying Defects Before Settlement</h4>
                        <p>Catch incomplete works, poor tradesmanship, and cosmetic defects while the builder is legally bound to fix them.</p>
                    </div>
                </div>

                {{-- CARD 2 --}}
                <div class="d-matters-card" data-aos="fade-up" data-aos-delay="200">
                    <div class="d-check-icon">✓</div>
                    <div class="d-matters-card-content">
                        <h4>Ensuring Builder Accountability</h4>
                        <p>Our thorough VBA-referenced reports leave no room for builder disputes or delays in rectification.</p>
                    </div>
                </div>

                {{-- CARD 3 --}}
                <div class="d-matters-card" data-aos="fade-up" data-aos-delay="300">
                    <div class="d-check-icon">✓</div>
                    <div class="d-matters-card-content">
                        <h4>Avoiding Costly Future Repairs</h4>
                        <p>Prevent defects from deteriorating into expensive long-term maintenance issues after builder warranty periods.</p>
                    </div>
                </div>

                {{-- CARD 4 --}}
                <div class="d-matters-card" data-aos="fade-up" data-aos-delay="400">
                    <div class="d-check-icon">✓</div>
                    <div class="d-matters-card-content">
                        <h4>Total Peace of Mind</h4>
                        <p>Move into your brand-new home with absolute confidence knowing every area was checked by a registered inspector.</p>
                    </div>
                </div>

            </div>

        </div>
    </section>


    {{-- =====================================================
         4. COMPREHENSIVE HANDOVER INSPECTION PROCESS (SCOPE & g6.jpeg)
    ====================================================== --}}
    <section class="d-section d-scope">
        <div class="d-container">

            <div class="d-scope-grid">

                {{-- LEFT: SCOPE LIST --}}
                <div class="d-scope-content" data-aos="fade-right">
                    <span class="small-title" style="color: var(--d-green); font-size: 16px; font-weight: 800; text-transform: uppercase; letter-spacing: 1px; display: block; margin-bottom: 10px;">
                        THOROUGH SCOPE
                    </span>
                    <h3>OUR NEW BUILD HANDOVER INSPECTION PROCESS</h3>
                    <p>
                        During the handover inspection, our registered building inspector thoroughly checks accessible internal and external areas:
                    </p>

                    <ul class="d-scope-list">
                        <li class="d-scope-item">
                            <div class="d-scope-badge">1</div>
                            <div class="d-scope-info">
                                <strong>Internal Walls, Plasterwork & Paint</strong>
                                <span>Inspecting plaster joints, cornice alignment, paint coverage, blemishes, and hairline cracking.</span>
                            </div>
                        </li>

                        <li class="d-scope-item">
                            <div class="d-scope-badge">2</div>
                            <div class="d-scope-info">
                                <strong>Doors, Windows & Glazing</strong>
                                <span>Ensuring correct clearances, draft seals, smooth sliding operation, locks, and scratch-free glass.</span>
                            </div>
                        </li>

                        <li class="d-scope-item">
                            <div class="d-scope-badge">3</div>
                            <div class="d-scope-info">
                                <strong>Wet Areas, Waterproofing & Tiling</strong>
                                <span>Inspecting bathrooms, ensuites, laundry tiling, grout lines, falls to wastes, and silicone sealing.</span>
                            </div>
                        </li>

                        <li class="d-scope-item">
                            <div class="d-scope-badge">4</div>
                            <div class="d-scope-info">
                                <strong>Cabinetry, Joinery & Benchtops</strong>
                                <span>Verifying drawer alignments, cabinet levelness, benchtop joins, laminate edging, and soft-close mechanisms.</span>
                            </div>
                        </li>

                        <li class="d-scope-item">
                            <div class="d-scope-badge">5</div>
                            <div class="d-scope-info">
                                <strong>Plumbing Fixtures & Visible Drainage</strong>
                                <span>Testing taps, toilets, traps, vanities, and exterior downpipes for leaks and proper fall.</span>
                            </div>
                        </li>

                        <li class="d-scope-item">
                            <div class="d-scope-badge">6</div>
                            <div class="d-scope-info">
                                <strong>Roof Space, Insulation & Facade</strong>
                                <span>Checking accessible roof timbers, insulation coverage, sarking, brickwork perpends, and flashings.</span>
                            </div>
                        </li>
                    </ul>
                </div>

                {{-- RIGHT: IMAGE WITH ARROWS (g6.jpeg) --}}
                <div class="d-scope-image-wrapper" data-aos="fade-left">
                    <button class="d-slide-arrow d-slide-prev" type="button" aria-label="Previous">
                        <i class="bi bi-chevron-left"></i>
                    </button>

                    <img
                        src="{{ asset('images/g6.jpeg') }}"
                        alt="Ronak Gami inspecting waterproofing membrane during handover inspection"
                    >

                    <button class="d-slide-arrow d-slide-next" type="button" aria-label="Next">
                        <i class="bi bi-chevron-right"></i>
                    </button>
                </div>

            </div>

        </div>
    </section>


    {{-- =====================================================
         5. WHY CHOOSE US (LIGHT GREEN CONTAINER)
    ====================================================== --}}
    <section class="d-section" style="padding-top: 20px; padding-bottom: 20px;">
        <div class="d-container">

            <div class="d-choose" data-aos="zoom-in">

                <div class="d-heading" style="margin-bottom: 38px;">
                    <span class="small-title">WHY CHOOSE US</span>
                    <h2>WHY CHOOSE US FOR YOUR NEW BUILD HANDOVER INSPECTION?</h2>
                    <p>
                        We offer independent, licensed, and comprehensive inspection services throughout Melbourne.
                    </p>
                </div>

                <div class="d-choose-grid">

                    <div class="d-choose-item hover-lift">
                        <div class="d-choose-icon">
                            <i class="bi bi-patch-check-fill"></i>
                        </div>
                        <h4>VBA REGISTERED & INSURED</h4>
                        <p>Fully licensed Victorian Building Inspector (IN-PS 74654) and Domestic Builder (DB-L 100200).</p>
                    </div>

                    <div class="d-choose-item hover-lift">
                        <div class="d-choose-icon">
                            <i class="bi bi-speedometer2"></i>
                        </div>
                        <h4>SAME-DAY DETAILED REPORTS</h4>
                        <p>Comprehensive digital defect report with photographic proof delivered within 24 hours.</p>
                    </div>

                    <div class="d-choose-item hover-lift">
                        <div class="d-choose-icon">
                            <i class="bi bi-camera-fill"></i>
                        </div>
                        <h4>ADVANCED DIAGNOSTIC TOOLS</h4>
                        <p>Moisture meters and thermal imaging cameras used to detect concealed moisture and missing insulation.</p>
                    </div>

                    <div class="d-choose-item hover-lift">
                        <div class="d-choose-icon">
                            <i class="bi bi-shield-check"></i>
                        </div>
                        <h4>100% INDEPENDENT & UNBIASED</h4>
                        <p>We have no affiliations with builders or developers; we advocate strictly for your best interests.</p>
                    </div>

                </div>

            </div>

        </div>
    </section>


    {{-- =====================================================
         6. PRICING PACKAGES (3 CARDS)
    ====================================================== --}}
    <section class="d-section d-pricing">
        <div class="d-container">

            <div class="d-heading" data-aos="fade-up">
                <span class="small-title">OUR PRICING</span>
                <h2>TRANSPARENT & COMPETITIVE HANDOVER INSPECTION PACKAGES</h2>
                <p>
                    Fixed-price handover inspection packages tailored to your property size with no hidden fees.
                </p>
            </div>

            <div class="d-price-grid">

                {{-- CARD 1: 3 BEDROOM --}}
                <div class="d-price-card hover-lift" data-aos="fade-up" data-aos-delay="100">
                    <div>
                        <div class="d-price-icon">
                            <i class="bi bi-door-closed"></i>
                        </div>
                        <h3>3 BEDROOM</h3>
                        <div class="d-price">
                            $500* <small>+ GST</small>
                        </div>
                        <ul class="d-price-list">
                            <li>Full internal & external visual inspection</li>
                            <li>Detailed digital report with photos within 24h</li>
                            <li>Thermal imaging & moisture testing included</li>
                            <li>VBA Standards & Tolerances defect cross-reference</li>
                            <li>Direct phone consultation with Ronak Gami</li>
                        </ul>
                    </div>
                    <a href="#quote-form" class="d-price-btn">
                        BOOK NOW
                    </a>
                </div>

                {{-- CARD 2: 4 BEDROOM --}}
                <div class="d-price-card hover-lift" data-aos="fade-up" data-aos-delay="200">
                    <div>
                        <div class="d-price-icon">
                            <i class="bi bi-house-door"></i>
                        </div>
                        <h3>4 BEDROOM</h3>
                        <div class="d-price">
                            $550* <small>+ GST</small>
                        </div>
                        <ul class="d-price-list">
                            <li>Full internal & external visual inspection</li>
                            <li>Detailed digital report with photos within 24h</li>
                            <li>Thermal imaging & moisture testing included</li>
                            <li>VBA Standards & Tolerances defect cross-reference</li>
                            <li>Direct phone consultation with Ronak Gami</li>
                        </ul>
                    </div>
                    <a href="#quote-form" class="d-price-btn">
                        BOOK NOW
                    </a>
                </div>

                {{-- CARD 3: 5+ BEDROOM --}}
                <div class="d-price-card hover-lift" data-aos="fade-up" data-aos-delay="300">
                    <div>
                        <div class="d-price-icon">
                            <i class="bi bi-building"></i>
                        </div>
                        <h3>5+ BEDROOM</h3>
                        <div class="d-price">
                            $600* <small>+ GST</small>
                        </div>
                        <ul class="d-price-list">
                            <li>Full internal & external visual inspection</li>
                            <li>Detailed digital report with photos within 24h</li>
                            <li>Thermal imaging & moisture testing included</li>
                            <li>VBA Standards & Tolerances defect cross-reference</li>
                            <li>Direct phone consultation with Ronak Gami</li>
                        </ul>
                    </div>
                    <a href="#quote-form" class="d-price-btn">
                        BOOK NOW
                    </a>
                </div>

            </div>

        </div>
    </section>


    {{-- =====================================================
         7. CTA BANNER (ENSURE YOUR NEW HOME IS PERFECT)
    ====================================================== --}}
    <section class="d-cta">
        <div class="d-container">
            <div class="d-cta-content" data-aos="fade-right">
                <h2>ENSURE YOUR NEW HOME IS PERFECT</h2>
                <p>
                    Don't accept handover or release the final progress payment until you are 100% confident your builder has delivered the quality you paid for. Schedule your independent handover inspection today.
                </p>
                <a href="#quote-form" class="d-btn btn-glow">
                    BOOK AN INSPECTION NOW <i class="bi bi-arrow-right ms-2"></i>
                </a>
            </div>
        </div>
    </section>


    {{-- =====================================================
         8. CLIENT TESTIMONIALS / REVIEWS
    ====================================================== --}}
    <section class="d-section d-reviews">
        <div class="d-container">

            <div class="d-heading" data-aos="fade-up">
                <span class="small-title">REVIEWS</span>
                <h2>CLIENT TESTIMONIALS</h2>
                <p>What our clients say about our new build handover inspections across Melbourne.</p>
            </div>

            <div class="d-review-grid">

                <div class="d-review-card hover-lift" data-aos="fade-up" data-aos-delay="100">
                    <div class="d-review-quote">“</div>
                    <p>
                        "Ronak inspected our 4-bedroom home in Tarneit right before handover. He found over 40 defects that we would have missed, including unsealed shower screens and missing wall insulation. Truly invaluable service!"
                    </p>
                    <div class="d-stars">★★★★★</div>
                    <h4>David & Sarah M. (Tarneit)</h4>
                </div>

                <div class="d-review-card hover-lift" data-aos="fade-up" data-aos-delay="200">
                    <div class="d-review-quote">“</div>
                    <p>
                        "Exceptional service! The handover report was delivered on the same day with crisp photos and clear explanations referenced to VBA tolerances. It gave us the confidence to hold our builder accountable before the final drawdown."
                    </p>
                    <div class="d-stars">★★★★★</div>
                    <h4>Harpreet Singh (Point Cook)</h4>
                </div>

                <div class="d-review-card hover-lift" data-aos="fade-up" data-aos-delay="300">
                    <div class="d-review-quote">“</div>
                    <p>
                        "Ronak is polite, extremely thorough and very knowledgeable. He spent 3 hours going through every nook and corner of our new property. Highly recommend Premium Building Inspections to all new home buyers!"
                    </p>
                    <div class="d-stars">★★★★★</div>
                    <h4>Michael Chen (Craigieburn)</h4>
                </div>

            </div>

        </div>
    </section>


    {{-- =====================================================
         9. FREQUENTLY ASKED QUESTIONS (FAQ)
    ====================================================== --}}
    <section class="d-section d-faq">
        <div class="d-container">

            <div class="d-heading" data-aos="fade-up">
                <span class="small-title">Quick Answers</span>
                <h2>FREQUENTLY ASKED QUESTIONS</h2>
            </div>

            <div class="d-faq-grid">

                {{-- LEFT COLUMN --}}
                <div class="d-faq-col">

                    {{-- FAQ 1 (Active by default) --}}
                    <div class="d-faq-item active" data-aos="fade-up" data-aos-delay="100">
                        <button class="d-faq-question" type="button">
                            <span>What is a New Build Handover Inspection (PCI)?</span>
                            <i class="bi bi-chevron-down d-faq-icon"></i>
                        </button>
                        <div class="d-faq-answer">
                            A New Build Handover Inspection, also known as a Practical Completion Inspection (PCI), is an independent visual inspection conducted when the builder claims the home is finished. It identifies defects, incomplete trades, substandard finishes, and non-compliant items before final payment is made.
                        </div>
                    </div>

                    {{-- FAQ 2 --}}
                    <div class="d-faq-item" data-aos="fade-up" data-aos-delay="200">
                        <button class="d-faq-question" type="button">
                            <span>When is the best time to schedule the inspection?</span>
                            <i class="bi bi-chevron-down d-faq-icon"></i>
                        </button>
                        <div class="d-faq-answer">
                            The ideal time is when the builder has issued the Notice of Practical Completion and invited you for your final walkthrough, usually 1 to 2 weeks prior to handover and before making the final progress payment.
                        </div>
                    </div>

                    {{-- FAQ 3 --}}
                    <div class="d-faq-item" data-aos="fade-up" data-aos-delay="300">
                        <button class="d-faq-question" type="button">
                            <span>What happens if the builder refuses to fix defects?</span>
                            <i class="bi bi-chevron-down d-faq-icon"></i>
                        </button>
                        <div class="d-faq-answer">
                            Our reports cite specific clauses from the Victorian Building Authority (VBA) Guide to Standards and Tolerances and National Construction Code. Because defects are documented with photographic evidence and standards references, builders are legally obligated to rectify non-compliant works.
                        </div>
                    </div>

                </div>

                {{-- RIGHT COLUMN --}}
                <div class="d-faq-col">

                    {{-- FAQ 4 (Active by default) --}}
                    <div class="d-faq-item active" data-aos="fade-up" data-aos-delay="150">
                        <button class="d-faq-question" type="button">
                            <span>Which building standards do you inspect against?</span>
                            <i class="bi bi-chevron-down d-faq-icon"></i>
                        </button>
                        <div class="d-faq-answer">
                            All inspections are conducted strictly in accordance with Australian Standards (AS 4349.0 / AS 4349.1), the National Construction Code (NCC), and the Victorian Building Authority (VBA) Guide to Standards and Tolerances.
                        </div>
                    </div>

                    {{-- FAQ 5 --}}
                    <div class="d-faq-item" data-aos="fade-up" data-aos-delay="250">
                        <button class="d-faq-question" type="button">
                            <span>How fast will I receive the handover report?</span>
                            <i class="bi bi-chevron-down d-faq-icon"></i>
                        </button>
                        <div class="d-faq-answer">
                            We understand time is critical before handover. Your comprehensive digital report with clear photos and categorized defect descriptions is delivered within 24 hours of inspection completion.
                        </div>
                    </div>

                    {{-- FAQ 6 --}}
                    <div class="d-faq-item" data-aos="fade-up" data-aos-delay="350">
                        <button class="d-faq-question" type="button">
                            <span>Can I be present at the property during the inspection?</span>
                            <i class="bi bi-chevron-down d-faq-icon"></i>
                        </button>
                        <div class="d-faq-answer">
                            Yes, you are welcome to attend the final part of the inspection where Ronak can walk you through the key findings, answer questions, and explain items that need to be addressed with your site supervisor.
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </section>

</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const faqButtons = document.querySelectorAll('.d-faq-question');
    faqButtons.forEach(button => {
        button.addEventListener('click', function () {
            const item = this.parentElement;
            const isActive = item.classList.contains('active');
            
            // Toggle clicked
            if (isActive) {
                item.classList.remove('active');
            } else {
                item.classList.add('active');
            }
        });
    });
});
</script>

@endsection