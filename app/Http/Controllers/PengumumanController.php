<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengumuman;
use Illuminate\Support\Facades\Auth;

class PengumumanController extends Controller
{
    // Untuk Tampilan Depan (Welcome Page)
    public function index()
    {
        $pengumuman = Pengumuman::where('is_active', true)->latest()->get();
        return view('welcome', compact('pengumuman'));
    }

    // Untuk Admin Simpan Pengumuman
    public function store(Request $request)
    {
        // Cek apakah user adalah admin
        if (Auth::user()->role !== 'admin') {
            abort(403);
        }

        Pengumuman::create([
            'user_id' => Auth::id(),
            'judul' => $request->judul,
            'isi' => $request->isi,
        ]);

        return back()->with('success', 'Pengumuman diterbitkan.');
    }
}
