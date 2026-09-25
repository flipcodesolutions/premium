<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(
        Request $request,
        Closure $next
    ): Response {

        // User is not logged in
        if (!Auth::check()) {
            return redirect()
                ->route('login')
                ->with(
                    'error',
                    'Please login to access the admin panel.'
                );
        }

        // User is logged in but is not an admin
        if (Auth::user()->role !== 'admin') {
            abort(
                403,
                'Unauthorized access. Admin permission required.'
            );
        }

        // User is admin
        return $next($request);
    }
}