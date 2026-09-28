@extends('admin.layouts.app')

@section('title', 'Manage Bookings')
@section('page_title', 'Inspection Bookings')

@section('content')

<!-- Filter Tabs & Search -->
<div class="card-custom mb-4">
    <div class="p-3 d-flex flex-wrap align-items-center justify-content-between gap-3">
        <!-- Status Tabs -->
        <div class="d-flex flex-wrap gap-2">
            <a href="{{ route('admin.bookings.index') }}" 
               class="btn btn-sm {{ !request('status') || request('status') === 'all' ? 'btn-navy' : 'btn-light border' }}">
                All ({{ $counts['all'] }})
            </a>
            <a href="{{ route('admin.bookings.index', ['status' => 'pending', 'search' => request('search')]) }}" 
               class="btn btn-sm {{ request('status') === 'pending' ? 'btn-warning text-dark fw-semibold' : 'btn-light border' }}">
                Pending ({{ $counts['pending'] }})
            </a>
            <a href="{{ route('admin.bookings.index', ['status' => 'confirmed', 'search' => request('search')]) }}" 
               class="btn btn-sm {{ request('status') === 'confirmed' ? 'btn-success fw-semibold' : 'btn-light border' }}">
                Confirmed ({{ $counts['confirmed'] }})
            </a>
            <a href="{{ route('admin.bookings.index', ['status' => 'completed', 'search' => request('search')]) }}" 
               class="btn btn-sm {{ request('status') === 'completed' ? 'btn-primary fw-semibold' : 'btn-light border' }}">
                Completed ({{ $counts['completed'] }})
            </a>
            <a href="{{ route('admin.bookings.index', ['status' => 'cancelled', 'search' => request('search')]) }}" 
               class="btn btn-sm {{ request('status') === 'cancelled' ? 'btn-danger fw-semibold' : 'btn-light border' }}">
                Cancelled ({{ $counts['cancelled'] }})
            </a>
        </div>

        <!-- Search Form -->
        <form method="GET" action="{{ route('admin.bookings.index') }}" class="d-flex gap-2">
            @if(request('status'))
                <input type="hidden" name="status" value="{{ request('status') }}">
            @endif
            <div class="input-group input-group-sm" style="min-width: 260px;">
                <input type="text" 
                       name="search" 
                       class="form-control" 
                       placeholder="Search client, phone, address..." 
                       value="{{ request('search') }}">
                <button class="btn btn-outline-secondary" type="submit">
                    <i class="bi bi-search"></i>
                </button>
            </div>
            @if(request('search'))
                <a href="{{ route('admin.bookings.index', ['status' => request('status')]) }}" class="btn btn-sm btn-light border" title="Clear Search">
                    <i class="bi bi-x-lg"></i>
                </a>
            @endif
        </form>
    </div>
</div>

<!-- Bookings Table -->
<div class="card-custom">
    <div class="card-custom-header">
        <div>
            <h5>Bookings List ({{ $bookings->total() }})</h5>
            <small class="text-muted">Inspection appointments booked online and over phone</small>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr style="font-size: 0.8rem; text-transform: uppercase; color: var(--admin-text-muted);">
                    <th style="width: 70px;">ID</th>
                    <th>Customer</th>
                    <th>Service Type</th>
                    <th>Inspection Schedule</th>
                    <th>Property Address</th>
                    <th>Status</th>
                    <th class="text-end" style="width: 140px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($bookings as $booking)
                    <tr>
                        <td>
                            <span class="text-muted fw-bold">#{{ $booking->id }}</span>
                        </td>
                        <td>
                            <div class="fw-semibold text-dark">{{ $booking->name }}</div>
                            <div class="text-muted small"><i class="bi bi-telephone me-1"></i>{{ $booking->phone }}</div>
                            @if($booking->email)
                                <div class="text-muted small"><i class="bi bi-envelope me-1"></i>{{ $booking->email }}</div>
                            @endif
                        </td>
                        <td>
                            <span class="badge bg-light text-dark border">{{ $booking->service_type }}</span>
                        </td>
                        <td>
                            <div class="fw-medium text-dark">
                                {{ $booking->inspection_date ? \Carbon\Carbon::parse($booking->inspection_date)->format('D, d M Y') : 'Date not set' }}
                            </div>
                            @if($booking->inspection_time)
                                <small class="text-muted"><i class="bi bi-clock me-1"></i>{{ $booking->inspection_time }}</small>
                            @endif
                        </td>
                        <td>
                            <span class="small text-truncate d-inline-block" style="max-width: 250px;" title="{{ $booking->property_address }}">
                                <i class="bi bi-geo-alt me-1 text-danger"></i>{{ $booking->property_address }}
                            </span>
                        </td>
                        <td>
                            <span class="status-badge status-{{ $booking->status }}">
                                {{ $booking->status }}
                            </span>
                        </td>
                        <td class="text-end">
                            <div class="d-flex align-items-center justify-content-end gap-1">
                                <a href="{{ route('admin.bookings.show', $booking->id) }}" class="btn btn-sm btn-light border text-primary" title="View Booking Details">
                                    <i class="bi bi-eye"></i> Details
                                </a>

                                <form action="{{ route('admin.bookings.destroy', $booking->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this booking?');" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-light border text-danger" title="Delete Booking">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-5 text-muted">
                            <i class="bi bi-calendar-x fs-1 d-block mb-2"></i>
                            <h6 class="fw-semibold">No bookings found</h6>
                            <p class="small text-muted mb-0">No booking requests match your current filter.</p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($bookings->hasPages())
        <div class="p-3 border-top d-flex justify-content-end">
            {{ $bookings->links('pagination::bootstrap-5') }}
        </div>
    @endif
</div>

@endsection
