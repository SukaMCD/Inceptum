<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    // Redirect ke Google
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    // Callback dari Google
    public function callback()
    {
        $googleUser = Socialite::driver('google')->user();

        // Cek apakah user sudah ada berdasarkan email
        $user = User::where('email', $googleUser->email)->first();

        if ($user) {
            // Jika user sudah ada (manual atau Google), update data Google-nya
            $user->update([
                'google_id' => $googleUser->id,
                'google_token' => $googleUser->token ?? null,
                'google_refresh_token' => $googleUser->refreshToken ?? null,
                // Pastikan akun yang sudah ada (mungkin akun manual)
                // ditandai sebagai akun Google setelah ini
                'auth_provider' => 'google', 
            ]);
        } else {
            // Buat user baru khusus Google
            $user = User::create([
                'nama_user' => $googleUser->name,
                'email' => $googleUser->email,
                'google_id' => $googleUser->id,
                'google_token' => $googleUser->token ?? null,
                'google_refresh_token' => $googleUser->refreshToken ?? null,
                // Password di set NULL karena login hanya via Google
                'password' => null, 
                'role' => 'customer',
                // Tandai ini sebagai akun Google
                'auth_provider' => 'google',
            ]);
        }

        // Login user dan redirect
        Auth::login($user);

        // Login admin
        if ($user->role === 'admin') {
            return redirect()->to('/admin');
        }
        return redirect()->route('homepage');
    }
}
