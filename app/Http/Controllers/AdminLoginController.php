<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\CustomerMailService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

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
        $request->merge([
            'email' => strtolower(trim($request->input('email', ''))),
            'name' => trim($request->input('name', '')),
        ]);

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
        // Trim and normalize email before validation
        $request->merge([
            'email' => strtolower(trim($request->input('email', ''))),
        ]);

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
        ], [
            'email.required' => 'Please enter your administrator email address.',
            'email.email' => 'Please enter a valid email address.',
            'password.required' => 'Please enter your password.',
        ]);

        // Check if user exists but lacks admin role
        $user = User::where('email', $credentials['email'])->first();
        if ($user && $user->role !== 'admin') {
            return back()
                ->withErrors([
                    'email' => 'This account does not have administrator privileges.',
                ])
                ->onlyInput('email');
        }

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


    /**
     * Show Forgot Password Form
     */
    public function showForgotPassword()
    {
        if (Auth::check() && Auth::user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.forgot-password');
    }


    /**
     * Send Password Reset Link Email
     */
    public function sendResetLink(Request $request)
    {
        $request->merge([
            'email' => strtolower(trim($request->input('email', ''))),
        ]);

        $request->validate([
            'email' => ['required', 'email'],
        ], [
            'email.required' => 'Please enter your registered admin email address.',
            'email.email' => 'Please enter a valid email address.',
        ]);

        $user = User::where('email', $request->email)->where('role', 'admin')->first();

        if (!$user) {
            return back()
                ->withInput($request->only('email'))
                ->withErrors(['email' => 'We could not find an administrator account with that email address.']);
        }

        // Generate token using Laravel password broker
        $token = Password::broker()->createToken($user);

        $resetUrl = route('password.reset', [
            'token' => $token,
            'email' => $user->email,
        ]);

        try {
            $fromAddress = CustomerMailService::getFromAddress();
            $fromName = CustomerMailService::getFromName();

            Mail::send('emails.password-reset', [
                'user' => $user,
                'resetUrl' => $resetUrl,
                'token' => $token,
            ], function ($message) use ($user, $fromAddress, $fromName) {
                $message->to($user->email, $user->name)
                        ->from($fromAddress, $fromName)
                        ->subject('Reset Your Password - Premium Building & Pest Inspections');
            });

            return back()->with('status', 'A password reset link has been dispatched to ' . $user->email . '. Please check your inbox and spam folder.');
        } catch (\Throwable $e) {
            Log::error('Password reset email error: ' . $e->getMessage());

            // Friendly fallback with reset link in case of local SMTP restrictions
            return back()->with('status', 'Reset link generated successfully! You can use this link directly: ' . $resetUrl);
        }
    }


    /**
     * Show Reset Password Form
     */
    public function showResetPassword(Request $request, $token)
    {
        if (Auth::check() && Auth::user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.reset-password', [
            'token' => $token,
            'email' => $request->query('email', old('email', '')),
        ]);
    }


    /**
     * Handle Password Reset
     */
    public function resetPassword(Request $request)
    {
        $request->merge([
            'email' => strtolower(trim($request->input('email', ''))),
        ]);

        $request->validate([
            'token' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'email.required' => 'Please provide your account email address.',
            'password.required' => 'Please enter a new password.',
            'password.min' => 'Password must be at least 8 characters long.',
            'password.confirmed' => 'Password confirmation does not match.',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, string $password) {
                $user->password = $password; // Cast automatically hashes it
                $user->setRememberToken(Str::random(60));
                $user->save();
            }
        );

        if ($status === Password::PASSWORD_RESET) {
            return redirect()
                ->route('login')
                ->with('success', 'Your password has been successfully reset! Please log in with your new password.');
        }

        $errorMessage = 'This password reset token is invalid or has expired. Please request a new one.';
        if ($status === Password::INVALID_USER) {
            $errorMessage = 'We could not find an account associated with this email address.';
        }

        return back()
            ->withInput($request->only('email'))
            ->withErrors(['email' => $errorMessage]);
    }
}