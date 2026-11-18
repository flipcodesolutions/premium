<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    /**
     * Show change password form.
     */
    public function edit()
    {
        return view('admin.password.edit', [
            'user' => Auth::user(),
        ]);
    }

    /**
     * Update admin password.
     */
    public function update(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'string', 'min:8', 'confirmed', 'different:current_password'],
            'password_confirmation' => ['required', 'string'],
        ], [
            'current_password.required' => 'Please enter your current password.',
            'current_password.current_password' => 'The current password you entered is incorrect.',
            'password.required' => 'Please enter a new password.',
            'password.min' => 'The new password must be at least 8 characters long.',
            'password.confirmed' => 'The password confirmation does not match.',
            'password.different' => 'The new password must be different from your current password.',
            'password_confirmation.required' => 'Please confirm your new password.',
        ]);

        $user = Auth::user();
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()
            ->route('admin.password.edit')
            ->with('success', 'Your password has been changed successfully.');
    }
}
