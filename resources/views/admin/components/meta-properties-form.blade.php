{{-- Reusable Meta Properties Form Component with SEO Validations --}}
@php
    $model = $model ?? null;
    $forTitle = $for ?? 'Blog';
@endphp

<div class="card border rounded-3 p-4 mb-4 bg-white shadow-sm meta-properties-card">
    <div class="d-flex flex-wrap align-items-center justify-content-between mb-4 pb-2 border-bottom gap-2">
        <div>
            <h5 class="fw-bold text-dark mb-1" style="font-size: 1.15rem;">
                Add Meta Properties for {{ $forTitle }}
            </h5>
            <small class="text-muted">Configure SEO meta tags and social share (Open Graph) properties with standard Google guidelines</small>
        </div>
        <span class="badge bg-success-subtle text-success border border-success-subtle px-2 py-1 small">
            <i class="bi bi-shield-check me-1"></i> SEO Best Practices Enabled
        </span>
    </div>

    <!-- 1. Meta Title -->
    <div class="row mb-3 align-items-start">
        <label for="meta_title" class="col-sm-3 col-md-2 col-form-label fw-medium text-dark pt-2">
            Meta Title
        </label>
        <div class="col-sm-9 col-md-10">
            <input type="text"
                   class="form-control @error('meta_title') is-invalid @enderror"
                   id="meta_title"
                   name="meta_title"
                   maxlength="70"
                   value="{{ old('meta_title', $model->meta_title ?? '') }}"
                   placeholder="meta title">
            @error('meta_title')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
            <div class="d-flex justify-content-between align-items-center mt-1">
                <small id="meta_title_help" class="text-muted">
                    <i class="bi bi-info-circle me-1"></i> Recommended: <strong>50–60</strong> characters (Max 70 chars)
                </small>
                <span id="meta_title_badge" class="badge bg-secondary font-monospace">0 / 60</span>
            </div>
        </div>
    </div>

    <!-- 2. Meta Description -->
    <div class="row mb-3 align-items-start">
        <label for="meta_description" class="col-sm-3 col-md-2 col-form-label fw-medium text-dark pt-2">
            Meta Description
        </label>
        <div class="col-sm-9 col-md-10">
            <textarea class="form-control @error('meta_description') is-invalid @enderror"
                      id="meta_description"
                      name="meta_description"
                      rows="3"
                      maxlength="160"
                      placeholder="meta description">{{ old('meta_description', $model->meta_description ?? '') }}</textarea>
            @error('meta_description')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
            <div class="d-flex justify-content-between align-items-center mt-1">
                <small id="meta_desc_help" class="text-muted">
                    <i class="bi bi-info-circle me-1"></i> Recommended: <strong>140–160</strong> characters (Max 160 chars)
                </small>
                <span id="meta_desc_badge" class="badge bg-secondary font-monospace">0 / 160</span>
            </div>
        </div>
    </div>

    <!-- 3. Meta Keyword -->
    <div class="row mb-3 align-items-start">
        <label for="meta_keywords" class="col-sm-3 col-md-2 col-form-label fw-medium text-dark pt-2">
            Meta Keyword
        </label>
        <div class="col-sm-9 col-md-10">
            <input type="text"
                   class="form-control @error('meta_keywords') is-invalid @enderror"
                   id="meta_keywords"
                   name="meta_keywords"
                   maxlength="255"
                   value="{{ old('meta_keywords', $model->meta_keywords ?? '') }}"
                   placeholder="meta keyword">
            @error('meta_keywords')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
            <div class="d-flex justify-content-between align-items-center mt-1">
                <small class="text-muted">
                    <i class="bi bi-info-circle me-1"></i> Separate keywords with commas (e.g. <code>building inspection, pest report, melbourne</code>).
                </small>
                <span id="meta_keywords_count" class="badge bg-light text-dark border font-monospace">0 keywords</span>
            </div>
        </div>
    </div>

    <!-- 4. Og Image -->
    <div class="row mb-3 align-items-start">
        <label class="col-sm-3 col-md-2 col-form-label fw-medium text-dark pt-2">
            Og Image
        </label>
        <div class="col-sm-9 col-md-10">
            <div class="d-flex align-items-start gap-3">
                <!-- Image Preview Box -->
                <div id="og_image_preview_box"
                     class="d-flex align-items-center justify-content-center bg-light border rounded position-relative"
                     style="width: 120px; height: 80px; min-width: 120px; overflow: hidden; background-color: #f1f4f8 !important;">
                    @if(!empty($model?->og_image_url))
                        <img id="og_image_preview_img"
                             src="{{ $model->og_image_url }}"
                             alt="OG Image Preview"
                             style="width: 100%; height: 100%; object-fit: cover;">
                    @else
                        <div id="og_image_preview_placeholder" class="d-flex align-items-center justify-content-center text-muted">
                            <svg width="44" height="44" viewBox="0 0 24 24" fill="none" stroke="#b0b8c1" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                                <rect width="18" height="18" x="3" y="3" rx="2" ry="2"/>
                                <circle cx="9" cy="9" r="2"/>
                                <path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/>
                            </svg>
                        </div>
                        <img id="og_image_preview_img"
                             src=""
                             alt="OG Image Preview"
                             style="width: 100%; height: 100%; object-fit: cover; display: none;">
                    @endif
                </div>

                <!-- Upload Image File Input -->
                <div class="flex-grow-1">
                    <label for="og_image" class="form-label small fw-semibold text-secondary mb-1">
                        Upload Image
                    </label>
                    <input type="file"
                           class="form-control @error('og_image') is-invalid @enderror"
                           id="og_image"
                           name="og_image"
                           accept="image/jpeg,image/png,image/webp,image/jpg"
                           onchange="validateAndPreviewOgImage(this)">
                    <div id="og_image_error" class="text-danger small mt-1" style="display: none;"></div>
                    @error('og_image')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                    <div class="form-text text-muted small mt-1">
                        <i class="bi bi-aspect-ratio me-1"></i> Recommended: <strong>1200×630 px</strong> (1.91:1 ratio). Formats: JPG, PNG, WEBP. Max: <strong>2MB</strong>.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 5. Author -->
    <div class="row mb-3 align-items-start">
        <label for="author" class="col-sm-3 col-md-2 col-form-label fw-medium text-dark pt-2">
            Author
        </label>
        <div class="col-sm-9 col-md-10">
            <input type="text"
                   class="form-control @error('author') is-invalid @enderror"
                   id="author"
                   name="author"
                   maxlength="100"
                   value="{{ old('author', $model->author ?? '') }}"
                   placeholder="author">
            @error('author')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
            <div class="d-flex justify-content-between align-items-center mt-1">
                <small class="text-muted">
                    <i class="bi bi-person me-1"></i> Author or publisher name for the <code>meta author</code> tag (Max 100 chars).
                </small>
                <span id="meta_author_badge" class="badge bg-light text-dark border font-monospace">0 / 100</span>
            </div>
        </div>
    </div>
</div>

<script>
    function validateAndPreviewOgImage(input) {
        const previewImg = document.getElementById('og_image_preview_img');
        const placeholder = document.getElementById('og_image_preview_placeholder');
        const errorBox = document.getElementById('og_image_error');

        if (errorBox) {
            errorBox.style.display = 'none';
            errorBox.textContent = '';
        }

        if (input.files && input.files[0]) {
            const file = input.files[0];
            const maxBytes = 2 * 1024 * 1024; // 2MB

            // Validate size
            if (file.size > maxBytes) {
                if (errorBox) {
                    errorBox.textContent = 'File size is ' + (file.size / (1024 * 1024)).toFixed(2) + 'MB. It exceeds the 2MB maximum allowed limit for SEO images.';
                    errorBox.style.display = 'block';
                }
                input.value = '';
                if (previewImg) previewImg.style.display = 'none';
                if (placeholder) placeholder.style.display = 'flex';
                return;
            }

            // Validate mime type
            const allowed = ['image/jpeg', 'image/png', 'image/webp', 'image/jpg'];
            if (!allowed.includes(file.type)) {
                if (errorBox) {
                    errorBox.textContent = 'Invalid format. Only JPG, PNG, and WEBP formats are accepted.';
                    errorBox.style.display = 'block';
                }
                input.value = '';
                return;
            }

            // Preview
            const reader = new FileReader();
            reader.onload = function(e) {
                if (previewImg) {
                    previewImg.src = e.target.result;
                    previewImg.style.display = 'block';
                }
                if (placeholder) {
                    placeholder.style.display = 'none';
                }
            };
            reader.readAsDataURL(file);
        }
    }

    document.addEventListener('DOMContentLoaded', function () {
        // Meta Title validation & live counter
        const titleInput = document.getElementById('meta_title');
        const titleBadge = document.getElementById('meta_title_badge');

        function updateTitleCounter() {
            if (!titleInput || !titleBadge) return;
            const len = titleInput.value.length;
            titleBadge.textContent = len + ' / 60 (Max: 70)';

            titleBadge.className = 'badge font-monospace ';
            if (len === 0) {
                titleBadge.className += 'bg-secondary';
            } else if (len >= 50 && len <= 60) {
                titleBadge.className += 'bg-success'; // Optimal SEO
            } else if (len > 60 && len <= 70) {
                titleBadge.className += 'bg-warning text-dark'; // Truncation warning
            } else if (len > 70) {
                titleBadge.className += 'bg-danger'; // Too long
            } else {
                titleBadge.className += 'bg-info text-dark'; // Short
            }
        }

        if (titleInput) {
            titleInput.addEventListener('input', updateTitleCounter);
            updateTitleCounter();
        }

        // Meta Description validation & live counter
        const descInput = document.getElementById('meta_description');
        const descBadge = document.getElementById('meta_desc_badge');

        function updateDescCounter() {
            if (!descInput || !descBadge) return;
            const len = descInput.value.length;
            descBadge.textContent = len + ' / 160';

            descBadge.className = 'badge font-monospace ';
            if (len === 0) {
                descBadge.className += 'bg-secondary';
            } else if (len >= 140 && len <= 160) {
                descBadge.className += 'bg-success'; // Optimal SEO
            } else if (len > 160) {
                descBadge.className += 'bg-danger'; // Too long
            } else {
                descBadge.className += 'bg-info text-dark'; // Short
            }
        }

        if (descInput) {
            descInput.addEventListener('input', updateDescCounter);
            updateDescCounter();
        }

        // Meta Keywords counter
        const kwInput = document.getElementById('meta_keywords');
        const kwBadge = document.getElementById('meta_keywords_count');
        function updateKeywordsCounter() {
            if (!kwInput || !kwBadge) return;
            const val = kwInput.value.trim();
            if (!val) {
                kwBadge.textContent = '0 keywords';
                kwBadge.className = 'badge bg-light text-dark border font-monospace';
            } else {
                const count = val.split(',').filter(k => k.trim().length > 0).length;
                kwBadge.textContent = count + ' keyword' + (count === 1 ? '' : 's');
                if (count >= 3 && count <= 10) {
                    kwBadge.className = 'badge bg-success-subtle text-success border border-success-subtle font-monospace';
                } else if (count > 15) {
                    kwBadge.className = 'badge bg-warning-subtle text-warning border border-warning-subtle font-monospace';
                } else {
                    kwBadge.className = 'badge bg-light text-dark border font-monospace';
                }
            }
        }

        if (kwInput) {
            kwInput.addEventListener('input', updateKeywordsCounter);
            updateKeywordsCounter();
        }

        // Author counter
        const authorInput = document.getElementById('author');
        const authorBadge = document.getElementById('meta_author_badge');
        if (authorInput && authorBadge) {
            const updateAuthor = () => {
                authorBadge.textContent = authorInput.value.length + ' / 100';
            };
            authorInput.addEventListener('input', updateAuthor);
            updateAuthor();
        }
    });
</script>
