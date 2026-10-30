@extends('layouts.app')

@section('title', 'Premium Building & Pest Inspections | Trusted Reports')
@section('meta_description', 'Get expert building and pest inspections. We offer detailed reports and peace of mind for your property investment. Book your inspection today.')

@section('content')

<style>
/* =========================================================
   PREMIUM BUILDING & PEST INSPECTIONS - HOMEPAGE STYLES
   MATCHING DESIGN SPECIFICATION
========================================================= */

:root {
    --pbi-navy: #05213F;
    --pbi-navy-dark: #03162B;
    --pbi-blue: #063464;
    --pbi-green: #499B08;
    --pbi-green-dark: #387c06;
    --pbi-accent-blue: #0D85FD;
    --pbi-light: #EEF3FA;
    --pbi-offwhite: #F5F5F7;
    --pbi-white: #ffffff;
    --pbi-text: #333333;
    --pbi-muted: #8299B1;
    --pbi-border: #DCDDE8;
}

.pbi-home *,
.pbi-home *::before,
.pbi-home *::after {
    box-sizing: border-box;
}

.pbi-home {
    width: 100%;
    overflow: hidden;
    background: #fff;
    color: var(--pbi-text);
    font-family: 'Inter', sans-serif;
}

.pbi-container {
    width: 90%;
    max-width: 1180px;
    margin: 0 auto;
}

.pbi-section {
    padding: 70px 0;
}

/* =========================================================
   COMMON SECTION TITLE
========================================================= */

.pbi-title {
    text-align: center;
    margin-bottom: 40px;
}

.pbi-title .small-title {
    color: var(--pbi-green);
    font-size: 13px;
    font-weight: 800;
    letter-spacing: 1.5px;
    text-transform: uppercase;
    margin-bottom: 10px;
    font-family: 'Inter', sans-serif;
}

.pbi-title h2 {
    color: var(--pbi-navy);
    font-family: 'Inter', sans-serif;
    font-size: 34px;
    line-height: 1.15;
    font-weight: 900;
    text-transform: uppercase;
    margin: 0;
    letter-spacing: -.3px;
}

.pbi-title p {
    max-width: 760px;
    margin: 14px auto 0;
    color: var(--pbi-muted);
    font-size: 15px;
    line-height: 1.75;
}

/* =========================================================
   PRIMARY BUTTON
========================================================= */

.pbi-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    background: var(--pbi-green);
    color: #fff !important;
    padding: 13px 30px;
    border: 0;
    border-radius: 3px;
    text-decoration: none !important;
    font-family: 'Inter', sans-serif;
    font-size: 13px;
    font-weight: 800;
    line-height: 1;
    text-transform: uppercase;
    letter-spacing: .5px;
    cursor: pointer;
    transition: all .25s ease;
}

.pbi-btn:hover {
    background: var(--pbi-green-dark);
    transform: translateY(-2px);
    box-shadow: 0 6px 18px rgba(73, 155, 8, .28);
    color: #fff !important;
}

.pbi-btn:active {
    transform: translateY(0);
}

/* =========================================================
   1. HERO SECTION
========================================================= */

.pbi-hero {
    position: relative;
    min-height: 560px;
    display: flex;
    align-items: center;
    background:
        linear-gradient(
            90deg,
            rgba(3, 31, 57, .90) 0%,
            rgba(3, 31, 57, .72) 55%,
            rgba(3, 31, 57, .58) 100%
        ),
        url('{{ asset('images/banner1.jpg') }}') center center / cover no-repeat;
}

.pbi-hero::after {
    content: "";
    position: absolute;
    inset: 0;
    background: linear-gradient(
        to bottom,
        rgba(0,0,0,.08),
        rgba(0,0,0,.22)
    );
    pointer-events: none;
}

.pbi-hero-content {
    position: relative;
    z-index: 2;
    width: 90%;
    max-width: 1150px;
    margin: auto;
    text-align: center;
    color: #fff;
    padding: 75px 20px;
}

.pbi-hero-content h1 {
    max-width: 960px;
    margin: 0 auto 18px;
    color: #fff;
    font-family: 'Inter', sans-serif;
    font-size: clamp(34px, 4.4vw, 54px);
    line-height: 1.08;
    font-weight: 900;
    letter-spacing: -.5px;
    text-transform: uppercase;
    text-shadow: 0 4px 16px rgba(0,0,0,.4);
}

.pbi-hero-content p {
    max-width: 820px;
    margin: 0 auto 20px;
    color: rgba(255, 255, 255, .95);
    font-size: 16px;
    line-height: 1.7;
    font-weight: 400;
}

.pbi-license {
    margin-bottom: 26px;
    color: #fff;
    font-size: 13.5px;
    line-height: 1.75;
}

.pbi-license strong {
    font-weight: 700;
    letter-spacing: .3px;
}

.pbi-hero-buttons {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 12px;
    flex-wrap: wrap;
}

.pbi-hero-buttons .pbi-btn {
    min-width: 175px;
    padding: 14px 34px;
    font-size: 13.5px;
}

/* =========================================================
   2. ABOUT SECTION ("PROTECT YOUR HOME WITH OUR EXPERT SOLUTIONS")
========================================================= */

.pbi-about {
    background: #fff;
    padding: 75px 0;
}

.pbi-about-grid {
    display: grid;
    grid-template-columns: 1.15fr .85fr;
    gap: 55px;
    align-items: center;
}

.pbi-about-content .pbi-title {
    text-align: left;
    margin-bottom: 20px;
}

.pbi-about-content .pbi-title .small-title {
    font-size: 13px;
    letter-spacing: 1.5px;
}

.pbi-about-content .pbi-title h2 {
    font-size: 33px;
    line-height: 1.18;
}

.pbi-about-content p {
    margin: 0 0 16px;
    color: #555;
    font-size: 15px;
    line-height: 1.8;
}

.pbi-check-list {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 14px 20px;
    margin: 26px 0 30px;
}

.pbi-check-list div {
    display: flex;
    align-items: center;
    color: #333;
    font-size: 14.5px;
    font-weight: 700;
}

.pbi-check-list i {
    color: var(--pbi-green);
    margin-right: 9px;
    font-size: 17px;
}

.pbi-about-btn {
    font-size: 13.5px;
    padding: 14px 32px;
}

/* INSPECTOR CARD */

.pbi-inspector {
    overflow: hidden;
    background: #fff;
    box-shadow: 0 6px 28px rgba(0,0,0,.13);
    border: 1px solid #e5e5e5;
    border-radius: 3px;
}

.pbi-inspector-title {
    background: #000000;
    color: #fff;
    padding: 12px;
    text-align: center;
    font-family: 'Inter', sans-serif;
    font-size: 14px;
    font-weight: 900;
    text-transform: uppercase;
    letter-spacing: 1.5px;
}

.pbi-inspector img {
    display: block;
    width: 100%;
    height: 440px;
    object-fit: cover;
    object-position: center;
}

.pbi-inspector-name {
    padding: 12px 10px;
    background: #fff;
    color: #222;
    text-align: center;
    font-size: 12px;
    font-weight: 800;
    line-height: 1.5;
    border-top: 1px solid #eee;
}

.pbi-inspector .pbi-btn {
    width: 100%;
    border-radius: 0;
    padding: 14px;
    font-size: 14px;
    font-weight: 800;
}

/* =========================================================
   3. VALUES / COMMITMENT GRADIENT SECTION
========================================================= */

.pbi-values {
    background: linear-gradient(
        135deg,
        #499B08 0%,
        #0D85FD 100%
    );
    color: #ffffff;
    padding: 70px 0;
}

.pbi-values-grid {
    display: grid;
    grid-template-columns: 1.15fr 0.9fr 0.9fr;
    gap: 28px;
    align-items: stretch;
}

.pbi-values-intro {
    padding: 10px 15px 10px 0;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.pbi-values-intro .small-title {
    font-size: 13px;
    font-weight: 800;
    letter-spacing: 1.5px;
    text-transform: uppercase;
    color: #ffffff;
    margin-bottom: 8px;
}

.pbi-values-intro h2 {
    margin: 0 0 16px;
    color: #ffffff;
    font-family: 'Inter', sans-serif;
    font-size: clamp(26px, 2.8vw, 34px);
    line-height: 1.2;
    font-weight: 900;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.pbi-values-intro p {
    max-width: 440px;
    margin: 0;
    color: rgba(255, 255, 255, 0.95);
    font-size: 15px;
    line-height: 1.75;
}

.pbi-values-divider {
    width: 65px;
    height: 2px;
    background: rgba(255, 255, 255, 0.45);
    margin-top: 25px;
    border-radius: 2px;
}

.pbi-value-card {
    padding: 42px 28px;
    background: #ffffff;
    color: #222222;
    text-align: center;
    border-radius: 8px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.12);
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    transition: transform 0.25s ease, box-shadow 0.25s ease;
}

.pbi-value-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 14px 34px rgba(0, 0, 0, 0.18);
}

.pbi-value-icon {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 62px;
    height: 62px;
    margin: 0 auto 20px;
    background: #499B08;
    color: #ffffff;
    border-radius: 10px;
    font-size: 28px;
}

.pbi-value-card h3 {
    margin: 0 0 12px;
    color: #05213F;
    font-family: 'Inter', sans-serif;
    font-size: 17px;
    font-weight: 900;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.pbi-value-card p {
    margin: 0;
    color: #333333;
    font-size: 14px;
    line-height: 1.65;
}

/* =========================================================
   4. STATS COUNTER BAR
========================================================= */

.pbi-stats {
    padding: 42px 0;
    background: #fff;
    border-bottom: 1px solid #DCDDE8;
}

.pbi-stats-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    max-width: 1020px;
    margin: auto;
}

.pbi-stat {
    text-align: center;
    border-right: 1px solid #DCDDE8;
    padding: 8px 18px;
}

.pbi-stat:last-child {
    border-right: none;
}

.pbi-stat strong,
.pbi-stat strong span,
.pbi-stat-number,
.pbi-stat-number span {
    display: block;
    margin-bottom: 6px;
    color: var(--pbi-green, #499B08) !important;
    font-family: 'Inter', sans-serif !important;
    font-size: 46px !important;
    font-weight: 900 !important;
    line-height: 1 !important;
    letter-spacing: -0.5px;
}

.pbi-stat-label,
.pbi-stat > span:not([data-counter]) {
    display: block;
    color: #05213F !important;
    font-family: 'Inter', sans-serif !important;
    font-size: 14.5px !important;
    font-weight: 800 !important;
    text-transform: uppercase;
    letter-spacing: 1.2px;
}

/* =========================================================
   5. OUR SERVICES SECTION (3x3 GRID)
========================================================= */

.pbi-services {
    background: var(--pbi-light);
    padding: 75px 0;
}

.pbi-services-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 25px;
}

.pbi-service-card {
    overflow: hidden;
    background: #fff;
    border: 1px solid #e2e7eb;
    border-radius: 3px;
    box-shadow: 0 3px 12px rgba(0,0,0,.08);
    transition: all .3s ease;
    display: flex;
    flex-direction: column;
}

.pbi-service-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 10px 24px rgba(0,0,0,.13);
}

.pbi-service-image {
    width: 100%;
    height: 220px;
    overflow: hidden;
    background: #ddd;
}

.pbi-service-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    transition: transform .4s ease;
}

.pbi-service-card:hover .pbi-service-image img {
    transform: scale(1.05);
}

.pbi-service-content {
    padding: 22px 20px;
    flex: 1;
    display: flex;
    flex-direction: column;
}

.pbi-service-content h3 {
    margin: 0 0 12px;
    color: var(--pbi-navy);
    font-family: 'Inter', sans-serif;
    font-size: 16.5px;
    font-weight: 800;
    line-height: 1.35;
    min-height: 44px;
}

.pbi-service-content p {
    margin: 0 0 18px;
    color: #666;
    font-size: 13.5px;
    line-height: 1.7;
    min-height: 68px;
    flex: 1;
}

.pbi-service-content .pbi-btn {
    align-self: flex-start;
    padding: 10px 22px;
    font-size: 12px;
    font-weight: 800;
}

/* =========================================================
   6. SAFE & ECO MEASURES FEATURE SECTION
========================================================= */

.pbi-feature {
    margin: 0 auto;
    background: linear-gradient(
        180deg,
        #d4edc0 0%,
        #edf7e9 45%,
        #ffffff 100%
    );
    border-radius: 30px 30px 0 0;
    padding: 60px 0 55px;
}

.pbi-feature .pbi-title {
    margin-bottom: 35px;
}

.pbi-feature .pbi-title .small-title {
    font-size: 13px;
    letter-spacing: 1.5px;
}

.pbi-feature .pbi-title h2 {
    font-size: 34px;
}

.pbi-feature-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 25px;
}

.pbi-feature-item {
    padding: 10px 8px !important;
    text-align: center;
    background: transparent !important;
    box-shadow: none !important;
    border: none !important;
    transition: transform 0.3s ease;
}

.pbi-feature-item:hover {
    transform: translateY(-4px) !important;
    box-shadow: none !important;
    background: transparent !important;
}

.pbi-feature-item:hover .pbi-feature-icon {
    transform: scale(1.08);
}

.pbi-feature-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 48px;
    height: 48px;
    margin: 0 auto 16px;
    background: var(--pbi-green, #499B08);
    color: #fff;
    border-radius: 9px;
    font-size: 22px;
    box-shadow: none;
    transition: transform 0.3s ease;
}

.pbi-feature-item h4 {
    margin: 0 0 8px;
    color: var(--pbi-navy, #05213F);
    font-family: 'Inter', sans-serif;
    font-size: 15px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: .3px;
}

.pbi-feature-item p {
    margin: 0 auto;
    color: #4b5d6d;
    font-size: 13.5px;
    line-height: 1.55;
    max-width: 220px;
}

/* =========================================================
   7. SCHEDULE CTA BANNER
========================================================= */

.pbi-cta {
    position: relative;
    min-height: 560px;
    display: flex;
    align-items: center;
    color: #fff;
    background:
        linear-gradient(
            90deg,
            rgba(5, 33, 63, 0.96) 0%,
            rgba(5, 33, 63, 0.85) 45%,
            rgba(5, 33, 63, 0.30) 100%
        ),
        url('{{ asset('images/schedule.jpeg') }}') center right / cover no-repeat;
    padding: 110px 0;
}

.pbi-cta-content {
    position: relative;
    z-index: 2;
    max-width: 840px;
}

.pbi-cta h2 {
    margin: 0 0 20px;
    color: #fff;
    font-family: 'Inter', sans-serif;
    font-size: clamp(34px, 4.4vw, 54px);
    line-height: 1.15;
    font-weight: 900;
    text-transform: uppercase;
    letter-spacing: -0.5px;
    text-shadow: 0 3px 12px rgba(0, 0, 0, 0.3);
}

.pbi-cta p {
    max-width: 740px;
    margin: 0 0 32px;
    color: rgba(255, 255, 255, 0.96);
    font-size: 17.5px;
    line-height: 1.85;
}

.pbi-phone-btn {
    font-size: 16px;
    padding: 16px 38px;
    font-weight: 800;
    letter-spacing: 0.5px;
    border-radius: 4px;
}

/* =========================================================
   8. CONTACT FORM + MAP SECTION
========================================================= */

.pbi-contact-section {
    padding: 70px 0;
    background: #fff;
}

.pbi-contact-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 30px;
    align-items: stretch;
}

.pbi-form-box {
    background: #fff;
    padding: 30px 26px;
    border: 1px solid #e2e8eb;
    border-radius: 3px;
    box-shadow: 0 4px 16px rgba(0,0,0,.08);
}

.pbi-form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 14px;
    margin-bottom: 14px;
}

.pbi-form-box input,
.pbi-form-box select,
.pbi-form-box textarea {
    width: 100%;
    padding: 13px 16px;
    border: 1px solid #cbd5e1;
    border-radius: 4px;
    font-family: 'Inter', sans-serif;
    font-size: 15px;
    font-weight: 500;
    color: #000000;
    background: #edf2f7;
    transition: all .2s ease;
}

.pbi-form-box input::placeholder,
.pbi-form-box textarea::placeholder {
    color: #000000;
    opacity: 0.65;
    font-size: 15px;
    font-weight: 500;
}

.pbi-form-box input:focus,
.pbi-form-box select:focus,
.pbi-form-box textarea:focus {
    background: #ffffff;
    border-color: var(--pbi-green) !important;
    outline: none;
    box-shadow: 0 0 0 3px rgba(73,155,8,.15);
}

.pbi-form-box select {
    margin-bottom: 14px;
    height: 50px;
    color: #000000;
}

.pbi-form-box select option {
    color: #000000;
    font-size: 15px;
}

.pbi-form-box textarea {
    min-height: 110px;
    resize: vertical;
    margin-bottom: 18px;
}

.pbi-form-box .pbi-btn {
    width: 100%;
    height: 50px;
    font-size: 15.5px;
    font-weight: 800;
    text-transform: uppercase;
}

.pbi-map {
    min-height: 320px;
    overflow: hidden;
    border-radius: 3px;
    box-shadow: 0 4px 16px rgba(0,0,0,.08);
    border: 1px solid #e2e8eb;
}

.pbi-map iframe {
    width: 100%;
    height: 100%;
    min-height: 320px;
    border: 0;
    display: block;
}

/* =========================================================
   9. PRICING SECTION ("CHOOSE OUR BEST VALUE INSPECTION PACKAGES")
========================================================= */

.pbi-pricing {
    background: #fff;
    padding: 75px 0;
    border-top: 1px solid #edf1f4;
}

.pbi-pricing-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
}

.pbi-price-card {
    padding: 35px 20px;
    background: #fff;
    border: 1px solid #e2e8eb;
    border-radius: 3px;
    box-shadow: 0 3px 12px rgba(0,0,0,.08);
    text-align: center;
    transition: all .3s ease;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.pbi-price-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 24px rgba(0,0,0,.13);
    border-color: var(--pbi-green);
}

.pbi-price-icon {
    font-size: 32px;
    color: var(--pbi-navy);
    margin-bottom: 14px;
}

.pbi-price-card h3 {
    margin: 0;
    color: var(--pbi-navy);
    font-family: 'Inter', sans-serif;
    font-size: 15px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: .4px;
}

.pbi-price {
    margin: 14px 0 12px;
    color: var(--pbi-green);
    font-family: 'Inter', sans-serif;
    font-size: 36px;
    font-weight: 900;
    line-height: 1;
}

.pbi-price .price-from {
    display: block;
    font-size: 11px;
    font-weight: 700;
    color: #888;
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-bottom: 4px;
}

.pbi-price-features {
    margin: 0 0 16px;
    padding: 0;
    list-style: none;
}

.pbi-price-features li {
    margin: 7px 0;
    color: #555;
    font-size: 13.5px;
    line-height: 1.5;
}

.pbi-price-card .pbi-btn {
    margin-top: 8px;
    padding: 12px 24px;
    font-size: 12px;
    font-weight: 800;
}


/* =========================================================
   RESPONSIVE QUERIES
========================================================= */

@media (max-width: 991px) {
    .pbi-about-grid {
        grid-template-columns: 1fr;
        gap: 40px;
    }

    .pbi-about-content .pbi-title {
        text-align: center;
    }

    .pbi-check-list {
        max-width: 500px;
        margin: 20px auto;
    }

    .pbi-about-content {
        text-align: center;
    }

    .pbi-inspector {
        max-width: 480px;
        margin: auto;
    }

    .pbi-values-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }

    .pbi-values-intro {
        text-align: center;
    }

    .pbi-values-intro p {
        margin: auto;
    }

    .pbi-values-divider {
        margin: 20px auto 0;
    }

    .pbi-services-grid {
        grid-template-columns: repeat(2, 1fr);
    }

    .pbi-feature-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
    }

    .pbi-pricing-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
    }

    .pbi-contact-grid {
        grid-template-columns: 1fr;
    }

    .pbi-hero-content h1 {
        font-size: 38px;
    }

    .pbi-title h2 {
        font-size: 28px;
    }
}

@media (max-width: 600px) {
    .pbi-section {
        padding: 50px 0;
    }

    .pbi-hero-content {
        padding: 50px 10px;
    }

    .pbi-hero-content h1 {
        font-size: 28px;
    }

    .pbi-title h2 {
        font-size: 24px;
    }

    .pbi-stats-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 15px;
    }

    .pbi-stat:nth-child(2) {
        border-right: none;
    }

    .pbi-stat {
        border-bottom: 1px solid #e0e6ec;
        padding-bottom: 15px;
    }

    .pbi-stat:nth-child(3),
    .pbi-stat:nth-child(4) {
        border-bottom: none;
    }

    .pbi-services-grid {
        grid-template-columns: 1fr;
    }

    .pbi-feature-grid {
        grid-template-columns: 1fr;
    }

    .pbi-pricing-grid {
        grid-template-columns: 1fr;
    }

    .pbi-form-row {
        grid-template-columns: 1fr;
    }

    .pbi-check-list {
        grid-template-columns: 1fr;
        gap: 10px;
    }

    .pbi-cta h2 {
        font-size: 28px;
    }
}
</style>


<div class="pbi-home">

{{-- =========================================================
     1. HERO SECTION
========================================================= --}}
<section class="pbi-hero">
    <div class="pbi-hero-content" data-aos="fade-up" data-aos-duration="850">
        <h1>
            Melbourne's Premier Building & Pest Inspections
        </h1>

        <p>
            Protect your investment with comprehensive building & pest reports delivered within 24 hours.
            Licensed & insured inspector with years of experience.
        </p>

        <div class="pbi-license animate-float" data-aos="zoom-in" data-aos-delay="200">
            <strong>
                Building Inspector Licence No: IN-PS 74654
            </strong>
            <br>
            <strong>
                Domestic Builder Licence No: DB-L 100200
            </strong>
        </div>

        <div class="pbi-hero-buttons" data-aos="fade-up" data-aos-delay="300">
            <a href="tel:0466001551" class="pbi-btn btn-glow pulse-glow">
                <i class="fas fa-phone"></i>
                0466 001 551
            </a>

            <a href="#quote" class="pbi-btn btn-glow">
                <i class="fas fa-file-alt"></i>
                Get A Quote
            </a>
        </div>
    </div>
</section>


{{-- =========================================================
     2. ABOUT US ("PROTECT YOUR HOME WITH OUR EXPERT SOLUTIONS")
========================================================= --}}
<section class="pbi-section pbi-about">
    <div class="pbi-container">
        <div class="pbi-about-grid">

            <div class="pbi-about-content" data-aos="fade-right" data-aos-duration="800">
                <div class="pbi-title">
                    <div class="small-title">
                        Who We Are
                    </div>
                    <h2>
                        Protect Your Home With Our Expert Solutions.
                    </h2>
                </div>

                <p>
                    At Premium Building & Pest Inspections, we provide professional building and pest inspection services across Melbourne. Our experienced inspectors carefully assess properties to help you understand their condition before making important decisions.
                </p>

                <p>
                    Whether you are purchasing a property, building a new home, preparing to sell or require specialist inspection services, our detailed inspections provide clear information about potential defects, risks and maintenance requirements.
                </p>

                <div class="pbi-check-list">
                    <div data-aos="fade-up" data-aos-delay="100">
                        <i class="fas fa-check-circle"></i>
                        Licensed Inspectors
                    </div>
                    <div data-aos="fade-up" data-aos-delay="150">
                        <i class="fas fa-check-circle"></i>
                        Detailed Reports
                    </div>
                    <div data-aos="fade-up" data-aos-delay="200">
                        <i class="fas fa-check-circle"></i>
                        Modern Inspection Tools
                    </div>
                    <div data-aos="fade-up" data-aos-delay="250">
                        <i class="fas fa-check-circle"></i>
                        Melbourne Wide
                    </div>
                    <div data-aos="fade-up" data-aos-delay="300">
                        <i class="fas fa-check-circle"></i>
                        Experienced Service
                    </div>
                    <div data-aos="fade-up" data-aos-delay="350">
                        <i class="fas fa-check-circle"></i>
                        Professional Advice
                    </div>
                </div>

                <a href="{{ route('about') }}" class="pbi-btn pbi-about-btn btn-glow" data-aos="fade-up" data-aos-delay="400">
                    Discover More
                </a>
            </div>

            {{-- INSPECTOR CARD --}}
            <div class="pbi-inspector hover-lift" data-aos="fade-left" data-aos-duration="800">
                <div class="pbi-inspector-title">
                    THE INSPECTOR
                </div>

                <img
                    src="{{ asset('images/ronak gami.jpeg') }}"
                    alt="Ronak Gami Building Inspector"
                    title="Ronak Gami Building Inspector"
                >

                <div class="pbi-inspector-name">
                    RONAK GAMI | VBA LICENCE IN-PS 74654 | DOMESTIC BUILDER DB-L 100200
                </div>

                <a href="tel:0466001551" class="pbi-btn btn-glow pulse-glow">
                    <i class="fas fa-phone"></i>
                    0466 001 551
                </a>
            </div>


        </div>
    </div>
</section>


{{-- =========================================================
     3. VALUES / COMMITMENT TO EXCELLENCE
========================================================= --}}
<section class="pbi-section pbi-values">
    <div class="pbi-container">
        <div class="pbi-values-grid">

            <div class="pbi-values-intro" data-aos="fade-up">
                <div class="small-title">
                    Our Value
                </div>
                <h2>
                    Our Commitment to Excellence
                </h2>
                <p>
                    At Premium Building &amp; Pest Inspections, we believe in providing the highest level of service to our clients. Our vision and mission reflect our dedication to quality, integrity, and customer satisfaction. Here's what drives us
                </p>
                <div class="pbi-values-divider"></div>
            </div>

            <div class="pbi-value-card hover-lift" data-aos="fade-up" data-aos-delay="100">
                <div class="pbi-value-icon">
                    <i class="far fa-eye"></i>
                </div>
                <h3>
                    Our Vision
                </h3>
                <p>
                    To be the leading provider of top-quality building inspections, ensuring safer and more secure homes through advanced technology and expert service.
                </p>
            </div>

            <div class="pbi-value-card hover-lift" data-aos="fade-up" data-aos-delay="200">
                <div class="pbi-value-icon">
                    <i class="far fa-thumbs-up"></i>
                </div>
                <h3>
                    Our Mission
                </h3>
                <p>
                    To deliver precise and comprehensive building inspections, empowering clients with the information they need to protect and enhance their property investments.
                </p>
            </div>


        </div>
    </div>
</section>


{{-- =========================================================
     4. STATS COUNTER BAR
========================================================= --}}
<section class="pbi-stats">
    <div class="pbi-container">
        <div class="pbi-stats-grid">

            <div class="pbi-stat hover-lift" data-aos="zoom-in" data-aos-delay="50">
                <strong class="pbi-stat-number"><span data-counter="200" data-suffix="+">200+</span></strong>
                <span class="pbi-stat-label">Inspections</span>
            </div>

            <div class="pbi-stat hover-lift" data-aos="zoom-in" data-aos-delay="150">
                <strong class="pbi-stat-number"><span data-counter="2">2</span></strong>
                <span class="pbi-stat-label">Licences</span>
            </div>

            <div class="pbi-stat hover-lift" data-aos="zoom-in" data-aos-delay="250">
                <strong class="pbi-stat-number"><span data-counter="4.9" data-suffix="★">4.9★</span></strong>
                <span class="pbi-stat-label">Rating</span>
            </div>

            <div class="pbi-stat hover-lift" data-aos="zoom-in" data-aos-delay="350">
                <strong class="pbi-stat-number"><span data-counter="12" data-suffix="+">12+</span></strong>
                <span class="pbi-stat-label">Services</span>
            </div>


        </div>
    </div>
</section>


{{-- =========================================================
     5. OUR SERVICES (3x3 GRID - 9 SERVICES)
========================================================= --}}
<section class="pbi-section pbi-services" id="services">
    <div class="pbi-container">

        <div class="pbi-title" data-aos="fade-up">
            <div class="small-title">
                What We Offer
            </div>
            <h2>
                Our Services
            </h2>
        </div>

        <div class="pbi-services-grid">

            

            {{-- 1. Pre-Purchase Building and Pest Inspection --}}
            <div class="pbi-service-card hover-lift" data-aos="fade-up" data-aos-delay="50">
                <div class="pbi-service-image img-zoom-hover">
                    <img
                        src="{{ asset('images/pre-purchase.png') }}"
                        alt="Pre Purchase Building and Pest Inspection"
                        title="Pre Purchase Building and Pest Inspection"
                        loading="lazy"
                    >
                </div>
                <div class="pbi-service-content">
                    <h3>
                        Pre-Purchase Building and Pest Inspection
                    </h3>
                    <p>
                        Comprehensive building and pest inspection before purchasing a property. Identify defects, pest risks, moisture issues and other concerns.
                    </p>
                    <a href="{{ url('/services/pre-purchase-building-and-pest-inspection') }}" class="pbi-btn">
                        Learn More
                    </a>
                </div>
            </div>

            {{-- 2. Building Stage by Stage Inspection --}}
            <div class="pbi-service-card hover-lift" data-aos="fade-up" data-aos-delay="100">
                <div class="pbi-service-image img-zoom-hover">
                    <img
                        src="{{ asset('images/building-stage.jpg') }}"
                        alt="Building Stage by Stage Inspection"
                        title="Building Stage by Stage Inspection"
                        loading="lazy"
                    >
                </div>
                <div class="pbi-service-content">
                    <h3>
                        Building Stage by Stage Inspection
                    </h3>
                    <p>
                        Independent inspections throughout key construction stages to help identify issues before they become difficult or expensive to fix.
                    </p>
                    <a href="{{ url('/services/building-stage-by-stage-inspection') }}" class="pbi-btn">
                        Learn More
                    </a>
                </div>
            </div>

            {{-- 3. New Build Handover Inspection --}}
            <div class="pbi-service-card hover-lift" data-aos="fade-up" data-aos-delay="150">
                <div class="pbi-service-image img-zoom-hover">
                    <img
                        src="{{ asset('images/new-build-handover.jpg') }}"
                        alt="New Build Handover Inspection"
                        title="New Build Handover Inspection"
                        loading="lazy"
                    >
                </div>
                <div class="pbi-service-content">
                    <h3>
                        New Build Handover Inspection
                    </h3>
                    <p>
                        Detailed inspection before handover to identify defects, incomplete work and items requiring rectification.
                    </p>
                    <a href="{{ url('/services/new-build-handover-inspection') }}" class="pbi-btn">
                        Learn More
                    </a>
                </div>
            </div>

            {{-- 4. Rising Damp Inspection --}}
            <div class="pbi-service-card hover-lift" data-aos="fade-up" data-aos-delay="50">
                <div class="pbi-service-image img-zoom-hover">
                    <img
                        src="{{ asset('images/rising-damp.jpg') }}"
                        alt="Rising Damp Inspection"
                        title="Rising Damp Inspection"
                        loading="lazy"
                    >
                </div>
                <div class="pbi-service-content">
                    <h3>
                        Rising Damp Inspection
                    </h3>
                    <p>
                        Professional assessment of moisture and damp-related issues to help identify potential causes and property damage.
                    </p>
                    <a href="{{ url('/services/rising-damp-inspection') }}" class="pbi-btn">
                        Learn More
                    </a>
                </div>
            </div>

            {{-- 5. Pool Barrier Inspection --}}
            <div class="pbi-service-card hover-lift" data-aos="fade-up" data-aos-delay="100">
                <div class="pbi-service-image img-zoom-hover">
                    <img
                        src="{{ asset('images/pool-barrier.jpg') }}"
                        alt="Pool Barrier Inspection"
                        title="Pool Barrier Inspection"
                        loading="lazy"
                    >
                </div>
                <div class="pbi-service-content">
                    <h3>
                        Pool Barrier Inspection
                    </h3>
                    <p>
                        Pool barrier inspection to help identify visible safety and compliance concerns with your swimming pool barrier.
                    </p>
                    <a href="{{ url('/services/pool-barrier-inspection') }}" class="pbi-btn">
                        Learn More
                    </a>
                </div>
            </div>

            {{-- 6. Apartment Building Inspection --}}
            <div class="pbi-service-card hover-lift" data-aos="fade-up" data-aos-delay="150">
                <div class="pbi-service-image img-zoom-hover">
                    <img
                        src="{{ asset('images/apartment.jpeg') }}"
                        alt="Apartment Building Inspection"
                        title="Apartment Building Inspection"
                        loading="lazy"
                    >
                </div>
                <div class="pbi-service-content">
                    <h3>
                        Apartment Building Inspection
                    </h3>
                    <p>
                        Professional inspection services for apartments covering visible defects, moisture, structure and other property concerns.
                    </p>
                    <a href="{{ url('/services/apartment-building-inspection') }}" class="pbi-btn">
                        Learn More
                    </a>
                </div>
            </div>

            {{-- 7. Dilapidation Report --}}
            <div class="pbi-service-card hover-lift" data-aos="fade-up" data-aos-delay="50">
                <div class="pbi-service-image img-zoom-hover">
                    <img
                        src="{{ asset('images/dilapidation.jpg') }}"
                        alt="Dilapidation Report"
                        title="Dilapidation Report"
                        loading="lazy"
                    >
                </div>
                <div class="pbi-service-content">
                    <h3>
                        Dilapidation Report
                    </h3>
                    <p>
                        Detailed documentation of existing property conditions before nearby construction or works commence.
                    </p>
                    <a href="{{ url('/services/dilapidation-inspection') }}" class="pbi-btn">
                        Learn More
                    </a>
                </div>
            </div>

            {{-- 8. Vendor Inspection --}}
            <div class="pbi-service-card hover-lift" data-aos="fade-up" data-aos-delay="100">
                <div class="pbi-service-image img-zoom-hover">
                    <img
                        src="{{ asset('images/vendor.jpg') }}"
                        alt="Vendor Inspection"
                        title="Vendor Inspection"
                        loading="lazy"
                    >
                </div>
                <div class="pbi-service-content">
                    <h3>
                        Vendor Inspection
                    </h3>
                    <p>
                        Prepare your property for sale with an independent inspection that helps identify issues before they are raised by potential buyers.
                    </p>
                    <a href="{{ url('/services/vendor-inspection') }}" class="pbi-btn">
                        Learn More
                    </a>
                </div>
            </div>

            {{-- 9. Builders Warranty Inspection --}}
            <div class="pbi-service-card hover-lift" data-aos="fade-up" data-aos-delay="150">
                <div class="pbi-service-image img-zoom-hover">
                    <img
                        src="{{ asset('images/builders-warranty.jpg') }}"
                        alt="Builders Warranty Inspection"
                        title="Builders Warranty Inspection"
                        loading="lazy"
                    >
                </div>
                <div class="pbi-service-content">
                    <h3>
                        Builders Warranty Inspection
                    </h3>
                    <p>
                        Identify visible defects and construction concerns before applicable builder warranty periods expire.
                    </p>
                    <a href="{{ url('/services/builders-warranty-inspection') }}" class="pbi-btn">
                        Learn More
                    </a>
                </div>
            </div>

            

        </div>
    </div>
</section>


{{-- =========================================================
     6. SAFE & ENVIRONMENTALLY FRIENDLY MEASURES
========================================================= --}}
<section class="pbi-section pbi-feature">
    <div class="pbi-container">

        <div class="pbi-title" data-aos="fade-up">
            <div class="small-title">
                Why Choose Us
            </div>
            <h2>
                We Use Safe And Environmentally Friendly Measures
            </h2>
        </div>

        <div class="pbi-feature-grid">

            <div class="pbi-feature-item" data-aos="fade-up" data-aos-delay="100">
                <div class="pbi-feature-icon">
                    <i class="bi bi-hand-thumbs-up-fill"></i>
                </div>
                <h4>
                    Experienced Inspectors
                </h4>
                <p>
                    Certified professionals with extensive expertise.
                </p>
            </div>

            <div class="pbi-feature-item" data-aos="fade-up" data-aos-delay="200">
                <div class="pbi-feature-icon">
                    <i class="bi bi-search"></i>
                </div>
                <h4>
                    Advanced Technology
                </h4>
                <p>
                    Utilizing the latest tools for precise assessments.
                </p>
            </div>

            <div class="pbi-feature-item" data-aos="fade-up" data-aos-delay="300">
                <div class="pbi-feature-icon">
                    <i class="bi bi-file-earmark-text-fill"></i>
                </div>
                <h4>
                    Detailed Reports
                </h4>
                <p>
                    Clear, comprehensive reports with actionable insights.
                </p>
            </div>

            <div class="pbi-feature-item" data-aos="fade-up" data-aos-delay="400">
                <div class="pbi-feature-icon">
                    <i class="bi bi-shield-check"></i>
                </div>
                <h4>
                    Customer Focused
                </h4>
                <p>
                    Exceptional support throughout the process.
                </p>
            </div>


        </div>
    </div>
</section>


{{-- =========================================================
     7. SCHEDULE YOUR INSPECTION TODAY (BANNER)
========================================================= --}}
<section class="pbi-section pbi-cta">
    <div class="pbi-container">
        <div class="pbi-cta-content" data-aos="zoom-in" data-aos-duration="800">
            <h2>
                Schedule Your Inspection Today
            </h2>
            <p>
                Don't wait to ensure your property is safe and sound. Contact Premium Building & Pest Inspections now to book a comprehensive evaluation and gain the peace of mind you deserve.
            </p>
            <a href="tel:0466001551" class="pbi-btn pbi-phone-btn btn-glow pulse-glow">
                <i class="fas fa-phone-volume"></i>
                0466 001 551
            </a>
        </div>
    </div>
</section>


{{-- =========================================================
     8. CONTACT FORM + CLYDE NORTH GOOGLE MAP
========================================================= --}}
<section class="pbi-section pbi-contact-section" id="quote">
    <div class="pbi-container">
        <div class="pbi-contact-grid">

            <div class="pbi-form-box hover-lift" data-aos="fade-right" data-aos-duration="800">
                <form action="{{ route('quote.store') }}" method="POST">
                    @csrf

                    <div class="pbi-form-row">
                        <input
                            type="text"
                            name="name"
                            placeholder="Name"
                            required
                        >
                        <input
                            type="email"
                            name="email"
                            placeholder="Email"
                            required
                        >
                    </div>

                    <div class="pbi-form-row">
                        <input
                            type="tel"
                            name="phone"
                            placeholder="Phone"
                            required
                        >
                        <input
                            type="text"
                            name="address"
                            placeholder="Address"
                        >
                    </div>

                    <select name="service" required>
                        <option value="">
                            Select Inspection Service
                        </option>
                        <option value="Pre-Purchase Building and Pest Inspection">
                            Pre-Purchase Building & Pest Inspection
                        </option>
                        <option value="Building Stage by Stage Inspection">
                            Building Stage by Stage Inspection
                        </option>
                        <option value="New Build Handover Inspection">
                            New Build Handover Inspection
                        </option>
                        <option value="Rising Damp Inspection">
                            Rising Damp Inspection
                        </option>
                        <option value="Pool Barrier Inspection">
                            Pool Barrier Inspection
                        </option>
                        <option value="Apartment Building Inspection">
                            Apartment Building Inspection
                        </option>
                        <option value="Dilapidation Report">
                            Dilapidation Report
                        </option>
                        <option value="Vendor Inspection">
                            Vendor Inspection
                        </option>
                        <option value="Builders Warranty Inspection">
                            Builders Warranty Inspection
                        </option>
                    </select>

                    <textarea
                        name="message"
                        placeholder="Message"
                    ></textarea>

                    <button type="submit" class="pbi-btn btn-glow">
                        Get My Quote
                    </button>
                </form>
            </div>

            <div class="pbi-map" data-aos="fade-left" data-aos-duration="800">
                <iframe
                    src="https://www.google.com/maps?q=Clyde%20North%20VIC%203978&output=embed"
                    loading="lazy"
                    allowfullscreen
                    referrerpolicy="no-referrer-when-downgrade"
                ></iframe>
            </div>


        </div>
    </div>
</section>


{{-- =========================================================
     9. PRICING ("CHOOSE PACKAGE")
========================================================= --}}
<section class="pbi-section pbi-pricing">
    <div class="pbi-container">

        <div class="pbi-title" data-aos="fade-up">
            <div class="small-title">
                Choose Package
            </div>
            <h2>
                Defending Your Space, Full Inspection at a Time
            </h2>
        </div>

        <div class="pbi-pricing-grid">

            {{-- 1. Building & Pest Inspection --}}
            <div class="pbi-price-card hover-lift" data-aos="fade-up" data-aos-delay="100">
                <div>
                    <div class="pbi-price-icon">
                        <i class="fas fa-home"></i>
                    </div>
                    <h3>
                        Building &amp; Pest Inspection
                    </h3>
                    <div class="pbi-price">
                        <span class="price-from">From</span>
                        $400
                    </div>
                    <ul class="pbi-price-features">
                        <li>Comprehensive Inspection</li>
                        <li>Building &amp; Pest Report</li>
                    </ul>
                </div>
                <a href="{{ route('contact') }}" class="pbi-btn btn-glow">
                    Get Started
                </a>
            </div>

            {{-- 2. Pool Barrier Inspection --}}
            <div class="pbi-price-card hover-lift" data-aos="fade-up" data-aos-delay="200">
                <div>
                    <div class="pbi-price-icon">
                        <i class="fas fa-swimming-pool"></i>
                    </div>
                    <h3>
                        Pool Barrier Inspection
                    </h3>
                    <div class="pbi-price">
                        <span class="price-from">From</span>
                        $250
                    </div>
                    <ul class="pbi-price-features">
                        <li>Safety Barrier Inspection</li>
                        <li>Compliance Certificate / Report</li>
                    </ul>
                </div>
                <a href="{{ route('contact') }}" class="pbi-btn btn-glow">
                    Get Started
                </a>
            </div>

            {{-- 3. Building Handover Inspection --}}
            <div class="pbi-price-card hover-lift" data-aos="fade-up" data-aos-delay="300">
                <div>
                    <div class="pbi-price-icon">
                        <i class="far fa-building"></i>
                    </div>
                    <h3>
                        Building Handover Inspection
                    </h3>
                    <div class="pbi-price">
                        <span class="price-from">From</span>
                        $450
                    </div>
                    <ul class="pbi-price-features">
                        <li>New Build Defect Check</li>
                        <li>Full Handover Report</li>
                    </ul>
                </div>
                <a href="{{ route('contact') }}" class="pbi-btn btn-glow">
                    Get Started
                </a>
            </div>

            {{-- 4. Others Inspection --}}
            <div class="pbi-price-card hover-lift" data-aos="fade-up" data-aos-delay="400">
                <div>
                    <div class="pbi-price-icon">
                        <i class="fas fa-clipboard-list"></i>
                    </div>
                    <h3>
                        Others Inspection
                    </h3>
                    <div class="pbi-price">
                        <span class="price-from">From</span>
                        TBA
                    </div>
                    <ul class="pbi-price-features">
                        <li>Custom Inspection Services</li>
                        <li>Contact For Pricing</li>
                    </ul>
                </div>
                <a href="{{ route('contact') }}" class="pbi-btn btn-glow">
                    Get Started
                </a>
            </div>

        </div>

    </div>
</section>



</div>


<script>
document.addEventListener('DOMContentLoaded', function () {

    /* =========================================
       SMOOTH SCROLL FOR IN-PAGE ANCHORS
    ========================================= */
    document.querySelectorAll('a[href^="#"]').forEach(function (link) {
        link.addEventListener('click', function (e) {
            const targetId = this.getAttribute('href');
            if (targetId && targetId !== '#') {
                const target = document.querySelector(targetId);
                if (target) {
                    e.preventDefault();
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            }
        });
    });

});
</script>

@endsection