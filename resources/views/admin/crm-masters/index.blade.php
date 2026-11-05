@extends('admin.layouts.app')

@section('title', 'CRM Master')
@section('page_title', 'CRM Master')

@section('content')

<!-- Header Action & Filters -->
<div class="card-custom mb-4">
    <div class="p-3 d-flex flex-wrap align-items-center justify-content-between gap-3">
        <!-- Status Filter -->
        <div class="d-flex flex-wrap align-items-center gap-2">
            <a href="{{ route('admin.crm-masters.index') }}" 
               class="btn btn-sm {{ !request('status') ? 'btn-navy' : 'btn-light border' }}">
                All ({{ $counts['all'] ?? 0 }})
            </a>
            <a href="{{ route('admin.crm-masters.index', ['status' => 'active', 'search' => request('search')]) }}" 
               class="btn btn-sm {{ request('status') === 'active' ? 'btn-success fw-semibold' : 'btn-light border' }}">
                Active ({{ $counts['active'] ?? 0 }})
            </a>
            <a href="{{ route('admin.crm-masters.index', ['status' => 'inactive', 'search' => request('search')]) }}" 
               class="btn btn-sm {{ request('status') === 'inactive' ? 'btn-warning text-dark fw-semibold' : 'btn-light border' }}">
                Inactive ({{ $counts['inactive'] ?? 0 }})
            </a>
        </div>

        <div class="d-flex flex-wrap gap-2">
            <!-- Search Form -->
            <form method="GET" action="{{ route('admin.crm-masters.index') }}" class="d-flex gap-2">
                @if(request('status'))
                    <input type="hidden" name="status" value="{{ request('status') }}">
                @endif
                <div class="input-group input-group-sm" style="min-width: 220px;">
                    <input type="text" 
                           name="search" 
                           class="form-control" 
                           placeholder="Search title, author..." 
                           value="{{ request('search') }}">
                    <button class="btn btn-outline-secondary" type="submit">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
                @if(request('search'))
                    <a href="{{ route('admin.crm-masters.index', ['status' => request('status')]) }}" class="btn btn-sm btn-light border" title="Clear">
                        <i class="bi bi-x-lg"></i>
                    </a>
                @endif
            </form>

            <!-- Add CRM Master Button -->
            <a href="{{ route('admin.crm-masters.create') }}" class="btn btn-sm btn-green d-flex align-items-center gap-1">
                <i class="bi bi-plus-lg"></i> Add CRM Master
            </a>
        </div>
    </div>
</div>

<!-- Table Card -->
<div class="card-custom">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th style="width: 50px;">#</th>
                    <th style="width: 80px;">Image</th>
                    <th>Title &amp; Slug</th>
                    <th>Publish Date</th>
                    <th>Author</th>
                    <th>Status</th>
                    <th class="text-end" style="width: 140px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($records as $record)
                    <tr>
                        <td class="text-muted fw-semibold">{{ $record->id }}</td>
                        <td>
                            @if($record->image_url || $record->og_image_url)
                                <img src="{{ $record->image_url ?: $record->og_image_url }}" alt="{{ $record->title }}" class="rounded border" style="width: 60px; height: 40px; object-fit: cover;">
                            @else
                                <div class="bg-light border rounded d-flex align-items-center justify-content-center text-muted" style="width: 60px; height: 40px;">
                                    <i class="bi bi-image"></i>
                                </div>
                            @endif
                        </td>
                        <td>
                            <div class="fw-bold text-dark">{{ $record->title }}</div>
                            <small class="text-muted font-monospace">{{ $record->slug }}</small>
                        </td>
                        <td>
                            @if($record->publish_date)
                                <span class="badge bg-light text-dark border">
                                    <i class="bi bi-calendar2 me-1 text-primary"></i>
                                    {{ $record->publish_date->format('d M Y') }}
                                </span>
                            @else
                                <span class="text-muted small">&mdash;</span>
                            @endif
                        </td>
                        <td>
                            <span class="small">{{ $record->author ?: '—' }}</span>
                        </td>
                        <td>
                            <form action="{{ route('admin.crm-masters.toggle-status', $record->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="badge border-0 {{ $record->status ? 'bg-success' : 'bg-secondary' }}" style="cursor: pointer;" title="Click to toggle status">
                                    {{ $record->status ? 'Active' : 'Inactive' }}
                                </button>
                            </form>
                        </td>
                        <td class="text-end">
                            <div class="d-inline-flex gap-1">
                                <a href="{{ route('admin.crm-masters.edit', $record->id) }}" 
                                   class="btn btn-sm btn-outline-primary" 
                                   title="Edit">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('admin.crm-masters.destroy', $record->id) }}" 
                                      method="POST" 
                                      onsubmit="return confirm('Are you sure you want to delete this record?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-5 text-muted">
                            <i class="bi bi-folder-x fs-1 d-block mb-2 text-secondary"></i>
                            No CRM Master records found.
                            <div class="mt-2">
                                <a href="{{ route('admin.crm-masters.create') }}" class="btn btn-sm btn-green">
                                    <i class="bi bi-plus-lg me-1"></i> Add Your First CRM Master
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($records->hasPages())
        <div class="p-3 border-top d-flex justify-content-between align-items-center">
            <small class="text-muted">Showing {{ $records->firstItem() }} to {{ $records->lastItem() }} of {{ $records->total() }} records</small>
            {{ $records->links() }}
        </div>
    @endif
</div>

@endsection
