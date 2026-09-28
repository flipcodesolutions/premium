<!DOCTYPE html>
<html lang="en">

<head>

    <!-- =====================================================
         BASIC META
    ====================================================== -->

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token"
          content="{{ csrf_token() }}">

    <meta name="description"
          content="Premium Building & Pest Inspections provides professional building and pest inspection services across Melbourne and Victoria.">

    <meta name="keywords"
          content="building inspection, pest inspection, pre purchase inspection, Melbourne building inspector, property inspection">

    <meta name="author"
          content="Premium Building & Pest Inspections">


    <!-- =====================================================
         PAGE TITLE
    ====================================================== -->

    <title>
        @yield('title', 'Premium Building & Pest Inspections')
    </title>


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

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&family=Poppins:wght@400;500;600;700&family=Oswald:wght@400;500;600;700&display=swap"
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

            --primary-color: #0B3158;

            --secondary-color: #123F67;

            --green-color: #43A900;

            --green-dark: #329000;

            --green-light: #eaf6df;

            --blue-color: #168DD1;

            --white-color: #ffffff;

            --light-color: #f2f6fa;

            --lighter-color: #f7f9fb;

            --text-color: #526477;

            --dark-text: #162B40;

            --border-color: #dfe7ee;

            --transition: all 0.3s ease;

        }


        /* =================================================
           GLOBAL ANIMATION UTILITIES
        ================================================= */

        .hover-lift {
            transition: transform 0.35s cubic-bezier(0.165, 0.84, 0.44, 1), box-shadow 0.35s cubic-bezier(0.165, 0.84, 0.44, 1) !important;
        }

        .hover-lift:hover {
            transform: translateY(-7px) !important;
            box-shadow: 0 16px 36px rgba(11, 49, 88, 0.12) !important;
        }

        .img-zoom-hover {
            overflow: hidden;
        }

        .img-zoom-hover img {
            transition: transform 0.5s ease;
        }

        .img-zoom-hover:hover img {
            transform: scale(1.06);
        }

        .btn-glow {
            transition: all 0.3s ease;
        }

        .btn-glow:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 22px rgba(67, 169, 0, 0.38) !important;
        }

        @keyframes floatBadge {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-7px);
            }
        }

        .animate-float {
            animation: floatBadge 3.5s ease-in-out infinite;
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


        body {

            font-family: 'Poppins', sans-serif;

            font-size: 14px;

            line-height: 1.7;

            color: var(--text-color);

            background: var(--white-color);

            overflow-x: hidden;

            width: 100%;

            position: relative;

        }


        /* =================================================
           HEADINGS
        ================================================= */

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {

            font-family: 'Montserrat', sans-serif;

            color: var(--primary-color);

            font-weight: 800;

            line-height: 1.2;

        }


        /*
         * Condensed heading utility
         * Used on pages matching the reference design.
         */

        .heading-condensed {

            font-family: 'Oswald', sans-serif;

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

            font-family: 'Poppins', sans-serif;

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
                    110deg,
                    #43A900 0%,
                    #299C93 50%,
                    #168DD1 100%
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

            box-shadow: 0 0 0 .15rem rgba(67,169,0,.12) !important;

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
         AOS ANIMATION JS (Animate On Scroll)
    ====================================================== -->

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            if (typeof AOS !== 'undefined') {
                AOS.init({
                    duration: 750,
                    easing: 'ease-out-cubic',
                    once: true,
                    offset: 50
                });
            }
        });
    </script>


    <!-- =====================================================
         PAGE SPECIFIC JS
    ====================================================== -->

    @stack('scripts')


</body>

</html>