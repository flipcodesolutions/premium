@extends('layouts.app')

@section('title', 'Pool Barrier Inspection Melbourne | Premium Building & Pest Inspections')

@section('content')

<style>
/* =========================================================
   POOL BARRIER INSPECTION PAGE STYLES
   Designed 1:1 to match reference layout
   With increased font sizes as requested
========================================================= */

.pool-page {
    --pool-navy: #073763;
    --pool-navy-dark: #052646;
    --pool-green: #42a900;
    --pool-green-dark: #358c00;
    --pool-light-green: #eaf6e6;
    --pool-choose-bg: #d8edd5;
    --pool-cyan: #1b9eea;
    --pool-text: #2d3748;
    --pool-muted: #4a5568;
    --pool-border: #e2e8f0;
    --pool-orange: #ffb400;

    font-family: Arial, Helvetica, sans-serif;
    color: var(--pool-text);
    overflow-x: hidden;
    position: relative;
    font-size: 16px;
    line-height: 1.7;
}

/* Container */
.pool-container {
    width: 92%;
    max-width: 1180px;
    margin: 0 auto;
}

.pool-section {
    padding: 70px 0;
}

/* Headings with increased font sizes */
.pool-heading {
    text-align: center;
    margin-bottom: 40px;
}

.pool-heading .small-title {
    display: block;
    margin-bottom: 10px;
    color: var(--pool-green);
    font-size: 15px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 1.2px;
}

.pool-heading h2 {
    margin: 0;
    color: var(--pool-navy);
    font-size: clamp(26px, 3.4vw, 34px);
    line-height: 1.25;
    font-weight: 900;
    text-transform: uppercase;
}

.pool-heading p {
    max-width: 760px;
    margin: 14px auto 0;
    color: var(--pool-muted);
    font-size: 16px;
    line-height: 1.75;
}

/* Buttons */
.pool-btn {
    display: inline-flex;
    justify-content: center;
    align-items: center;
    padding: 14px 28px;
    background: var(--pool-green);
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

.pool-btn:hover {
    background: var(--pool-green-dark);
    transform: translateY(-2px);
    box-shadow: 0 8px 22px rgba(66, 169, 0, 0.35);
}

/* Floating Right Tab */
.pool-floating-tab {
    position: fixed;
    right: 0;
    top: 48%;
    transform: translateY(-50%);
    background: var(--pool-green);
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

.pool-floating-tab:hover {
    background: var(--pool-green-dark);
    padding-right: 15px;
}

/* =========================================================
   1. HERO SECTION
========================================================= */
.pool-hero {
    position: relative;
    background:
        linear-gradient(
            90deg,
            rgba(7, 43, 76, 0.95) 0%,
            rgba(7, 43, 76, 0.88) 52%,
            rgba(7, 43, 76, 0.65) 100%
        ),
        url("{{ asset('images/pool-barrier.jpg') }}") center center / cover no-repeat;
    color: #fff;
    padding: 25px 0;
}

.pool-hero-inner {
    display: grid;
    grid-template-columns: 1.15fr 0.85fr;
    gap: 45px;
    align-items: center;
    padding: 60px 0 70px;
}

.pool-hero-content h1 {
    font-size: clamp(28px, 4vw, 42px);
    line-height: 1.18;
    font-weight: 900;
    color: #ffffff;
    margin: 0 0 16px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.pool-hero-tag {
    display: inline-block;
    color: #ffffff;
    font-size: 14.5px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-bottom: 16px;
    opacity: 0.95;
}

.pool-hero-content p {
    color: rgba(255, 255, 255, 0.94);
    font-size: 16.5px;
    line-height: 1.75;
    margin: 0 0 26px;
    max-width: 600px;
}

.pool-hero-license {
    display: inline-block;
    margin-top: 16px;
    font-size: 13.5px;
    color: rgba(255, 255, 255, 0.85);
    font-weight: 600;
}

/* Hero Form */
.pool-hero-form {
    background: #ffffff;
    border-radius: 8px;
    padding: 28px 26px;
    box-shadow: 0 12px 35px rgba(0, 0, 0, 0.28);
    color: var(--pool-text);
}

.pool-form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 12px;
    margin-bottom: 12px;
}

.pool-hero-form input,
.pool-hero-form select,
.pool-hero-form textarea {
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

.pool-hero-form input:focus,
.pool-hero-form select:focus,
.pool-hero-form textarea:focus {
    border-color: var(--pool-green);
}

.pool-hero-form textarea {
    resize: vertical;
    min-height: 75px;
}

.pool-hero-form .pool-submit {
    width: 100%;
    padding: 14px;
    background: var(--pool-green);
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

.pool-hero-form .pool-submit:hover {
    background: var(--pool-green-dark);
}

/* =========================================================
   2. WELCOME SECTION + INSPECTOR CARD
========================================================= */
.pool-welcome-grid {
    display: grid;
    grid-template-columns: 1.15fr 0.85fr;
    gap: 50px;
    align-items: center;
}

.pool-welcome-content .small-title {
    display: block;
    margin-bottom: 10px;
    color: var(--pool-green);
    font-size: 14.5px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.pool-welcome-content h2 {
    color: var(--pool-navy);
    font-size: clamp(26px, 3.3vw, 34px);
    line-height: 1.25;
    font-weight: 900;
    margin: 0 0 18px;
    text-transform: uppercase;
}

.pool-welcome-content > p {
    color: var(--pool-muted);
    font-size: 16px;
    line-height: 1.75;
    margin: 0 0 18px;
}

.pool-feature-mini {
    display: flex;
    gap: 16px;
    margin-bottom: 16px;
    align-items: flex-start;
}

.pool-feature-mini-icon {
    width: 36px;
    height: 36px;
    min-width: 36px;
    border-radius: 50%;
    background: #e8f4fc;
    color: var(--pool-cyan);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 17px;
    margin-top: 2px;
}

.pool-feature-mini h4 {
    margin: 0 0 4px;
    color: var(--pool-navy);
    font-size: 15.5px;
    font-weight: 800;
    text-transform: uppercase;
}

.pool-feature-mini p {
    margin: 0;
    color: var(--pool-muted);
    font-size: 14.5px;
    line-height: 1.6;
}

/* Inspector Card */
.pool-inspector-card {
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
    text-align: center;
}

.pool-inspector-title {
    background: #111111;
    color: #ffffff;
    font-size: 14.5px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 1px;
    padding: 11px 16px;
}

.pool-inspector-card img {
    width: 100%;
    height: 350px;
    object-fit: cover;
    object-position: center top;
    display: block;
}

.pool-inspector-name {
    padding: 15px 12px 10px;
    font-size: 15px;
    font-weight: 800;
    color: var(--pool-navy);
    text-transform: uppercase;
}

.pool-inspector-btn {
    display: block;
    background: var(--pool-green);
    color: #ffffff !important;
    text-decoration: none;
    padding: 12px;
    font-size: 15.5px;
    font-weight: 800;
    letter-spacing: 0.5px;
    transition: background 0.2s ease;
}

.pool-inspector-btn:hover {
    background: var(--pool-green-dark);
}

/* =========================================================
   3. WHY POOL BARRIER INSPECTIONS MATTER (2x2 GRID)
========================================================= */
.pool-matters {
    background: #fbfcfc;
}

.pool-matters-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 18px;
    max-width: 1040px;
    margin: 0 auto;
}

.pool-matters-card {
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

.pool-matters-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08);
}

.pool-check-icon {
    width: 28px;
    height: 28px;
    min-width: 28px;
    border-radius: 50%;
    background: var(--pool-green);
    color: #ffffff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 14px;
    font-weight: 900;
    margin-top: 3px;
}

.pool-matters-card-content h4 {
    margin: 0 0 6px;
    color: var(--pool-navy);
    font-size: 16px;
    font-weight: 800;
}

.pool-matters-card-content p {
    margin: 0;
    color: var(--pool-muted);
    font-size: 14.5px;
    line-height: 1.65;
}

/* =========================================================
   4. OUR POOL BARRIER INSPECTION PROCESS (SCOPE)
========================================================= */
.pool-scope-grid {
    display: grid;
    grid-template-columns: 1.15fr 0.85fr;
    gap: 45px;
    align-items: center;
}

.pool-scope-content h3 {
    font-size: clamp(22px, 2.6vw, 28px);
    line-height: 1.25;
    font-weight: 900;
    color: var(--pool-navy);
    margin: 0 0 14px;
    text-transform: uppercase;
}

.pool-scope-content > p {
    color: var(--pool-muted);
    font-size: 15.5px;
    line-height: 1.75;
    margin-bottom: 22px;
}

.pool-scope-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.pool-scope-item {
    display: flex;
    gap: 16px;
    margin-bottom: 18px;
    align-items: flex-start;
}

.pool-scope-badge {
    width: 30px;
    height: 30px;
    min-width: 30px;
    border-radius: 50%;
    background: var(--pool-green);
    color: #fff;
    font-size: 14px;
    font-weight: 800;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-top: 2px;
}

.pool-scope-info strong {
    display: block;
    color: var(--pool-navy);
    font-size: 15.5px;
    font-weight: 800;
    margin-bottom: 3px;
}

.pool-scope-info span {
    display: block;
    color: var(--pool-muted);
    font-size: 14.5px;
    line-height: 1.6;
}

.pool-scope-image-wrapper {
    position: relative;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.12);
    height: 420px;
}

.pool-scope-image-wrapper img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center center;
    display: block;
}

/* Slider Arrows on Image */
.pool-slide-arrow {
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

.pool-slide-arrow:hover {
    background: #fff;
    color: var(--pool-green);
}

.pool-slide-prev {
    left: 12px;
}

.pool-slide-next {
    right: 12px;
}

/* =========================================================
   5. WHY CHOOSE US (LIGHT GREEN BOX)
========================================================= */
.pool-choose {
    padding: 55px 38px;
    background: var(--pool-choose-bg);
    border-radius: 18px;
}

.pool-choose-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 22px;
}

.pool-choose-item {
    text-align: center;
    background: #ffffff;
    padding: 28px 20px;
    border-radius: 8px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
    transition: transform 0.3s ease;
}

.pool-choose-item:hover {
    transform: translateY(-4px);
}

.pool-choose-icon {
    width: 52px;
    height: 52px;
    margin: 0 auto 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: var(--pool-green);
    color: #fff;
    border-radius: 6px;
    font-size: 24px;
}

.pool-choose-item h4 {
    margin: 0 0 10px;
    color: var(--pool-navy);
    font-size: 15.5px;
    font-weight: 900;
    text-transform: uppercase;
}

.pool-choose-item p {
    margin: 0;
    color: #4a5568;
    font-size: 14px;
    line-height: 1.65;
}

/* =========================================================
   6. PRICING PACKAGES (3 CARDS)
========================================================= */
.pool-pricing {
    background: #fff;
}

.pool-price-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 26px;
    max-width: 1060px;
    margin: 0 auto;
}

.pool-price-card {
    background: #fff;
    border: 1px solid #e4e4e4;
    border-top: 3px solid var(--pool-green);
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.06);
    text-align: center;
    padding: 30px 22px;
    border-radius: 4px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.pool-price-icon {
    font-size: 34px;
    color: var(--pool-navy);
    margin-bottom: 12px;
}

.pool-price-card h3 {
    margin: 0 0 10px;
    color: var(--pool-navy);
    font-size: 17px;
    font-weight: 900;
    text-transform: uppercase;
}

.pool-price {
    color: var(--pool-green);
    font-size: 36px;
    font-weight: 900;
    margin-bottom: 16px;
}

.pool-price small {
    color: #666;
    font-size: 13px;
    font-weight: 600;
}

.pool-price-list {
    list-style: none;
    padding: 0;
    margin: 0 0 24px;
    text-align: left;
    flex-grow: 1;
}

.pool-price-list li {
    padding: 9px 0;
    border-bottom: 1px solid #eee;
    color: #4a5568;
    font-size: 14.5px;
    display: flex;
    align-items: flex-start;
}

.pool-price-list li::before {
    content: "✓";
    color: var(--pool-green);
    margin-right: 10px;
    font-weight: 900;
    font-size: 15px;
}

.pool-price-btn {
    display: block;
    width: 100%;
    padding: 13px;
    background: var(--pool-green);
    color: #fff !important;
    text-decoration: none;
    font-size: 15px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    border-radius: 3px;
    transition: all 0.25s ease;
}

.pool-price-btn:hover {
    background: var(--pool-green-dark);
}

/* =========================================================
   7. CTA BANNER (SCHEDULE YOUR INSPECTION TODAY)
========================================================= */
.pool-cta {
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

.pool-cta-content {
    max-width: 660px;
    color: #fff;
    padding: 55px 0;
}

.pool-cta-content h2 {
    margin: 0 0 16px;
    font-size: clamp(26px, 3.5vw, 36px);
    line-height: 1.2;
    font-weight: 900;
    text-transform: uppercase;
    color: #fff;
}

.pool-cta-content p {
    margin: 0 0 24px;
    color: rgba(255, 255, 255, 0.92);
    font-size: 16.5px;
    line-height: 1.75;
}

/* =========================================================
   8. REVIEWS SECTION
========================================================= */
.pool-reviews {
    background: #fff;
}

.pool-review-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 22px;
}

.pool-review-card {
    text-align: center;
    padding: 28px 22px;
    border-bottom: 3px solid #eee;
    box-shadow: 0 7px 20px rgba(0, 0, 0, 0.06);
    border-radius: 4px;
    background: #fff;
}

.pool-review-quote {
    color: var(--pool-cyan);
    font-size: 40px;
    line-height: 1;
    margin-bottom: 8px;
}

.pool-review-card p {
    min-height: 75px;
    color: #4a5568;
    font-size: 15px;
    line-height: 1.7;
}

.pool-stars {
    color: var(--pool-orange);
    letter-spacing: 3px;
    font-size: 17px;
    margin: 14px 0 16px;
}

.pool-review-card h4 {
    margin: 0;
    color: var(--pool-navy);
    font-size: 15.5px;
    font-weight: 800;
}

/* =========================================================
   9. FAQ ACCORDION SECTION
========================================================= */
.pool-faq {
    background: #fff;
    padding-bottom: 75px;
}

.pool-faq-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 14px 22px;
}

.pool-faq-item {
    border: 1px solid #e4e4e4;
    background: #fff;
    border-radius: 4px;
    overflow: hidden;
    margin-bottom: 10px;
}

.pool-faq-question {
    width: 100%;
    padding: 16px 18px;
    border: 0;
    background: #fff;
    color: var(--pool-navy);
    display: flex;
    justify-content: space-between;
    align-items: center;
    text-align: left;
    font-size: 15.5px;
    font-weight: 800;
    cursor: pointer;
    transition: all 0.2s ease;
}

.pool-faq-question:hover {
    background: #f7f9fa;
}

.pool-faq-answer {
    display: none;
    padding: 0 18px 16px;
    color: #4a5568;
    font-size: 15px;
    line-height: 1.7;
}

/* Active FAQ Item: Green background on header */
.pool-faq-item.active .pool-faq-question {
    background: var(--pool-green);
    color: #fff;
}

.pool-faq-item.active .pool-faq-answer {
    display: block;
    background: #fff;
    padding-top: 16px;
}

.pool-faq-item.active .pool-faq-icon {
    transform: rotate(180deg);
    color: #fff;
}

.pool-faq-icon {
    transition: transform 0.25s ease;
}

/* =========================================================
   RESPONSIVE MEDIA QUERIES
========================================================= */
@media (max-width: 991px) {
    .pool-hero-inner,
    .pool-welcome-grid,
    .pool-scope-grid {
        grid-template-columns: 1fr;
        gap: 38px;
    }

    .pool-hero-inner {
        padding: 50px 0;
    }

    .pool-choose-grid {
        grid-template-columns: repeat(2, 1fr);
    }

    .pool-price-grid {
        grid-template-columns: 1fr;
        max-width: 480px;
    }
}

@media (max-width: 767px) {
    .pool-section {
        padding: 45px 0;
    }

    .pool-hero-inner {
        padding: 40px 0;
    }

    .pool-form-row,
    .pool-matters-grid,
    .pool-review-grid,
    .pool-faq-grid {
        grid-template-columns: 1fr;
    }

    .pool-choose {
        padding: 32px 20px;
    }

    .pool-choose-grid {
        grid-template-columns: 1fr 1fr;
        gap: 16px 12px;
    }

    .pool-scope-image-wrapper {
        height: 320px;
    }

    .pool-floating-tab {
        display: none;
    }
}

@media (max-width: 500px) {
    .pool-choose-grid {
        grid-template-columns: 1fr;
    }
}
</style>

<div class="pool-page">

    {{-- FLOATING RIGHT TAB --}}
    <a href="#quote-form" class="pool-floating-tab">
        <i class="bi bi-calendar-check me-1"></i> BOOK AN INSPECTION
    </a>

    {{-- =====================================================
         1. HERO SECTION
    ====================================================== --}}
    <section class="pool-hero">
        <div class="pool-container">
            <div class="pool-hero-inner">

                <div class="pool-hero-content" data-aos="fade-right" data-aos-duration="850">
                    <span class="pool-hero-tag">
                        PREMIUM BUILDING & PEST INSPECTIONS
                    </span>

                    <h1>
                        ENSURE YOUR POOL IS<br>SAFE AND COMPLIANT<br>WITH OUR POOL BARRIER<br>INSPECTION SERVICE
                    </h1>

                    <p>
                        Protect your family and property with a professional pool barrier inspection designed to identify visible safety and compliance concerns across fences, gates, latches and access points.
                    </p>

                    <div>
                        <a href="tel:0466001551" class="pool-btn btn-glow">
                            <i class="bi bi-telephone-fill me-2"></i>
                            0466 001 551
                        </a>
                    </div>

                    <div class="pool-hero-license">
                        VBA Building Inspector Licence No. IN-PS 74654 &nbsp;|&nbsp; Domestic Builder Licence No. DB-L 100200
                    </div>
                </div>

                {{-- HERO FORM --}}
                <div id="quote-form" class="pool-hero-form hover-lift" data-aos="fade-left" data-aos-duration="850">
                    @if(session('success'))
                        <div class="alert alert-success py-2 mb-2" style="font-size: 14px;">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('quote.store') }}" method="POST">
                        @csrf

                        <div class="pool-form-row">
                            <input type="text" name="name" placeholder="Name *" value="{{ old('name') }}" required>
                            <input type="tel" name="phone" placeholder="Phone *" value="{{ old('phone') }}" required>
                        </div>

                        <div class="pool-form-row">
                            <input type="email" name="email" placeholder="Email *" value="{{ old('email') }}" required>
                            <input type="text" name="property_address" placeholder="Property Address" value="{{ old('property_address') }}">
                        </div>

                        <select name="service_type" required>
                            <option value="pool-barrier-inspection" selected>Pool Barrier Inspection</option>
                            <option value="pre-purchase-building-and-pest-inspection">Pre-Purchase Building & Pest Inspection</option>
                            <option value="building-stage-by-stage-inspection">Building Stage By Stage Inspection</option>
                            <option value="new-build-handover-inspection">New Build Handover Inspection</option>
                            <option value="apartment-building-inspection">Apartment Building Inspection</option>
                            <option value="rising-damp-inspection">Rising Damp Inspection</option>
                            <option value="dilapidation-report">Dilapidation Report</option>
                            <option value="vendor-inspection">Vendor Inspection</option>
                            <option value="builders-warranty-inspection">Builders Warranty Inspection</option>
                        </select>

                        <textarea name="message" placeholder="Message / Details (e.g. In-ground pool, spa, barrier type, council notice)">{{ old('message') }}</textarea>

                        <button type="submit" class="pool-submit">
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
    <section class="pool-section pool-welcome">
        <div class="pool-container">

            <div class="pool-welcome-grid">

                <div class="pool-welcome-content" data-aos="fade-right">
                    <span class="small-title">Expert Pool Barrier Inspections</span>
                    <h2>
                        WELCOME TO PREMIUM POOL BARRIER INSPECTION
                    </h2>

                    <p>
                        Having a swimming pool comes with important safety responsibilities. A compliant pool barrier is an essential part of protecting children and other vulnerable people from accidental access to the pool area.
                    </p>

                    <p>
                        Our pool barrier inspection service assesses accessible components of the pool barrier and surrounding access points for observable safety and compliance concerns.
                    </p>

                    <div class="pool-feature-mini">
                        <div class="pool-feature-mini-icon">
                            <i class="bi bi-search"></i>
                        </div>
                        <div>
                            <h4>COMPREHENSIVE VISUAL INSPECTION</h4>
                            <p>Comprehensive visual pool barrier inspection covering accessible safety components.</p>
                        </div>
                    </div>

                    <div class="pool-feature-mini">
                        <div class="pool-feature-mini-icon">
                            <i class="bi bi-search"></i>
                        </div>
                        <div>
                            <h4>ACCESS & GATE CONDITION CHECKS</h4>
                            <p>Checks for observable access, gate latching, hinges and barrier conditions.</p>
                        </div>
                    </div>

                    <div class="pool-feature-mini">
                        <div class="pool-feature-mini-icon">
                            <i class="bi bi-search"></i>
                        </div>
                        <div>
                            <h4>DETAILED COMPLIANCE REPORT</h4>
                            <p>Detailed inspection findings, clear photographic evidence and reporting.</p>
                        </div>
                    </div>

                    <div class="pool-feature-mini">
                        <div class="pool-feature-mini-icon">
                            <i class="bi bi-search"></i>
                        </div>
                        <div>
                            <h4>SAFETY FOCUSED ADVICE</h4>
                            <p>Guidance on climbable objects, boundary barriers, and remediation steps.</p>
                        </div>
                    </div>

                    <div class="mt-4">
                        <a href="{{ route('about') }}" class="pool-btn btn-glow">
                            ABOUT US MORE <i class="bi bi-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>

                {{-- INSPECTOR CARD --}}
                <div class="pool-welcome-card-col" data-aos="fade-left">
                    <div class="pool-inspector-card hover-lift">
                        <div class="pool-inspector-title">
                            VBA REGISTERED
                        </div>

                        <img src="{{ asset('images/ronak gami.jpeg') }}" alt="Ronak Gami - Registered Building Inspector">

                        <div class="pool-inspector-name">
                            VBA REGISTERED BUILDING INSPECTOR
                        </div>

                        <a href="tel:0466001551" class="pool-inspector-btn">
                            <i class="bi bi-telephone-fill me-2"></i>
                            0466 001 551
                        </a>
                    </div>
                </div>

            </div>

        </div>
    </section>


    {{-- =====================================================
         3. WHY POOL BARRIER INSPECTIONS MATTER (2x2 GRID)
    ====================================================== --}}
    <section class="pool-section pool-matters">
        <div class="pool-container">

            <div class="pool-heading" data-aos="fade-up">
                <span class="small-title">Important Information</span>
                <h2>WHY POOL BARRIER INSPECTIONS ARE IMPORTANT</h2>
            </div>

            <div class="pool-matters-grid">

                <div class="pool-matters-card hover-lift" data-aos="fade-up" data-aos-delay="100">
                    <div class="pool-check-icon">✓</div>
                    <div class="pool-matters-card-content">
                        <h4>Legal Compliance</h4>
                        <p>Pool barriers must satisfy applicable safety and Victorian compliance requirements. Regular inspections can help identify observable issues before council audits.</p>
                    </div>
                </div>

                <div class="pool-matters-card hover-lift" data-aos="fade-up" data-aos-delay="200">
                    <div class="pool-check-icon">✓</div>
                    <div class="pool-matters-card-content">
                        <h4>Peace Of Mind</h4>
                        <p>A professional inspection can provide greater confidence that visible pool barrier components are functioning as intended and keeping your family safe.</p>
                    </div>
                </div>

                <div class="pool-matters-card hover-lift" data-aos="fade-up" data-aos-delay="300">
                    <div class="pool-check-icon">✓</div>
                    <div class="pool-matters-card-content">
                        <h4>Preventive Maintenance</h4>
                        <p>Identifying damaged, loose or deteriorated components early helps property owners address issues before they become severe compliance breaches.</p>
                    </div>
                </div>

                <div class="pool-matters-card hover-lift" data-aos="fade-up" data-aos-delay="400">
                    <div class="pool-check-icon">✓</div>
                    <div class="pool-matters-card-content">
                        <h4>Family Safety</h4>
                        <p>A properly maintained pool barrier is an important part of reducing the risk of accidental access to the pool area by young children and pets.</p>
                    </div>
                </div>

            </div>

        </div>
    </section>


    {{-- =====================================================
         4. OUR POOL BARRIER INSPECTION PROCESS (SCOPE)
    ====================================================== --}}
    <section class="pool-section pool-scope">
        <div class="pool-container">

            <div class="pool-scope-grid">

                <div class="pool-scope-content" data-aos="fade-right">
                    <span class="pool-heading" style="text-align: left; margin-bottom: 0;">
                        <span class="small-title">OUR INSPECTION SCOPE</span>
                    </span>

                    <h3>OUR POOL BARRIER INSPECTION PROCESS</h3>

                    <p>
                        Through our pool barrier inspections, we look for observable conditions that may affect the safety or compliance of the pool barrier system:
                    </p>

                    <ul class="pool-scope-list">
                        <li class="pool-scope-item">
                            <div class="pool-scope-badge">1</div>
                            <div class="pool-scope-info">
                                <strong>Gate Self-Closing & Self-Latching Audit</strong>
                                <span>Verifying that gates swing outward away from the pool area and reliably self-close and latch from any open position.</span>
                            </div>
                        </li>

                        <li class="pool-scope-item">
                            <div class="pool-scope-badge">2</div>
                            <div class="pool-scope-info">
                                <strong>Barrier Height & Ground Clearance Check</strong>
                                <span>Ensuring the fence achieves compliant minimum vertical height (1200mm) and ground clearances do not exceed 100mm.</span>
                            </div>
                        </li>

                        <li class="pool-scope-item">
                            <div class="pool-scope-badge">3</div>
                            <div class="pool-scope-info">
                                <strong>Non-Climbable Zone (NCZ) Assessment</strong>
                                <span>Auditing the 900mm non-climbable zone for nearby trees, pots, taps, horizontal rails, and outdoor furniture.</span>
                            </div>
                        </li>

                        <li class="pool-scope-item">
                            <div class="pool-scope-badge">4</div>
                            <div class="pool-scope-info">
                                <strong>Boundary Fences & Direct Access Points</strong>
                                <span>Checking boundary fences (min 1800mm where applicable), windows, doors, and potential child footholds.</span>
                            </div>
                        </li>

                        <li class="pool-scope-item">
                            <div class="pool-scope-badge">5</div>
                            <div class="pool-scope-info">
                                <strong>Structural Rigidity & Latches</strong>
                                <span>Inspecting post firm footing, glass spigots, shield compliance, and gate latch mechanism security.</span>
                            </div>
                        </li>
                    </ul>
                </div>

                {{-- IMAGE schedule.jpeg FROM public/images/schedule.jpeg AS IN SCREENSHOT --}}
                <div class="pool-scope-image-wrapper hover-lift" data-aos="fade-left">
                    <img src="{{ asset('images/schedule.jpeg') }}" alt="Ronak Gami conducting inspection audit">
                    <button class="pool-slide-arrow pool-slide-prev" type="button" aria-label="Previous">
                        <i class="bi bi-chevron-left"></i>
                    </button>
                    <button class="pool-slide-arrow pool-slide-next" type="button" aria-label="Next">
                        <i class="bi bi-chevron-right"></i>
                    </button>
                </div>

            </div>

        </div>
    </section>


    {{-- =====================================================
         5. WHY CHOOSE US (LIGHT GREEN BOX)
    ====================================================== --}}
    <section class="pool-section">
        <div class="pool-container">

            <div class="pool-choose">

                <div class="pool-heading" data-aos="fade-up">
                    <span class="small-title">WHY CHOOSE US</span>
                    <h2>WHY CHOOSE US FOR YOUR POOL BARRIER INSPECTION?</h2>
                </div>

                <div class="pool-choose-grid">

                    <div class="pool-choose-item" data-aos="fade-up" data-aos-delay="100">
                        <div class="pool-choose-icon">
                            <i class="bi bi-shield-check"></i>
                        </div>
                        <h4>LICENSED INSPECTORS</h4>
                        <p>Your inspection is conducted by an appropriately licensed and experienced VBA registered building inspector.</p>
                    </div>

                    <div class="pool-choose-item" data-aos="fade-up" data-aos-delay="200">
                        <div class="pool-choose-icon">
                            <i class="bi bi-search"></i>
                        </div>
                        <h4>FAST & THOROUGH SERVICE</h4>
                        <p>We provide a detailed visual inspection of accessible pool barrier components and surrounding areas.</p>
                    </div>

                    <div class="pool-choose-item" data-aos="fade-up" data-aos-delay="300">
                        <div class="pool-choose-icon">
                            <i class="bi bi-file-earmark-check"></i>
                        </div>
                        <h4>CLEAR REPORTING</h4>
                        <p>Findings are presented clearly with photographic guidance so property owners understand identified concerns.</p>
                    </div>

                    <div class="pool-choose-item" data-aos="fade-up" data-aos-delay="400">
                        <div class="pool-choose-icon">
                            <i class="bi bi-patch-check"></i>
                        </div>
                        <h4>SAFETY FOCUSED</h4>
                        <p>Our inspection focuses on observable conditions that protect your family and satisfy Victorian pool regulations.</p>
                    </div>

                </div>

            </div>

        </div>
    </section>


    {{-- =====================================================
         6. POOL BARRIER PRICING (3 CARDS)
    ====================================================== --}}
    <section class="pool-section pool-pricing">
        <div class="pool-container">

            <div class="pool-heading" data-aos="fade-up">
                <span class="small-title">PRICING PLANS</span>
                <h2>POOL BARRIER INSPECTION PRICING</h2>
            </div>

            <div class="pool-price-grid">

                {{-- CARD 1: 1 POOL CHECK --}}
                <div class="pool-price-card hover-lift" data-aos="fade-up" data-aos-delay="100">
                    <div>
                        <div class="pool-price-icon">
                            <i class="bi bi-water"></i>
                        </div>
                        <h3>1 POOL CHECK</h3>

                        <div class="pool-price">
                            $225*
                            <small>+ GST</small>
                        </div>

                        <ul class="pool-price-list">
                            <li>Comprehensive visual inspection</li>
                            <li>Pool barrier & gate latching check</li>
                            <li>Non-climbable zone evaluation</li>
                            <li>Detailed report & consultation</li>
                            <li>24-hour report delivery</li>
                        </ul>
                    </div>

                    <a href="#quote-form" class="pool-price-btn">
                        GET STARTED
                    </a>
                </div>

                {{-- CARD 2: 2 POOLS / SPA & POOL --}}
                <div class="pool-price-card hover-lift" data-aos="fade-up" data-aos-delay="200">
                    <div>
                        <div class="pool-price-icon">
                            <i class="bi bi-droplet-half"></i>
                        </div>
                        <h3>2 POOLS / SPA</h3>

                        <div class="pool-price">
                            $275*
                            <small>+ GST</small>
                        </div>

                        <ul class="pool-price-list">
                            <li>Inspection for pool & separate spa</li>
                            <li>Multi-barrier gate audit</li>
                            <li>Complete NCZ & boundary assessment</li>
                            <li>Comprehensive digital report</li>
                            <li>24-hour report delivery</li>
                        </ul>
                    </div>

                    <a href="#quote-form" class="pool-price-btn">
                        GET STARTED
                    </a>
                </div>

                {{-- CARD 3: RE-INSPECTION --}}
                <div class="pool-price-card hover-lift" data-aos="fade-up" data-aos-delay="300">
                    <div>
                        <div class="pool-price-icon">
                            <i class="bi bi-clipboard-check"></i>
                        </div>
                        <h3>RE-INSPECTION</h3>

                        <div class="pool-price">
                            $150*
                            <small>+ GST</small>
                        </div>

                        <ul class="pool-price-list">
                            <li>Re-inspection of rectified items</li>
                            <li>Gate & barrier verification</li>
                            <li>Updated compliance findings</li>
                            <li>Fast-track certificate advice</li>
                            <li>Priority debrief with inspector</li>
                        </ul>
                    </div>

                    <a href="#quote-form" class="pool-price-btn">
                        GET STARTED
                    </a>
                </div>

            </div>

        </div>
    </section>


    {{-- =====================================================
         7. CTA BANNER (SCHEDULE YOUR INSPECTION TODAY)
    ====================================================== --}}
    <section class="pool-cta">
        <div class="pool-container">

            <div class="pool-cta-content" data-aos="fade-right">
                <h2>SCHEDULE YOUR INSPECTION TODAY</h2>

                <p>
                    A professional pool barrier inspection can help identify observable safety and compliance concerns. Our inspection provides clear findings and professional reporting to help you protect your loved ones and satisfy compliance.
                </p>

                <a href="#quote-form" class="pool-btn btn-glow">
                    SCHEDULE YOUR INSPECTION NOW
                </a>
            </div>

        </div>
    </section>


    {{-- =====================================================
         8. CLIENT REVIEWS & FEEDBACK
    ====================================================== --}}
    <section class="pool-section pool-reviews">
        <div class="pool-container">

            <div class="pool-heading" data-aos="fade-up">
                <span class="small-title">Client Feedback & Reviews</span>
                <h2>WHAT OUR CLIENTS SAY</h2>
            </div>

            <div class="pool-review-grid">

                <div class="pool-review-card hover-lift" data-aos="fade-up" data-aos-delay="100">
                    <div class="pool-review-quote">“</div>
                    <p>
                        "Very professional and thorough. The pool barrier inspection was completed carefully and the findings were explained clearly."
                    </p>
                    <div class="pool-stars">★★★★★</div>
                    <h4>Sushil Trivedi</h4>
                </div>

                <div class="pool-review-card hover-lift" data-aos="fade-up" data-aos-delay="200">
                    <div class="pool-review-quote">“</div>
                    <p>
                        "Thank you for a very detailed inspection and clear reporting. Everything was explained in a simple way."
                    </p>
                    <div class="pool-stars">★★★★★</div>
                    <h4>Laxmi</h4>
                </div>

                <div class="pool-review-card hover-lift" data-aos="fade-up" data-aos-delay="300">
                    <div class="pool-review-quote">“</div>
                    <p>
                        "Excellent service and very easy to arrange. We received useful information about the pool barrier and areas that needed attention."
                    </p>
                    <div class="pool-stars">★★★★★</div>
                    <h4>Shailesh Patel</h4>
                </div>

            </div>

        </div>
    </section>


    {{-- =====================================================
         9. FREQUENTLY ASKED QUESTIONS (FAQ)
    ====================================================== --}}
    <section class="pool-section pool-faq">
        <div class="pool-container">

            <div class="pool-heading" data-aos="fade-up">
                <span class="small-title">Quick Answers</span>
                <h2>MOST POPULAR QUESTIONS</h2>
            </div>

            <div class="pool-faq-grid">

                {{-- LEFT COLUMN --}}
                <div class="pool-faq-col">

                    {{-- FAQ 1 (Active by default) --}}
                    <div class="pool-faq-item active" data-aos="fade-up" data-aos-delay="100">
                        <button class="pool-faq-question" type="button">
                            <span>What is a pool barrier inspection?</span>
                            <i class="bi bi-chevron-down pool-faq-icon"></i>
                        </button>
                        <div class="pool-faq-answer">
                            A pool barrier inspection is a professional visual assessment of accessible pool fencing, gates, latches, barriers and relevant access conditions for observable safety and compliance concerns.
                        </div>
                    </div>

                    {{-- FAQ 2 --}}
                    <div class="pool-faq-item" data-aos="fade-up" data-aos-delay="200">
                        <button class="pool-faq-question" type="button">
                            <span>How long does the inspection take?</span>
                            <i class="bi bi-chevron-down pool-faq-icon"></i>
                        </button>
                        <div class="pool-faq-answer">
                            Inspection time varies depending on the property, pool barrier arrangement and the number of areas requiring assessment. We provide estimated timeframes during booking.
                        </div>
                    </div>

                    {{-- FAQ 3 --}}
                    <div class="pool-faq-item" data-aos="fade-up" data-aos-delay="300">
                        <button class="pool-faq-question" type="button">
                            <span>What happens if an issue is found?</span>
                            <i class="bi bi-chevron-down pool-faq-icon"></i>
                        </button>
                        <div class="pool-faq-answer">
                            Observable issues are documented in the inspection findings. Depending on the issue, straightforward maintenance or specialist repair advice is provided to help you achieve compliance.
                        </div>
                    </div>

                </div>

                {{-- RIGHT COLUMN --}}
                <div class="pool-faq-col">

                    {{-- FAQ 4 (Active by default) --}}
                    <div class="pool-faq-item active" data-aos="fade-up" data-aos-delay="150">
                        <button class="pool-faq-question" type="button">
                            <span>Why do I need a pool barrier inspection?</span>
                            <i class="bi bi-chevron-down pool-faq-icon"></i>
                        </button>
                        <div class="pool-faq-answer">
                            A pool barrier is an essential safety feature mandated by Victorian law. An inspection identifies observable conditions that may require repair, preventing penalties and safeguarding lives.
                        </div>
                    </div>

                    {{-- FAQ 5 --}}
                    <div class="pool-faq-item" data-aos="fade-up" data-aos-delay="250">
                        <button class="pool-faq-question" type="button">
                            <span>How can I prepare for the inspection?</span>
                            <i class="bi bi-chevron-down pool-faq-icon"></i>
                        </button>
                        <div class="pool-faq-answer">
                            Ensure the inspector has safe access to all pool barriers, gates, and boundary perimeters. Clear away climbable items, outdoor furniture, and garden tools within 900mm of the barrier.
                        </div>
                    </div>

                    {{-- FAQ 6 --}}
                    <div class="pool-faq-item" data-aos="fade-up" data-aos-delay="350">
                        <button class="pool-faq-question" type="button">
                            <span>Can you provide a re-inspection?</span>
                            <i class="bi bi-chevron-down pool-faq-icon"></i>
                        </button>
                        <div class="pool-faq-answer">
                            Yes. A re-inspection can be arranged after identified issues have been rectified, allowing the inspector to verify compliance and issue the appropriate certification.
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </section>

</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const faqButtons = document.querySelectorAll('.pool-faq-question');
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