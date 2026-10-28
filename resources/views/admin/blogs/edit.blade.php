@extends('admin.layouts.app')

@section('title', 'Edit Blog: ' . $post->title)
@section('page_title', 'Edit Blog Post')

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="card-custom">
            <div class="card-custom-header">
                <div>
                    <h5>Edit Article</h5>
                    <small class="text-muted">Update article content, category, or publication schedule</small>
                </div>
                <div class="d-flex gap-2">
                    <a href="{{ route('blog.show', $post->slug) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                        <i class="bi bi-box-arrow-up-right me-1"></i> Preview on Site
                    </a>
                    <a href="{{ route('admin.blogs.index') }}" class="btn btn-sm btn-outline-secondary">
                        <i class="bi bi-arrow-left me-1"></i> Back to Blog Posts
                    </a>
                </div>
            </div>

            <form action="{{ route('admin.blogs.update', $post->id) }}" method="POST" enctype="multipart/form-data" class="p-4">
                @csrf
                @method('PUT')

                <!-- Title -->
                <div class="mb-3">
                    <label for="title" class="form-label fw-semibold">Article Title <span class="text-danger">*</span></label>
                    <input type="text"
                           class="form-control @error('title') is-invalid @enderror"
                           id="title"
                           name="title"
                           value="{{ old('title', $post->title) }}"
                           required>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Slug -->
                <div class="mb-3">
                    <label for="slug" class="form-label fw-semibold">URL Slug</label>
                    <input type="text"
                           class="form-control @error('slug') is-invalid @enderror"
                           id="slug"
                           name="slug"
                           value="{{ old('slug', $post->slug) }}">
                    @error('slug')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Excerpt -->
                <div class="mb-3">
                    <label for="excerpt" class="form-label fw-semibold">Short Summary / Excerpt</label>
                    <textarea class="form-control @error('excerpt') is-invalid @enderror"
                              id="excerpt"
                              name="excerpt"
                              rows="2"
                              maxlength="1000">{{ old('excerpt', $post->excerpt) }}</textarea>
                    @error('excerpt')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Full Content -->
                <div class="mb-3">
                    <label for="content" class="form-label fw-semibold">Article Content <span class="text-danger">*</span></label>
                    <textarea class="form-control @error('content') is-invalid @enderror"
                              id="content"
                              name="content"
                              rows="12"
                              required>{{ old('content', $post->content) }}</textarea>
                    @error('content')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Featured Image -->
                <div class="mb-4">
                    <label for="image" class="form-label fw-semibold">Cover Image</label>
                    @if($post->image_url || $post->image)
                        <div class="mb-2 d-flex align-items-center gap-3 p-2 bg-light rounded border">
                            <img src="{{ $post->image_url ?? asset('storage/' . $post->image) }}" alt="{{ $post->title }}" style="width: 80px; height: 50px; object-fit: cover;" class="rounded border" onerror="this.onerror=null; this.src='{{ asset('images/service banner.jpg') }}';">
                            <div>
                                <small class="fw-semibold text-dark d-block">Current Cover</small>
                                <small class="text-muted">Uploading a new image will replace this one.</small>
                            </div>
                        </div>
                    @endif
                    <input type="file"
                           class="form-control @error('image') is-invalid @enderror"
                           id="image"
                           name="image"
                           accept="image/jpeg,image/png,image/webp,image/jpg">
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <div class="form-text">Formats accepted: JPG, JPEG, PNG, WEBP. Max size: 2MB.</div>
                </div>

                @php
                    $isScheduled = ($post->status && $post->published_at && $post->published_at->isFuture());
                    $scheduledAtValue = $isScheduled ? $post->published_at->format('Y-m-d\TH:i') : now()->addDay()->format('Y-m-d\TH:i');
                @endphp

                <!-- Schedule Post Switch & Date Picker Card -->
                <div class="card p-3 mb-3 bg-light border rounded">
                    <div class="form-check form-switch d-flex align-items-center justify-content-between p-0 m-0">
                        <div>
                            <label class="form-check-label fw-bold text-dark cursor-pointer d-block" for="is_scheduled">
                                <i class="bi bi-clock-history text-primary me-1"></i> Schedule Post for Later
                            </label>
                            <small class="text-muted">Turn on to pick a future date and time for automatic publishing.</small>
                        </div>
                        <input class="form-check-input ms-3"
                               type="checkbox"
                               role="switch"
                               id="is_scheduled"
                               name="is_scheduled"
                               value="1"
                               {{ old('is_scheduled', $isScheduled ? '1' : '0') == '1' ? 'checked' : '' }}
                               onchange="toggleScheduleDateBox()"
                               style="width: 2.75em; height: 1.4em; cursor: pointer;">
                    </div>

                    <!-- Schedule Date & Time Picker (Revealed when ON) -->
                    <div id="schedule_date_box" class="mt-3 pt-3 border-top" style="display: {{ old('is_scheduled', $isScheduled ? '1' : '0') == '1' ? 'block' : 'none' }};">
                        <div class="row align-items-center g-3">
                            <div class="col-md-6">
                                <label for="scheduled_at" class="form-label fw-semibold text-primary mb-1">
                                    <i class="bi bi-calendar2-event me-1"></i> Schedule Date &amp; Time <span class="text-danger">*</span>
                                </label>
                                <input type="datetime-local"
                                       class="form-control border-primary @error('scheduled_at') is-invalid @enderror"
                                       id="scheduled_at"
                                       name="scheduled_at"
                                       value="{{ old('scheduled_at', $scheduledAtValue) }}"
                                       min="{{ now()->format('Y-m-d\TH:i') }}">
                                @error('scheduled_at')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                                <div class="form-text text-muted">
                                    The post will remain hidden from visitors until this exact scheduled date &amp; time arrives.
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="alert alert-info py-2 px-3 mb-0 small">
                                    <i class="bi bi-info-circle-fill me-1"></i>
                                    <strong>Scheduled Post:</strong> Once scheduled, this article will show a blue <span class="badge bg-primary">Scheduled</span> badge in the admin table until it automatically goes live.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Publication Status Switch -->
                <div class="mb-4 p-3 bg-light rounded border">
                    <div class="form-check form-switch d-flex align-items-center justify-content-between p-0 m-0">
                        <div>
                            <label class="form-check-label fw-semibold text-dark cursor-pointer d-block" for="status">
                                Active (Published)
                            </label>
                            <small class="text-muted">Turn off to save as a Draft (completely hidden and unpublished).</small>
                        </div>
                        <input class="form-check-input ms-3"
                               type="checkbox"
                               role="switch"
                               id="status"
                               name="status"
                               value="1"
                               {{ old('status', $post->status ? '1' : '0') == '1' ? 'checked' : '' }}
                               style="width: 2.75em; height: 1.4em; cursor: pointer;">
                    </div>
                </div>

                <!-- Action buttons -->
                <div class="d-flex align-items-center justify-content-end gap-2 pt-3 border-top">
                    <a href="{{ route('admin.blogs.index') }}" class="btn btn-outline-secondary">
                        Cancel
                    </a>
                    <button type="submit" class="btn btn-green px-4">
                        <i class="bi bi-check-lg me-1"></i> Update Blog Post
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function toggleScheduleDateBox() {
        const switchEl = document.getElementById('is_scheduled');
        const box = document.getElementById('schedule_date_box');
        if (switchEl && box) {
            box.style.display = switchEl.checked ? 'block' : 'none';
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        const switchEl = document.getElementById('is_scheduled');
        if (switchEl) {
            switchEl.addEventListener('change', toggleScheduleDateBox);
        }
        toggleScheduleDateBox();
    });
</script>

@section('scripts')
<script>
    if (typeof toggleScheduleDateBox === 'function') {
        toggleScheduleDateBox();
    }
</script>
@endsection

@endsection
