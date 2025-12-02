@extends('layouts.app')

@section('title', 'Isi Biodata')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="bg-white dark:bg-slate-800 shadow-2xl rounded-2xl overflow-hidden border border-slate-200 dark:border-slate-700">
        <div class="px-8 py-6 border-b border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-900/50">
            <h2 class="text-2xl font-bold text-slate-900 dark:text-white">Formulir Pendaftaran</h2>
            <p class="text-slate-500 dark:text-slate-400 text-sm">Isi data diri Anda dengan benar dan valid.</p>
        </div>

        <form action="{{ route('biodata.store') }}" method="POST" class="p-8 space-y-6">
            @csrf
            
            <div>
                <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">NISN</label>
                <input type="text" name="nisn" class="w-full rounded-lg bg-slate-50 dark:bg-slate-900 border-slate-300 dark:border-slate-600 text-slate-900 dark:text-white focus:ring-blue-500 focus:border-blue-500" required placeholder="Contoh: 0012345678">
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">Asal Sekolah</label>
                <input type="text" name="asal_sekolah" class="w-full rounded-lg bg-slate-50 dark:bg-slate-900 border-slate-300 dark:border-slate-600 text-slate-900 dark:text-white focus:ring-blue-500 focus:border-blue-500" required placeholder="Contoh: SMA Negeri 1 Medan">
            </div>

             <div>
                <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">Nomor HP / WhatsApp</label>
                <input type="text" name="nomor_hp" class="w-full rounded-lg bg-slate-50 dark:bg-slate-900 border-slate-300 dark:border-slate-600 text-slate-900 dark:text-white focus:ring-blue-500 focus:border-blue-500" required placeholder="0812...">
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">Pilih Program Studi</label>
                <select name="prodi_pilihan" class="w-full rounded-lg bg-slate-50 dark:bg-slate-900 border-slate-300 dark:border-slate-600 text-slate-900 dark:text-white focus:ring-blue-500 focus:border-blue-500">
                    <option value="Teknik Informatika">Teknik Informatika</option>
                    <option value="Sistem Informasi">Sistem Informasi</option>
                    <option value="Hukum">Hukum</option>
                    <option value="Manajemen">Manajemen</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">Alamat Lengkap</label>
                <textarea name="alamat" rows="3" class="w-full rounded-lg bg-slate-50 dark:bg-slate-900 border-slate-300 dark:border-slate-600 text-slate-900 dark:text-white focus:ring-blue-500 focus:border-blue-500" required></textarea>
            </div>

            <div class="pt-4">
                <button type="submit" class="w-full py-3 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl transition shadow-lg shadow-blue-500/40">
                    Simpan Biodata
                </button>
            </div>
        </form>
    </div>
</div>
@endsection