    @extends('layouts.app')

    @section('title', 'Dashboard Mahasiswa')

    @section('content')
    <div class="max-w-5xl mx-auto space-y-8">

        @php
            $user        = Auth::user();
            $statusAkun  = $user->is_active ? 'active' : 'pending'; // Simplifikasi
            $calon       = $user->calonMahasiswa;
            $pembayaran  = $calon?->pembayaran;
            
            // Cek apakah biodata sudah di-ACC admin?
            $biodataIsVerified = $calon && $calon->status_pendaftaran == 'verified';
        @endphp

        <!-- 1. HEADER WELCOME -->
        <div class="bg-gradient-to-r from-blue-600 to-indigo-700 rounded-2xl p-8 text-white shadow-xl relative overflow-hidden">
            <div class="relative z-10">
                <h1 class="text-3xl font-bold mb-2">Selamat Datang, {{ $user->name }}!</h1>
                <p class="text-blue-100 max-w-xl">
                    Ini adalah pusat kontrol pendaftaran Anda. 
                </p>
            </div>
            <div class="absolute top-0 right-0 -mt-10 -mr-10 w-40 h-40 bg-white opacity-10 rounded-full blur-2xl"></div>
        </div>

        <!-- 2. ALERT STATUS AKUN -->
        @if(!$user->is_active)
            <div class="p-6 bg-yellow-50 dark:bg-yellow-900/30 border-l-4 border-yellow-400 dark:border-yellow-600 rounded-r-xl shadow-sm flex items-start">
                <div class="flex-shrink-0">
                    <svg class="h-6 w-6 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                    </svg>
                </div>
                <div class="ml-4">
                    <h3 class="text-lg font-medium text-yellow-800 dark:text-yellow-200">Akun Menunggu Aktivasi</h3>
                    <p class="mt-1 text-sm text-yellow-700 dark:text-yellow-300">
                        Akun Anda sedang diverifikasi oleh Admin. <strong>Anda baru bisa mengisi biodata setelah akun diaktifkan.</strong>
                    </p>
                </div>
            </div>
        @endif

        <!-- Alert Notifikasi -->
        @if(session('success'))
            <div class="p-4 bg-green-100 dark:bg-green-900/50 text-green-700 dark:text-green-300 rounded-xl border border-green-200 dark:border-green-800 flex items-center shadow-sm">
                {{ session('success') }}
            </div>
        @endif

        <!-- 3. GRID STATUS PENDAFTARAN -->
        <div class="grid md:grid-cols-2 gap-8">
            
            <!-- ============================================== -->
            <!-- CARD 1: BIODATA DIRI -->
            <!-- ============================================== -->
            <div class="bg-white dark:bg-slate-800 p-6 rounded-2xl shadow-lg border border-slate-200 dark:border-slate-700 flex flex-col h-full relative overflow-hidden transition {{ !$user->is_active ? 'opacity-75 grayscale-[0.5]' : '' }}">
                
                <div class="flex items-center justify-between mb-6 relative z-10">
                    <h3 class="text-xl font-bold text-slate-900 dark:text-white flex items-center">
                        <span class="bg-slate-100 dark:bg-slate-700 w-8 h-8 rounded-full flex items-center justify-center text-sm mr-3">1</span>
                        Biodata Diri
                    </h3>
                    
                    @if(!$user->is_active)
                        <span class="px-3 py-1 text-xs font-bold rounded-full bg-slate-100 text-slate-600 border border-slate-200">TERKUNCI</span>
                    @elseif($calon)
                        @php
                            $statusClass = match($calon->status_pendaftaran) {
                                'verified' => 'bg-green-100 text-green-700 border-green-200',
                                'rejected' => 'bg-red-100 text-red-700 border-red-200',
                                default    => 'bg-yellow-100 text-yellow-700 border-yellow-200',
                            };
                        @endphp
                        <span class="px-3 py-1 text-xs font-bold rounded-full border {{ $statusClass }}">
                            {{ strtoupper($calon->status_pendaftaran) }}
                        </span>
                    @else
                        <span class="px-3 py-1 text-xs font-bold rounded-full bg-slate-100 text-slate-600 border border-slate-200">BELUM DIISI</span>
                    @endif
                </div>

                @if(!$user->is_active)
                    <p class="text-slate-500 dark:text-slate-400 mb-8 flex-grow relative z-10">
                        Menunggu aktivasi akun oleh admin.
                    </p>
                    <button disabled class="w-full py-3 bg-slate-200 dark:bg-slate-700 text-slate-500 rounded-xl cursor-not-allowed font-semibold relative z-10">
                        Terkunci
                    </button>

                @elseif($calon)
                    <div class="space-y-3 text-sm text-slate-600 dark:text-slate-300 mb-8 flex-grow relative z-10 bg-slate-50 dark:bg-slate-700/50 p-4 rounded-lg">
                        <div class="flex justify-between"><span class="text-slate-500">NISN:</span> <span class="font-semibold">{{ $calon->nisn }}</span></div>
                        <div class="flex justify-between"><span class="text-slate-500">Prodi:</span> <span class="font-semibold">{{ $calon->prodi_pilihan }}</span></div>
                        
                        <!-- Pesan jika ditolak -->
                        @if($calon->status_pendaftaran == 'rejected')
                            <div class="mt-2 pt-2 border-t border-slate-200 dark:border-slate-600 text-red-600 dark:text-red-400 text-xs font-bold">
                                Biodata ditolak. Harap hubungi admin untuk revisi.
                            </div>
                        @endif
                    </div>
                    
                    @if($calon->status_pendaftaran == 'verified')
                        <button disabled class="w-full py-2.5 bg-green-50 text-green-600 border border-green-200 rounded-xl cursor-not-allowed font-medium flex items-center justify-center">
                            ✓ Biodata Valid
                        </button>
                    @else
                        <button disabled class="w-full py-2.5 bg-yellow-50 text-yellow-600 border border-yellow-200 rounded-xl cursor-not-allowed font-medium flex items-center justify-center">
                            Menunggu Verifikasi
                        </button>
                    @endif

                @else
                    <p class="text-slate-500 dark:text-slate-400 mb-8 flex-grow relative z-10">
                        Akun aktif! Silakan lengkapi data diri sekarang.
                    </p>
                    <a href="{{ route('biodata.create') }}" class="block w-full py-3 bg-blue-600 hover:bg-blue-700 text-white text-center rounded-xl transition shadow-lg shadow-blue-500/30 font-semibold relative z-10 animate-pulse">
                        Isi Biodata Sekarang
                    </a>
                @endif
            </div>

            <!-- ============================================== -->
            <!-- CARD 2: PEMBAYARAN -->
            <!-- ============================================== -->
            {{-- Opacity dikurangi jika biodata belum Verified --}}
            <div class="bg-white dark:bg-slate-800 p-6 rounded-2xl shadow-lg border border-slate-200 dark:border-slate-700 flex flex-col h-full relative overflow-hidden transition {{ !$biodataIsVerified ? 'opacity-60 grayscale-[0.8]' : '' }}">
                
                <div class="flex items-center justify-between mb-6 relative z-10">
                    <h3 class="text-xl font-bold text-slate-900 dark:text-white flex items-center">
                        <span class="bg-slate-100 dark:bg-slate-700 w-8 h-8 rounded-full flex items-center justify-center text-sm mr-3">2</span>
                        Pembayaran
                    </h3>

                    @if($biodataIsVerified && $pembayaran)
                        @if($pembayaran->status_bayar == 'lunas')
                            <span class="px-3 py-1 text-xs font-bold rounded-full bg-green-100 text-green-700 border border-green-200">LUNAS</span>
                        @elseif($pembayaran->status_bayar == 'ditolak')
                            <span class="px-3 py-1 text-xs font-bold rounded-full bg-red-100 text-red-700 border border-red-200">DITOLAK</span>
                        @else
                            <span class="px-3 py-1 text-xs font-bold rounded-full bg-yellow-100 text-yellow-700 border border-yellow-200">MENUNGGU</span>
                        @endif
                    @else
                        <span class="px-3 py-1 text-xs font-bold rounded-full bg-slate-100 text-slate-600 border border-slate-200">TERKUNCI</span>
                    @endif
                </div>

                <!-- LOGIC UTAMA: HANYA BUKA JIKA BIODATA SUDAH VERIFIED -->
                @if($biodataIsVerified)
                    
                    {{-- Jika Sudah Upload --}}
                    @if($pembayaran)
                        <div class="space-y-3 text-sm text-slate-600 dark:text-slate-300 mb-8 flex-grow relative z-10 bg-slate-50 dark:bg-slate-700/50 p-4 rounded-lg">
                            <div class="flex justify-between">
                                <span class="text-slate-500">Nominal:</span>
                                <span class="font-bold text-blue-600">Rp {{ number_format($pembayaran->jumlah_bayar) }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-slate-500">Tanggal:</span>
                                <span>{{ \Carbon\Carbon::parse($pembayaran->tanggal_bayar)->format('d M Y') }}</span>
                            </div>
                        </div>

                        @if($pembayaran->status_bayar == 'ditolak')
                            <a href="{{ route('pembayaran.create') }}" class="block w-full py-3 bg-red-600 hover:bg-red-700 text-white text-center rounded-xl transition shadow-lg shadow-red-500/30 font-semibold relative z-10">
                                Upload Ulang Bukti
                            </a>
                        @elseif($pembayaran->status_bayar == 'lunas')
                            <button disabled class="w-full py-2.5 bg-green-50 text-green-600 border border-green-200 rounded-xl cursor-not-allowed font-medium flex items-center justify-center">
                                ✓ Pembayaran Selesai
                            </button>
                        @else
                            <button disabled class="w-full py-2.5 bg-slate-100 text-slate-500 rounded-xl cursor-not-allowed font-medium flex items-center justify-center">
                                Bukti Terkirim
                            </button>
                        @endif

                    {{-- Jika Belum Upload (Tapi Biodata Sudah Verif) --}}
                    @else
                        <p class="text-slate-500 dark:text-slate-400 mb-8 flex-grow relative z-10">
                            Biodata Anda telah diverifikasi! <br> Silakan lakukan pembayaran sebesar <strong>Rp 250.000</strong>.
                        </p>
                        <a href="{{ route('pembayaran.create') }}" class="block w-full py-3 bg-green-600 hover:bg-green-700 text-white text-center rounded-xl transition shadow-lg shadow-green-500/30 font-semibold relative z-10 animate-bounce">
                            Upload Bukti Bayar
                        </a>
                    @endif

                @else
                    <!-- LOGIC JIKA BIODATA BELUM VERIFIED -->
                    <p class="text-slate-500 dark:text-slate-400 mb-8 flex-grow relative z-10">
                        @if(!$calon)
                            Silakan lengkapi biodata terlebih dahulu.
                        @elseif($calon->status_pendaftaran == 'pending')
                            Menunggu biodata divalidasi oleh admin.
                        @elseif($calon->status_pendaftaran == 'rejected')
                            Biodata ditolak. Pembayaran ditangguhkan.
                        @endif
                    </p>
                    <button disabled class="w-full py-2.5 bg-slate-100 dark:bg-slate-700 text-slate-400 rounded-xl cursor-not-allowed font-medium relative z-10">
                        Akses Terkunci
                    </button>
                @endif
            </div>

        </div>
    </div>
    @endsection