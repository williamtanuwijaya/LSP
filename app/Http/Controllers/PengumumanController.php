<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengumumanController extends Controller
{
    // 1. Tampilkan Halaman Kelola Pengumuman (Admin)
    public function index()
    {
        // Ambil data pengumuman terbaru
        $pengumuman = Pengumuman::latest()->get();

        // Return ke view admin pengumuman
        return view('admin.pengumuman', compact('pengumuman'));
    }

    // 2. Simpan Pengumuman Baru (Admin)
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi'   => 'required',
        ]);

        Pengumuman::create([
            'user_id' => Auth::id(), // Admin yang sedang login
            'judul'   => $request->judul,
            'isi'     => $request->isi,
            'is_active' => true
        ]);

        return back()->with('success', 'Pengumuman berhasil diterbitkan!');
    }

    // 3. Update Pengumuman (Logika Edit)
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi'   => 'required',
        ]);

        $pengumuman = Pengumuman::findOrFail($id);

        $pengumuman->update([
            'judul' => $request->judul,
            'isi'   => $request->isi,
        ]);

        return back()->with('success', 'Pengumuman berhasil diperbarui.');
    }

    // 4. Hapus Pengumuman
    public function destroy($id)
    {
        // Cari pengumuman berdasarkan ID, lalu hapus
        $pengumuman = Pengumuman::findOrFail($id);
        $pengumuman->delete();

        return back()->with('success', 'Pengumuman berhasil dihapus.');
    }
}
