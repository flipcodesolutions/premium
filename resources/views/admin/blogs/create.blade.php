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
                <input type="hidden" name="user_timezone" id="user_timezone" value="">

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
                              placeholder="Write your article content here...">{{ old('content') }}</textarea>
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
                                       value="{{ old('scheduled_at') }}">
                                @error('scheduled_at')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                                <div class="form-text text-muted">
                                    The post will remain hidden from visitors until this exact scheduled date &amp; time arrives.
                                </div>
                                <div class="small text-muted mt-1">
                                    <i class="bi bi-clock me-1"></i> Timezone: <strong id="tz_display_name" class="text-dark">Local Time</strong>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="alert alert-info py-2 px-3 mb-0 small">
                                    <i class="bi bi-info-circle-fill me-1"></i>
                                    <strong>Automatic Publishing:</strong> Posts are scheduled in your computer's local time. Once this selected time arrives, it automatically switches from <span class="badge bg-primary">Scheduled</span> to <span class="badge bg-success">Published</span> and goes live across the site!
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

@endsection

@section('styles')
<style>
    .ck-editor__editable_inline {
        min-height: 400px;
        font-size: 15px;
        line-height: 1.65;
    }
    .ck.ck-toolbar {
        border-top-left-radius: 6px !important;
        border-top-right-radius: 6px !important;
        border-color: #dee2e6 !important;
        background-color: #f8fafc !important;
    }
    .ck.ck-editor__main > .ck-editor__editable {
        border-bottom-left-radius: 6px !important;
        border-bottom-right-radius: 6px !important;
        border-color: #dee2e6 !important;
    }
    .ck.ck-editor__main > .ck-editor__editable:focus {
        border-color: #48A900 !important;
        box-shadow: 0 0 0 0.25rem rgba(72, 169, 0, 0.15) !important;
    }
</style>
@endsection

@section('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
<script>
    function toggleScheduleDateBox() {
        const switchEl = document.getElementById('is_scheduled');
        const box = document.getElementById('schedule_date_box');
        if (switchEl && box) {
            box.style.display = switchEl.checked ? 'block' : 'none';
        }
    }

    document.addEventListener('DOMContentLoaded', function () {
        const switchEl = document.getElementById('is_scheduled');
        if (switchEl) {
            switchEl.addEventListener('change', toggleScheduleDateBox);
        }
        toggleScheduleDateBox();

        // Detect user timezone and set local min and default date
        try {
            const userTz = Intl.DateTimeFormat().resolvedOptions().timeZone || 'Australia/Melbourne';
            const tzInput = document.getElementById('user_timezone');
            if (tzInput) tzInput.value = userTz;
            const tzDisplay = document.getElementById('tz_display_name');
            if (tzDisplay) tzDisplay.textContent = userTz;

            const scheduledInput = document.getElementById('scheduled_at');
            if (scheduledInput) {
                const now = new Date();
                const nowLocal = new Date(now.getTime() - now.getTimezoneOffset() * 60000);
                scheduledInput.min = nowLocal.toISOString().slice(0, 16);

                if (!scheduledInput.value) {
                    const tomorrow = new Date(now.getTime() + 86400000 - now.getTimezoneOffset() * 60000);
                    scheduledInput.value = tomorrow.toISOString().slice(0, 16);
                }
            }
        } catch (e) {
            console.error('Timezone detection error:', e);
        }

        // CKEditor initialization for Blog Content
        const contentEl = document.querySelector('#content');
        if (contentEl) {
            ClassicEditor
                .create(contentEl, {
                    toolbar: [
                        'heading', '|',
                        'bold', 'italic', 'underline', 'strikethrough', '|',
                        'bulletedList', 'numberedList', 'blockQuote', '|',
                        'insertTable', '|',
                        'link', '|',
                        'undo', 'redo'
                    ],
                    heading: {
                        options: [
                            { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                            { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                            { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                            { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' }
                        ]
                    }
                })
                .then(editor => {
                    const form = contentEl.closest('form');
                    if (form) {
                        form.addEventListener('submit', function () {
                            contentEl.value = editor.getData();
                        });
                    }
                    editor.model.document.on('change:data', () => {
                        contentEl.value = editor.getData();
                    });
                })
                .catch(error => {
                    console.error('CKEditor initialization error:', error);
                });
        }
    });
</script>
@endsection
