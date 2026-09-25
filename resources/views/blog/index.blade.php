@extends('layouts.app')

@section('title', 'Blog | Premium Building & Pest Inspections')

@section('content')

{{-- =========================================================
     01. BLOG HEADER
========================================================= --}}
<div class="blog-header-section">
    <div class="container">
        <h1 class="blog-main-title" data-aos="fade-down" data-aos-duration="600">BLOG</h1>
    </div>
</div>


{{-- =========================================================
     02. BLOG POSTS GRID
========================================================= --}}
<section class="blog-posts-section">
    <div class="container">

        @if(isset($posts) && $posts->count())

            <div class="blog-posts-grid">

                @foreach($posts as $post)

                    <article class="blog-item" data-aos="fade-up" data-aos-duration="600" data-aos-delay="{{ ($loop->index % 3 + 1) * 80 }}">

                        {{-- IMAGE --}}
                        <div class="blog-item-image">
                            <a href="{{ route('blog.show', $post->slug) }}">
                                @if($post->image)
                                    <img src="{{ \Illuminate\Support\Str::startsWith($post->image, ['http://', 'https://']) ? $post->image : asset('storage/' . $post->image) }}"
                                         alt="{{ $post->title }}"
                                         loading="lazy">
                                @else
                                    <img src="{{ asset('images/banner1.jpg') }}"
                                         alt="{{ $post->title }}"
                                         loading="lazy">
                                @endif
                            </a>
                        </div>

                        {{-- BODY --}}
                        <div class="blog-item-body">

                            <h2 class="blog-item-title">
                                <a href="{{ route('blog.show', $post->slug) }}">
                                    {{ $post->title }}
                                </a>
                            </h2>

                            <div class="blog-item-date">
                                {{ $post->published_at ? $post->published_at->format('F j, Y') : ($post->created_at ? $post->created_at->format('F j, Y') : 'July 23, 2026') }}
                            </div>

                            <div class="blog-item-excerpt">
                                {{ $post->excerpt ?? \Illuminate\Support\Str::limit(strip_tags($post->content), 220) }}
                            </div>

                            <a href="{{ route('blog.show', $post->slug) }}" class="blog-read-more-link">
                                Read More &raquo;
                            </a>

                        </div>

                    </article>

                @endforeach

            </div>


            {{-- =====================================================
                 03. PAGINATION
            ====================================================== --}}
            <div class="blog-pagination-wrapper" data-aos="fade-up" data-aos-duration="500">

                @if ($posts->onFirstPage())
                    <span class="pagination-arrow disabled">&lt; Previous</span>
                @else
                    <a href="{{ $posts->previousPageUrl() }}" class="pagination-arrow">&lt; Previous</a>
                @endif

                @php
                    $totalPages = max($posts->lastPage(), 4);
                @endphp

                @for ($page = 1; $page <= $totalPages; $page++)
                    @if ($page <= $posts->lastPage())
                        @if ($page == $posts->currentPage())
                            <span class="pagination-page active">{{ $page }}</span>
                        @else
                            <a href="{{ $posts->url($page) }}" class="pagination-page">{{ $page }}</a>
                        @endif
                    @else
                        <span class="pagination-page">{{ $page }}</span>
                    @endif
                @endfor

                @if ($posts->hasMorePages())
                    <a href="{{ $posts->nextPageUrl() }}" class="pagination-arrow">Next &gt;</a>
                @else
                    <span class="pagination-arrow disabled">Next &gt;</span>
                @endif

            </div>

        @else

            <div class="text-center py-5">
                <p>No blog posts found.</p>
            </div>

        @endif

    </div>
</section>


{{-- =========================================================
     PAGE CSS
========================================================= --}}
<style>
    /* ---------------------------------------------------------
       HEADER
    --------------------------------------------------------- */
    .blog-header-section {
        background: #ffffff;
        padding-top: 35px;
        padding-bottom: 5px;
    }

    .blog-main-title {
        font-family: 'Montserrat', sans-serif;
        font-size: 38px;
        font-weight: 900;
        color: #072448;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin: 0;
        line-height: 1.1;
    }

    /* ---------------------------------------------------------
       GRID & CARDS
    --------------------------------------------------------- */
    .blog-posts-section {
        background: #ffffff;
        padding: 22px 0 85px;
    }

    .blog-posts-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        column-gap: 32px;
        row-gap: 45px;
    }

    .blog-item {
        display: flex;
        flex-direction: column;
    }

    .blog-item-image {
        width: 100%;
        height: 235px;
        overflow: hidden;
        background: #eef2f6;
        border-radius: 2px;
    }

    .blog-item-image a {
        display: block;
        width: 100%;
        height: 100%;
    }

    .blog-item-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        display: block;
        transition: transform 0.4s ease;
    }

    .blog-item:hover .blog-item-image img {
        transform: scale(1.04);
    }

    .blog-item-body {
        padding-top: 15px;
        display: flex;
        flex-direction: column;
        flex: 1;
    }

    .blog-item-title {
        font-family: 'Montserrat', sans-serif;
        font-size: 14.5px;
        font-weight: 900;
        line-height: 1.35;
        text-transform: uppercase;
        margin: 0 0 6px;
        letter-spacing: 0.2px;
    }

    .blog-item-title a {
        color: #072448;
        text-decoration: none;
        transition: color 0.2s ease;
    }

    .blog-item-title a:hover {
        color: #43a900;
    }

    .blog-item-date {
        color: #8c9ba5;
        font-size: 11.5px;
        font-weight: 600;
        margin-bottom: 12px;
    }

    .blog-item-excerpt {
        color: #556877;
        font-size: 12.8px;
        line-height: 1.65;
        margin-bottom: 14px;
        display: -webkit-box;
        -webkit-line-clamp: 4;
        -webkit-box-orient: vertical;
        overflow: hidden;
        flex: 1;
    }

    .blog-read-more-link {
        color: #072448;
        font-size: 12.5px;
        font-weight: 800;
        text-decoration: underline;
        display: inline-block;
        transition: color 0.2s ease;
        align-self: flex-start;
    }

    .blog-read-more-link:hover {
        color: #43a900;
    }

    /* ---------------------------------------------------------
       PAGINATION
    --------------------------------------------------------- */
    .blog-pagination-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 14px;
        margin-top: 55px;
        padding-top: 10px;
    }

    .pagination-arrow {
        color: #072448;
        font-size: 13.5px;
        font-weight: 700;
        text-decoration: none;
        transition: color 0.2s ease;
    }

    .pagination-arrow:not(.disabled):hover {
        color: #43a900;
    }

    .pagination-arrow.disabled {
        color: #94a3b8;
        cursor: default;
    }

    .pagination-page {
        color: #072448;
        font-size: 13.5px;
        font-weight: 700;
        text-decoration: none;
        padding: 2px 6px;
        transition: color 0.2s ease;
    }

    .pagination-page:hover {
        color: #43a900;
    }

    .pagination-page.active {
        font-weight: 900;
        text-decoration: underline;
    }

    /* ---------------------------------------------------------
       RESPONSIVE
    --------------------------------------------------------- */
    @media (max-width: 991px) {
        .blog-posts-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
            column-gap: 24px;
            row-gap: 35px;
        }

        .blog-item-image {
            height: 220px;
        }

        .blog-main-title {
            font-size: 32px;
        }
    }

    @media (max-width: 767px) {
        .blog-header-section {
            padding-top: 25px;
        }

        .blog-main-title {
            font-size: 28px;
        }

        .blog-posts-grid {
            grid-template-columns: 1fr;
            row-gap: 32px;
        }

        .blog-item-image {
            height: 230px;
        }

        .blog-posts-section {
            padding-bottom: 60px;
        }

        .blog-pagination-wrapper {
            margin-top: 40px;
            gap: 10px;
            font-size: 12.5px;
        }
    }
</style>

@endsection