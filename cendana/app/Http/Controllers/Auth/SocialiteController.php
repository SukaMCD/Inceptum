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
        $googleUser = Socialite::driver('google')->user(); // bisa pakai ->stateless() jika perlu

        // Cek apakah user sudah ada berdasarkan email
        $user = User::where('email', $googleUser->email)->first();

        if ($user) {
            // User manual sudah ada, update google_id
            $user->update([
                'google_id' => $googleUser->id,
                'google_token' => $googleUser->token ?? null,
                'google_refresh_token' => $googleUser->refreshToken ?? null,
            ]);
        } else {
            // Buat user baru khusus Google
            $user = User::create([
                'nama_user' => $googleUser->name,
                'email' => $googleUser->email,
                'google_id' => $googleUser->id,
                'google_token' => $googleUser->token ?? null,
                'google_refresh_token' => $googleUser->refreshToken ?? null,
                'password' => Hash::make('user'),
                'role' => 'customer',
            ]);
        }

        // Login user dan redirect
        Auth::login($user);

        // Login admin
        if ($user->role === 'admin') {
            return redirect()->to('/admin'); // panel Filament
        }
        return redirect()->route('homepage');
    }
}
