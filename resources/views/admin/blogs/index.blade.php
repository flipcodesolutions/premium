@extends('admin.layouts.app')

@section('title', 'Manage Blog Posts')
@section('page_title', 'Blog Posts')

@section('content')

<!-- Header Action & Filters -->
<div class="card-custom mb-4">
    <div class="p-3 d-flex flex-wrap align-items-center justify-content-between gap-3">
        <!-- Status & Category Filter -->
        <div class="d-flex flex-wrap align-items-center gap-2">
            <a href="{{ route('admin.blogs.index') }}" 
               class="btn btn-sm {{ !request('status') && !request('category_id') ? 'btn-navy' : 'btn-light border' }}">
                All Posts
            </a>
            <a href="{{ route('admin.blogs.index', ['status' => 'published', 'category_id' => request('category_id'), 'search' => request('search')]) }}" 
               class="btn btn-sm {{ request('status') === 'published' ? 'btn-success fw-semibold' : 'btn-light border' }}">
                Published
            </a>
            <a href="{{ route('admin.blogs.index', ['status' => 'draft', 'category_id' => request('category_id'), 'search' => request('search')]) }}" 
               class="btn btn-sm {{ request('status') === 'draft' ? 'btn-warning text-dark fw-semibold' : 'btn-light border' }}">
                Drafts
            </a>
        </div>

        <div class="d-flex flex-wrap gap-2">
            <!-- Search Form -->
            <form method="GET" action="{{ route('admin.blogs.index') }}" class="d-flex gap-2">
                @if(request('status'))
                    <input type="hidden" name="status" value="{{ request('status') }}">
                @endif
                @if(request('category_id'))
                    <input type="hidden" name="category_id" value="{{ request('category_id') }}">
                @endif
                <div class="input-group input-group-sm" style="min-width: 220px;">
                    <input type="text" 
                           name="search" 
                           class="form-control" 
                           placeholder="Search title, content..." 
                           value="{{ request('search') }}">
                    <button class="btn btn-outline-secondary" type="submit">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
                @if(request('search'))
                    <a href="{{ route('admin.blogs.index', ['status' => request('status'), 'category_id' => request('category_id')]) }}" class="btn btn-sm btn-light border" title="Clear">
                        <i class="bi bi-x-lg"></i>
                    </a>
                @endif
            </form>

            <!-- Add Blog Button -->
            <a href="{{ route('admin.blogs.create') }}" class="btn btn-sm btn-green d-flex align-items-center gap-1">
                <i class="bi bi-plus-lg"></i> Add New Blog Post
            </a>
        </div>
    </div>
</div>

<!-- Blog Table -->
<div class="card-custom">
    <div class="card-custom-header">
        <h5>All Articles ({{ $posts->total() }})</h5>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr style="font-size: 0.8rem; text-transform: uppercase; color: var(--admin-text-muted);">
                    <th style="width: 80px;">Cover</th>
                    <th>Article Title</th>
                    <th>Category</th>
                    <th>Published At</th>
                    <th>Status</th>
                    <th class="text-end" style="width: 200px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($posts as $post)
                    <tr>
                        <td>
                            @if($post->image)
                                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="rounded border" style="width: 60px; height: 42px; object-fit: cover;">
                            @else
                                <div class="rounded border bg-light d-flex align-items-center justify-content-center text-muted" style="width: 60px; height: 42px; font-size: 0.85rem;">
                                    <i class="bi bi-file-earmark-richtext"></i>
                                </div>
                            @endif
                        </td>
                        <td>
                            <div class="fw-semibold text-dark">{{ $post->title }}</div>
                            <small class="text-muted d-block text-truncate" style="max-width: 320px;">
                                {{ $post->excerpt ?: Str::limit(strip_tags($post->content), 80) }}
                            </small>
                        </td>
                        <td>
                            @if($post->category)
                                <span class="badge bg-light text-primary border">{{ $post->category->name }}</span>
                            @else
                                <span class="badge bg-light text-secondary border">Uncategorized</span>
                            @endif
                        </td>
                        <td>
                            <small class="text-nowrap">{{ $post->published_at ? $post->published_at->format('d M Y') : 'Not scheduled' }}</small>
                        </td>
                        <td>
                            <form action="{{ route('admin.blogs.toggle-status', $post->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-sm p-0 border-0 bg-transparent" title="Toggle publication status">
                                    @if($post->status)
                                        <span class="status-badge status-active cursor-pointer">
                                            <i class="bi bi-check-circle-fill me-1"></i> Published
                                        </span>
                                    @else
                                        <span class="status-badge status-pending cursor-pointer">
                                            <i class="bi bi-hourglass-split me-1"></i> Draft
                                        </span>
                                    @endif
                                </button>
                            </form>
                        </td>
                        <td class="text-end">
                            <div class="d-flex align-items-center justify-content-end gap-1">
                                <!-- Preview on Website -->
                                <a href="{{ route('blog.show', $post->slug) }}" target="_blank" class="btn btn-sm btn-light border" title="Preview on Website">
                                    <i class="bi bi-box-arrow-up-right"></i>
                                </a>

                                <!-- Edit -->
                                <a href="{{ route('admin.blogs.edit', $post->id) }}" class="btn btn-sm btn-light border text-primary" title="Edit Post">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>

                                <!-- Delete -->
                                <form action="{{ route('admin.blogs.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this blog post?');" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-light border text-danger" title="Delete Post">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-5 text-muted">
                            <i class="bi bi-journal-x fs-1 d-block mb-2"></i>
                            <h6 class="fw-semibold">No blog posts found</h6>
                            <p class="small text-muted mb-3">Publish articles and tips to improve your website's SEO.</p>
                            <a href="{{ route('admin.blogs.create') }}" class="btn btn-sm btn-green">
                                <i class="bi bi-plus-lg me-1"></i> Create Blog Post
                            </a>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($posts->hasPages())
        <div class="p-3 border-top d-flex justify-content-end">
            {{ $posts->links('pagination::bootstrap-5') }}
        </div>
    @endif
</div>

@endsection
