@extends('layouts.app')

@section('title', 'Gallery | Premium Building & Pest Inspections')
@section('meta_description', 'Browse photographic examples of building defects, termite damage, moisture issues, and structural inspection findings from Melbourne inspections.')

@section('content')

{{-- =========================================================
     01. HERO SECTION
========================================================= --}}
<section class="gallery-hero">
    <div class="container">
        <div class="gallery-hero-card" data-aos="fade-up" data-aos-duration="800">
            <h1>GALLERY</h1>
            <p>
                Explore our gallery to see snapshots of our professional property inspections and the detailed reports we provide.
            </p>
        </div>
    </div>
</section>


{{-- =========================================================
     02. GALLERY GRID SECTION
========================================================= --}}
<section class="gallery-section">
    <div class="container">

        <div class="gallery-grid">

            @if(!empty($galleryItems) && count($galleryItems) > 0)
                @foreach($galleryItems as $item)
                    <div class="gallery-card" data-aos="fade-up" data-aos-duration="600" data-aos-delay="{{ ($loop->index % 3 + 1) * 70 }}">
                        <a href="{{ $item['image'] }}"
                           data-fancybox="gallery"
                           data-caption="<div class='gallery-lb-caption'><div class='gallery-lb-title'>{{ htmlspecialchars($item['title'], ENT_QUOTES) }}</div><div class='gallery-lb-desc'>{{ htmlspecialchars($item['description'], ENT_QUOTES) }}</div></div>"
                           class="gallery-link-wrap"
                           title="{{ $item['title'] }}">
                            <div class="gallery-img-wrapper">
                                <img src="{{ $item['image'] }}"
                                     alt="{{ $item['title'] }}"
                                     title="{{ $item['title'] }}"
                                     loading="lazy">
                                <div class="gallery-hover-overlay">
                                    <span class="gallery-zoom-icon">
                                        <i class="bi bi-arrows-fullscreen"></i>
                                    </span>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            @else
                <div class="text-center py-5 w-100">
                    <p class="text-muted">No gallery photos currently available.</p>
                </div>
            @endif

        </div>

    </div>
</section>


{{-- =========================================================
     PAGE CSS & FANCYBOX STYLING
========================================================= --}}
<!-- Fancybox 5 Stylesheet -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />

<style>
    /* ---------------------------------------------------------
       HERO SECTION
    --------------------------------------------------------- */
    .gallery-hero {
        min-height: 420px;
        display: flex;
        align-items: center;
        position: relative;
        padding: 60px 0;
        background:
            linear-gradient(
                rgba(4, 45, 78, 0.75),
                rgba(4, 45, 78, 0.75)
            ),
            url("{{ asset('images/service banner.jpg') }}")
            center center / cover no-repeat;
    }

    .gallery-hero-card {
        max-width: 720px;
        margin: 0 auto;
        text-align: center;
        color: #ffffff;
        padding: 40px 32px;
        background: rgba(4, 38, 67, 0.72);
        border-radius: 8px;
        backdrop-filter: blur(2px);
    }

    .gallery-hero-card h1 {
        font-family: 'Inter', sans-serif;
        color: #ffffff;
        font-size: 38px;
        font-weight: 900;
        line-height: 1.1;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin: 0 0 14px;
    }

    .gallery-hero-card p {
        color: rgba(255, 255, 255, 0.95);
        font-size: 14.5px;
        line-height: 1.7;
        margin: 0 auto;
        max-width: 620px;
    }

    /* ---------------------------------------------------------
       GALLERY GRID SECTION
    --------------------------------------------------------- */
    .gallery-section {
        background: #ffffff;
        padding: 75px 0 95px;
    }

    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 25px;
    }

    .gallery-card {
        background: #ffffff;
        border-radius: 6px;
        overflow: hidden;
        border: 1px solid #e9edf2;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
        transition: transform 0.38s cubic-bezier(0.165, 0.84, 0.44, 1), box-shadow 0.38s cubic-bezier(0.165, 0.84, 0.44, 1);
    }

    .gallery-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 16px 36px rgba(4, 38, 67, 0.18);
    }

    .gallery-link-wrap {
        display: block;
        text-decoration: none;
        color: inherit;
        width: 100%;
        height: 100%;
        cursor: pointer;
    }

    .gallery-img-wrapper {
        position: relative;
        width: 100%;
        height: 340px;
        overflow: hidden;
        background: #f0f4f8;
    }

    .gallery-img-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        display: block;
        transition: transform 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
    }

    .gallery-card:hover .gallery-img-wrapper img {
        transform: scale(1.09);
    }

    /* HOVER OVERLAY */
    .gallery-hover-overlay {
        position: absolute;
        inset: 0;
        background: rgba(4, 38, 67, 0.42);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: opacity 0.35s ease;
    }

    .gallery-card:hover .gallery-hover-overlay {
        opacity: 1;
    }

    .gallery-zoom-icon {
        width: 48px;
        height: 48px;
        background: #499B08;
        color: #ffffff;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
        transform: scale(0.7) rotate(-15deg);
        transition: transform 0.35s cubic-bezier(0.34, 1.56, 0.64, 1);
        box-shadow: 0 6px 16px rgba(0,0,0,0.3);
    }

    .gallery-card:hover .gallery-zoom-icon {
        transform: scale(1.08) rotate(0deg);
    }

    /* ---------------------------------------------------------
       FANCYBOX LIGHTBOX CUSTOM STYLING (MATCHING EXACT LIVE SITE)
    --------------------------------------------------------- */
    .fancybox__backdrop {
        background: rgba(14, 20, 28, 0.94) !important;
        backdrop-filter: blur(4px);
    }

    /* Toolbar Header (Counter on left, Controls on right) */
    .fancybox__toolbar {
        padding: 12px 18px;
        color: #ffffff;
        background: transparent !important;
        text-shadow: 0 2px 6px rgba(0, 0, 0, 0.4);
    }

    .fancybox__infobar {
        font-family: 'Inter', sans-serif;
        font-size: 15px;
        font-weight: 600;
        color: #ffffff;
        letter-spacing: 0.5px;
        padding-left: 6px;
    }

    .fancybox__toolbar .f-button {
        color: #ffffff !important;
        width: 44px;
        height: 44px;
        font-size: 19px;
        transition: color 0.2s ease, transform 0.2s ease;
    }

    .fancybox__toolbar .f-button:hover {
        color: #8ed42b !important;
        transform: scale(1.1);
    }

    /* Next / Prev Navigation Chevrons */
    .fancybox__nav .f-button {
        width: 48px;
        height: 48px;
        border-radius: 50%;
        color: #ffffff !important;
        background: rgba(4, 33, 60, 0.5) !important;
        backdrop-filter: blur(2px);
        transition: background 0.25s ease, transform 0.25s ease;
    }

    .fancybox__nav .f-button:hover {
        background: rgba(67, 169, 0, 0.9) !important;
        transform: scale(1.08);
    }

    /* Centered Image Caption */
    .fancybox__caption {
        padding: 14px 20px 24px !important;
        text-align: center !important;
        background: transparent !important;
        max-width: 900px;
        margin: 0 auto;
    }

    .gallery-lb-caption {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        max-width: 820px;
        margin: 0 auto;
    }

    .gallery-lb-title {
        font-family: 'Inter', sans-serif;
        color: #ffffff;
        font-size: 18.5px;
        font-weight: 800;
        line-height: 1.35;
        margin-bottom: 5px;
        letter-spacing: 0.3px;
        text-shadow: 0 2px 8px rgba(0, 0, 0, 0.65);
    }

    .gallery-lb-desc {
        font-family: 'Inter', sans-serif;
        color: rgba(255, 255, 255, 0.94);
        font-size: 14.5px;
        font-weight: 400;
        line-height: 1.55;
        margin: 0;
        max-width: 760px;
        text-shadow: 0 2px 6px rgba(0, 0, 0, 0.65);
    }

    /* ---------------------------------------------------------
       RESPONSIVE
    --------------------------------------------------------- */
    @media (max-width: 991px) {
        .gallery-section {
            padding: 55px 0 75px;
        }

        .gallery-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 20px;
        }

        .gallery-img-wrapper {
            height: 310px;
        }

        .gallery-lb-title {
            font-size: 17px;
        }

        .gallery-lb-desc {
            font-size: 13.5px;
        }
    }

    @media (max-width: 767px) {
        .gallery-hero {
            min-height: 320px;
            padding: 40px 0;
        }

        .gallery-hero-card {
            padding: 30px 20px;
        }

        .gallery-hero-card h1 {
            font-size: 28px;
        }

        .gallery-hero-card p {
            font-size: 13.5px;
        }

        .gallery-section {
            padding: 40px 0 60px;
        }

        .gallery-grid {
            grid-template-columns: 1fr;
            gap: 18px;
        }

        .gallery-img-wrapper {
            height: 290px;
        }

        .gallery-lb-title {
            font-size: 16px;
        }

        .gallery-lb-desc {
            font-size: 13px;
        }
    }
</style>

@endsection

@push('scripts')
<!-- Fancybox 5 UMD Bundle -->
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    if (typeof Fancybox !== 'undefined') {
        Fancybox.bind('[data-fancybox="gallery"]', {
            Toolbar: {
                display: {
                    left: ["infobar"],
                    middle: [],
                    right: ["fullscreen", "iterateZoom", "share", "close"],
                },
                items: {
                    share: {
                        tpl: '<button class="f-button" title="Share" data-fancybox-share><i class="bi bi-share"></i></button>',
                        click: (fancybox) => {
                            const slide = fancybox.getSlide();
                            const titleEl = slide.caption ? document.createElement('div') : null;
                            if (titleEl) titleEl.innerHTML = slide.caption;
                            const shareText = titleEl ? titleEl.textContent : document.title;

                            if (navigator.share) {
                                navigator.share({
                                    title: shareText,
                                    url: slide.src
                                }).catch(() => {});
                            } else if (navigator.clipboard) {
                                navigator.clipboard.writeText(slide.src);
                                alert('Image link copied to clipboard!');
                            }
                        }
                    }
                }
            },
            Images: {
                zoom: true,
            },
            Thumbs: false,
            animated: true,
            dragToClose: true,
            showClass: "f-fadeIn",
            hideClass: "f-fadeOut",
            caption: function (fancybox, slide) {
                return slide.caption || "";
            }
        });
    }
});
</script>
@endpush