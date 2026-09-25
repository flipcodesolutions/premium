@extends('layouts.app')

@section('title', ($post->title ?? 'Blog Article') . ' | Premium Building & Pest Inspections')

@section('content')

{{-- =========================================================
     BLOG DETAIL HERO
========================================================= --}}

<section class="blog-detail-hero">

    <div class="container">

        <div class="blog-detail-hero-content">

            <div class="breadcrumb-area">

                <a href="{{ route('home') }}">
                    Home
                </a>

                <i class="bi bi-chevron-right"></i>

                <a href="{{ route('blog.index') }}">
                    Blog
                </a>

                <i class="bi bi-chevron-right"></i>

                <span>
                    Article
                </span>

            </div>


            @if($post->category)

                <span class="article-category">

                    {{ $post->category->name }}

                </span>

            @endif


            <h1>
                {{ $post->title }}
            </h1>


            <div class="article-meta">

                @if($post->published_at)

                    <span>

                        <i class="bi bi-calendar3"></i>

                        {{ $post->published_at->format('d M Y') }}

                    </span>

                @endif


                <span>

                    <i class="bi bi-shield-check"></i>

                    Premium Building & Pest Inspections

                </span>

            </div>

        </div>

    </div>

</section>


{{-- =========================================================
     ARTICLE CONTENT
========================================================= --}}

<section class="article-section">

    <div class="container">

        <div class="row g-5">


            {{-- =================================================
                 MAIN ARTICLE
            ================================================== --}}

            <div class="col-lg-8">

                <article class="article-content">


                    {{-- =================================================
                         FEATURED IMAGE
                    ================================================== --}}

                    <div class="article-featured-image">

                        @if($post->image)

                            <img
                                src="{{ \Illuminate\Support\Str::startsWith($post->image, ['http://', 'https://']) ? $post->image : asset('storage/' . $post->image) }}"
                                alt="{{ $post->title }}"
                            >

                        @else

                            <img
                                src="{{ asset('images/banner1.jpg') }}"
                                alt="{{ $post->title }}"
                            >

                        @endif

                    </div>


                    {{-- =================================================
                         EXCERPT
                    ================================================== --}}

                    @if($post->excerpt)

                        <div class="article-introduction">

                            {{ $post->excerpt }}

                        </div>

                    @endif


                    {{-- =================================================
                         CONTENT
                    ================================================== --}}

                    <div class="article-body">

                        @if($post->content)

                            {!! $post->content !!}

                        @else

                            <p>
                                This article provides useful property
                                inspection information to help property
                                buyers, sellers and homeowners make
                                informed decisions.
                            </p>

                        @endif

                    </div>


                    {{-- =================================================
                         ARTICLE FOOTER
                    ================================================== --}}

                    <div class="article-footer">

                        <div class="article-tags">

                            <span>
                                Property Inspection
                            </span>

                            <span>
                                Building Inspection
                            </span>

                            <span>
                                Property Advice
                            </span>

                        </div>


                        <div class="share-area">

                            <strong>
                                Share this article
                            </strong>

                            <div class="share-buttons">

                                <a
                                    href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}"
                                    target="_blank"
                                    rel="noopener"
                                    aria-label="Share on Facebook"
                                >
                                    <i class="bi bi-facebook"></i>
                                </a>


                                <a
                                    href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(request()->fullUrl()) }}"
                                    target="_blank"
                                    rel="noopener"
                                    aria-label="Share on LinkedIn"
                                >
                                    <i class="bi bi-linkedin"></i>
                                </a>


                                <a
                                    href="https://wa.me/?text={{ urlencode($post->title . ' ' . request()->fullUrl()) }}"
                                    target="_blank"
                                    rel="noopener"
                                    aria-label="Share on WhatsApp"
                                >
                                    <i class="bi bi-whatsapp"></i>
                                </a>

                            </div>

                        </div>

                    </div>


                    {{-- =================================================
                         AUTHOR BOX
                    ================================================== --}}

                    <div class="author-box">

                        <div class="author-icon">

                            <i class="bi bi-person-badge"></i>

                        </div>


                        <div class="author-info">

                            <span>
                                INSPECTION PROFESSIONAL
                            </span>

                            <h3>
                                Ronak Gami
                            </h3>

                            <p>
                                Licensed and experienced building
                                inspector providing professional
                                building and pest inspection services
                                across Melbourne and surrounding areas.
                            </p>

                            <div class="licence-details">

                                <span>
                                    VBA Building Inspector Licence:
                                    <strong>IN-PS 74654</strong>
                                </span>

                                <span>
                                    Domestic Builder Licence:
                                    <strong>DB-L 100200</strong>
                                </span>

                            </div>

                        </div>

                    </div>


                    {{-- =================================================
                         ARTICLE CTA
                    ================================================== --}}

                    <div class="article-cta">

                        <div class="article-cta-icon">

                            <i class="bi bi-search"></i>

                        </div>

                        <div>

                            <span>
                                BUYING OR SELLING A PROPERTY?
                            </span>

                            <h3>
                                Don't Rely on Appearances Alone.
                            </h3>

                            <p>
                                Get professional inspection information
                                before making an important property
                                decision.
                            </p>

                        </div>


                        <a
                            href="{{ route('contact') }}"
                            class="article-cta-button"
                        >
                            Get an Estimate
                            <i class="bi bi-arrow-right"></i>
                        </a>

                    </div>

                </article>

            </div>


            {{-- =================================================
                 SIDEBAR
            ================================================== --}}

            <div class="col-lg-4">

                <aside class="article-sidebar">


                    {{-- =================================================
                         BACK TO BLOG
                    ================================================== --}}

                    <div class="sidebar-back">

                        <a href="{{ route('blog.index') }}">

                            <i class="bi bi-arrow-left"></i>

                            Back to Blog

                        </a>

                    </div>


                    {{-- =================================================
                         LATEST POSTS
                    ================================================== --}}

                    @if(isset($latestPosts) && $latestPosts->count())

                        <div class="sidebar-box">

                            <div class="sidebar-title">

                                <span></span>

                                <h3>
                                    Latest Articles
                                </h3>

                            </div>


                            <div class="latest-posts">

                                @foreach($latestPosts as $latest)

                                    @if($latest->id != $post->id)

                                        <div class="latest-post">

                                            <a
                                                href="{{ route('blog.show', $latest->slug) }}"
                                                class="latest-image"
                                            >

                                                @if($latest->image)

                                                    <img
                                                        src="{{ asset('storage/' . $latest->image) }}"
                                                        alt="{{ $latest->title }}"
                                                    >

                                                @else

                                                    <img
                                                        src="{{ asset('images/schedule.jpeg') }}"
                                                        alt="{{ $latest->title }}"
                                                    >

                                                @endif

                                            </a>


                                            <div class="latest-content">

                                                <span>

                                                    @if($latest->published_at)

                                                        {{ $latest->published_at->format('d M Y') }}

                                                    @else

                                                        Property Insights

                                                    @endif

                                                </span>


                                                <h4>

                                                    <a
                                                        href="{{ route('blog.show', $latest->slug) }}"
                                                    >
                                                        {{ \Illuminate\Support\Str::limit($latest->title, 65) }}
                                                    </a>

                                                </h4>

                                            </div>

                                        </div>

                                    @endif

                                @endforeach

                            </div>

                        </div>

                    @endif


                    {{-- =================================================
                         CATEGORIES
                    ================================================== --}}

                    @if(isset($categories) && $categories->count())

                        <div class="sidebar-box">

                            <div class="sidebar-title">

                                <span></span>

                                <h3>
                                    Categories
                                </h3>

                            </div>


                            <ul class="category-list">

                                @foreach($categories as $category)

                                    <li>

                                        <a
                                            href="{{ route('blog.index', ['category' => $category->slug]) }}"
                                        >

                                            <span>

                                                <i class="bi bi-chevron-right"></i>

                                                {{ $category->name }}

                                            </span>

                                        </a>

                                    </li>

                                @endforeach

                            </ul>

                        </div>

                    @endif


                    {{-- =================================================
                         SERVICES
                    ================================================== --}}

                    <div class="sidebar-box">

                        <div class="sidebar-title">

                            <span></span>

                            <h3>
                                Inspection Services
                            </h3>

                        </div>


                        <ul class="service-list">

                            <li>

                                <a href="{{ route('services.pre-purchase') }}">

                                    <i class="bi bi-house-check"></i>

                                    Pre-Purchase Building & Pest

                                </a>

                            </li>


                            <li>

                                <a href="{{ route('services.building-stage') }}">

                                    <i class="bi bi-building-check"></i>

                                    Stage by Stage Inspection

                                </a>

                            </li>


                            <li>

                                <a href="{{ route('services.apartment') }}">

                                    <i class="bi bi-buildings"></i>

                                    Apartment Building Inspection

                                </a>

                            </li>


                            <li>

                                <a href="{{ route('services.rising-damp') }}">

                                    <i class="bi bi-droplet"></i>

                                    Rising Damp Inspection

                                </a>

                            </li>


                            <li>

                                <a href="{{ route('services.pool-barrier') }}">

                                    <i class="bi bi-water"></i>

                                    Pool Barrier Inspection

                                </a>

                            </li>


                            <li>

                                <a href="{{ route('services.new-build-handover') }}">

                                    <i class="bi bi-key"></i>

                                    New Build Handover

                                </a>

                            </li>


                            <li>

                                <a href="{{ route('services.vendor') }}">

                                    <i class="bi bi-person-check"></i>

                                    Vendor Inspection

                                </a>

                            </li>


                            <li>

                                <a href="{{ route('services.builders-warranty') }}">

                                    <i class="bi bi-shield-check"></i>

                                    Builders Warranty

                                </a>

                            </li>

                        </ul>

                    </div>


                    {{-- =================================================
                         SIDEBAR CTA
                    ================================================== --}}

                    <div class="sidebar-contact">

                        <div class="contact-icon">

                            <i class="bi bi-telephone-fill"></i>

                        </div>

                        <h3>
                            Need an Inspection?
                        </h3>

                        <p>
                            Speak with our team about your property
                            inspection requirements.
                        </p>


                        <a
                            href="tel:0466001551"
                            class="contact-phone"
                        >

                            <i class="bi bi-telephone"></i>

                            0466 001 551

                        </a>


                        <a
                            href="{{ route('contact') }}"
                            class="contact-button"
                        >
                            Contact Us
                        </a>

                    </div>

                </aside>

            </div>

        </div>

    </div>

</section>


{{-- =========================================================
     RELATED ARTICLES
========================================================= --}}

@if(isset($relatedPosts) && $relatedPosts->count())

<section class="related-section">

    <div class="container">

        <div class="section-heading">

            <span>
                KEEP READING
            </span>

            <h2>
                Related <strong>Articles</strong>
            </h2>

            <p>
                More property inspection insights and useful advice.
            </p>

        </div>


        <div class="row g-4">

            @foreach($relatedPosts as $related)

                <div class="col-md-6 col-lg-4">

                    <article class="related-card">

                        <div class="related-image">

                            @if($related->image)

                                <img
                                    src="{{ asset('storage/' . $related->image) }}"
                                    alt="{{ $related->title }}"
                                    loading="lazy"
                                >

                            @else

                                <img
                                    src="{{ asset('images/pre purchase service.jpeg') }}"
                                    alt="{{ $related->title }}"
                                    loading="lazy"
                                >

                            @endif

                        </div>


                        <div class="related-body">

                            @if($related->published_at)

                                <span class="related-date">

                                    <i class="bi bi-calendar3"></i>

                                    {{ $related->published_at->format('d M Y') }}

                                </span>

                            @endif


                            <h3>

                                <a
                                    href="{{ route('blog.show', $related->slug) }}"
                                >
                                    {{ $related->title }}
                                </a>

                            </h3>


                            <p>

                                @if($related->excerpt)

                                    {{ \Illuminate\Support\Str::limit($related->excerpt, 110) }}

                                @elseif($related->content)

                                    {{ \Illuminate\Support\Str::limit(strip_tags($related->content), 110) }}

                                @endif

                            </p>


                            <a
                                href="{{ route('blog.show', $related->slug) }}"
                                class="related-read"
                            >

                                Read Article

                                <i class="bi bi-arrow-right"></i>

                            </a>

                        </div>

                    </article>

                </div>

            @endforeach

        </div>

    </div>

</section>

@endif


{{-- =========================================================
     FINAL CTA
========================================================= --}}

<section class="blog-detail-final-cta">

    <div class="container">

        <div class="final-cta-inner">

            <div>

                <span>
                    PREMIUM BUILDING & PEST INSPECTIONS
                </span>

                <h2>
                    Know Before You Buy.
                    <strong>Inspect Before You Invest.</strong>
                </h2>

                <p>
                    Professional building and pest inspections
                    designed to give you clearer information about
                    the property you're considering.
                </p>

            </div>


            <div class="final-cta-buttons">

                <a
                    href="{{ route('contact') }}"
                    class="final-button"
                >

                    Book an Inspection

                    <i class="bi bi-arrow-right"></i>

                </a>


                <a
                    href="tel:0466001551"
                    class="final-phone"
                >

                    <i class="bi bi-telephone-fill"></i>

                    0466 001 551

                </a>

            </div>

        </div>

    </div>

</section>


{{-- =========================================================
     PAGE CSS
========================================================= --}}

<style>

/* =========================================================
   VARIABLES
========================================================= */

:root {

    --article-navy: #0b1f3a;

    --article-blue: #123f67;

    --article-orange: #ff6b00;

    --article-green: #48a900;

    --article-light: #f6f8fa;

    --article-border: #e5ebef;

    --article-text: #647281;

}


/* =========================================================
   GENERAL
========================================================= */

.blog-detail-hero,
.article-section,
.related-section,
.blog-detail-final-cta {

    font-family: 'Poppins', sans-serif;

}


/* =========================================================
   HERO
========================================================= */

.blog-detail-hero {

    position: relative;

    min-height: 450px;

    display: flex;

    align-items: center;

    background:
        linear-gradient(
            90deg,
            rgba(5, 21, 40, 0.96),
            rgba(10, 39, 65, 0.82),
            rgba(10, 39, 65, 0.55)
        ),
        url('{{ asset('images/service banner.jpg') }}')
        center / cover no-repeat;

}


.blog-detail-hero-content {

    max-width: 900px;

    padding: 75px 0;

}


.breadcrumb-area {

    display: flex;

    align-items: center;

    flex-wrap: wrap;

    gap: 8px;

    margin-bottom: 25px;

    color: rgba(255,255,255,0.65);

    font-size: 11px;

}


.breadcrumb-area a {

    color: #ffffff;

    text-decoration: none;

}


.breadcrumb-area a:hover {

    color: var(--article-green);

}


.breadcrumb-area i {

    color: var(--article-orange);

    font-size: 8px;

}


.article-category {

    display: inline-block;

    margin-bottom: 15px;

    padding: 6px 13px;

    background: var(--article-orange);

    color: #ffffff;

    border-radius: 3px;

    font-size: 10px;

    font-weight: 700;

    text-transform: uppercase;

    letter-spacing: 0.8px;

}


.blog-detail-hero h1 {

    max-width: 900px;

    margin: 0 0 20px;

    color: #ffffff;

    font-family: 'Montserrat', sans-serif;

    font-size: clamp(34px, 5vw, 60px);

    font-weight: 800;

    line-height: 1.1;

}


.article-meta {

    display: flex;

    align-items: center;

    flex-wrap: wrap;

    gap: 20px;

    color: rgba(255,255,255,0.8);

    font-size: 11px;

}


.article-meta i {

    margin-right: 5px;

    color: var(--article-green);

}


/* =========================================================
   ARTICLE SECTION
========================================================= */

.article-section {

    padding: 80px 0;

    background: #ffffff;

}


.article-content {

    min-width: 0;

}


/* =========================================================
   FEATURED IMAGE
========================================================= */

.article-featured-image {

    width: 100%;

    height: 470px;

    overflow: hidden;

    margin-bottom: 30px;

    border-radius: 8px;

    box-shadow: 0 10px 35px rgba(11,31,58,0.10);

}


.article-featured-image img {

    width: 100%;

    height: 100%;

    object-fit: cover;

}


/* =========================================================
   INTRODUCTION
========================================================= */

.article-introduction {

    position: relative;

    margin-bottom: 30px;

    padding: 25px 28px;

    background: #f2f8ee;

    border-left: 4px solid var(--article-green);

    color: var(--article-navy);

    font-size: 16px;

    font-weight: 600;

    line-height: 1.8;

}


/* =========================================================
   ARTICLE BODY
========================================================= */

.article-body {

    color: var(--article-text);

    font-size: 14px;

    line-height: 1.95;

}


.article-body p {

    margin-bottom: 20px;

}


.article-body h2 {

    margin-top: 40px;

    margin-bottom: 16px;

    color: var(--article-navy);

    font-family: 'Montserrat', sans-serif;

    font-size: 29px;

    font-weight: 750;

    line-height: 1.3;

}


.article-body h3 {

    margin-top: 32px;

    margin-bottom: 13px;

    color: var(--article-blue);

    font-family: 'Montserrat', sans-serif;

    font-size: 22px;

    font-weight: 700;

}


.article-body h4 {

    margin-top: 25px;

    margin-bottom: 10px;

    color: var(--article-navy);

    font-size: 18px;

    font-weight: 700;

}


.article-body ul,
.article-body ol {

    margin-bottom: 25px;

    padding-left: 25px;

}


.article-body li {

    margin-bottom: 9px;

}


.article-body strong {

    color: var(--article-navy);

}


.article-body a {

    color: var(--article-green);

    font-weight: 600;

}


.article-body blockquote {

    margin: 30px 0;

    padding: 25px 30px;

    background: var(--article-light);

    border-left: 4px solid var(--article-orange);

    color: var(--article-navy);

    font-size: 16px;

    font-style: italic;

}


/* =========================================================
   ARTICLE FOOTER
========================================================= */

.article-footer {

    display: flex;

    align-items: center;

    justify-content: space-between;

    gap: 25px;

    flex-wrap: wrap;

    margin-top: 45px;

    padding-top: 25px;

    border-top: 1px solid var(--article-border);

}


.article-tags {

    display: flex;

    gap: 7px;

    flex-wrap: wrap;

}


.article-tags span {

    padding: 6px 10px;

    background: #f3f5f7;

    color: #6c7782;

    border-radius: 3px;

    font-size: 9px;

    font-weight: 600;

}


.share-area {

    display: flex;

    align-items: center;

    gap: 12px;

}


.share-area strong {

    color: var(--article-navy);

    font-size: 10px;

}


.share-buttons {

    display: flex;

    gap: 6px;

}


.share-buttons a {

    width: 32px;

    height: 32px;

    display: flex;

    align-items: center;

    justify-content: center;

    background: var(--article-light);

    color: var(--article-navy);

    border-radius: 50%;

    text-decoration: none;

    font-size: 12px;

    transition: 0.2s ease;

}


.share-buttons a:hover {

    background: var(--article-green);

    color: #ffffff;

}


/* =========================================================
   AUTHOR BOX
========================================================= */

.author-box {

    display: flex;

    gap: 20px;

    margin-top: 45px;

    padding: 28px;

    background: var(--article-light);

    border-radius: 8px;

}


.author-icon {

    width: 65px;

    height: 65px;

    min-width: 65px;

    display: flex;

    align-items: center;

    justify-content: center;

    background: var(--article-navy);

    color: #ffffff;

    border-radius: 50%;

    font-size: 25px;

}


.author-info > span {

    color: var(--article-orange);

    font-size: 9px;

    font-weight: 700;

    letter-spacing: 1.2px;

}


.author-info h3 {

    margin: 5px 0 8px;

    color: var(--article-navy);

    font-family: 'Montserrat', sans-serif;

    font-size: 20px;

    font-weight: 700;

}


.author-info p {

    margin-bottom: 12px;

    color: var(--article-text);

    font-size: 11px;

    line-height: 1.7;

}


.licence-details {

    display: flex;

    flex-wrap: wrap;

    gap: 8px 18px;

}


.licence-details span {

    color: #7a8793;

    font-size: 9px;

}


.licence-details strong {

    color: var(--article-navy);

}


/* =========================================================
   ARTICLE CTA
========================================================= */

.article-cta {

    display: flex;

    align-items: center;

    gap: 18px;

    margin-top: 30px;

    padding: 25px;

    background: var(--article-green);

    border-radius: 7px;

}


.article-cta-icon {

    width: 50px;

    height: 50px;

    min-width: 50px;

    display: flex;

    align-items: center;

    justify-content: center;

    background: rgba(255,255,255,0.15);

    color: #ffffff;

    border-radius: 50%;

    font-size: 19px;

}


.article-cta > div:nth-child(2) {

    flex: 1;

}


.article-cta span {

    color: rgba(255,255,255,0.75);

    font-size: 8px;

    font-weight: 700;

    letter-spacing: 1px;

}


.article-cta h3 {

    margin: 4px 0 5px;

    color: #ffffff;

    font-family: 'Montserrat', sans-serif;

    font-size: 18px;

    font-weight: 700;

}


.article-cta p {

    margin: 0;

    color: rgba(255,255,255,0.8);

    font-size: 10px;

    line-height: 1.6;

}


.article-cta-button {

    display: inline-flex;

    align-items: center;

    justify-content: center;

    gap: 7px;

    padding: 11px 17px;

    background: #ffffff;

    color: var(--article-navy);

    border-radius: 4px;

    text-decoration: none;

    white-space: nowrap;

    font-size: 10px;

    font-weight: 700;

}


.article-cta-button:hover {

    background: var(--article-navy);

    color: #ffffff;

}


/* =========================================================
   SIDEBAR
========================================================= */

.article-sidebar {

    position: sticky;

    top: 95px;

}


.sidebar-back {

    margin-bottom: 20px;

}


.sidebar-back a {

    display: inline-flex;

    align-items: center;

    gap: 7px;

    color: var(--article-green);

    text-decoration: none;

    font-size: 11px;

    font-weight: 700;

}


.sidebar-back a:hover {

    color: var(--article-orange);

}


.sidebar-box {

    margin-bottom: 25px;

    padding: 24px;

    background: #ffffff;

    border: 1px solid var(--article-border);

    border-radius: 7px;

    box-shadow: 0 5px 20px rgba(11,31,58,0.04);

}


.sidebar-title {

    display: flex;

    align-items: center;

    gap: 10px;

    margin-bottom: 18px;

}


.sidebar-title span {

    width: 4px;

    height: 25px;

    background: var(--article-orange);

}


.sidebar-title h3 {

    margin: 0;

    color: var(--article-navy);

    font-family: 'Montserrat', sans-serif;

    font-size: 17px;

    font-weight: 700;

}


/* =========================================================
   LATEST POSTS
========================================================= */

.latest-post {

    display: flex;

    gap: 12px;

    padding: 12px 0;

    border-bottom: 1px solid #edf0f2;

}


.latest-post:first-child {

    padding-top: 0;

}


.latest-post:last-child {

    padding-bottom: 0;

    border-bottom: none;

}


.latest-image {

    width: 80px;

    height: 65px;

    min-width: 80px;

    overflow: hidden;

    border-radius: 4px;

}


.latest-image img {

    width: 100%;

    height: 100%;

    object-fit: cover;

    transition: 0.3s ease;

}


.latest-image:hover img {

    transform: scale(1.05);

}


.latest-content > span {

    color: #9ba5af;

    font-size: 8px;

}


.latest-content h4 {

    margin: 4px 0 0;

    font-family: 'Montserrat', sans-serif;

    font-size: 12px;

    line-height: 1.45;

}


.latest-content h4 a {

    color: var(--article-navy);

    text-decoration: none;

}


.latest-content h4 a:hover {

    color: var(--article-green);

}


/* =========================================================
   CATEGORY LIST
========================================================= */

.category-list {

    padding: 0;

    margin: 0;

    list-style: none;

}


.category-list li {

    border-bottom: 1px solid #edf0f2;

}


.category-list li:last-child {

    border-bottom: none;

}


.category-list a {

    display: block;

    padding: 10px 0;

    color: #647281;

    text-decoration: none;

    font-size: 11px;

    transition: 0.2s ease;

}


.category-list a:hover {

    padding-left: 4px;

    color: var(--article-green);

}


.category-list i {

    margin-right: 7px;

    color: var(--article-orange);

    font-size: 8px;

}


/* =========================================================
   SERVICE LIST
========================================================= */

.service-list {

    padding: 0;

    margin: 0;

    list-style: none;

}


.service-list li {

    margin-bottom: 7px;

}


.service-list a {

    display: flex;

    align-items: center;

    gap: 9px;

    padding: 9px;

    background: #f7f9fa;

    color: #596775;

    border-radius: 4px;

    text-decoration: none;

    font-size: 10px;

    font-weight: 600;

    transition: 0.2s ease;

}


.service-list a:hover {

    background: #eef7e9;

    color: var(--article-green);

}


.service-list i {

    width: 20px;

    color: var(--article-orange);

    text-align: center;

    font-size: 13px;

}


/* =========================================================
   SIDEBAR CONTACT
========================================================= */

.sidebar-contact {

    padding: 28px 22px;

    background:
        linear-gradient(
            135deg,
            var(--article-navy),
            var(--article-blue)
        );

    border-radius: 7px;

    text-align: center;

}


.contact-icon {

    width: 50px;

    height: 50px;

    display: flex;

    align-items: center;

    justify-content: center;

    margin: 0 auto 14px;

    background: rgba(255,255,255,0.1);

    color: #ffffff;

    border-radius: 50%;

    font-size: 19px;

}


.sidebar-contact h3 {

    margin-bottom: 8px;

    color: #ffffff;

    font-family: 'Montserrat', sans-serif;

    font-size: 19px;

    font-weight: 700;

}


.sidebar-contact p {

    margin-bottom: 15px;

    color: rgba(255,255,255,0.72);

    font-size: 10px;

    line-height: 1.7;

}


.contact-phone {

    display: block;

    margin-bottom: 15px;

    color: #ffffff;

    text-decoration: none;

    font-size: 14px;

    font-weight: 700;

}


.contact-phone i {

    color: var(--article-green);

    margin-right: 5px;

}


.contact-button {

    display: block;

    padding: 11px;

    background: var(--article-green);

    color: #ffffff;

    border-radius: 4px;

    text-decoration: none;

    font-size: 11px;

    font-weight: 600;

}


.contact-button:hover {

    background: #398d00;

    color: #ffffff;

}


/* =========================================================
   RELATED ARTICLES
========================================================= */

.related-section {

    padding: 80px 0;

    background: var(--article-light);

}


.section-heading {

    margin-bottom: 35px;

}


.section-heading > span {

    color: var(--article-orange);

    font-size: 10px;

    font-weight: 700;

    letter-spacing: 1.8px;

}


.section-heading h2 {

    margin: 7px 0 8px;

    color: var(--article-navy);

    font-family: 'Montserrat', sans-serif;

    font-size: 35px;

    font-weight: 800;

}


.section-heading h2 strong {

    color: var(--article-green);

}


.section-heading p {

    margin: 0;

    color: #73808c;

    font-size: 12px;

}


.related-card {

    height: 100%;

    overflow: hidden;

    background: #ffffff;

    border: 1px solid var(--article-border);

    border-radius: 7px;

    box-shadow: 0 5px 18px rgba(11,31,58,0.05);

    transition: 0.3s ease;

}


.related-card:hover {

    transform: translateY(-5px);

    box-shadow: 0 12px 30px rgba(11,31,58,0.1);

}


.related-image {

    height: 210px;

    overflow: hidden;

}


.related-image img {

    width: 100%;

    height: 100%;

    object-fit: cover;

    transition: 0.4s ease;

}


.related-card:hover .related-image img {

    transform: scale(1.05);

}


.related-body {

    padding: 21px;

}


.related-date {

    color: #909ba5;

    font-size: 9px;

}


.related-date i {

    color: var(--article-green);

    margin-right: 4px;

}


.related-body h3 {

    margin: 9px 0 10px;

    font-family: 'Montserrat', sans-serif;

    font-size: 18px;

    line-height: 1.4;

}


.related-body h3 a {

    color: var(--article-navy);

    text-decoration: none;

}


.related-body h3 a:hover {

    color: var(--article-green);

}


.related-body p {

    min-height: 42px;

    margin-bottom: 15px;

    color: #73808c;

    font-size: 11px;

    line-height: 1.7;

}


.related-read {

    display: inline-flex;

    align-items: center;

    gap: 7px;

    color: var(--article-green);

    text-decoration: none;

    font-size: 10px;

    font-weight: 700;

}


.related-read:hover {

    color: var(--article-orange);

}


/* =========================================================
   FINAL CTA
========================================================= */

.blog-detail-final-cta {

    padding: 65px 0;

    background: var(--article-green);

}


.final-cta-inner {

    display: flex;

    align-items: center;

    justify-content: space-between;

    gap: 40px;

}


.final-cta-inner > div:first-child {

    max-width: 720px;

}


.final-cta-inner span {

    display: block;

    margin-bottom: 9px;

    color: rgba(255,255,255,0.75);

    font-size: 9px;

    font-weight: 700;

    letter-spacing: 1.8px;

}


.final-cta-inner h2 {

    margin-bottom: 12px;

    color: #ffffff;

    font-family: 'Montserrat', sans-serif;

    font-size: clamp(25px, 3vw, 37px);

    font-weight: 700;

    line-height: 1.25;

}


.final-cta-inner h2 strong {

    display: block;

    font-weight: 800;

}


.final-cta-inner p {

    max-width: 650px;

    margin: 0;

    color: rgba(255,255,255,0.82);

    font-size: 11px;

    line-height: 1.8;

}


.final-cta-buttons {

    min-width: 210px;

}


.final-button {

    display: flex;

    align-items: center;

    justify-content: center;

    gap: 8px;

    margin-bottom: 13px;

    padding: 13px 18px;

    background: #ffffff;

    color: var(--article-navy);

    border-radius: 4px;

    text-decoration: none;

    font-size: 11px;

    font-weight: 700;

}


.final-button:hover {

    background: var(--article-navy);

    color: #ffffff;

}


.final-phone {

    display: block;

    color: #ffffff;

    text-align: center;

    text-decoration: none;

    font-size: 13px;

    font-weight: 700;

}


.final-phone i {

    margin-right: 5px;

}


/* =========================================================
   RESPONSIVE
========================================================= */

@media (max-width: 991px) {

    .article-sidebar {

        position: static;

        margin-top: 15px;

    }


    .final-cta-inner {

        flex-direction: column;

        align-items: flex-start;

    }


    .final-cta-buttons {

        width: 100%;

        max-width: 280px;

    }

}


@media (max-width: 767px) {

    .blog-detail-hero {

        min-height: 430px;

    }


    .blog-detail-hero-content {

        padding: 60px 15px;

    }


    .blog-detail-hero h1 {

        font-size: 37px;

    }


    .article-section {

        padding: 55px 0;

    }


    .article-featured-image {

        height: 300px;

    }


    .article-introduction {

        padding: 20px;

        font-size: 14px;

    }


    .article-body {

        font-size: 13px;

    }


    .article-cta {

        flex-wrap: wrap;

    }


    .article-cta-button {

        width: 100%;

    }


    .author-box {

        flex-direction: column;

    }


    .related-section {

        padding: 55px 0;

    }

}


@media (max-width: 575px) {

    .blog-detail-hero {

        min-height: 450px;

    }


    .blog-detail-hero h1 {

        font-size: 32px;

    }


    .article-meta {

        gap: 10px;

        flex-direction: column;

        align-items: flex-start;

    }


    .article-featured-image {

        height: 240px;

    }


    .article-footer {

        align-items: flex-start;

        flex-direction: column;

    }


    .share-area {

        flex-wrap: wrap;

    }


    .article-cta {

        padding: 20px;

    }


    .section-heading h2 {

        font-size: 29px;

    }

}

</style>

@endsection