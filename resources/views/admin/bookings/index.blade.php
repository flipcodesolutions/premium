@extends('admin.layouts.app')

@section('title', 'Manage Bookings')
@section('page_title', 'Inspection Bookings')

@section('styles')
<style>
    /* Prevent table and dropdown menu from being cut off */
    .bookings-table-card {
        overflow: visible !important;
    }

    .bookings-table-card .table-responsive {
        min-height: 290px;
        overflow-y: visible !important;
    }

    @media (max-width: 991px) {
        .bookings-table-card .table-responsive {
            overflow-x: auto;
        }
    }

    .bookings-table-card .dropdown-menu {
        z-index: 1060 !important;
        box-shadow: 0 10px 30px rgba(11, 31, 58, 0.16) !important;
        border-radius: 10px;
    }

    .bookings-table-card .dropdown-item {
        transition: all 0.15s ease;
    }
</style>
@endsection

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
<div class="card-custom bookings-table-card">
    <div class="card-custom-header">
        <div>
            <h5>Bookings List ({{ $bookings->total() }})</h5>
            <small class="text-muted">Inspection appointments booked online and over phone</small>
        </div>
    </div>

    <div class="table-responsive bookings-table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr style="font-size: 0.8rem; text-transform: uppercase; color: var(--admin-text-muted);">
                    <th style="width: 75px;">SR No.</th>
                    <th>Customer</th>
                    <th>Service Type</th>
                    <th>Inspection Schedule</th>
                    <th>Property Address</th>
                    <th>Status</th>
                    <th class="text-end" style="width: 150px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($bookings as $booking)
                    <tr>
                        <td>
                            <span class="text-muted fw-bold">{{ $bookings->firstItem() + $loop->index }}</span>
                        </td>
                        <td>
                            <div class="fw-semibold text-dark">{{ $booking->name }}</div>
                            <div class="text-muted small"><i class="bi bi-telephone me-1"></i>{{ $booking->phone }}</div>
                            @if($booking->email)
                                <div class="text-muted small" style="word-break: break-all;"><i class="bi bi-envelope me-1"></i>{{ $booking->email }}</div>
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
                            <div class="small text-dark" style="min-width: 150px; max-width: 250px; word-break: break-word;">
                                <i class="bi bi-geo-alt me-1 text-danger"></i>{{ $booking->property_address }}
                            </div>
                        </td>
                        <td>
                            <div class="dropdown">
                                <button class="status-badge status-{{ $booking->status }} dropdown-toggle border-0" 
                                        type="button" 
                                        data-bs-toggle="dropdown" 
                                        data-bs-boundary="viewport"
                                        data-bs-popper-config='{"strategy":"fixed"}'
                                        aria-expanded="false" 
                                        title="Click to quickly change booking status & update client">
                                    {{ ucfirst($booking->status) }}
                                </button>
                                <ul class="dropdown-menu shadow-lg p-2 border" style="min-width: 215px; font-size: 0.85rem; z-index: 1060;">
                                    <li class="dropdown-header text-uppercase fw-bold text-muted px-2 py-1" style="font-size: 0.7rem;">Quick Change Status</li>
                                    @foreach(['pending' => 'Pending', 'confirmed' => 'Confirmed', 'completed' => 'Completed', 'cancelled' => 'Cancelled'] as $stKey => $stLabel)
                                        <li>
                                            <form action="{{ route('admin.bookings.update-status', $booking->id) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="status" value="{{ $stKey }}">
                                                <input type="hidden" name="notify_customer" value="1">
                                                <button type="submit" class="dropdown-item d-flex align-items-center justify-content-between rounded px-2 py-1 {{ $booking->status === $stKey ? 'active fw-bold' : '' }}">
                                                    <span>{{ $stLabel }}</span>
                                                    @if($booking->status === $stKey)
                                                        <i class="bi bi-check2"></i>
                                                    @endif
                                                </button>
                                            </form>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </td>
                        <td class="text-end">
                            <div class="d-flex align-items-center justify-content-end gap-1">
                                @if($booking->status === 'completed')
                                    <a href="{{ route('admin.bookings.report', $booking->id) }}" target="_blank" class="btn btn-sm btn-success text-white fw-semibold" title="Generate &amp; Print {{ $booking->service_type }} Report">
                                        <i class="bi bi-file-earmark-check-fill"></i> Report
                                    </a>
                                @endif

                                <a href="{{ route('admin.bookings.show', $booking->id) }}" class="btn btn-sm btn-light border text-primary" title="View Booking Details">
                                    <i class="bi bi-eye"></i> Details
                                </a>

                                <form action="{{ route('admin.bookings.destroy', $booking->id) }}" method="POST" data-confirm="Are you sure you want to delete this booking?" class="d-inline">
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

    @include('admin.components.pagination', ['paginator' => $bookings])
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Initialize dropdowns with fixed positioning to prevent clipping by table overflow
        const statusDropdowns = document.querySelectorAll('.bookings-table-responsive [data-bs-toggle="dropdown"]');
        statusDropdowns.forEach(function (toggleEl) {
            new bootstrap.Dropdown(toggleEl, {
                boundary: 'viewport',
                popperConfig: function () {
                    return {
                        strategy: 'fixed',
                        modifiers: [
                            {
                                name: 'preventOverflow',
                                options: {
                                    boundary: 'viewport',
                                    altAxis: true,
                                    padding: 10
                                }
                            },
                            {
                                name: 'flip',
                                options: {
                                    boundary: 'viewport',
                                    fallbackPlacements: ['top-start', 'top-end', 'bottom-start']
                                }
                            }
                        ]
                    };
                }
            });
        });
    });
</script>
@endpush

@endsection
