<?php

namespace App\Http\Controllers;

use App\Models\CalonMahasiswa;
use App\Models\Pembayaran;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // 1. Menampilkan Dashboard Admin
    public function index()
    {
        // 1. Ambil data User Baru yang Belum Aktif
        $usersBaru = User::where('role', 'camaba')
            ->where('is_active', false)
            ->latest()
            ->get();

        // 2. Ambil data Pendaftar Lengkap
        $pendaftar = CalonMahasiswa::with(['user', 'pembayaran'])
            ->latest()
            ->get();

        return view('admin.index', compact('pendaftar', 'usersBaru'));
    }

    // 2. Verifikasi Data Diri (Biodata)
    public function verifikasiData($id)
    {
        $calonMahasiswa = CalonMahasiswa::findOrFail($id);

        // Ubah status jadi 'verified'
        $calonMahasiswa->update([
            'status_pendaftaran' => 'verified'
        ]);

        return back()->with('success', 'Data mahasiswa berhasil diverifikasi.');
    }

    // 3. Verifikasi Pembayaran (Terima)
    public function verifikasiPembayaran($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);

        $pembayaran->update([
            'status_bayar' => 'lunas'
        ]);

        return back()->with('success', 'Pembayaran berhasil dikonfirmasi lunas.');
    }

    // 4. Tolak Pembayaran (Opsional, jika bukti tidak valid)
    public function tolakPembayaran($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);

        $pembayaran->update([
            'status_bayar' => 'ditolak'
        ]);

        return back()->with('error', 'Pembayaran ditolak.');
    }

    public function aktivasiUser($id)
    {
        $user = User::where('role', 'camaba')->findOrFail($id);

        $user->update([
            'is_active' => true,
        ]);

        return back()->with('success', 'Akun calon mahasiswa berhasil diaktifkan.');
    }
}
