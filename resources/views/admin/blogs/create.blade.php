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

                <div class="row g-3 mb-3">
                    <!-- Title -->
                    <div class="col-md-8">
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

                    <!-- Category -->
                    <div class="col-md-4">
                        <label for="blog_category_id" class="form-label fw-semibold">Category</label>
                        <select class="form-select @error('blog_category_id') is-invalid @enderror"
                                id="blog_category_id"
                                name="blog_category_id">
                            <option value="">-- Select Category --</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('blog_category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('blog_category_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
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

                <div class="row g-3 mb-4">
                    <!-- Featured Image -->
                    <div class="col-md-7">
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

                    <!-- Publication Date -->
                    <div class="col-md-5">
                        <label for="published_at" class="form-label fw-semibold">Publish Date</label>
                        <input type="datetime-local"
                               class="form-control @error('published_at') is-invalid @enderror"
                               id="published_at"
                               name="published_at"
                               value="{{ old('published_at', now()->format('Y-m-d\TH:i')) }}">
                        @error('published_at')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Status Checkbox -->
                <div class="mb-4 p-3 bg-light rounded border">
                    <div class="form-check form-switch">
                        <input class="form-check-input"
                               type="checkbox"
                               role="switch"
                               id="status"
                               name="status"
                               value="1"
                               {{ old('status', '1') == '1' ? 'checked' : '' }}>
                        <label class="form-check-label fw-semibold" for="status">
                            Publish Article Immediately (Visible on website blog)
                        </label>
                    </div>
                </div>

                <!-- Action buttons -->
                <div class="d-flex align-items-center justify-content-end gap-2 pt-3 border-top">
                    <a href="{{ route('admin.blogs.index') }}" class="btn btn-outline-secondary">
                        Cancel
                    </a>
                    <button type="submit" class="btn btn-green px-4">
                        <i class="bi bi-check-lg me-1"></i> Save & Publish Post
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
