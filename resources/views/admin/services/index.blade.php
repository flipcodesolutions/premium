@extends('admin.layouts.app')

@section('title', 'Manage Services')
@section('page_title', 'Services Management')

@section('content')

<div class="card-custom">
    <div class="card-custom-header">
        <div>
            <h5>All Services</h5>
            <small class="text-muted">Manage the services displayed on your website</small>
        </div>
        <div>
            <a href="{{ route('admin.services.create') }}" class="btn btn-green d-flex align-items-center gap-2">
                <i class="bi bi-plus-lg"></i>
                <span>Add New Service</span>
            </a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr style="font-size: 0.8rem; text-transform: uppercase; color: var(--admin-text-muted);">
                    <th style="width: 80px;">Image</th>
                    <th>Service Name</th>
                    <th>Slug</th>
                    <th>Starting Price</th>
                    <th>Status</th>
                    <th class="text-end" style="width: 220px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($services as $service)
                    <tr>
                        <td>
                            @if($service->image)
                                <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->name }}" class="rounded border" style="width: 54px; height: 42px; object-fit: cover;">
                            @else
                                <div class="rounded border bg-light d-flex align-items-center justify-content-center text-muted" style="width: 54px; height: 42px; font-size: 0.8rem;">
                                    <i class="bi bi-image"></i>
                                </div>
                            @endif
                        </td>
                        <td>
                            <div class="fw-semibold text-dark">{{ $service->name }}</div>
                            <small class="text-muted d-block text-truncate" style="max-width: 300px;">
                                {{ $service->short_description }}
                            </small>
                        </td>
                        <td>
                            <code class="small text-secondary">{{ $service->slug }}</code>
                        </td>
                        <td>
                            @if($service->starting_price)
                                <span class="fw-semibold text-success">${{ number_format($service->starting_price, 2) }}</span>
                            @else
                                <span class="text-muted small">Not set</span>
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('admin.services.toggle-status', $service->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-sm p-0 border-0 bg-transparent" title="Click to toggle status">
                                    @if($service->status)
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
                        <td class="text-end">
                            <div class="d-flex align-items-center justify-content-end gap-1">
                                <a href="{{ route('services.show', $service->slug) }}" target="_blank" class="btn btn-sm btn-light border" title="Preview on Website">
                                    <i class="bi bi-box-arrow-up-right"></i>
                                </a>

                                <a href="{{ route('admin.services.edit', $service->id) }}" class="btn btn-sm btn-light border text-primary" title="Edit Service">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>

                                <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this service? This cannot be undone.');" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-light border text-danger" title="Delete Service">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-5 text-muted">
                            <i class="bi bi-tools fs-1 d-block mb-2"></i>
                            <h6 class="fw-semibold">No services found</h6>
                            <p class="small text-muted mb-3">Add your first inspection service to have it featured on the website.</p>
                            <a href="{{ route('admin.services.create') }}" class="btn btn-sm btn-green">
                                <i class="bi bi-plus-lg me-1"></i> Add Service
                            </a>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($services->hasPages())
        <div class="p-3 border-top d-flex justify-content-end">
            {{ $services->links('pagination::bootstrap-5') }}
        </div>
    @endif
</div>

@endsection
