@extends('layouts.app')

@section('title', 'Dashboard Mahasiswa')

@section('content')
<div class="max-w-5xl mx-auto space-y-8">

    @php
        $user        = Auth::user();
        $statusAkun  = $user->status_akun ?? 'pending'; // pending | rejected | active
        $calon       = $user->calonMahasiswa;
        $pembayaran  = $calon?->pembayaran;
    @endphp

    <!-- 1. HEADER WELCOME -->
    <div class="bg-gradient-to-r from-blue-600 to-indigo-700 rounded-2xl p-8 text-white shadow-xl relative overflow-hidden">
        <div class="relative z-10">
            <h1 class="text-3xl font-bold mb-2">Selamat Datang, {{ $user->name }}!</h1>
            <p class="text-blue-100 max-w-xl">
                Ini adalah pusat kontrol pendaftaran Anda. 
            </p>
        </div>
        <!-- Hiasan Background -->
        <div class="absolute top-0 right-0 -mt-10 -mr-10 w-40 h-40 bg-white opacity-10 rounded-full blur-2xl"></div>
    </div>

    <!-- 2. ALERT STATUS AKUN (PENTING) -->
    @if(!$user->is_active)
        @if($statusAkun === 'rejected')
            <div class="p-6 bg-red-50 dark:bg-red-900/30 border-l-4 border-red-400 dark:border-red-600 rounded-r-xl shadow-sm flex items-start">
                <div class="flex-shrink-0">
                    <svg class="h-6 w-6 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M18.364 5.636l-12.728 12.728M5.636 5.636l12.728 12.728"/>
                    </svg>
                </div>
                <div class="ml-4">
                    <h3 class="text-lg font-medium text-red-800 dark:text-red-200">Akun Ditolak</h3>
                    <p class="mt-1 text-sm text-red-700 dark:text-red-300">
                        Akun pendaftaran Anda saat ini <strong>ditolak oleh admin</strong>. 
                        Silakan hubungi panitia/administrator PMB untuk informasi lebih lanjut atau koreksi data.
                    </p>
                </div>
            </div>
        @else
            <div class="p-6 bg-yellow-50 dark:bg-yellow-900/30 border-l-4 border-yellow-400 dark:border-yellow-600 rounded-r-xl shadow-sm flex items-start">
                <div class="flex-shrink-0">
                    <svg class="h-6 w-6 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                    </svg>
                </div>
                <div class="ml-4">
                    <h3 class="text-lg font-medium text-yellow-800 dark:text-yellow-200">Akun Menunggu Aktivasi</h3>
                    <p class="mt-1 text-sm text-yellow-700 dark:text-yellow-300">
                        Terima kasih telah mendaftar. Akun Anda sedang diverifikasi oleh Admin. <br>
                        <strong>Anda baru bisa mengisi biodata setelah akun diaktifkan.</strong>
                    </p>
                </div>
            </div>
        @endif
    @endif

    <!-- Alert Notifikasi -->
    @if(session('success'))
        <div class="p-4 bg-green-100 dark:bg-green-900/50 text-green-700 dark:text-green-300 rounded-xl border border-green-200 dark:border-green-800 flex items-center shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    <!-- 3. GRID STATUS PENDAFTARAN -->
    <div class="grid md:grid-cols-2 gap-8">
        
        <!-- CARD 1: BIODATA DIRI -->
        <div class="bg-white dark:bg-slate-800 p-6 rounded-2xl shadow-lg border border-slate-200 dark:border-slate-700 flex flex-col h-full relative overflow-hidden transition {{ !$user->is_active ? 'opacity-75 grayscale-[0.5]' : '' }}">
            
            <div class="flex items-center justify-between mb-6 relative z-10">
                <h3 class="text-xl font-bold text-slate-900 dark:text-white flex items-center">
                    <span class="bg-slate-100 dark:bg-slate-700 w-8 h-8 rounded-full flex items-center justify-center text-sm mr-3">1</span>
                    Biodata Diri
                </h3>
                
                {{-- STATUS BADGE DI SUDUT KANAN CARD --}}
                @if(!$user->is_active)
                    @php
                        $badgeClassAkun = match ($statusAkun) {
                            'rejected' => 'bg-red-100 text-red-700 border border-red-200',
                            'pending'  => 'bg-yellow-100 text-yellow-700 border border-yellow-200',
                            default    => 'bg-slate-100 text-slate-600 border border-slate-200',
                        };
                        $labelAkun = match ($statusAkun) {
                            'rejected' => 'AKUN DITOLAK',
                            'pending'  => 'MENUNGGU AKTIVASI',
                            default    => 'NON-AKTIF',
                        };
                    @endphp
                    <span class="px-3 py-1 text-xs font-bold rounded-full {{ $badgeClassAkun }}">
                        {{ $labelAkun }}
                    </span>

                @elseif($calon)
                    @php
                        $statusBiodata = $calon->status_pendaftaran;

                        $badgeClassBiodata = match ($statusBiodata) {
                            'verified' => 'bg-green-100 text-green-700 border border-green-200',
                            'rejected' => 'bg-red-100 text-red-700 border border-red-200',
                            default    => 'bg-yellow-100 text-yellow-700 border border-yellow-200', // pending
                        };

                        $labelBiodata = match ($statusBiodata) {
                            'verified' => 'TERVERIFIKASI',
                            'rejected' => 'DITOLAK',
                            default    => 'PENDING',
                        };
                    @endphp

                    <span class="px-3 py-1 text-xs font-bold rounded-full {{ $badgeClassBiodata }}">
                        {{ $labelBiodata }}
                    </span>

                @else
                    <span class="px-3 py-1 text-xs font-bold rounded-full bg-slate-100 text-slate-600 border border-slate-200">
                        BELUM DIISI
                    </span>
                @endif
            </div>

            {{-- ISI CARD BIODATA --}}
            @if(!$user->is_active)
                <!-- TAMPILAN JIKA AKUN BELUM AKTIF -->
                <p class="text-slate-500 dark:text-slate-400 mb-8 flex-grow relative z-10">
                    Anda belum bisa mengisi biodata. Mohon tunggu proses verifikasi akun oleh admin.
                </p>
                <button disabled
                        class="w-full py-3 bg-slate-200 dark:bg-slate-700 text-slate-500 rounded-xl cursor-not-allowed font-semibold relative z-10">
                    Menunggu Verifikasi Admin
                </button>

            @elseif($calon)
                <!-- TAMPILAN JIKA SUDAH ISI BIODATA -->
                <div class="space-y-3 text-sm text-slate-600 dark:text-slate-300 mb-8 flex-grow relative z-10 bg-slate-50 dark:bg-slate-700/50 p-4 rounded-lg">
                    <div class="flex justify-between">
                        <span class="text-slate-500">NISN:</span>
                        <span class="font-semibold">{{ $calon->nisn }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-slate-500">Prodi:</span>
                        <span class="font-semibold">{{ $calon->prodi_pilihan }}</span>
                    </div>
                </div>
                <button disabled
                        class="w-full py-2.5 bg-green-50 text-green-600 border border-green-200 rounded-xl cursor-not-allowed font-medium flex items-center justify-center">
                    Data Tersimpan
                </button>

            @else
                <!-- TAMPILAN JIKA AKUN AKTIF TAPI BELUM ISI BIODATA -->
                <p class="text-slate-500 dark:text-slate-400 mb-8 flex-grow relative z-10">
                    Akun Anda aktif! Silakan lengkapi data diri sekarang.
                </p>
                <a href="{{ route('biodata.create') }}"
                   class="block w-full py-3 bg-blue-600 hover:bg-blue-700 text-white text-center rounded-xl transition shadow-lg shadow-blue-500/30 font-semibold relative z-10 animate-pulse">
                    Isi Biodata Sekarang
                </a>
            @endif
        </div>

        <!-- CARD 2: PEMBAYARAN -->
        <div class="bg-white dark:bg-slate-800 p-6 rounded-2xl shadow-lg border border-slate-200 dark:border-slate-700 flex flex-col h-full relative overflow-hidden transition opacity-60">
            <div class="flex items-center justify-between mb-6 relative z-10">
                <h3 class="text-xl font-bold text-slate-900 dark:text-white flex items-center">
                    <span class="bg-slate-100 dark:bg-slate-700 w-8 h-8 rounded-full flex items-center justify-center text-sm mr-3">2</span>
                    Pembayaran
                </h3>

                @if($calon && $pembayaran)
                    @if($pembayaran->status_bayar === 'lunas')
                        <span class="px-3 py-1 text-xs font-bold rounded-full bg-green-100 text-green-700">
                            LUNAS
                        </span>
                    @elseif($pembayaran->status_bayar === 'ditolak')
                        <span class="px-3 py-1 text-xs font-bold rounded-full bg-red-100 text-red-700">
                            DITOLAK
                        </span>
                    @else
                        <span class="px-3 py-1 text-xs font-bold rounded-full bg-yellow-100 text-yellow-700">
                            MENUNGGU
                        </span>
                    @endif
                @elseif($calon)
                    <span class="px-3 py-1 text-xs font-bold rounded-full bg-slate-100 text-slate-600">
                        BELUM BAYAR
                    </span>
                @else
                    <span class="px-3 py-1 text-xs font-bold rounded-full bg-slate-100 text-slate-600">
                        TERKUNCI
                    </span>
                @endif
            </div>

            @if($calon && $user->is_active)
                @if($pembayaran)
                    {{-- Bisa dibedakan lagi kalau mau: pending / lunas / ditolak --}}
                    <button disabled
                            class="w-full py-2.5 bg-slate-100 text-slate-500 rounded-xl cursor-not-allowed">
                        Bukti Terkirim
                    </button>
                @else
                    <p class="text-slate-500 mb-8">
                        Lakukan pembayaran biaya pendaftaran.
                    </p>
                    <a href="{{ route('pembayaran.create') }}"
                       class="block w-full py-3 bg-green-600 text-white text-center rounded-xl shadow-lg">
                        Upload Bukti Bayar
                    </a>
                @endif
            @else
                <p class="text-slate-500 dark:text-slate-400 mb-8 flex-grow relative z-10">
                    @if(!$user->is_active)
                        Menunggu aktivasi akun oleh admin.
                    @else
                        Selesaikan biodata terlebih dahulu.
                    @endif
                </p>
                <button disabled
                        class="w-full py-2.5 bg-slate-100 dark:bg-slate-700 text-slate-400 rounded-xl cursor-not-allowed font-medium relative z-10">
                    Akses Terkunci
                </button>
            @endif
        </div>

    </div>
</div>
@endsection
