<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // 1. PROSES REGISTER (POST)
    public function register(Request $request)
    {
        // Validasi Input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users', // Email tidak boleh kembar
            'password' => 'required|string|min:8|confirmed', // Confirmed cek field password_confirmation
        ]);

        // Buat User Baru
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'camaba', // Default role Calon Mahasiswa
            'is_active' => false,
        ]);

        // Langsung Login setelah daftar
        Auth::login($user);

        // Redirect ke Dashboard
        return redirect()->route('dashboard')->with('success', 'Akun berhasil dibuat! Silakan lengkapi biodata.');
    }

    // 2. PROSES LOGIN (POST)
    public function login(Request $request)
    {
        // Validasi Input
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Coba Login
        if (Auth::attempt($credentials, $request->remember)) {

            // --- HAPUS ATAU KOMENTAR BAGIAN INI ---
            /*
        if (Auth::user()->is_active == false) {
            Auth::logout();
            return back()->withErrors(['email' => 'Akun belum aktif...']);
        }
        */
            // --------------------------------------

            $request->session()->regenerate();

            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.index');
            }

            return redirect()->route('dashboard');
        }
        // Jika Gagal
        return back()->withErrors([
            'email' => 'Email atau password yang Anda masukkan salah.',
        ])->onlyInput('email');
    }

    // 3. PROSES LOGOUT (POST)
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
