@extends('layouts.app')

@section('title', 'Lengkapi Biodata')

@section('content')
<div class="max-w-3xl mx-auto">
    
    <!-- Tombol Kembali -->
    <div class="mb-6">
        <a href="{{ route('dashboard') }}" class="text-slate-500 hover:text-blue-600 dark:text-slate-400 dark:hover:text-blue-400 flex items-center gap-2 transition">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Kembali ke Dashboard
        </a>
    </div>

    <div class="bg-white dark:bg-slate-800 shadow-xl rounded-2xl overflow-hidden border border-slate-200 dark:border-slate-700 relative">
        
        <!-- Header -->
        <div class="bg-gradient-to-r from-blue-600 to-indigo-700 px-8 py-6 text-white relative overflow-hidden">
            <div class="relative z-10">
                <h2 class="text-2xl font-bold">Formulir Pendaftaran</h2>
                <p class="text-blue-100 text-sm mt-1">Data ini akan digunakan untuk verifikasi kelulusan Anda.</p>
            </div>
            <div class="absolute top-0 right-0 -mt-6 -mr-6 w-32 h-32 bg-white opacity-10 rounded-full blur-xl"></div>
        </div>

        <!-- Form -->
        <form action="{{ route('biodata.store') }}" method="POST" class="p-8 space-y-6">
            @csrf

            <!-- Grid Layout -->
            <div class="grid md:grid-cols-2 gap-6">
                <!-- NISN -->
                <div class="col-span-1">
                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">NISN</label>
                    <input type="number" name="nisn" class="w-full rounded-xl bg-slate-50 dark:bg-slate-900 border-slate-300 dark:border-slate-600 text-slate-900 dark:text-white focus:ring-blue-500 focus:border-blue-500 transition py-2.5 px-4" placeholder="Nomor Induk Siswa Nasional" required>
                    @error('nisn') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- No HP -->
                <div class="col-span-1">
                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">Nomor WhatsApp</label>
                    <input type="text" name="nomor_hp" class="w-full rounded-xl bg-slate-50 dark:bg-slate-900 border-slate-300 dark:border-slate-600 text-slate-900 dark:text-white focus:ring-blue-500 focus:border-blue-500 transition py-2.5 px-4" placeholder="0812xxxx" required>
                </div>

                <!-- Asal Sekolah (Full Width di Mobile, Span 2 di Desktop) -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">Asal Sekolah</label>
                    <input type="text" name="asal_sekolah" class="w-full rounded-xl bg-slate-50 dark:bg-slate-900 border-slate-300 dark:border-slate-600 text-slate-900 dark:text-white focus:ring-blue-500 focus:border-blue-500 transition py-2.5 px-4" placeholder="Nama SMA/SMK/MA Asal" required>
                </div>

                <!-- Prodi Pilihan -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">Program Studi Pilihan</label>
                    <div class="relative">
                        <select name="prodi_pilihan" class="w-full rounded-xl bg-slate-50 dark:bg-slate-900 border-slate-300 dark:border-slate-600 text-slate-900 dark:text-white focus:ring-blue-500 focus:border-blue-500 transition py-3 px-4 appearance-none" required>
                            <option value="" disabled selected>-- Pilih Jurusan Impianmu --</option>
                            <option value="Teknik Informatika">Teknik Informatika (S1)</option>
                            <option value="Sistem Informasi">Sistem Informasi (S1)</option>
                            <option value="Teknologi Informasi">Teknologi Informasi (S1)</option>
                            <option value="Bisnis Digital">Bisnis Digital (S1)</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-slate-500">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </div>
                    </div>
                </div>

                <!-- Alamat -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">Alamat Lengkap</label>
                    <textarea name="alamat" rows="3" class="w-full rounded-xl bg-slate-50 dark:bg-slate-900 border-slate-300 dark:border-slate-600 text-slate-900 dark:text-white focus:ring-blue-500 focus:border-blue-500 transition py-3 px-4" placeholder="Jalan, Kelurahan, Kecamatan, Kota/Kabupaten" required></textarea>
                </div>
            </div>

            <!-- Footer Action -->
            <div class="pt-6 border-t border-slate-100 dark:border-slate-700 flex justify-end">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-xl shadow-lg shadow-blue-500/30 transition transform hover:-translate-y-1 flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path></svg>
                    Simpan Data
                </button>
            </div>
        </form>
    </div>
</div>


@endsection