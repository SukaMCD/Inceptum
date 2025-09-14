<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;
use App\Models\User;

class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset link request view.
     */
    public function create(): View
    {
        return view('auth.forgot-password');
    }

    /**
     * Handle the password reset link request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate(['email' => ['required', 'email']]);

        $user = User::where('email', $request->email)->first();

        // Cek apakah user ada dan apakah auth_provider-nya bukan 'manual'
        if ($user && $user->auth_provider !== 'manual') {
            // Jika akun adalah Google, tolak permintaan reset password
            return back()->withErrors(['email' => 'Akun ini terdaftar melalui Google. Silakan masuk menggunakan Google.']);
        }
        
        // Hanya kirim reset link jika akun adalah 'manual'
        $status = Password::sendResetLink($request->only('email'));

        return back()->with('status', __($status));
    }
}
