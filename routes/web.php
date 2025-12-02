<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController; // Tambahkan ini
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CalonMahasiswaController;
use App\Http\Controllers\PembayaranController;

// 1. Halaman Depan
Route::get('/', function () {
    return view('welcome');
});

// 2. Auth Routes (Tamu/Belum Login)
Route::middleware('guest')->group(function () {
    // Menampilkan Halaman (GET)
    Route::get('/login', function () {
        return view('auth.login');
    })->name('login');

    Route::get('/register', function () {
        return view('auth.register');
    })->name('register');

    // Memproses Data (POST) -> INI YANG TADINYA HILANG
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
});

// 3. Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// 4. Dashboard & Fitur Mahasiswa (Wajib Login)
Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Biodata
    Route::get('/biodata', [CalonMahasiswaController::class, 'create'])->name('biodata.create');
    Route::post('/biodata', [CalonMahasiswaController::class, 'store'])->name('biodata.store');

    // Pembayaran
    Route::get('/pembayaran', [PembayaranController::class, 'create'])->name('pembayaran.create');
    Route::post('/pembayaran', [PembayaranController::class, 'store'])->name('pembayaran.store');
});

// 5. Admin Routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::patch('/verif-data/{id}', [AdminController::class, 'verifikasiData'])->name('verif.data');
    Route::patch('/verif-bayar/{id}', [AdminController::class, 'verifikasiPembayaran'])->name('verif.bayar');
    Route::patch('/tolak-bayar/{i   d}', [AdminController::class, 'tolakPembayaran'])->name('tolak.bayar');
});
