@extends('admin.layouts.app')

@section('title', 'Inspection Agreements')
@section('page_title', 'Inspection Agreements')

@section('content')

<!-- Header Action Strip & Stats -->
<div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
    <div>
        <h4 class="fw-bold mb-1" style="color: var(--admin-navy);">
            <i class="bi bi-shield-check text-success me-2"></i>Inspection Agreements
        </h4>
        <p class="text-muted small mb-0">Pre-engagement agreements accepted by clients in accordance with AS 4349.1-2007 &amp; AS 4349.3-2010</p>
    </div>
    <div class="d-flex flex-wrap gap-2">
        <a href="{{ route('inspection.agreement') }}" target="_blank" class="btn btn-sm btn-outline-secondary">
            <i class="bi bi-box-arrow-up-right me-1"></i> Public Agreement Page
        </a>
        <button type="button" class="btn btn-sm btn-navy" onclick="copyClientAgreementLink()">
            <i class="bi bi-link-45deg me-1"></i> Copy Client Link
        </button>
    </div>
</div>

<!-- Metrics Cards -->
<div class="row g-3 mb-4">
    <div class="col-md-4">
        <div class="card-custom p-3 h-100 mb-0">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <span class="text-muted small fw-semibold text-uppercase">Total Agreements</span>
                    <h3 class="fw-bold mb-0 mt-1" style="color: var(--admin-navy);">{{ $metrics['total'] }}</h3>
                    <small class="text-success"><i class="bi bi-shield-lock-fill me-1"></i>Signed &amp; Accepted</small>
                </div>
                <div class="rounded-3 p-3 text-success" style="background: rgba(72, 169, 0, 0.12);">
                    <i class="bi bi-file-earmark-check fs-3"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card-custom p-3 h-100 mb-0">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <span class="text-muted small fw-semibold text-uppercase">Accepted Today</span>
                    <h3 class="fw-bold mb-0 mt-1 text-primary">{{ $metrics['today'] }}</h3>
                    <small class="text-muted">Today's pre-engagements</small>
                </div>
                <div class="rounded-3 p-3 text-primary" style="background: rgba(18, 63, 103, 0.1);">
                    <i class="bi bi-calendar2-day fs-3"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card-custom p-3 h-100 mb-0">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <span class="text-muted small fw-semibold text-uppercase">This Month</span>
                    <h3 class="fw-bold mb-0 mt-1" style="color: #6B21A8;">{{ $metrics['this_month'] }}</h3>
                    <small class="text-muted">{{ \Carbon\Carbon::now()->format('F Y') }} total</small>
                </div>
                <div class="rounded-3 p-3" style="background: #F3E8FF; color: #6B21A8;">
                    <i class="bi bi-graph-up fs-3"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Filter Tabs & Search -->
<div class="card-custom mb-4">
    <div class="p-3 d-flex flex-wrap align-items-center justify-content-between gap-3">
        <!-- Status Tabs -->
        <div class="d-flex flex-wrap gap-2">
            <a href="{{ route('admin.agreements.index') }}" 
               class="btn btn-sm {{ !request('status') || request('status') === 'all' ? 'btn-navy' : 'btn-light border' }}">
                All ({{ $counts['all'] }})
            </a>
            <a href="{{ route('admin.agreements.index', ['status' => 'accepted', 'search' => request('search')]) }}" 
               class="btn btn-sm {{ request('status') === 'accepted' ? 'btn-success fw-semibold' : 'btn-light border' }}">
                Accepted ({{ $counts['accepted'] }})
            </a>
            <a href="{{ route('admin.agreements.index', ['status' => 'confirmed', 'search' => request('search')]) }}" 
               class="btn btn-sm {{ request('status') === 'confirmed' ? 'btn-primary fw-semibold' : 'btn-light border' }}">
                Confirmed ({{ $counts['confirmed'] }})
            </a>
            <a href="{{ route('admin.agreements.index', ['status' => 'completed', 'search' => request('search')]) }}" 
               class="btn btn-sm {{ request('status') === 'completed' ? 'btn-info text-white fw-semibold' : 'btn-light border' }}">
                Completed ({{ $counts['completed'] }})
            </a>
            <a href="{{ route('admin.agreements.index', ['status' => 'cancelled', 'search' => request('search')]) }}" 
               class="btn btn-sm {{ request('status') === 'cancelled' ? 'btn-danger fw-semibold' : 'btn-light border' }}">
                Cancelled ({{ $counts['cancelled'] }})
            </a>
        </div>

        <!-- Search Form -->
        <form method="GET" action="{{ route('admin.agreements.index') }}" class="d-flex gap-2">
            @if(request('status'))
                <input type="hidden" name="status" value="{{ request('status') }}">
            @endif
            <div class="input-group input-group-sm" style="min-width: 280px;">
                <input type="text" 
                       name="search" 
                       class="form-control" 
                       placeholder="Search client, phone, address, agent..." 
                       value="{{ request('search') }}">
                <button class="btn btn-outline-secondary" type="submit">
                    <i class="bi bi-search"></i>
                </button>
            </div>
            @if(request('search'))
                <a href="{{ route('admin.agreements.index', ['status' => request('status')]) }}" class="btn btn-sm btn-light border" title="Clear Search">
                    <i class="bi bi-x-lg"></i>
                </a>
            @endif
        </form>
    </div>
</div>

<!-- Agreements Table -->
<div class="card-custom">
    <div class="card-custom-header">
        <div>
            <h5>Agreements List ({{ $agreements->total() }})</h5>
            <small class="text-muted">Pre-purchase inspection client agreements and legal acknowledgments</small>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr style="font-size: 0.8rem; text-transform: uppercase; color: var(--admin-text-muted);">
                    <th style="width: 110px;">Ref No.</th>
                    <th>Client Name</th>
                    <th>Contact Information</th>
                    <th>Property Address</th>
                    <th>Agent Mobile</th>
                    <th>Accepted At</th>
                    <th>Status</th>
                    <th class="text-end" style="width: 170px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($agreements as $agreement)
                    <tr>
                        <td>
                            <span class="badge bg-light text-dark border fw-bold">
                                {{ $agreement->reference_code }}
                            </span>
                        </td>
                        <td>
                            <div class="fw-semibold text-dark">{{ $agreement->name }}</div>
                            <small class="text-muted">
                                <i class="bi bi-file-earmark-check text-success me-1"></i>AS 4349.1 / AS 4349.3
                            </small>
                        </td>
                        <td>
                            <div>
                                <a href="tel:{{ $agreement->phone }}" class="text-decoration-none fw-medium text-dark">
                                    <i class="bi bi-telephone text-primary me-1"></i>{{ $agreement->phone }}
                                </a>
                            </div>
                            @if($agreement->email)
                                <div class="text-muted small">
                                    <a href="mailto:{{ $agreement->email }}" class="text-muted text-decoration-none">
                                        <i class="bi bi-envelope me-1"></i>{{ $agreement->email }}
                                    </a>
                                </div>
                            @endif
                        </td>
                        <td>
                            <span class="small text-truncate d-inline-block" style="max-width: 240px;" title="{{ $agreement->property_address }}">
                                <i class="bi bi-geo-alt me-1 text-danger"></i>{{ $agreement->property_address }}
                            </span>
                        </td>
                        <td>
                            @if($agreement->agent_mobile)
                                <a href="tel:{{ $agreement->agent_mobile }}" class="badge bg-light text-dark border text-decoration-none">
                                    <i class="bi bi-person-badge text-info me-1"></i>{{ $agreement->agent_mobile }}
                                </a>
                            @else
                                <span class="text-muted small">—</span>
                            @endif
                        </td>
                        <td>
                            <div class="fw-medium text-dark small">
                                {{ $agreement->accepted_at ? $agreement->accepted_at->format('d M Y, h:i A') : $agreement->created_at->format('d M Y, h:i A') }}
                            </div>
                            <small class="text-muted">
                                {{ ($agreement->accepted_at ?? $agreement->created_at)->diffForHumans() }}
                            </small>
                        </td>
                        <td>
                            @if($agreement->status === 'accepted')
                                <span class="status-badge status-confirmed">Accepted</span>
                            @elseif($agreement->status === 'confirmed')
                                <span class="status-badge status-active">Confirmed</span>
                            @elseif($agreement->status === 'completed')
                                <span class="status-badge status-completed">Completed</span>
                            @elseif($agreement->status === 'cancelled')
                                <span class="status-badge status-cancelled">Cancelled</span>
                            @else
                                <span class="status-badge status-pending">{{ ucfirst($agreement->status) }}</span>
                            @endif
                        </td>
                        <td class="text-end">
                            <div class="d-flex align-items-center justify-content-end gap-1">
                                <a href="{{ route('admin.agreements.show', $agreement->id) }}" class="btn btn-sm btn-light border text-primary" title="View Agreement Details">
                                    <i class="bi bi-eye"></i> View
                                </a>
                                <a href="{{ route('admin.agreements.print', $agreement->id) }}" target="_blank" class="btn btn-sm btn-light border text-secondary" title="Print Agreement">
                                    <i class="bi bi-printer"></i>
                                </a>
                                <form action="{{ route('admin.agreements.destroy', $agreement->id) }}" method="POST" data-confirm="Are you sure you want to permanently delete this agreement record?" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-light border text-danger" title="Delete">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center py-5">
                            <div class="py-4">
                                <i class="bi bi-shield-check text-muted" style="font-size: 3rem;"></i>
                                <h5 class="fw-bold mt-3 text-dark">No Inspection Agreements Found</h5>
                                <p class="text-muted small mb-3">
                                    @if(request('search') || request('status'))
                                        No agreement records matched your search or status filter. Try clearing filters.
                                    @else
                                        Clients who complete the Pre-Engagement Inspection Agreement on the website will be listed here.
                                    @endif
                                </p>
                                <div class="d-flex justify-content-center gap-2">
                                    @if(request('search') || request('status'))
                                        <a href="{{ route('admin.agreements.index') }}" class="btn btn-sm btn-outline-secondary">
                                            Clear Filters
                                        </a>
                                    @endif
                                    <a href="{{ route('inspection.agreement') }}" target="_blank" class="btn btn-sm btn-navy">
                                        <i class="bi bi-box-arrow-up-right me-1"></i> Open Public Agreement Form
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @include('admin.components.pagination', ['paginator' => $agreements])
</div>

<!-- Toast Notification for Link Copy -->
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11000">
    <div id="copyToast" class="toast align-items-center text-bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                <i class="bi bi-check-circle-fill me-2"></i> Client Agreement link copied to clipboard!
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
function copyClientAgreementLink() {
    const url = "{{ route('inspection.agreement') }}";
    if (navigator.clipboard) {
        navigator.clipboard.writeText(url).then(() => {
            if (window.SwalToast) {
                window.SwalToast.fire({
                    icon: 'success',
                    title: 'Link copied to clipboard!'
                });
            } else {
                const toastEl = document.getElementById('copyToast');
                if (toastEl) {
                    const toast = new bootstrap.Toast(toastEl, { delay: 3000 });
                    toast.show();
                }
            }
        }).catch(() => {
            prompt("Copy this Inspection Agreement link:", url);
        });
    } else {
        prompt("Copy this Inspection Agreement link:", url);
    }
}
</script>
@endsection
