<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Admin Dashboard') | Premium Building & Pest Inspections</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <style>
        :root {
            --admin-navy: #0B1F3A;
            --admin-navy-dark: #061222;
            --admin-blue: #123F67;
            --admin-green: #48A900;
            --admin-green-hover: #398700;
            --admin-green-light: #F0FDF4;
            --admin-bg: #F8FAFC;
            --admin-card-bg: #FFFFFF;
            --admin-border: #E2E8F0;
            --admin-border-subtle: #F1F5F9;
            --admin-text-main: #0F172A;
            --admin-text-muted: #64748B;
            --sidebar-width: 265px;
        }

        * {
            box-sizing: border-box;
        }

        /* ---------------- Admin Pagination ---------------- */
        .pagination {
            margin-bottom: 0;
            gap: 4px;
        }
        .page-link {
            color: var(--admin-navy);
            border-radius: 6px !important;
            border: 1px solid var(--admin-border);
            padding: 0.35rem 0.75rem;
            font-size: 0.85rem;
            font-weight: 500;
            transition: all 0.2s ease;
        }
        .page-link:hover {
            color: #ffffff;
            background-color: var(--admin-green);
            border-color: var(--admin-green);
        }
        .page-item.active .page-link {
            background-color: var(--admin-green);
            border-color: var(--admin-green);
            color: #ffffff;
            font-weight: 700;
        }
        .page-item.disabled .page-link {
            color: #94a3b8;
            background-color: #f8fafc;
            border-color: var(--admin-border-subtle);
        }

        /* ---------------- SweetAlert2 Brand Customization ---------------- */
        .swal2-popup {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif !important;
            border-radius: 14px !important;
            padding: 1.85rem !important;
            box-shadow: 0 20px 40px rgba(11, 31, 58, 0.18) !important;
        }
        .swal2-title {
            color: var(--admin-navy) !important;
            font-size: 1.35rem !important;
            font-weight: 700 !important;
            letter-spacing: -0.01em !important;
        }
        .swal2-html-container {
            color: #475569 !important;
            font-size: 0.95rem !important;
            line-height: 1.55 !important;
        }
        .swal2-actions {
            gap: 10px !important;
            margin-top: 1.5rem !important;
        }
        .swal2-styled {
            border-radius: 7px !important;
            padding: 0.65rem 1.45rem !important;
            font-size: 0.9rem !important;
            font-weight: 600 !important;
            box-shadow: none !important;
            transition: all 0.2s ease !important;
        }
        .swal2-styled:hover {
            transform: translateY(-1px) !important;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.12) !important;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            background-color: var(--admin-bg);
            color: var(--admin-text-main);
            margin: 0;
            padding: 0;
            overflow-x: hidden;
            -webkit-font-smoothing: antialiased;
        }

        h1, h2, h3, h4, h5, h6, .brand-font, button, input, select, textarea {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
        }

        /* ---------------- Headings Hierarchy (H1 to H6) ---------------- */
        h1, h2, h3, h4, h5, h6,
        .h1, .h2, .h3, .h4, .h5, .h6 {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            color: var(--admin-navy);
            margin-top: 0;
            margin-bottom: 0.5rem;
            text-rendering: optimizeLegibility;
            -webkit-font-smoothing: antialiased;
        }

        h1, .h1 {
            font-size: 1.85rem;
            font-weight: 800;
            line-height: 1.25;
            letter-spacing: -0.02em;
            margin-bottom: 0.75rem;
        }

        h2, .h2 {
            font-size: 1.5rem;
            font-weight: 700;
            line-height: 1.3;
            letter-spacing: -0.015em;
            margin-bottom: 0.65rem;
        }

        h3, .h3 {
            font-size: 1.28rem;
            font-weight: 700;
            line-height: 1.35;
            letter-spacing: -0.01em;
            margin-bottom: 0.55rem;
        }

        h4, .h4 {
            font-size: 1.12rem;
            font-weight: 600;
            line-height: 1.4;
            margin-bottom: 0.5rem;
        }

        h5, .h5 {
            font-size: 0.98rem;
            font-weight: 600;
            line-height: 1.45;
            color: var(--admin-text-main);
            margin-bottom: 0.45rem;
        }

        h6, .h6 {
            font-size: 0.85rem;
            font-weight: 600;
            line-height: 1.5;
            color: var(--admin-text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 0.4rem;
        }

        /* ---------------- Sidebar ---------------- */
        .admin-sidebar {
            width: var(--sidebar-width);
            background: linear-gradient(180deg, #0B1F3A 0%, #061222 100%);
            height: 100vh;
            max-height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            z-index: 1040;
            color: #fff;
            display: flex;
            flex-direction: column;
            overflow: hidden;
            box-shadow: 4px 0 24px rgba(0, 0, 0, 0.14);
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .sidebar-brand {
            padding: 22px 20px 18px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            gap: 10px;
            text-decoration: none;
            color: #fff;
            flex-shrink: 0;
        }

        .sidebar-brand-logo {
            max-height: 50px;
            max-width: 190px;
            width: auto;
            object-fit: contain;
            filter: brightness(0) invert(1);
            transition: transform 0.2s ease, opacity 0.2s ease;
        }

        .sidebar-brand:hover .sidebar-brand-logo {
            opacity: 0.95;
            transform: scale(1.02);
        }

        .sidebar-brand-badge {
            font-size: 0.65rem;
            font-weight: 700;
            letter-spacing: 1.5px;
            color: #70d624;
            background: rgba(72, 169, 0, 0.15);
            padding: 3px 8px;
            border-radius: 4px;
            border: 1px solid rgba(72, 169, 0, 0.3);
            text-transform: uppercase;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        .sidebar-brand-badge::before {
            content: '';
            display: inline-block;
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: #70d624;
        }

        /* Sidebar User Mini Bar */
        .sidebar-user-pill {
            margin: 12px 14px 6px;
            padding: 10px 12px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.07);
            border-radius: 10px;
            display: flex;
            align-items: center;
            gap: 10px;
            flex-shrink: 0;
        }

        .sidebar-user-avatar {
            width: 34px;
            height: 34px;
            border-radius: 8px;
            background: linear-gradient(135deg, var(--admin-green) 0%, #2f7300 100%);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 0.9rem;
            flex-shrink: 0;
            box-shadow: 0 2px 8px rgba(72, 169, 0, 0.35);
        }

        .sidebar-user-details {
            overflow: hidden;
            line-height: 1.25;
        }

        .sidebar-user-name {
            font-size: 0.82rem;
            font-weight: 600;
            color: #ffffff;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .sidebar-user-status {
            font-size: 0.68rem;
            color: rgba(255, 255, 255, 0.6);
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .status-online-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: #10B981;
            display: inline-block;
            box-shadow: 0 0 6px rgba(16, 185, 129, 0.8);
        }

        .sidebar-menu {
            padding: 10px 12px;
            flex-grow: 1;
            overflow-y: auto;
            overflow-x: hidden;
        }

        .sidebar-menu::-webkit-scrollbar {
            width: 4px;
        }

        .sidebar-menu::-webkit-scrollbar-track {
            background: transparent;
        }

        .sidebar-menu::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.15);
            border-radius: 4px;
        }

        .sidebar-heading {
            font-size: 0.68rem;
            text-transform: uppercase;
            letter-spacing: 1.2px;
            color: rgba(255, 255, 255, 0.4);
            font-weight: 700;
            padding: 10px 12px 4px;
            margin-top: 6px;
        }

        .nav-item-link {
            display: flex;
            align-items: center;
            padding: 9px 13px;
            border-radius: 8px;
            color: rgba(255, 255, 255, 0.78);
            text-decoration: none;
            font-size: 0.88rem;
            font-weight: 500;
            transition: all 0.2s ease;
            margin-bottom: 2px;
        }

        .nav-item-link i {
            font-size: 1.15rem;
            width: 24px;
            margin-right: 10px;
            color: rgba(255, 255, 255, 0.55);
            transition: color 0.2s, transform 0.2s;
        }

        .nav-item-link:hover {
            color: #ffffff;
            background: rgba(255, 255, 255, 0.08);
            transform: translateX(2px);
        }

        .nav-item-link:hover i {
            color: var(--admin-green);
        }

        .nav-item-link.active {
            color: #ffffff;
            background: linear-gradient(90deg, rgba(72, 169, 0, 0.22) 0%, rgba(72, 169, 0, 0.05) 100%);
            border-left: 3.5px solid var(--admin-green);
            font-weight: 600;
        }

        .nav-item-link.active i {
            color: var(--admin-green);
        }

        .nav-badge {
            margin-left: auto;
            font-size: 0.68rem;
            padding: 3px 8px;
            border-radius: 50px;
            font-weight: 600;
        }

        .sidebar-footer {
            padding: 14px 16px;
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            background: rgba(0, 0, 0, 0.25);
            flex-shrink: 0;
        }

        /* ---------------- Main Content Layout ---------------- */
        .admin-main-wrapper {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            transition: margin-left 0.3s ease;
        }

        /* ---------------- Topbar Header ---------------- */
        .admin-topbar {
            height: 68px;
            background: #ffffff;
            border-bottom: 1px solid var(--admin-border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 32px;
            position: sticky;
            top: 0;
            z-index: 1030;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.02);
        }

        .topbar-left {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .toggle-sidebar-btn {
            display: none;
            background: transparent;
            border: 1px solid var(--admin-border);
            border-radius: 8px;
            padding: 6px 10px;
            font-size: 1.25rem;
            color: var(--admin-text-main);
            cursor: pointer;
        }

        .page-header-title {
            margin: 0;
            font-size: 1.2rem;
            font-weight: 700;
            color: var(--admin-navy);
            letter-spacing: -0.2px;
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .topbar-action-btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 7px 14px;
            border-radius: 8px;
            font-size: 0.82rem;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.2s;
            border: 1px solid var(--admin-border);
            background: #ffffff;
            color: var(--admin-text-main);
        }

        .topbar-action-btn:hover {
            background: var(--admin-bg);
            color: var(--admin-navy);
            border-color: #cbd5e1;
        }

        .topbar-icon-btn {
            position: relative;
            width: 38px;
            height: 38px;
            border-radius: 8px;
            border: 1px solid var(--admin-border);
            background: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--admin-text-main);
            text-decoration: none;
            transition: all 0.2s;
            cursor: pointer;
        }

        .topbar-icon-btn:hover {
            background: var(--admin-bg);
            color: var(--admin-navy);
        }

        .topbar-icon-badge {
            position: absolute;
            top: -4px;
            right: -4px;
            min-width: 18px;
            height: 18px;
            padding: 0 4px;
            border-radius: 9px;
            background: #EF4444;
            color: #fff;
            font-size: 0.65rem;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid #ffffff;
        }

        .admin-avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--admin-navy) 0%, var(--admin-blue) 100%);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 0.9rem;
            box-shadow: 0 2px 6px rgba(11, 31, 58, 0.18);
        }

        /* ---------------- Content Body ---------------- */
        .admin-content {
            padding: 28px 32px 48px;
            flex-grow: 1;
        }

        /* ---------------- Custom UI Components ---------------- */
        .card-custom {
            background: #ffffff;
            border: 1px solid var(--admin-border);
            border-radius: 14px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.03), 0 6px 16px rgba(11, 31, 58, 0.03);
            margin-bottom: 24px;
            transition: box-shadow 0.2s ease, border-color 0.2s ease;
        }

        .card-custom:hover {
            box-shadow: 0 4px 20px rgba(11, 31, 58, 0.06);
        }

        .card-custom-header {
            padding: 18px 24px;
            border-bottom: 1px solid var(--admin-border-subtle);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .card-custom-header h5 {
            margin: 0;
            font-size: 1.05rem;
            font-weight: 700;
            color: var(--admin-navy);
            letter-spacing: -0.2px;
        }

        .btn-navy {
            background-color: var(--admin-navy);
            color: #ffffff;
            border: 1px solid var(--admin-navy);
            font-weight: 500;
            border-radius: 8px;
            padding: 8px 18px;
            transition: all 0.2s;
        }

        .btn-navy:hover {
            background-color: var(--admin-blue);
            color: #ffffff;
            border-color: var(--admin-blue);
        }

        .btn-green {
            background-color: var(--admin-green);
            color: #ffffff;
            border: 1px solid var(--admin-green);
            font-weight: 600;
            border-radius: 8px;
            padding: 8px 18px;
            transition: all 0.2s;
        }

        .btn-green:hover {
            background-color: var(--admin-green-hover);
            color: #ffffff;
            border-color: var(--admin-green-hover);
        }

        /* Status Badges */
        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 4px 11px;
            font-size: 0.72rem;
            font-weight: 600;
            border-radius: 20px;
            text-transform: capitalize;
            letter-spacing: 0.2px;
        }

        .status-badge::before {
            content: '';
            width: 6px;
            height: 6px;
            border-radius: 50%;
            display: inline-block;
        }

        .status-pending {
            background-color: #FEF3C7;
            color: #92400E;
            border: 1px solid #FDE68A;
        }
        .status-pending::before {
            background-color: #F59E0B;
        }

        .status-confirmed, .status-quoted, .status-active {
            background-color: #DEF7EC;
            color: #03543F;
            border: 1px solid #BCF0DA;
        }
        .status-confirmed::before, .status-quoted::before, .status-active::before {
            background-color: #10B981;
        }

        .status-completed, .status-closed {
            background-color: #E1EFFE;
            color: #1E429F;
            border: 1px solid #BFDBFE;
        }
        .status-completed::before, .status-closed::before {
            background-color: #3B82F6;
        }

        .status-cancelled, .status-inactive {
            background-color: #FDE8E8;
            color: #9B1C1C;
            border: 1px solid #F8B4B4;
        }
        .status-cancelled::before, .status-inactive::before {
            background-color: #EF4444;
        }

        .status-contacted {
            background-color: #E0E7FF;
            color: #3730A3;
            border: 1px solid #C7D2FE;
        }
        .status-contacted::before {
            background-color: #6366F1;
        }

        .status-scheduled {
            background-color: #E0F2FE;
            color: #0369A1;
            border: 1px solid #BAE6FD;
        }
        .status-scheduled::before {
            background-color: #0284C7;
        }

        /* Avatar in tables */
        .table-avatar-initials {
            width: 36px;
            height: 36px;
            border-radius: 9px;
            background: rgba(11, 31, 58, 0.08);
            color: var(--admin-navy);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 0.85rem;
            flex-shrink: 0;
        }

        /* Responsive */
        @media (max-width: 991px) {
            .admin-sidebar {
                transform: translateX(-100%);
            }

            .admin-sidebar.show {
                transform: translateX(0);
            }

            .admin-main-wrapper {
                margin-left: 0;
            }

            .toggle-sidebar-btn {
                display: block;
            }

            .sidebar-backdrop {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                width: 100vw;
                height: 100vh;
                background: rgba(0, 0, 0, 0.55);
                backdrop-filter: blur(2px);
                z-index: 1035;
            }

            .sidebar-backdrop.show {
                display: block;
            }

            .admin-topbar {
                padding: 0 18px;
            }

            .admin-content {
                padding: 20px 18px 36px;
            }
        }
    </style>
    @yield('styles')
</head>
<body>

    <!-- Mobile Backdrop -->
    <div id="sidebarBackdrop" class="sidebar-backdrop" onclick="toggleSidebar()"></div>

    <!-- Sidebar -->
    <aside id="adminSidebar" class="admin-sidebar">
        <!-- Brand -->
        <a href="{{ route('admin.dashboard') }}" class="sidebar-brand">
            <img src="{{ asset('images/logo.png') }}" alt="Premium Building & Pest Inspections" title="Premium Building & Pest Inspections" class="sidebar-brand-logo">
            <div class="sidebar-brand-badge">ADMIN PANEL</div>
        </a>

        <!-- User Pill in Sidebar -->
        <div class="sidebar-user-pill">
            <div class="sidebar-user-avatar">
                {{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}
            </div>
            <div class="sidebar-user-details">
                <div class="sidebar-user-name">{{ Auth::user()->name ?? 'Administrator' }}</div>
                <div class="sidebar-user-status">
                    <span class="status-online-dot"></span> Online &bull; Super Admin
                </div>
            </div>
        </div>

        <!-- Menu -->
        <div class="sidebar-menu">
            <div class="sidebar-heading">Overview</div>
            <a href="{{ route('admin.dashboard') }}" class="nav-item-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="bi bi-speedometer2"></i>
                <span>Dashboard</span>
            </a>

            <div class="sidebar-heading">Operations</div>

            <!-- Bookings -->
            @php
                $pendingBookingsBadge = \App\Models\Booking::where('status', 'pending')->count();
            @endphp
            <a href="{{ route('admin.bookings.index') }}" class="nav-item-link {{ request()->routeIs('admin.bookings.*') ? 'active' : '' }}">
                <i class="bi bi-calendar-check"></i>
                <span>Bookings</span>
                @if($pendingBookingsBadge > 0)
                    <span class="badge bg-warning text-dark nav-badge">{{ $pendingBookingsBadge }}</span>
                @endif
            </a>

            <!-- Quotes -->
            @php
                $pendingQuotesBadge = \App\Models\QuoteRequest::where('status', 'pending')->count();
            @endphp
            <a href="{{ route('admin.quotes.index') }}" class="nav-item-link {{ request()->routeIs('admin.quotes.*') ? 'active' : '' }}">
                <i class="bi bi-file-earmark-text"></i>
                <span>Quote Requests</span>
                @if($pendingQuotesBadge > 0)
                    <span class="badge bg-warning text-dark nav-badge">{{ $pendingQuotesBadge }}</span>
                @endif
            </a>

            <!-- Content Management Heading -->

            <div class="sidebar-heading">Content Management</div>

            <!-- Services -->
            <a href="{{ route('admin.services.index') }}" class="nav-item-link {{ request()->routeIs('admin.services.*') ? 'active' : '' }}">
                <i class="bi bi-tools"></i>
                <span>Services</span>
            </a>

            <!-- Blog Posts -->
            <a href="{{ route('admin.blogs.index') }}" class="nav-item-link {{ request()->routeIs('admin.blogs.*') ? 'active' : '' }}">
                <i class="bi bi-journal-text"></i>
                <span>Blog Posts</span>
            </a>

            <!-- Gallery -->
            <a href="{{ route('admin.galleries.index') }}" class="nav-item-link {{ request()->routeIs('admin.galleries.*') ? 'active' : '' }}">
                <i class="bi bi-images"></i>
                <span>Gallery</span>
            </a>

            <div class="sidebar-heading">Client Tools</div>

            <!-- Inspection Agreement Link -->
            @php
                $acceptedAgreementsBadge = \App\Models\InspectionAgreement::where('status', 'accepted')->count();
            @endphp
            <a href="{{ route('admin.agreements.index') }}" class="nav-item-link {{ request()->routeIs('admin.agreements.*') ? 'active' : '' }}">
                <i class="bi bi-shield-check"></i>
                <span>Inspection Agreement</span>
                @if($acceptedAgreementsBadge > 0)
                    <span class="badge bg-success nav-badge">{{ $acceptedAgreementsBadge }}</span>
                @endif
            </a>

            <div class="sidebar-heading">System</div>

            <!-- Frontend Website -->
            <a href="{{ route('home') }}" target="_blank" class="nav-item-link">
                <i class="bi bi-box-arrow-up-right"></i>
                <span>View Website</span>
            </a>
        </div>

        <!-- Footer / Logout -->
        <div class="sidebar-footer">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-outline-light w-100 btn-sm d-flex align-items-center justify-content-center gap-2" style="border-color: rgba(255,255,255,0.25);">
                    <i class="bi bi-box-arrow-left"></i>
                    <span>Log Out</span>
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Wrapper -->
    <div class="admin-main-wrapper">
        <!-- Topbar -->
        <header class="admin-topbar">
            <div class="topbar-left">
                <button type="button" class="toggle-sidebar-btn" onclick="toggleSidebar()" aria-label="Toggle Sidebar">
                    <i class="bi bi-list"></i>
                </button>
                <div>
                    <h1 class="page-header-title">@yield('page_title', 'Dashboard')</h1>
                    <small class="text-muted d-none d-sm-inline" style="font-size: 0.76rem;">
                        <i class="bi bi-calendar3 me-1"></i> {{ date('l, d F Y') }}
                    </small>
                </div>
            </div>

            <div class="topbar-right">
                <!-- View Website Link -->
                <a href="{{ route('home') }}" target="_blank" class="topbar-action-btn d-none d-md-inline-flex">
                    <i class="bi bi-box-arrow-up-right text-muted"></i>
                    <span>View Site</span>
                </a>

                <!-- Notification Alert Pill -->
                @php
                    $totalAlerts = $pendingBookingsBadge + $pendingQuotesBadge;
                @endphp
                <div class="dropdown">
                    <button class="topbar-icon-btn" type="button" data-bs-toggle="dropdown" aria-expanded="false" title="Pending Action Alerts">
                        <i class="bi bi-bell"></i>
                        @if($totalAlerts > 0)
                            <span class="topbar-icon-badge">{{ $totalAlerts }}</span>
                        @endif
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end shadow-sm border p-2" style="min-width: 250px;">
                        <li class="px-2 py-1 fw-bold text-dark border-bottom small">Pending Actions</li>
                        <li>
                            <a class="dropdown-item small py-2 d-flex justify-content-between align-items-center" href="{{ route('admin.bookings.index', ['status' => 'pending']) }}">
                                <span><i class="bi bi-calendar-check me-2 text-warning"></i>Pending Bookings</span>
                                <span class="badge bg-warning text-dark">{{ $pendingBookingsBadge }}</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item small py-2 d-flex justify-content-between align-items-center" href="{{ route('admin.quotes.index', ['status' => 'pending']) }}">
                                <span><i class="bi bi-file-earmark-text me-2 text-info"></i>Pending Quotes</span>
                                <span class="badge bg-info">{{ $pendingQuotesBadge }}</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- User Dropdown -->
                <div class="dropdown">
                    <button class="d-flex align-items-center gap-2 bg-transparent border-0 p-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="admin-avatar">
                            {{ strtoupper(substr(Auth::user()->name ?: (Auth::user()->email ?? 'A'), 0, 1)) }}
                        </div>
                        <div class="d-none d-md-flex flex-column text-start">
                            <span class="fw-semibold text-dark" style="font-size: 0.85rem; line-height: 1.2;">{{ Auth::user()->name ?: (explode('@', Auth::user()->email ?? 'Administrator')[0]) }}</span>
                            <span class="text-muted" style="font-size: 0.72rem;">{{ ucfirst(Auth::user()->role ?? 'Admin') }}</span>
                        </div>
                        <i class="bi bi-chevron-down text-muted small ms-1 d-none d-md-inline"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end shadow-sm border p-1 mt-2" style="min-width: 160px;">
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item small py-2 text-danger d-flex align-items-center">
                                    <i class="bi bi-box-arrow-left me-2"></i>
                                    <span>Log Out</span>
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="admin-content">
            <!-- Alert Messages -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show d-flex align-items-center gap-2 border-0 shadow-sm" role="alert">
                    <i class="bi bi-check-circle-fill fs-5 text-success"></i>
                    <div>{{ session('success') }}</div>
                    <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center gap-2 border-0 shadow-sm" role="alert">
                    <i class="bi bi-exclamation-triangle-fill fs-5 text-danger"></i>
                    <div>{{ session('error') }}</div>
                    <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(isset($errors) && $errors->any())
                <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm" role="alert">
                    <div class="fw-semibold mb-1 d-flex align-items-center gap-2">
                        <i class="bi bi-exclamation-octagon-fill text-danger"></i>
                        <span>Please fix the following issues:</span>
                    </div>
                    <ul class="mb-0 ps-3 small">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @yield('content')
        </main>
    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('adminSidebar');
            const backdrop = document.getElementById('sidebarBackdrop');
            sidebar.classList.toggle('show');
            backdrop.classList.toggle('show');
        }
    </script>
    <!-- SweetAlert2 Library -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Global SweetAlert Toast helper
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3500,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer);
                toast.addEventListener('mouseleave', Swal.resumeTimer);
            }
        });
        window.SwalToast = Toast;

        // Global helper for programmatic alerts
        window.showAlert = function (icon, title, text) {
            Swal.fire({
                icon: icon || 'info',
                title: title || '',
                text: text || '',
                confirmButtonColor: '#48A900'
            });
        };

        document.addEventListener('DOMContentLoaded', function () {
            // 1. Flash Session Success
            @if(session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: "{{ addslashes(session('success')) }}",
                    confirmButtonColor: '#48A900',
                    timer: 3500,
                    timerProgressBar: true
                });
            @endif

            // 2. Flash Session Error
            @if(session('error'))
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: "{{ addslashes(session('error')) }}",
                    confirmButtonColor: '#dc3545'
                });
            @endif

            // 3. Flash Session Warning
            @if(session('warning'))
                Swal.fire({
                    icon: 'warning',
                    title: 'Warning!',
                    text: "{{ addslashes(session('warning')) }}",
                    confirmButtonColor: '#f59e0b'
                });
            @endif

            // 4. Flash Session Info
            @if(session('info'))
                Swal.fire({
                    icon: 'info',
                    title: 'Notice',
                    text: "{{ addslashes(session('info')) }}",
                    confirmButtonColor: '#0B1F3A'
                });
            @endif

            // 5. Validation Errors
            @if(isset($errors) && $errors->any())
                Swal.fire({
                    icon: 'error',
                    title: 'Validation Errors',
                    html: '<div class="text-start ps-3"><ul class="mb-0 text-danger small">@foreach($errors->all() as $err)<li>{{ addslashes($err) }}</li>@endforeach</ul></div>',
                    confirmButtonColor: '#dc3545'
                });
            @endif
        });

        // 6. Global Form Action Interceptor (Capture phase runs before any inline onsubmit)
        document.addEventListener('submit', function (e) {
            const form = e.target;
            if (!form || form.tagName !== 'FORM') return;

            // If already confirmed by SweetAlert, let it submit naturally
            if (form.dataset.swalConfirmed === 'true') {
                return;
            }

            const isDelete = form.querySelector('input[name="_method"][value="DELETE"]') !== null
                || form.action.includes('destroy')
                || form.action.includes('delete')
                || form.classList.contains('delete-form');

            const isLogout = form.action.includes('logout');
            const isToggleStatus = form.action.includes('toggle-status') || form.action.includes('toggle-read');
            const isSendEmail = form.action.includes('send-email') || form.action.includes('email-report');
            const isStatusUpdate = form.action.includes('update-status');

            const hasInlineConfirm = form.hasAttribute('onsubmit') && form.getAttribute('onsubmit').includes('confirm');
            const customPrompt = form.getAttribute('data-confirm');

            // Intercept if any confirmation is needed
            if (isDelete || isLogout || isToggleStatus || isSendEmail || isStatusUpdate || hasInlineConfirm || customPrompt) {
                e.preventDefault();
                e.stopImmediatePropagation();

                let title = 'Are you sure?';
                let text = 'Please confirm this action.';
                let icon = 'warning';
                let confirmText = 'Yes, Proceed';
                let confirmColor = '#48A900';

                if (isDelete) {
                    title = 'Delete Confirmation';
                    text = 'Are you sure you want to delete this record? This action cannot be undone.';
                    icon = 'warning';
                    confirmText = 'Yes, Delete it!';
                    confirmColor = '#dc3545';
                } else if (isLogout) {
                    title = 'Log Out?';
                    text = 'Are you sure you want to end your administrator session?';
                    icon = 'question';
                    confirmText = 'Yes, Log Out';
                    confirmColor = '#dc3545';
                } else if (isToggleStatus) {
                    title = 'Change Status?';
                    text = 'Are you sure you want to toggle the status of this item?';
                    icon = 'question';
                    confirmText = 'Yes, Change';
                    confirmColor = '#0B1F3A';
                } else if (isSendEmail) {
                    title = 'Send Email to Client?';
                    text = 'This will immediately dispatch an email notification to the customer.';
                    icon = 'info';
                    confirmText = 'Yes, Send Email';
                    confirmColor = '#48A900';
                } else if (isStatusUpdate) {
                    title = 'Update Status?';
                    text = 'Are you sure you want to change the status of this request?';
                    icon = 'question';
                    confirmText = 'Yes, Update';
                    confirmColor = '#48A900';
                }

                if (customPrompt) {
                    text = customPrompt;
                } else if (hasInlineConfirm) {
                    const onsubmitStr = form.getAttribute('onsubmit');
                    const match = onsubmitStr.match(/confirm\(['"](.*?)['"]\)/);
                    if (match && match[1]) {
                        text = match[1];
                    }
                }

                Swal.fire({
                    title: title,
                    text: text,
                    icon: icon,
                    showCancelButton: true,
                    confirmButtonColor: confirmColor,
                    cancelButtonColor: '#64748B',
                    confirmButtonText: confirmText,
                    cancelButtonText: 'Cancel',
                    reverseButtons: true,
                    focusCancel: isDelete
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.dataset.swalConfirmed = 'true';
                        form.removeAttribute('onsubmit');
                        Swal.fire({
                            title: 'Processing...',
                            text: 'Please wait while we complete your request.',
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            didOpen: () => {
                                Swal.showLoading();
                            }
                        });
                        form.submit();
                    }
                });
            }
        }, true);
    </script>
    @yield('scripts')
    @stack('scripts')
</body>
</html>
