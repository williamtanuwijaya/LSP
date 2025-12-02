<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route untuk menampilkan halaman Login
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// Route untuk menampilkan halaman Register
Route::get('/register', function () {
    return view('auth.register');
})->name('register');
