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

                <div class="row g-3 mb-3">
                    <!-- Title -->
                    <div class="col-md-8">
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

                    <!-- Category -->
                    <div class="col-md-4">
                        <label for="blog_category_id" class="form-label fw-semibold">Category</label>
                        <select class="form-select @error('blog_category_id') is-invalid @enderror"
                                id="blog_category_id"
                                name="blog_category_id">
                            <option value="">-- Select Category --</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('blog_category_id', $post->blog_category_id) == $category->id ? 'selected' : '' }}>
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

                <div class="row g-3 mb-4">
                    <!-- Featured Image -->
                    <div class="col-md-7">
                        <label for="image" class="form-label fw-semibold">Cover Image</label>
                        @if($post->image)
                            <div class="mb-2 d-flex align-items-center gap-3 p-2 bg-light rounded border">
                                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" style="width: 80px; height: 50px; object-fit: cover;" class="rounded border">
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

                    <!-- Publication Date -->
                    <div class="col-md-5">
                        <label for="published_at" class="form-label fw-semibold">Publish Date</label>
                        <input type="datetime-local"
                               class="form-control @error('published_at') is-invalid @enderror"
                               id="published_at"
                               name="published_at"
                               value="{{ old('published_at', $post->published_at ? $post->published_at->format('Y-m-d\TH:i') : '') }}">
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
                               {{ old('status', $post->status ? '1' : '0') == '1' ? 'checked' : '' }}>
                        <label class="form-check-label fw-semibold" for="status">
                            Published (Visible on website blog)
                        </label>
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

@endsection
