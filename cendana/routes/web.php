<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('homepage');
})->name('homepage');
Route::get('auth/login', function () {
    return view('auth.login');
})->name('login');