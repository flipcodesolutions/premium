@extends('layouts.app')

@php
    $defaultBlogKeywords = strtolower($post->title ?? 'building inspection') . ', building inspection blog, property inspection Melbourne, pest inspection guide, Melbourne building inspector';
    $postKeywords = !empty($post->meta_keywords) ? $post->meta_keywords : $defaultBlogKeywords;
    $postAuthor = (!empty($post->author) && !str_contains($post->author, '@')) ? $post->author : 'Premium Building & Pest Inspections';
    $postTitle = ($post->meta_title ?: $post->og_title) ?: (($post->title ?? 'Blog Article') . ' | Premium Building & Pest Inspections');
    $postDesc = ($post->meta_description ?: $post->og_description) ?: Str::limit(strip_tags($post->excerpt ?? ($post->content ?? '')), 155);
    $postImageUrl = $post->image_url ?? (\Illuminate\Support\Str::startsWith($post->image, ['http://', 'https://']) ? $post->image : asset('storage/' . $post->image));

    // Normalize content: remove duplicate title/date/img prefix from WordPress import if present
    $cleanContent = $post->content;
    $cleanContent = preg_replace('/^\s*(?:<p>\s*<strong>.*?<\/strong>\s*<\/p>\s*)?(?:<p>&nbsp;<\/p>\s*)?(?:<ul>\s*<li>.*?<\/li>\s*<\/ul>\s*)?(?:<p>\s*<img[^>]+>\s*<\/p>\s*)?/is', '', $cleanContent);
@endphp

@section('title', $postTitle)
@section('meta_description', $postDesc)
@section('meta_keywords', $postKeywords)
@section('meta_author', $postAuthor)

@if(!empty($post->og_title))
@section('og_title', $post->og_title)
@endif
@if(!empty($post->og_description))
@section('og_description', $post->og_description)
@endif
@if($postImageUrl)
@section('og_image', $postImageUrl)
@endif
@if(!empty($post->og_url))
@section('og_url', $post->og_url)
@endif

@section('content')

{{-- =========================================================
     BLOG POST DETAIL SECTION (MATCHING SCREENSHOT DESIGN)
========================================================= --}}
<div class="blog-detail-page">
    <div class="container py-4 py-lg-5">
        <div class="row g-4 g-lg-5">

            {{-- =================================================
                 LEFT COLUMN: MAIN ARTICLE
            ================================================== --}}
            <div class="col-lg-8">
                <article class="blog-main-article">

                    {{-- Category Tag --}}
                    <div class="blog-post-category-tag">
                        @if($post->category)
                            <a href="{{ route('blog.index', ['category' => $post->category->slug]) }}">
                                {{ $post->category->name }}
                            </a>
                        @else
                            <span>BUYING A PROPERTY</span>
                        @endif
                    </div>

                    {{-- Main Title --}}
                    <h1 class="blog-post-main-title">
                        {{ $post->title }}
                    </h1>

                    {{-- Post Meta Info --}}
                    <div class="blog-post-meta-row">
                        <span class="meta-date">
                            <i class="bi bi-calendar3"></i>
                            {{ $post->published_at ? $post->published_at->format('F j, Y') : ($post->created_at ? $post->created_at->format('F j, Y') : 'July 23, 2026') }}
                        </span>
                        <span class="meta-dot">•</span>
                        <span class="meta-author">
                            <i class="bi bi-shield-check"></i>
                            {{ $postAuthor }}
                        </span>
                    </div>

                    {{-- Featured Image --}}
                    @if($postImageUrl)
                        <div class="blog-post-featured-image-wrapper">
                            <img src="{{ $postImageUrl }}"
                                 alt="{{ $post->title }}"
                                 title="{{ $post->title }}"
                                 class="blog-post-featured-image"
                                 onerror="this.onerror=null; this.src='{{ asset('images/service banner.jpg') }}';">
                        </div>
                    @endif

                    {{-- Article Content --}}
                    <div class="blog-post-content-body">
                        @if($post->excerpt && !str_contains($cleanContent, Str::limit(strip_tags($post->excerpt), 40)))
                            <div class="blog-post-lead-excerpt">
                                {{ $post->excerpt }}
                            </div>
                        @endif

                        {!! $cleanContent !!}
                    </div>

                    {{-- Back To Blog Link --}}
                    <div class="mt-4 pt-2">
                        <a href="{{ route('blog.index') }}" class="back-to-blog-link">
                            <i class="bi bi-arrow-left"></i> Back to Blog Articles
                        </a>
                    </div>

                </article>
            </div>


            {{-- =================================================
                 RIGHT COLUMN: SIDEBAR
            ================================================== --}}
            <div class="col-lg-4">
                <aside class="blog-sidebar-sticky">

                    {{-- 01. Search Widget --}}
                    <div class="sidebar-widget search-widget">
                        <form action="{{ route('blog.index') }}" method="GET" class="sidebar-search-form">
                            <input type="text"
                                   name="search"
                                   value="{{ request('search') ?? request('s') }}"
                                   class="sidebar-search-input"
                                   placeholder="Search..."
                                   aria-label="Search blog articles"
                                   required>
                            <button type="submit" class="sidebar-search-btn" aria-label="Submit Search">
                                <i class="bi bi-search"></i>
                            </button>
                        </form>
                    </div>

                    {{-- 02. Recent Posts Widget --}}
                    @if(isset($latestPosts) && $latestPosts->count())
                        <div class="sidebar-widget recent-posts-widget">
                            <h3 class="sidebar-widget-title">Recent Posts</h3>
                            <div class="recent-posts-list">
                                @foreach($latestPosts as $latest)
                                    @php
                                        $latestImg = $latest->image_url ?? (\Illuminate\Support\Str::startsWith($latest->image, ['http://', 'https://']) ? $latest->image : asset('storage/' . $latest->image));
                                    @endphp
                                    <article class="recent-post-item">
                                        @if($latestImg)
                                            <a href="{{ route('blog.show', $latest->slug) }}" class="recent-post-thumb">
                                                <img src="{{ $latestImg }}"
                                                     alt="{{ $latest->title }}"
                                                     title="{{ $latest->title }}"
                                                     loading="lazy"
                                                     onerror="this.onerror=null; this.src='{{ asset('images/service banner.jpg') }}';">
                                            </a>
                                        @endif
                                        <div class="recent-post-content">
                                            <h4 class="recent-post-title">
                                                <a href="{{ route('blog.show', $latest->slug) }}">
                                                    {{ $latest->title }}
                                                </a>
                                            </h4>
                                            <div class="recent-post-date">
                                                {{ $latest->published_at ? $latest->published_at->format('F j, Y') : ($latest->created_at ? $latest->created_at->format('F j, Y') : 'July 23, 2026') }}
                                            </div>
                                        </div>
                                    </article>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    {{-- 03. Fast Quote / Inspection CTA Card --}}
                    <div class="sidebar-widget inspection-cta-widget">
                        <div class="cta-icon-wrap">
                            <i class="bi bi-clipboard2-check"></i>
                        </div>
                        <h4>Need an Inspection?</h4>
                        <p>Fast, accredited same-day building and timber pest inspection reports across Melbourne.</p>
                        <a href="tel:0466001551" class="sidebar-cta-phone">
                            <i class="bi bi-telephone-fill"></i> 0466 001 551
                        </a>
                        <a href="{{ route('contact') }}" class="sidebar-cta-btn">
                            Book Inspection <i class="bi bi-arrow-right ms-1"></i>
                        </a>
                    </div>

                </aside>
            </div>

        </div>
    </div>
</div>


{{-- =========================================================
     PAGE STYLING (MATCHING SCREENSHOT PRECISION)
========================================================= --}}
<style>
/* ---------------------------------------------------------
   PAGE LAYOUT
--------------------------------------------------------- */
.blog-detail-page {
    background-color: #ffffff;
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    color: #475569;
}

/* ---------------------------------------------------------
   CATEGORY BADGE / LINK
--------------------------------------------------------- */
.blog-post-category-tag {
    margin-bottom: 8px;
}

.blog-post-category-tag a,
.blog-post-category-tag span {
    display: inline-block;
    color: #48a900;
    font-size: 13px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 0.8px;
    text-decoration: none;
    transition: color 0.2s ease;
}

.blog-post-category-tag a:hover {
    color: #388600;
    text-decoration: underline;
}

/* ---------------------------------------------------------
   MAIN TITLE (H1)
--------------------------------------------------------- */
.blog-post-main-title {
    font-family: 'Inter', sans-serif;
    font-size: clamp(24px, 3.2vw, 36px);
    font-weight: 900;
    color: #05213F;
    line-height: 1.25;
    margin: 6px 0 12px 0;
    text-transform: uppercase;
    letter-spacing: 0.2px;
}

/* ---------------------------------------------------------
   POST META
--------------------------------------------------------- */
.blog-post-meta-row {
    display: flex;
    align-items: center;
    gap: 12px;
    flex-wrap: wrap;
    font-size: 12.5px;
    color: #8c9ba5;
    font-weight: 500;
    margin-bottom: 24px;
}

.blog-post-meta-row i {
    color: #48a900;
    margin-right: 4px;
}

.meta-dot {
    color: #cbd5e1;
    font-size: 14px;
}

/* ---------------------------------------------------------
   FEATURED IMAGE
--------------------------------------------------------- */
.blog-post-featured-image-wrapper {
    width: 100%;
    border-radius: 4px;
    overflow: hidden;
    margin-bottom: 28px;
    background: #f1f5f9;
    box-shadow: 0 4px 20px rgba(5, 33, 63, 0.05);
}

.blog-post-featured-image {
    width: 100%;
    max-height: 480px;
    object-fit: cover;
    display: block;
}

/* ---------------------------------------------------------
   ARTICLE CONTENT TYPOGRAPHY
--------------------------------------------------------- */
.blog-post-content-body {
    font-size: 15px;
    line-height: 1.85;
    color: #475569;
}

.blog-post-lead-excerpt {
    font-size: 16.5px;
    font-weight: 500;
    line-height: 1.8;
    color: #1e293b;
    margin-bottom: 24px;
    padding-bottom: 18px;
    border-bottom: 1px solid #edf2f7;
}

.blog-post-content-body p {
    margin-bottom: 20px;
    font-size: 15px;
    line-height: 1.85;
    color: #475569;
}

.blog-post-content-body h1,
.blog-post-content-body h2 {
    font-family: 'Inter', sans-serif;
    font-size: 23px;
    font-weight: 800;
    color: #05213F;
    text-transform: uppercase;
    margin-top: 36px;
    margin-bottom: 14px;
    letter-spacing: 0.2px;
    line-height: 1.3;
}

.blog-post-content-body h3 {
    font-family: 'Inter', sans-serif;
    font-size: 19px;
    font-weight: 750;
    color: #05213F;
    margin-top: 28px;
    margin-bottom: 12px;
    line-height: 1.35;
}

.blog-post-content-body h4 {
    font-family: 'Inter', sans-serif;
    font-size: 16.5px;
    font-weight: 700;
    color: #05213F;
    margin-top: 22px;
    margin-bottom: 10px;
    line-height: 1.4;
}

.blog-post-content-body strong {
    color: #05213F;
    font-weight: 700;
}

.blog-post-content-body a {
    color: #48a900;
    text-decoration: underline;
    font-weight: 600;
    transition: color 0.2s ease;
}

.blog-post-content-body a:hover {
    color: #05213F;
}

.blog-post-content-body ul,
.blog-post-content-body ol {
    margin: 16px 0 24px 0;
    padding-left: 24px;
}

.blog-post-content-body li {
    margin-bottom: 9px;
    line-height: 1.75;
    color: #475569;
}

.blog-post-content-body blockquote {
    background: #f8fafc;
    border-left: 4px solid #48a900;
    padding: 20px 24px;
    margin: 26px 0;
    border-radius: 0 4px 4px 0;
    color: #1e293b;
    font-style: italic;
    line-height: 1.75;
}

.blog-post-content-body img {
    max-width: 100%;
    height: auto;
    border-radius: 4px;
    margin: 20px 0;
}

/* ---------------------------------------------------------
   TABLE STYLING (COMPARISON BOXES FROM SCREENSHOT)
--------------------------------------------------------- */
.blog-post-content-body table {
    width: 100%;
    border-collapse: collapse;
    margin: 26px 0;
    font-size: 14px;
    border: 1px solid #e2e8f0;
    border-radius: 4px;
    overflow: hidden;
}

.blog-post-content-body th {
    background: #f1f5f9;
    color: #05213F;
    font-weight: 700;
    padding: 12px 16px;
    border: 1px solid #cbd5e1;
    text-align: left;
    text-transform: uppercase;
    font-size: 13px;
    letter-spacing: 0.3px;
}

.blog-post-content-body td {
    padding: 12px 16px;
    border: 1px solid #e2e8f0;
    color: #475569;
    line-height: 1.6;
    vertical-align: top;
}

.blog-post-content-body tr:nth-child(even) td {
    background: #fafbfc;
}

.back-to-blog-link {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    color: #05213F;
    font-size: 13px;
    font-weight: 700;
    text-decoration: none;
    transition: color 0.2s ease;
}

.back-to-blog-link:hover {
    color: #48a900;
    text-decoration: underline;
}

/* ---------------------------------------------------------
   SIDEBAR
--------------------------------------------------------- */
@media (min-width: 992px) {
    .blog-sidebar-sticky {
        position: sticky;
        top: 90px;
    }
}

.sidebar-widget {
    margin-bottom: 26px;
}

/* 01. Search Widget */
.sidebar-search-form {
    display: flex;
    width: 100%;
    box-shadow: 0 2px 8px rgba(5, 33, 63, 0.04);
}

.sidebar-search-input {
    flex: 1;
    min-width: 0;
    padding: 11px 16px;
    font-size: 14px;
    border: 1px solid #d9e2ec;
    border-right: none;
    border-radius: 4px 0 0 4px;
    outline: none;
    background: #ffffff;
    color: #334155;
    transition: border-color 0.2s ease;
}

.sidebar-search-input:focus {
    border-color: #48a900;
}

.sidebar-search-btn {
    width: 50px;
    background: #48a900;
    color: #ffffff;
    border: none;
    border-radius: 0 4px 4px 0;
    font-size: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: background 0.2s ease;
}

.sidebar-search-btn:hover {
    background: #3da800;
}

/* 02. Recent Posts Widget */
.recent-posts-widget {
    background: #f4f8fb;
    border: 1px solid #e2edf6;
    border-radius: 6px;
    padding: 22px 18px;
}

.sidebar-widget-title {
    font-family: 'Inter', sans-serif;
    font-size: 16.5px;
    font-weight: 800;
    color: #05213F;
    text-transform: uppercase;
    letter-spacing: 0.3px;
    margin: 0 0 16px 0;
    padding-bottom: 8px;
    border-bottom: 2px solid #e2edf6;
}

.recent-post-item {
    display: flex;
    gap: 12px;
    align-items: flex-start;
    padding-bottom: 12px;
    margin-bottom: 12px;
    border-bottom: 1px solid #e7eff6;
}

.recent-post-item:last-child {
    border-bottom: none;
    padding-bottom: 0;
    margin-bottom: 0;
}

.recent-post-thumb {
    width: 68px;
    height: 52px;
    border-radius: 4px;
    overflow: hidden;
    flex-shrink: 0;
    background: #e2e8f0;
}

.recent-post-thumb img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    transition: transform 0.3s ease;
}

.recent-post-thumb:hover img {
    transform: scale(1.06);
}

.recent-post-content {
    flex: 1;
    min-width: 0;
}

.recent-post-title {
    font-family: 'Inter', sans-serif;
    font-size: 13px;
    font-weight: 700;
    line-height: 1.35;
    margin: 0 0 4px 0;
}

.recent-post-title a {
    color: #05213F;
    text-decoration: none;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    transition: color 0.2s ease;
}

.recent-post-title a:hover {
    color: #48a900;
}

.recent-post-date {
    font-size: 11px;
    color: #8c9ba5;
    font-weight: 500;
}

/* 03. Sidebar CTA Widget */
.inspection-cta-widget {
    background: linear-gradient(135deg, #05213F 0%, #0d3866 100%);
    border-radius: 6px;
    padding: 24px 20px;
    color: #ffffff;
    text-align: center;
}

.cta-icon-wrap {
    width: 48px;
    height: 48px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.12);
    color: #48a900;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 22px;
    margin: 0 auto 12px;
}

.inspection-cta-widget h4 {
    font-family: 'Inter', sans-serif;
    font-size: 17px;
    font-weight: 800;
    color: #ffffff;
    margin: 0 0 6px 0;
}

.inspection-cta-widget p {
    font-size: 12px;
    color: rgba(255, 255, 255, 0.78);
    line-height: 1.6;
    margin-bottom: 14px;
}

.sidebar-cta-phone {
    display: block;
    color: #ffffff;
    font-size: 15px;
    font-weight: 800;
    text-decoration: none;
    margin-bottom: 12px;
    transition: color 0.2s ease;
}

.sidebar-cta-phone i {
    color: #48a900;
    margin-right: 4px;
}

.sidebar-cta-phone:hover {
    color: #48a900;
}

.sidebar-cta-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 100%;
    padding: 10px 16px;
    background: #48a900;
    color: #ffffff;
    font-size: 12px;
    font-weight: 700;
    border-radius: 4px;
    text-decoration: none;
    transition: background 0.2s ease;
}

.sidebar-cta-btn:hover {
    background: #3da800;
    color: #ffffff;
}

/* 04. Categories Widget */
.categories-widget {
    background: #ffffff;
    border: 1px solid #e2edf6;
    border-radius: 6px;
    padding: 22px 18px;
}

.sidebar-categories-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.sidebar-categories-list li {
    border-bottom: 1px solid #f1f5f9;
}

.sidebar-categories-list li:last-child {
    border-bottom: none;
}

.sidebar-categories-list a {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 9px 0;
    font-size: 13px;
    font-weight: 600;
    color: #475569;
    text-decoration: none;
    transition: all 0.2s ease;
}

.sidebar-categories-list a:hover {
    color: #48a900;
    padding-left: 4px;
}

.category-count {
    color: #94a3b8;
    font-size: 11px;
}

/* ---------------------------------------------------------
   RESPONSIVE
--------------------------------------------------------- */
@media (max-width: 991px) {
    .blog-sidebar-sticky {
        margin-top: 20px;
    }
    .blog-post-featured-image {
        max-height: 360px;
    }
}

@media (max-width: 575px) {
    .blog-post-featured-image {
        max-height: 250px;
    }
}
</style>

@endsection
