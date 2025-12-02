<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran;
use App\Models\CalonMahasiswa;
use Illuminate\Support\Facades\Auth;

class PembayaranController extends Controller
{
    public function uploadBukti(Request $request)
    {
        $request->validate([
            'bukti_bayar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Ambil data calon mahasiswa milik user ini
        $camaba = CalonMahasiswa::where('user_id', Auth::id())->firstOrFail();

        // Upload File
        $path = $request->file('bukti_bayar')->store('bukti_pembayaran', 'public');

        // Simpan ke tabel pembayaran
        Pembayaran::create([
            'calon_mahasiswa_id' => $camaba->id,
            'bukti_bayar' => $path,
            'jumlah_bayar' => 250000, // Misal biaya fix
            'tanggal_bayar' => now(),
            'status_bayar' => 'pending'
        ]);

        return back()->with('success', 'Pembayaran sedang diverifikasi admin.');
    }
}
