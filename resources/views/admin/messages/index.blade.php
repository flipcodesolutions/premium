@extends('admin.layouts.app')

@section('title', 'Contact Messages')
@section('page_title', 'Customer Inquiries')

@section('content')

<!-- Filter Tabs & Search -->
<div class="card-custom mb-4">
    <div class="p-3 d-flex flex-wrap align-items-center justify-content-between gap-3">
        <!-- Status Tabs -->
        <div class="d-flex flex-wrap gap-2">
            <a href="{{ route('admin.messages.index') }}" 
               class="btn btn-sm {{ !request('status') || request('status') === 'all' ? 'btn-navy' : 'btn-light border' }}">
                All ({{ $counts['all'] }})
            </a>
            <a href="{{ route('admin.messages.index', ['status' => 'unread', 'search' => request('search')]) }}" 
               class="btn btn-sm {{ request('status') === 'unread' ? 'btn-danger fw-semibold' : 'btn-light border' }}">
                Unread ({{ $counts['unread'] }})
            </a>
            <a href="{{ route('admin.messages.index', ['status' => 'read', 'search' => request('search')]) }}" 
               class="btn btn-sm {{ request('status') === 'read' ? 'btn-secondary fw-semibold' : 'btn-light border' }}">
                Read ({{ $counts['read'] }})
            </a>
        </div>

        <!-- Search Form -->
        <form method="GET" action="{{ route('admin.messages.index') }}" class="d-flex gap-2">
            @if(request('status'))
                <input type="hidden" name="status" value="{{ request('status') }}">
            @endif
            <div class="input-group input-group-sm" style="min-width: 260px;">
                <input type="text" 
                       name="search" 
                       class="form-control" 
                       placeholder="Search sender, email, subject..." 
                       value="{{ request('search') }}">
                <button class="btn btn-outline-secondary" type="submit">
                    <i class="bi bi-search"></i>
                </button>
            </div>
            @if(request('search'))
                <a href="{{ route('admin.messages.index', ['status' => request('status')]) }}" class="btn btn-sm btn-light border" title="Clear Search">
                    <i class="bi bi-x-lg"></i>
                </a>
            @endif
        </form>
    </div>
</div>

<!-- Messages Table -->
<div class="card-custom">
    <div class="card-custom-header">
        <h5>Messages List ({{ $messages->total() }})</h5>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr style="font-size: 0.8rem; text-transform: uppercase; color: var(--admin-text-muted);">
                    <th style="width: 50px;"></th>
                    <th>Sender</th>
                    <th>Subject</th>
                    <th>Snippet</th>
                    <th>Received</th>
                    <th class="text-end" style="width: 170px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($messages as $msg)
                    <tr class="{{ !$msg->is_read ? 'table-warning bg-opacity-10 fw-medium' : '' }}">
                        <td class="text-center">
                            @if(!$msg->is_read)
                                <i class="bi bi-envelope-fill text-danger fs-5" title="Unread message"></i>
                            @else
                                <i class="bi bi-envelope-open text-muted fs-5" title="Read message"></i>
                            @endif
                        </td>
                        <td>
                            <div class="text-dark">{{ $msg->name }}</div>
                            <small class="text-muted">{{ $msg->email }}</small>
                            @if($msg->phone)
                                <div class="text-muted" style="font-size: 0.75rem;"><i class="bi bi-telephone me-1"></i>{{ $msg->phone }}</div>
                            @endif
                        </td>
                        <td>
                            <span class="text-dark">{{ $msg->subject ?? 'No Subject' }}</span>
                        </td>
                        <td>
                            <span class="small text-muted text-truncate d-inline-block" style="max-width: 280px;">
                                {{ Str::limit($msg->message, 70) }}
                            </span>
                        </td>
                        <td>
                            <small class="text-nowrap">{{ $msg->created_at->format('d M Y, H:i') }}</small>
                            <div class="text-muted" style="font-size: 0.72rem;">{{ $msg->created_at->diffForHumans() }}</div>
                        </td>
                        <td class="text-end">
                            <div class="d-flex align-items-center justify-content-end gap-1">
                                <!-- Toggle Read -->
                                <form action="{{ route('admin.messages.toggle-read', $msg->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-sm btn-light border" title="{{ $msg->is_read ? 'Mark as Unread' : 'Mark as Read' }}">
                                        <i class="bi {{ $msg->is_read ? 'bi-envelope' : 'bi-envelope-check' }}"></i>
                                    </button>
                                </form>

                                <!-- View Details -->
                                <a href="{{ route('admin.messages.show', $msg->id) }}" class="btn btn-sm btn-light border text-primary" title="Read Message">
                                    <i class="bi bi-eye"></i> View
                                </a>

                                <!-- Delete -->
                                <form action="{{ route('admin.messages.destroy', $msg->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this message?');" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-light border text-danger" title="Delete Message">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-5 text-muted">
                            <i class="bi bi-inboxes fs-1 d-block mb-2"></i>
                            <h6 class="fw-semibold">No messages found</h6>
                            <p class="small text-muted mb-0">No contact messages match your filter.</p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($messages->hasPages())
        <div class="p-3 border-top d-flex justify-content-end">
            {{ $messages->links('pagination::bootstrap-5') }}
        </div>
    @endif
</div>

@endsection
