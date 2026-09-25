@extends('admin.layouts.app')

@section('title', 'Admin Dashboard')
@section('page_title', 'Dashboard Overview')

@section('styles')
<style>
    /* =========================================================
       EXECUTIVE DASHBOARD HEADER
    ========================================================= */
    .dashboard-header {
        background: #ffffff;
        border: 1px solid var(--admin-border);
        border-radius: 16px;
        padding: 24px 28px;
        margin-bottom: 24px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.02), 0 6px 16px rgba(11, 31, 58, 0.03);
    }

    .dashboard-breadcrumb {
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.8px;
        color: var(--admin-text-muted);
        margin-bottom: 6px;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .dashboard-title {
        font-size: 1.5rem;
        font-weight: 800;
        color: var(--admin-navy);
        letter-spacing: -0.4px;
        margin: 0 0 4px;
    }

    .dashboard-subtitle {
        font-size: 0.875rem;
        color: var(--admin-text-muted);
        margin: 0;
    }

    .system-status-pill {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 5px 12px;
        border-radius: 30px;
        background: #ECFDF5;
        border: 1px solid #A7F3D0;
        color: #047857;
        font-size: 0.75rem;
        font-weight: 600;
    }

    .status-pulse-dot {
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: #10B981;
        box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.25);
        animation: pulseAnimation 2s infinite;
    }

    @keyframes pulseAnimation {
        0% { box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.4); }
        70% { box-shadow: 0 0 0 6px rgba(16, 185, 129, 0); }
        100% { box-shadow: 0 0 0 0 rgba(16, 185, 129, 0); }
    }

    /* =========================================================
       PRIMARY KPI METRIC CARDS
    ========================================================= */
    .metric-card-pro {
        background: #ffffff;
        border: 1px solid var(--admin-border);
        border-radius: 16px;
        padding: 24px;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        position: relative;
        overflow: hidden;
        transition: transform 0.25s cubic-bezier(0.4, 0, 0.2, 1), box-shadow 0.25s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.02), 0 4px 14px rgba(11, 31, 58, 0.03);
    }

    .metric-card-pro:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 24px rgba(11, 31, 58, 0.08);
        border-color: #cbd5e1;
    }

    .metric-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 16px;
    }

    .metric-label-pro {
        font-size: 0.78rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.6px;
        color: var(--admin-text-muted);
    }

    .metric-icon-tile {
        width: 48px;
        height: 48px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.35rem;
        flex-shrink: 0;
    }

    .metric-number-pro {
        font-family: 'Montserrat', sans-serif;
        font-size: 2.25rem;
        font-weight: 800;
        color: var(--admin-navy);
        line-height: 1.1;
        letter-spacing: -0.8px;
        margin-bottom: 8px;
    }

    .metric-tags-row {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 6px;
        margin-bottom: 14px;
    }

    .metric-tag {
        font-size: 0.72rem;
        font-weight: 600;
        padding: 3px 8px;
        border-radius: 6px;
    }

    .tag-warning {
        background: #FEF3C7;
        color: #92400E;
    }

    .tag-success {
        background: #DEF7EC;
        color: #03543F;
    }

    .tag-info {
        background: #E1EFFE;
        color: #1E429F;
    }

    .tag-danger {
        background: #FEE2E2;
        color: #991B1B;
    }

    .tag-neutral {
        background: #F1F5F9;
        color: #475569;
    }

    .metric-footer-pro {
        padding-top: 14px;
        border-top: 1px solid var(--admin-border-subtle);
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .metric-action-link {
        font-size: 0.8rem;
        font-weight: 600;
        color: var(--admin-blue);
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 5px;
        transition: all 0.2s ease;
    }

    .metric-action-link:hover {
        color: var(--admin-green);
        transform: translateX(2px);
    }

    /* =========================================================
       OPERATIONAL HIGHLIGHTS STRIP
    ========================================================= */
    .highlight-card {
        background: #ffffff;
        border: 1px solid var(--admin-border);
        border-radius: 12px;
        padding: 16px 20px;
        display: flex;
        align-items: center;
        gap: 16px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.02);
        transition: transform 0.2s;
    }

    .highlight-card:hover {
        transform: translateY(-2px);
    }

    .highlight-icon {
        width: 42px;
        height: 42px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.25rem;
        flex-shrink: 0;
    }

    .highlight-value {
        font-family: 'Montserrat', sans-serif;
        font-size: 1.35rem;
        font-weight: 800;
        color: var(--admin-navy);
        line-height: 1.1;
    }

    .highlight-label {
        font-size: 0.72rem;
        color: var(--admin-text-muted);
        text-transform: uppercase;
        font-weight: 600;
        letter-spacing: 0.5px;
    }

    /* =========================================================
       SHORTCUTS COMMAND BAR
    ========================================================= */
    .command-bar {
        background: #ffffff;
        border: 1px solid var(--admin-border);
        border-radius: 14px;
        padding: 12px 20px;
        margin-bottom: 24px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.02);
    }

    .command-pill {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        padding: 7px 14px;
        border-radius: 8px;
        font-size: 0.8rem;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.2s;
        border: 1px solid var(--admin-border);
        background: #ffffff;
        color: var(--admin-text-main);
    }

    .command-pill:hover {
        background: var(--admin-bg);
        border-color: #cbd5e1;
        color: var(--admin-navy);
        transform: translateY(-1px);
    }

    .command-pill-primary {
        background: #F0FDF4;
        border-color: #BBF7D0;
        color: #166534;
    }

    .command-pill-primary:hover {
        background: #DCFCE7;
        border-color: #86EFAC;
        color: #14532D;
    }

    /* =========================================================
       ANALYTICS & PIPELINE CARDS
    ========================================================= */
    .chart-container-card {
        background: #ffffff;
        border: 1px solid var(--admin-border);
        border-radius: 16px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.02), 0 6px 16px rgba(11, 31, 58, 0.03);
        margin-bottom: 24px;
        overflow: hidden;
    }

    .chart-header {
        padding: 20px 24px;
        border-bottom: 1px solid var(--admin-border-subtle);
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .chart-header h5 {
        margin: 0;
        font-size: 1.05rem;
        font-weight: 700;
        color: var(--admin-navy);
        letter-spacing: -0.2px;
    }

    .chart-subtitle {
        font-size: 0.78rem;
        color: var(--admin-text-muted);
        margin-top: 2px;
    }

    /* Pipeline breakdown list */
    .pipeline-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 10px 14px;
        border-radius: 10px;
        margin-bottom: 8px;
        background: #F8FAFC;
        border: 1px solid #EDF2F7;
        transition: background 0.2s;
    }

    .pipeline-item:hover {
        background: #F1F5F9;
    }

    .pipeline-left {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .pipeline-dot {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        flex-shrink: 0;
    }

    .pipeline-title {
        font-size: 0.82rem;
        font-weight: 600;
        color: var(--admin-text-main);
    }

    .pipeline-count {
        font-family: 'Montserrat', sans-serif;
        font-weight: 700;
        font-size: 0.88rem;
        color: var(--admin-navy);
    }

    .pipeline-pct {
        font-size: 0.72rem;
        color: var(--admin-text-muted);
        margin-left: 4px;
    }

    /* =========================================================
       DATA TABLES & AVATARS
    ========================================================= */
    .table-pro-card {
        background: #ffffff;
        border: 1px solid var(--admin-border);
        border-radius: 16px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.02), 0 6px 16px rgba(11, 31, 58, 0.03);
        margin-bottom: 24px;
        overflow: hidden;
    }

    .table-pro-header {
        padding: 18px 24px;
        border-bottom: 1px solid var(--admin-border-subtle);
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .table-pro-header h5 {
        margin: 0;
        font-size: 1.05rem;
        font-weight: 700;
        color: var(--admin-navy);
        letter-spacing: -0.2px;
    }

    .table-avatar-initials-pro {
        width: 38px;
        height: 38px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 0.85rem;
        flex-shrink: 0;
    }

    .action-icon-btn {
        width: 32px;
        height: 32px;
        border-radius: 8px;
        border: 1px solid var(--admin-border);
        background: #ffffff;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        color: var(--admin-text-main);
        text-decoration: none;
        transition: all 0.2s;
    }

    .action-icon-btn:hover {
        background: var(--admin-navy);
        color: #ffffff;
        border-color: var(--admin-navy);
    }
</style>
@endsection

@section('content')

<!-- =========================================================
     01. EXECUTIVE DASHBOARD HEADER
========================================================= -->
<div class="dashboard-header">
    <div class="row align-items-center">
        <div class="col-lg-7">
            <div class="dashboard-breadcrumb">
                <i class="bi bi-shield-lock-fill text-success"></i>
                <span>Premium Admin Portal &bull; Enterprise Console</span>
            </div>
            <h2 class="dashboard-title">Welcome back, {{ Auth::user()->name ?? 'Administrator' }}! 👋</h2>
            <p class="dashboard-subtitle">
                Live performance monitor for Building & Pest Inspection appointments, quotes, and client requests.
            </p>
        </div>
        <div class="col-lg-5 text-lg-end mt-3 mt-lg-0">
            <div class="d-flex flex-wrap align-items-center justify-content-lg-end gap-2">
                <div class="system-status-pill">
                    <span class="status-pulse-dot"></span>
                    <span>All Systems Live</span>
                </div>
                <a href="{{ route('admin.bookings.create') }}" class="btn btn-green shadow-sm d-inline-flex align-items-center gap-2">
                    <i class="bi bi-calendar-plus"></i>
                    <span>New Booking</span>
                </a>
                <a href="{{ route('admin.services.create') }}" class="btn btn-navy d-inline-flex align-items-center gap-2">
                    <i class="bi bi-plus-lg"></i>
                    <span>Add Service</span>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- =========================================================
     02. PRIMARY 4 KPI METRIC CARDS
========================================================= -->
<div class="row g-4 mb-4">
    <!-- 1. Total Bookings -->
    <div class="col-xl-3 col-md-6">
        <div class="metric-card-pro">
            <div>
                <div class="metric-header">
                    <span class="metric-label-pro">Inspection Bookings</span>
                    <div class="metric-icon-tile" style="background: rgba(18, 63, 103, 0.1); color: var(--admin-blue);">
                        <i class="bi bi-calendar2-check-fill"></i>
                    </div>
                </div>
                <div class="metric-number-pro">{{ $totalBookings }}</div>
                <div class="metric-tags-row">
                    @if($pendingBookings > 0)
                        <span class="metric-tag tag-warning"><i class="bi bi-clock-history me-1"></i>{{ $pendingBookings }} Pending</span>
                    @else
                        <span class="metric-tag tag-neutral">0 Pending</span>
                    @endif
                    <span class="metric-tag tag-success"><i class="bi bi-check-circle-fill me-1"></i>{{ $confirmedBookings }} Confirmed</span>
                </div>
            </div>
            <div class="metric-footer-pro">
                <span class="text-muted small">{{ $completedBookings }} Completed Jobs</span>
                <a href="{{ route('admin.bookings.index') }}" class="metric-action-link">
                    <span>Manage</span> <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- 2. Quote Requests -->
    <div class="col-xl-3 col-md-6">
        <div class="metric-card-pro">
            <div>
                <div class="metric-header">
                    <span class="metric-label-pro">Quote Requests</span>
                    <div class="metric-icon-tile" style="background: rgba(72, 169, 0, 0.12); color: var(--admin-green);">
                        <i class="bi bi-file-earmark-text-fill"></i>
                    </div>
                </div>
                <div class="metric-number-pro">{{ $totalQuotes }}</div>
                <div class="metric-tags-row">
                    @if($pendingQuotes > 0)
                        <span class="metric-tag tag-warning"><i class="bi bi-exclamation-circle me-1"></i>{{ $pendingQuotes }} Needs Quote</span>
                    @else
                        <span class="metric-tag tag-neutral">All Quoted</span>
                    @endif
                    <span class="metric-tag tag-info"><i class="bi bi-send-check me-1"></i>{{ $quotedQuotes }} Sent</span>
                </div>
            </div>
            <div class="metric-footer-pro">
                <span class="text-muted small">{{ $closedQuotes }} Closed Quotes</span>
                <a href="{{ route('admin.quotes.index') }}" class="metric-action-link">
                    <span>Review</span> <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- 3. Client Inquiries -->
    <div class="col-xl-3 col-md-6">
        <div class="metric-card-pro">
            <div>
                <div class="metric-header">
                    <span class="metric-label-pro">Contact Inquiries</span>
                    <div class="metric-icon-tile" style="background: rgba(239, 68, 68, 0.1); color: #EF4444;">
                        <i class="bi bi-chat-dots-fill"></i>
                    </div>
                </div>
                <div class="metric-number-pro">{{ $totalMessages }}</div>
                <div class="metric-tags-row">
                    @if($unreadMessages > 0)
                        <span class="metric-tag tag-danger"><i class="bi bi-envelope me-1"></i>{{ $unreadMessages }} Unread</span>
                    @else
                        <span class="metric-tag tag-neutral">0 Unread</span>
                    @endif
                    <span class="metric-tag tag-success"><i class="bi bi-check-all me-1"></i>{{ $totalMessages - $unreadMessages }} Read</span>
                </div>
            </div>
            <div class="metric-footer-pro">
                <span class="text-muted small">Client Support</span>
                <a href="{{ route('admin.messages.index') }}" class="metric-action-link">
                    <span>Inquiries</span> <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- 4. Services & Published Articles -->
    <div class="col-xl-3 col-md-6">
        <div class="metric-card-pro">
            <div>
                <div class="metric-header">
                    <span class="metric-label-pro">Services & Content</span>
                    <div class="metric-icon-tile" style="background: rgba(11, 31, 58, 0.08); color: var(--admin-navy);">
                        <i class="bi bi-tools"></i>
                    </div>
                </div>
                <div class="metric-number-pro">{{ $totalServices }}</div>
                <div class="metric-tags-row">
                    <span class="metric-tag tag-success"><i class="bi bi-check2-circle me-1"></i>{{ $activeServices }} Active Services</span>
                    <span class="metric-tag tag-info"><i class="bi bi-journal-check me-1"></i>{{ $totalBlogs }} Blogs</span>
                </div>
            </div>
            <div class="metric-footer-pro">
                <span class="text-muted small">Catalog Health</span>
                <a href="{{ route('admin.services.index') }}" class="metric-action-link">
                    <span>Manage</span> <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- =========================================================
     03. OPERATIONAL HIGHLIGHTS STRIP
========================================================= -->
<div class="row g-3 mb-4">
    <div class="col-xl-3 col-sm-6">
        <div class="highlight-card">
            <div class="highlight-icon" style="background: #EBF5FF; color: #1E429F;">
                <i class="bi bi-calendar-event"></i>
            </div>
            <div>
                <div class="highlight-value">{{ $todayBookings }}</div>
                <div class="highlight-label">Bookings Added Today</div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-sm-6">
        <div class="highlight-card">
            <div class="highlight-icon" style="background: #DEF7EC; color: #03543F;">
                <i class="bi bi-calendar2-check"></i>
            </div>
            <div>
                <div class="highlight-value">{{ $confirmedBookings }}</div>
                <div class="highlight-label">Confirmed Schedule</div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-sm-6">
        <div class="highlight-card">
            <div class="highlight-icon" style="background: #FEF3C7; color: #92400E;">
                <i class="bi bi-graph-up-arrow"></i>
            </div>
            <div>
                <div class="highlight-value">{{ $monthBookings }}</div>
                <div class="highlight-label">Bookings This Month</div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-sm-6">
        <div class="highlight-card">
            <div class="highlight-icon" style="background: #F3E8FF; color: #6B21A8;">
                <i class="bi bi-shield-check"></i>
            </div>
            <div>
                <div class="highlight-value">{{ $completedBookings }}</div>
                <div class="highlight-label">Completed Inspections</div>
            </div>
        </div>
    </div>
</div>

<!-- =========================================================
     04. SHORTCUTS COMMAND BAR
========================================================= -->
<div class="command-bar">
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
        <div class="d-flex align-items-center gap-2 text-dark fw-semibold" style="font-size: 0.85rem;">
            <i class="bi bi-lightning-charge-fill text-warning fs-6"></i>
            <span>Command Shortcuts:</span>
        </div>
        <div class="d-flex flex-wrap gap-2">
            <a href="{{ route('admin.bookings.create') }}" class="command-pill command-pill-primary">
                <i class="bi bi-plus-circle-fill"></i> New Booking
            </a>
            <a href="{{ route('admin.services.create') }}" class="command-pill">
                <i class="bi bi-tools text-primary"></i> Add Service
            </a>
            <a href="{{ route('admin.blogs.create') }}" class="command-pill">
                <i class="bi bi-journal-plus text-info"></i> Write Blog Post
            </a>
            <a href="{{ route('admin.bookings.index', ['status' => 'pending']) }}" class="command-pill">
                <i class="bi bi-clock-history text-warning"></i> Pending Bookings ({{ $pendingBookings }})
            </a>
            <a href="{{ route('admin.quotes.index', ['status' => 'pending']) }}" class="command-pill">
                <i class="bi bi-inbox-fill text-info"></i> Pending Quotes ({{ $pendingQuotes }})
            </a>
            <a href="{{ route('admin.messages.index') }}" class="command-pill">
                <i class="bi bi-envelope-fill text-danger"></i> Unread Messages ({{ $unreadMessages }})
            </a>
            <a href="{{ route('inspection.agreement') }}" target="_blank" class="command-pill">
                <i class="bi bi-file-earmark-check text-success"></i> Inspection Agreement Page
            </a>
        </div>
    </div>
</div>

<!-- =========================================================
     05. INTERACTIVE ANALYTICS & PIPELINE STATUS
========================================================= -->
<div class="row g-4 mb-4">
    <!-- Activity Trends Line Chart (8 cols) -->
    <div class="col-lg-8">
        <div class="chart-container-card h-100">
            <div class="chart-header">
                <div>
                    <h5><i class="bi bi-graph-up me-2 text-primary"></i>Inquiries & Bookings Trends</h5>
                    <div class="chart-subtitle">6-Month comparative activity volume: Bookings vs Quote Requests</div>
                </div>
                <span class="badge bg-light text-secondary border px-3 py-1 fw-medium">Last 6 Months</span>
            </div>
            <div class="p-4">
                <div style="height: 290px; position: relative;">
                    <canvas id="monthlyActivityChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Booking Status Distribution Donut Chart (4 cols) -->
    <div class="col-lg-4">
        <div class="chart-container-card h-100">
            <div class="chart-header">
                <div>
                    <h5><i class="bi bi-pie-chart-fill me-2 text-success"></i>Bookings Pipeline</h5>
                    <div class="chart-subtitle">Status breakdown of recorded appointments</div>
                </div>
            </div>
            <div class="p-4 d-flex flex-column justify-content-between">
                <!-- Donut Chart Canvas -->
                <div style="height: 190px; position: relative; margin-bottom: 16px;">
                    <canvas id="bookingStatusChart"></canvas>
                </div>

                <!-- Breakdown Items -->
                @php
                    $safeTotal = $totalBookings > 0 ? $totalBookings : 1;
                    $pendingPct = round(($pendingBookings / $safeTotal) * 100);
                    $confirmedPct = round(($confirmedBookings / $safeTotal) * 100);
                    $completedPct = round(($completedBookings / $safeTotal) * 100);
                    $cancelledPct = round(($cancelledBookings / $safeTotal) * 100);
                @endphp

                <div class="pipeline-list">
                    <div class="pipeline-item">
                        <div class="pipeline-left">
                            <span class="pipeline-dot" style="background: #F59E0B;"></span>
                            <span class="pipeline-title">Pending Review</span>
                        </div>
                        <div>
                            <span class="pipeline-count">{{ $pendingBookings }}</span>
                            <span class="pipeline-pct">({{ $pendingPct }}%)</span>
                        </div>
                    </div>

                    <div class="pipeline-item">
                        <div class="pipeline-left">
                            <span class="pipeline-dot" style="background: #10B981;"></span>
                            <span class="pipeline-title">Confirmed Schedule</span>
                        </div>
                        <div>
                            <span class="pipeline-count">{{ $confirmedBookings }}</span>
                            <span class="pipeline-pct">({{ $confirmedPct }}%)</span>
                        </div>
                    </div>

                    <div class="pipeline-item">
                        <div class="pipeline-left">
                            <span class="pipeline-dot" style="background: #3B82F6;"></span>
                            <span class="pipeline-title">Completed Inspections</span>
                        </div>
                        <div>
                            <span class="pipeline-count">{{ $completedBookings }}</span>
                            <span class="pipeline-pct">({{ $completedPct }}%)</span>
                        </div>
                    </div>

                    <div class="pipeline-item">
                        <div class="pipeline-left">
                            <span class="pipeline-dot" style="background: #EF4444;"></span>
                            <span class="pipeline-title">Cancelled</span>
                        </div>
                        <div>
                            <span class="pipeline-count">{{ $cancelledBookings }}</span>
                            <span class="pipeline-pct">({{ $cancelledPct }}%)</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- =========================================================
     06. UPCOMING SCHEDULED INSPECTIONS WIDGET
========================================================= -->
@if(isset($upcomingInspections) && $upcomingInspections->count() > 0)
<div class="table-pro-card mb-4">
    <div class="table-pro-header">
        <div>
            <h5><i class="bi bi-calendar-range-fill me-2 text-primary"></i>Next Upcoming Scheduled Inspections</h5>
            <small class="text-muted">Chronologically ordered upcoming field inspections</small>
        </div>
        <a href="{{ route('admin.bookings.index') }}" class="btn btn-sm btn-outline-secondary">
            View All Bookings
        </a>
    </div>
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr style="font-size: 0.76rem; text-transform: uppercase; color: var(--admin-text-muted); letter-spacing: 0.6px;">
                    <th>Scheduled Date</th>
                    <th>Client Name</th>
                    <th>Service Type</th>
                    <th>Property Address</th>
                    <th>Status</th>
                    <th class="text-end">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($upcomingInspections as $upcoming)
                    <tr>
                        <td>
                            <div class="fw-bold text-dark small">
                                <i class="bi bi-calendar3 me-1 text-primary"></i>
                                {{ \Carbon\Carbon::parse($upcoming->inspection_date)->format('D, d M Y') }}
                            </div>
                            @if($upcoming->inspection_time)
                                <div class="text-muted small">
                                    <i class="bi bi-clock me-1"></i>{{ $upcoming->inspection_time }}
                                </div>
                            @endif
                        </td>
                        <td>
                            <div class="fw-semibold text-dark">{{ $upcoming->name }}</div>
                            <small class="text-muted"><i class="bi bi-telephone me-1"></i>{{ $upcoming->phone }}</small>
                        </td>
                        <td>
                            <span class="badge bg-light text-dark border">{{ $upcoming->service_type }}</span>
                        </td>
                        <td>
                            <small class="text-muted text-truncate d-inline-block" style="max-width: 280px;">
                                <i class="bi bi-geo-alt me-1 text-danger"></i>{{ $upcoming->property_address ?? 'Not specified' }}
                            </small>
                        </td>
                        <td>
                            <span class="status-badge status-{{ $upcoming->status }}">{{ $upcoming->status }}</span>
                        </td>
                        <td class="text-end">
                            <a href="{{ route('admin.bookings.show', $upcoming->id) }}" class="action-icon-btn" title="View Booking Details">
                                <i class="bi bi-eye"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif

<!-- =========================================================
     07. RECENT ACTIVITY (2 EQUAL COLUMNS)
========================================================= -->
<div class="row g-4 mb-4">
    <!-- Recent Bookings Table (6 cols) -->
    <div class="col-lg-6">
        <div class="table-pro-card h-100">
            <div class="table-pro-header">
                <div>
                    <h5><i class="bi bi-calendar-check me-2 text-primary"></i>Recent Bookings</h5>
                    <small class="text-muted">Latest client inspection bookings</small>
                </div>
                <a href="{{ route('admin.bookings.index') }}" class="btn btn-sm btn-outline-secondary">
                    View All ({{ $totalBookings }})
                </a>
            </div>
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr style="font-size: 0.76rem; text-transform: uppercase; color: var(--admin-text-muted); letter-spacing: 0.5px;">
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
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="table-avatar-initials-pro" style="background: rgba(18, 63, 103, 0.1); color: var(--admin-navy);">
                                            {{ strtoupper(substr($booking->name ?? 'C', 0, 1)) }}
                                        </div>
                                        <div>
                                            <div class="fw-semibold text-dark" style="font-size: 0.88rem;">{{ $booking->name }}</div>
                                            <small class="text-muted"><i class="bi bi-telephone me-1"></i>{{ $booking->phone }}</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge bg-light text-dark border fw-medium" style="font-size: 0.72rem;">
                                        {{ $booking->service_type }}
                                    </span>
                                </td>
                                <td>
                                    <div class="small fw-medium text-nowrap">
                                        {{ $booking->inspection_date ? \Carbon\Carbon::parse($booking->inspection_date)->format('d M Y') : 'N/A' }}
                                    </div>
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
                                    <a href="{{ route('admin.bookings.show', $booking->id) }}" class="action-icon-btn" title="View Booking Details">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-5 text-muted">
                                    <i class="bi bi-calendar-x fs-2 d-block mb-2 text-secondary"></i>
                                    <div class="fw-semibold">No inspection bookings found</div>
                                    <small>Client bookings submitted via the site will appear here.</small>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Recent Quote Requests Table (6 cols) -->
    <div class="col-lg-6">
        <div class="table-pro-card h-100">
            <div class="table-pro-header">
                <div>
                    <h5><i class="bi bi-file-earmark-text me-2 text-success"></i>Recent Quote Requests</h5>
                    <small class="text-muted">Inquiries waiting for price quotation</small>
                </div>
                <a href="{{ route('admin.quotes.index') }}" class="btn btn-sm btn-outline-secondary">
                    View All ({{ $totalQuotes }})
                </a>
            </div>
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr style="font-size: 0.76rem; text-transform: uppercase; color: var(--admin-text-muted); letter-spacing: 0.5px;">
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
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="table-avatar-initials-pro" style="background: rgba(72, 169, 0, 0.1); color: var(--admin-green);">
                                            {{ strtoupper(substr($quote->name ?? 'Q', 0, 1)) }}
                                        </div>
                                        <div>
                                            <div class="fw-semibold text-dark" style="font-size: 0.88rem;">{{ $quote->name }}</div>
                                            <small class="text-muted"><i class="bi bi-telephone me-1"></i>{{ $quote->phone }}</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge bg-light text-dark border fw-medium" style="font-size: 0.72rem;">
                                        {{ $quote->service_type ?? 'General' }}
                                    </span>
                                </td>
                                <td>
                                    <small class="text-muted text-nowrap">
                                        <i class="bi bi-clock me-1"></i>{{ $quote->created_at->diffForHumans() }}
                                    </small>
                                </td>
                                <td>
                                    <span class="status-badge status-{{ $quote->status }}">
                                        {{ $quote->status }}
                                    </span>
                                </td>
                                <td class="text-end">
                                    <a href="{{ route('admin.quotes.show', $quote->id) }}" class="action-icon-btn" title="View Quote Request">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-5 text-muted">
                                    <i class="bi bi-file-earmark-x fs-2 d-block mb-2 text-secondary"></i>
                                    <div class="fw-semibold">No quote requests found</div>
                                    <small>Quote requests submitted from the website will appear here.</small>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- =========================================================
     08. LATEST CONTACT MESSAGES (FULL WIDTH)
========================================================= -->
<div class="table-pro-card">
    <div class="table-pro-header">
        <div>
            <h5><i class="bi bi-envelope-paper me-2 text-info"></i>Latest Contact Inquiries</h5>
            <small class="text-muted">General inquiries submitted through the contact form</small>
        </div>
        <a href="{{ route('admin.messages.index') }}" class="btn btn-sm btn-outline-secondary">
            View All Inquiries ({{ $totalMessages }})
        </a>
    </div>
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr style="font-size: 0.76rem; text-transform: uppercase; color: var(--admin-text-muted); letter-spacing: 0.5px;">
                    <th>Sender</th>
                    <th>Subject</th>
                    <th>Message Snippet</th>
                    <th>Date Received</th>
                    <th>State</th>
                    <th class="text-end">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($recentMessages as $msg)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <div class="table-avatar-initials-pro" style="background: rgba(239, 68, 68, 0.09); color: #EF4444;">
                                    {{ strtoupper(substr($msg->name ?? 'M', 0, 1)) }}
                                </div>
                                <div>
                                    <div class="fw-semibold text-dark" style="font-size: 0.88rem;">{{ $msg->name }}</div>
                                    <small class="text-muted"><i class="bi bi-envelope me-1"></i>{{ $msg->email }}</small>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="fw-semibold text-dark small">{{ $msg->subject ?? 'General Inquiry' }}</span>
                        </td>
                        <td>
                            <span class="text-muted small text-truncate d-inline-block" style="max-width: 380px;">
                                {{ Str::limit($msg->message, 85) }}
                            </span>
                        </td>
                        <td>
                            <small class="text-muted text-nowrap">
                                <i class="bi bi-calendar3 me-1"></i>{{ $msg->created_at->format('d M Y, H:i') }}
                            </small>
                        </td>
                        <td>
                            @if($msg->is_read)
                                <span class="badge bg-light text-secondary border">Read</span>
                            @else
                                <span class="badge bg-danger">Unread</span>
                            @endif
                        </td>
                        <td class="text-end">
                            <a href="{{ route('admin.messages.show', $msg->id) }}" class="action-icon-btn" title="View Message">
                                <i class="bi bi-eye"></i>
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-5 text-muted">
                            <i class="bi bi-chat-square-text fs-2 d-block mb-2 text-secondary"></i>
                            <div class="fw-semibold">No contact inquiries yet</div>
                            <small>Messages sent via the Contact page will be listed here.</small>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection

@section('scripts')
<!-- Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // ----------------------------------------------------
        // 1. MONTHLY ACTIVITY TREND CHART (LINE)
        // ----------------------------------------------------
        const lineCtx = document.getElementById('monthlyActivityChart');
        if (lineCtx) {
            const labels = {!! json_encode($monthlyLabels ?? []) !!};
            const bookingData = {!! json_encode($monthlyBookings ?? []) !!};
            const quoteData = {!! json_encode($monthlyQuotes ?? []) !!};

            const lineCanvas = lineCtx.getContext('2d');
            
            // Navy Gradient Fill
            const navyGradient = lineCanvas.createLinearGradient(0, 0, 0, 260);
            navyGradient.addColorStop(0, 'rgba(11, 31, 58, 0.22)');
            navyGradient.addColorStop(1, 'rgba(11, 31, 58, 0.00)');

            // Green Gradient Fill
            const greenGradient = lineCanvas.createLinearGradient(0, 0, 0, 260);
            greenGradient.addColorStop(0, 'rgba(72, 169, 0, 0.25)');
            greenGradient.addColorStop(1, 'rgba(72, 169, 0, 0.00)');

            new Chart(lineCtx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [
                        {
                            label: 'Bookings',
                            data: bookingData,
                            borderColor: '#0B1F3A',
                            backgroundColor: navyGradient,
                            borderWidth: 2.5,
                            pointBackgroundColor: '#0B1F3A',
                            pointBorderColor: '#ffffff',
                            pointBorderWidth: 2,
                            pointRadius: 4,
                            pointHoverRadius: 6,
                            tension: 0.38,
                            fill: true
                        },
                        {
                            label: 'Quote Requests',
                            data: quoteData,
                            borderColor: '#48A900',
                            backgroundColor: greenGradient,
                            borderWidth: 2.5,
                            pointBackgroundColor: '#48A900',
                            pointBorderColor: '#ffffff',
                            pointBorderWidth: 2,
                            pointRadius: 4,
                            pointHoverRadius: 6,
                            tension: 0.38,
                            fill: true
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    interaction: {
                        mode: 'index',
                        intersect: false
                    },
                    plugins: {
                        legend: {
                            position: 'top',
                            align: 'end',
                            labels: {
                                boxWidth: 10,
                                boxHeight: 10,
                                borderRadius: 5,
                                usePointStyle: true,
                                font: {
                                    family: 'Poppins',
                                    size: 12,
                                    weight: '500'
                                },
                                padding: 16
                            }
                        },
                        tooltip: {
                            backgroundColor: '#0B1F3A',
                            titleFont: { family: 'Montserrat', size: 12, weight: '700' },
                            bodyFont: { family: 'Poppins', size: 12 },
                            padding: 12,
                            cornerRadius: 8,
                            boxPadding: 4
                        }
                    },
                    scales: {
                        x: {
                            grid: { display: false },
                            ticks: {
                                font: { family: 'Poppins', size: 11 },
                                color: '#64748B'
                            }
                        },
                        y: {
                            beginAtZero: true,
                            ticks: {
                                precision: 0,
                                font: { family: 'Poppins', size: 11 },
                                color: '#64748B'
                            },
                            grid: { color: '#F1F5F9' }
                        }
                    }
                }
            });
        }

        // ----------------------------------------------------
        // 2. BOOKING STATUS PIPELINE CHART (DOUGHNUT)
        // ----------------------------------------------------
        const donutCtx = document.getElementById('bookingStatusChart');
        if (donutCtx) {
            const statusCounts = {!! json_encode($statusCounts ?? [0, 0, 0, 0]) !!};
            
            // Check if all zero
            const hasData = statusCounts.some(val => val > 0);
            const chartData = hasData ? statusCounts : [1];
            const chartColors = hasData 
                ? ['#F59E0B', '#10B981', '#3B82F6', '#EF4444'] 
                : ['#E2E8F0'];
            const chartLabels = hasData
                ? ['Pending', 'Confirmed', 'Completed', 'Cancelled']
                : ['No Bookings Yet'];

            new Chart(donutCtx, {
                type: 'doughnut',
                data: {
                    labels: chartLabels,
                    datasets: [{
                        data: chartData,
                        backgroundColor: chartColors,
                        borderWidth: 2,
                        borderColor: '#ffffff',
                        hoverOffset: 4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    cutout: '72%',
                    plugins: {
                        legend: { display: false },
                        tooltip: {
                            enabled: hasData,
                            backgroundColor: '#0B1F3A',
                            titleFont: { family: 'Montserrat', size: 12, weight: '700' },
                            bodyFont: { family: 'Poppins', size: 12 },
                            padding: 10,
                            cornerRadius: 8
                        }
                    }
                }
            });
        }
    });
</script>
@endsection
