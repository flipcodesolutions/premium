@props([
    'id' => 'issuesCarousel_' . uniqid(),
    'images' => [],
    'height' => '100%',
    'interval' => 3500,
])

<div id="{{ $id }}" class="carousel slide carousel-fade service-issues-carousel" data-bs-ride="carousel" data-bs-interval="{{ $interval }}" data-bs-pause="hover" style="height: {{ $height }}; width: 100%; position: relative;">
    {{-- Indicators --}}
    @if(count($images) > 1)
        <div class="carousel-indicators">
            @foreach($images as $idx => $img)
                <button
                    type="button"
                    data-bs-target="#{{ $id }}"
                    data-bs-slide-to="{{ $idx }}"
                    class="{{ $idx === 0 ? 'active' : '' }}"
                    aria-current="{{ $idx === 0 ? 'true' : 'false' }}"
                    aria-label="Slide {{ $idx + 1 }}">
                </button>
            @endforeach
        </div>
    @endif

    {{-- Carousel Slides --}}
    <div class="carousel-inner h-100" style="height: 100%;">
        @foreach($images as $idx => $img)
            <div class="carousel-item {{ $idx === 0 ? 'active' : '' }} h-100" data-bs-interval="{{ $interval }}" style="height: 100%;">
                <img
                    src="{{ $img['src'] }}"
                    alt="{{ $img['alt'] ?? 'Inspection photo' }}"
                    title="{{ $img['title'] ?? ($img['alt'] ?? 'Inspection photo') }}"
                    class="d-block w-100 h-100"
                    style="object-fit: cover; object-position: center; width: 100%; height: 100%; display: block;"
                    loading="{{ $idx === 0 ? 'eager' : 'lazy' }}"
                >
            </div>
        @endforeach
    </div>

    {{-- Navigation Arrows --}}
    @if(count($images) > 1)
        <button class="carousel-control-prev service-carousel-arrow service-carousel-prev" type="button" data-bs-target="#{{ $id }}" data-bs-slide="prev" aria-label="Previous">
            <i class="bi bi-chevron-left"></i>
        </button>
        <button class="carousel-control-next service-carousel-arrow service-carousel-next" type="button" data-bs-target="#{{ $id }}" data-bs-slide="next" aria-label="Next">
            <i class="bi bi-chevron-right"></i>
        </button>
    @endif
</div>
