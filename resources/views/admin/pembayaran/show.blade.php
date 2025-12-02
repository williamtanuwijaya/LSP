@extends('layouts.app')

@section('title', 'Detail Pembayaran')

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Tombol Kembali -->
    <div class="mb-6">
        <a href="{{ route('admin.index') }}" class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300 flex items-center gap-2 font-medium transition">
            &larr; Kembali ke Dashboard
        </a>
    </div>

    <div class="bg-white dark:bg-slate-800 shadow-xl rounded-2xl overflow-hidden border border-slate-200 dark:border-slate-700">
        <!-- Header Card -->
        <div class="p-6 border-b border-slate-200 dark:border-slate-700 flex justify-between items-center bg-slate-50 dark:bg-slate-900/50">
            <h1 class="text-2xl font-bold text-slate-900 dark:text-white">Detail Pembayaran</h1>
            <span class="px-4 py-1 rounded-full text-sm font-bold border 
                {{ $pembayaran->status_bayar == 'lunas' ? 'bg-green-100 text-green-800 border-green-200' : ($pembayaran->status_bayar == 'ditolak' ? 'bg-red-100 text-red-800 border-red-200' : 'bg-yellow-100 text-yellow-800 border-yellow-200') }}">
                {{ ucfirst($pembayaran->status_bayar) }}
            </span>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 p-8">
            <!-- Kolom Kiri: Informasi Data -->
            <div class="space-y-6">
                <div>
                    <h3 class="text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider mb-1">Nama Calon Mahasiswa</h3>
                    <p class="text-xl font-semibold text-slate-900 dark:text-white">{{ $pembayaran->calonMahasiswa->user->name ?? '-' }}</p>
                </div>
                
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <h3 class="text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider mb-1">NISN</h3>
                        <p class="text-slate-700 dark:text-slate-300">{{ $pembayaran->calonMahasiswa->nisn ?? '-' }}</p>
                    </div>
                    <div>
                        <h3 class="text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider mb-1">Program Studi</h3>
                        <p class="text-slate-700 dark:text-slate-300">{{ $pembayaran->calonMahasiswa->prodi_pilihan ?? '-' }}</p>
                    </div>
                </div>

                <div class="p-4 bg-blue-50 dark:bg-blue-900/20 rounded-xl border border-blue-100 dark:border-blue-800">
                    <h3 class="text-xs font-bold text-blue-600 dark:text-blue-400 uppercase tracking-wider mb-1">Nominal Transfer</h3>
                    <p class="text-2xl font-bold text-slate-900 dark:text-white">Rp {{ number_format($pembayaran->jumlah_bayar) }}</p>
                    <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">
                        Tanggal: {{ \Carbon\Carbon::parse($pembayaran->tanggal_bayar)->format('d F Y, H:i') }} WIB
                    </p>
                </div>
            </div>

            <!-- Kolom Kanan: Bukti Gambar -->
            <div class="flex flex-col">
                <h3 class="text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider mb-3">Bukti Transfer</h3>
                <div class="bg-slate-100 dark:bg-slate-900 p-2 rounded-xl border border-slate-200 dark:border-slate-700 flex-grow flex items-center justify-center">
                    <img src="{{ asset('storage/' . $pembayaran->bukti_bayar) }}" alt="Bukti Bayar" class="max-w-full h-auto max-h-[400px] rounded-lg shadow-sm object-contain">
                </div>
                <div class="mt-3 text-center">
                    <a href="{{ asset('storage/' . $pembayaran->bukti_bayar) }}" target="_blank" class="text-sm text-blue-600 hover:underline">Lihat Resolusi Penuh</a>
                </div>
            </div>
        </div>

        <!-- Footer Actions -->
        @if($pembayaran->status_bayar == 'pending')
        <div class="p-6 bg-slate-50 dark:bg-slate-900/50 border-t border-slate-200 dark:border-slate-700 flex justify-end gap-3">
            <form action="{{ route('admin.tolak.bayar', $pembayaran->id) }}" method="POST" onsubmit="return confirm('Yakin tolak pembayaran ini?')">
                @csrf
                @method('PATCH')
                <button class="px-5 py-2.5 bg-white dark:bg-slate-700 text-red-600 border border-red-200 dark:border-red-900 hover:bg-red-50 dark:hover:bg-red-900/30 font-bold rounded-xl transition">
                    ✕ Tolak
                </button>
            </form>
            
            <form action="{{ route('admin.verif.bayar', $pembayaran->id) }}" method="POST" onsubmit="return confirm('Konfirmasi lunas?')">
                @csrf
                @method('PATCH')
                <button class="px-5 py-2.5 bg-green-600 text-white font-bold rounded-xl hover:bg-green-700 transition shadow-lg shadow-green-500/30 flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    Verifikasi Lunas
                </button>
            </form>
        </div>
        @endif
    </div>
</div>
@endsection