@extends('admin.layouts.app')

@section('title', 'Add New CRM Master')
@section('page_title', 'Create CRM Master')

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="card-custom">
            <div class="card-custom-header">
                <div>
                    <h5>New CRM Master</h5>
                    <small class="text-muted">Create a new CRM Master record with full content and SEO properties</small>
                </div>
                <a href="{{ route('admin.crm-masters.index') }}" class="btn btn-sm btn-outline-secondary">
                    <i class="bi bi-arrow-left me-1"></i> Back to CRM Master
                </a>
            </div>

            <form action="{{ route('admin.crm-masters.store') }}" method="POST" enctype="multipart/form-data" class="p-4">
                @csrf

                <div class="row g-3 mb-3">
                    <!-- Title -->
                    <div class="col-md-8">
                        <label for="title" class="form-label fw-semibold">Title <span class="text-danger">*</span></label>
                        <input type="text"
                               class="form-control @error('title') is-invalid @enderror"
                               id="title"
                               name="title"
                               value="{{ old('title') }}"
                               placeholder="e.g. Master CRM Entry Title"
                               required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Publish Date -->
                    <div class="col-md-4">
                        <label for="publish_date" class="form-label fw-semibold">Publish Date</label>
                        <input type="date"
                               class="form-control @error('publish_date') is-invalid @enderror"
                               id="publish_date"
                               name="publish_date"
                               value="{{ old('publish_date', date('Y-m-d')) }}">
                        @error('publish_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Slug -->
                <div class="mb-3">
                    <label for="slug" class="form-label fw-semibold">URL Slug <span class="text-muted small fw-normal">(Auto-generated from title, or enter custom)</span></label>
                    <div class="input-group">
                        <input type="text"
                               class="form-control @error('slug') is-invalid @enderror"
                               id="slug"
                               name="slug"
                               value="{{ old('slug') }}"
                               placeholder="master-crm-entry-title">
                        <button type="button" class="btn btn-outline-secondary" id="btn_sync_slug" title="Regenerate slug from title">
                            <i class="bi bi-arrow-clockwise me-1"></i> Sync from Title
                        </button>
                    </div>
                    @error('slug')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Image -->
                <div class="mb-4">
                    <label for="image" class="form-label fw-semibold">Image</label>
                    <input type="file"
                           class="form-control @error('image') is-invalid @enderror"
                           id="image"
                           name="image"
                           accept="image/jpeg,image/png,image/webp,image/jpg">
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <div class="form-text text-muted small">Formats accepted: JPG, JPEG, PNG, WEBP. Max size: 2MB.</div>
                </div>

                <!-- Description -->
                <div class="mb-4">
                    <label for="description" class="form-label fw-semibold">Description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror"
                              id="description"
                              name="description"
                              rows="10"
                              placeholder="Write your CRM content or description here...">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Meta Properties Section -->
                @include('admin.components.meta-properties-form', ['for' => 'CRM Master'])

                <!-- Status Checkbox -->
                <div class="mb-4 p-3 bg-light rounded border">
                    <div class="form-check form-switch d-flex align-items-center justify-content-between p-0 m-0">
                        <div>
                            <label class="form-check-label fw-semibold text-dark cursor-pointer d-block" for="status">
                                Active Status
                            </label>
                            <small class="text-muted">Turn on to activate this record</small>
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

                <!-- Submit / Cancel -->
                <div class="d-flex align-items-center justify-content-end gap-2 pt-3 border-top">
                    <a href="{{ route('admin.crm-masters.index') }}" class="btn btn-outline-secondary">
                        Cancel
                    </a>
                    <button type="submit" class="btn btn-green px-4">
                        <i class="bi bi-check-lg me-1"></i> Save CRM Master
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
        min-height: 280px;
        font-size: 15px;
        line-height: 1.6;
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
    document.addEventListener('DOMContentLoaded', function () {
        // Auto-generate slug from title in real-time
        const titleInput = document.getElementById('title');
        const slugInput = document.getElementById('slug');
        const btnSyncSlug = document.getElementById('btn_sync_slug');

        function slugify(text) {
            return text
                .toString()
                .toLowerCase()
                .trim()
                .replace(/&/g, '-and-')
                .replace(/[\s\W-]+/g, '-')
                .replace(/^-+|-+$/g, '');
        }

        if (titleInput && slugInput) {
            let isCustomSlug = Boolean(slugInput.value && slugInput.value.trim().length > 0);

            titleInput.addEventListener('input', function () {
                if (!isCustomSlug) {
                    slugInput.value = slugify(titleInput.value);
                }
            });

            slugInput.addEventListener('input', function () {
                isCustomSlug = slugInput.value.trim().length > 0;
            });

            if (btnSyncSlug) {
                btnSyncSlug.addEventListener('click', function () {
                    slugInput.value = slugify(titleInput.value);
                    isCustomSlug = false;
                });
            }
        }

        const descEl = document.querySelector('#description');
        if (descEl) {
            ClassicEditor
                .create(descEl, {
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
                    const form = descEl.closest('form');
                    if (form) {
                        form.addEventListener('submit', function () {
                            descEl.value = editor.getData();
                        });
                    }
                    editor.model.document.on('change:data', () => {
                        descEl.value = editor.getData();
                    });
                })
                .catch(error => {
                    console.error('CKEditor error:', error);
                });
        }
    });
</script>
@endsection
