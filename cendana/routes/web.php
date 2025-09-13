<?php

use App\Http\Controllers\Auth\ManualAuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\SocialiteController;
use Illuminate\Http\Request;

// Homepage
Route::get('/', function () {
    return view('homepage');
})->name('homepage');

// Rute untuk otentikasi
Route::prefix('auth')->group(function () {
    
    // Rute Login Manual
    Route::get('login', [ManualAuthController::class, 'showLogin'])->name('login');
    Route::post('login', [ManualAuthController::class, 'login']);

    // Rute Registrasi Manual
    Route::get('register', [ManualAuthController::class, 'showRegister'])->name('register');
    Route::post('register', [ManualAuthController::class, 'register']);
    
    // Rute Login Google
    Route::get('redirect', [SocialiteController::class, 'redirect'])->name('socialite.redirect');
    Route::get('google/callback', [SocialiteController::class, 'callback'])->name('socialite.callback');
});

// Logout
Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
})->name('logout');