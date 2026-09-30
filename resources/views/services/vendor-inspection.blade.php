@extends('layouts.app')

@section('title', 'Vendor Inspection Melbourne | Pre-Sale Building & Pest Inspections')

@section('content')

<style>
/* =========================================================
   VENDOR INSPECTION PAGE STYLES
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
   3. WHY VENDOR INSPECTIONS MATTER (2x2 GRID)
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
   4. COMPREHENSIVE VENDOR INSPECTION SCOPE (g11.jpeg)
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
   7. CTA BANNER (SELL WITH CONFIDENCE)
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
                        VENDOR INSPECTIONS –<br>ENSURE A HASSLE-FREE<br>PROPERTY SALE
                    </h1>

                    <p>
                        A professional vendor pre-sale inspection helps identify visible building defects and maintenance issues before listing, empowering you to fix problems early and sell at peak value.
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
                            <option value="vendor-inspection" selected>Vendor Inspection</option>
                            <option value="pre-purchase-building-and-pest-inspection">Pre-Purchase Building & Pest Inspection</option>
                            <option value="building-stage-by-stage-inspection">Building Stage By Stage Inspection</option>
                            <option value="new-build-handover-inspection">New Build Handover Inspection</option>
                            <option value="dilapidation-report">Dilapidation Inspection</option>
                            <option value="apartment-building-inspection">Apartment Building Inspection</option>
                            <option value="rising-damp-inspection">Rising Damp Inspection</option>
                            <option value="pool-barrier-inspection">Pool Barrier Inspection</option>
                            <option value="builders-warranty-inspection">Builders Warranty Inspection</option>
                        </select>

                        <textarea name="message" placeholder="Message / Details (e.g. 3-bedroom house in Werribee, listing for auction next month)">{{ old('message') }}</textarea>

                        <button type="submit" class="d-submit">
                            GET MY QUOTE
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
                    <span class="small-title">Expert Vendor Inspections</span>
                    <h2>
                        WELCOME TO PREMIUM NEW BUILD & PEST INSPECTIONS
                    </h2>

                    <p>
                        Selling a property is one of the most significant financial transactions you will make. A vendor inspection (pre-sale building inspection) allows you to uncover hidden defects and maintenance issues before listing your home on the market.
                    </p>

                    <p>
                        By identifying defects early, you avoid contract renegotiations, buyer price reductions, and unexpected deal collapses during the cooling-off period.
                    </p>

                    <div class="d-feature-mini">
                        <div class="d-feature-mini-icon">
                            <i class="bi bi-search"></i>
                        </div>
                        <div>
                            <h4>Pre-Sale Defect Identification</h4>
                            <p>Catch structural, cosmetic, and safety issues before potential buyers' inspectors find them.</p>
                        </div>
                    </div>

                    <div class="d-feature-mini">
                        <div class="d-feature-mini-icon">
                            <i class="bi bi-search"></i>
                        </div>
                        <div>
                            <h4>Eliminate Buyer Negotiation Power</h4>
                            <p>Prevent prospective buyers from demanding thousands off your asking price due to minor defects.</p>
                        </div>
                    </div>

                    <div class="d-feature-mini">
                        <div class="d-feature-mini-icon">
                            <i class="bi bi-search"></i>
                        </div>
                        <div>
                            <h4>Fast 24-Hour Digital Reporting</h4>
                            <p>Receive a comprehensive, easy-to-read inspection report with high-definition photos.</p>
                        </div>
                    </div>

                    <div class="d-feature-mini">
                        <div class="d-feature-mini-icon">
                            <i class="bi bi-search"></i>
                        </div>
                        <div>
                            <h4>Smooth Settlement & Faster Sale</h4>
                            <p>Present an independent inspection report to serious buyers, speeding up negotiations and closing deals faster.</p>
                        </div>
                    </div>

                    <div style="margin-top: 28px;">
                        <a href="#quote-form" class="d-btn btn-glow">
                            GET A QUOTE <i class="bi bi-arrow-right ms-2"></i>
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
         3. WHY VENDOR INSPECTIONS MATTER (2x2 GRID)
    ====================================================== --}}
    <section class="d-section d-matters">
        <div class="d-container">

            <div class="d-heading" data-aos="fade-up">
                <span class="small-title">Maximize Your Return</span>
                <h2>WHY A PRE-SALE VENDOR INSPECTION IS IMPORTANT</h2>
                <p>
                    Take control of the sales process before putting your property on the market and prevent buyers from chipping away at your price.
                </p>
            </div>

            <div class="d-matters-grid">

                {{-- CARD 1 --}}
                <div class="d-matters-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="d-check-icon">✓</div>
                    <div class="d-matters-card-content">
                        <h4>Prevent Last-Minute Deal Collapses</h4>
                        <p>Avoid buyers terminating contracts on finance or inspection clauses due to unexpected building defects.</p>
                    </div>
                </div>

                {{-- CARD 2 --}}
                <div class="d-matters-card" data-aos="fade-up" data-aos-delay="200">
                    <div class="d-check-icon">✓</div>
                    <div class="d-matters-card-content">
                        <h4>Control Repair Costs</h4>
                        <p>Choose your own trusted tradespeople to fix issues at normal market rates instead of paying inflated buyer deductions.</p>
                    </div>
                </div>

                {{-- CARD 3 --}}
                <div class="d-matters-card" data-aos="fade-up" data-aos-delay="300">
                    <div class="d-check-icon">✓</div>
                    <div class="d-matters-card-content">
                        <h4>Maximize Your Final Sale Price</h4>
                        <p>Sell with total transparency and attract higher, cleaner offers from confident and decisive bidders.</p>
                    </div>
                </div>

                {{-- CARD 4 --}}
                <div class="d-matters-card" data-aos="fade-up" data-aos-delay="400">
                    <div class="d-check-icon">✓</div>
                    <div class="d-matters-card-content">
                        <h4>Total Peace of Mind</h4>
                        <p>Enter auction day or private negotiations with full knowledge of your property's genuine condition.</p>
                    </div>
                </div>

            </div>

        </div>
    </section>


    {{-- =====================================================
         4. COMPREHENSIVE VENDOR INSPECTION SCOPE (g11.jpeg)
    ====================================================== --}}
    <section class="d-section d-scope">
        <div class="d-container">

            <div class="d-scope-grid">

                {{-- LEFT: SCOPE LIST --}}
                <div class="d-scope-content" data-aos="fade-right">
                    <span class="small-title" style="color: var(--d-green); font-size: 16px; font-weight: 800; text-transform: uppercase; letter-spacing: 1px; display: block; margin-bottom: 10px;">
                        THOROUGH SCOPE
                    </span>
                    <h3>COMPREHENSIVE VENDOR INSPECTION SCOPE</h3>
                    <p>
                        Our registered building inspector thoroughly assesses all accessible internal and external areas of your property:
                    </p>

                    <ul class="d-scope-list">
                        <li class="d-scope-item">
                            <div class="d-scope-badge">1</div>
                            <div class="d-scope-info">
                                <strong>Internal Living Areas & Plasterwork</strong>
                                <span>Walls, ceilings, timber floors, tiles, cornices, doors, windows, and paint finishes.</span>
                            </div>
                        </li>

                        <li class="d-scope-item">
                            <div class="d-scope-badge">2</div>
                            <div class="d-scope-info">
                                <strong>Wet Areas & Moisture Checks</strong>
                                <span>Comprehensive checks of bathrooms, showers, ensuites, laundry, and kitchen plumbing.</span>
                            </div>
                        </li>

                        <li class="d-scope-item">
                            <div class="d-scope-badge">3</div>
                            <div class="d-scope-info">
                                <strong>Subfloor & Foundations (where accessible)</strong>
                                <span>Footings, stumps, bearer timbers, ventilation, and ground moisture conditions.</span>
                            </div>
                        </li>

                        <li class="d-scope-item">
                            <div class="d-scope-badge">4</div>
                            <div class="d-scope-info">
                                <strong>Roof Space, Structure & Insulation</strong>
                                <span>Accessible roof framing, trusses, sarking, insulation coverage, and visible leaks.</span>
                            </div>
                        </li>

                        <li class="d-scope-item">
                            <div class="d-scope-badge">5</div>
                            <div class="d-scope-info">
                                <strong>Exterior Facade, Brickwork & Grounds</strong>
                                <span>External walls, mortar joints, lintels, weep holes, site drainage, and perimeter fences.</span>
                            </div>
                        </li>
                    </ul>
                </div>

                {{-- RIGHT: IMAGE WITH ARROWS (g11.jpeg) --}}
                <div class="d-scope-image-wrapper" data-aos="fade-left">
                    <button class="d-slide-arrow d-slide-prev" type="button" aria-label="Previous">
                        <i class="bi bi-chevron-left"></i>
                    </button>

                    <img
                        src="{{ asset('images/g11.jpeg') }}"
                        alt="Ronak Gami conducting vendor pre-sale electrical and exterior building inspection"
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
                    <h2>WHY CHOOSE US FOR YOUR VENDOR INSPECTION?</h2>
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
                        <p>Moisture meters and thermal imaging cameras used to detect concealed moisture and defects.</p>
                    </div>

                    <div class="d-choose-item hover-lift">
                        <div class="d-choose-icon">
                            <i class="bi bi-shield-check"></i>
                        </div>
                        <h4>100% INDEPENDENT & UNBIASED</h4>
                        <p>We work exclusively for you, providing clear objective advice to empower your sale negotiations.</p>
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
                <h2>TRANSPARENT AND COMPETITIVE PRICING</h2>
                <p>
                    Fixed-price vendor pre-sale inspection packages tailored to your property size with no hidden costs.
                </p>
            </div>

            <div class="d-price-grid">

                {{-- CARD 1: 1-2 BEDROOM --}}
                <div class="d-price-card hover-lift" data-aos="fade-up" data-aos-delay="100">
                    <div>
                        <div class="d-price-icon">
                            <i class="bi bi-door-closed"></i>
                        </div>
                        <h3>1-2 BEDROOM</h3>
                        <div class="d-price">
                            $400* <small>+ GST</small>
                        </div>
                        <ul class="d-price-list">
                            <li>Full internal & external visual inspection</li>
                            <li>Same-day digital defect report with HD photos</li>
                            <li>Thermal imaging & moisture testing included</li>
                            <li>Major structural & minor defect assessment</li>
                            <li>Direct phone consultation with Ronak Gami</li>
                        </ul>
                    </div>
                    <a href="#quote-form" class="d-price-btn">
                        BOOK NOW
                    </a>
                </div>

                {{-- CARD 2: 3-4 BEDROOM --}}
                <div class="d-price-card hover-lift" data-aos="fade-up" data-aos-delay="200">
                    <div>
                        <div class="d-price-icon">
                            <i class="bi bi-house-door"></i>
                        </div>
                        <h3>3-4 BEDROOM</h3>
                        <div class="d-price">
                            $450* <small>+ GST</small>
                        </div>
                        <ul class="d-price-list">
                            <li>Full internal & external visual inspection</li>
                            <li>Same-day digital defect report with HD photos</li>
                            <li>Thermal imaging & moisture testing included</li>
                            <li>Major structural & minor defect assessment</li>
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
                            $525* <small>+ GST</small>
                        </div>
                        <ul class="d-price-list">
                            <li>Full internal & external visual inspection</li>
                            <li>Same-day digital defect report with HD photos</li>
                            <li>Thermal imaging & moisture testing included</li>
                            <li>Major structural & minor defect assessment</li>
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
         7. CTA BANNER (SELL WITH CONFIDENCE)
    ====================================================== --}}
    <section class="d-cta">
        <div class="d-container">
            <div class="d-cta-content" data-aos="fade-right">
                <h2>SELL WITH CONFIDENCE – BOOK YOUR VENDOR INSPECTION TODAY</h2>
                <p>
                    Avoid unexpected renegotiations, price chipping, or contract terminations. Present serious buyers with a professional, independent building report and achieve top dollar for your property.
                </p>
                <a href="#quote-form" class="d-btn btn-glow">
                    GET A QUOTE NOW <i class="bi bi-arrow-right ms-2"></i>
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
                <p>What vendors and homeowners say about our pre-sale building inspections across Melbourne.</p>
            </div>

            <div class="d-review-grid">

                <div class="d-review-card hover-lift" data-aos="fade-up" data-aos-delay="100">
                    <div class="d-review-quote">“</div>
                    <p>
                        "Booking a vendor inspection with Ronak before putting our house on the market was the best decision we made. We fixed 3 minor roof plumbing issues beforehand, and our sale went through smoothly with zero buyer haggling!"
                    </p>
                    <div class="d-stars">★★★★★</div>
                    <h4>Mark & Chloe D. (Werribee)</h4>
                </div>

                <div class="d-review-card hover-lift" data-aos="fade-up" data-aos-delay="200">
                    <div class="d-review-quote">“</div>
                    <p>
                        "Ronak was punctual, incredibly thorough, and provided a detailed report on the very same day. Having the report on hand gave prospective buyers massive confidence during our private auction campaign."
                    </p>
                    <div class="d-stars">★★★★★</div>
                    <h4>Vikram Patel (Truganina)</h4>
                </div>

                <div class="d-review-card hover-lift" data-aos="fade-up" data-aos-delay="300">
                    <div class="d-review-quote">“</div>
                    <p>
                        "Outstanding professionalism! The report was clear and easy to understand with comprehensive photos. It helped us set the right reserve price and achieve a fast, unconditional sale."
                    </p>
                    <div class="d-stars">★★★★★</div>
                    <h4>Alan T. (Point Cook)</h4>
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
                            <span>What is a Vendor Inspection?</span>
                            <i class="bi bi-chevron-down d-faq-icon"></i>
                        </button>
                        <div class="d-faq-answer">
                            A Vendor Inspection, or pre-sale building inspection, is commissioned by the property seller prior to listing. It gives you a complete, unbiased evaluation of your home’s condition, allowing you to fix issues early or disclose them openly to avoid post-offer renegotiations.
                        </div>
                    </div>

                    {{-- FAQ 2 --}}
                    <div class="d-faq-item" data-aos="fade-up" data-aos-delay="200">
                        <button class="d-faq-question" type="button">
                            <span>Should I fix all defects identified in the report?</span>
                            <i class="bi bi-chevron-down d-faq-icon"></i>
                        </button>
                        <div class="d-faq-answer">
                            Not necessarily. You can prioritize safety or structural items that could derail a contract, and choose to disclose minor cosmetic flaws upfront or adjust your pricing expectations accordingly.
                        </div>
                    </div>

                    {{-- FAQ 3 --}}
                    <div class="d-faq-item" data-aos="fade-up" data-aos-delay="300">
                        <button class="d-faq-question" type="button">
                            <span>Can I show the inspection report to buyers?</span>
                            <i class="bi bi-chevron-down d-faq-icon"></i>
                        </button>
                        <div class="d-faq-answer">
                            Absolutely. Providing an independent inspection report from a VBA registered inspector builds trust, demonstrates transparency, and encourages buyers to make cleaner, unconditional offers faster.
                        </div>
                    </div>

                </div>

                {{-- RIGHT COLUMN --}}
                <div class="d-faq-col">

                    {{-- FAQ 4 (Active by default) --}}
                    <div class="d-faq-item active" data-aos="fade-up" data-aos-delay="150">
                        <button class="d-faq-question" type="button">
                            <span>How does a vendor inspection protect my price?</span>
                            <i class="bi bi-chevron-down d-faq-icon"></i>
                        </button>
                        <div class="d-faq-answer">
                            When buyers commission their own building inspector, minor defects are often exaggerated to justify price reductions of thousands of dollars. By having your own independent report beforehand, you eliminate unexpected surprises and protect your agreed sale price.
                        </div>
                    </div>

                    {{-- FAQ 5 --}}
                    <div class="d-faq-item" data-aos="fade-up" data-aos-delay="250">
                        <button class="d-faq-question" type="button">
                            <span>How quickly do I receive the completed report?</span>
                            <i class="bi bi-chevron-down d-faq-icon"></i>
                        </button>
                        <div class="d-faq-answer">
                            We understand the fast pace of property marketing campaigns. Your comprehensive digital report with high-resolution photos is delivered within 24 hours of completing the inspection.
                        </div>
                    </div>

                    {{-- FAQ 6 --}}
                    <div class="d-faq-item" data-aos="fade-up" data-aos-delay="350">
                        <button class="d-faq-question" type="button">
                            <span>What building standards do you inspect against?</span>
                            <i class="bi bi-chevron-down d-faq-icon"></i>
                        </button>
                        <div class="d-faq-answer">
                            All vendor inspections comply strictly with Australian Standard AS 4349.1 for residential building inspections, the National Construction Code (NCC), and the Victorian Building Authority (VBA) guidelines.
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