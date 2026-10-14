@extends('admin.layouts.app')

@section('title', 'Manage Quotes')
@section('page_title', 'Quote Requests')

@section('content')

<!-- Filter Tabs & Search -->
<div class="card-custom mb-4">
    <div class="p-3 d-flex flex-wrap align-items-center justify-content-between gap-3">
        <!-- Status Tabs -->
        <div class="d-flex flex-wrap gap-2">
            <a href="{{ route('admin.quotes.index') }}" 
               class="btn btn-sm {{ !request('status') || request('status') === 'all' ? 'btn-navy' : 'btn-light border' }}">
                All ({{ $counts['all'] }})
            </a>
            <a href="{{ route('admin.quotes.index', ['status' => 'pending', 'search' => request('search')]) }}" 
               class="btn btn-sm {{ request('status') === 'pending' ? 'btn-warning text-dark fw-semibold' : 'btn-light border' }}">
                Pending ({{ $counts['pending'] }})
            </a>
            <a href="{{ route('admin.quotes.index', ['status' => 'contacted', 'search' => request('search')]) }}" 
               class="btn btn-sm {{ request('status') === 'contacted' ? 'btn-info text-dark fw-semibold' : 'btn-light border' }}">
                Contacted ({{ $counts['contacted'] }})
            </a>
            <a href="{{ route('admin.quotes.index', ['status' => 'quoted', 'search' => request('search')]) }}" 
               class="btn btn-sm {{ request('status') === 'quoted' ? 'btn-success fw-semibold' : 'btn-light border' }}">
                Quoted ({{ $counts['quoted'] }})
            </a>
            <a href="{{ route('admin.quotes.index', ['status' => 'closed', 'search' => request('search')]) }}" 
               class="btn btn-sm {{ request('status') === 'closed' ? 'btn-secondary fw-semibold' : 'btn-light border' }}">
                Closed ({{ $counts['closed'] }})
            </a>
        </div>

        <!-- Search Form -->
        <form method="GET" action="{{ route('admin.quotes.index') }}" class="d-flex gap-2">
            @if(request('status'))
                <input type="hidden" name="status" value="{{ request('status') }}">
            @endif
            <div class="input-group input-group-sm" style="min-width: 260px;">
                <input type="text" 
                       name="search" 
                       class="form-control" 
                       placeholder="Search client, email, phone..." 
                       value="{{ request('search') }}">
                <button class="btn btn-outline-secondary" type="submit">
                    <i class="bi bi-search"></i>
                </button>
            </div>
            @if(request('search'))
                <a href="{{ route('admin.quotes.index', ['status' => request('status')]) }}" class="btn btn-sm btn-light border" title="Clear Search">
                    <i class="bi bi-x-lg"></i>
                </a>
            @endif
        </form>
    </div>
</div>

<!-- Quotes Table -->
<div class="card-custom">
    <div class="card-custom-header">
        <h5>Quotes List ({{ $quotes->total() }})</h5>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr style="font-size: 0.8rem; text-transform: uppercase; color: var(--admin-text-muted);">
                    <th style="width: 75px;">SR No.</th>
                    <th>Client Name</th>
                    <th>Contact Info</th>
                    <th>Requested Service</th>
                    <th>Property Address</th>
                    <th style="min-width: 175px;">Received (AU Time)</th>
                    <th>Status</th>
                    <th class="text-end" style="width: 140px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($quotes as $quote)
                    <tr>
                        <td>
                            <span class="text-muted fw-bold">{{ $quotes->firstItem() + $loop->index }}</span>
                        </td>
                        <td>
                            <div class="fw-semibold text-dark">{{ $quote->name }}</div>
                        </td>
                        <td>
                            <div><i class="bi bi-telephone me-1 text-muted"></i>{{ $quote->phone }}</div>
                            <small class="text-muted"><i class="bi bi-envelope me-1"></i>{{ $quote->email }}</small>
                        </td>
                        <td>
                            <span class="badge bg-light text-dark border">{{ $quote->service_type ?? 'General' }}</span>
                        </td>
                        <td>
                            <span class="small text-truncate d-inline-block" style="max-width: 200px;" title="{{ $quote->property_address }}">
                                {{ $quote->property_address ?? 'Not specified' }}
                            </span>
                        </td>
                        <td>
                            @if($quote->created_at)
                                <div class="text-nowrap fw-semibold text-dark" style="font-size: 0.82rem;">
                                    <i class="bi bi-clock me-1 text-primary"></i>{{ $quote->created_at_australia->format('d M Y, h:i A') }}
                                </div>
                                <div class="text-muted d-flex align-items-center gap-1 mt-1" style="font-size: 0.72rem;">
                                    <span class="badge bg-light text-secondary border px-1 py-0 fw-semibold" style="font-size: 0.65rem;">{{ $quote->australian_timezone_abbr }}</span>
                                    <span>&bull;</span>
                                    <span>{{ $quote->created_at->diffForHumans() }}</span>
                                </div>
                            @else
                                <span class="text-muted small">N/A</span>
                            @endif
                        </td>
                        <td>
                            <span class="status-badge status-{{ $quote->status }}">
                                {{ $quote->status }}
                            </span>
                        </td>
                        <td class="text-end">
                            <div class="d-flex align-items-center justify-content-end gap-1">
                                <a href="{{ route('admin.quotes.show', $quote->id) }}" class="btn btn-sm btn-light border text-primary" title="View Quote Request">
                                    <i class="bi bi-eye"></i> Details
                                </a>

                                <form action="{{ route('admin.quotes.destroy', $quote->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this quote request?');" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-light border text-danger" title="Delete Quote">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center py-5 text-muted">
                            <i class="bi bi-file-earmark-x fs-1 d-block mb-2"></i>
                            <h6 class="fw-semibold">No quote requests found</h6>
                            <p class="small text-muted mb-0">No quote requests match your filter.</p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($quotes->hasPages())
        <div class="p-3 border-top d-flex justify-content-end">
            {{ $quotes->links('pagination::bootstrap-5') }}
        </div>
    @endif
</div>

@endsection
