@extends('admin.layouts.app')

@section('title', 'Add Gallery Photo')
@section('page_title', 'Upload Gallery Photo')

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card-custom">
            <div class="card-custom-header">
                <div>
                    <h5>Upload New Photo</h5>
                    <small class="text-muted">Add a new inspection or defect photo to your public showcase</small>
                </div>
                <a href="{{ route('admin.galleries.index') }}" class="btn btn-sm btn-outline-secondary">
                    <i class="bi bi-arrow-left me-1"></i> Back to Gallery
                </a>
            </div>

            <form action="{{ route('admin.galleries.store') }}" method="POST" enctype="multipart/form-data" class="p-4">
                @csrf

                <!-- Image Upload with Live Preview -->
                <div class="mb-4">
                    <label class="form-label fw-semibold">Photo Image <span class="text-danger">*</span></label>
                    <div class="border rounded p-3 text-center bg-light position-relative" id="drop-area" style="border: 2px dashed #ced4da !important; cursor: pointer;">
                        <input type="file"
                               class="d-none @error('image') is-invalid @enderror"
                               id="image"
                               name="image"
                               accept="image/jpeg,image/png,image/webp,image/jpg"
                               required>
                        
                        <div id="upload-placeholder" class="py-4">
                            <i class="bi bi-cloud-arrow-up display-5 text-secondary d-block mb-2"></i>
                            <div class="fw-semibold text-dark">Click to browse or drag & drop photo here</div>
                            <small class="text-muted d-block">Supported formats: JPG, JPEG, PNG, WEBP (Max 5MB)</small>
                        </div>

                        <div id="preview-container" class="d-none position-relative text-center py-2">
                            <img id="image-preview"
                                 src="#"
                                 alt="Photo Preview"
                                 title="Photo Preview"
                                 class="img-fluid rounded border shadow-sm"
                                 style="max-height: 280px; object-fit: contain;">
                            <div class="mt-2">
                                <button type="button" id="btn-change-image" class="btn btn-sm btn-outline-secondary">
                                    <i class="bi bi-arrow-repeat me-1"></i> Change Photo
                                </button>
                            </div>
                        </div>
                    </div>
                    @error('image')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Title -->
                <div class="mb-3">
                    <label for="title" class="form-label fw-semibold">Photo Title / Caption</label>
                    <input type="text"
                           class="form-control @error('title') is-invalid @enderror"
                           id="title"
                           name="title"
                           value="{{ old('title') }}"
                           placeholder="e.g. Subfloor Timber Pest Inspection in Melbourne">
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <div class="form-text">Displayed on the lightbox caption when users view the photo.</div>
                </div>

                <!-- Description -->
                <div class="mb-3">
                    <label for="description" class="form-label fw-semibold">Description / Findings</label>
                    <textarea class="form-control @error('description') is-invalid @enderror"
                              id="description"
                              name="description"
                              rows="3"
                              placeholder="Brief summary of defect, inspection area, or context...">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <div class="form-text">Maximum 1000 characters.</div>
                </div>

                <div class="row g-3 mb-4">
                    <!-- Sort Order -->
                    <div class="col-md-6">
                        <label for="sort_order" class="form-label fw-semibold">Display Sort Order</label>
                        <input type="number"
                               class="form-control @error('sort_order') is-invalid @enderror"
                               id="sort_order"
                               name="sort_order"
                               value="{{ old('sort_order', $nextSortOrder ?? 1) }}"
                               min="0"
                               step="1">
                        @error('sort_order')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">Lower numbers appear first on the gallery.</div>
                    </div>

                    <!-- Status Switch -->
                    <div class="col-md-6 d-flex flex-column justify-content-end">
                        <div class="p-3 bg-light rounded border">
                            <div class="form-check form-switch mb-0">
                                <input class="form-check-input"
                                       type="checkbox"
                                       role="switch"
                                       id="status"
                                       name="status"
                                       value="1"
                                       {{ old('status', '1') == '1' ? 'checked' : '' }}>
                                <label class="form-check-label fw-semibold" for="status">
                                    Published / Active
                                </label>
                            </div>
                            <small class="text-muted d-block mt-1">If unchecked, photo is hidden from public view.</small>
                        </div>
                    </div>
                </div>

                <!-- Submit / Cancel Actions -->
                <div class="d-flex align-items-center justify-content-end gap-2 pt-3 border-top">
                    <a href="{{ route('admin.galleries.index') }}" class="btn btn-outline-secondary">
                        Cancel
                    </a>
                    <button type="submit" class="btn btn-green px-4">
                        <i class="bi bi-cloud-arrow-up me-1"></i> Upload Photo
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const dropArea = document.getElementById('drop-area');
        const fileInput = document.getElementById('image');
        const uploadPlaceholder = document.getElementById('upload-placeholder');
        const previewContainer = document.getElementById('preview-container');
        const imagePreview = document.getElementById('image-preview');
        const btnChangeImage = document.getElementById('btn-change-image');

        if (!dropArea || !fileInput) return;

        dropArea.addEventListener('click', function (e) {
            if (e.target !== btnChangeImage && !btnChangeImage.contains(e.target)) {
                fileInput.click();
            }
        });

        btnChangeImage.addEventListener('click', function (e) {
            e.stopPropagation();
            fileInput.click();
        });

        fileInput.addEventListener('change', function () {
            handleFiles(this.files);
        });

        ['dragenter', 'dragover'].forEach(eventName => {
            dropArea.addEventListener(eventName, function (e) {
                e.preventDefault();
                e.stopPropagation();
                dropArea.style.borderColor = '#48A900';
                dropArea.style.backgroundColor = 'rgba(72, 169, 0, 0.05)';
            }, false);
        });

        ['dragleave', 'drop'].forEach(eventName => {
            dropArea.addEventListener(eventName, function (e) {
                e.preventDefault();
                e.stopPropagation();
                dropArea.style.borderColor = '#ced4da';
                dropArea.style.backgroundColor = '#f8f9fa';
            }, false);
        });

        dropArea.addEventListener('drop', function (e) {
            const dt = e.dataTransfer;
            const files = dt.files;
            if (files && files.length > 0) {
                fileInput.files = files;
                handleFiles(files);
            }
        });

        function handleFiles(files) {
            if (files && files[0]) {
                const file = files[0];
                if (!file.type.match('image.*')) {
                    alert('Please select an image file (JPG, PNG, WEBP).');
                    return;
                }
                const reader = new FileReader();
                reader.onload = function (e) {
                    imagePreview.src = e.target.result;
                    uploadPlaceholder.classList.add('d-none');
                    previewContainer.classList.remove('d-none');
                };
                reader.readAsDataURL(file);
            }
        }
    });
</script>
@endsection
