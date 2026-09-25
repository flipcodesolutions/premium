<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    /**
     * Show Admin Register Page
     */
    public function showRegister()
    {
        // If already logged in as admin, redirect to admin dashboard
        if (Auth::check() && Auth::user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.register');
    }


    /**
     * Handle Admin Registration
     */
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:users,email',
            ],
            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
            ],
        ], [
            'name.required' => 'Please enter your full name.',
            'email.required' => 'Please enter an email address.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'An account with this email address already exists.',
            'password.required' => 'Please enter a password.',
            'password.min' => 'Password must be at least 8 characters long.',
            'password.confirmed' => 'Password confirmation does not match.',
        ]);

        // Create the admin user (password is automatically hashed by User model casts)
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $validated['password'],
            'role' => 'admin',
        ]);

        return redirect()
            ->route('login')
            ->with('success', 'Admin account created successfully! Please sign in with your credentials.')
            ->with('registered_email', $user->email);
    }


    /**
     * Show Admin Login Page
     */
    public function showLogin()
    {
        // If already logged in as admin,
        // don't show the login page again.
        if (Auth::check() && Auth::user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.login');
    }


    /**
     * Handle Admin Login
     */
    public function login(Request $request)
    {
        // Validate login form
        $credentials = $request->validate([
            'email' => [
                'required',
                'email',
                'max:255',
            ],

            'password' => [
                'required',
                'string',
            ],
        ]);


        /*
        |--------------------------------------------------------------------------
        | Admin Authentication
        |--------------------------------------------------------------------------
        |
        | We are checking:
        | 1. Email
        | 2. Password
        | 3. role must be admin
        |
        */

        if (
            Auth::attempt([
                'email' => $credentials['email'],
                'password' => $credentials['password'],
                'role' => 'admin',
            ], $request->boolean('remember'))
        ) {

            // Regenerate session after successful login
            $request->session()->regenerate();

            return redirect()
                ->intended(route('admin.dashboard'))
                ->with('success', 'Welcome to Admin Dashboard.');
        }


        // Login failed
        return back()
            ->withErrors([
                'email' => 'The email or password is incorrect, or you do not have admin access.',
            ])
            ->onlyInput('email');
    }


    /**
     * Admin Logout
     */
    public function logout(Request $request)
    {
        Auth::logout();

        // Invalidate current session
        $request->session()->invalidate();

        // Generate a new CSRF token
        $request->session()->regenerateToken();

        return redirect()
            ->route('login')
            ->with('success', 'You have been logged out successfully.');
    }
}