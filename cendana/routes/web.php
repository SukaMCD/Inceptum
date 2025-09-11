<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Auth\SocialiteController;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('homepage');
})->name('homepage');

Route::get('auth/login', function () {
    return view('auth.login');
})->name('login');

// Rute untuk mengarahkan ke halaman login Google
Route::get('auth/redirect', [SocialiteController::class, 'redirect'])->name('socialite.redirect');

// Rute callback dari Google
Route::get('auth/google/callback', [SocialiteController::class, 'callback'])->name('socialite.callback');

// Rute untuk logout
Route::post('logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
})->name('logout');

// Rute admin dashboard
Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');
    });
});
