@extends('admin.layouts.app')

@section('title', 'Edit Service: ' . $service->name)
@section('page_title', 'Edit Service')

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-9">
        <div class="card-custom">
            <div class="card-custom-header">
                <div>
                    <h5>Edit Service: {{ $service->name }}</h5>
                    <small class="text-muted">Update service details and display configuration</small>
                </div>
                <div class="d-flex gap-2">
                    <a href="{{ route('services.show', $service->slug) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                        <i class="bi bi-box-arrow-up-right me-1"></i> Preview
                    </a>
                    <a href="{{ route('admin.services.index') }}" class="btn btn-sm btn-outline-secondary">
                        <i class="bi bi-arrow-left me-1"></i> Back
                    </a>
                </div>
            </div>

            <form action="{{ route('admin.services.update', $service->id) }}" method="POST" enctype="multipart/form-data" class="p-4">
                @csrf
                @method('PUT')

                <div class="row g-3 mb-3">
                    <!-- Service Name -->
                    <div class="col-md-8">
                        <label for="name" class="form-label fw-semibold">Service Name <span class="text-danger">*</span></label>
                        <input type="text"
                               class="form-control @error('name') is-invalid @enderror"
                               id="name"
                               name="name"
                               value="{{ old('name', $service->name) }}"
                               required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Starting Price -->
                    <div class="col-md-4">
                        <label for="starting_price" class="form-label fw-semibold">Starting Price ($ AUD)</label>
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="number"
                                   step="0.01"
                                   class="form-control @error('starting_price') is-invalid @enderror"
                                   id="starting_price"
                                   name="starting_price"
                                   value="{{ old('starting_price', $service->starting_price) }}"
                                   placeholder="350.00">
                        </div>
                        @error('starting_price')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
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
                           value="{{ old('slug', $service->slug) }}"
                           placeholder="service-slug">
                    @error('slug')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Short Description -->
                <div class="mb-3">
                    <label for="short_description" class="form-label fw-semibold">Short Summary <span class="text-danger">*</span></label>
                    <textarea class="form-control @error('short_description') is-invalid @enderror"
                              id="short_description"
                              name="short_description"
                              rows="2"
                              maxlength="500"
                              required>{{ old('short_description', $service->short_description) }}</textarea>
                    @error('short_description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <div class="form-text">Maximum 500 characters.</div>
                </div>

                <!-- Full Description -->
                <div class="mb-3">
                    <label for="description" class="form-label fw-semibold">Full Service Description <span class="text-danger">*</span></label>
                    <textarea class="form-control @error('description') is-invalid @enderror"
                              id="description"
                              name="description"
                              rows="6"
                              required>{{ old('description', $service->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Featured Image -->
                <div class="mb-4">
                    <label for="image" class="form-label fw-semibold">Featured Image</label>
                    @if($service->image)
                        <div class="mb-2 d-flex align-items-center gap-3 p-2 bg-light rounded border">
                            <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->name }}" style="width: 80px; height: 60px; object-fit: cover;" class="rounded border">
                            <div>
                                <small class="fw-semibold text-dark d-block">Current Image</small>
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

                <!-- Status Checkbox -->
                <div class="mb-4 p-3 bg-light rounded border">
                    <div class="form-check form-switch">
                        <input class="form-check-input"
                               type="checkbox"
                               role="switch"
                               id="status"
                               name="status"
                               value="1"
                               {{ old('status', $service->status ? '1' : '0') == '1' ? 'checked' : '' }}>
                        <label class="form-check-label fw-semibold" for="status">
                            Service is Active (Visible on the website)
                        </label>
                    </div>
                </div>

                <!-- Submit / Cancel -->
                <div class="d-flex align-items-center justify-content-end gap-2 pt-3 border-top">
                    <a href="{{ route('admin.services.index') }}" class="btn btn-outline-secondary">
                        Cancel
                    </a>
                    <button type="submit" class="btn btn-green px-4">
                        <i class="bi bi-check-lg me-1"></i> Update Service
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
