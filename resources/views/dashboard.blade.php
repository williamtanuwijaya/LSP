@extends('layouts.app')

@section('title', 'Dashboard Mahasiswa')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">

    <div class="bg-gradient-to-r from-blue-600 to-indigo-700 rounded-2xl p-8 text-white shadow-xl relative overflow-hidden">
        <div class="relative z-10">
            <h1 class="text-3xl font-bold mb-2">Selamat Datang, Calon Mahasiswa!</h1>
            <p class="text-blue-100">Lengkapi tahapan di bawah ini untuk menjadi bagian dari Ucok University.</p>
        </div>
        <div class="absolute top-0 right-0 -mt-10 -mr-10 w-40 h-40 bg-white opacity-10 rounded-full blur-2xl"></div>
    </div>

    @if(session('success'))
        <div class="p-4 bg-green-100 dark:bg-green-900 text-green-700 dark:text-green-300 rounded-lg border border-green-200 dark:border-green-800">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid md:grid-cols-2 gap-6">
        
        <div class="bg-white dark:bg-slate-800 p-6 rounded-xl shadow-lg border border-slate-200 dark:border-slate-700 flex flex-col h-full">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-xl font-bold text-slate-900 dark:text-white">1. Biodata Diri</h3>
                @if(Auth::user()->calonMahasiswa)
                    <span class="px-3 py-1 text-xs font-bold rounded-full 
                        {{ Auth::user()->calonMahasiswa->status_pendaftaran == 'verified' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                        {{ strtoupper(Auth::user()->calonMahasiswa->status_pendaftaran) }}
                    </span>
                @else
                    <span class="px-3 py-1 text-xs font-bold rounded-full bg-slate-100 text-slate-600">BELUM DIISI</span>
                @endif
            </div>

            @if(Auth::user()->calonMahasiswa)
                <div class="space-y-2 text-sm text-slate-600 dark:text-slate-400 mb-6 flex-grow">
                    <p><strong>NISN:</strong> {{ Auth::user()->calonMahasiswa->nisn }}</p>
                    <p><strong>Prodi:</strong> {{ Auth::user()->calonMahasiswa->prodi_pilihan }}</p>
                    <p><strong>Sekolah:</strong> {{ Auth::user()->calonMahasiswa->asal_sekolah }}</p>
                </div>
                <button disabled class="w-full py-2 bg-slate-100 dark:bg-slate-700 text-slate-400 rounded-lg cursor-not-allowed font-medium">Data Tersimpan</button>
            @else
                <p class="text-slate-500 dark:text-slate-400 mb-6 flex-grow">Lengkapi data diri, asal sekolah, dan pilih program studi Anda.</p>
                <a href="{{ route('biodata.create') }}" class="block w-full py-2 bg-blue-600 hover:bg-blue-700 text-white text-center rounded-lg transition shadow-lg shadow-blue-500/30">Isi Biodata Sekarang</a>
            @endif
        </div>

        <div class="bg-white dark:bg-slate-800 p-6 rounded-xl shadow-lg border border-slate-200 dark:border-slate-700 flex flex-col h-full opacity-{{ Auth::user()->calonMahasiswa ? '100' : '50' }}">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-xl font-bold text-slate-900 dark:text-white">2. Pembayaran</h3>
                @if(Auth::user()->calonMahasiswa && Auth::user()->calonMahasiswa->pembayaran)
                    <span class="px-3 py-1 text-xs font-bold rounded-full 
                        {{ Auth::user()->calonMahasiswa->pembayaran->status_bayar == 'lunas' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                        {{ strtoupper(Auth::user()->calonMahasiswa->pembayaran->status_bayar) }}
                    </span>
                @else
                     <span class="px-3 py-1 text-xs font-bold rounded-full bg-slate-100 text-slate-600">MENUNGGU</span>
                @endif
            </div>

            @if(!Auth::user()->calonMahasiswa)
                <p class="text-slate-500 dark:text-slate-400 mb-6 flex-grow">Silakan lengkapi biodata terlebih dahulu sebelum melakukan pembayaran.</p>
                <button disabled class="w-full py-2 bg-slate-100 dark:bg-slate-700 text-slate-400 rounded-lg cursor-not-allowed">Terkunci</button>
            @elseif(Auth::user()->calonMahasiswa->pembayaran)
                 <div class="space-y-2 text-sm text-slate-600 dark:text-slate-400 mb-6 flex-grow">
                    <p><strong>Jumlah:</strong> Rp {{ number_format(Auth::user()->calonMahasiswa->pembayaran->jumlah_bayar) }}</p>
                    <p><strong>Tanggal:</strong> {{ Auth::user()->calonMahasiswa->pembayaran->tanggal_bayar }}</p>
                </div>
                <button disabled class="w-full py-2 bg-slate-100 dark:bg-slate-700 text-slate-400 rounded-lg cursor-not-allowed">Bukti Terkirim</button>
            @else
                <p class="text-slate-500 dark:text-slate-400 mb-6 flex-grow">Upload bukti transfer pendaftaran untuk diverifikasi admin.</p>
                <a href="{{ route('pembayaran.create') }}" class="block w-full py-2 bg-blue-600 hover:bg-blue-700 text-white text-center rounded-lg transition shadow-lg shadow-blue-500/30">Upload Bukti Bayar</a>
            @endif
        </div>

    </div>
</div>
@endsection