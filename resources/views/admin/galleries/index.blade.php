@extends('admin.layouts.app')

@section('title', 'Gallery Management')
@section('page_title', 'Gallery Photos')

@section('content')

{{-- Stats Row --}}
<div class="row g-3 mb-4">
    <div class="col-sm-6 col-lg-4">
        <div class="stat-card">
            <div class="stat-icon" style="background-color: rgba(72, 169, 0, 0.12); color: #48A900;">
                <i class="bi bi-images"></i>
            </div>
            <div>
                <div class="stat-value">{{ $totalGalleries }}</div>
                <div class="stat-label">Total Gallery Photos</div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-4">
        <div class="stat-card">
            <div class="stat-icon" style="background-color: rgba(22, 163, 74, 0.12); color: #16a34a;">
                <i class="bi bi-check-circle"></i>
            </div>
            <div>
                <div class="stat-value">{{ $activeGalleries }}</div>
                <div class="stat-label">Active / Published</div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-4">
        <div class="stat-card">
            <div class="stat-icon" style="background-color: rgba(220, 53, 69, 0.12); color: #dc3545;">
                <i class="bi bi-dash-circle"></i>
            </div>
            <div>
                <div class="stat-value">{{ $inactiveGalleries }}</div>
                <div class="stat-label">Hidden / Inactive</div>
            </div>
        </div>
    </div>
</div>

<div class="card-custom">
    {{-- Card Header --}}
    <div class="card-custom-header">
        <div>
            <h5>Gallery Photo Library</h5>
            <small class="text-muted">Upload and manage photo albums, captions, and display order for your public gallery</small>
        </div>
        <div class="d-flex align-items-center gap-2 flex-wrap">
            @if($totalGalleries === 0)
                <form action="{{ route('admin.galleries.sync-defaults') }}" method="POST" class="d-inline" data-confirm="Would you like to import the 23 default gallery photos into the database to manage them?">
                    @csrf
                    <button type="submit" class="btn btn-outline-primary btn-sm d-flex align-items-center gap-2">
                        <i class="bi bi-cloud-arrow-down"></i>
                        <span>Import Default Photos</span>
                    </button>
                </form>
            @endif

            <a href="{{ route('gallery.index') }}" target="_blank" class="btn btn-outline-secondary btn-sm d-flex align-items-center gap-2" title="Preview Public Gallery">
                <i class="bi bi-box-arrow-up-right"></i>
                <span>View Public Gallery</span>
            </a>

            <a href="{{ route('admin.galleries.create') }}" class="btn btn-green btn-sm d-flex align-items-center gap-2">
                <i class="bi bi-plus-lg"></i>
                <span>Add New Photo</span>
            </a>
        </div>
    </div>

    {{-- Filters & Search --}}
    <div class="p-3 border-bottom bg-light">
        <form action="{{ route('admin.galleries.index') }}" method="GET" class="row g-2 align-items-center">
            <div class="col-md-5">
                <div class="input-group input-group-sm">
                    <span class="input-group-text bg-white border-end-0">
                        <i class="bi bi-search text-muted"></i>
                    </span>
                    <input type="text"
                           name="search"
                           class="form-control border-start-0"
                           placeholder="Search photo title or description..."
                           value="{{ request('search') }}">
                </div>
            </div>
            <div class="col-sm-4 col-md-3">
                <select name="status" class="form-select form-select-sm" onchange="this.form.submit()">
                    <option value="">All Statuses</option>
                    <option value="active" {{ request('status') === 'active' ? 'selected' : '' }}>Active Only</option>
                    <option value="inactive" {{ request('status') === 'inactive' ? 'selected' : '' }}>Inactive Only</option>
                </select>
            </div>
            <div class="col-sm-4 col-md-2">
                <select name="per_page" class="form-select form-select-sm" onchange="this.form.submit()">
                    <option value="12" {{ request('per_page') == '12' ? 'selected' : '' }}>12 per page</option>
                    <option value="24" {{ request('per_page') == '24' ? 'selected' : '' }}>24 per page</option>
                    <option value="48" {{ request('per_page') == '48' ? 'selected' : '' }}>48 per page</option>
                </select>
            </div>
            <div class="col-sm-4 col-md-2 d-flex gap-2">
                <button type="submit" class="btn btn-sm btn-dark w-100">
                    Filter
                </button>
                @if(request()->hasAny(['search', 'status', 'per_page']))
                    <a href="{{ route('admin.galleries.index') }}" class="btn btn-sm btn-outline-secondary" title="Reset Filters">
                        <i class="bi bi-arrow-counterclockwise"></i>
                    </a>
                @endif
            </div>
        </form>
    </div>

    {{-- Photos Table --}}
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr style="font-size: 0.8rem; text-transform: uppercase; color: var(--admin-text-muted);">
                    <th style="width: 70px;">SR No.</th>
                    <th style="width: 100px;">Photo</th>
                    <th>Title & Description</th>
                    <th style="width: 110px;">Sort Order</th>
                    <th style="width: 120px;">Status</th>
                    <th style="width: 130px;">Uploaded</th>
                    <th class="text-end" style="width: 160px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($galleries as $gallery)
                    <tr>
                        <td>
                            <span class="text-muted fw-bold">{{ $galleries->firstItem() + $loop->index }}</span>
                        </td>
                        <td>
                            <a href="{{ $gallery->image_url }}" target="_blank" class="d-inline-block text-decoration-none position-relative group" title="Click to view full photo">
                                <img src="{{ $gallery->image_url }}"
                                     alt="{{ $gallery->title ?? 'Gallery Photo' }}"
                                     title="{{ $gallery->title ?? 'Gallery Photo' }}"
                                     class="rounded border shadow-sm"
                                     style="width: 70px; height: 50px; object-fit: cover;"
                                     onerror="this.onerror=null;this.src='{{ asset('images/g1.jpg') }}';">
                            </a>
                        </td>
                        <td>
                            <div class="fw-semibold text-dark">{{ $gallery->title ?: 'Untitled Photo' }}</div>
                            @if($gallery->description)
                                <small class="text-muted d-block text-truncate" style="max-width: 380px;">
                                    {{ $gallery->description }}
                                </small>
                            @else
                                <small class="text-muted fst-italic">No description provided</small>
                            @endif
                        </td>
                        <td>
                            <span class="badge bg-light text-dark border">
                                #{{ $gallery->sort_order }}
                            </span>
                        </td>
                        <td>
                            <form action="{{ route('admin.galleries.toggle-status', $gallery->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-sm p-0 border-0 bg-transparent" title="Click to toggle status between Active and Inactive">
                                    @if($gallery->status)
                                        <span class="status-badge status-active cursor-pointer">
                                            <i class="bi bi-check-circle-fill me-1"></i> Active
                                        </span>
                                    @else
                                        <span class="status-badge status-inactive cursor-pointer">
                                            <i class="bi bi-x-circle-fill me-1"></i> Inactive
                                        </span>
                                    @endif
                                </button>
                            </form>
                        </td>
                        <td>
                            <small class="text-muted">
                                {{ $gallery->created_at ? $gallery->created_at->format('M d, Y') : 'N/A' }}
                            </small>
                        </td>
                        <td class="text-end">
                            <div class="d-flex align-items-center justify-content-end gap-1">
                                <a href="{{ route('admin.galleries.edit', $gallery->id) }}" class="btn btn-sm btn-light border text-primary" title="Edit Photo Details">
                                    <i class="bi bi-pencil-square"></i>
                                </a>

                                <form action="{{ route('admin.galleries.destroy', $gallery->id) }}"
                                      method="POST"
                                      data-confirm="Are you sure you want to delete this gallery photo? This cannot be undone."
                                      class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-light border text-danger" title="Delete Photo">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-5 text-muted">
                            <div class="py-4">
                                <i class="bi bi-images fs-1 d-block mb-3 text-secondary"></i>
                                <h6 class="fw-semibold text-dark">No gallery photos found</h6>
                                <p class="small text-muted mb-3">Upload your first inspection photo or import the pre-existing default photos.</p>
                                <div class="d-flex align-items-center justify-content-center gap-2">
                                    <a href="{{ route('admin.galleries.create') }}" class="btn btn-sm btn-green">
                                        <i class="bi bi-plus-lg me-1"></i> Upload Photo
                                    </a>
                                    @if($totalGalleries === 0)
                                        <form action="{{ route('admin.galleries.sync-defaults') }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-outline-primary">
                                                <i class="bi bi-cloud-arrow-down me-1"></i> Sync Default Photos
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @include('admin.components.pagination', ['paginator' => $galleries])
</div>

@endsection
