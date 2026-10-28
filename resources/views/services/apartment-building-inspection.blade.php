@extends('layouts.app')

@section('title', 'Expert Apartment Building Inspections Melbourne | Premium Building & Pest Inspections')
@section('meta_description', 'Specialist apartment and unit building inspections in Melbourne. Thorough assessment of internal finishes, structural integrity, water leaks, and common property.')

@section('content')

<style>
/* =========================================================
   APARTMENT BUILDING INSPECTION PAGE STYLES
   1:1 Pixel-Perfect Match with Reference Screenshot & Live Site
========================================================= */

:root {
    --apt-navy: #073763;
    --apt-navy-dark: #052646;
    --apt-green: #42a900;
    --apt-green-dark: #358c00;
    --apt-light-green: #eef7ed;
    --apt-text: #333333;
    --apt-muted: #555555;
    --apt-border: #e2e8f0;
}

.apt-page {
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
    color: var(--apt-text);
    overflow-x: hidden;
    position: relative;
    background: #ffffff;
}

.apt-container {
    width: 92%;
    max-width: 1180px;
    margin: 0 auto;
}

.apt-section {
    padding: 70px 0;
}

/* Headings */
.apt-badge {
    display: inline-block;
    color: var(--apt-green);
    font-size: 13.5px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 1.2px;
    margin-bottom: 8px;
}

.apt-heading-center {
    text-align: center;
    margin-bottom: 40px;
}

.apt-heading-center h2 {
    margin: 0;
    color: var(--apt-navy);
    font-size: clamp(24px, 3.2vw, 34px);
    line-height: 1.25;
    font-weight: 900;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.apt-heading-center p {
    max-width: 720px;
    margin: 12px auto 0;
    color: var(--apt-muted);
    font-size: 15px;
    line-height: 1.7;
}

/* Buttons */
.apt-btn-green {
    display: inline-flex;
    justify-content: center;
    align-items: center;
    gap: 8px;
    padding: 13px 28px;
    background: var(--apt-green);
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

.apt-btn-green:hover {
    background: var(--apt-green-dark);
    transform: translateY(-2px);
    box-shadow: 0 8px 22px rgba(66, 169, 0, 0.35);
}

/* =========================================================
   1. HERO SECTION
========================================================= */
.apt-hero {
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

.apt-hero-inner {
    display: grid;
    grid-template-columns: 1.15fr 0.85fr;
    gap: 45px;
    align-items: center;
    padding: 50px 0 60px;
}

.apt-hero-content .apt-hero-badge {
    color: rgba(255, 255, 255, 0.9);
    font-size: 13px;
    font-weight: 800;
    letter-spacing: 1.5px;
    text-transform: uppercase;
    display: block;
    margin-bottom: 12px;
}

.apt-hero-content h1 {
    font-size: clamp(28px, 3.8vw, 44px);
    line-height: 1.18;
    font-weight: 900;
    color: #ffffff;
    margin: 0 0 16px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.apt-hero-content .apt-hero-sub {
    color: rgba(255, 255, 255, 0.95);
    font-size: 17px;
    line-height: 1.6;
    margin: 0 0 26px;
    font-weight: 500;
}

/* Hero Form */
.apt-hero-form {
    background: #ffffff;
    border-radius: 8px;
    padding: 26px 24px;
    box-shadow: 0 12px 35px rgba(0, 0, 0, 0.28);
    color: var(--apt-text);
}

.apt-hero-form h3 {
    margin: 0 0 16px;
    color: var(--apt-navy);
    font-size: 19px;
    font-weight: 900;
    text-transform: uppercase;
    text-align: center;
    letter-spacing: 0.5px;
}

.apt-form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 12px;
    margin-bottom: 12px;
}

.apt-hero-form input,
.apt-hero-form select,
.apt-hero-form textarea {
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

.apt-hero-form input:focus,
.apt-hero-form select:focus,
.apt-hero-form textarea:focus {
    border-color: var(--apt-green);
    box-shadow: 0 0 0 3px rgba(66, 169, 0, 0.15);
}

.apt-hero-form textarea {
    resize: vertical;
    min-height: 75px;
    margin-top: 12px;
}

.apt-hero-form .apt-submit-btn {
    width: 100%;
    padding: 13px;
    background: var(--apt-green);
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

.apt-hero-form .apt-submit-btn:hover {
    background: var(--apt-green-dark);
}

/* =========================================================
   2. WELCOME SECTION + INSPECTOR CARD
========================================================= */
.apt-welcome-grid {
    display: grid;
    grid-template-columns: 1.15fr 0.85fr;
    gap: 50px;
    align-items: start;
}

.apt-welcome-content h2 {
    color: var(--apt-navy);
    font-size: clamp(24px, 3vw, 32px);
    font-weight: 900;
    text-transform: uppercase;
    line-height: 1.25;
    margin: 0 0 16px;
}

.apt-welcome-content p {
    color: var(--apt-muted);
    font-size: 14.5px;
    line-height: 1.7;
    margin: 0 0 14px;
}

.apt-feature-list {
    margin: 22px 0 28px;
    display: flex;
    flex-direction: column;
    gap: 16px;
}

.apt-feature-item {
    display: flex;
    align-items: flex-start;
    gap: 15px;
}

.apt-feature-icon {
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

.apt-feature-item h4 {
    margin: 0 0 4px;
    color: var(--apt-navy);
    font-size: 14px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 0.4px;
}

.apt-feature-item p {
    margin: 0;
    color: var(--apt-muted);
    font-size: 13.5px;
    line-height: 1.55;
}

/* Inspector Card */
.apt-inspector-card {
    background: #ffffff;
    border: 1px solid #e5e9f0;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
    text-align: center;
}

.apt-inspector-header {
    background: #000000;
    color: #ffffff;
    padding: 10px 14px;
    font-size: 13.5px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.apt-inspector-card img {
    width: 100%;
    height: 360px;
    object-fit: cover;
    object-position: center top;
    display: block;
}

.apt-inspector-body {
    padding: 18px 20px;
}

.apt-inspector-body h4 {
    margin: 0 0 14px;
    color: var(--apt-navy);
    font-size: 13px;
    font-weight: 800;
    line-height: 1.5;
    text-transform: uppercase;
}

.apt-inspector-call {
    display: block;
    width: 100%;
    padding: 12px;
    background: var(--apt-green);
    color: #ffffff !important;
    text-decoration: none;
    border-radius: 4px;
    font-size: 15px;
    font-weight: 800;
    letter-spacing: 0.5px;
    transition: background 0.2s ease;
}

.apt-inspector-call:hover {
    background: var(--apt-green-dark);
}

/* =========================================================
   3. WHY AN APARTMENT BUILDING INSPECTION IS IMPORTANT
========================================================= */
.apt-important-section {
    background: #ffffff;
}

.apt-matters-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 18px;
}

.apt-matters-card {
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

.apt-matters-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 18px rgba(0, 0, 0, 0.07);
    border-color: #cbd5e1;
}

.apt-matters-icon {
    width: 24px;
    height: 24px;
    min-width: 24px;
    background: var(--apt-green);
    color: #ffffff;
    border-radius: 4px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 13px;
    font-weight: 900;
    margin-top: 2px;
}

.apt-matters-card p {
    margin: 0;
    color: var(--apt-muted);
    font-size: 13.5px;
    line-height: 1.6;
}

.apt-matters-card strong {
    color: var(--apt-navy);
    font-weight: 700;
}

/* =========================================================
   4. COMMON ISSUES WE FIND IN APARTMENT INSPECTIONS
========================================================= */
.apt-issues-grid {
    display: grid;
    grid-template-columns: 1.15fr 0.85fr;
    gap: 45px;
    align-items: center;
}

.apt-issues-content h2 {
    color: var(--apt-navy);
    font-size: clamp(22px, 2.8vw, 30px);
    font-weight: 900;
    text-transform: uppercase;
    line-height: 1.25;
    margin: 0 0 14px;
}

.apt-issues-content > p {
    color: var(--apt-muted);
    font-size: 14.5px;
    line-height: 1.6;
    margin: 0 0 18px;
}

.apt-issues-list {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    flex-direction: column;
    gap: 14px;
}

.apt-issues-item {
    display: flex;
    align-items: flex-start;
    gap: 12px;
}

.apt-issues-item .bullet-icon {
    width: 8px;
    height: 8px;
    min-width: 8px;
    background: var(--apt-green);
    border-radius: 50%;
    margin-top: 8px;
}

.apt-issues-item p {
    margin: 0;
    color: var(--apt-muted);
    font-size: 13.5px;
    line-height: 1.55;
}

.apt-issues-item strong {
    color: var(--apt-navy);
    font-weight: 700;
}

/* Carousel */
.apt-carousel-box {
    position: relative;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.12);
    height: 420px;
    background: #000;
}

.apt-carousel-slide {
    position: absolute;
    inset: 0;
    opacity: 0;
    transition: opacity 0.5s ease-in-out;
}

.apt-carousel-slide.active {
    opacity: 1;
    z-index: 2;
}

.apt-carousel-slide img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}

.apt-carousel-arrow {
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
    font-size: 16px;
    cursor: pointer;
    box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2);
    transition: all 0.2s ease;
    z-index: 10;
}

.apt-carousel-arrow:hover {
    background: #ffffff;
    color: var(--apt-green);
}

.apt-carousel-prev {
    left: 12px;
}

.apt-carousel-next {
    right: 12px;
}

/* =========================================================
   5. WHY CHOOSE US (MINT GREEN CONTAINER)
========================================================= */
.apt-choose-section {
    background: var(--apt-light-green);
    border-radius: 18px;
    padding: 60px 40px;
}

.apt-choose-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
}

.apt-choose-card {
    background: #ffffff;
    border-radius: 8px;
    padding: 28px 20px;
    text-align: center;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.04);
    transition: all 0.25s ease;
}

.apt-choose-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
}

.apt-choose-icon-wrap {
    width: 46px;
    height: 46px;
    margin: 0 auto 16px;
    background: var(--apt-green);
    color: #ffffff;
    border-radius: 6px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 22px;
}

.apt-choose-card h4 {
    margin: 0 0 10px;
    color: var(--apt-navy);
    font-size: 14px;
    font-weight: 800;
    text-transform: uppercase;
    line-height: 1.35;
}

.apt-choose-card p {
    margin: 0;
    color: #555555;
    font-size: 13px;
    line-height: 1.6;
}

/* =========================================================
   6. PRICING PACKAGES (3 CARDS)
========================================================= */
.apt-price-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 25px;
    max-width: 1020px;
    margin: 0 auto;
}

.apt-price-card {
    background: #ffffff;
    border: 1px solid #e4e7eb;
    border-top: 3px solid var(--apt-green);
    border-radius: 6px;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
    padding: 30px 22px;
    text-align: center;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    transition: transform 0.25s ease, box-shadow 0.25s ease;
}

.apt-price-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 10px 28px rgba(0, 0, 0, 0.1);
}

.apt-price-icon {
    font-size: 32px;
    color: var(--apt-navy);
    margin-bottom: 12px;
}

.apt-price-card h3 {
    margin: 0 0 10px;
    color: var(--apt-navy);
    font-size: 17px;
    font-weight: 800;
    text-transform: capitalize;
}

.apt-price-amount {
    color: var(--apt-green);
    font-size: 36px;
    font-weight: 900;
    line-height: 1;
    margin-bottom: 4px;
}

.apt-price-suffix {
    color: #666666;
    font-size: 13px;
    font-weight: 600;
    margin-bottom: 20px;
}

.apt-price-features {
    list-style: none;
    padding: 0;
    margin: 0 0 24px;
    text-align: left;
    flex-grow: 1;
}

.apt-price-features li {
    padding: 9px 0;
    border-bottom: 1px solid #f0f2f5;
    color: #444444;
    font-size: 13.5px;
    display: flex;
    align-items: center;
    gap: 8px;
}

.apt-price-features li i {
    color: var(--apt-green);
    font-size: 15px;
}

.apt-price-btn {
    display: block;
    width: 100%;
    padding: 12px;
    background: var(--apt-green);
    color: #ffffff !important;
    text-decoration: none;
    font-size: 14px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    border-radius: 4px;
    transition: background 0.2s ease;
}

.apt-price-btn:hover {
    background: var(--apt-green-dark);
}

/* =========================================================
   7. SCHEDULE CTA (DARK TIMBER BACKGROUND)
========================================================= */
.apt-cta {
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

.apt-cta-inner {
    max-width: 820px;
}

.apt-cta h2 {
    color: #ffffff;
    font-size: clamp(30px, 4vw, 46px);
    font-weight: 900;
    text-transform: uppercase;
    line-height: 1.2;
    margin: 0 0 20px;
    letter-spacing: 0.5px;
}

.apt-cta p {
    color: rgba(255, 255, 255, 0.96);
    font-size: 17.5px;
    line-height: 1.85;
    margin: 0 0 32px;
}

.apt-cta .apt-btn-green {
    padding: 16px 38px;
    font-size: 15.5px;
    font-weight: 800;
    letter-spacing: 0.6px;
}

/* =========================================================
   8. CLIENT FEEDBACK & REVIEWS
========================================================= */
.apt-review-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 24px;
}

.apt-review-card {
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

.apt-review-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
}

.apt-review-icon {
    font-size: 26px;
    color: #1b9eea;
    margin-bottom: 12px;
}

.apt-review-card p {
    color: var(--apt-muted);
    font-size: 13.5px;
    line-height: 1.65;
    margin: 0 0 16px;
    flex-grow: 1;
}

.apt-review-stars {
    color: #ffb400;
    font-size: 15px;
    margin-bottom: 10px;
    letter-spacing: 2px;
}

.apt-review-card h4 {
    margin: 0;
    color: var(--apt-navy);
    font-size: 15px;
    font-weight: 800;
}

/* =========================================================
   9. FAQS SECTION (ACCORDION)
========================================================= */
.apt-faq-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
    align-items: start;
}

.apt-faq-col {
    display: flex;
    flex-direction: column;
    gap: 16px;
}

.apt-faq-item {
    background: #ffffff;
    border: 1px solid #e4e7eb;
    border-radius: 6px;
    overflow: hidden;
    transition: all 0.2s ease;
}

.apt-faq-question {
    width: 100%;
    padding: 16px 20px;
    background: #f8fafc;
    border: 0;
    text-align: left;
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 12px;
    color: var(--apt-navy);
    font-size: 14.5px;
    font-weight: 800;
    cursor: pointer;
    transition: background 0.2s ease, color 0.2s ease;
}

.apt-faq-question span {
    flex-grow: 1;
    line-height: 1.4;
}

.apt-faq-icon {
    font-size: 14px;
    color: var(--apt-green);
    transition: transform 0.3s ease;
}

.apt-faq-answer {
    padding: 0 20px;
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.3s ease, padding 0.3s ease;
    color: var(--apt-muted);
    font-size: 13.5px;
    line-height: 1.65;
    background: #ffffff;
}

/* Active State (Q1 & Q4 by default) */
.apt-faq-item.active .apt-faq-question {
    background: var(--apt-green);
    color: #ffffff;
}

.apt-faq-item.active .apt-faq-icon {
    color: #ffffff;
    transform: rotate(180deg);
}

.apt-faq-item.active .apt-faq-answer {
    padding: 16px 20px 20px;
    max-height: 300px;
}

/* Responsive */
@media (max-width: 991px) {
    .apt-hero-inner,
    .apt-welcome-grid,
    .apt-issues-grid {
        grid-template-columns: 1fr;
        gap: 35px;
    }

    .apt-choose-grid {
        grid-template-columns: repeat(2, 1fr);
    }

    .apt-price-grid {
        grid-template-columns: 1fr;
        max-width: 450px;
    }

    .apt-review-grid {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 767px) {
    .apt-section {
        padding: 50px 0;
    }

    .apt-form-row,
    .apt-matters-grid,
    .apt-faq-grid {
        grid-template-columns: 1fr;
    }

    .apt-choose-section {
        padding: 35px 20px;
    }

    .apt-choose-grid {
        grid-template-columns: 1fr;
    }

    .apt-carousel-box {
        height: 320px;
    }
}
</style>

<div class="apt-page">

    {{-- =====================================================
         1. HERO SECTION & QUICK QUOTE FORM
    ====================================================== --}}
    <section class="apt-hero">
        <div class="apt-container">
            <div class="apt-hero-inner">

                {{-- Left Content --}}
                <div class="apt-hero-content">
                    <span class="apt-hero-badge">PREMIUM BUILDING & PEST INSPECTIONS</span>
                    <h1>EXPERT APARTMENT BUILDING INSPECTIONS IN MELBOURNE</h1>
                    <p class="apt-hero-sub">Ensuring Your Peace of Mind</p>

                    <div>
                        <a href="tel:0466001551" class="apt-btn-green">
                            <i class="bi bi-telephone-fill"></i>
                            0466 001 551
                        </a>
                    </div>
                </div>

                {{-- Right Form --}}
                <div id="quote-form" class="apt-hero-form">
                    <h3>GET QUICK QUOTE</h3>

                    @if(session('success'))
                        <div class="alert alert-success py-2 mb-3" style="font-size: 13.5px;">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('quote.store') }}" method="POST">
                        @csrf

                        <div class="apt-form-row">
                            <input type="text" name="name" placeholder="Name *" value="{{ old('name') }}" required>
                            <input type="email" name="email" placeholder="Email *" value="{{ old('email') }}" required>
                        </div>

                        <div class="apt-form-row">
                            <input type="tel" name="phone" placeholder="Phone *" value="{{ old('phone') }}" required>
                            <input type="text" name="property_address" placeholder="Property Address" value="{{ old('property_address') }}">
                        </div>

                        <select name="service_type" required>
                            <option value="apartment-building-inspection" selected>Apartment Building Inspection</option>
                            <option value="pre-purchase-building-and-pest-inspection">Pre-Purchase Building and Pest Inspection</option>
                            <option value="building-stage-by-stage-inspection">Building Stage by Stage Inspection</option>
                            <option value="new-build-handover-inspection">New Build Handover Inspection</option>
                            <option value="rising-damp-inspection">Rising Damp Inspection</option>
                            <option value="pool-barrier-inspection">Pool Barrier Inspection</option>
                            <option value="dilapidation-report">Dilapidation Report</option>
                            <option value="vendor-inspection">Vendor Inspection</option>
                            <option value="builders-warranty-inspection">Builders Warranty Inspection</option>
                        </select>

                        <div class="apt-form-row" style="margin-top: 12px; margin-bottom: 0;">
                            <input type="date" name="preferred_date" placeholder="Inspection Date">
                            <input type="text" name="notes" placeholder="Notes (e.g. Unit #, Level)">
                        </div>

                        <textarea name="message" placeholder="Message / Details (e.g. 1 Bed, 2 Bed, Off-the-plan)">{{ old('message') }}</textarea>

                        <button type="submit" class="apt-submit-btn">
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
    <section class="apt-section apt-welcome">
        <div class="apt-container">
            <div class="apt-welcome-grid">

                {{-- Left Content --}}
                <div class="apt-welcome-content">
                    <span class="apt-badge">WELCOME TO PREMIUM BUILDING & PEST INSPECTIONS</span>
                    <h2>Expert Apartment Building Inspections</h2>

                    <p>
                        Apartment buildings can develop a range of structural, safety, and maintenance issues that may not be visible during a standard walkthrough. Our Apartment Building Inspection service provides a detailed assessment of the property’s condition, helping owners, buyers, investors, and property managers identify defects, maintenance concerns, and potential risks before they become costly problems.
                    </p>

                    <p style="font-weight: 700; color: var(--apt-navy); margin-bottom: 12px;">We Offer:</p>

                    <div class="apt-feature-list">
                        <div class="apt-feature-item">
                            <div class="apt-feature-icon">
                                <i class="bi bi-search"></i>
                            </div>
                            <div>
                                <h4>COMPREHENSIVE BUILDING INSPECTION</h4>
                                <p>We conduct a detailed inspection of apartments, common areas, external structures, parking facilities, and accessible building components to identify visible defects, damage, deterioration, and maintenance concerns.</p>
                            </div>
                        </div>

                        <div class="apt-feature-item">
                            <div class="apt-feature-icon">
                                <i class="bi bi-search"></i>
                            </div>
                            <div>
                                <h4>STRUCTURAL AND SAFETY CHECKS</h4>
                                <p>Our inspection assesses key structural elements, including walls, ceilings, floors, balconies, roofing, and other accessible components to identify signs of movement, cracking, water ingress, or safety risks</p>
                            </div>
                        </div>

                        <div class="apt-feature-item">
                            <div class="apt-feature-icon">
                                <i class="bi bi-search"></i>
                            </div>
                            <div>
                                <h4>ELECTRICAL AND PLUMBING SYSTEMS</h4>
                                <p>We inspect visible electrical and plumbing components for signs of defects, damage, leaks, poor workmanship, or maintenance issues that may affect the property's functionality and safety.</p>
                            </div>
                        </div>

                        <div class="apt-feature-item">
                            <div class="apt-feature-icon">
                                <i class="bi bi-search"></i>
                            </div>
                            <div>
                                <h4>VENTILATION AND HVAC SYSTEMS</h4>
                                <p>We inspect the heating, ventilation, and air conditioning systems (HVAC) to ensure efficient operation and compliance with energy standards.</p>
                            </div>
                        </div>
                    </div>

                    <div>
                        <a href="#quote-form" class="apt-btn-green">
                            Schedule Inspection Now
                        </a>
                    </div>
                </div>

                {{-- Right Inspector Card --}}
                <div class="apt-welcome-card-col">
                    <div class="apt-inspector-card">
                        <div class="apt-inspector-header">
                            YOUR INSPECTOR
                        </div>

                        <img src="{{ asset('images/ronak gami.jpeg') }}" alt="Ronak Gami - Registered Building Inspector">

                        <div class="apt-inspector-body">
                            <h4>Ronak Gami, vba lic No: IN-PS 74654, Builder Lic No: DB-L 100200</h4>
                            <a href="tel:0466001551" class="apt-inspector-call">
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
         3. WHY AN APARTMENT BUILDING INSPECTION IS IMPORTANT
    ====================================================== --}}
    <section class="apt-section apt-important-section" style="padding-top: 10px;">
        <div class="apt-container">

            <div class="apt-heading-center">
                <h2>WHY AN APARTMENT BUILDING INSPECTION IS IMPORTANT</h2>
            </div>

            <div class="apt-matters-grid">

                <div class="apt-matters-card">
                    <div class="apt-matters-icon">✓</div>
                    <p>
                        <strong>Uncover Hidden Defects:</strong> Apartment buildings can often have hidden issues that aren’t immediately visible. Our detailed inspections reveal structural and safety concerns, helping you avoid future costly repairs.
                    </p>
                </div>

                <div class="apt-matters-card">
                    <div class="apt-matters-icon">✓</div>
                    <p>
                        <strong>Investment Protection:</strong> For investors, our inspection ensures that the apartment building is a sound investment. Identifying potential issues early helps you negotiate better terms or plan repairs before moving forward with a deal.
                    </p>
                </div>

                <div class="apt-matters-card">
                    <div class="apt-matters-icon">✓</div>
                    <p>
                        <strong>Ensure Compliance:</strong> Building codes in Melbourne are stringent. Our inspections ensure that your apartment building meets all the necessary regulatory requirements for safety, energy efficiency, and structural integrity.
                    </p>
                </div>

                <div class="apt-matters-card">
                    <div class="apt-matters-icon">✓</div>
                    <p>
                        <strong>Long-Term Savings:</strong> Discovering and addressing issues early on helps you avoid expensive repairs or maintenance down the line. By identifying problems during an inspection, you can have them rectified quickly, saving you money in the long term.
                    </p>
                </div>

            </div>

        </div>
    </section>


    {{-- =====================================================
         4. COMMON ISSUES WE FIND IN APARTMENT INSPECTIONS
    ====================================================== --}}
    <section class="apt-section apt-issues">
        <div class="apt-container">
            <div class="apt-issues-grid">

                {{-- Left Content --}}
                <div class="apt-issues-content">
                    <h2>COMMON ISSUES WE FIND IN APARTMENT BUILDING INSPECTIONS</h2>

                    <p>During apartment building inspections, we often encounter the following issues:</p>

                    <ul class="apt-issues-list">
                        <li class="apt-issues-item">
                            <span class="bullet-icon"></span>
                            <p><strong>Water Leaks and Dampness:</strong> Leaks in roofs, walls, or plumbing systems can cause water damage and mold, impacting the health of residents and the integrity of the building.</p>
                        </li>

                        <li class="apt-issues-item">
                            <span class="bullet-icon"></span>
                            <p><strong>Cracking in Walls or Foundations:</strong> Cracks can indicate structural issues or movement, which can lead to serious safety concerns if not addressed early.</p>
                        </li>

                        <li class="apt-issues-item">
                            <span class="bullet-icon"></span>
                            <p><strong>Electrical Defects:</strong> Faulty wiring, outdated systems, or inadequate power supply can pose fire hazards or result in costly electrical repairs.</p>
                        </li>

                        <li class="apt-issues-item">
                            <span class="bullet-icon"></span>
                            <p><strong>Poor Ventilation:</strong> Insufficient ventilation in common areas, bathrooms, or HVAC systems can lead to air quality problems, making the living environment uncomfortable for residents.</p>
                        </li>

                        <li class="apt-issues-item">
                            <span class="bullet-icon"></span>
                            <p><strong>Fire Safety Issues:</strong> Missing or non-functioning smoke detectors, fire alarms, and fire escapes are common issues we find, compromising the safety of residents.</p>
                        </li>
                    </ul>
                </div>

                {{-- Right Carousel --}}
                <div class="apt-carousel-box" id="aptCarousel">
                    <div class="apt-carousel-slide active">
                        <img src="{{ asset('images/apartment-inspection-carousel.jpeg') }}" alt="Ronak Gami inspecting apartment waterproofing">
                    </div>
                    <div class="apt-carousel-slide">
                        <img src="{{ asset('images/apartment-inspection-carousel-2.jpeg') }}" alt="Apartment Inspection Melbourne">
                    </div>

                    <button class="apt-carousel-arrow apt-carousel-prev" type="button" aria-label="Previous" onclick="aptSlidePrev()">
                        <i class="bi bi-chevron-left"></i>
                    </button>
                    <button class="apt-carousel-arrow apt-carousel-next" type="button" aria-label="Next" onclick="aptSlideNext()">
                        <i class="bi bi-chevron-right"></i>
                    </button>
                </div>

            </div>
        </div>
    </section>


    {{-- =====================================================
         5. WHY CHOOSE US (MINT GREEN SECTION)
    ====================================================== --}}
    <section class="apt-section" style="padding-top: 10px;">
        <div class="apt-container">
            <div class="apt-choose-section">

                <div class="apt-heading-center">
                    <span class="apt-badge">WHY CHOOSE US</span>
                    <h2>WHY CHOOSE US FOR YOUR APARTMENT BUILD TO INSPECTION?</h2>
                </div>

                <div class="apt-choose-grid">

                    <div class="apt-choose-card">
                        <div class="apt-choose-icon-wrap">
                            <i class="bi bi-shield-check"></i>
                        </div>
                        <h4>Expert Inspectors with Local Knowledge</h4>
                        <p>Our inspectors are fully licensed and experienced in apartment building inspections. With in-depth knowledge of Melbourne’s regulations and building standards, we ensure nothing is overlooked.</p>
                    </div>

                    <div class="apt-choose-card">
                        <div class="apt-choose-icon-wrap">
                            <i class="bi bi-file-earmark-text"></i>
                        </div>
                        <h4>Comprehensive and Easy-to-Understand Reports</h4>
                        <p>We provide detailed yet easy-to-read reports that help you make informed decisions about your property. The reports include clear recommendations for any necessary actions.</p>
                    </div>

                    <div class="apt-choose-card">
                        <div class="apt-choose-icon-wrap">
                            <i class="bi bi-clock-history"></i>
                        </div>
                        <h4>Fast Turnaround Times</h4>
                        <p>We understand that real estate transactions and property management can be time-sensitive. We conduct thorough inspections and deliver comprehensive reports within 24 hours.</p>
                    </div>

                    <div class="apt-choose-card">
                        <div class="apt-choose-icon-wrap">
                            <i class="bi bi-headset"></i>
                        </div>
                        <h4>Customer Support</h4>
                        <p>Our team is always available to help you understand the inspection report and offer guidance on the next steps. We work with you to ensure all your concerns are addressed.</p>
                    </div>

                </div>

            </div>
        </div>
    </section>


    {{-- =====================================================
         6. CHOOSE PACKAGE / ENSURE SAFETY AND COMPLIANCE (PRICING)
    ====================================================== --}}
    <section class="apt-section">
        <div class="apt-container">

            <div class="apt-heading-center">
                <span class="apt-badge">CHOOSE PACKAGE</span>
                <h2>ENSURE SAFETY AND COMPLIANCE</h2>
            </div>

            <div class="apt-price-grid">

                {{-- CARD 1: 2 BEDROOM --}}
                <div class="apt-price-card">
                    <div>
                        <div class="apt-price-icon">
                            <i class="bi bi-house-door"></i>
                        </div>
                        <h3>2 bed room</h3>

                        <div class="apt-price-amount">$400</div>
                        <div class="apt-price-suffix">+GST/ Starting</div>

                        <ul class="apt-price-features">
                            <li><i class="bi bi-check-square-fill"></i> Comprehensive Inspection</li>
                            <li><i class="bi bi-check-square-fill"></i> Report &amp; Consultation</li>
                        </ul>
                    </div>

                    <a href="#quote-form" class="apt-price-btn">
                        GET STARTED
                    </a>
                </div>

                {{-- CARD 2: 3 BEDROOM --}}
                <div class="apt-price-card">
                    <div>
                        <div class="apt-price-icon">
                            <i class="bi bi-house-door"></i>
                        </div>
                        <h3>3 bed room</h3>

                        <div class="apt-price-amount">$450</div>
                        <div class="apt-price-suffix">+GST/ Starting</div>

                        <ul class="apt-price-features">
                            <li><i class="bi bi-check-square-fill"></i> Comprehensive Inspection</li>
                            <li><i class="bi bi-check-square-fill"></i> Report &amp; Consultation</li>
                        </ul>
                    </div>

                    <a href="#quote-form" class="apt-price-btn">
                        GET STARTED
                    </a>
                </div>

                {{-- CARD 3: 4 BEDROOM --}}
                <div class="apt-price-card">
                    <div>
                        <div class="apt-price-icon">
                            <i class="bi bi-building"></i>
                        </div>
                        <h3>4 bed room</h3>

                        <div class="apt-price-amount">$525</div>
                        <div class="apt-price-suffix">+GST/ Starting</div>

                        <ul class="apt-price-features">
                            <li><i class="bi bi-check-square-fill"></i> Comprehensive Inspection</li>
                            <li><i class="bi bi-check-square-fill"></i> Report &amp; Consultation</li>
                        </ul>
                    </div>

                    <a href="#quote-form" class="apt-price-btn">
                        GET STARTED
                    </a>
                </div>

            </div>

        </div>
    </section>


    {{-- =====================================================
         7. SCHEDULE CTA (PROTECT YOUR INVESTMENT)
    ====================================================== --}}
    <section class="apt-cta">
        <div class="apt-container">
            <div class="apt-cta-inner">
                <h2>PROTECT YOUR INVESTMENT WITH A PROFESSIONAL INSPECTION</h2>

                <p>
                    Ensure your apartment building is safe, compliant, and free from defects with our expert Apartment Building Inspection service in Melbourne. Our thorough inspections and detailed reports provide you with everything you need to make informed decisions, whether you're buying, managing, or maintaining a property. Book your inspection today for complete peace of mind.
                </p>

                <a href="#quote-form" class="apt-btn-green">
                    Schedule your inspection now
                </a>
            </div>
        </div>
    </section>


    {{-- =====================================================
         8. CLIENT FEEDBACK & REVIEWS
    ====================================================== --}}
    <section class="apt-section apt-reviews">
        <div class="apt-container">

            <div class="apt-heading-center">
                <span class="apt-badge">TESTIMONIAL</span>
                <h2>CLIENT FEEDBACK & REVIEWS</h2>
            </div>

            <div class="apt-review-grid">

                <div class="apt-review-card">
                    <div class="apt-review-icon">
                        <i class="bi bi-chat-quote"></i>
                    </div>
                    <p>
                        Very professional and approachable. The property inspection was done thoroughly, and even minor defects were identified. Really appreciate the attention to detail and commitment to the job. Highly recommended for any building inspection.
                    </p>
                    <div class="apt-review-stars">★★★★★</div>
                    <h4>Swathi Tarini</h4>
                </div>

                <div class="apt-review-card">
                    <div class="apt-review-icon">
                        <i class="bi bi-chat-quote"></i>
                    </div>
                    <p>
                        Took generous time to answer all my questions regarding the property's condition and report. Very kind, humble, and helpful. Highly recommended for anyone needing a building and pest inspection
                    </p>
                    <div class="apt-review-stars">★★★★★</div>
                    <h4>Luxmy</h4>
                </div>

                <div class="apt-review-card">
                    <div class="apt-review-icon">
                        <i class="bi bi-chat-quote"></i>
                    </div>
                    <p>
                        Provided an excellent inspection for the property I'm purchasing. All findings were explained clearly, and the report was prepared on the same day. Warm, professional, and efficient. Highly recommended to friends and family.
                    </p>
                    <div class="apt-review-stars">★★★★★</div>
                    <h4>Shaleen De Silva</h4>
                </div>

                <div class="apt-review-card">
                    <div class="apt-review-icon">
                        <i class="bi bi-chat-quote"></i>
                    </div>
                    <p>
                        Extremely helpful and responsive. The building and pest inspection was completed quickly, and the report was delivered exactly as requested. Smooth and professional experience overall— great service!
                    </p>
                    <div class="apt-review-stars">★★★★★</div>
                    <h4>Niresh Wijesiri</h4>
                </div>

                <div class="apt-review-card">
                    <div class="apt-review-icon">
                        <i class="bi bi-chat-quote"></i>
                    </div>
                    <p>
                        Very thorough and professional during my pre-purchase building and pest inspection. Strongly recommended.
                    </p>
                    <div class="apt-review-stars">★★★★★</div>
                    <h4>Max</h4>
                </div>

                <div class="apt-review-card">
                    <div class="apt-review-icon">
                        <i class="bi bi-chat-quote"></i>
                    </div>
                    <p>
                        Amazing experience. Quick replies, prompt actions, and a positive attitude. Would definitely recommend 👏👏👏
                    </p>
                    <div class="apt-review-stars">★★★★★</div>
                    <h4>Heena Bhavsar</h4>
                </div>

            </div>

        </div>
    </section>


    {{-- =====================================================
         9. FREQUENTLY ASKED QUESTIONS (FAQ)
    ====================================================== --}}
    <section class="apt-section apt-faq" style="background: #ffffff; padding-top: 10px;">
        <div class="apt-container">

            <div class="apt-heading-center">
                <span class="apt-badge">COMMON QUESTIONS</span>
                <h2>MOST POPULAR QUESTIONS</h2>
            </div>

            <div class="apt-faq-grid">

                {{-- COLUMN 1 --}}
                <div class="apt-faq-col">

                    {{-- FAQ 1 (Active by default) --}}
                    <div class="apt-faq-item active">
                        <button class="apt-faq-question" type="button" onclick="toggleFaq(this)">
                            <span>1. What is an Apartment Building Inspection?</span>
                            <i class="bi bi-chevron-down apt-faq-icon"></i>
                        </button>
                        <div class="apt-faq-answer">
                            An apartment building inspection is a comprehensive assessment of the property’s condition, including structural integrity, safety compliance, electrical and plumbing systems, and overall quality.
                        </div>
                    </div>

                    {{-- FAQ 2 --}}
                    <div class="apt-faq-item">
                        <button class="apt-faq-question" type="button" onclick="toggleFaq(this)">
                            <span>2. Why do I need an apartment building inspection?</span>
                            <i class="bi bi-chevron-down apt-faq-icon"></i>
                        </button>
                        <div class="apt-faq-answer">
                            An inspection helps you identify hidden defects or potential problems in the building before making a purchase or signing a lease, ensuring the property is safe and meets Melbourne’s regulations.
                        </div>
                    </div>

                    {{-- FAQ 3 --}}
                    <div class="apt-faq-item">
                        <button class="apt-faq-question" type="button" onclick="toggleFaq(this)">
                            <span>3. How long does the inspection take?</span>
                            <i class="bi bi-chevron-down apt-faq-icon"></i>
                        </button>
                        <div class="apt-faq-answer">
                            The inspection typically takes between 2 to 4 hours, depending on the size and complexity of the building. We deliver the report within 24 hours of completing the inspection.
                        </div>
                    </div>

                </div>

                {{-- COLUMN 2 --}}
                <div class="apt-faq-col">

                    {{-- FAQ 4 (Active by default) --}}
                    <div class="apt-faq-item active">
                        <button class="apt-faq-question" type="button" onclick="toggleFaq(this)">
                            <span>4. What does the report include?</span>
                            <i class="bi bi-chevron-down apt-faq-icon"></i>
                        </button>
                        <div class="apt-faq-answer">
                            The report includes a detailed list of any defects found, photos, safety and compliance checks, and recommendations for repairs or maintenance actions.
                        </div>
                    </div>

                    {{-- FAQ 5 --}}
                    <div class="apt-faq-item">
                        <button class="apt-faq-question" type="button" onclick="toggleFaq(this)">
                            <span>5. Can I use the inspection report to negotiate with the seller?</span>
                            <i class="bi bi-chevron-down apt-faq-icon"></i>
                        </button>
                        <div class="apt-faq-answer">
                            Yes, the report provides documented evidence of any issues, which you can use to negotiate with the seller for repairs or price adjustments before finalizing the purchase.
                        </div>
                    </div>

                    {{-- FAQ 6 --}}
                    <div class="apt-faq-item">
                        <button class="apt-faq-question" type="button" onclick="toggleFaq(this)">
                            <span>6. How much does an apartment building inspection cost?</span>
                            <i class="bi bi-chevron-down apt-faq-icon"></i>
                        </button>
                        <div class="apt-faq-answer">
                            The cost varies based on the size and location of the building. Contact us for a personalized quote that fits your needs.
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </section>

</div>

<script>
// FAQ Accordion Toggle
function toggleFaq(btn) {
    const item = btn.closest('.apt-faq-item');
    const col = item.closest('.apt-faq-col');
    const allInCol = col.querySelectorAll('.apt-faq-item');
    const wasActive = item.classList.contains('active');

    // Close other items in the same column
    allInCol.forEach(el => el.classList.remove('active'));

    // Toggle clicked item
    if (!wasActive) {
        item.classList.add('active');
    }
}

// Carousel Functionality
let aptSlideIndex = 0;
function showAptSlide(idx) {
    const slides = document.querySelectorAll('.apt-carousel-slide');
    if (!slides.length) return;
    if (idx >= slides.length) aptSlideIndex = 0;
    else if (idx < 0) aptSlideIndex = slides.length - 1;
    else aptSlideIndex = idx;

    slides.forEach((s, i) => {
        s.classList.toggle('active', i === aptSlideIndex);
    });
}

function aptSlidePrev() {
    showAptSlide(aptSlideIndex - 1);
}

function aptSlideNext() {
    showAptSlide(aptSlideIndex + 1);
}
</script>

@endsection