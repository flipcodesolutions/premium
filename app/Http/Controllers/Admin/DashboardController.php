<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\ContactMessage;
use App\Models\QuoteRequest;
use App\Models\Service;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display the Admin Dashboard with summary metrics and recent activity.
     */
    public function index()
    {
        // Metric counts
        $totalBookings = Booking::count();
        $pendingBookings = Booking::where('status', 'pending')->count();

        $totalQuotes = QuoteRequest::count();
        $pendingQuotes = QuoteRequest::where('status', 'pending')->count();

        $totalMessages = ContactMessage::count();
        $unreadMessages = ContactMessage::where('is_read', false)->count();

        $totalServices = Service::count();
        $activeServices = Service::where('status', true)->count();

        // Recent items
        $recentBookings = Booking::latest()->take(5)->get();
        $recentQuotes = QuoteRequest::latest()->take(5)->get();
        $recentMessages = ContactMessage::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalBookings',
            'pendingBookings',
            'totalQuotes',
            'pendingQuotes',
            'totalMessages',
            'unreadMessages',
            'totalServices',
            'activeServices',
            'recentBookings',
            'recentQuotes',
            'recentMessages'
        ));
    }
}
