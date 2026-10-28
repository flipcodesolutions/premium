@extends('layouts.app')

@section('title', 'Pool Barrier Inspection Melbourne | Premium Building & Pest Inspections')
@section('meta_description', 'VBA compliant swimming pool and spa barrier safety inspections across Melbourne. Fast certification and expert advice to ensure child safety and council compliance.')

@section('content')

<style>
/* =========================================================
   POOL BARRIER INSPECTION PAGE STYLES
   1:1 Pixel-Perfect Match with Reference Screenshot & Live Site
========================================================= */

:root {
    --pool-navy: #073763;
    --pool-navy-dark: #052646;
    --pool-green: #42a900;
    --pool-green-dark: #358c00;
    --pool-light-green: #eef7ed;
    --pool-text: #333333;
    --pool-muted: #555555;
    --pool-border: #e2e8f0;
}

.pool-page {
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
    color: var(--pool-text);
    overflow-x: hidden;
    position: relative;
    background: #ffffff;
}

.pool-container {
    width: 92%;
    max-width: 1180px;
    margin: 0 auto;
}

.pool-section {
    padding: 70px 0;
}

/* Headings */
.pool-badge {
    display: inline-block;
    color: var(--pool-green);
    font-size: 13.5px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 1.2px;
    margin-bottom: 8px;
}

.pool-heading-center {
    text-align: center;
    margin-bottom: 40px;
}

.pool-heading-center h2 {
    margin: 0;
    color: var(--pool-navy);
    font-size: clamp(24px, 3.2vw, 34px);
    line-height: 1.25;
    font-weight: 900;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.pool-heading-center p {
    max-width: 720px;
    margin: 12px auto 0;
    color: var(--pool-muted);
    font-size: 15px;
    line-height: 1.7;
}

/* Buttons */
.pool-btn-green {
    display: inline-flex;
    justify-content: center;
    align-items: center;
    gap: 8px;
    padding: 13px 28px;
    background: var(--pool-green);
    color: #ffffff !important;
    border: 0;
    border-radius: 4px;
    font-size: 14.5px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    text-decoration: none;
    transition: all 0.25s ease;
    cursor: pointer;
}

.pool-btn-green:hover {
    background: var(--pool-green-dark);
    transform: translateY(-2px);
    box-shadow: 0 8px 22px rgba(66, 169, 0, 0.35);
}

/* =========================================================
   1. HERO SECTION
========================================================= */
.pool-hero {
    position: relative;
    background:
        linear-gradient(
            90deg,
            rgba(7, 43, 76, 0.94) 0%,
            rgba(7, 43, 76, 0.88) 50%,
            rgba(7, 43, 76, 0.65) 100%
        ),
        url("{{ asset('images/pre purchase service.jpeg') }}") center center / cover no-repeat;
    color: #fff;
    padding: 30px 0;
}

.pool-hero-inner {
    display: grid;
    grid-template-columns: 1.15fr 0.85fr;
    gap: 45px;
    align-items: center;
    padding: 50px 0 60px;
}

.pool-hero-content .pool-hero-badge {
    color: rgba(255, 255, 255, 0.9);
    font-size: 13px;
    font-weight: 800;
    letter-spacing: 1.5px;
    text-transform: uppercase;
    display: block;
    margin-bottom: 12px;
}

.pool-hero-content h1 {
    font-size: clamp(26px, 3.5vw, 40px);
    line-height: 1.2;
    font-weight: 900;
    color: #ffffff;
    margin: 0 0 16px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.pool-hero-content .pool-hero-sub {
    color: rgba(255, 255, 255, 0.95);
    font-size: 17px;
    line-height: 1.6;
    margin: 0 0 26px;
    font-weight: 500;
}

/* Hero Form */
.pool-hero-form {
    background: #ffffff;
    border-radius: 8px;
    padding: 26px 24px;
    box-shadow: 0 12px 35px rgba(0, 0, 0, 0.28);
    color: var(--pool-text);
}

.pool-hero-form h3 {
    margin: 0 0 16px;
    color: var(--pool-navy);
    font-size: 19px;
    font-weight: 900;
    text-transform: uppercase;
    text-align: center;
    letter-spacing: 0.5px;
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
    padding: 11px 14px;
    border: 1px solid #d2d6dc;
    border-radius: 4px;
    font-size: 13.5px;
    color: #333;
    outline: none;
    transition: border-color 0.2s ease;
    background: #fff;
    box-sizing: border-box;
}

.pool-hero-form input:focus,
.pool-hero-form select:focus,
.pool-hero-form textarea:focus {
    border-color: var(--pool-green);
    box-shadow: 0 0 0 3px rgba(66, 169, 0, 0.15);
}

.pool-hero-form textarea {
    resize: vertical;
    min-height: 75px;
    margin-top: 12px;
}

.pool-hero-form .pool-submit-btn {
    width: 100%;
    padding: 13px;
    background: var(--pool-green);
    color: #fff;
    border: 0;
    border-radius: 4px;
    font-size: 15px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    cursor: pointer;
    transition: background 0.2s ease;
    margin-top: 14px;
}

.pool-hero-form .pool-submit-btn:hover {
    background: var(--pool-green-dark);
}

/* =========================================================
   2. WELCOME SECTION + INSPECTOR CARD
========================================================= */
.pool-welcome-grid {
    display: grid;
    grid-template-columns: 1.15fr 0.85fr;
    gap: 50px;
    align-items: start;
}

.pool-welcome-content h2 {
    color: var(--pool-navy);
    font-size: clamp(24px, 3vw, 32px);
    font-weight: 900;
    text-transform: uppercase;
    line-height: 1.25;
    margin: 0 0 16px;
}

.pool-welcome-content p {
    color: var(--pool-muted);
    font-size: 14.5px;
    line-height: 1.7;
    margin: 0 0 14px;
}

.pool-feature-list {
    margin: 22px 0 28px;
    display: flex;
    flex-direction: column;
    gap: 16px;
}

.pool-feature-item {
    display: flex;
    align-items: flex-start;
    gap: 15px;
}

.pool-feature-icon {
    width: 38px;
    height: 38px;
    min-width: 38px;
    background: #eef6fc;
    color: #1b9eea;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 16px;
    box-shadow: 0 2px 8px rgba(27, 158, 234, 0.15);
    margin-top: 3px;
}

.pool-feature-item h4 {
    margin: 0 0 4px;
    color: var(--pool-navy);
    font-size: 14px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 0.4px;
}

.pool-feature-item p {
    margin: 0;
    color: var(--pool-muted);
    font-size: 13.5px;
    line-height: 1.55;
}

/* Inspector Card */
.pool-inspector-card {
    background: #ffffff;
    border: 1px solid #e5e9f0;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
    text-align: center;
}

.pool-inspector-header {
    background: #000000;
    color: #ffffff;
    padding: 10px 14px;
    font-size: 13.5px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.pool-inspector-card img {
    width: 100%;
    height: 360px;
    object-fit: cover;
    object-position: center top;
    display: block;
}

.pool-inspector-body {
    padding: 18px 20px;
}

.pool-inspector-body h4 {
    margin: 0 0 14px;
    color: var(--pool-navy);
    font-size: 13px;
    font-weight: 800;
    line-height: 1.5;
    text-transform: uppercase;
}

.pool-inspector-call {
    display: block;
    width: 100%;
    padding: 12px;
    background: var(--pool-green);
    color: #ffffff !important;
    text-decoration: none;
    border-radius: 4px;
    font-size: 15px;
    font-weight: 800;
    letter-spacing: 0.5px;
    transition: background 0.2s ease;
}

.pool-inspector-call:hover {
    background: var(--pool-green-dark);
}

/* =========================================================
   3. WHY POOL BARRIER INSPECTIONS ARE IMPORTANT
========================================================= */
.pool-important-section {
    background: #ffffff;
}

.pool-matters-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 18px;
}

.pool-matters-card {
    display: flex;
    align-items: flex-start;
    gap: 14px;
    background: #ffffff;
    border: 1px solid #e5e9f0;
    border-radius: 8px;
    padding: 18px 20px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.03);
    transition: all 0.25s ease;
}

.pool-matters-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 18px rgba(0, 0, 0, 0.07);
    border-color: #cbd5e1;
}

.pool-matters-icon {
    width: 24px;
    height: 24px;
    min-width: 24px;
    background: var(--pool-green);
    color: #ffffff;
    border-radius: 4px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 13px;
    font-weight: 900;
    margin-top: 2px;
}

.pool-matters-card p {
    margin: 0;
    color: var(--pool-muted);
    font-size: 13.5px;
    line-height: 1.6;
}

.pool-matters-card strong {
    color: var(--pool-navy);
    font-weight: 700;
}

/* =========================================================
   4. COMMON POOL BARRIER ISSUES WE FIND
========================================================= */
.pool-issues-grid {
    display: grid;
    grid-template-columns: 1.15fr 0.85fr;
    gap: 45px;
    align-items: center;
}

.pool-issues-content h2 {
    color: var(--pool-navy);
    font-size: clamp(22px, 2.8vw, 30px);
    font-weight: 900;
    text-transform: uppercase;
    line-height: 1.25;
    margin: 0 0 14px;
}

.pool-issues-content > p {
    color: var(--pool-muted);
    font-size: 14.5px;
    line-height: 1.6;
    margin: 0 0 18px;
}

.pool-issues-list {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    flex-direction: column;
    gap: 14px;
}

.pool-issues-item {
    display: flex;
    align-items: flex-start;
    gap: 12px;
}

.pool-issues-item .bullet-icon {
    width: 8px;
    height: 8px;
    min-width: 8px;
    background: var(--pool-green);
    border-radius: 50%;
    margin-top: 8px;
}

.pool-issues-item p {
    margin: 0;
    color: var(--pool-muted);
    font-size: 13.5px;
    line-height: 1.55;
}

.pool-issues-item strong {
    color: var(--pool-navy);
    font-weight: 700;
}

.pool-photo-box {
    position: relative;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.12);
    height: 420px;
    background: #000;
}

.pool-photo-box img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}

/* =========================================================
   5. WHY CHOOSE US (MINT GREEN CONTAINER)
========================================================= */
.pool-choose-section {
    background: var(--pool-light-green);
    border-radius: 18px;
    padding: 60px 40px;
}

.pool-choose-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
}

.pool-choose-card {
    background: #ffffff;
    border-radius: 8px;
    padding: 28px 20px;
    text-align: center;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.04);
    transition: all 0.25s ease;
}

.pool-choose-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
}

.pool-choose-icon-wrap {
    width: 46px;
    height: 46px;
    margin: 0 auto 16px;
    background: var(--pool-green);
    color: #ffffff;
    border-radius: 6px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 22px;
}

.pool-choose-card h4 {
    margin: 0 0 10px;
    color: var(--pool-navy);
    font-size: 14px;
    font-weight: 800;
    text-transform: uppercase;
    line-height: 1.35;
}

.pool-choose-card p {
    margin: 0;
    color: #555555;
    font-size: 13px;
    line-height: 1.6;
}

/* =========================================================
   6. PRICING PACKAGES (3 CARDS)
========================================================= */
.pool-price-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 25px;
    max-width: 1020px;
    margin: 0 auto;
}

.pool-price-card {
    background: #ffffff;
    border: 1px solid #e4e7eb;
    border-top: 3px solid var(--pool-green);
    border-radius: 6px;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
    padding: 30px 22px;
    text-align: center;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    transition: transform 0.25s ease, box-shadow 0.25s ease;
}

.pool-price-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 10px 28px rgba(0, 0, 0, 0.1);
}

.pool-price-icon {
    font-size: 32px;
    color: var(--pool-navy);
    margin-bottom: 12px;
}

.pool-price-card h3 {
    margin: 0 0 10px;
    color: var(--pool-navy);
    font-size: 17px;
    font-weight: 800;
    text-transform: capitalize;
}

.pool-price-amount {
    color: var(--pool-green);
    font-size: 36px;
    font-weight: 900;
    line-height: 1;
    margin-bottom: 4px;
}

.pool-price-suffix {
    color: #666666;
    font-size: 13px;
    font-weight: 600;
    margin-bottom: 20px;
}

.pool-price-features {
    list-style: none;
    padding: 0;
    margin: 0 0 24px;
    text-align: left;
    flex-grow: 1;
}

.pool-price-features li {
    padding: 9px 0;
    border-bottom: 1px solid #f0f2f5;
    color: #444444;
    font-size: 13.5px;
    display: flex;
    align-items: center;
    gap: 8px;
}

.pool-price-features li i {
    color: var(--pool-green);
    font-size: 15px;
}

.pool-price-btn {
    display: block;
    width: 100%;
    padding: 12px;
    background: var(--pool-green);
    color: #ffffff !important;
    text-decoration: none;
    font-size: 14px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    border-radius: 4px;
    transition: background 0.2s ease;
}

.pool-price-btn:hover {
    background: var(--pool-green-dark);
}

/* =========================================================
   7. SCHEDULE CTA (DARK TIMBER BACKGROUND)
========================================================= */
.pool-cta {
    position: relative;
    min-height: 540px;
    display: flex;
    align-items: center;
    background:
        linear-gradient(
            90deg,
            rgba(7, 43, 76, 0.96) 0%,
            rgba(7, 43, 76, 0.88) 50%,
            rgba(7, 43, 76, 0.30) 100%
        ),
        url("{{ asset('images/schedule.jpeg') }}") center right / cover no-repeat;
    color: #ffffff;
    padding: 105px 0;
}

.pool-cta-inner {
    max-width: 820px;
}

.pool-cta h2 {
    color: #ffffff;
    font-size: clamp(30px, 4vw, 46px);
    font-weight: 900;
    text-transform: uppercase;
    line-height: 1.2;
    margin: 0 0 20px;
    letter-spacing: 0.5px;
}

.pool-cta p {
    color: rgba(255, 255, 255, 0.96);
    font-size: 17.5px;
    line-height: 1.85;
    margin: 0 0 32px;
}

.pool-cta .pool-btn-green {
    padding: 16px 38px;
    font-size: 15.5px;
    font-weight: 800;
    letter-spacing: 0.6px;
}

/* =========================================================
   8. CLIENT FEEDBACK & REVIEWS
========================================================= */
.pool-review-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 24px;
}

.pool-review-card {
    background: #ffffff;
    border: 1px solid #e5e9f0;
    border-radius: 8px;
    padding: 28px 24px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.04);
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    transition: transform 0.25s ease;
    text-align: center;
}

.pool-review-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
}

.pool-review-icon {
    font-size: 26px;
    color: #1b9eea;
    margin-bottom: 12px;
}

.pool-review-card p {
    color: var(--pool-muted);
    font-size: 13.5px;
    line-height: 1.65;
    margin: 0 0 16px;
    flex-grow: 1;
}

.pool-review-stars {
    color: #ffb400;
    font-size: 15px;
    margin-bottom: 10px;
    letter-spacing: 2px;
}

.pool-review-card h4 {
    margin: 0;
    color: var(--pool-navy);
    font-size: 15px;
    font-weight: 800;
}

/* =========================================================
   9. FAQS SECTION (ACCORDION)
========================================================= */
.pool-faq-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
    align-items: start;
}

.pool-faq-col {
    display: flex;
    flex-direction: column;
    gap: 16px;
}

.pool-faq-item {
    background: #ffffff;
    border: 1px solid #e4e7eb;
    border-radius: 6px;
    overflow: hidden;
    transition: all 0.2s ease;
}

.pool-faq-question {
    width: 100%;
    padding: 16px 20px;
    background: #f8fafc;
    border: 0;
    text-align: left;
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 12px;
    color: var(--pool-navy);
    font-size: 14.5px;
    font-weight: 800;
    cursor: pointer;
    transition: background 0.2s ease, color 0.2s ease;
}

.pool-faq-question span {
    flex-grow: 1;
    line-height: 1.4;
}

.pool-faq-icon {
    font-size: 14px;
    color: var(--pool-green);
    transition: transform 0.3s ease;
}

.pool-faq-answer {
    padding: 0 20px;
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.3s ease, padding 0.3s ease;
    color: var(--pool-muted);
    font-size: 13.5px;
    line-height: 1.65;
    background: #ffffff;
}

/* Active State (Q1 & Q4 by default) */
.pool-faq-item.active .pool-faq-question {
    background: var(--pool-green);
    color: #ffffff;
}

.pool-faq-item.active .pool-faq-icon {
    color: #ffffff;
    transform: rotate(180deg);
}

.pool-faq-item.active .pool-faq-answer {
    padding: 16px 20px 20px;
    max-height: 300px;
}

/* Responsive */
@media (max-width: 991px) {
    .pool-hero-inner,
    .pool-welcome-grid,
    .pool-issues-grid {
        grid-template-columns: 1fr;
        gap: 35px;
    }

    .pool-choose-grid {
        grid-template-columns: repeat(2, 1fr);
    }

    .pool-price-grid {
        grid-template-columns: 1fr;
        max-width: 450px;
    }

    .pool-review-grid {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 767px) {
    .pool-section {
        padding: 50px 0;
    }

    .pool-form-row,
    .pool-matters-grid,
    .pool-faq-grid {
        grid-template-columns: 1fr;
    }

    .pool-choose-section {
        padding: 35px 20px;
    }

    .pool-choose-grid {
        grid-template-columns: 1fr;
    }

    .pool-photo-box {
        height: 320px;
    }
}
</style>

<div class="pool-page">

    {{-- =====================================================
         1. HERO SECTION & QUICK QUOTE FORM
    ====================================================== --}}
    <section class="pool-hero">
        <div class="pool-container">
            <div class="pool-hero-inner">

                {{-- Left Content --}}
                <div class="pool-hero-content">
                    <span class="pool-hero-badge">PREMIUM BUILDING & PEST INSPECTIONS</span>
                    <h1>ENSURE YOUR POOL IS SAFE AND COMPLIANT WITH OUR POOL BARRIER INSPECTION SERVICE</h1>
                    <p class="pool-hero-sub">Comprehensive, Same-Day Inspections for Your Peace of Mind</p>

                    <div>
                        <a href="tel:0466001551" class="pool-btn-green">
                            <i class="bi bi-telephone-fill"></i>
                            0466 001 551
                        </a>
                    </div>
                </div>

                {{-- Right Form --}}
                <div id="quote-form" class="pool-hero-form">
                    <h3>GET QUICK QUOTE</h3>

                    @if(session('success'))
                        <div class="alert alert-success py-2 mb-3" style="font-size: 13.5px;">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('quote.store') }}" method="POST">
                        @csrf

                        <div class="pool-form-row">
                            <input type="text" name="name" placeholder="Name *" value="{{ old('name') }}" required>
                            <input type="email" name="email" placeholder="Email *" value="{{ old('email') }}" required>
                        </div>

                        <div class="pool-form-row">
                            <input type="tel" name="phone" placeholder="Phone *" value="{{ old('phone') }}" required>
                            <input type="text" name="property_address" placeholder="Property Address" value="{{ old('property_address') }}">
                        </div>

                        <select name="service_type" required>
                            <option value="pool-barrier-inspection" selected>Pool Barrier Inspection</option>
                            <option value="pre-purchase-building-and-pest-inspection">Pre-Purchase Building and Pest Inspection</option>
                            <option value="building-stage-by-stage-inspection">Building Stage by Stage Inspection</option>
                            <option value="apartment-building-inspection">Apartment Building Inspection</option>
                            <option value="rising-damp-inspection">Rising Damp Inspection</option>
                            <option value="new-build-handover-inspection">New Build Handover Inspection</option>
                            <option value="dilapidation-report">Dilapidation Report</option>
                            <option value="vendor-inspection">Vendor Inspection</option>
                            <option value="builders-warranty-inspection">Builders Warranty Inspection</option>
                        </select>

                        <div class="pool-form-row" style="margin-top: 12px; margin-bottom: 0;">
                            <input type="date" name="preferred_date" placeholder="Inspection Date">
                            <input type="text" name="notes" placeholder="Notes (e.g. Pool type, Spa)">
                        </div>

                        <textarea name="message" placeholder="Message / Details (e.g. Existing pool, New pool, Council notice)">{{ old('message') }}</textarea>

                        <button type="submit" class="pool-submit-btn">
                            Get My Quote
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

                {{-- Left Content --}}
                <div class="pool-welcome-content">
                    <span class="pool-badge">WELCOME TO PREMIUM POOL BARRIER INSPECTION</span>
                    <h2>Welcome to Premium Pool Barrier Inspection</h2>

                    <p>
                        Having a safe and compliant pool barrier is not just a legal requirement but a critical step in ensuring the safety of your loved ones, particularly children. Our Pool Barrier Inspection service in Melbourne is designed to help homeowners meet Victoria’s strict pool safety regulations with ease and confidence. With our experienced inspectors, detailed reports, and prompt service, we guarantee a hassle-free process, whether you are applying for a compliance certificate or need advice on improving your pool safety.
                    </p>

                    <p style="font-weight: 700; color: var(--pool-navy); margin-bottom: 12px;">We Offer:</p>

                    <div class="pool-feature-list">
                        <div class="pool-feature-item">
                            <div class="pool-feature-icon">
                                <i class="bi bi-search"></i>
                            </div>
                            <div>
                                <h4>COMPREHENSIVE INSPECTION</h4>
                                <p>We conduct a detailed inspection of your pool’s safety barrier, including gates, fences, and any other parts of the barrier system.</p>
                            </div>
                        </div>

                        <div class="pool-feature-item">
                            <div class="pool-feature-icon">
                                <i class="bi bi-search"></i>
                            </div>
                            <div>
                                <h4>CHECK FOR NON-COMPLIANCES</h4>
                                <p>During the inspection, we assess your pool barrier for any non-compliances, such as gaps in the fencing, faulty latches, or inappropriate materials.</p>
                            </div>
                        </div>

                        <div class="pool-feature-item">
                            <div class="pool-feature-icon">
                                <i class="bi bi-search"></i>
                            </div>
                            <div>
                                <h4>DETAILED COMPLIANCE REPORT</h4>
                                <p>After the inspection, we provide a thorough report outlining any issues or potential risks. If your barrier is non-compliant, our report includes clear recommendations on how to rectify the issues. Once your pool is compliant, we issue a Certificate of Pool and Spa Barrier Compliance as required by Victorian law.</p>
                            </div>
                        </div>
                    </div>

                    <div>
                        <a href="#quote-form" class="pool-btn-green">
                            Schedule Inspection Now
                        </a>
                    </div>
                </div>

                {{-- Right Inspector Card --}}
                <div class="pool-welcome-card-col">
                    <div class="pool-inspector-card">
                        <div class="pool-inspector-header">
                            YOUR INSPECTOR
                        </div>

                        <img src="{{ asset('images/ronak gami.jpeg') }}" alt="Ronak Gami - Registered Building Inspector">

                        <div class="pool-inspector-body">
                            <h4>Ronak Gami, vba lic No: IN-PS 74654, Builder Lic No: DB-L 100200</h4>
                            <a href="tel:0466001551" class="pool-inspector-call">
                                <i class="bi bi-telephone-fill me-2"></i>
                                0466 001 551
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


    {{-- =====================================================
         3. WHY POOL BARRIER INSPECTIONS ARE IMPORTANT
    ====================================================== --}}
    <section class="pool-section pool-important-section" style="padding-top: 10px;">
        <div class="pool-container">

            <div class="pool-heading-center">
                <h2>WHY POOL BARRIER INSPECTIONS ARE IMPORTANT</h2>
            </div>

            <div class="pool-matters-grid">

                <div class="pool-matters-card">
                    <div class="pool-matters-icon">✓</div>
                    <p>
                        <strong>Legal Compliance:</strong> Under the VBA's regulations, all swimming pools and spas in Victoria must have compliant safety barriers. Failure to comply can result in fines or legal action. Our service ensures your pool meets all legislative requirements.
                    </p>
                </div>

                <div class="pool-matters-card">
                    <div class="pool-matters-icon">✓</div>
                    <p>
                        <strong>Peace of Mind:</strong> Knowing your pool is safe and compliant provides peace of mind for you and your family, allowing you to enjoy the pool without worrying about potential hazards.
                    </p>
                </div>

                <div class="pool-matters-card">
                    <div class="pool-matters-icon">✓</div>
                    <p>
                        <strong>Preventing Accidents:</strong> The majority of pool-related accidents involve young children. A properly installed and maintained pool barrier can drastically reduce the risk of drowning or other injuries.
                    </p>
                </div>

                <div class="pool-matters-card">
                    <div class="pool-matters-icon">✓</div>
                    <p>
                        <strong>Avoid Penalties:</strong> Non-compliant pool barriers can result in heavy fines and penalties. By keeping your pool up to date with safety regulations, you can avoid these legal consequences.
                    </p>
                </div>

            </div>

        </div>
    </section>


    {{-- =====================================================
         4. COMMON POOL BARRIER ISSUES WE FIND
    ====================================================== --}}
    <section class="pool-section pool-issues">
        <div class="pool-container">
            <div class="pool-issues-grid">

                {{-- Left Content --}}
                <div class="pool-issues-content">
                    <h2>COMMON POOL BARRIER ISSUES WE FIND</h2>

                    <p>Through our experience, we often encounter the following problems during pool barrier inspections:</p>

                    <ul class="pool-issues-list">
                        <li class="pool-issues-item">
                            <span class="bullet-icon"></span>
                            <p><strong>Gaps in Fencing:</strong> Small gaps can create large risks. We identify spaces where a child could squeeze through or under the fence.</p>
                        </li>

                        <li class="pool-issues-item">
                            <span class="bullet-icon"></span>
                            <p><strong>Faulty Gates:</strong> Gates that don’t close or latch properly are one of the most common compliance failures. We ensure your gates meet the self-latching and self-closing requirements.</p>
                        </li>

                        <li class="pool-issues-item">
                            <span class="bullet-icon"></span>
                            <p><strong>Inadequate Barrier Height:</strong> Fences that are too low or climbable can be dangerous. We check the height and ensure it cannot be easily scaled.</p>
                        </li>

                        <li class="pool-issues-item">
                            <span class="bullet-icon"></span>
                            <p><strong>Vegetation Interference:</strong> Trees or shrubs growing too close to the barrier can provide climbing assistance for children. We advise on how to maintain clear zones around the fence.</p>
                        </li>

                        <li class="pool-issues-item">
                            <span class="bullet-icon"></span>
                            <p><strong>Deteriorating Fences:</strong> Over time, fences can rust, warp, or become loose, compromising their safety. We check the integrity of all materials and fixtures.</p>
                        </li>
                    </ul>
                </div>

                {{-- Right Photo --}}
                <div class="pool-photo-box">
                    <img src="{{ asset('images/pool-barrier-inspection.jpg') }}" alt="Certified inspector conducting pool barrier compliance inspection">
                </div>

            </div>
        </div>
    </section>


    {{-- =====================================================
         5. WHY CHOOSE US (MINT GREEN SECTION)
    ====================================================== --}}
    <section class="pool-section" style="padding-top: 10px;">
        <div class="pool-container">
            <div class="pool-choose-section">

                <div class="pool-heading-center">
                    <span class="pool-badge">WHY CHOOSE US</span>
                    <h2>WHY CHOOSE US FOR YOUR POOL BARRIER INSPECTION?</h2>
                </div>

                <div class="pool-choose-grid">

                    <div class="pool-choose-card">
                        <div class="pool-choose-icon-wrap">
                            <i class="bi bi-shield-check"></i>
                        </div>
                        <h4>Licensed and Experienced Inspectors</h4>
                        <p>Our team consists of qualified, licensed inspectors with years of experience in pool barrier compliance across Melbourne.</p>
                    </div>

                    <div class="pool-choose-card">
                        <div class="pool-choose-icon-wrap">
                            <i class="bi bi-clock-history"></i>
                        </div>
                        <h4>Fast and Efficient Service</h4>
                        <p>We know that time is crucial, especially if you're applying for a compliance certificate or selling your property. We offer prompt inspections and same-day or next-day reporting for your convenience.</p>
                    </div>

                    <div class="pool-choose-card">
                        <div class="pool-choose-icon-wrap">
                            <i class="bi bi-people-fill"></i>
                        </div>
                        <h4>Customer-Focused</h4>
                        <p>Our service doesn’t end with the inspection. We work with you to ensure your pool barrier meets safety standards, offering practical solutions to fix non-compliances.</p>
                    </div>

                    <div class="pool-choose-card">
                        <div class="pool-choose-icon-wrap">
                            <i class="bi bi-tag-fill"></i>
                        </div>
                        <h4>Affordable Pricing</h4>
                        <p>Our inspection services are competitively priced without compromising on quality. We also provide discounts for follow-up inspections, ensuring compliance is cost-effective.</p>
                    </div>

                </div>

            </div>
        </div>
    </section>


    {{-- =====================================================
         6. CHOOSE PACKAGE / ENSURE SAFETY AND COMPLIANCE (PRICING)
    ====================================================== --}}
    <section class="pool-section">
        <div class="pool-container">

            <div class="pool-heading-center">
                <span class="pool-badge">CHOOSE PACKAGE</span>
                <h2>ENSURE SAFETY AND COMPLIANCE</h2>
            </div>

            <div class="pool-price-grid">

                {{-- CARD 1: WITHIN 40KM --}}
                <div class="pool-price-card">
                    <div>
                        <div class="pool-price-icon">
                            <i class="bi bi-geo-alt"></i>
                        </div>
                        <h3>Within 40Km</h3>

                        <div class="pool-price-amount">$225</div>
                        <div class="pool-price-suffix">+GST/ Starting</div>

                        <ul class="pool-price-features">
                            <li><i class="bi bi-check-square-fill"></i> Comprehensive Inspection</li>
                            <li><i class="bi bi-check-square-fill"></i> Form 23 Certificate</li>
                            <li><i class="bi bi-check-square-fill"></i> Consultation</li>
                        </ul>
                    </div>

                    <a href="#quote-form" class="pool-price-btn">
                        GET STARTED
                    </a>
                </div>

                {{-- CARD 2: 40KM+ --}}
                <div class="pool-price-card">
                    <div>
                        <div class="pool-price-icon">
                            <i class="bi bi-compass"></i>
                        </div>
                        <h3>40km+</h3>

                        <div class="pool-price-amount">$275</div>
                        <div class="pool-price-suffix">+GST/ Starting</div>

                        <ul class="pool-price-features">
                            <li><i class="bi bi-check-square-fill"></i> Comprehensive Inspection</li>
                            <li><i class="bi bi-check-square-fill"></i> Form 23 Certificate</li>
                            <li><i class="bi bi-check-square-fill"></i> Consultation</li>
                        </ul>
                    </div>

                    <a href="#quote-form" class="pool-price-btn">
                        GET STARTED
                    </a>
                </div>

                {{-- CARD 3: REINSPECTION --}}
                <div class="pool-price-card">
                    <div>
                        <div class="pool-price-icon">
                            <i class="bi bi-arrow-repeat"></i>
                        </div>
                        <h3>Reinspection</h3>

                        <div class="pool-price-amount">$150</div>
                        <div class="pool-price-suffix">+GST/ Starting</div>

                        <ul class="pool-price-features">
                            <li><i class="bi bi-check-square-fill"></i> Re-inspection</li>
                            <li><i class="bi bi-check-square-fill"></i> Form 23 Certificate</li>
                            <li><i class="bi bi-check-square-fill"></i> Consultation</li>
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
         7. SCHEDULE CTA
    ====================================================== --}}
    <section class="pool-cta">
        <div class="pool-container">
            <div class="pool-cta-inner">
                <h2>SCHEDULE YOUR INSPECTION TODAY</h2>

                <p>
                    A pre-purchase building and pest inspection is a small investment that can save you from significant expenses and stress in the future. Our professional inspections provide you with the information needed to make an informed, confident decision about your property purchase. Don’t take risks with your investment—book your inspection today.
                </p>

                <a href="#quote-form" class="pool-btn-green">
                    Schedule your inspection now
                </a>
            </div>
        </div>
    </section>


    {{-- =====================================================
         8. CLIENT FEEDBACK & REVIEWS
    ====================================================== --}}
    <section class="pool-section pool-reviews">
        <div class="pool-container">

            <div class="pool-heading-center">
                <span class="pool-badge">TESTIMONIAL</span>
                <h2>CLIENT FEEDBACK & REVIEWS</h2>
            </div>

            <div class="pool-review-grid">

                <div class="pool-review-card">
                    <div class="pool-review-icon">
                        <i class="bi bi-chat-quote"></i>
                    </div>
                    <p>
                        Very professional and approachable. The property inspection was done thoroughly, and even minor defects were identified. Really appreciate the attention to detail and commitment to the job. Highly recommended for any building inspection.
                    </p>
                    <div class="pool-review-stars">★★★★★</div>
                    <h4>Swathi Tarini</h4>
                </div>

                <div class="pool-review-card">
                    <div class="pool-review-icon">
                        <i class="bi bi-chat-quote"></i>
                    </div>
                    <p>
                        Took generous time to answer all my questions regarding the property's condition and report. Very kind, humble, and helpful. Highly recommended for anyone needing a building and pest inspection
                    </p>
                    <div class="pool-review-stars">★★★★★</div>
                    <h4>Luxmy</h4>
                </div>

                <div class="pool-review-card">
                    <div class="pool-review-icon">
                        <i class="bi bi-chat-quote"></i>
                    </div>
                    <p>
                        Provided an excellent inspection for the property I'm purchasing. All findings were explained clearly, and the report was prepared on the same day. Warm, professional, and efficient. Highly recommended to friends and family.
                    </p>
                    <div class="pool-review-stars">★★★★★</div>
                    <h4>Shaleen De Silva</h4>
                </div>

                <div class="pool-review-card">
                    <div class="pool-review-icon">
                        <i class="bi bi-chat-quote"></i>
                    </div>
                    <p>
                        Extremely helpful and responsive. The building and pest inspection was completed quickly, and the report was delivered exactly as requested. Smooth and professional experience overall— great service!
                    </p>
                    <div class="pool-review-stars">★★★★★</div>
                    <h4>Niresh Wijesiri</h4>
                </div>

                <div class="pool-review-card">
                    <div class="pool-review-icon">
                        <i class="bi bi-chat-quote"></i>
                    </div>
                    <p>
                        Very thorough and professional during my pre-purchase building and pest inspection. Strongly recommended.
                    </p>
                    <div class="pool-review-stars">★★★★★</div>
                    <h4>Max</h4>
                </div>

                <div class="pool-review-card">
                    <div class="pool-review-icon">
                        <i class="bi bi-chat-quote"></i>
                    </div>
                    <p>
                        Amazing experience. Quick replies, prompt actions, and a positive attitude. Would definitely recommend 👏👏👏
                    </p>
                    <div class="pool-review-stars">★★★★★</div>
                    <h4>Heena Bhavsar</h4>
                </div>

            </div>

        </div>
    </section>


    {{-- =====================================================
         9. FREQUENTLY ASKED QUESTIONS (FAQ)
    ====================================================== --}}
    <section class="pool-section pool-faq" style="background: #ffffff; padding-top: 10px;">
        <div class="pool-container">

            <div class="pool-heading-center">
                <span class="pool-badge">COMMON QUESTIONS</span>
                <h2>MOST POPULAR QUESTIONS</h2>
            </div>

            <div class="pool-faq-grid">

                {{-- COLUMN 1 --}}
                <div class="pool-faq-col">

                    {{-- FAQ 1 (Active by default) --}}
                    <div class="pool-faq-item active">
                        <button class="pool-faq-question" type="button" onclick="togglePoolFaq(this)">
                            <span>1. What is a pool barrier inspection?</span>
                            <i class="bi bi-chevron-down pool-faq-icon"></i>
                        </button>
                        <div class="pool-faq-answer">
                            A pool barrier inspection is a thorough check of your pool’s safety barriers to ensure they comply with the Victorian Building Authority (VBA) regulations. The inspection focuses on identifying potential risks, including gaps in fencing, faulty gates, and other safety concerns.
                        </div>
                    </div>

                    {{-- FAQ 2 --}}
                    <div class="pool-faq-item">
                        <button class="pool-faq-question" type="button" onclick="togglePoolFaq(this)">
                            <span>2. Why do I need a pool barrier inspection?</span>
                            <i class="bi bi-chevron-down pool-faq-icon"></i>
                        </button>
                        <div class="pool-faq-answer">
                            In Victoria, it is legally required that all pool and spa barriers meet specific safety standards to prevent unsupervised access by children. Regular inspections help ensure your pool is safe and compliant, avoiding fines or legal consequences.
                        </div>
                    </div>

                    {{-- FAQ 3 --}}
                    <div class="pool-faq-item">
                        <button class="pool-faq-question" type="button" onclick="togglePoolFaq(this)">
                            <span>3. How much does a pool barrier inspection cost?</span>
                            <i class="bi bi-chevron-down pool-faq-icon"></i>
                        </button>
                        <div class="pool-faq-answer">
                            The cost of a pool barrier inspection depends on the size of your pool and the complexity of the barrier. Our services start at $225, and we offer follow-up inspections at discounted rates if needed.
                        </div>
                    </div>

                </div>

                {{-- COLUMN 2 --}}
                <div class="pool-faq-col">

                    {{-- FAQ 4 (Active by default) --}}
                    <div class="pool-faq-item active">
                        <button class="pool-faq-question" type="button" onclick="togglePoolFaq(this)">
                            <span>4. What happens if my pool barrier doesn’t pass the inspection?</span>
                            <i class="bi bi-chevron-down pool-faq-icon"></i>
                        </button>
                        <div class="pool-faq-answer">
                            If your pool barrier does not pass, we will provide you with a detailed report outlining the non-compliances and recommendations to fix them. After you’ve made the necessary changes, we can conduct a follow-up inspection to ensure the barrier is compliant.
                        </div>
                    </div>

                    {{-- FAQ 5 --}}
                    <div class="pool-faq-item">
                        <button class="pool-faq-question" type="button" onclick="togglePoolFaq(this)">
                            <span>5. How long does the inspection take, and when will I receive the report?</span>
                            <i class="bi bi-chevron-down pool-faq-icon"></i>
                        </button>
                        <div class="pool-faq-answer">
                            The inspection typically takes 1 to 1.5 hours, depending on the size of the pool and its surroundings. You will receive a detailed report within 24 hours, or sooner if requested.
                        </div>
                    </div>

                    {{-- FAQ 6 --}}
                    <div class="pool-faq-item">
                        <button class="pool-faq-question" type="button" onclick="togglePoolFaq(this)">
                            <span>6. How often should I get a pool barrier inspection?</span>
                            <i class="bi bi-chevron-down pool-faq-icon"></i>
                        </button>
                        <div class="pool-faq-answer">
                            You should get a pool barrier inspection whenever you install a new pool or spa, make changes to the fencing, or as required by law every four years. Regular inspections ensure your pool stays compliant with evolving regulations.
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </section>

</div>

<script>
// FAQ Accordion Toggle
function togglePoolFaq(btn) {
    const item = btn.closest('.pool-faq-item');
    const col = item.closest('.pool-faq-col');
    const allInCol = col.querySelectorAll('.pool-faq-item');
    const wasActive = item.classList.contains('active');

    // Close other items in the same column
    allInCol.forEach(el => el.classList.remove('active'));

    // Toggle clicked item
    if (!wasActive) {
        item.classList.add('active');
    }
}
</script>

@endsection