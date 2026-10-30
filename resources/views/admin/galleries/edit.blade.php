@extends('admin.layouts.app')

@section('title', 'Edit Gallery Photo')
@section('page_title', 'Edit Photo Details')

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card-custom">
            <div class="card-custom-header">
                <div>
                    <h5>Edit Gallery Photo</h5>
                    <small class="text-muted">Update image captions, replace photo file, or adjust display ordering</small>
                </div>
                <div class="d-flex align-items-center gap-2">
                    <a href="{{ route('admin.galleries.index') }}" class="btn btn-sm btn-outline-secondary">
                        <i class="bi bi-arrow-left me-1"></i> Back to Gallery
                    </a>
                </div>
            </div>

            <form action="{{ route('admin.galleries.update', $gallery->id) }}" method="POST" enctype="multipart/form-data" class="p-4">
                @csrf
                @method('PUT')

                <!-- Current & Replace Image -->
                <div class="mb-4">
                    <label class="form-label fw-semibold">Photo Image</label>
                    <div class="row g-3 align-items-center mb-3">
                        <div class="col-auto">
                            <div class="position-relative">
                                <img src="{{ $gallery->image_url }}"
                                     alt="{{ $gallery->title ?? 'Current Photo' }}"
                                     title="{{ $gallery->title ?? 'Current Photo' }}"
                                     class="rounded border shadow-sm"
                                     style="width: 140px; height: 100px; object-fit: cover;"
                                     onerror="this.onerror=null;this.src='{{ asset('images/g1.jpg') }}';">
                                <span class="badge bg-dark position-absolute bottom-0 start-0 m-1 opacity-75" style="font-size: 0.65rem;">
                                    Current
                                </span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="small text-muted mb-1">
                                <strong>File path:</strong> <code>{{ $gallery->image }}</code>
                            </div>
                            <small class="text-muted d-block">
                                If you wish to replace this photo with a new one, select or drag a new image file below. Otherwise leave blank to keep current photo.
                            </small>
                        </div>
                    </div>

                    <div class="border rounded p-3 text-center bg-light position-relative" id="drop-area" style="border: 2px dashed #ced4da !important; cursor: pointer;">
                        <input type="file"
                               class="d-none @error('image') is-invalid @enderror"
                               id="image"
                               name="image"
                               accept="image/jpeg,image/png,image/webp,image/jpg">
                        
                        <div id="upload-placeholder" class="py-3">
                            <i class="bi bi-arrow-repeat fs-2 text-secondary d-block mb-1"></i>
                            <div class="fw-semibold text-dark">Click to browse new photo or drag & drop here</div>
                            <small class="text-muted d-block">Supported formats: JPG, JPEG, PNG, WEBP (Max 5MB)</small>
                        </div>

                        <div id="preview-container" class="d-none position-relative text-center py-2">
                            <span class="badge bg-success mb-2">New Image Selected:</span>
                            <div>
                                <img id="image-preview"
                                     src="#"
                                     alt="New Photo Preview"
                                     title="New Photo Preview"
                                     class="img-fluid rounded border shadow-sm"
                                     style="max-height: 220px; object-fit: contain;">
                            </div>
                            <div class="mt-2">
                                <button type="button" id="btn-change-image" class="btn btn-sm btn-outline-secondary">
                                    <i class="bi bi-arrow-repeat me-1"></i> Select Different Photo
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
                           value="{{ old('title', $gallery->title) }}"
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
                              placeholder="Brief summary of defect, inspection area, or context...">{{ old('description', $gallery->description) }}</textarea>
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
                               value="{{ old('sort_order', $gallery->sort_order) }}"
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
                                       {{ old('status', $gallery->status ? '1' : '0') == '1' ? 'checked' : '' }}>
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
                        <i class="bi bi-check-lg me-1"></i> Update Photo
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
