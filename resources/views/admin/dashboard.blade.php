@extends('admin.layouts.app')

@section('title', 'Dashboard')
@section('page_title', 'Dashboard Overview')

@section('content')

<!-- ==========================================
     METRIC KPI CARDS
=========================================== -->
<div class="row g-4 mb-4">
    <!-- Bookings KPI -->
    <div class="col-xl-3 col-md-6">
        <div class="card-custom h-100 p-4 position-relative overflow-hidden">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <span class="text-uppercase fw-semibold" style="font-size: 0.75rem; letter-spacing: 0.5px; color: var(--admin-text-muted);">
                    Bookings
                </span>
                <div style="width: 44px; height: 44px; border-radius: 10px; background: rgba(18, 63, 103, 0.1); color: var(--admin-blue);" class="d-flex align-items-center justify-content-center fs-5">
                    <i class="bi bi-calendar-check"></i>
                </div>
            </div>
            <div class="d-flex align-items-baseline gap-2 mb-2">
                <h2 class="fw-bold mb-0" style="color: var(--admin-navy);">{{ $totalBookings }}</h2>
                @if($pendingBookings > 0)
                    <span class="badge bg-warning text-dark">{{ $pendingBookings }} pending</span>
                @else
                    <span class="badge bg-light text-secondary">0 pending</span>
                @endif
            </div>
            <div class="mt-2">
                <a href="{{ route('admin.bookings.index') }}" class="text-decoration-none small fw-semibold text-primary d-flex align-items-center gap-1">
                    Manage bookings <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Quote Requests KPI -->
    <div class="col-xl-3 col-md-6">
        <div class="card-custom h-100 p-4 position-relative overflow-hidden">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <span class="text-uppercase fw-semibold" style="font-size: 0.75rem; letter-spacing: 0.5px; color: var(--admin-text-muted);">
                    Quote Requests
                </span>
                <div style="width: 44px; height: 44px; border-radius: 10px; background: rgba(72, 169, 0, 0.12); color: var(--admin-green);" class="d-flex align-items-center justify-content-center fs-5">
                    <i class="bi bi-file-earmark-text"></i>
                </div>
            </div>
            <div class="d-flex align-items-baseline gap-2 mb-2">
                <h2 class="fw-bold mb-0" style="color: var(--admin-navy);">{{ $totalQuotes }}</h2>
                @if($pendingQuotes > 0)
                    <span class="badge bg-warning text-dark">{{ $pendingQuotes }} pending</span>
                @else
                    <span class="badge bg-light text-secondary">0 pending</span>
                @endif
            </div>
            <div class="mt-2">
                <a href="{{ route('admin.quotes.index') }}" class="text-decoration-none small fw-semibold text-primary d-flex align-items-center gap-1">
                    Manage quotes <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Messages KPI -->
    <div class="col-xl-3 col-md-6">
        <div class="card-custom h-100 p-4 position-relative overflow-hidden">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <span class="text-uppercase fw-semibold" style="font-size: 0.75rem; letter-spacing: 0.5px; color: var(--admin-text-muted);">
                    Contact Messages
                </span>
                <div style="width: 44px; height: 44px; border-radius: 10px; background: rgba(220, 53, 69, 0.1); color: #dc3545;" class="d-flex align-items-center justify-content-center fs-5">
                    <i class="bi bi-chat-dots"></i>
                </div>
            </div>
            <div class="d-flex align-items-baseline gap-2 mb-2">
                <h2 class="fw-bold mb-0" style="color: var(--admin-navy);">{{ $totalMessages }}</h2>
                @if($unreadMessages > 0)
                    <span class="badge bg-danger">{{ $unreadMessages }} unread</span>
                @else
                    <span class="badge bg-light text-secondary">0 unread</span>
                @endif
            </div>
            <div class="mt-2">
                <a href="{{ route('admin.messages.index') }}" class="text-decoration-none small fw-semibold text-primary d-flex align-items-center gap-1">
                    View inquiries <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Active Services KPI -->
    <div class="col-xl-3 col-md-6">
        <div class="card-custom h-100 p-4 position-relative overflow-hidden">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <span class="text-uppercase fw-semibold" style="font-size: 0.75rem; letter-spacing: 0.5px; color: var(--admin-text-muted);">
                    Services
                </span>
                <div style="width: 44px; height: 44px; border-radius: 10px; background: rgba(11, 31, 58, 0.1); color: var(--admin-navy);" class="d-flex align-items-center justify-content-center fs-5">
                    <i class="bi bi-tools"></i>
                </div>
            </div>
            <div class="d-flex align-items-baseline gap-2 mb-2">
                <h2 class="fw-bold mb-0" style="color: var(--admin-navy);">{{ $totalServices }}</h2>
                <span class="badge bg-success">{{ $activeServices }} active</span>
            </div>
            <div class="mt-2">
                <a href="{{ route('admin.services.index') }}" class="text-decoration-none small fw-semibold text-primary d-flex align-items-center gap-1">
                    Manage services <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- ==========================================
     QUICK ACTIONS
=========================================== -->
<div class="card-custom p-3 mb-4">
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
        <div class="fw-semibold text-dark d-flex align-items-center gap-2">
            <i class="bi bi-lightning-charge-fill text-warning"></i>
            <span>Quick Shortcuts:</span>
        </div>
        <div class="d-flex flex-wrap gap-2">
            <a href="{{ route('admin.services.create') }}" class="btn btn-sm btn-green d-flex align-items-center gap-1">
                <i class="bi bi-plus-circle"></i> Add New Service
            </a>
            <a href="{{ route('admin.bookings.index', ['status' => 'pending']) }}" class="btn btn-sm btn-outline-secondary">
                <i class="bi bi-clock"></i> Pending Bookings ({{ $pendingBookings }})
            </a>
            <a href="{{ route('admin.quotes.index', ['status' => 'pending']) }}" class="btn btn-sm btn-outline-secondary">
                <i class="bi bi-inbox"></i> Pending Quotes ({{ $pendingQuotes }})
            </a>
            <a href="{{ route('admin.messages.index', ['status' => 'unread']) }}" class="btn btn-sm btn-outline-secondary">
                <i class="bi bi-envelope"></i> Unread Messages ({{ $unreadMessages }})
            </a>
        </div>
    </div>
</div>

<!-- ==========================================
     RECENT ACTIVITY (2 COLUMNS)
=========================================== -->
<div class="row g-4 mb-4">
    <!-- Recent Bookings -->
    <div class="col-lg-6">
        <div class="card-custom h-100">
            <div class="card-custom-header">
                <h5><i class="bi bi-calendar-event me-2 text-primary"></i>Recent Inspection Bookings</h5>
                <a href="{{ route('admin.bookings.index') }}" class="btn btn-sm btn-outline-secondary">View All</a>
            </div>
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr style="font-size: 0.8rem; text-transform: uppercase; color: var(--admin-text-muted);">
                            <th>Client</th>
                            <th>Service</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th class="text-end">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentBookings as $booking)
                            <tr>
                                <td>
                                    <div class="fw-semibold">{{ $booking->name }}</div>
                                    <small class="text-muted">{{ $booking->phone }}</small>
                                </td>
                                <td>
                                    <span class="badge bg-light text-dark border">{{ $booking->service_type }}</span>
                                </td>
                                <td>
                                    <small class="text-nowrap">{{ $booking->inspection_date ? \Carbon\Carbon::parse($booking->inspection_date)->format('d M Y') : 'N/A' }}</small>
                                    @if($booking->inspection_time)
                                        <div class="text-muted" style="font-size: 0.72rem;">{{ $booking->inspection_time }}</div>
                                    @endif
                                </td>
                                <td>
                                    <span class="status-badge status-{{ $booking->status }}">
                                        {{ $booking->status }}
                                    </span>
                                </td>
                                <td class="text-end">
                                    <a href="{{ route('admin.bookings.show', $booking->id) }}" class="btn btn-sm btn-light border" title="View Details">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-4 text-muted">
                                    <i class="bi bi-inbox fs-3 d-block mb-1"></i>
                                    No inspection bookings yet.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Recent Quote Requests -->
    <div class="col-lg-6">
        <div class="card-custom h-100">
            <div class="card-custom-header">
                <h5><i class="bi bi-file-earmark-text me-2 text-success"></i>Recent Quote Requests</h5>
                <a href="{{ route('admin.quotes.index') }}" class="btn btn-sm btn-outline-secondary">View All</a>
            </div>
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr style="font-size: 0.8rem; text-transform: uppercase; color: var(--admin-text-muted);">
                            <th>Client</th>
                            <th>Service</th>
                            <th>Submitted</th>
                            <th>Status</th>
                            <th class="text-end">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentQuotes as $quote)
                            <tr>
                                <td>
                                    <div class="fw-semibold">{{ $quote->name }}</div>
                                    <small class="text-muted">{{ $quote->phone }}</small>
                                </td>
                                <td>
                                    <span class="badge bg-light text-dark border">{{ $quote->service_type ?? 'General' }}</span>
                                </td>
                                <td>
                                    <small class="text-muted text-nowrap">{{ $quote->created_at->diffForHumans() }}</small>
                                </td>
                                <td>
                                    <span class="status-badge status-{{ $quote->status }}">
                                        {{ $quote->status }}
                                    </span>
                                </td>
                                <td class="text-end">
                                    <a href="{{ route('admin.quotes.show', $quote->id) }}" class="btn btn-sm btn-light border" title="View Details">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-4 text-muted">
                                    <i class="bi bi-inbox fs-3 d-block mb-1"></i>
                                    No quote requests yet.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- ==========================================
     RECENT CONTACT MESSAGES
=========================================== -->
<div class="card-custom">
    <div class="card-custom-header">
        <h5><i class="bi bi-envelope-paper me-2 text-info"></i>Latest Contact Inquiries</h5>
        <a href="{{ route('admin.messages.index') }}" class="btn btn-sm btn-outline-secondary">View All</a>
    </div>
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr style="font-size: 0.8rem; text-transform: uppercase; color: var(--admin-text-muted);">
                    <th>Sender</th>
                    <th>Subject</th>
                    <th>Message Snippet</th>
                    <th>Date</th>
                    <th>State</th>
                    <th class="text-end">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($recentMessages as $msg)
                    <tr>
                        <td>
                            <div class="fw-semibold">{{ $msg->name }}</div>
                            <small class="text-muted">{{ $msg->email }}</small>
                        </td>
                        <td>
                            <span class="fw-medium">{{ $msg->subject ?? 'No Subject' }}</span>
                        </td>
                        <td>
                            <span class="text-muted small text-truncate d-inline-block" style="max-width: 320px;">
                                {{ Str::limit($msg->message, 80) }}
                            </span>
                        </td>
                        <td>
                            <small class="text-muted text-nowrap">{{ $msg->created_at->format('d M, H:i') }}</small>
                        </td>
                        <td>
                            @if($msg->is_read)
                                <span class="badge bg-light text-secondary">Read</span>
                            @else
                                <span class="badge bg-danger">Unread</span>
                            @endif
                        </td>
                        <td class="text-end">
                            <a href="{{ route('admin.messages.show', $msg->id) }}" class="btn btn-sm btn-light border">
                                <i class="bi bi-eye"></i> View
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-4 text-muted">
                            <i class="bi bi-chat-square-text fs-3 d-block mb-1"></i>
                            No contact inquiries yet.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
