<?php

namespace App\Http\Controllers;

use App\Models\CalonMahasiswa;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PembayaranController extends Controller
{
    // 1. Menampilkan Halaman Upload
    public function create()
    {
        // Cek apakah user punya biodata?
        $camaba = CalonMahasiswa::where('user_id', Auth::id())->first();

        if (!$camaba) {
            return redirect()->route('dashboard')->with('error', 'Isi biodata dulu sebelum bayar!');
        }

        // Cek apakah sudah pernah bayar?
        if ($camaba->pembayaran) {
            return redirect()->route('dashboard')->with('error', 'Anda sudah mengupload bukti pembayaran.');
        }

        return view('mahasiswa.pembayaran');
    }

    // 2. Proses Simpan Bukti (Nama fungsi diganti jadi 'store')
    public function store(Request $request)
    {
        $request->validate([
            'bukti_bayar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $camaba = CalonMahasiswa::where('user_id', Auth::id())->firstOrFail();

        // Upload File ke folder 'public/bukti_pembayaran'
        $path = $request->file('bukti_bayar')->store('bukti_pembayaran', 'public');

        Pembayaran::create([
            'calon_mahasiswa_id' => $camaba->id,
            'bukti_bayar' => $path,
            'jumlah_bayar' => 250000,
            'tanggal_bayar' => now(),
            'status_bayar' => 'pending'
        ]);

        return redirect()->route('dashboard')->with('success', 'Bukti pembayaran berhasil dikirim. Tunggu verifikasi admin.');
    }

    public function show($id)
    {
        $pembayaran = Pembayaran::with(['pendaftar.user'])->findOrFail($id);

        return view('admin.pembayaran.show', compact('pembayaran'));
    }
}
