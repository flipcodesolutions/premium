<!DOCTYPE html>
<html lang="en-AU">

<head>

    <!-- =====================================================
         BASIC META & SEO
    ====================================================== -->

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token"
          content="{{ csrf_token() }}">

    <title>@yield('title', 'Premium Building & Pest Inspections | Trusted Reports')</title>

    <meta name="description"
          content="@yield('meta_description', 'Get expert building and pest inspections. We offer detailed reports and peace of mind for your property investment. Book your inspection today.')">

    <meta name="keywords"
          content="@yield('meta_keywords', 'building inspection, pest inspection, pre purchase inspection, Melbourne building inspector, property inspection, termites inspection, structural defects')">

    <meta name="robots"
          content="@yield('meta_robots', 'follow, index, max-snippet:-1, max-video-preview:-1, max-image-preview:large')">

    <meta name="author"
          content="Premium Building & Pest Inspections">

    <link rel="canonical"
          href="@yield('canonical_url', url()->current())">

    <!-- Open Graph / Facebook -->
    <meta property="og:locale" content="en_AU">
    <meta property="og:type" content="@yield('og_type', 'website')">
    <meta property="og:title" content="{!! htmlspecialchars(html_entity_decode(View::hasSection('title') ? View::getSection('title') : 'Premium Building & Pest Inspections | Trusted Reports', ENT_QUOTES, 'UTF-8'), ENT_QUOTES, 'UTF-8') !!}">
    <meta property="og:description" content="{!! htmlspecialchars(html_entity_decode(View::hasSection('meta_description') ? View::getSection('meta_description') : 'Get expert building and pest inspections. We offer detailed reports and peace of mind for your property investment. Book your inspection today.', ENT_QUOTES, 'UTF-8'), ENT_QUOTES, 'UTF-8') !!}">
    <meta property="og:url" content="@yield('og_url', url()->current())">
    <meta property="og:site_name" content="Premium Building & Pest Inspections">
    <meta property="og:updated_time" content="2026-05-04T07:29:53+00:00">
    <meta property="og:image" content="@yield('og_image', asset('images/logo.png'))">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{!! htmlspecialchars(html_entity_decode(View::hasSection('title') ? View::getSection('title') : 'Premium Building & Pest Inspections | Trusted Reports', ENT_QUOTES, 'UTF-8'), ENT_QUOTES, 'UTF-8') !!}">
    <meta name="twitter:description" content="{!! htmlspecialchars(html_entity_decode(View::hasSection('meta_description') ? View::getSection('meta_description') : 'Get expert building and pest inspections. We offer detailed reports and peace of mind for your property investment. Book your inspection today.', ENT_QUOTES, 'UTF-8'), ENT_QUOTES, 'UTF-8') !!}">
    <meta name="twitter:image" content="@yield('og_image', asset('images/logo.png'))">




    <!-- Preconnect / DNS Prefetch -->
    <link rel="dns-prefetch" href="//fonts.googleapis.com">
    <link rel="dns-prefetch" href="//www.googletagmanager.com">

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-5W2HM48L');</script>
    <!-- End Google Tag Manager -->

    <!-- Google tag (gtag.js) - Google Ads -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-17373755173"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'AW-17373755173');
    </script>

    <!-- Google tag (gtag.js) - Call conversion tag -->
    <script>
      gtag('config', 'AW-17373755173/xJlVCJ3N-5UbEKXuudxA', {
        'phone_conversion_number': '0466 001 551'
      });
    </script>

    <!-- Google tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-36HVBD3ZRY"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-36HVBD3ZRY');
    </script>

    <!-- Structured Data (Schema.org JSON-LD) -->
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@graph": [
        {
          "@@type": "Place",
          "@@id": "{{ url('/') }}/#place",
          "geo": {
            "@@type": "GeoCoordinates",
            "latitude": "-38.104789",
            "longitude": " 145.358324"
          },
          "hasMap": "https://www.google.com/maps/search/?api=1&query=-38.104789,145.358324",
          "address": {
            "@@type": "PostalAddress",
            "streetAddress": "37 Burlina Boulevard,",
            "addressLocality": "Clyde North",
            "addressRegion": "VIC",
            "postalCode": "3978",
            "addressCountry": "AU"
          }
        },
        {
          "@@type": [
            "ProfessionalService",
            "Organization"
          ],
          "@@id": "{{ url('/') }}/#organization",
          "name": "Premium Building & Pest Inspections",
          "url": "{{ url('/') }}",
          "email": "info@premiumbuildinginspections.com.au",
          "address": {
            "@@type": "PostalAddress",
            "streetAddress": "37 Burlina Boulevard,",
            "addressLocality": "Clyde North",
            "addressRegion": "VIC",
            "postalCode": "3978",
            "addressCountry": "AU"
          },
          "logo": {
            "@@type": "ImageObject",
            "@@id": "{{ url('/') }}/#logo",
            "url": "{{ asset('images/logo.png') }}",
            "contentUrl": "{{ asset('images/logo.png') }}",
            "caption": "Premium Building & Pest Inspections",
            "inLanguage": "en-AU",
            "width": "610",
            "height": "314"
          },
          "priceRange": "$$",
          "openingHours": [
            "Mo,Tu,We,Th,Fr 08:00-18:00",
            "Sa 08:00-16:00"
          ],
          "description": "Premium Building & Pest Inspections is your trusted partner for comprehensive building and pest inspections in Melbourne, Victoria, and nearby areas. Our certified inspectors are dedicated to protecting your investment by providing meticulous and easy-to-understand reports. We specialize in identifying structural defects, safety hazards, and pest infestations (including termites) so you can proceed with confidence. With our commitment to exceptional service and a keen eye for detail, we ensure you have all the information you need before you buy. Contact us today to schedule your inspection!",
          "legalName": "Premium Building & Pest Inspections",
          "location": {
            "@@id": "{{ url('/') }}/#place"
          },
          "image": {
            "@@id": "{{ url('/') }}/#logo"
          },
          "telephone": "+61466001551"
        },
        {
          "@@type": "WebSite",
          "@@id": "https://premiumbuildinginspections.com.au/#website",
          "url": "{{ url('/') }}",
          "name": "Premium Building & Pest Inspections",
          "alternateName": "Premium Building & Pest Inspections",
          "publisher": {
            "@@id": "{{ url('/') }}/#organization"
          },
          "inLanguage": "en-AU",
          "potentialAction": {
            "@@type": "SearchAction",
            "target": "{{ url('/') }}/?s={search_term_string}",
            "query-input": "required name=search_term_string"
          }
        },
        {
          "@@type": "WebPage",
          "@@id": "{{ url()->current() }}/#webpage",
          "url": "{{ url()->current() }}",
          "name": "{!! addslashes(html_entity_decode(View::hasSection('title') ? View::getSection('title') : 'Premium Building & Pest Inspections | Trusted Reports', ENT_QUOTES, 'UTF-8')) !!}",
          "datePublished": "2024-07-09T18:49:30+00:00",
          "dateModified": "2026-05-04T07:29:53+00:00",
          "about": {
            "@@id": "{{ url('/') }}/#organization"
          },
          "isPartOf": {
            "@@id": "{{ url('/') }}/#website"
          },
          "inLanguage": "en-AU"
        }
      ]
    }
    </script>


    <!-- =====================================================
         FAVICON
    ====================================================== -->

    <link rel="icon"
          type="image/png"
          href="{{ asset('images/logo.png') }}">


    <!-- =====================================================
         GOOGLE FONTS
    ====================================================== -->

    <link rel="preconnect"
          href="https://fonts.googleapis.com">

    <link rel="preconnect"
          href="https://fonts.gstatic.com"
          crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Montserrat:wght@400;500;600;700;800;900&family=Poppins:wght@400;500;600;700&family=Oswald:wght@400;500;600;700&display=swap"
          rel="stylesheet">


    <!-- =====================================================
         BOOTSTRAP 5
    ====================================================== -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">


    <!-- =====================================================
         BOOTSTRAP ICONS
    ====================================================== -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
          rel="stylesheet">


    <!-- =====================================================
         FONT AWESOME
    ====================================================== -->

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">


    <!-- =====================================================
         AOS ANIMATION CSS (Animate On Scroll)
    ====================================================== -->

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css"
          rel="stylesheet">


    <!-- =====================================================
         GLOBAL CSS
    ====================================================== -->

    <style>

        /* =================================================
           ROOT VARIABLES
        ================================================= */

        :root {

            --primary-color: #063464;

            --secondary-color: #05213F;

            --navy-dark: #03162B;

            --green-color: #499B08;

            --green-dark: #387c06;

            --green-light: rgba(73, 155, 8, 0.1);

            --blue-color: #0D85FD;

            --white-color: #ffffff;

            --light-color: #EEF3FA;

            --lighter-color: #F5F5F7;

            --text-color: #526477;

            --muted-color: #8299B1;

            --dark-text: #05213F;

            --border-color: #DCDDE8;

            --transition: all 0.3s ease;

        }


        /* =================================================
           GLOBAL ANIMATION UTILITIES
        ================================================= */

        .hover-lift {
            transition: transform 0.38s cubic-bezier(0.165, 0.84, 0.44, 1), box-shadow 0.38s cubic-bezier(0.165, 0.84, 0.44, 1), border-color 0.3s ease !important;
            will-change: transform, box-shadow;
        }

        .hover-lift:hover {
            transform: translateY(-8px) !important;
            box-shadow: 0 20px 40px rgba(11, 49, 88, 0.14) !important;
        }

        /* Micro-interactions for icons inside cards */
        .hover-lift i,
        .hover-lift .pbi-service-icon i,
        .hover-lift .pbi-value-icon i,
        .hover-lift .pbi-price-icon i,
        .hover-lift .pbi-feature-icon i,
        .hover-lift .green-icon-box i {
            transition: transform 0.35s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        .hover-lift:hover i,
        .hover-lift:hover .pbi-service-icon i,
        .hover-lift:hover .pbi-value-icon i,
        .hover-lift:hover .pbi-price-icon i,
        .hover-lift:hover .pbi-feature-icon i,
        .hover-lift:hover .green-icon-box i {
            transform: scale(1.15) rotate(4deg);
        }

        .img-zoom-hover {
            overflow: hidden;
        }

        .img-zoom-hover img {
            transition: transform 0.6s cubic-bezier(0.165, 0.84, 0.44, 1), filter 0.4s ease;
            will-change: transform;
        }

        .img-zoom-hover:hover img,
        .hover-lift:hover .img-zoom-hover img,
        .hover-lift:hover .pbi-service-image img,
        .hover-lift:hover .service-card-image img {
            transform: scale(1.08);
        }

        /* Interactive Buttons with Shimmer Sheen */
        .btn-glow,
        .pbi-btn {
            position: relative;
            overflow: hidden;
            transition: all 0.35s cubic-bezier(0.165, 0.84, 0.44, 1);
            z-index: 1;
        }

        .btn-glow::before,
        .pbi-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -130%;
            width: 70%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.32), transparent);
            transform: skewX(-25deg);
            transition: left 0.8s ease;
            z-index: 2;
            pointer-events: none;
        }

        .btn-glow:hover::before,
        .pbi-btn:hover::before {
            left: 210%;
        }

        .btn-glow:hover,
        .pbi-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 24px rgba(73, 155, 8, 0.35) !important;
        }

        /* Subtle button icon interactions */
        .pbi-btn i,
        .btn i {
            display: inline-block;
            transition: transform 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        .pbi-btn:hover i.fa-phone,
        .pbi-btn:hover i.fa-phone-volume,
        .pbi-btn:hover i.fa-phone-alt,
        .btn:hover i.bi-telephone-fill {
            transform: rotate(14deg) scale(1.15);
        }

        .pbi-btn:hover i.fa-arrow-right,
        .pbi-btn:hover i.bi-arrow-right,
        .pbi-btn:hover i.fa-file-alt,
        .btn:hover i.fa-arrow-right,
        .btn:hover i.bi-arrow-right {
            transform: translateX(5px);
        }

        /* Breathing pulse animation */
        @keyframes pulseGreenGlow {
            0%, 100% {
                box-shadow: 0 0 0 0 rgba(73, 155, 8, 0.5);
            }
            50% {
                box-shadow: 0 0 0 12px rgba(73, 155, 8, 0);
            }
        }

        .pulse-glow,
        .pbi-phone-btn {
            animation: pulseGreenGlow 2.8s infinite;
        }

        @keyframes floatBadge {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-8px);
            }
        }

        .animate-float {
            animation: floatBadge 3.6s ease-in-out infinite;
        }

        /* Smooth stat numbers */
        .pbi-stat strong {
            display: inline-block;
            transition: transform 0.3s ease;
        }
        .pbi-stat:hover strong {
            transform: scale(1.08);
            color: var(--green-color);
        }


        /* =================================================
           GLOBAL RESET
        ================================================= */

        * {

            margin: 0;

            padding: 0;

            box-sizing: border-box;

        }


        html {

            scroll-behavior: smooth;

            scroll-padding-top: 100px;

            overflow-x: hidden;

            width: 100%;

        }


        /* Global typography default to Inter */
        body,
        h1, h2, h3, h4, h5, h6,
        input, button, select, textarea,
        p, a, label, li, td, th {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
        }

        body {

            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;

            font-size: 14.5px;

            line-height: 1.7;

            color: var(--text-color);

            background: var(--white-color);

            overflow-x: hidden;

            width: 100%;

            position: relative;

        }


        /* =================================================
           HEADINGS TYPOGRAPHY (H1 TO H6 FORMATTING)
        ================================================= */

        h1, h2, h3, h4, h5, h6,
        .h1, .h2, .h3, .h4, .h5, .h6 {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            color: var(--primary-color);
            margin-top: 0;
            margin-bottom: 0.65rem;
            text-rendering: optimizeLegibility;
            -webkit-font-smoothing: antialiased;
        }

        h1, .h1 {
            font-size: clamp(2rem, 3.2vw + 1rem, 2.75rem); /* ~32px to 44px */
            font-weight: 800;
            line-height: 1.18;
            letter-spacing: -0.025em;
            margin-bottom: 1rem;
        }

        h2, .h2 {
            font-size: clamp(1.65rem, 2vw + 0.85rem, 2.15rem); /* ~26px to 34px */
            font-weight: 800;
            line-height: 1.24;
            letter-spacing: -0.02em;
            margin-bottom: 0.85rem;
        }

        h3, .h3 {
            font-size: clamp(1.35rem, 1.3vw + 0.75rem, 1.65rem); /* ~21px to 26px */
            font-weight: 700;
            line-height: 1.3;
            letter-spacing: -0.015em;
            margin-bottom: 0.75rem;
        }

        h4, .h4 {
            font-size: clamp(1.15rem, 0.8vw + 0.68rem, 1.35rem); /* ~18px to 21px */
            font-weight: 700;
            line-height: 1.35;
            letter-spacing: -0.01em;
            margin-bottom: 0.65rem;
        }

        h5, .h5 {
            font-size: clamp(1rem, 0.5vw + 0.62rem, 1.15rem); /* ~16px to 18px */
            font-weight: 600;
            line-height: 1.4;
            letter-spacing: -0.005em;
            color: var(--secondary-color);
            margin-bottom: 0.5rem;
        }

        h6, .h6 {
            font-size: clamp(0.85rem, 0.3vw + 0.55rem, 0.95rem); /* ~13.5px to 15px */
            font-weight: 600;
            line-height: 1.45;
            letter-spacing: 0.025em;
            color: var(--secondary-color);
            margin-bottom: 0.5rem;
        }

        /* Heading Links & Hover */
        h1 a, h2 a, h3 a, h4 a, h5 a, h6 a,
        .h1 a, .h2 a, .h3 a, .h4 a, .h5 a, .h6 a {
            color: inherit;
            transition: var(--transition);
        }

        h1 a:hover, h2 a:hover, h3 a:hover, h4 a:hover, h5 a:hover, h6 a:hover,
        .h1 a:hover, .h2 a:hover, .h3 a:hover, .h4 a:hover, .h5 a:hover, .h6 a:hover {
            color: var(--green-color);
        }

        /*
         * Condensed heading utility
         * Used on pages matching the reference design.
         */

        .heading-condensed {

            font-family: 'Inter', sans-serif;

            font-weight: 700;

            text-transform: uppercase;

        }


        /* =================================================
           LINKS
        ================================================= */

        a {

            text-decoration: none;

            transition: var(--transition);

        }


        /* =================================================
           IMAGES & EMBEDDED MEDIA
        ================================================= */

        img,
        video,
        iframe,
        embed,
        object {

            max-width: 100%;

            height: auto;

        }

        table {

            max-width: 100%;

        }


        /* =================================================
           FORM ELEMENTS
        ================================================= */

        button,
        input,
        textarea,
        select {

            font-family: 'Inter', sans-serif;

            max-width: 100%;

        }


        /* =================================================
           SECTIONS
        ================================================= */

        section {

            scroll-margin-top: 100px;

        }


        /* =================================================
           CONTAINER
        ================================================= */

        .container {

            max-width: 1200px;

        }


        /* =================================================
           GLOBAL BUTTON
        ================================================= */

        .btn {

            border-radius: 3px;

            font-weight: 700;

            padding: 11px 22px;

            transition: var(--transition);

        }


        /* =================================================
           GREEN PRIMARY BUTTON
        ================================================= */

        .btn-primary-custom {

            background: var(--green-color);

            border: 2px solid var(--green-color);

            color: var(--white-color);

        }


        .btn-primary-custom:hover {

            background: var(--green-dark);

            border-color: var(--green-dark);

            color: var(--white-color);

            transform: translateY(-2px);

        }


        /* =================================================
           GREEN OUTLINE BUTTON
        ================================================= */

        .btn-green-outline {

            background: transparent;

            border: 2px solid var(--green-color);

            color: var(--green-color);

        }


        .btn-green-outline:hover {

            background: var(--green-color);

            color: var(--white-color);

        }


        /* =================================================
           WHITE OUTLINE BUTTON
        ================================================= */

        .btn-outline-custom {

            background: transparent;

            border: 2px solid var(--white-color);

            color: var(--white-color);

        }


        .btn-outline-custom:hover {

            background: var(--white-color);

            color: var(--primary-color);

        }


        /* =================================================
           SECTION COMMON
        ================================================= */

        .section-padding {

            padding: 75px 0;

        }


        .section-title {

            margin-bottom: 45px;

        }


        .section-subtitle {

            display: inline-block;

            color: var(--green-color);

            font-size: 11px;

            font-weight: 800;

            letter-spacing: 1.5px;

            text-transform: uppercase;

            margin-bottom: 10px;

        }


        .section-title h2 {

            font-size: 36px;

            margin-bottom: 15px;

        }


        .section-title p {

            max-width: 650px;

            margin: 0 auto;

            color: var(--text-color);

            font-size: 13px;

        }


        /* =================================================
           GREEN GRADIENT SECTION
        ================================================= */

        .green-blue-gradient {

            background:

                linear-gradient(
                    135deg,
                    #499B08 0%,
                    #0D85FD 100%
                );

        }


        /* =================================================
           COMMON CARD
        ================================================= */

        .premium-card {

            background: #fff;

            border: 1px solid var(--border-color);

            border-radius: 3px;

            box-shadow: 0 4px 15px rgba(11,49,88,.07);

            transition: var(--transition);

        }


        .premium-card:hover {

            transform: translateY(-4px);

            box-shadow: 0 10px 25px rgba(11,49,88,.12);

        }


        /* =================================================
           GREEN ICON BOX
        ================================================= */

        .green-icon-box {

            width: 42px;

            height: 42px;

            display: flex;

            align-items: center;

            justify-content: center;

            background: var(--green-color);

            color: #fff;

            border-radius: 4px;

        }


        /* =================================================
           SCROLL TO TOP
        ================================================= */

        #scrollTop {

            position: fixed;

            right: 20px;

            bottom: 20px;

            width: 40px;

            height: 40px;

            background: var(--green-color);

            color: var(--white-color);

            border: none;

            border-radius: 2px;

            display: none;

            align-items: center;

            justify-content: center;

            z-index: 9999;

            cursor: pointer;

            box-shadow: 0 5px 18px rgba(0,0,0,.18);

            transition: var(--transition);

        }


        #scrollTop:hover {

            background: var(--green-dark);

            transform: translateY(-2px);

        }


        /* =================================================
           SELECTION
        ================================================= */

        ::selection {

            background: var(--green-color);

            color: #fff;

        }


        /* =================================================
           FOCUS
        ================================================= */

        input:focus,
        textarea:focus,
        select:focus {

            border-color: var(--green-color) !important;

            box-shadow: 0 0 0 .15rem rgba(73, 155, 8, .15) !important;

            outline: none;

        }


        /* =================================================
           TABLET
        ================================================= */

        @media (max-width: 991px) {

            .section-padding {

                padding: 60px 0;

            }


            .section-title {

                margin-bottom: 35px;

            }


            .section-title h2 {

                font-size: 31px;

            }

        }


        /* =================================================
           MOBILE
        ================================================= */

        @media (max-width: 767px) {

            body {

                font-size: 13px;

            }

            h1, .h1 { font-size: 1.85rem; line-height: 1.22; margin-bottom: 0.75rem; }
            h2, .h2 { font-size: 1.5rem; line-height: 1.26; margin-bottom: 0.65rem; }
            h3, .h3 { font-size: 1.28rem; line-height: 1.3; margin-bottom: 0.55rem; }
            h4, .h4 { font-size: 1.12rem; line-height: 1.35; margin-bottom: 0.5rem; }
            h5, .h5 { font-size: 1rem; line-height: 1.4; margin-bottom: 0.45rem; }
            h6, .h6 { font-size: 0.875rem; line-height: 1.45; margin-bottom: 0.4rem; }

            .section-padding {

                padding: 50px 0;

            }


            .section-title {

                margin-bottom: 30px;

            }


            .section-title h2 {

                font-size: 27px;

            }


            .section-title p {

                font-size: 12px;

            }


            #scrollTop {

                right: 14px;

                bottom: 14px;

                width: 38px;

                height: 38px;

            }

        }


        /* =================================================
           SMALL MOBILE
        ================================================= */

        @media (max-width: 575px) {

            h1, .h1 { font-size: 1.65rem; line-height: 1.22; }
            h2, .h2 { font-size: 1.38rem; line-height: 1.25; }
            h3, .h3 { font-size: 1.2rem; line-height: 1.3; }
            h4, .h4 { font-size: 1.05rem; line-height: 1.35; }
            h5, .h5 { font-size: 0.95rem; line-height: 1.4; }
            h6, .h6 { font-size: 0.82rem; line-height: 1.45; }

            .section-padding {

                padding: 45px 0;

            }


            .section-title h2 {

                font-size: 24px;

            }


            .btn {

                padding: 10px 18px;

                font-size: 12px;

            }

        }

    </style>


    <!-- =====================================================
         PAGE SPECIFIC CSS
    ====================================================== -->

    @stack('styles')

</head>


<body>

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5W2HM48L"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->


    <!-- =====================================================
         NAVBAR
    ====================================================== -->

    @include('components.navbar')


    <!-- =====================================================
         MAIN CONTENT
    ====================================================== -->

    <main>

        @yield('content')

    </main>


    <!-- =====================================================
         FOOTER
    ====================================================== -->

    @include('components.footer')


    <!-- =====================================================
         SCROLL TO TOP
    ====================================================== -->

    <button
        id="scrollTop"
        type="button"
        aria-label="Scroll to top"
    >

        <i class="bi bi-arrow-up"></i>

    </button>


    <!-- =====================================================
         BOOTSTRAP JS
    ====================================================== -->

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    </script>


    <!-- =====================================================
         GLOBAL JAVASCRIPT
    ====================================================== -->

    <script>

        document.addEventListener('DOMContentLoaded', function () {


            /* =============================================
               SCROLL TOP BUTTON
            ============================================== */

            const scrollTopButton =
                document.getElementById('scrollTop');


            if (scrollTopButton) {

                window.addEventListener('scroll', function () {

                    if (window.scrollY > 400) {

                        scrollTopButton.style.display = 'flex';

                    } else {

                        scrollTopButton.style.display = 'none';

                    }

                });


                scrollTopButton.addEventListener(
                    'click',
                    function () {

                        window.scrollTo({

                            top: 0,

                            behavior: 'smooth'

                        });

                    }
                );

            }


            /* =============================================
               MOBILE NAVBAR AUTO CLOSE
            ============================================== */

            const navbarLinks =
                document.querySelectorAll(
                    '.navbar-nav .nav-link:not(.dropdown-toggle)'
                );


            const navbarCollapse =
                document.getElementById('mainNavbar');


            if (navbarCollapse) {

                navbarLinks.forEach(function (link) {

                    link.addEventListener(
                        'click',
                        function () {

                            if (
                                window.innerWidth < 992 &&
                                navbarCollapse.classList.contains('show')
                            ) {

                                const bsCollapse =
                                    bootstrap.Collapse.getInstance(
                                        navbarCollapse
                                    );

                                if (bsCollapse) {

                                    bsCollapse.hide();

                                }

                            }

                        }
                    );

                });

            }


            /* =============================================
               BOOTSTRAP DROPDOWN SUPPORT
            ============================================== */

            const dropdowns =
                document.querySelectorAll(
                    '.dropdown-toggle'
                );


            dropdowns.forEach(function (dropdown) {

                dropdown.addEventListener(
                    'click',
                    function () {

                        if (window.innerWidth < 992) {

                            const menu =
                                dropdown.nextElementSibling;

                            if (menu) {

                                menu.classList.toggle('show');

                            }

                        }

                    }
                );

            });

        });

    </script>


    <!-- =====================================================
         AOS ANIMATION JS & NUMBER COUNTER
    ====================================================== -->

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Initialize AOS
            if (typeof AOS !== 'undefined') {
                AOS.init({
                    duration: 800,
                    easing: 'ease-out-cubic',
                    once: true,
                    offset: 50
                });
            }

            // Smooth Number Counters via IntersectionObserver
            const counters = document.querySelectorAll('[data-counter]');
            if (counters.length && 'IntersectionObserver' in window) {
                const counterObserver = new IntersectionObserver((entries, observer) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            const el = entry.target;
                            const target = parseFloat(el.getAttribute('data-counter'));
                            const prefix = el.getAttribute('data-prefix') || '';
                            const suffix = el.getAttribute('data-suffix') || '';
                            const duration = 1600;
                            const startTime = performance.now();
                            const isDecimal = String(target).includes('.');

                            function updateCounter(currentTime) {
                                const elapsed = currentTime - startTime;
                                const progress = Math.min(elapsed / duration, 1);
                                // easeOutCubic curve
                                const ease = 1 - Math.pow(1 - progress, 3);
                                const current = target * ease;

                                el.textContent = prefix + (isDecimal ? current.toFixed(1) : Math.floor(current).toLocaleString()) + suffix;

                                if (progress < 1) {
                                    requestAnimationFrame(updateCounter);
                                } else {
                                    el.textContent = prefix + (isDecimal ? target.toFixed(1) : target.toLocaleString()) + suffix;
                                }
                            }

                            requestAnimationFrame(updateCounter);
                            observer.unobserve(el);
                        }
                    });
                }, { threshold: 0.25 });

                counters.forEach(counter => counterObserver.observe(counter));
            }
        });
    </script>


    <!-- =====================================================
         PAGE SPECIFIC JS
    ====================================================== -->

    @stack('scripts')


</body>

</html>