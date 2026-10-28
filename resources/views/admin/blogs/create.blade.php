@extends('admin.layouts.app')

@section('title', 'Add New Blog Post')
@section('page_title', 'Create Blog Post')

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="card-custom">
            <div class="card-custom-header">
                <div>
                    <h5>New Article</h5>
                    <small class="text-muted">Draft or publish a new article for your website blog</small>
                </div>
                <a href="{{ route('admin.blogs.index') }}" class="btn btn-sm btn-outline-secondary">
                    <i class="bi bi-arrow-left me-1"></i> Back to Blog Posts
                </a>
            </div>

            <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data" class="p-4">
                @csrf

                <!-- Title -->
                <div class="mb-3">
                    <label for="title" class="form-label fw-semibold">Article Title <span class="text-danger">*</span></label>
                    <input type="text"
                           class="form-control @error('title') is-invalid @enderror"
                           id="title"
                           name="title"
                           value="{{ old('title') }}"
                           placeholder="e.g. Signs of Termites You Should Know About"
                           required>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Slug -->
                <div class="mb-3">
                    <label for="slug" class="form-label fw-semibold">URL Slug <span class="text-muted small fw-normal">(Optional - auto-generated from title if blank)</span></label>
                    <input type="text"
                           class="form-control @error('slug') is-invalid @enderror"
                           id="slug"
                           name="slug"
                           value="{{ old('slug') }}"
                           placeholder="signs-of-termites-you-should-know-about">
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
                              maxlength="1000"
                              placeholder="Short teaser paragraph for the blog listing page...">{{ old('excerpt') }}</textarea>
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
                              placeholder="Write your article content here..."
                              required>{{ old('content') }}</textarea>
                    @error('content')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Featured Image -->
                <div class="mb-4">
                    <label for="image" class="form-label fw-semibold">Featured Cover Image</label>
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
                               {{ old('is_scheduled') == '1' ? 'checked' : '' }}
                               onchange="toggleScheduleDateBox()"
                               style="width: 2.75em; height: 1.4em; cursor: pointer;">
                    </div>

                    <!-- Schedule Date & Time Picker (Revealed when ON) -->
                    <div id="schedule_date_box" class="mt-3 pt-3 border-top" style="display: {{ old('is_scheduled') == '1' ? 'block' : 'none' }};">
                        <div class="row align-items-center g-3">
                            <div class="col-md-6">
                                <label for="scheduled_at" class="form-label fw-semibold text-primary mb-1">
                                    <i class="bi bi-calendar2-event me-1"></i> Schedule Date &amp; Time <span class="text-danger">*</span>
                                </label>
                                <input type="datetime-local"
                                       class="form-control border-primary @error('scheduled_at') is-invalid @enderror"
                                       id="scheduled_at"
                                       name="scheduled_at"
                                       value="{{ old('scheduled_at', now()->addDay()->format('Y-m-d\TH:i')) }}"
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
                               {{ old('status', '1') == '1' ? 'checked' : '' }}
                               style="width: 2.75em; height: 1.4em; cursor: pointer;">
                    </div>
                </div>

                <!-- Action buttons -->
                <div class="d-flex align-items-center justify-content-end gap-2 pt-3 border-top">
                    <a href="{{ route('admin.blogs.index') }}" class="btn btn-outline-secondary">
                        Cancel
                    </a>
                    <button type="submit" class="btn btn-green px-4">
                        <i class="bi bi-check-lg me-1"></i> Save Blog Post
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
