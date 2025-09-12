<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\SocialiteController;
use Illuminate\Http\Request;

// Homepage
Route::get('/', function () {
    return view('homepage'); // resources/views/homepage.blade.php
})->name('homepage');

// Halaman login manual
Route::get('auth/login', function () {
    return view('auth.login'); // resources/views/auth/login.blade.php
})->name('login');

// Login pakai Google
Route::get('auth/redirect', [SocialiteController::class, 'redirect'])->name('socialite.redirect');
Route::get('auth/google/callback', [SocialiteController::class, 'callback'])->name('socialite.callback');

// Logout
Route::post('logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
})->name('logout');
