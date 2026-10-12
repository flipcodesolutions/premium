@extends('layouts.app')

@section('title', 'Dilapidation Inspection Melbourne | Premium Building & Pest Inspections')

@section('content')

<style>
/* =========================================================
   DILAPIDATION INSPECTION PAGE STYLES
   1:1 Pixel-Perfect Match with Reference Screenshot & Live Site
========================================================= */

:root {
    --d-navy: #073763;
    --d-navy-dark: #052646;
    --d-green: #42a900;
    --d-green-dark: #358c00;
    --d-light-green: #eef7ed;
    --d-text: #333333;
    --d-muted: #555555;
    --d-border: #e2e8f0;
}

.d-page {
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
    color: var(--d-text);
    overflow-x: hidden;
    position: relative;
    background: #ffffff;
}

.d-container {
    width: 92%;
    max-width: 1180px;
    margin: 0 auto;
}

.d-section {
    padding: 70px 0;
}

/* Headings */
.d-badge {
    display: inline-block;
    color: var(--d-green);
    font-size: 13.5px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 1.2px;
    margin-bottom: 8px;
}

.d-heading-center {
    text-align: center;
    margin-bottom: 40px;
}

.d-heading-center h2 {
    margin: 0;
    color: var(--d-navy);
    font-size: clamp(24px, 3.2vw, 34px);
    line-height: 1.25;
    font-weight: 900;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.d-heading-center p {
    max-width: 720px;
    margin: 12px auto 0;
    color: var(--d-muted);
    font-size: 15px;
    line-height: 1.7;
}

/* Buttons */
.d-btn-green {
    display: inline-flex;
    justify-content: center;
    align-items: center;
    gap: 8px;
    padding: 13px 28px;
    background: var(--d-green);
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

.d-btn-green:hover {
    background: var(--d-green-dark);
    transform: translateY(-2px);
    box-shadow: 0 8px 22px rgba(66, 169, 0, 0.35);
}

/* =========================================================
   1. HERO SECTION
========================================================= */
.d-hero {
    position: relative;
    background:
        linear-gradient(
            90deg,
            rgba(7, 43, 76, 0.94) 0%,
            rgba(7, 43, 76, 0.88) 50%,
            rgba(7, 43, 76, 0.65) 100%
        ),
        url("{{ asset('images/dilapidation-hero.jpg') }}") center center / cover no-repeat;
    color: #fff;
    padding: 30px 0;
}

.d-hero-inner {
    display: grid;
    grid-template-columns: 1.15fr 0.85fr;
    gap: 45px;
    align-items: center;
    padding: 50px 0 60px;
}

.d-hero-content .d-hero-badge {
    color: rgba(255, 255, 255, 0.9);
    font-size: 13px;
    font-weight: 800;
    letter-spacing: 1.5px;
    text-transform: uppercase;
    display: block;
    margin-bottom: 12px;
}

.d-hero-content h1 {
    font-size: clamp(26px, 3.5vw, 40px);
    line-height: 1.2;
    font-weight: 900;
    color: #ffffff;
    margin: 0 0 16px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.d-hero-content .d-hero-sub {
    color: rgba(255, 255, 255, 0.95);
    font-size: 17px;
    line-height: 1.6;
    margin: 0 0 26px;
    font-weight: 500;
}

/* Hero Form */
.d-hero-form {
    background: #ffffff;
    border-radius: 8px;
    padding: 26px 24px;
    box-shadow: 0 12px 35px rgba(0, 0, 0, 0.28);
    color: var(--d-text);
}

.d-hero-form h3 {
    margin: 0 0 16px;
    color: var(--d-navy);
    font-size: 19px;
    font-weight: 900;
    text-transform: uppercase;
    text-align: center;
    letter-spacing: 0.5px;
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

.d-hero-form input:focus,
.d-hero-form select:focus,
.d-hero-form textarea:focus {
    border-color: var(--d-green);
    box-shadow: 0 0 0 3px rgba(66, 169, 0, 0.15);
}

.d-hero-form textarea {
    resize: vertical;
    min-height: 75px;
    margin-top: 12px;
}

.d-hero-form .d-submit-btn {
    width: 100%;
    padding: 13px;
    background: var(--d-green);
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

.d-hero-form .d-submit-btn:hover {
    background: var(--d-green-dark);
}

/* =========================================================
   2. WELCOME SECTION + INSPECTOR CARD
========================================================= */
.d-welcome-grid {
    display: grid;
    grid-template-columns: 1.15fr 0.85fr;
    gap: 50px;
    align-items: start;
}

.d-welcome-content h2 {
    color: var(--d-navy);
    font-size: clamp(24px, 3vw, 32px);
    font-weight: 900;
    text-transform: uppercase;
    line-height: 1.25;
    margin: 0 0 16px;
}

.d-welcome-content p {
    color: var(--d-muted);
    font-size: 14.5px;
    line-height: 1.7;
    margin: 0 0 14px;
}

.d-feature-list {
    margin: 22px 0 28px;
    display: flex;
    flex-direction: column;
    gap: 16px;
}

.d-feature-item {
    display: flex;
    align-items: flex-start;
    gap: 15px;
}

.d-feature-icon {
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

.d-feature-item h4 {
    margin: 0 0 4px;
    color: var(--d-navy);
    font-size: 14px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 0.4px;
}

.d-feature-item p {
    margin: 0;
    color: var(--d-muted);
    font-size: 13.5px;
    line-height: 1.55;
}

/* Inspector Card */
.d-inspector-card {
    background: #ffffff;
    border: 1px solid #e5e9f0;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
    text-align: center;
}

.d-inspector-header {
    background: #000000;
    color: #ffffff;
    padding: 10px 14px;
    font-size: 13.5px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.d-inspector-card img {
    width: 100%;
    height: 360px;
    object-fit: cover;
    object-position: center top;
    display: block;
}

.d-inspector-body {
    padding: 18px 20px;
}

.d-inspector-body h4 {
    margin: 0 0 14px;
    color: var(--d-navy);
    font-size: 13px;
    font-weight: 800;
    line-height: 1.5;
    text-transform: uppercase;
}

.d-inspector-call {
    display: block;
    width: 100%;
    padding: 12px;
    background: var(--d-green);
    color: #ffffff !important;
    text-decoration: none;
    border-radius: 4px;
    font-size: 15px;
    font-weight: 800;
    letter-spacing: 0.5px;
    transition: background 0.2s ease;
}

.d-inspector-call:hover {
    background: var(--d-green-dark);
}

/* =========================================================
   3. WHY DILAPIDATION INSPECTIONS ARE IMPORTANT
========================================================= */
.d-important-section {
    background: #ffffff;
}

.d-matters-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 18px;
}

.d-matters-card {
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

.d-matters-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 18px rgba(0, 0, 0, 0.07);
    border-color: #cbd5e1;
}

.d-matters-icon {
    width: 24px;
    height: 24px;
    min-width: 24px;
    background: var(--d-green);
    color: #ffffff;
    border-radius: 4px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 13px;
    font-weight: 900;
    margin-top: 2px;
}

.d-matters-card p {
    margin: 0;
    color: var(--d-muted);
    font-size: 13.5px;
    line-height: 1.6;
}

.d-matters-card strong {
    color: var(--d-navy);
    font-weight: 700;
}

/* =========================================================
   4. COMMON ISSUES FOUND DURING DILAPIDATION INSPECTIONS
========================================================= */
.d-issues-grid {
    display: grid;
    grid-template-columns: 1.15fr 0.85fr;
    gap: 45px;
    align-items: center;
}

.d-issues-content h2 {
    color: var(--d-navy);
    font-size: clamp(22px, 2.8vw, 30px);
    font-weight: 900;
    text-transform: uppercase;
    line-height: 1.25;
    margin: 0 0 14px;
}

.d-issues-content > p {
    color: var(--d-muted);
    font-size: 14.5px;
    line-height: 1.6;
    margin: 0 0 18px;
}

.d-issues-list {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    flex-direction: column;
    gap: 14px;
}

.d-issues-item {
    display: flex;
    align-items: flex-start;
    gap: 12px;
}

.d-issues-item .bullet-icon {
    width: 8px;
    height: 8px;
    min-width: 8px;
    background: var(--d-green);
    border-radius: 50%;
    margin-top: 8px;
}

.d-issues-item p {
    margin: 0;
    color: var(--d-muted);
    font-size: 13.5px;
    line-height: 1.55;
}

.d-issues-item strong {
    color: var(--d-navy);
    font-weight: 700;
}

.d-photo-box {
    position: relative;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.12);
    height: 420px;
    background: #000;
}

.d-photo-box img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}

/* =========================================================
   5. WHY CHOOSE US (MINT GREEN CONTAINER)
========================================================= */
.d-choose-section {
    background: var(--d-light-green);
    border-radius: 18px;
    padding: 60px 40px;
}

.d-choose-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
}

.d-choose-card {
    background: #ffffff;
    border-radius: 8px;
    padding: 28px 20px;
    text-align: center;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.04);
    transition: all 0.25s ease;
}

.d-choose-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
}

.d-choose-icon-wrap {
    width: 46px;
    height: 46px;
    margin: 0 auto 16px;
    background: var(--d-green);
    color: #ffffff;
    border-radius: 6px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 22px;
}

.d-choose-card h4 {
    margin: 0 0 10px;
    color: var(--d-navy);
    font-size: 14px;
    font-weight: 800;
    text-transform: uppercase;
    line-height: 1.35;
}

.d-choose-card p {
    margin: 0;
    color: #555555;
    font-size: 13px;
    line-height: 1.6;
}

/* =========================================================
   6. PRICING PACKAGES (3 CARDS)
========================================================= */
.d-price-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 25px;
    max-width: 1020px;
    margin: 0 auto;
}

.d-price-card {
    background: #ffffff;
    border: 1px solid #e4e7eb;
    border-top: 3px solid var(--d-green);
    border-radius: 6px;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
    padding: 30px 22px;
    text-align: center;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    transition: transform 0.25s ease, box-shadow 0.25s ease;
}

.d-price-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 10px 28px rgba(0, 0, 0, 0.1);
}

.d-price-icon {
    font-size: 32px;
    color: var(--d-navy);
    margin-bottom: 12px;
}

.d-price-card h3 {
    margin: 0 0 10px;
    color: var(--d-navy);
    font-size: 17px;
    font-weight: 800;
    text-transform: capitalize;
}

.d-price-amount {
    color: var(--d-green);
    font-size: 36px;
    font-weight: 900;
    line-height: 1;
    margin-bottom: 4px;
}

.d-price-suffix {
    color: #666666;
    font-size: 13px;
    font-weight: 600;
    margin-bottom: 20px;
}

.d-price-features {
    list-style: none;
    padding: 0;
    margin: 0 0 24px;
    text-align: left;
    flex-grow: 1;
}

.d-price-features li {
    padding: 9px 0;
    border-bottom: 1px solid #f0f2f5;
    color: #444444;
    font-size: 13.5px;
    display: flex;
    align-items: center;
    gap: 8px;
}

.d-price-features li i {
    color: var(--d-green);
    font-size: 15px;
}

.d-price-btn {
    display: block;
    width: 100%;
    padding: 12px;
    background: var(--d-green);
    color: #ffffff !important;
    text-decoration: none;
    font-size: 14px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    border-radius: 4px;
    transition: background 0.2s ease;
}

.d-price-btn:hover {
    background: var(--d-green-dark);
}

/* =========================================================
   7. SCHEDULE CTA (ENLARGED)
========================================================= */
.d-cta {
    position: relative;
    min-height: 540px;
    display: flex;
    align-items: center;
    background:
        linear-gradient(
            90deg,
            rgba(4, 43, 75, 0.96) 0%,
            rgba(4, 43, 75, 0.88) 50%,
            rgba(4, 43, 75, 0.30) 100%
        ),
        url("{{ asset('images/dilapidation-cta.jpeg') }}") center right / cover no-repeat;
    color: #ffffff;
    padding: 105px 0;
}

.d-cta-content {
    max-width: 820px;
    color: #fff;
    padding: 0;
}

.d-cta-content h2 {
    margin: 0 0 20px;
    font-size: clamp(30px, 4vw, 46px);
    line-height: 1.2;
    font-weight: 900;
    text-transform: uppercase;
    color: #fff;
    letter-spacing: 0.5px;
}

.d-cta-content p {
    margin: 0 0 32px;
    color: rgba(255, 255, 255, 0.96);
    font-size: 17.5px;
    line-height: 1.85;
}

.d-cta-content .d-btn-green {
    padding: 16px 38px;
    font-size: 15.5px;
    font-weight: 800;
    letter-spacing: 0.6px;
}

/* =========================================================
   8. CLIENT FEEDBACK & REVIEWS
========================================================= */
.d-review-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 24px;
}

.d-review-card {
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

.d-review-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
}

.d-review-icon {
    font-size: 26px;
    color: #1b9eea;
    margin-bottom: 12px;
}

.d-review-card p {
    color: var(--d-muted);
    font-size: 13.5px;
    line-height: 1.65;
    margin: 0 0 16px;
    flex-grow: 1;
}

.d-review-stars {
    color: #ffb400;
    font-size: 15px;
    margin-bottom: 10px;
    letter-spacing: 2px;
}

.d-review-card h4 {
    margin: 0;
    color: var(--d-navy);
    font-size: 15px;
    font-weight: 800;
}

/* =========================================================
   9. FAQS SECTION (ACCORDION)
========================================================= */
.d-faq-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
    align-items: start;
}

.d-faq-col {
    display: flex;
    flex-direction: column;
    gap: 16px;
}

.d-faq-item {
    background: #ffffff;
    border: 1px solid #e4e7eb;
    border-radius: 6px;
    overflow: hidden;
    transition: all 0.2s ease;
}

.d-faq-question {
    width: 100%;
    padding: 16px 20px;
    background: #f8fafc;
    border: 0;
    text-align: left;
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 12px;
    color: var(--d-navy);
    font-size: 14.5px;
    font-weight: 800;
    cursor: pointer;
    transition: background 0.2s ease, color 0.2s ease;
}

.d-faq-question span {
    flex-grow: 1;
    line-height: 1.4;
}

.d-faq-icon {
    font-size: 14px;
    color: var(--d-green);
    transition: transform 0.3s ease;
}

.d-faq-answer {
    padding: 0 20px;
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.3s ease, padding 0.3s ease;
    color: var(--d-muted);
    font-size: 13.5px;
    line-height: 1.65;
    background: #ffffff;
}

/* Active State (Q1 & Q4 by default) */
.d-faq-item.active .d-faq-question {
    background: var(--d-green);
    color: #ffffff;
}

.d-faq-item.active .d-faq-icon {
    color: #ffffff;
    transform: rotate(180deg);
}

.d-faq-item.active .d-faq-answer {
    padding: 16px 20px 20px;
    max-height: 300px;
}

/* Responsive */
@media (max-width: 991px) {
    .d-hero-inner,
    .d-welcome-grid,
    .d-issues-grid {
        grid-template-columns: 1fr;
        gap: 35px;
    }

    .d-choose-grid {
        grid-template-columns: repeat(2, 1fr);
    }

    .d-price-grid {
        grid-template-columns: 1fr;
        max-width: 450px;
    }

    .d-review-grid {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 767px) {
    .d-section {
        padding: 50px 0;
    }

    .d-form-row,
    .d-matters-grid,
    .d-faq-grid {
        grid-template-columns: 1fr;
    }

    .d-choose-section {
        padding: 35px 20px;
    }

    .d-choose-grid {
        grid-template-columns: 1fr;
    }

    .d-photo-box {
        height: 320px;
    }
}
</style>

<div class="d-page">

    {{-- =====================================================
         1. HERO SECTION & QUICK QUOTE FORM
    ====================================================== --}}
    <section class="d-hero">
        <div class="d-container">
            <div class="d-hero-inner">

                {{-- Left Content --}}
                <div class="d-hero-content">
                    <span class="d-hero-badge">PREMIUM BUILDING & PEST INSPECTIONS</span>
                    <h1>DILAPIDATION INSPECTION - COMPREHENSIVE REPORTS</h1>
                    <p class="d-hero-sub">Protect Your Property with Professional Dilapidation Inspections in Melbourne</p>

                    <div>
                        <a href="tel:0466001551" class="d-btn-green">
                            <i class="bi bi-telephone-fill"></i>
                            0466 001 551
                        </a>
                    </div>
                </div>

                {{-- Right Form --}}
                <div id="quote-form" class="d-hero-form">
                    <h3>GET QUICK QUOTE</h3>

                    @if(session('success'))
                        <div class="alert alert-success py-2 mb-3" style="font-size: 13.5px;">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('quote.store') }}" method="POST">
                        @csrf

                        <div class="d-form-row">
                            <input type="text" name="name" placeholder="Name *" value="{{ old('name') }}" required>
                            <input type="email" name="email" placeholder="Email *" value="{{ old('email') }}" required>
                        </div>

                        <div class="d-form-row">
                            <input type="tel" name="phone" placeholder="Phone *" value="{{ old('phone') }}" required>
                            <input type="text" name="property_address" placeholder="Property Address" value="{{ old('property_address') }}">
                        </div>

                        <select name="service_type" required>
                            <option value="dilapidation-report" selected>Dilapidation Report</option>
                            <option value="pre-purchase-building-and-pest-inspection">Pre-Purchase Building and Pest Inspection</option>
                            <option value="building-stage-by-stage-inspection">Building Stage by Stage Inspection</option>
                            <option value="apartment-building-inspection">Apartment Building Inspection</option>
                            <option value="rising-damp-inspection">Rising Damp Inspection</option>
                            <option value="pool-barrier-inspection">Pool Barrier Inspection</option>
                            <option value="new-build-handover-inspection">New Build Handover Inspection</option>
                            <option value="vendor-inspection">Vendor Inspection</option>
                            <option value="builders-warranty-inspection">Builders Warranty Inspection</option>
                        </select>

                        <div class="d-form-row" style="margin-top: 12px; margin-bottom: 0;">
                            <input type="date" name="preferred_date" placeholder="Inspection Date">
                            <input type="text" name="notes" placeholder="Notes (e.g. Nearby construction)">
                        </div>

                        <textarea name="message" placeholder="Message / Details (e.g. Pre-construction condition, Neighboring works)">{{ old('message') }}</textarea>

                        <button type="submit" class="d-submit-btn">
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
    <section class="d-section d-welcome">
        <div class="d-container">
            <div class="d-welcome-grid">

                {{-- Left Content --}}
                <div class="d-welcome-content">
                    <span class="d-badge">WELCOME TO PREMIUM BUILDING & PEST INSPECTIONS</span>
                    <h2>Welcome to Premium Building & Pest Inspections</h2>

                    <p>
                        A Dilapidation Inspection is an essential service for property owners, builders, and developers before commencing any nearby construction or renovation. Our expert team in Melbourne provides comprehensive dilapidation reports that document the existing condition of a property, helping to protect against any false claims of damage during or after nearby works.
                    </p>

                    <p>
                        Our comprehensive dilapidation reports provide valuable documentation that can assist with risk management, project planning, and dispute prevention.
                    </p>

                    <p style="font-weight: 700; color: var(--d-navy); margin-bottom: 12px;">We Offer:</p>

                    <div class="d-feature-list">
                        <div class="d-feature-item">
                            <div class="d-feature-icon">
                                <i class="bi bi-search"></i>
                            </div>
                            <div>
                                <h4>COMPREHENSIVE VISUAL INSPECTION</h4>
                                <p>Our inspectors conduct a detailed assessment of accessible internal and external building elements, including walls, ceilings, floors, driveways, pathways, fences, retaining walls, and surrounding structures.</p>
                            </div>
                        </div>

                        <div class="d-feature-item">
                            <div class="d-feature-icon">
                                <i class="bi bi-search"></i>
                            </div>
                            <div>
                                <h4>DETAILED PHOTOGRAPHIC EVIDENCE</h4>
                                <p>High-quality photographs are taken throughout the inspection to document the existing condition of building components, visible defects, and areas that may be affected by future construction activities.</p>
                            </div>
                        </div>

                        <div class="d-feature-item">
                            <div class="d-feature-icon">
                                <i class="bi bi-search"></i>
                            </div>
                            <div>
                                <h4>CLEAR DOCUMENTATION</h4>
                                <p>A comprehensive report is prepared outlining the property's condition, including visible cracking, movement, deterioration, and other notable observations at the time of inspection.</p>
                            </div>
                        </div>

                        <div class="d-feature-item">
                            <div class="d-feature-icon">
                                <i class="bi bi-search"></i>
                            </div>
                            <div>
                                <h4>VENTILATION AND HVAC SYSTEMS</h4>
                                <p>We inspect the heating, ventilation, and air conditioning systems (HVAC) to ensure efficient operation and compliance with energy standards.</p>
                            </div>
                        </div>
                    </div>

                    <div>
                        <a href="#quote-form" class="d-btn-green">
                            Schedule Inspection Now
                        </a>
                    </div>
                </div>

                {{-- Right Inspector Card --}}
                <div class="d-welcome-card-col">
                    <div class="d-inspector-card">
                        <div class="d-inspector-header">
                            YOUR INSPECTOR
                        </div>

                        <img src="{{ asset('images/ronak gami.jpeg') }}" alt="Ronak Gami - Registered Building Inspector">

                        <div class="d-inspector-body">
                            <h4>Ronak Gami, vba lic No: IN-PS 74654, Builder Lic No: DB-L 100200</h4>
                            <a href="tel:0466001551" class="d-inspector-call">
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
         3. WHY DILAPIDATION INSPECTIONS ARE IMPORTANT
    ====================================================== --}}
    <section class="d-section d-important-section" style="padding-top: 10px;">
        <div class="d-container">

            <div class="d-heading-center">
                <h2>WHY DILAPIDATION INSPECTIONS ARE IMPORTANT?</h2>
            </div>

            <div class="d-matters-grid">

                <div class="d-matters-card">
                    <div class="d-matters-icon">✓</div>
                    <p>
                        <strong>Legal Protection:</strong> A dilapidation report acts as a legal document to resolve any disputes if claims of damage arise after construction. It safeguards you from unwarranted liability and ensures clear evidence of the property’s original condition.
                    </p>
                </div>

                <div class="d-matters-card">
                    <div class="d-matters-icon">✓</div>
                    <p>
                        <strong>Risk Assessment:</strong> By conducting a thorough inspection, potential risks or weak points in the structure can be identified, giving you a better understanding of any areas that may need reinforcement before construction begins nearby.
                    </p>
                </div>

                <div class="d-matters-card">
                    <div class="d-matters-icon">✓</div>
                    <p>
                        <strong>Support Project Planning:</strong> Identifying existing defects and vulnerable areas allows stakeholders to better understand potential risks associated with nearby construction activities.
                    </p>
                </div>

                <div class="d-matters-card">
                    <div class="d-matters-icon">✓</div>
                    <p>
                        <strong>Compliance with Local Regulations:</strong> In Melbourne, conducting a Dilapidation Inspection aligns with guidelines from the VBA and local councils, especially in high-risk construction zones.
                    </p>
                </div>

            </div>

        </div>
    </section>


    {{-- =====================================================
         4. COMMON ISSUES FOUND DURING DILAPIDATION INSPECTIONS
    ====================================================== --}}
    <section class="d-section d-issues">
        <div class="d-container">
            <div class="d-issues-grid">

                {{-- Left Content --}}
                <div class="d-issues-content">
                    <h2>COMMON ISSUES FOUND DURING DILAPIDATION INSPECTIONS</h2>

                    <p>During Dilapidation Inspections, we often identify several pre-existing issues that can be exacerbated by nearby construction work:</p>

                    <ul class="d-issues-list">
                        <li class="d-issues-item">
                            <span class="bullet-icon"></span>
                            <p><strong>Cracks in Walls and Ceilings:</strong> Small hairline cracks or larger structural cracks can worsen during construction due to vibrations or ground movement.</p>
                        </li>

                        <li class="d-issues-item">
                            <span class="bullet-icon"></span>
                            <p><strong>Settlement Issues:</strong> Signs of ground movement, such as uneven floors or doors not closing properly, may indicate existing settlement problems.</p>
                        </li>

                        <li class="d-issues-item">
                            <span class="bullet-icon"></span>
                            <p><strong>Water Damage or Dampness:</strong> Water leaks, damp patches, or drainage issues that are already present can become more severe if not addressed prior to construction.</p>
                        </li>

                        <li class="d-issues-item">
                            <span class="bullet-icon"></span>
                            <p><strong>Fencing and Boundary Issues:</strong> Fences, retaining walls, or external structures may be vulnerable to movement or damage during excavation or heavy machinery use.</p>
                        </li>

                        <li class="d-issues-item">
                            <span class="bullet-icon"></span>
                            <p><strong>Roof and Guttering Issues:</strong> Pre-existing leaks or poor drainage in roof areas can be impacted by construction dust, debris, or vibrations.</p>
                        </li>
                    </ul>
                </div>

                {{-- Right Photo --}}
                <div class="d-photo-box">
                    <img src="{{ asset('images/dilapidation-inspection.jpg') }}" alt="Ronak Gami inspecting timber wall framing">
                </div>

            </div>
        </div>
    </section>


    {{-- =====================================================
         5. WHY CHOOSE US (MINT GREEN SECTION)
    ====================================================== --}}
    <section class="d-section" style="padding-top: 10px;">
        <div class="d-container">
            <div class="d-choose-section">

                <div class="d-heading-center">
                    <span class="d-badge">WHY CHOOSE US</span>
                    <h2>WHY CHOOSE US FOR YOUR DILAPIDATION BUILDING INSPECTION?</h2>
                </div>

                <div class="d-choose-grid">

                    <div class="d-choose-card">
                        <div class="d-choose-icon-wrap">
                            <i class="bi bi-shield-check"></i>
                        </div>
                        <h4>Expert Inspectors with Local Knowledge</h4>
                        <p>Our team is fully licensed and accredited, with in-depth knowledge of the VBA standards and Melbourne building regulations. We ensure that every inspection meets the highest standards of accuracy.</p>
                    </div>

                    <div class="d-choose-card">
                        <div class="d-choose-icon-wrap">
                            <i class="bi bi-patch-check"></i>
                        </div>
                        <h4>Unbiased and Independent</h4>
                        <p>We provide impartial inspections with no vested interest in the outcome, ensuring you receive a fair and accurate report.</p>
                    </div>

                    <div class="d-choose-card">
                        <div class="d-choose-icon-wrap">
                            <i class="bi bi-clock-history"></i>
                        </div>
                        <h4>Fast Turnaround Times</h4>
                        <p>We understand the urgency of dilapidation inspections, particularly when construction schedules are involved. We offer fast booking options and ensure timely delivery of your report.</p>
                    </div>

                    <div class="d-choose-card">
                        <div class="d-choose-icon-wrap">
                            <i class="bi bi-tag-fill"></i>
                        </div>
                        <h4>Competitive Pricing</h4>
                        <p>We offer transparent and competitive pricing for all our dilapidation inspection services, ensuring you receive the best value without any hidden fees.</p>
                    </div>

                </div>

            </div>
        </div>
    </section>


    {{-- =====================================================
         6. CHOOSE PACKAGE / ENSURE SAFETY AND COMPLIANCE (PRICING)
    ====================================================== --}}
    <section class="d-section">
        <div class="d-container">

            <div class="d-heading-center">
                <span class="d-badge">CHOOSE PACKAGE</span>
                <h2>ENSURE SAFETY AND COMPLIANCE</h2>
            </div>

            <div class="d-price-grid">

                {{-- CARD 1: 2 BEDROOM --}}
                <div class="d-price-card">
                    <div>
                        <div class="d-price-icon">
                            <i class="bi bi-house-door"></i>
                        </div>
                        <h3>2 bed room</h3>

                        <div class="d-price-amount">$400</div>
                        <div class="d-price-suffix">+GST /Starting</div>

                        <ul class="d-price-features">
                            <li><i class="bi bi-check-square-fill"></i> Comprehensive Inspection</li>
                            <li><i class="bi bi-check-square-fill"></i> Report &amp; Consultation</li>
                        </ul>
                    </div>

                    <a href="#quote-form" class="d-price-btn">
                        GET STARTED
                    </a>
                </div>

                {{-- CARD 2: 3 BEDROOM --}}
                <div class="d-price-card">
                    <div>
                        <div class="d-price-icon">
                            <i class="bi bi-house-door"></i>
                        </div>
                        <h3>3 bed room</h3>

                        <div class="d-price-amount">$450</div>
                        <div class="d-price-suffix">+GST /Starting</div>

                        <ul class="d-price-features">
                            <li><i class="bi bi-check-square-fill"></i> Comprehensive Inspection</li>
                            <li><i class="bi bi-check-square-fill"></i> Report &amp; Consultation</li>
                        </ul>
                    </div>

                    <a href="#quote-form" class="d-price-btn">
                        GET STARTED
                    </a>
                </div>

                {{-- CARD 3: 4 BEDROOM --}}
                <div class="d-price-card">
                    <div>
                        <div class="d-price-icon">
                            <i class="bi bi-building"></i>
                        </div>
                        <h3>4 bed room</h3>

                        <div class="d-price-amount">$525</div>
                        <div class="d-price-suffix">+GST /Starting</div>

                        <ul class="d-price-features">
                            <li><i class="bi bi-check-square-fill"></i> Comprehensive Inspection</li>
                            <li><i class="bi bi-check-square-fill"></i> Report &amp; Consultation</li>
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
         7. SCHEDULE CTA (ENLARGED)
    ====================================================== --}}
    <section class="d-cta">
        <div class="d-container">
            <div class="d-cta-content">
                <h2>ENSURE YOUR PROPERTY IS PROTECTED WITH A PROFESSIONAL INSPECTION</h2>

                <p>
                    Don’t leave your property vulnerable to disputes or damage during nearby construction projects. Our Dilapidation Inspection service in Melbourne offers detailed documentation and expert assessments that protect your interests and provide legal peace of mind. Book your inspection today to safeguard your property.
                </p>

                <a href="#quote-form" class="d-btn-green">
                    Schedule your inspection now
                </a>
            </div>
        </div>
    </section>


    {{-- =====================================================
         8. CLIENT FEEDBACK & REVIEWS
    ====================================================== --}}
    <section class="d-section d-reviews">
        <div class="d-container">

            <div class="d-heading-center">
                <span class="d-badge">TESTIMONIAL</span>
                <h2>CLIENT FEEDBACK & REVIEWS</h2>
            </div>

            <div class="d-review-grid">

                <div class="d-review-card">
                    <div class="d-review-icon">
                        <i class="bi bi-chat-quote"></i>
                    </div>
                    <p>
                        Very professional and approachable. The property inspection was done thoroughly, and even minor defects were identified. Really appreciate the attention to detail and commitment to the job. Highly recommended for any building inspection.
                    </p>
                    <div class="d-review-stars">★★★★★</div>
                    <h4>Swathi Tarini</h4>
                </div>

                <div class="d-review-card">
                    <div class="d-review-icon">
                        <i class="bi bi-chat-quote"></i>
                    </div>
                    <p>
                        Took generous time to answer all my questions regarding the property's condition and report. Very kind, humble, and helpful. Highly recommended for anyone needing a building and pest inspection
                    </p>
                    <div class="d-review-stars">★★★★★</div>
                    <h4>Luxmy</h4>
                </div>

                <div class="d-review-card">
                    <div class="d-review-icon">
                        <i class="bi bi-chat-quote"></i>
                    </div>
                    <p>
                        Provided an excellent inspection for the property I'm purchasing. All findings were explained clearly, and the report was prepared on the same day. Warm, professional, and efficient. Highly recommended to friends and family.
                    </p>
                    <div class="d-review-stars">★★★★★</div>
                    <h4>Shaleen De Silva</h4>
                </div>

                <div class="d-review-card">
                    <div class="d-review-icon">
                        <i class="bi bi-chat-quote"></i>
                    </div>
                    <p>
                        Extremely helpful and responsive. The building and pest inspection was completed quickly, and the report was delivered exactly as requested. Smooth and professional experience overall— great service!
                    </p>
                    <div class="d-review-stars">★★★★★</div>
                    <h4>Niresh Wijesiri</h4>
                </div>

                <div class="d-review-card">
                    <div class="d-review-icon">
                        <i class="bi bi-chat-quote"></i>
                    </div>
                    <p>
                        Very thorough and professional during my pre-purchase building and pest inspection. Strongly recommended.
                    </p>
                    <div class="d-review-stars">★★★★★</div>
                    <h4>Max</h4>
                </div>

                <div class="d-review-card">
                    <div class="d-review-icon">
                        <i class="bi bi-chat-quote"></i>
                    </div>
                    <p>
                        Amazing experience. Quick replies, prompt actions, and a positive attitude. Would definitely recommend 👏👏👏
                    </p>
                    <div class="d-review-stars">★★★★★</div>
                    <h4>Heena Bhavsar</h4>
                </div>

            </div>

        </div>
    </section>


    {{-- =====================================================
         9. FREQUENTLY ASKED QUESTIONS (FAQ)
    ====================================================== --}}
    <section class="d-section d-faq" style="background: #ffffff; padding-top: 10px;">
        <div class="d-container">

            <div class="d-heading-center">
                <span class="d-badge">COMMON QUESTIONS</span>
                <h2>MOST POPULAR QUESTIONS</h2>
            </div>

            <div class="d-faq-grid">

                {{-- COLUMN 1 --}}
                <div class="d-faq-col">

                    {{-- FAQ 1 (Active by default) --}}
                    <div class="d-faq-item active">
                        <button class="d-faq-question" type="button" onclick="toggleDFaq(this)">
                            <span>1. What is a Dilapidation Inspection?</span>
                            <i class="bi bi-chevron-down d-faq-icon"></i>
                        </button>
                        <div class="d-faq-answer">
                            A dilapidation inspection documents the current condition of a property before nearby construction or renovation work begins. It provides a detailed report that can be used to protect against claims of damage.
                        </div>
                    </div>

                    {{-- FAQ 2 --}}
                    <div class="d-faq-item">
                        <button class="d-faq-question" type="button" onclick="toggleDFaq(this)">
                            <span>2. Why do I need a dilapidation inspection?</span>
                            <i class="bi bi-chevron-down d-faq-icon"></i>
                        </button>
                        <div class="d-faq-answer">
                            If you own property near a construction site, a dilapidation inspection helps protect you from false claims of damage by providing proof of the property's condition before works start.
                        </div>
                    </div>

                    {{-- FAQ 3 --}}
                    <div class="d-faq-item">
                        <button class="d-faq-question" type="button" onclick="toggleDFaq(this)">
                            <span>3. How long does a dilapidation inspection take?</span>
                            <i class="bi bi-chevron-down d-faq-icon"></i>
                        </button>
                        <div class="d-faq-answer">
                            Typically, the inspection takes between 1 to 2 hours depending on the size of the property. We deliver a detailed report within 24 to 48 hours after the inspection.
                        </div>
                    </div>

                </div>

                {{-- COLUMN 2 --}}
                <div class="d-faq-col">

                    {{-- FAQ 4 (Active by default) --}}
                    <div class="d-faq-item active">
                        <button class="d-faq-question" type="button" onclick="toggleDFaq(this)">
                            <span>4. What does the dilapidation report include?</span>
                            <i class="bi bi-chevron-down d-faq-icon"></i>
                        </button>
                        <div class="d-faq-answer">
                            The report includes a written summary of the property’s condition, high-resolution photos, annotations highlighting defects or areas of concern, and recommendations for any vulnerable areas.
                        </div>
                    </div>

                    {{-- FAQ 5 --}}
                    <div class="d-faq-item">
                        <button class="d-faq-question" type="button" onclick="toggleDFaq(this)">
                            <span>5. Is a dilapidation report legally binding?</span>
                            <i class="bi bi-chevron-down d-faq-icon"></i>
                        </button>
                        <div class="d-faq-answer">
                            Yes, a dilapidation report can serve as a legal document in case of any disputes over property damage, providing clear evidence of the pre-construction condition of the property.
                        </div>
                    </div>

                    {{-- FAQ 6 --}}
                    <div class="d-faq-item">
                        <button class="d-faq-question" type="button" onclick="toggleDFaq(this)">
                            <span>6. What areas do you inspect?</span>
                            <i class="bi bi-chevron-down d-faq-icon"></i>
                        </button>
                        <div class="d-faq-answer">
                            We inspect all accessible areas of the property, including internal rooms, external walls, fences, driveways, retaining walls, and roofing.
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </section>

</div>

<script>
// FAQ Accordion Toggle
function toggleDFaq(btn) {
    const item = btn.closest('.d-faq-item');
    const col = item.closest('.d-faq-col');
    const allInCol = col.querySelectorAll('.d-faq-item');
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