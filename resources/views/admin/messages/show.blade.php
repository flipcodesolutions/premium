@extends('admin.layouts.app')

@section('title', 'Message: ' . ($message->subject ?? 'Inquiry #' . $message->id))
@section('page_title', 'Read Message')

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-9">
        <!-- Top Navigation -->
        <div class="d-flex align-items-center justify-content-between mb-3">
            <a href="{{ route('admin.messages.index') }}" class="btn btn-sm btn-outline-secondary">
                <i class="bi bi-arrow-left me-1"></i> Back to Messages
            </a>
            <div class="d-flex gap-2">
                <form action="{{ route('admin.messages.toggle-read', $message->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-sm btn-outline-secondary">
                        <i class="bi bi-envelope me-1"></i> Mark as Unread
                    </button>
                </form>

                <form action="{{ route('admin.messages.destroy', $message->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to permanently delete this message?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-outline-danger">
                        <i class="bi bi-trash me-1"></i> Delete Message
                    </button>
                </form>
            </div>
        </div>

        <div class="card-custom">
            <!-- Header -->
            <div class="card-custom-header">
                <div>
                    <h5 class="mb-1">{{ $message->subject ?? 'No Subject' }}</h5>
                    <small class="text-muted">
                        Received on {{ $message->created_at->format('l, d M Y - h:i A') }} ({{ $message->created_at->diffForHumans() }})
                    </small>
                </div>
                <span class="badge bg-success">
                    <i class="bi bi-check-all me-1"></i> Read
                </span>
            </div>

            <div class="p-4">
                <!-- Sender Contact Details -->
                <div class="p-3 mb-4 rounded border bg-light">
                    <div class="row g-2 align-items-center">
                        <div class="col-md-5">
                            <span class="text-muted small d-block">From:</span>
                            <span class="fw-bold text-dark fs-6">{{ $message->name }}</span>
                        </div>
                        <div class="col-md-4">
                            <span class="text-muted small d-block">Email Address:</span>
                            <a href="mailto:{{ $message->email }}" class="text-decoration-none fw-semibold">
                                <i class="bi bi-envelope me-1"></i>{{ $message->email }}
                            </a>
                        </div>
                        <div class="col-md-3">
                            <span class="text-muted small d-block">Phone:</span>
                            @if($message->phone)
                                <a href="tel:{{ $message->phone }}" class="text-decoration-none fw-semibold">
                                    <i class="bi bi-telephone me-1"></i>{{ $message->phone }}
                                </a>
                            @else
                                <span class="text-muted small">Not provided</span>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Message Body -->
                <div class="p-4 rounded border bg-white mb-4">
                    <h6 class="fw-bold text-dark border-bottom pb-2 mb-3">
                        <i class="bi bi-chat-quote me-1 text-primary"></i> Inquiry Message:
                    </h6>
                    <div class="text-dark fs-6" style="white-space: pre-line; line-height: 1.7;">
{{ $message->message }}
                    </div>
                </div>

                <!-- Direct Email Reply Section -->
                <div class="p-4 rounded border bg-light mb-4" id="replySection">
                    <h6 class="fw-bold text-dark border-bottom pb-2 mb-3 d-flex align-items-center justify-content-between flex-wrap gap-2">
                        <span><i class="bi bi-reply-all-fill me-1 text-primary"></i> Send Direct Email Reply</span>
                        <span class="badge bg-white text-dark border small fw-normal">
                            <i class="bi bi-envelope-at me-1 text-primary"></i>To: <strong>{{ $message->email }}</strong>
                        </span>
                    </h6>

                    <form action="{{ route('admin.messages.reply', $message->id) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="replySubject" class="form-label fw-bold small text-dark">Subject <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" id="replySubject" name="subject" value="Re: {{ $message->subject ?? 'Your inquiry with Premium Inspections' }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="replyContent" class="form-label fw-bold small text-dark">Your Reply Message <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="replyContent" name="reply" rows="6" placeholder="Write your response here..." required>Dear {{ $message->name }},

Thank you for contacting Premium Building & Pest Inspections.

In response to your inquiry:


Please let us know if you need any additional assistance. You can also reach us directly at 0468 444 786.

Kind regards,
Customer Support Team
Premium Building & Pest Inspections</textarea>
                        </div>

                        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                            <small class="text-muted">
                                <i class="bi bi-shield-check text-success me-1"></i> Customer will receive a branded HTML email directly to {{ $message->email }}.
                            </small>
                            <button type="submit" class="btn btn-navy btn-sm px-4">
                                <i class="bi bi-send-fill me-1"></i> Send Reply Email
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Quick Actions -->
                <div class="d-flex flex-wrap gap-2 pt-3 border-top">
                    <a href="#replySection" class="btn btn-navy">
                        <i class="bi bi-reply-fill me-1"></i> Write Reply Email
                    </a>
                    @if($message->phone)
                        <a href="tel:{{ $message->phone }}" class="btn btn-outline-secondary">
                            <i class="bi bi-telephone-fill me-1"></i> Call Sender
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
