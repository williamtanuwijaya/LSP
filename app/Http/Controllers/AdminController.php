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
        // Akun camaba yang BELUM aktif (pending atau rejected)
        $usersBaru = User::where('role', 'camaba')
            ->where('is_active', false)
            ->whereIn('status_akun', ['pending', 'rejected'])
            ->latest()
            ->get();

        $pendaftar = CalonMahasiswa::with(['user', 'pembayaran'])
            ->latest()
            ->get();

        return view('admin.index', compact('pendaftar', 'usersBaru'));
    }


    // 2. Verifikasi Data Diri (Biodata)
    public function verifikasiData($id)
    {
        $calonMahasiswa = CalonMahasiswa::findOrFail($id);

        $calonMahasiswa->status_pendaftaran = 'verified';
        $calonMahasiswa->save();

        return back()->with('success', 'Data mahasiswa berhasil diverifikasi.');
    }

    public function tolakData($id)
    {
        $calonMahasiswa = \App\Models\CalonMahasiswa::findOrFail($id);

        $calonMahasiswa->update([
            'status_pendaftaran' => 'DITOLAK' // Ubah status jadi rejected
        ]);

        return back()->with('error', 'Biodata ditolak. Mahasiswa harus perbaiki data.');
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
            'is_active'   => true,
            'status_akun' => 'active',
        ]);

        return back()->with('success', 'Akun calon mahasiswa berhasil diaktifkan.');
    }

    public function tolakUser($id)
    {
        $user = User::where('role', 'camaba')->findOrFail($id);

        $user->update([
            'is_active'   => false,        // tetap non-aktif
            'status_akun' => 'rejected',   // ditandai ditolak
        ]);

        return back()->with('error', 'Akun calon mahasiswa ditolak. Mahasiswa dapat memperbaiki / daftar ulang.');
    }



    public function showPendaftar($id)
    {
        $pendaftar = CalonMahasiswa::with(['user', 'pembayaran'])->findOrFail($id);

        return view('admin.pendaftar-show', compact('pendaftar'));
    }
}
