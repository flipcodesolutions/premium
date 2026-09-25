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
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700;800&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <style>
        :root {
            --admin-navy: #0B1F3A;
            --admin-navy-dark: #071527;
            --admin-blue: #123F67;
            --admin-green: #48A900;
            --admin-green-hover: #398700;
            --admin-bg: #F4F7FA;
            --admin-card-bg: #FFFFFF;
            --admin-border: #E2E8F0;
            --admin-text-main: #1E293B;
            --admin-text-muted: #64748B;
            --sidebar-width: 260px;
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--admin-bg);
            color: var(--admin-text-main);
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        h1, h2, h3, h4, h5, h6, .brand-font {
            font-family: 'Montserrat', sans-serif;
        }

        /* ---------------- Sidebar ---------------- */
        .admin-sidebar {
            width: var(--sidebar-width);
            background: linear-gradient(180deg, var(--admin-navy) 0%, var(--admin-navy-dark) 100%);
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
            transition: transform 0.3s ease;
        }

        .sidebar-brand {
            padding: 16px 18px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            color: #fff;
            flex-shrink: 0;
        }

        .sidebar-brand-icon {
            width: 38px;
            height: 38px;
            border-radius: 9px;
            background: var(--admin-green);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            color: #fff;
            font-weight: 700;
            box-shadow: 0 4px 10px rgba(72, 169, 0, 0.35);
        }

        .sidebar-brand-text h5 {
            margin: 0;
            font-size: 1rem;
            font-weight: 700;
            letter-spacing: -0.2px;
            line-height: 1.2;
        }

        .sidebar-brand-text span {
            font-size: 0.7rem;
            color: rgba(255, 255, 255, 0.6);
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .sidebar-menu {
            padding: 12px 10px;
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

        .sidebar-menu::-webkit-scrollbar-thumb:hover {
            background: rgba(255, 255, 255, 0.3);
        }

        .sidebar-heading {
            font-size: 0.68rem;
            text-transform: uppercase;
            letter-spacing: 1.2px;
            color: rgba(255, 255, 255, 0.45);
            font-weight: 700;
            padding: 6px 12px 4px;
            margin-top: 8px;
        }

        .nav-item-link {
            display: flex;
            align-items: center;
            padding: 9px 14px;
            border-radius: 8px;
            color: rgba(255, 255, 255, 0.82);
            text-decoration: none;
            font-size: 0.88rem;
            font-weight: 500;
            transition: all 0.2s ease;
            margin-bottom: 2px;
        }

        .nav-item-link i {
            font-size: 1.1rem;
            width: 24px;
            margin-right: 8px;
            color: rgba(255, 255, 255, 0.65);
            transition: color 0.2s;
        }

        .nav-item-link:hover {
            color: #ffffff;
            background: rgba(255, 255, 255, 0.08);
        }

        .nav-item-link:hover i {
            color: var(--admin-green);
        }

        .nav-item-link.active {
            color: #ffffff;
            background: rgba(72, 169, 0, 0.18);
            border-left: 4px solid var(--admin-green);
            font-weight: 600;
        }

        .nav-item-link.active i {
            color: var(--admin-green);
        }

        .nav-badge {
            margin-left: auto;
            font-size: 0.7rem;
            padding: 2px 7px;
            border-radius: 50px;
            font-weight: 600;
        }

        .sidebar-footer {
            padding: 14px 16px;
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            background: rgba(0, 0, 0, 0.22);
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
            height: 70px;
            background: #ffffff;
            border-bottom: 1px solid var(--admin-border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 28px;
            position: sticky;
            top: 0;
            z-index: 1030;
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
            font-size: 1.2rem;
            color: var(--admin-text-main);
        }

        .page-header-title {
            margin: 0;
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--admin-navy);
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .admin-avatar {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: var(--admin-blue);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 0.95rem;
        }

        /* ---------------- Content Body ---------------- */
        .admin-content {
            padding: 28px;
            flex-grow: 1;
        }

        /* ---------------- Custom UI Components ---------------- */
        .card-custom {
            background: #ffffff;
            border: 1px solid var(--admin-border);
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(11, 31, 58, 0.04);
            margin-bottom: 24px;
        }

        .card-custom-header {
            padding: 18px 24px;
            border-bottom: 1px solid var(--admin-border);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .card-custom-header h5 {
            margin: 0;
            font-size: 1.05rem;
            font-weight: 700;
            color: var(--admin-navy);
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
        }

        .status-badge {
            padding: 5px 12px;
            font-size: 0.75rem;
            font-weight: 600;
            border-radius: 30px;
            text-transform: capitalize;
            display: inline-block;
        }

        .status-pending {
            background-color: #FEF3C7;
            color: #92400E;
        }

        .status-confirmed, .status-quoted, .status-active {
            background-color: #DEF7EC;
            color: #03543F;
        }

        .status-completed, .status-closed {
            background-color: #E1EFFE;
            color: #1E429F;
        }

        .status-cancelled, .status-inactive {
            background-color: #FDE8E8;
            color: #9B1C1C;
        }

        .status-contacted {
            background-color: #E0E7FF;
            color: #3730A3;
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
                background: rgba(0,0,0,0.5);
                z-index: 1035;
            }

            .sidebar-backdrop.show {
                display: block;
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
            <div class="sidebar-brand-icon">
                <i class="bi bi-shield-check"></i>
            </div>
            <div class="sidebar-brand-text">
                <h5>PREMIUM</h5>
                <span>Admin Panel</span>
            </div>
        </a>

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

            <!-- Messages -->
            @php
                $unreadMessagesBadge = \App\Models\ContactMessage::where('is_read', false)->count();
            @endphp
            <a href="{{ route('admin.messages.index') }}" class="nav-item-link {{ request()->routeIs('admin.messages.*') ? 'active' : '' }}">
                <i class="bi bi-chat-dots"></i>
                <span>Messages</span>
                @if($unreadMessagesBadge > 0)
                    <span class="badge bg-danger nav-badge">{{ $unreadMessagesBadge }}</span>
                @endif
            </a>

            <div class="sidebar-heading">Content</div>

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
                <button type="submit" class="btn btn-outline-light w-100 btn-sm d-flex align-items-center justify-content-center gap-2">
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
                <button type="button" class="toggle-sidebar-btn" onclick="toggleSidebar()">
                    <i class="bi bi-list"></i>
                </button>
                <h1 class="page-header-title">@yield('page_title', 'Dashboard')</h1>
            </div>

            <div class="topbar-right">
                <div class="d-none d-md-flex flex-column text-end me-2">
                    <span class="fw-semibold" style="font-size: 0.9rem;">{{ Auth::user()->name ?? 'Administrator' }}</span>
                    <span class="text-muted" style="font-size: 0.75rem;">Super Admin</span>
                </div>
                <div class="admin-avatar">
                    {{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="admin-content">
            <!-- Alert Messages -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show d-flex align-items-center gap-2" role="alert">
                    <i class="bi bi-check-circle-fill fs-5"></i>
                    <div>{{ session('success') }}</div>
                    <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center gap-2" role="alert">
                    <i class="bi bi-exclamation-triangle-fill fs-5"></i>
                    <div>{{ session('error') }}</div>
                    <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <div class="fw-semibold mb-1">Please fix the following issues:</div>
                    <ul class="mb-0 ps-3">
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
    @yield('scripts')
</body>
</html>
