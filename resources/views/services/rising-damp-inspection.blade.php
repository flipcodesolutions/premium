@extends('layouts.app')

@section('title', 'Professional Rising Damp Inspection Services In Melbourne | Premium Building & Pest Inspections')

@section('content')

<style>
/* =========================================================
   RISING DAMP INSPECTION PAGE STYLES
   1:1 Pixel-Perfect Match with Reference Screenshot & Live Site
========================================================= */

:root {
    --rd-navy: #073763;
    --rd-navy-dark: #052646;
    --rd-green: #42a900;
    --rd-green-dark: #358c00;
    --rd-light-green: #eef7ed;
    --rd-text: #333333;
    --rd-muted: #555555;
    --rd-border: #e2e8f0;
}

.rd-page {
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
    color: var(--rd-text);
    overflow-x: hidden;
    position: relative;
    background: #ffffff;
}

.rd-container {
    width: 92%;
    max-width: 1180px;
    margin: 0 auto;
}

.rd-section {
    padding: 70px 0;
}

/* Headings */
.rd-badge {
    display: inline-block;
    color: var(--rd-green);
    font-size: 13.5px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 1.2px;
    margin-bottom: 8px;
}

.rd-heading-center {
    text-align: center;
    margin-bottom: 40px;
}

.rd-heading-center h2 {
    margin: 0;
    color: var(--rd-navy);
    font-size: clamp(24px, 3.2vw, 34px);
    line-height: 1.25;
    font-weight: 900;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.rd-heading-center p {
    max-width: 720px;
    margin: 12px auto 0;
    color: var(--rd-muted);
    font-size: 15px;
    line-height: 1.7;
}

/* Buttons */
.rd-btn-green {
    display: inline-flex;
    justify-content: center;
    align-items: center;
    gap: 8px;
    padding: 13px 28px;
    background: var(--rd-green);
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

.rd-btn-green:hover {
    background: var(--rd-green-dark);
    transform: translateY(-2px);
    box-shadow: 0 8px 22px rgba(66, 169, 0, 0.35);
}

/* =========================================================
   1. HERO SECTION
========================================================= */
.rd-hero {
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

.rd-hero-inner {
    display: grid;
    grid-template-columns: 1.15fr 0.85fr;
    gap: 45px;
    align-items: center;
    padding: 50px 0 60px;
}

.rd-hero-content .rd-hero-badge {
    color: rgba(255, 255, 255, 0.9);
    font-size: 13px;
    font-weight: 800;
    letter-spacing: 1.5px;
    text-transform: uppercase;
    display: block;
    margin-bottom: 12px;
}

.rd-hero-content h1 {
    font-size: clamp(28px, 3.8vw, 44px);
    line-height: 1.18;
    font-weight: 900;
    color: #ffffff;
    margin: 0 0 16px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.rd-hero-content .rd-hero-sub {
    color: rgba(255, 255, 255, 0.95);
    font-size: 17px;
    line-height: 1.6;
    margin: 0 0 26px;
    font-weight: 500;
}

/* Hero Form */
.rd-hero-form {
    background: #ffffff;
    border-radius: 8px;
    padding: 26px 24px;
    box-shadow: 0 12px 35px rgba(0, 0, 0, 0.28);
    color: var(--rd-text);
}

.rd-hero-form h3 {
    margin: 0 0 16px;
    color: var(--rd-navy);
    font-size: 19px;
    font-weight: 900;
    text-transform: uppercase;
    text-align: center;
    letter-spacing: 0.5px;
}

.rd-form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 12px;
    margin-bottom: 12px;
}

.rd-hero-form input,
.rd-hero-form select,
.rd-hero-form textarea {
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

.rd-hero-form input:focus,
.rd-hero-form select:focus,
.rd-hero-form textarea:focus {
    border-color: var(--rd-green);
    box-shadow: 0 0 0 3px rgba(66, 169, 0, 0.15);
}

.rd-hero-form textarea {
    resize: vertical;
    min-height: 75px;
    margin-top: 12px;
}

.rd-hero-form .rd-submit-btn {
    width: 100%;
    padding: 13px;
    background: var(--rd-green);
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

.rd-hero-form .rd-submit-btn:hover {
    background: var(--rd-green-dark);
}

/* =========================================================
   2. WELCOME SECTION + INSPECTOR CARD
========================================================= */
.rd-welcome-grid {
    display: grid;
    grid-template-columns: 1.15fr 0.85fr;
    gap: 50px;
    align-items: start;
}

.rd-welcome-content h2 {
    color: var(--rd-navy);
    font-size: clamp(24px, 3vw, 32px);
    font-weight: 900;
    text-transform: uppercase;
    line-height: 1.25;
    margin: 0 0 16px;
}

.rd-welcome-content p {
    color: var(--rd-muted);
    font-size: 14.5px;
    line-height: 1.7;
    margin: 0 0 14px;
}

.rd-feature-list {
    margin: 22px 0 28px;
    display: flex;
    flex-direction: column;
    gap: 16px;
}

.rd-feature-item {
    display: flex;
    align-items: flex-start;
    gap: 15px;
}

.rd-feature-icon {
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

.rd-feature-item h4 {
    margin: 0 0 4px;
    color: var(--rd-navy);
    font-size: 14px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 0.4px;
}

.rd-feature-item p {
    margin: 0;
    color: var(--rd-muted);
    font-size: 13.5px;
    line-height: 1.55;
}

/* Inspector Card */
.rd-inspector-card {
    background: #ffffff;
    border: 1px solid #e5e9f0;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
    text-align: center;
}

.rd-inspector-header {
    background: #000000;
    color: #ffffff;
    padding: 10px 14px;
    font-size: 13.5px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.rd-inspector-card img {
    width: 100%;
    height: 360px;
    object-fit: cover;
    object-position: center top;
    display: block;
}

.rd-inspector-body {
    padding: 18px 20px;
}

.rd-inspector-body h4 {
    margin: 0 0 14px;
    color: var(--rd-navy);
    font-size: 13px;
    font-weight: 800;
    line-height: 1.5;
    text-transform: uppercase;
}

.rd-inspector-call {
    display: block;
    width: 100%;
    padding: 12px;
    background: var(--rd-green);
    color: #ffffff !important;
    text-decoration: none;
    border-radius: 4px;
    font-size: 15px;
    font-weight: 800;
    letter-spacing: 0.5px;
    transition: background 0.2s ease;
}

.rd-inspector-call:hover {
    background: var(--rd-green-dark);
}

/* =========================================================
   3. WHY RISING DAMP INSPECTIONS ARE IMPORTANT
========================================================= */
.rd-important-section {
    background: #ffffff;
}

.rd-matters-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 18px;
}

.rd-matters-card {
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

.rd-matters-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 18px rgba(0, 0, 0, 0.07);
    border-color: #cbd5e1;
}

.rd-matters-icon {
    width: 24px;
    height: 24px;
    min-width: 24px;
    background: var(--rd-green);
    color: #ffffff;
    border-radius: 4px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 13px;
    font-weight: 900;
    margin-top: 2px;
}

.rd-matters-card p {
    margin: 0;
    color: var(--rd-muted);
    font-size: 13.5px;
    line-height: 1.6;
}

.rd-matters-card strong {
    color: var(--rd-navy);
    font-weight: 700;
}

/* =========================================================
   4. COMMON RISING DAMP ISSUES WE FIND
========================================================= */
.rd-issues-grid {
    display: grid;
    grid-template-columns: 1.15fr 0.85fr;
    gap: 45px;
    align-items: center;
}

.rd-issues-content h2 {
    color: var(--rd-navy);
    font-size: clamp(22px, 2.8vw, 30px);
    font-weight: 900;
    text-transform: uppercase;
    line-height: 1.25;
    margin: 0 0 14px;
}

.rd-issues-content > p {
    color: var(--rd-muted);
    font-size: 14.5px;
    line-height: 1.6;
    margin: 0 0 18px;
}

.rd-issues-list {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    flex-direction: column;
    gap: 14px;
}

.rd-issues-item {
    display: flex;
    align-items: flex-start;
    gap: 12px;
}

.rd-issues-item .bullet-icon {
    width: 8px;
    height: 8px;
    min-width: 8px;
    background: var(--rd-green);
    border-radius: 50%;
    margin-top: 8px;
}

.rd-issues-item p {
    margin: 0;
    color: var(--rd-muted);
    font-size: 13.5px;
    line-height: 1.55;
}

.rd-issues-item strong {
    color: var(--rd-navy);
    font-weight: 700;
}

.rd-photo-box {
    position: relative;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.12);
    height: 420px;
    background: #000;
}

.rd-photo-box img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}

/* =========================================================
   5. WHY CHOOSE US (MINT GREEN CONTAINER)
========================================================= */
.rd-choose-section {
    background: var(--rd-light-green);
    border-radius: 18px;
    padding: 60px 40px;
}

.rd-choose-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
}

.rd-choose-card {
    background: #ffffff;
    border-radius: 8px;
    padding: 28px 20px;
    text-align: center;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.04);
    transition: all 0.25s ease;
}

.rd-choose-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
}

.rd-choose-icon-wrap {
    width: 46px;
    height: 46px;
    margin: 0 auto 16px;
    background: var(--rd-green);
    color: #ffffff;
    border-radius: 6px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 22px;
}

.rd-choose-card h4 {
    margin: 0 0 10px;
    color: var(--rd-navy);
    font-size: 14px;
    font-weight: 800;
    text-transform: uppercase;
    line-height: 1.35;
}

.rd-choose-card p {
    margin: 0;
    color: #555555;
    font-size: 13px;
    line-height: 1.6;
}

/* =========================================================
   6. PRICING PACKAGES (3 CARDS)
========================================================= */
.rd-price-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 25px;
    max-width: 1020px;
    margin: 0 auto;
}

.rd-price-card {
    background: #ffffff;
    border: 1px solid #e4e7eb;
    border-top: 3px solid var(--rd-green);
    border-radius: 6px;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
    padding: 30px 22px;
    text-align: center;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    transition: transform 0.25s ease, box-shadow 0.25s ease;
}

.rd-price-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 10px 28px rgba(0, 0, 0, 0.1);
}

.rd-price-icon {
    font-size: 32px;
    color: var(--rd-navy);
    margin-bottom: 12px;
}

.rd-price-card h3 {
    margin: 0 0 10px;
    color: var(--rd-navy);
    font-size: 17px;
    font-weight: 800;
    text-transform: capitalize;
}

.rd-price-amount {
    color: var(--rd-green);
    font-size: 36px;
    font-weight: 900;
    line-height: 1;
    margin-bottom: 4px;
}

.rd-price-suffix {
    color: #666666;
    font-size: 13px;
    font-weight: 600;
    margin-bottom: 20px;
}

.rd-price-features {
    list-style: none;
    padding: 0;
    margin: 0 0 24px;
    text-align: left;
    flex-grow: 1;
}

.rd-price-features li {
    padding: 9px 0;
    border-bottom: 1px solid #f0f2f5;
    color: #444444;
    font-size: 13.5px;
    display: flex;
    align-items: center;
    gap: 8px;
}

.rd-price-features li i {
    color: var(--rd-green);
    font-size: 15px;
}

.rd-price-btn {
    display: block;
    width: 100%;
    padding: 12px;
    background: var(--rd-green);
    color: #ffffff !important;
    text-decoration: none;
    font-size: 14px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    border-radius: 4px;
    transition: background 0.2s ease;
}

.rd-price-btn:hover {
    background: var(--rd-green-dark);
}

/* =========================================================
   7. SCHEDULE CTA (DARK TIMBER BACKGROUND)
========================================================= */
.rd-cta {
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

.rd-cta-inner {
    max-width: 820px;
}

.rd-cta h2 {
    color: #ffffff;
    font-size: clamp(30px, 4vw, 46px);
    font-weight: 900;
    text-transform: uppercase;
    line-height: 1.2;
    margin: 0 0 20px;
    letter-spacing: 0.5px;
}

.rd-cta p {
    color: rgba(255, 255, 255, 0.96);
    font-size: 17.5px;
    line-height: 1.85;
    margin: 0 0 32px;
}

.rd-cta .rd-btn-green {
    padding: 16px 38px;
    font-size: 15.5px;
    font-weight: 800;
    letter-spacing: 0.6px;
}

/* =========================================================
   8. CLIENT FEEDBACK & REVIEWS
========================================================= */
.rd-review-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 24px;
}

.rd-review-card {
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

.rd-review-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
}

.rd-review-icon {
    font-size: 26px;
    color: #1b9eea;
    margin-bottom: 12px;
}

.rd-review-card p {
    color: var(--rd-muted);
    font-size: 13.5px;
    line-height: 1.65;
    margin: 0 0 16px;
    flex-grow: 1;
}

.rd-review-stars {
    color: #ffb400;
    font-size: 15px;
    margin-bottom: 10px;
    letter-spacing: 2px;
}

.rd-review-card h4 {
    margin: 0;
    color: var(--rd-navy);
    font-size: 15px;
    font-weight: 800;
}

/* =========================================================
   9. FAQS SECTION (ACCORDION)
========================================================= */
.rd-faq-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
    align-items: start;
}

.rd-faq-col {
    display: flex;
    flex-direction: column;
    gap: 16px;
}

.rd-faq-item {
    background: #ffffff;
    border: 1px solid #e4e7eb;
    border-radius: 6px;
    overflow: hidden;
    transition: all 0.2s ease;
}

.rd-faq-question {
    width: 100%;
    padding: 16px 20px;
    background: #f8fafc;
    border: 0;
    text-align: left;
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 12px;
    color: var(--rd-navy);
    font-size: 14.5px;
    font-weight: 800;
    cursor: pointer;
    transition: background 0.2s ease, color 0.2s ease;
}

.rd-faq-question span {
    flex-grow: 1;
    line-height: 1.4;
}

.rd-faq-icon {
    font-size: 14px;
    color: var(--rd-green);
    transition: transform 0.3s ease;
}

.rd-faq-answer {
    padding: 0 20px;
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.3s ease, padding 0.3s ease;
    color: var(--rd-muted);
    font-size: 13.5px;
    line-height: 1.65;
    background: #ffffff;
}

/* Active State (Q1 & Q4 by default) */
.rd-faq-item.active .rd-faq-question {
    background: var(--rd-green);
    color: #ffffff;
}

.rd-faq-item.active .rd-faq-icon {
    color: #ffffff;
    transform: rotate(180deg);
}

.rd-faq-item.active .rd-faq-answer {
    padding: 16px 20px 20px;
    max-height: 300px;
}

/* Responsive */
@media (max-width: 991px) {
    .rd-hero-inner,
    .rd-welcome-grid,
    .rd-issues-grid {
        grid-template-columns: 1fr;
        gap: 35px;
    }

    .rd-choose-grid {
        grid-template-columns: repeat(2, 1fr);
    }

    .rd-price-grid {
        grid-template-columns: 1fr;
        max-width: 450px;
    }

    .rd-review-grid {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 767px) {
    .rd-section {
        padding: 50px 0;
    }

    .rd-form-row,
    .rd-matters-grid,
    .rd-faq-grid {
        grid-template-columns: 1fr;
    }

    .rd-choose-section {
        padding: 35px 20px;
    }

    .rd-choose-grid {
        grid-template-columns: 1fr;
    }

    .rd-photo-box {
        height: 320px;
    }
}
</style>

<div class="rd-page">

    {{-- =====================================================
         1. HERO SECTION & QUICK QUOTE FORM
    ====================================================== --}}
    <section class="rd-hero">
        <div class="rd-container">
            <div class="rd-hero-inner">

                {{-- Left Content --}}
                <div class="rd-hero-content">
                    <span class="rd-hero-badge">PREMIUM BUILDING & PEST INSPECTIONS</span>
                    <h1>PROFESSIONAL RISING DAMP INSPECTION SERVICES IN MELBOURNE</h1>
                    <p class="rd-hero-sub">Comprehensive and Fast Rising Damp Inspection for a Healthy Property</p>

                    <div>
                        <a href="tel:0466001551" class="rd-btn-green">
                            <i class="bi bi-telephone-fill"></i>
                            0466 001 551
                        </a>
                    </div>
                </div>

                {{-- Right Form --}}
                <div id="quote-form" class="rd-hero-form">
                    <h3>GET QUICK QUOTE</h3>

                    @if(session('success'))
                        <div class="alert alert-success py-2 mb-3" style="font-size: 13.5px;">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('quote.store') }}" method="POST">
                        @csrf

                        <div class="rd-form-row">
                            <input type="text" name="name" placeholder="Name *" value="{{ old('name') }}" required>
                            <input type="email" name="email" placeholder="Email *" value="{{ old('email') }}" required>
                        </div>

                        <div class="rd-form-row">
                            <input type="tel" name="phone" placeholder="Phone *" value="{{ old('phone') }}" required>
                            <input type="text" name="property_address" placeholder="Property Address" value="{{ old('property_address') }}">
                        </div>

                        <select name="service_type" required>
                            <option value="rising-damp-inspection" selected>Rising Damp Inspection</option>
                            <option value="pre-purchase-building-and-pest-inspection">Pre-Purchase Building and Pest Inspection</option>
                            <option value="building-stage-by-stage-inspection">Building Stage by Stage Inspection</option>
                            <option value="apartment-building-inspection">Apartment Building Inspection</option>
                            <option value="new-build-handover-inspection">New Build Handover Inspection</option>
                            <option value="pool-barrier-inspection">Pool Barrier Inspection</option>
                            <option value="dilapidation-report">Dilapidation Report</option>
                            <option value="vendor-inspection">Vendor Inspection</option>
                            <option value="builders-warranty-inspection">Builders Warranty Inspection</option>
                        </select>

                        <div class="rd-form-row" style="margin-top: 12px; margin-bottom: 0;">
                            <input type="date" name="preferred_date" placeholder="Inspection Date">
                            <input type="text" name="notes" placeholder="Notes (e.g. Subfloor, Walls)">
                        </div>

                        <textarea name="message" placeholder="Message / Details (e.g. Signs of dampness, peeling paint)">{{ old('message') }}</textarea>

                        <button type="submit" class="rd-submit-btn">
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
    <section class="rd-section rd-welcome">
        <div class="rd-container">
            <div class="rd-welcome-grid">

                {{-- Left Content --}}
                <div class="rd-welcome-content">
                    <span class="rd-badge">WELCOME TO PREMIUM RISING DAMP INSPECTION</span>
                    <h2>Welcome to Premium Rising Damp Inspection</h2>

                    <p>
                        Is your home showing signs of moisture or dampness? Rising damp can compromise the structural integrity of your property. At Premium Building & Pest Inspections, we offer professional Rising Damp Inspections across Melbourne, ensuring compliance with Victorian Building Authority (VBA) guidelines. Our experts use the latest tools to detect moisture problems before they cause significant damage. Get same-day inspections and a detailed report to help safeguard your property.
                    </p>

                    <p style="font-weight: 700; color: var(--rd-navy); margin-bottom: 12px;">We Offer:</p>

                    <div class="rd-feature-list">
                        <div class="rd-feature-item">
                            <div class="rd-feature-icon">
                                <i class="bi bi-search"></i>
                            </div>
                            <div>
                                <h4>RISING DAMP INSPECTION</h4>
                                <p>Identify and assess moisture levels in walls, floors, and subfloor areas. We provide actionable solutions to prevent structural damage.</p>
                            </div>
                        </div>

                        <div class="rd-feature-item">
                            <div class="rd-feature-icon">
                                <i class="bi bi-search"></i>
                            </div>
                            <div>
                                <h4>DAMP PROOFING SOLUTIONS</h4>
                                <p>After our inspection, we offer expert recommendations on damp-proofing treatments that comply with VBA standards.</p>
                            </div>
                        </div>

                        <div class="rd-feature-item">
                            <div class="rd-feature-icon">
                                <i class="bi bi-search"></i>
                            </div>
                            <div>
                                <h4>MOISTURE MEASUREMENT &amp; DETECTION</h4>
                                <p>Using advanced moisture meters and thermal imaging, we measure moisture levels and pinpoint areas of concern..</p>
                            </div>
                        </div>
                    </div>

                    <div>
                        <a href="#quote-form" class="rd-btn-green">
                            Schedule Inspection Now
                        </a>
                    </div>
                </div>

                {{-- Right Inspector Card --}}
                <div class="rd-welcome-card-col">
                    <div class="rd-inspector-card">
                        <div class="rd-inspector-header">
                            YOUR INSPECTOR
                        </div>

                        <img src="{{ asset('images/ronak gami.jpeg') }}" alt="Ronak Gami - Registered Building Inspector">

                        <div class="rd-inspector-body">
                            <h4>Ronak Gami, vba lic No: IN-PS 74654, Builder Lic No: DB-L 100200</h4>
                            <a href="tel:0466001551" class="rd-inspector-call">
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
         3. WHY RISING DAMP INSPECTIONS ARE IMPORTANT
    ====================================================== --}}
    <section class="rd-section rd-important-section" style="padding-top: 10px;">
        <div class="rd-container">

            <div class="rd-heading-center">
                <h2>WHY RISING DAMP INSPECTIONS ARE IMPORTANT</h2>
            </div>

            <div class="rd-matters-grid">

                <div class="rd-matters-card">
                    <div class="rd-matters-icon">✓</div>
                    <p>
                        <strong>Protect Structural Integrity:</strong> Rising damp can damage the foundation and walls of your property, weakening the overall structure if left untreated.
                    </p>
                </div>

                <div class="rd-matters-card">
                    <div class="rd-matters-icon">✓</div>
                    <p>
                        <strong>Ensure Healthy Living Conditions:</strong> Mold and mildew caused by rising damp reduce indoor air quality and pose health risks, particularly for those with allergies or respiratory problems.
                    </p>
                </div>

                <div class="rd-matters-card">
                    <div class="rd-matters-icon">✓</div>
                    <p>
                        <strong>Prevent Expensive Repairs:</strong> Early detection of damp issues helps you avoid costly repairs related to wood rot, mold, and structural deterioration.
                    </p>
                </div>

                <div class="rd-matters-card">
                    <div class="rd-matters-icon">✓</div>
                    <p>
                        <strong>Maintain Property Value:</strong> Addressing rising damp early prevents property devaluation and ensures compliance with Victorian Building Authority guidelines.
                    </p>
                </div>

            </div>

        </div>
    </section>


    {{-- =====================================================
         4. COMMON RISING DAMP ISSUES WE FIND
    ====================================================== --}}
    <section class="rd-section rd-issues">
        <div class="rd-container">
            <div class="rd-issues-grid">

                {{-- Left Content --}}
                <div class="rd-issues-content">
                    <h2>COMMON RISING DAMP ISSUES WE FIND</h2>

                    <p>Through our experience, we often encounter the following problems during Rising Damp inspections:</p>

                    <ul class="rd-issues-list">
                        <li class="rd-issues-item">
                            <span class="bullet-icon"></span>
                            <p><strong>Tide Marks on Walls:</strong> Visible water stains up to one meter above ground level due to moisture traveling through walls.</p>
                        </li>

                        <li class="rd-issues-item">
                            <span class="bullet-icon"></span>
                            <p><strong>Peeling Paint and Wallpaper:</strong> Moisture causes bubbling paint and lifting wallpaper, especially near affected wall bases.</p>
                        </li>

                        <li class="rd-issues-item">
                            <span class="bullet-icon"></span>
                            <p><strong>Cracked or Crumbling Plaster:</strong> Exposure to damp weakens plaster, leading to cracks or crumbling that compromises the wall’s structure.</p>
                        </li>

                        <li class="rd-issues-item">
                            <span class="bullet-icon"></span>
                            <p><strong>Salt Efflorescence:</strong> White, powdery salt deposits form as moisture evaporates, leaving behind crystallized salts on the walls.</p>
                        </li>

                        <li class="rd-issues-item">
                            <span class="bullet-icon"></span>
                            <p><strong>Rotting Timber:</strong> Rising damp causes wood rot in skirting boards and floorboards, leading to damage and the need for replacement.</p>
                        </li>

                        <li class="rd-issues-item">
                            <span class="bullet-icon"></span>
                            <p><strong>Mold and Musty Smells:</strong> Damp conditions encourage mold growth and result in musty odors, especially in poorly ventilated areas.</p>
                        </li>
                    </ul>
                </div>

                {{-- Right Photo --}}
                <div class="rd-photo-box">
                    <img src="{{ asset('images/rising-damp-stain.jpg') }}" alt="Rough concrete wall showing rising damp stains">
                </div>

            </div>
        </div>
    </section>


    {{-- =====================================================
         5. WHY CHOOSE US (MINT GREEN SECTION)
    ====================================================== --}}
    <section class="rd-section" style="padding-top: 10px;">
        <div class="rd-container">
            <div class="rd-choose-section">

                <div class="rd-heading-center">
                    <span class="rd-badge">WHY CHOOSE US</span>
                    <h2>WHY CHOOSE US FOR YOUR RISING DAMP INSPECTION?</h2>
                </div>

                <div class="rd-choose-grid">

                    <div class="rd-choose-card">
                        <div class="rd-choose-icon-wrap">
                            <i class="bi bi-shield-check"></i>
                        </div>
                        <h4>Licensed and Experienced Inspectors</h4>
                        <p>All our inspectors are VBA-certified, experienced, and familiar with Melbourne’s unique environmental conditions.</p>
                    </div>

                    <div class="rd-choose-card">
                        <div class="rd-choose-icon-wrap">
                            <i class="bi bi-search"></i>
                        </div>
                        <h4>Thorough Assessment</h4>
                        <p>Our inspections cover all affected areas, including walls, flooring, and sub-floor spaces, to identify the source of rising damp.</p>
                    </div>

                    <div class="rd-choose-card">
                        <div class="rd-choose-icon-wrap">
                            <i class="bi bi-tools"></i>
                        </div>
                        <h4>Latest Technology</h4>
                        <p>We use advanced moisture meters and thermal imaging tools to ensure accurate assessments.</p>
                    </div>

                    <div class="rd-choose-card">
                        <div class="rd-choose-icon-wrap">
                            <i class="bi bi-tag-fill"></i>
                        </div>
                        <h4>Affordable Pricing</h4>
                        <p>We offer competitive pricing for our rising damp inspections without compromising on quality.</p>
                    </div>

                </div>

            </div>
        </div>
    </section>


    {{-- =====================================================
         6. CHOOSE PACKAGE / ENSURE SAFETY AND COMPLIANCE (PRICING)
    ====================================================== --}}
    <section class="rd-section">
        <div class="rd-container">

            <div class="rd-heading-center">
                <span class="rd-badge">CHOOSE PACKAGE</span>
                <h2>ENSURE SAFETY AND COMPLIANCE</h2>
            </div>

            <div class="rd-price-grid">

                {{-- CARD 1: 2 BEDROOM --}}
                <div class="rd-price-card">
                    <div>
                        <div class="rd-price-icon">
                            <i class="bi bi-house-door"></i>
                        </div>
                        <h3>2 bed room</h3>

                        <div class="rd-price-amount">$400</div>
                        <div class="rd-price-suffix">+GST/ Starting</div>

                        <ul class="rd-price-features">
                            <li><i class="bi bi-check-square-fill"></i> Comprehensive Inspection</li>
                            <li><i class="bi bi-check-square-fill"></i> Report &amp; Consultation</li>
                        </ul>
                    </div>

                    <a href="#quote-form" class="rd-price-btn">
                        GET STARTED
                    </a>
                </div>

                {{-- CARD 2: 3 BEDROOM --}}
                <div class="rd-price-card">
                    <div>
                        <div class="rd-price-icon">
                            <i class="bi bi-house-door"></i>
                        </div>
                        <h3>3 bed room</h3>

                        <div class="rd-price-amount">$450</div>
                        <div class="rd-price-suffix">+GST/ Starting</div>

                        <ul class="rd-price-features">
                            <li><i class="bi bi-check-square-fill"></i> Comprehensive Inspection</li>
                            <li><i class="bi bi-check-square-fill"></i> Report &amp; Consultation</li>
                        </ul>
                    </div>

                    <a href="#quote-form" class="rd-price-btn">
                        GET STARTED
                    </a>
                </div>

                {{-- CARD 3: 4 BEDROOM --}}
                <div class="rd-price-card">
                    <div>
                        <div class="rd-price-icon">
                            <i class="bi bi-building"></i>
                        </div>
                        <h3>4 bed room</h3>

                        <div class="rd-price-amount">$525</div>
                        <div class="rd-price-suffix">+GST/ Starting</div>

                        <ul class="rd-price-features">
                            <li><i class="bi bi-check-square-fill"></i> Comprehensive Inspection</li>
                            <li><i class="bi bi-check-square-fill"></i> Report &amp; Consultation</li>
                        </ul>
                    </div>

                    <a href="#quote-form" class="rd-price-btn">
                        GET STARTED
                    </a>
                </div>

            </div>

        </div>
    </section>


    {{-- =====================================================
         7. SCHEDULE CTA
    ====================================================== --}}
    <section class="rd-cta">
        <div class="rd-container">
            <div class="rd-cta-inner">
                <h2>SCHEDULE YOUR INSPECTION TODAY</h2>

                <p>
                    A pre-purchase building and pest inspection is a small investment that can save you from significant expenses and stress in the future. Our professional inspections provide you with the information needed to make an informed, confident decision about your property purchase. Don’t take risks with your investment—book your inspection today.
                </p>

                <a href="#quote-form" class="rd-btn-green">
                    Schedule your inspection now
                </a>
            </div>
        </div>
    </section>


    {{-- =====================================================
         8. CLIENT FEEDBACK & REVIEWS
    ====================================================== --}}
    <section class="rd-section rd-reviews">
        <div class="rd-container">

            <div class="rd-heading-center">
                <span class="rd-badge">TESTIMONIAL</span>
                <h2>CLIENT FEEDBACK & REVIEWS</h2>
            </div>

            <div class="rd-review-grid">

                <div class="rd-review-card">
                    <div class="rd-review-icon">
                        <i class="bi bi-chat-quote"></i>
                    </div>
                    <p>
                        Very professional and approachable. The property inspection was done thoroughly, and even minor defects were identified. Really appreciate the attention to detail and commitment to the job. Highly recommended for any building inspection.
                    </p>
                    <div class="rd-review-stars">★★★★★</div>
                    <h4>Swathi Tarini</h4>
                </div>

                <div class="rd-review-card">
                    <div class="rd-review-icon">
                        <i class="bi bi-chat-quote"></i>
                    </div>
                    <p>
                        Took generous time to answer all my questions regarding the property's condition and report. Very kind, humble, and helpful. Highly recommended for anyone needing a building and pest inspection
                    </p>
                    <div class="rd-review-stars">★★★★★</div>
                    <h4>Luxmy</h4>
                </div>

                <div class="rd-review-card">
                    <div class="rd-review-icon">
                        <i class="bi bi-chat-quote"></i>
                    </div>
                    <p>
                        Provided an excellent inspection for the property I'm purchasing. All findings were explained clearly, and the report was prepared on the same day. Warm, professional, and efficient. Highly recommended to friends and family.
                    </p>
                    <div class="rd-review-stars">★★★★★</div>
                    <h4>Shaleen De Silva</h4>
                </div>

                <div class="rd-review-card">
                    <div class="rd-review-icon">
                        <i class="bi bi-chat-quote"></i>
                    </div>
                    <p>
                        Extremely helpful and responsive. The building and pest inspection was completed quickly, and the report was delivered exactly as requested. Smooth and professional experience overall— great service!
                    </p>
                    <div class="rd-review-stars">★★★★★</div>
                    <h4>Niresh Wijesiri</h4>
                </div>

                <div class="rd-review-card">
                    <div class="rd-review-icon">
                        <i class="bi bi-chat-quote"></i>
                    </div>
                    <p>
                        Very thorough and professional during my pre-purchase building and pest inspection. Strongly recommended.
                    </p>
                    <div class="rd-review-stars">★★★★★</div>
                    <h4>Max</h4>
                </div>

                <div class="rd-review-card">
                    <div class="rd-review-icon">
                        <i class="bi bi-chat-quote"></i>
                    </div>
                    <p>
                        Amazing experience. Quick replies, prompt actions, and a positive attitude. Would definitely recommend 👏👏👏
                    </p>
                    <div class="rd-review-stars">★★★★★</div>
                    <h4>Heena Bhavsar</h4>
                </div>

            </div>

        </div>
    </section>


    {{-- =====================================================
         9. FREQUENTLY ASKED QUESTIONS (FAQ)
    ====================================================== --}}
    <section class="rd-section rd-faq" style="background: #ffffff; padding-top: 10px;">
        <div class="rd-container">

            <div class="rd-heading-center">
                <span class="rd-badge">COMMON QUESTIONS</span>
                <h2>MOST POPULAR QUESTIONS</h2>
            </div>

            <div class="rd-faq-grid">

                {{-- COLUMN 1 --}}
                <div class="rd-faq-col">

                    {{-- FAQ 1 (Active by default) --}}
                    <div class="rd-faq-item active">
                        <button class="rd-faq-question" type="button" onclick="toggleRdFaq(this)">
                            <span>1. What causes rising damp?</span>
                            <i class="bi bi-chevron-down rd-faq-icon"></i>
                        </button>
                        <div class="rd-faq-answer">
                            Rising damp occurs when moisture from the ground travels up through porous building materials, such as bricks and mortar, due to capillary action. It is often caused by the absence or failure of a damp-proof course.
                        </div>
                    </div>

                    {{-- FAQ 2 --}}
                    <div class="rd-faq-item">
                        <button class="rd-faq-question" type="button" onclick="toggleRdFaq(this)">
                            <span>2. How do I know if I have rising damp?</span>
                            <i class="bi bi-chevron-down rd-faq-icon"></i>
                        </button>
                        <div class="rd-faq-answer">
                            Signs of rising damp include damp patches or tide marks on walls, peeling paint, crumbling plaster, and a musty odor. If you notice any of these, it’s best to get a professional inspection.
                        </div>
                    </div>

                    {{-- FAQ 3 --}}
                    <div class="rd-faq-item">
                        <button class="rd-faq-question" type="button" onclick="toggleRdFaq(this)">
                            <span>3. How can rising damp affect my property?</span>
                            <i class="bi bi-chevron-down rd-faq-icon"></i>
                        </button>
                        <div class="rd-faq-answer">
                            Rising damp can lead to structural damage, cause wood rot, and promote the growth of mold and mildew, posing health risks and reducing property value.
                        </div>
                    </div>

                </div>

                {{-- COLUMN 2 --}}
                <div class="rd-faq-col">

                    {{-- FAQ 4 (Active by default) --}}
                    <div class="rd-faq-item active">
                        <button class="rd-faq-question" type="button" onclick="toggleRdFaq(this)">
                            <span>4. How long does the inspection take?</span>
                            <i class="bi bi-chevron-down rd-faq-icon"></i>
                        </button>
                        <div class="rd-faq-answer">
                            The inspection typically takes 1-2 hours, depending on the size of the property and the extent of the damp issues.
                        </div>
                    </div>

                    {{-- FAQ 5 --}}
                    <div class="rd-faq-item">
                        <button class="rd-faq-question" type="button" onclick="toggleRdFaq(this)">
                            <span>5. What can be done to fix rising damp?</span>
                            <i class="bi bi-chevron-down rd-faq-icon"></i>
                        </button>
                        <div class="rd-faq-answer">
                            Solutions include installing a damp-proof course, improving ventilation, and applying waterproofing treatments to affected areas.
                        </div>
                    </div>

                    {{-- FAQ 6 --}}
                    <div class="rd-faq-item">
                        <button class="rd-faq-question" type="button" onclick="toggleRdFaq(this)">
                            <span>6. What is included in the rising damp inspection report?</span>
                            <i class="bi bi-chevron-down rd-faq-icon"></i>
                        </button>
                        <div class="rd-faq-answer">
                            Our report includes moisture readings, photos of affected areas, and a detailed description of the findings along with recommendations for treatment.
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </section>

</div>

<script>
// FAQ Accordion Toggle
function toggleRdFaq(btn) {
    const item = btn.closest('.rd-faq-item');
    const col = item.closest('.rd-faq-col');
    const allInCol = col.querySelectorAll('.rd-faq-item');
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