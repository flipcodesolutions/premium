<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\Booking;
use App\Models\ContactMessage;
use App\Models\QuoteRequest;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display the Admin Dashboard with summary metrics and recent activity.
     */
    public function index()
    {
        // Booking Metrics
        $totalBookings = Booking::count();
        $pendingBookings = Booking::where('status', 'pending')->count();
        $confirmedBookings = Booking::where('status', 'confirmed')->count();
        $completedBookings = Booking::where('status', 'completed')->count();
        $cancelledBookings = Booking::where('status', 'cancelled')->count();

        // Quote Metrics
        $totalQuotes = QuoteRequest::count();
        $pendingQuotes = QuoteRequest::where('status', 'pending')->count();
        $quotedQuotes = QuoteRequest::where('status', 'quoted')->count();
        $closedQuotes = QuoteRequest::where('status', 'closed')->count();

        // Contact Message Metrics
        $totalMessages = ContactMessage::count();
        $unreadMessages = ContactMessage::where('is_read', false)->count();

        // Services & Blog Metrics
        $totalServices = Service::count();
        $activeServices = Service::where('status', true)->count();
        $totalBlogs = BlogPost::count();

        // Today & This Month Bookings
        $todayBookings = Booking::whereDate('created_at', Carbon::today())->count();
        $monthBookings = Booking::whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->count();

        // Recent items (latest records)
        $recentBookings = Booking::latest()->take(6)->get();
        $recentQuotes = QuoteRequest::latest()->take(6)->get();
        $recentMessages = ContactMessage::latest()->take(5)->get();

        // Last 6 Months Activity Trend for Charts
        $monthlyLabels = [];
        $monthlyBookings = [];
        $monthlyQuotes = [];

        for ($i = 5; $i >= 0; $i--) {
            $targetMonth = Carbon::now()->subMonths($i);
            $monthlyLabels[] = $targetMonth->format('M Y');

            $monthlyBookings[] = Booking::whereYear('created_at', $targetMonth->year)
                ->whereMonth('created_at', $targetMonth->month)
                ->count();

            $monthlyQuotes[] = QuoteRequest::whereYear('created_at', $targetMonth->year)
                ->whereMonth('created_at', $targetMonth->month)
                ->count();
        }

        // Upcoming scheduled inspections (next up)
        $upcomingInspections = Booking::whereNotNull('inspection_date')
            ->whereDate('inspection_date', '>=', Carbon::today())
            ->whereIn('status', ['confirmed', 'pending'])
            ->orderBy('inspection_date', 'asc')
            ->take(5)
            ->get();

        // Status Chart breakdown data
        $statusCounts = [
            $pendingBookings,
            $confirmedBookings,
            $completedBookings,
            $cancelledBookings,
        ];

        return view('admin.dashboard', compact(
            'totalBookings',
            'pendingBookings',
            'confirmedBookings',
            'completedBookings',
            'cancelledBookings',
            'totalQuotes',
            'pendingQuotes',
            'quotedQuotes',
            'closedQuotes',
            'totalMessages',
            'unreadMessages',
            'totalServices',
            'activeServices',
            'totalBlogs',
            'todayBookings',
            'monthBookings',
            'recentBookings',
            'upcomingInspections',
            'recentQuotes',
            'recentMessages',
            'monthlyLabels',
            'monthlyBookings',
            'monthlyQuotes',
            'statusCounts'
        ));
    }
}
