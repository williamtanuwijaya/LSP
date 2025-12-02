@extends('layouts.app')

@section('title', 'Pembayaran')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="bg-white dark:bg-slate-800 shadow-2xl rounded-2xl overflow-hidden border border-slate-200 dark:border-slate-700">
        <div class="px-8 py-6 border-b border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-900/50">
            <h2 class="text-2xl font-bold text-slate-900 dark:text-white">Konfirmasi Pembayaran</h2>
            <p class="text-slate-500 dark:text-slate-400 text-sm">Biaya Pendaftaran: <span class="font-bold text-blue-600">Rp 250.000</span></p>
        </div>

        <form action="{{ route('pembayaran.store') }}" method="POST" enctype="multipart/form-data" class="p-8 space-y-6">
            @csrf
            
            <div class="p-4 bg-blue-50 dark:bg-blue-900/20 rounded-lg border border-blue-100 dark:border-blue-800 mb-6">
                <p class="text-sm text-blue-800 dark:text-blue-300 text-center">
                    Silakan transfer ke <strong>Bank BCA 123-456-7890</strong><br>
                    a.n Yayasan Ucok University
                </p>
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">Upload Bukti Transfer (JPG/PNG)</label>
                <input type="file" name="bukti_bayar" class="w-full text-sm text-slate-500 dark:text-slate-400
                    file:mr-4 file:py-2 file:px-4
                    file:rounded-full file:border-0
                    file:text-sm file:font-semibold
                    file:bg-blue-50 file:text-blue-700
                    hover:file:bg-blue-100 dark:file:bg-blue-900 dark:file:text-blue-300
                " required>
            </div>

            <div class="pt-4">
                <button type="submit" class="w-full py-3 bg-green-600 hover:bg-green-700 text-white font-bold rounded-xl transition shadow-lg shadow-green-500/40">
                    Kirim Bukti Pembayaran
                </button>
            </div>
        </form>
    </div>
</div>
@endsection