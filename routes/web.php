<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth; // Pastikan ini ada
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CalonMahasiswaController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PengumumanController;
use App\Models\Pengumuman;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 1. Halaman Depan (Public)
Route::get('/', function () {
    // Tampilkan 3 pengumuman terbaru di halaman depan
    $pengumuman = Pengumuman::where('is_active', true)->latest()->take(3)->get();
    return view('welcome', compact('pengumuman'));
});

Route::get('/prodi', function () {
    return view('prodi.index    ');
})->name('prodi');

Route::get('/bantuan', function () {
    return view('bantuan.index');
})->name('bantuan');

Route::get('/tentangkami', function () {
    return view('tentangkami.index');
})->name('tentangkami');

// 2. Authentication Routes (Tamu)
Route::middleware('guest')->group(function () {
    Route::get('/login', function () {
        return view('auth.login');
    })->name('login');

    Route::get('/register', function () {
        return view('auth.register');
    })->name('register');

    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
});

// 3. Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// 4. Route Dashboard & Fitur Mahasiswa (Wajib Login)
Route::middleware(['auth'])->group(function () {

    // DASHBOARD UTAMA (Dengan Pengecekan Role)
    Route::get('/dashboard', function () {
        // LOGIKA BARU: Jika yang login adalah Admin, tendang ke /admin
        if (Auth::user()->role === 'admin') {
            return redirect()->route('admin.index');
        }

        // Jika Mahasiswa, tampilkan dashboard mahasiswa
        $pengumuman = Pengumuman::where('is_active', true)->latest()->take(3)->get();
        return view('dashboard', compact('pengumuman'));
    })->name('dashboard');

    // Fitur Mahasiswa (Biodata & Pembayaran)
    Route::get('/biodata', [CalonMahasiswaController::class, 'create'])->name('biodata.create');
    Route::post('/biodata', [CalonMahasiswaController::class, 'store'])->name('biodata.store');

    Route::get('/pembayaran', [PembayaranController::class, 'create'])->name('pembayaran.create');
    Route::post('/pembayaran', [PembayaranController::class, 'store'])->name('pembayaran.store');
});

// 5. Route Khusus Admin
// 5. Route Khusus Admin
Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::patch('/user/aktivasi/{id}', [AdminController::class, 'aktivasiUser'])
            ->name('user.aktivasi');

        Route::patch('/user/tolak/{id}', [AdminController::class, 'tolakUser'])
            ->name('user.tolak');

        // Dashboard admin
        Route::get('/', [AdminController::class, 'index'])->name('index');

        // Aktivasi akun user camaba
        Route::patch('/user/aktivasi/{id}', [AdminController::class, 'aktivasiUser'])
            ->name('user.aktivasi');

        // Verifikasi / tolak biodata pendaftar
        Route::patch('/pendaftar/{id}/verif-data', [AdminController::class, 'verifikasiData'])
            ->name('verif.data');

        Route::patch('/pendaftar/{id}/tolak', [AdminController::class, 'tolakData'])
            ->name('tolak.data');

        // Verifikasi / tolak pembayaran
        Route::patch('/pembayaran/{id}/verif', [AdminController::class, 'verifikasiPembayaran'])
            ->name('verif.bayar');

        Route::patch('/pembayaran/{id}/tolak', [AdminController::class, 'tolakPembayaran'])
            ->name('tolak.bayar');

        // Pengumuman
        Route::get('/pengumuman', [PengumumanController::class, 'index'])
            ->name('pengumuman.index');

        Route::post('/pengumuman', [PengumumanController::class, 'store'])
            ->name('pengumuman.store');

        Route::patch('/pengumuman/{id}', [PengumumanController::class, 'update'])
            ->name('pengumuman.update');

        Route::delete('/pengumuman/{id}', [PengumumanController::class, 'destroy'])
            ->name('pengumuman.destroy');

        // Detail pembayaran & pendaftar
        Route::get('/pembayaran/{id}', [PembayaranController::class, 'show'])
            ->name('pembayaran.show');

        Route::get('/pendaftar/{id}', [AdminController::class, 'showPendaftar'])
            ->name('pendaftar.show'); // hasil akhirnya: "admin.pendaftar.show"
    });
