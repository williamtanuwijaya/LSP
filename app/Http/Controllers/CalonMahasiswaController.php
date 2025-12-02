<?php

namespace App\Http\Controllers;

use App\Models\CalonMahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CalonMahasiswaController extends Controller
{
    // 1. Menampilkan Formulir (INI YANG TADI HILANG)
    public function create()
    {
        // Cek apakah user sudah pernah isi biodata?
        $existing = CalonMahasiswa::where('user_id', Auth::id())->first();

        // Jika sudah ada, jangan kasih isi lagi, lempar balik ke dashboard
        if ($existing) {
            return redirect()->route('dashboard')->with('error', 'Anda sudah melengkapi biodata.');
        }

        return view('mahasiswa.biodata');
    }

    // 2. Menyimpan Data (POST)
    public function store(Request $request)
    {
        $request->validate([
            'nisn' => 'required|numeric|unique:calon_mahasiswas,nisn',
            'asal_sekolah' => 'required',
            'nomor_hp' => 'required',
            'alamat' => 'required',
            'prodi_pilihan' => 'required',
        ]);

        CalonMahasiswa::create([
            'user_id' => Auth::id(),
            'nisn' => $request->nisn,
            'asal_sekolah' => $request->asal_sekolah,
            'nomor_hp' => $request->nomor_hp,
            'alamat' => $request->alamat,
            'prodi_pilihan' => $request->prodi_pilihan,
            'status_pendaftaran' => 'pending'
        ]);

        return redirect()->route('dashboard')->with('success', 'Biodata berhasil disimpan! Silakan lanjut ke pembayaran.');
    }
}
