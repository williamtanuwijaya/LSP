@extends('layouts.app')

@section('title', 'Dashboard Mahasiswa')

@section('content')
<div class="max-w-5xl mx-auto space-y-8">

    <div class="bg-gradient-to-r from-blue-600 to-indigo-700 rounded-2xl p-8 text-white shadow-xl relative overflow-hidden">
        <div class="relative z-10">
            <h1 class="text-3xl font-bold mb-2">Selamat Datang, {{ Auth::user()->name }}!</h1>
            <p class="text-blue-100 max-w-xl">
                Ini adalah pusat kontrol pendaftaran Anda. Silakan lengkapi biodata dan lakukan pembayaran untuk melanjutkan proses seleksi di Ucok University.
            </p>
        </div>
        <div class="absolute top-0 right-0 -mt-10 -mr-10 w-40 h-40 bg-white opacity-10 rounded-full blur-2xl"></div>
        <div class="absolute bottom-0 right-20 -mb-10 w-20 h-20 bg-blue-400 opacity-20 rounded-full blur-xl"></div>
    </div>

    @if(session('success'))
        <div class="p-4 bg-green-100 dark:bg-green-900/50 text-green-700 dark:text-green-300 rounded-xl border border-green-200 dark:border-green-800 flex items-center shadow-sm">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="p-4 bg-red-100 dark:bg-red-900/50 text-red-700 dark:text-red-300 rounded-xl border border-red-200 dark:border-red-800 flex items-center shadow-sm">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            {{ session('error') }}
        </div>
    @endif

    @if($pengumuman->count() > 0)
    <section>
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-xl font-bold text-slate-800 dark:text-white flex items-center">
                <span class="bg-blue-600 w-1 h-6 rounded-full mr-3"></span>
                Pengumuman Terbaru
            </h2>
        </div>
        
        <div class="grid gap-6 md:grid-cols-3">
            @foreach($pengumuman as $info)
            <div class="bg-white dark:bg-slate-800 p-6 rounded-2xl border border-slate-200 dark:border-slate-700 shadow-sm hover:shadow-md transition duration-300 group">
                <div class="flex items-center mb-3">
                    <span class="bg-blue-100 text-blue-800 text-xs font-bold px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300 group-hover:bg-blue-600 group-hover:text-white transition">INFO</span>
                    <span class="text-slate-400 text-xs ml-auto">{{ $info->created_at->diffForHumans() }}</span>
                </div>
                <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-2 line-clamp-1 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition">{{ $info->judul }}</h3>
                <p class="text-slate-600 dark:text-slate-300 text-sm line-clamp-2">
                    {{ $info->isi }}
                </p>
            </div>
            @endforeach
        </div>
    </section>
    @endif

    <div class="grid md:grid-cols-2 gap-8">
        
        <div class="bg-white dark:bg-slate-800 p-6 rounded-2xl shadow-lg border border-slate-200 dark:border-slate-700 flex flex-col h-full relative overflow-hidden">
            <div class="absolute top-0 right-0 p-4 opacity-10">
                <svg class="w-24 h-24 text-blue-600" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
            </div>

            <div class="flex items-center justify-between mb-6 relative z-10">
                <h3 class="text-xl font-bold text-slate-900 dark:text-white flex items-center">
                    <span class="bg-slate-100 dark:bg-slate-700 w-8 h-8 rounded-full flex items-center justify-center text-sm mr-3">1</span>
                    Biodata Diri
                </h3>
                @if(Auth::user()->calonMahasiswa)
                    @if(Auth::user()->calonMahasiswa->status_pendaftaran == 'verified')
                        <span class="px-3 py-1 text-xs font-bold rounded-full bg-green-100 text-green-700 border border-green-200">VERIFIED</span>
                    @elseif(Auth::user()->calonMahasiswa->status_pendaftaran == 'rejected')
                        <span class="px-3 py-1 text-xs font-bold rounded-full bg-red-100 text-red-700 border border-red-200">REJECTED</span>
                    @else
                        <span class="px-3 py-1 text-xs font-bold rounded-full bg-yellow-100 text-yellow-700 border border-yellow-200">PENDING</span>
                    @endif
                @else
                    <span class="px-3 py-1 text-xs font-bold rounded-full bg-slate-100 text-slate-600 border border-slate-200">BELUM DIISI</span>
                @endif
            </div>

            @if(Auth::user()->calonMahasiswa)
                <div class="space-y-3 text-sm text-slate-600 dark:text-slate-300 mb-8 flex-grow relative z-10 bg-slate-50 dark:bg-slate-700/50 p-4 rounded-lg">
                    <div class="flex justify-between">
                        <span class="text-slate-500 dark:text-slate-400">NISN:</span>
                        <span class="font-semibold">{{ Auth::user()->calonMahasiswa->nisn }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-slate-500 dark:text-slate-400">Prodi:</span>
                        <span class="font-semibold">{{ Auth::user()->calonMahasiswa->prodi_pilihan }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-slate-500 dark:text-slate-400">Asal:</span>
                        <span class="font-semibold">{{ Auth::user()->calonMahasiswa->asal_sekolah }}</span>
                    </div>
                </div>
                <button disabled class="w-full py-2.5 bg-slate-100 dark:bg-slate-700 text-slate-400 dark:text-slate-500 rounded-xl cursor-not-allowed font-medium flex items-center justify-center">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    Data Tersimpan
                </button>
            @else
                <p class="text-slate-500 dark:text-slate-400 mb-8 flex-grow relative z-10">
                    Langkah pertama adalah melengkapi data diri, asal sekolah, dan memilih program studi impian Anda.
                </p>
                <a href="{{ route('biodata.create') }}" class="block w-full py-3 bg-blue-600 hover:bg-blue-700 text-white text-center rounded-xl transition shadow-lg shadow-blue-500/30 font-semibold relative z-10">
                    Isi Biodata Sekarang
                </a>
            @endif
        </div>

        <div class="bg-white dark:bg-slate-800 p-6 rounded-2xl shadow-lg border border-slate-200 dark:border-slate-700 flex flex-col h-full relative overflow-hidden transition-opacity {{ !Auth::user()->calonMahasiswa ? 'opacity-60 grayscale' : 'opacity-100' }}">
             <div class="absolute top-0 right-0 p-4 opacity-10">
                <svg class="w-24 h-24 text-green-600" fill="currentColor" viewBox="0 0 24 24"><path d="M11.8 10.9c-2.27-.59-3-1.2-3-2.15 0-1.09 1.01-1.85 2.7-1.85 1.78 0 2.44.85 2.5 2.1h2.21c-.07-1.72-1.12-3.3-3.21-3.81V3h-3v2.16c-1.94.42-3.5 1.68-3.5 3.61 0 2.31 1.91 3.46 4.7 4.13 2.5.6 3 1.48 3 2.41 0 .69-.49 1.79-2.7 1.79-2.06 0-2.87-.92-2.98-2.1h-2.2c.12 2.19 1.76 3.42 3.68 3.83V21h3v-2.15c1.95-.37 3.5-1.5 3.5-3.55 0-2.84-2.43-3.81-4.7-4.4z"/></svg>
            </div>

            <div class="flex items-center justify-between mb-6 relative z-10">
                <h3 class="text-xl font-bold text-slate-900 dark:text-white flex items-center">
                    <span class="bg-slate-100 dark:bg-slate-700 w-8 h-8 rounded-full flex items-center justify-center text-sm mr-3">2</span>
                    Pembayaran
                </h3>
                @if(Auth::user()->calonMahasiswa && Auth::user()->calonMahasiswa->pembayaran)
                    @if(Auth::user()->calonMahasiswa->pembayaran->status_bayar == 'lunas')
                        <span class="px-3 py-1 text-xs font-bold rounded-full bg-green-100 text-green-700 border border-green-200">LUNAS</span>
                    @elseif(Auth::user()->calonMahasiswa->pembayaran->status_bayar == 'ditolak')
                        <span class="px-3 py-1 text-xs font-bold rounded-full bg-red-100 text-red-700 border border-red-200">DITOLAK</span>
                    @else
                        <span class="px-3 py-1 text-xs font-bold rounded-full bg-yellow-100 text-yellow-700 border border-yellow-200">MENUNGGU</span>
                    @endif
                @else
                     <span class="px-3 py-1 text-xs font-bold rounded-full bg-slate-100 text-slate-600 border border-slate-200">TERKUNCI</span>
                @endif
            </div>

            @if(!Auth::user()->calonMahasiswa)
                <p class="text-slate-500 dark:text-slate-400 mb-8 flex-grow relative z-10">
                    Fitur pembayaran terkunci. Silakan lengkapi biodata diri terlebih dahulu pada langkah 1.
                </p>
                <button disabled class="w-full py-2.5 bg-slate-100 dark:bg-slate-700 text-slate-400 rounded-xl cursor-not-allowed font-medium relative z-10">
                    Akses Terkunci
                </button>
            @elseif(Auth::user()->calonMahasiswa->pembayaran)
                 <div class="space-y-3 text-sm text-slate-600 dark:text-slate-300 mb-8 flex-grow relative z-10 bg-slate-50 dark:bg-slate-700/50 p-4 rounded-lg">
                    <div class="flex justify-between">
                        <span class="text-slate-500 dark:text-slate-400">Nominal:</span>
                        <span class="font-semibold text-blue-600 dark:text-blue-400">Rp {{ number_format(Auth::user()->calonMahasiswa->pembayaran->jumlah_bayar) }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-slate-500 dark:text-slate-400">Tanggal:</span>
                        <span class="font-semibold">{{ \Carbon\Carbon::parse(Auth::user()->calonMahasiswa->pembayaran->tanggal_bayar)->format('d M Y') }}</span>
                    </div>
                </div>
                
                @if(Auth::user()->calonMahasiswa->pembayaran->status_bayar == 'ditolak')
                    <a href="{{ route('pembayaran.create') }}" class="block w-full py-3 bg-red-600 hover:bg-red-700 text-white text-center rounded-xl transition shadow-lg shadow-red-500/30 font-semibold relative z-10">
                        Upload Ulang Bukti
                    </a>
                @else
                    <button disabled class="w-full py-2.5 bg-slate-100 dark:bg-slate-700 text-slate-400 dark:text-slate-500 rounded-xl cursor-not-allowed font-medium relative z-10 flex items-center justify-center">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        Bukti Terkirim
                    </button>
                @endif

            @else
                <p class="text-slate-500 dark:text-slate-400 mb-8 flex-grow relative z-10">
                    Lakukan pembayaran biaya pendaftaran sebesar <strong>Rp 250.000</strong> dan upload bukti transfer.
                </p>
                <a href="{{ route('pembayaran.create') }}" class="block w-full py-3 bg-green-600 hover:bg-green-700 text-white text-center rounded-xl transition shadow-lg shadow-green-500/30 font-semibold relative z-10">
                    Upload Bukti Bayar
                </a>
            @endif
        </div>

    </div>
</div>
@endsection