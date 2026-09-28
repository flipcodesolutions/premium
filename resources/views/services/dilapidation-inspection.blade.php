@extends('layouts.app')

@section('title', 'Dilapidation Inspection Melbourne | Premium Building & Pest Inspections')

@section('content')

<style>
/* =========================================================
   DILAPIDATION INSPECTION PAGE STYLES
   Designed 1:1 to match reference layout
   With increased font sizes as requested
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
    font-size: 16px;
    line-height: 1.7;
}

/* Container */
.d-container {
    width: 92%;
    max-width: 1180px;
    margin: 0 auto;
}

.d-section {
    padding: 70px 0;
}

/* Headings with increased font sizes */
.d-heading {
    text-align: center;
    margin-bottom: 40px;
}

.d-heading .small-title {
    display: block;
    margin-bottom: 10px;
    color: var(--d-green);
    font-size: 15px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 1.2px;
}

.d-heading h2 {
    margin: 0;
    color: var(--d-navy);
    font-size: clamp(26px, 3.4vw, 34px);
    line-height: 1.25;
    font-weight: 900;
    text-transform: uppercase;
}

.d-heading p {
    max-width: 760px;
    margin: 14px auto 0;
    color: var(--d-muted);
    font-size: 16px;
    line-height: 1.75;
}

/* Buttons */
.d-btn {
    display: inline-flex;
    justify-content: center;
    align-items: center;
    padding: 14px 28px;
    background: var(--d-green);
    color: #fff !important;
    border: 0;
    border-radius: 4px;
    font-size: 15.5px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 0.5px;
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
    padding: 14px 11px;
    font-size: 13.5px;
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
    padding-right: 15px;
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
        url("{{ asset('images/dilapidation.jpg') }}") center center / cover no-repeat;
    color: #fff;
    padding: 25px 0;
}

.d-hero-inner {
    display: grid;
    grid-template-columns: 1.15fr 0.85fr;
    gap: 45px;
    align-items: center;
    padding: 60px 0 70px;
}

.d-hero-content h1 {
    font-size: clamp(28px, 4vw, 42px);
    line-height: 1.18;
    font-weight: 900;
    color: #ffffff;
    margin: 0 0 16px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.d-hero-tag {
    display: inline-block;
    color: #ffffff;
    font-size: 14.5px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-bottom: 16px;
    opacity: 0.95;
}

.d-hero-content p {
    color: rgba(255, 255, 255, 0.94);
    font-size: 16.5px;
    line-height: 1.75;
    margin: 0 0 26px;
    max-width: 600px;
}

.d-hero-license {
    display: inline-block;
    margin-top: 16px;
    font-size: 13.5px;
    color: rgba(255, 255, 255, 0.85);
    font-weight: 600;
}

/* Hero Form */
.d-hero-form {
    background: #ffffff;
    border-radius: 8px;
    padding: 28px 26px;
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
    padding: 12px 14px;
    border: 1px solid #d2d6dc;
    border-radius: 4px;
    font-size: 14.5px;
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
    min-height: 75px;
}

.d-hero-form .d-submit {
    width: 100%;
    padding: 14px;
    background: var(--d-green);
    color: #fff;
    border: 0;
    border-radius: 4px;
    font-size: 15.5px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 0.5px;
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
    margin-bottom: 10px;
    color: var(--d-green);
    font-size: 14.5px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.d-welcome-content h2 {
    color: var(--d-navy);
    font-size: clamp(26px, 3.3vw, 34px);
    line-height: 1.25;
    font-weight: 900;
    margin: 0 0 18px;
    text-transform: uppercase;
}

.d-welcome-content > p {
    color: var(--d-muted);
    font-size: 16px;
    line-height: 1.75;
    margin: 0 0 18px;
}

.d-feature-mini {
    display: flex;
    gap: 16px;
    margin-bottom: 16px;
    align-items: flex-start;
}

.d-feature-mini-icon {
    width: 36px;
    height: 36px;
    min-width: 36px;
    border-radius: 50%;
    background: #e8f4fc;
    color: var(--d-cyan);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 17px;
    margin-top: 2px;
}

.d-feature-mini h4 {
    margin: 0 0 4px;
    color: var(--d-navy);
    font-size: 15.5px;
    font-weight: 800;
    text-transform: uppercase;
}

.d-feature-mini p {
    margin: 0;
    color: var(--d-muted);
    font-size: 14.5px;
    line-height: 1.6;
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
    font-size: 14.5px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 1px;
    padding: 11px 16px;
}

.d-inspector-card img {
    width: 100%;
    height: 350px;
    object-fit: cover;
    object-position: center top;
    display: block;
}

.d-inspector-name {
    padding: 15px 12px 10px;
    font-size: 15px;
    font-weight: 800;
    color: var(--d-navy);
    text-transform: uppercase;
}

.d-inspector-btn {
    display: block;
    background: var(--d-green);
    color: #ffffff !important;
    text-decoration: none;
    padding: 12px;
    font-size: 15.5px;
    font-weight: 800;
    letter-spacing: 0.5px;
    transition: background 0.2s ease;
}

.d-inspector-btn:hover {
    background: var(--d-green-dark);
}

/* =========================================================
   3. WHY DILAPIDATION INSPECTIONS MATTER (2x2 GRID)
========================================================= */
.d-matters {
    background: #fbfcfc;
}

.d-matters-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 18px;
    max-width: 1040px;
    margin: 0 auto;
}

.d-matters-card {
    background: #ffffff;
    border: 1px solid #e5e9ec;
    border-radius: 6px;
    padding: 20px 22px;
    display: flex;
    align-items: flex-start;
    gap: 16px;
    box-shadow: 0 3px 10px rgba(0, 0, 0, 0.03);
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.d-matters-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08);
}

.d-check-icon {
    width: 28px;
    height: 28px;
    min-width: 28px;
    border-radius: 50%;
    background: var(--d-green);
    color: #ffffff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 14px;
    font-weight: 900;
    margin-top: 3px;
}

.d-matters-card-content h4 {
    margin: 0 0 6px;
    color: var(--d-navy);
    font-size: 16px;
    font-weight: 800;
}

.d-matters-card-content p {
    margin: 0;
    color: var(--d-muted);
    font-size: 14.5px;
    line-height: 1.65;
}

/* =========================================================
   4. COMPREHENSIVE DILAPIDATION INSPECTIONS (SCOPE & g13.jpeg)
========================================================= */
.d-scope-grid {
    display: grid;
    grid-template-columns: 1.15fr 0.85fr;
    gap: 45px;
    align-items: center;
}

.d-scope-content h3 {
    font-size: clamp(22px, 2.6vw, 28px);
    line-height: 1.25;
    font-weight: 900;
    color: var(--d-navy);
    margin: 0 0 14px;
    text-transform: uppercase;
}

.d-scope-content > p {
    color: var(--d-muted);
    font-size: 15.5px;
    line-height: 1.75;
    margin-bottom: 22px;
}

.d-scope-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.d-scope-item {
    display: flex;
    gap: 16px;
    margin-bottom: 18px;
    align-items: flex-start;
}

.d-scope-badge {
    width: 30px;
    height: 30px;
    min-width: 30px;
    border-radius: 50%;
    background: var(--d-green);
    color: #fff;
    font-size: 14px;
    font-weight: 800;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-top: 2px;
}

.d-scope-info strong {
    display: block;
    color: var(--d-navy);
    font-size: 15.5px;
    font-weight: 800;
    margin-bottom: 3px;
}

.d-scope-info span {
    display: block;
    color: var(--d-muted);
    font-size: 14.5px;
    line-height: 1.6;
}

.d-scope-image-wrapper {
    position: relative;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.12);
    height: 420px;
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
    width: 38px;
    height: 38px;
    border: 0;
    background: rgba(255, 255, 255, 0.85);
    color: #333;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 17px;
    cursor: pointer;
    box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2);
    transition: all 0.2s ease;
}

.d-slide-arrow:hover {
    background: #fff;
    color: var(--d-green);
}

.d-slide-prev {
    left: 12px;
}

.d-slide-next {
    right: 12px;
}

/* =========================================================
   5. WHY CHOOSE US (LIGHT GREEN BOX)
========================================================= */
.d-choose {
    padding: 55px 38px;
    background: var(--d-choose-bg);
    border-radius: 18px;
}

.d-choose-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 22px;
}

.d-choose-item {
    text-align: center;
    background: #ffffff;
    padding: 28px 20px;
    border-radius: 8px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
    transition: transform 0.3s ease;
}

.d-choose-item:hover {
    transform: translateY(-4px);
}

.d-choose-icon {
    width: 52px;
    height: 52px;
    margin: 0 auto 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: var(--d-green);
    color: #fff;
    border-radius: 6px;
    font-size: 24px;
}

.d-choose-item h4 {
    margin: 0 0 10px;
    color: var(--d-navy);
    font-size: 15.5px;
    font-weight: 900;
    text-transform: uppercase;
}

.d-choose-item p {
    margin: 0;
    color: #4a5568;
    font-size: 14px;
    line-height: 1.65;
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
    gap: 26px;
    max-width: 1060px;
    margin: 0 auto;
}

.d-price-card {
    background: #fff;
    border: 1px solid #e4e4e4;
    border-top: 3px solid var(--d-green);
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.06);
    text-align: center;
    padding: 30px 22px;
    border-radius: 4px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.d-price-icon {
    font-size: 34px;
    color: var(--d-navy);
    margin-bottom: 12px;
}

.d-price-card h3 {
    margin: 0 0 10px;
    color: var(--d-navy);
    font-size: 17px;
    font-weight: 900;
    text-transform: uppercase;
}

.d-price {
    color: var(--d-green);
    font-size: 36px;
    font-weight: 900;
    margin-bottom: 16px;
}

.d-price small {
    color: #666;
    font-size: 13px;
    font-weight: 600;
}

.d-price-list {
    list-style: none;
    padding: 0;
    margin: 0 0 24px;
    text-align: left;
    flex-grow: 1;
}

.d-price-list li {
    padding: 9px 0;
    border-bottom: 1px solid #eee;
    color: #4a5568;
    font-size: 14.5px;
    display: flex;
    align-items: flex-start;
}

.d-price-list li::before {
    content: "✓";
    color: var(--d-green);
    margin-right: 10px;
    font-weight: 900;
    font-size: 15px;
}

.d-price-btn {
    display: block;
    width: 100%;
    padding: 13px;
    background: var(--d-green);
    color: #fff !important;
    text-decoration: none;
    font-size: 15px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    border-radius: 3px;
    transition: all 0.25s ease;
}

.d-price-btn:hover {
    background: var(--d-green-dark);
}

/* =========================================================
   7. CTA BANNER (SCHEDULE YOUR INSPECTION TODAY)
========================================================= */
.d-cta {
    min-height: 390px;
    display: flex;
    align-items: center;
    background:
        linear-gradient(
            90deg,
            rgba(4, 43, 75, 0.96) 0%,
            rgba(4, 43, 75, 0.88) 55%,
            rgba(4, 43, 75, 0.40) 100%
        ),
        url("{{ asset('images/schedule.jpeg') }}") center right / cover no-repeat;
}

.d-cta-content {
    max-width: 660px;
    color: #fff;
    padding: 55px 0;
}

.d-cta-content h2 {
    margin: 0 0 16px;
    font-size: clamp(26px, 3.5vw, 36px);
    line-height: 1.2;
    font-weight: 900;
    text-transform: uppercase;
    color: #fff;
}

.d-cta-content p {
    margin: 0 0 24px;
    color: rgba(255, 255, 255, 0.92);
    font-size: 16.5px;
    line-height: 1.75;
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
    gap: 22px;
}

.d-review-card {
    text-align: center;
    padding: 28px 22px;
    border-bottom: 3px solid #eee;
    box-shadow: 0 7px 20px rgba(0, 0, 0, 0.06);
    border-radius: 4px;
    background: #fff;
}

.d-review-quote {
    color: var(--d-cyan);
    font-size: 40px;
    line-height: 1;
    margin-bottom: 8px;
}

.d-review-card p {
    min-height: 75px;
    color: #4a5568;
    font-size: 15px;
    line-height: 1.7;
}

.d-stars {
    color: var(--d-orange);
    letter-spacing: 3px;
    font-size: 17px;
    margin: 14px 0 16px;
}

.d-review-card h4 {
    margin: 0;
    color: var(--d-navy);
    font-size: 15.5px;
    font-weight: 800;
}

/* =========================================================
   9. FAQ ACCORDION SECTION
========================================================= */
.d-faq {
    background: #fff;
    padding-bottom: 75px;
}

.d-faq-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 14px 22px;
}

.d-faq-item {
    border: 1px solid #e4e4e4;
    background: #fff;
    border-radius: 4px;
    overflow: hidden;
    margin-bottom: 10px;
}

.d-faq-question {
    width: 100%;
    padding: 16px 18px;
    border: 0;
    background: #fff;
    color: var(--d-navy);
    display: flex;
    justify-content: space-between;
    align-items: center;
    text-align: left;
    font-size: 15.5px;
    font-weight: 800;
    cursor: pointer;
    transition: all 0.2s ease;
}

.d-faq-question:hover {
    background: #f7f9fa;
}

.d-faq-answer {
    display: none;
    padding: 0 18px 16px;
    color: #4a5568;
    font-size: 15px;
    line-height: 1.7;
}

/* Active FAQ Item: Green background on header */
.d-faq-item.active .d-faq-question {
    background: var(--d-green);
    color: #fff;
}

.d-faq-item.active .d-faq-answer {
    display: block;
    background: #fff;
    padding-top: 16px;
}

.d-faq-item.active .d-faq-icon {
    transform: rotate(180deg);
    color: #fff;
}

.d-faq-icon {
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
        gap: 38px;
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
        padding: 45px 0;
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
        padding: 32px 20px;
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
                        PREMIUM BUILDING & PEST INSPECTIONS
                    </span>

                    <h1>
                        DILAPIDATION<br>INSPECTION -<br>COMPREHENSIVE<br>REPORTS
                    </h1>

                    <p>
                        A professional dilapidation inspection documents the existing condition of a property before nearby construction, excavation, demolition or development works to protect you against dispute liabilities.
                    </p>

                    <div>
                        <a href="tel:0466001551" class="d-btn btn-glow">
                            <i class="bi bi-telephone-fill me-2"></i>
                            0466 001 551
                        </a>
                    </div>

                    <div class="d-license">
                        VBA Building Inspector Licence No. IN-PS 74654 &nbsp;|&nbsp; Domestic Builder Licence No. DB-L 100200
                    </div>
                </div>

                {{-- HERO FORM --}}
                <div id="quote-form" class="d-hero-form hover-lift" data-aos="fade-left" data-aos-duration="850">
                    @if(session('success'))
                        <div class="alert alert-success py-2 mb-2" style="font-size: 14px;">
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
                            <option value="dilapidation-report" selected>Dilapidation Inspection</option>
                            <option value="pre-purchase-building-and-pest-inspection">Pre-Purchase Building & Pest Inspection</option>
                            <option value="building-stage-by-stage-inspection">Building Stage By Stage Inspection</option>
                            <option value="new-build-handover-inspection">New Build Handover Inspection</option>
                            <option value="apartment-building-inspection">Apartment Building Inspection</option>
                            <option value="rising-damp-inspection">Rising Damp Inspection</option>
                            <option value="pool-barrier-inspection">Pool Barrier Inspection</option>
                            <option value="vendor-inspection">Vendor Inspection</option>
                            <option value="builders-warranty-inspection">Builders Warranty Inspection</option>
                        </select>

                        <textarea name="message" placeholder="Message / Details (e.g. Demolition next door, commercial build, roadworks)">{{ old('message') }}</textarea>

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
                    <span class="small-title">Expert Dilapidation Inspections</span>
                    <h2>
                        WELCOME TO PREMIUM BUILDING & PEST INSPECTIONS
                    </h2>

                    <p>
                        A dilapidation inspection provides a detailed record of the existing condition of a property before construction, excavation, demolition or other nearby works begin.
                    </p>

                    <p>
                        Our inspection documents visible defects and conditions that exist at the time of inspection, creating a useful reference point for property owners and relevant parties.
                    </p>

                    <div class="d-feature-mini">
                        <div class="d-feature-mini-icon">
                            <i class="bi bi-search"></i>
                        </div>
                        <div>
                            <h4>COMPREHENSIVE VISUAL INSPECTION</h4>
                            <p>Detailed visual inspection of accessible areas and existing visible conditions across the property.</p>
                        </div>
                    </div>

                    <div class="d-feature-mini">
                        <div class="d-feature-mini-icon">
                            <i class="bi bi-search"></i>
                        </div>
                        <div>
                            <h4>DETAILED PHOTOGRAPHIC EVIDENCE</h4>
                            <p>High-resolution dated photographs document existing cracks, gaps, finishes, and surfaces.</p>
                        </div>
                    </div>

                    <div class="d-feature-mini">
                        <div class="d-feature-mini-icon">
                            <i class="bi bi-search"></i>
                        </div>
                        <div>
                            <h4>CLEAR PROPERTY CONDITION RECORD</h4>
                            <p>Structured reporting provides an indisputable baseline to compare pre- and post-works conditions.</p>
                        </div>
                    </div>

                    <div class="d-feature-mini">
                        <div class="d-feature-mini-icon">
                            <i class="bi bi-search"></i>
                        </div>
                        <div>
                            <h4>PROFESSIONAL REPORTING</h4>
                            <p>Clear, legally robust documentation prepared to protect property owners, builders and developers.</p>
                        </div>
                    </div>

                    <div class="mt-4">
                        <a href="{{ route('about') }}" class="d-btn btn-glow">
                            ABOUT US MORE <i class="bi bi-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>

                {{-- INSPECTOR CARD --}}
                <div class="d-welcome-card-col" data-aos="fade-left">
                    <div class="d-inspector-card hover-lift">
                        <div class="d-inspector-title">
                            VBA REGISTERED
                        </div>

                        <img src="{{ asset('images/ronak gami.jpeg') }}" alt="Ronak Gami - Registered Building Inspector">

                        <div class="d-inspector-name">
                            VBA REGISTERED BUILDING INSPECTOR
                        </div>

                        <a href="tel:0466001551" class="d-inspector-btn">
                            <i class="bi bi-telephone-fill me-2"></i>
                            0466 001 551
                        </a>
                    </div>
                </div>

            </div>

        </div>
    </section>


    {{-- =====================================================
         3. WHY DILAPIDATION INSPECTIONS MATTER (2x2 GRID)
    ====================================================== --}}
    <section class="d-section d-matters">
        <div class="d-container">

            <div class="d-heading" data-aos="fade-up">
                <span class="small-title">Important Information</span>
                <h2>WHY DILAPIDATION INSPECTIONS ARE IMPORTANT</h2>
            </div>

            <div class="d-matters-grid">

                <div class="d-matters-card hover-lift" data-aos="fade-up" data-aos-delay="100">
                    <div class="d-check-icon">✓</div>
                    <div class="d-matters-card-content">
                        <h4>Legal Documentation</h4>
                        <p>A detailed property condition record provides crucial legal documentation of visible conditions before nearby construction or development activity commences.</p>
                    </div>
                </div>

                <div class="d-matters-card hover-lift" data-aos="fade-up" data-aos-delay="200">
                    <div class="d-check-icon">✓</div>
                    <div class="d-matters-card-content">
                        <h4>Establish Existing Conditions</h4>
                        <p>The inspection establishes an objective photographic and written baseline of cracks and defects present prior to any vibration or excavation.</p>
                    </div>
                </div>

                <div class="d-matters-card hover-lift" data-aos="fade-up" data-aos-delay="300">
                    <div class="d-check-icon">✓</div>
                    <div class="d-matters-card-content">
                        <h4>Comprehensive Planning</h4>
                        <p>A documented condition report assists all parties in understanding the existing state of surrounding properties before heavy site machinery arrives.</p>
                    </div>
                </div>

                <div class="d-matters-card hover-lift" data-aos="fade-up" data-aos-delay="400">
                    <div class="d-check-icon">✓</div>
                    <div class="d-matters-card-content">
                        <h4>Construction Monitoring</h4>
                        <p>A pre-work condition record acts as an agreed benchmark during construction, preventing unjustified dispute claims between neighbours and builders.</p>
                    </div>
                </div>

            </div>

        </div>
    </section>


    {{-- =====================================================
         4. COMPREHENSIVE DILAPIDATION INSPECTIONS (SCOPE & g13.jpeg)
    ====================================================== --}}
    <section class="d-section d-scope">
        <div class="d-container">

            <div class="d-scope-grid">

                <div class="d-scope-content" data-aos="fade-right">
                    <span class="d-heading" style="text-align: left; margin-bottom: 0;">
                        <span class="small-title">OUR INSPECTION SCOPE</span>
                    </span>

                    <h3>COMPREHENSIVE DILAPIDATION INSPECTIONS</h3>

                    <p>
                        During a dilapidation inspection, we document existing visible conditions across the entire property before nearby works commence:
                    </p>

                    <ul class="d-scope-list">
                        <li class="d-scope-item">
                            <div class="d-scope-badge">1</div>
                            <div class="d-scope-info">
                                <strong>Internal Walls, Ceilings & Cornices</strong>
                                <span>Existing cracks in plasterboard, cornices, ceilings, settlement lines, and evidence of previous wall patching.</span>
                            </div>
                        </li>

                        <li class="d-scope-item">
                            <div class="d-scope-badge">2</div>
                            <div class="d-scope-info">
                                <strong>External Masonry & Brickwork</strong>
                                <span>Detailed audit of exterior brick joints, mortar condition, foundation perimeter cracks, and rendered surfaces.</span>
                            </div>
                        </li>

                        <li class="d-scope-item">
                            <div class="d-scope-badge">3</div>
                            <div class="d-scope-info">
                                <strong>Doors, Windows & Building Junctions</strong>
                                <span>Checking operation, latching clearances, diagonal settlement cracking, and junction alignments.</span>
                            </div>
                        </li>

                        <li class="d-scope-item">
                            <div class="d-scope-badge">4</div>
                            <div class="d-scope-info">
                                <strong>Driveways, Paving & Retaining Walls</strong>
                                <span>Documenting concrete cracks, slab displacements, pavers, retaining wall tilt, and boundary integrity.</span>
                            </div>
                        </li>

                        <li class="d-scope-item">
                            <div class="d-scope-badge">5</div>
                            <div class="d-scope-info">
                                <strong>Boundary Fences & Accessible Roof Areas</strong>
                                <span>Surveying dividing timber/metal fences, outbuildings, rooflines, gutters, and site drainage.</span>
                            </div>
                        </li>
                    </ul>
                </div>

                {{-- IMAGE g13.jpeg FROM public/images/g13.jpeg AS IN SCREENSHOT --}}
                <div class="d-scope-image-wrapper hover-lift" data-aos="fade-left">
                    <img src="{{ asset('images/g13.jpeg') }}" alt="Ronak Gami conducting ceiling dilapidation survey">
                    <button class="d-slide-arrow d-slide-prev" type="button" aria-label="Previous">
                        <i class="bi bi-chevron-left"></i>
                    </button>
                    <button class="d-slide-arrow d-slide-next" type="button" aria-label="Next">
                        <i class="bi bi-chevron-right"></i>
                    </button>
                </div>

            </div>

        </div>
    </section>


    {{-- =====================================================
         5. WHY CHOOSE US (LIGHT GREEN BOX)
    ====================================================== --}}
    <section class="d-section">
        <div class="d-container">

            <div class="d-choose">

                <div class="d-heading" data-aos="fade-up">
                    <span class="small-title">WHY CHOOSE US</span>
                    <h2>WHY CHOOSE US FOR YOUR DILAPIDATION INSPECTION?</h2>
                </div>

                <div class="d-choose-grid">

                    <div class="d-choose-item" data-aos="fade-up" data-aos-delay="100">
                        <div class="d-choose-icon">
                            <i class="bi bi-shield-check"></i>
                        </div>
                        <h4>LICENSED INSPECTORS</h4>
                        <p>Your inspection is completed by a licensed and experienced VBA registered building inspector.</p>
                    </div>

                    <div class="d-choose-item" data-aos="fade-up" data-aos-delay="200">
                        <div class="d-choose-icon">
                            <i class="bi bi-search"></i>
                        </div>
                        <h4>THOROUGH INSPECTION</h4>
                        <p>Accessible areas are reviewed meticulously with high-resolution photo evidence of existing conditions.</p>
                    </div>

                    <div class="d-choose-item" data-aos="fade-up" data-aos-delay="300">
                        <div class="d-choose-icon">
                            <i class="bi bi-file-earmark-check"></i>
                        </div>
                        <h4>DETAILED REPORTS</h4>
                        <p>Clear written and photographic reporting delivered within 24 hours to establish an objective baseline.</p>
                    </div>

                    <div class="d-choose-item" data-aos="fade-up" data-aos-delay="400">
                        <div class="d-choose-icon">
                            <i class="bi bi-people"></i>
                        </div>
                        <h4>CLIENT FOCUSED</h4>
                        <p>We explain inspection findings and provide practical guidance to protect your property rights.</p>
                    </div>

                </div>

            </div>

        </div>
    </section>


    {{-- =====================================================
         6. DILAPIDATION PRICING (3 CARDS)
    ====================================================== --}}
    <section class="d-section d-pricing">
        <div class="d-container">

            <div class="d-heading" data-aos="fade-up">
                <span class="small-title">PRICING PLANS</span>
                <h2>DILAPIDATION INSPECTION PRICING</h2>
            </div>

            <div class="d-price-grid">

                {{-- CARD 1: 2 BEDROOM --}}
                <div class="d-price-card hover-lift" data-aos="fade-up" data-aos-delay="100">
                    <div>
                        <div class="d-price-icon">
                            <i class="bi bi-house-door"></i>
                        </div>
                        <h3>2 BEDROOM</h3>

                        <div class="d-price">
                            $400*
                            <small>+ GST</small>
                        </div>

                        <ul class="d-price-list">
                            <li>Comprehensive visual inspection</li>
                            <li>Full internal & external crack audit</li>
                            <li>High-resolution photo documentation</li>
                            <li>Report & consultation included</li>
                            <li>Delivered within 24 hours</li>
                        </ul>
                    </div>

                    <a href="#quote-form" class="d-price-btn">
                        GET STARTED
                    </a>
                </div>

                {{-- CARD 2: 3 BEDROOM --}}
                <div class="d-price-card hover-lift" data-aos="fade-up" data-aos-delay="200">
                    <div>
                        <div class="d-price-icon">
                            <i class="bi bi-house-fill"></i>
                        </div>
                        <h3>3 BEDROOM</h3>

                        <div class="d-price">
                            $450*
                            <small>+ GST</small>
                        </div>

                        <ul class="d-price-list">
                            <li>Full 3-bedroom property inspection</li>
                            <li>Driveways, fences & retaining walls</li>
                            <li>Comprehensive photo evidence log</li>
                            <li>Signed pre-construction baseline</li>
                            <li>Delivered within 24 hours</li>
                        </ul>
                    </div>

                    <a href="#quote-form" class="d-price-btn">
                        GET STARTED
                    </a>
                </div>

                {{-- CARD 3: 4+ BEDROOM --}}
                <div class="d-price-card hover-lift" data-aos="fade-up" data-aos-delay="300">
                    <div>
                        <div class="d-price-icon">
                            <i class="bi bi-building"></i>
                        </div>
                        <h3>4+ BEDROOM</h3>

                        <div class="d-price">
                            $525*
                            <small>+ GST</small>
                        </div>

                        <ul class="d-price-list">
                            <li>Large home & multi-level dilapidation audit</li>
                            <li>Extensive perimeter & boundary survey</li>
                            <li>Complete detailed photo archive</li>
                            <li>Priority debrief with inspector</li>
                            <li>Delivered within 24 hours</li>
                        </ul>
                    </div>

                    <a href="#quote-form" class="d-price-btn">
                        GET STARTED
                    </a>
                </div>

            </div>

        </div>
    </section>


    {{-- =====================================================
         7. CTA BANNER (PROTECT YOUR PROPERTY)
    ====================================================== --}}
    <section class="d-cta">
        <div class="d-container">

            <div class="d-cta-content" data-aos="fade-right">
                <h2>ENSURE YOUR PROPERTY IS PROTECTED WITH A PROFESSIONAL INSPECTION</h2>

                <p>
                    Don't leave your property vulnerable during nearby construction projects. Our dilapidation inspection service provides a comprehensive record of your property's existing condition before work begins.
                </p>

                <a href="#quote-form" class="d-btn btn-glow">
                    SCHEDULE YOUR INSPECTION NOW
                </a>
            </div>

        </div>
    </section>


    {{-- =====================================================
         8. CLIENT REVIEWS & FEEDBACK
    ====================================================== --}}
    <section class="d-section d-reviews">
        <div class="d-container">

            <div class="d-heading" data-aos="fade-up">
                <span class="small-title">Testimonials</span>
                <h2>WHAT OUR CLIENTS SAY</h2>
            </div>

            <div class="d-review-grid">

                <div class="d-review-card hover-lift" data-aos="fade-up" data-aos-delay="100">
                    <div class="d-review-quote">“</div>
                    <p>
                        "The inspection was very thorough and the report gave us a useful record of the property's condition before nearby works started."
                    </p>
                    <div class="d-stars">★★★★★</div>
                    <h4>Laxmy</h4>
                </div>

                <div class="d-review-card hover-lift" data-aos="fade-up" data-aos-delay="200">
                    <div class="d-review-quote">“</div>
                    <p>
                        "Excellent service and professional reporting. The photographs and explanations made everything very easy to understand."
                    </p>
                    <div class="d-stars">★★★★★</div>
                    <h4>Shailesh Dev Shah</h4>
                </div>

                <div class="d-review-card hover-lift" data-aos="fade-up" data-aos-delay="300">
                    <div class="d-review-quote">“</div>
                    <p>
                        "Very professional inspection service. The report clearly documented the existing condition of our property before construction."
                    </p>
                    <div class="d-stars">★★★★★</div>
                    <h4>Nitesh Waghani</h4>
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
                <h2>MOST POPULAR QUESTIONS</h2>
            </div>

            <div class="d-faq-grid">

                {{-- LEFT COLUMN --}}
                <div class="d-faq-col">

                    {{-- FAQ 1 (Active by default) --}}
                    <div class="d-faq-item active" data-aos="fade-up" data-aos-delay="100">
                        <button class="d-faq-question" type="button">
                            <span>What is a dilapidation inspection?</span>
                            <i class="bi bi-chevron-down d-faq-icon"></i>
                        </button>
                        <div class="d-faq-answer">
                            A dilapidation inspection documents the visible existing condition of a property before nearby construction, excavation, demolition or development works commence.
                        </div>
                    </div>

                    {{-- FAQ 2 --}}
                    <div class="d-faq-item" data-aos="fade-up" data-aos-delay="200">
                        <button class="d-faq-question" type="button">
                            <span>What does the inspection include?</span>
                            <i class="bi bi-chevron-down d-faq-icon"></i>
                        </button>
                        <div class="d-faq-answer">
                            The inspection generally focuses on accessible areas and visible conditions such as cracks, surface damage, wall finishes, driveways, retaining walls, and perimeter fences.
                        </div>
                    </div>

                    {{-- FAQ 3 --}}
                    <div class="d-faq-item" data-aos="fade-up" data-aos-delay="300">
                        <button class="d-faq-question" type="button">
                            <span>What happens after the inspection?</span>
                            <i class="bi bi-chevron-down d-faq-icon"></i>
                        </button>
                        <div class="d-faq-answer">
                            The observed conditions are documented and presented in a professional report with relevant high-resolution photographs and descriptions delivered within 24 hours.
                        </div>
                    </div>

                </div>

                {{-- RIGHT COLUMN --}}
                <div class="d-faq-col">

                    {{-- FAQ 4 (Active by default) --}}
                    <div class="d-faq-item active" data-aos="fade-up" data-aos-delay="150">
                        <button class="d-faq-question" type="button">
                            <span>Why do I need a dilapidation report?</span>
                            <i class="bi bi-chevron-down d-faq-icon"></i>
                        </button>
                        <div class="d-faq-answer">
                            A report creates an indisputable documented record of visible conditions before work begins and can be retained as an objective reference during and after the relevant works.
                        </div>
                    </div>

                    {{-- FAQ 5 --}}
                    <div class="d-faq-item" data-aos="fade-up" data-aos-delay="250">
                        <button class="d-faq-question" type="button">
                            <span>How long does a dilapidation inspection take?</span>
                            <i class="bi bi-chevron-down d-faq-icon"></i>
                        </button>
                        <div class="d-faq-answer">
                            Inspection time depends on the size of the property, access conditions and the extent of areas requiring documentation. We provide estimated timeframes during booking.
                        </div>
                    </div>

                    {{-- FAQ 6 --}}
                    <div class="d-faq-item" data-aos="fade-up" data-aos-delay="350">
                        <button class="d-faq-question" type="button">
                            <span>Are dilapidation inspections only for construction sites?</span>
                            <i class="bi bi-chevron-down d-faq-icon"></i>
                        </button>
                        <div class="d-faq-answer">
                            Dilapidation reports are commonly used whenever nearby construction, excavation, demolition, basement digging, or public infrastructure works may impact surrounding properties.
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