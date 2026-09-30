@extends('layouts.app')

@section('title', 'Gallery | Premium Building & Pest Inspections')

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

            {{-- 1. LOCAL IMAGES FROM public/images/g* --}}
            @if(!empty($localImages) && count($localImages) > 0)
                @foreach($localImages as $img)
                    <div class="gallery-card" data-aos="fade-up" data-aos-duration="600" data-aos-delay="{{ ($loop->index % 3 + 1) * 70 }}">
                        <div class="gallery-img-wrapper" onclick="openGalleryModal('{{ asset('images/' . $img) }}')">
                            <img src="{{ asset('images/' . $img) }}"
                                 alt="Premium Building & Pest Inspection Photo {{ $loop->iteration }}"
                                 loading="lazy">
                            <div class="gallery-hover-overlay">
                                <span class="gallery-zoom-icon">
                                    <i class="bi bi-arrows-fullscreen"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif

            {{-- 2. DATABASE GALLERY IMAGES (ONLY IF VALID IMAGE EXISTS ON DISK) --}}
            @if(!empty($galleries) && $galleries->count() > 0)
                @foreach($galleries as $gallery)
                    @if(!empty($gallery->image) && file_exists(public_path('storage/' . $gallery->image)))
                        <div class="gallery-card" data-aos="fade-up" data-aos-duration="600">
                            <div class="gallery-img-wrapper" onclick="openGalleryModal('{{ asset('storage/' . $gallery->image) }}')">
                                <img src="{{ asset('storage/' . $gallery->image) }}"
                                     alt="{{ $gallery->title ?? 'Building Inspection Photo' }}"
                                     loading="lazy">
                                <div class="gallery-hover-overlay">
                                    <span class="gallery-zoom-icon">
                                        <i class="bi bi-arrows-fullscreen"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            @endif

        </div>

    </div>
</section>


{{-- =========================================================
     IMAGE LIGHTBOX MODAL
========================================================= --}}
<div class="modal fade" id="galleryModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content bg-transparent border-0">
            <div class="modal-body p-0 position-relative text-center">
                <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3 z-3" data-bs-dismiss="modal" aria-label="Close"></button>
                <img id="galleryModalImg" src="" alt="Inspection Photo Large View" class="img-fluid rounded shadow-lg" style="max-height: 85vh; object-fit: contain;">
            </div>
        </div>
    </div>
</div>


{{-- =========================================================
     PAGE CSS
========================================================= --}}
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
        font-family: 'Montserrat', sans-serif;
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

    .gallery-img-wrapper {
        position: relative;
        width: 100%;
        height: 340px;
        overflow: hidden;
        background: #f0f4f8;
        cursor: pointer;
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
        background: #43a900;
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
    }
</style>


{{-- =========================================================
     PAGE SCRIPT (MODAL TRIGGER)
========================================================= --}}
<script>
    function openGalleryModal(src) {
        const modalImg = document.getElementById('galleryModalImg');
        if (modalImg) {
            modalImg.src = src;
            const modalEl = document.getElementById('galleryModal');
            if (modalEl && typeof bootstrap !== 'undefined') {
                const modal = bootstrap.Modal.getOrCreateInstance(modalEl);
                modal.show();
            }
        }
    }
</script>

@endsection