@props(['paginator'])

@if(isset($paginator) && $paginator->total() > 0)
    <div class="card-footer bg-white border-top py-3 px-4">
        @if($paginator->hasPages())
            {{ $paginator->links('pagination::bootstrap-5') }}
        @else
            <nav class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                <div>
                    <p class="small text-muted mb-0">
                        Showing
                        <span class="fw-semibold">{{ $paginator->firstItem() ?? 1 }}</span>
                        to
                        <span class="fw-semibold">{{ $paginator->lastItem() ?? $paginator->total() }}</span>
                        of
                        <span class="fw-semibold">{{ $paginator->total() }}</span>
                        results
                    </p>
                </div>
                <div>
                    <ul class="pagination pagination-sm mb-0">
                        <li class="page-item disabled" aria-disabled="true">
                            <span class="page-link">&laquo;</span>
                        </li>
                        <li class="page-item active" aria-current="page">
                            <span class="page-link">1</span>
                        </li>
                        <li class="page-item disabled" aria-disabled="true">
                            <span class="page-link">&raquo;</span>
                        </li>
                    </ul>
                </div>
            </nav>
        @endif
    </div>
@endif
