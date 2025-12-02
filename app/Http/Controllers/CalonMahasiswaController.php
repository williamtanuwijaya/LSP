<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CalonMahasiswa;
use Illuminate\Support\Facades\Auth;

class CalonMahasiswaController extends Controller
{
    public function store(Request $request)
    {
        // Validasi
        $request->validate([
            'nisn' => 'required|numeric',
            'asal_sekolah' => 'required',
            'prodi_pilihan' => 'required',
        ]);

        // Simpan ke tabel calon_mahasiswa
        CalonMahasiswa::create([
            'user_id' => Auth::id(), // Ambil ID user yang sedang login
            'nisn' => $request->nisn,
            'asal_sekolah' => $request->asal_sekolah,
            'nomor_hp' => $request->nomor_hp,
            'alamat' => $request->alamat,
            'prodi_pilihan' => $request->prodi_pilihan,
            'status_pendaftaran' => 'pending'
        ]);

        return redirect()->route('dashboard')->with('success', 'Biodata tersimpan!');
    }
}
