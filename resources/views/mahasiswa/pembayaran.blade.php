@extends('layouts.app')

@section('title', 'Pembayaran Pendaftaran')

@section('content')
<div class="max-w-2xl mx-auto">
    
    <!-- Tombol Kembali -->
    <div class="mb-6">
        <a href="{{ route('dashboard') }}" class="text-slate-500 hover:text-blue-600 dark:text-slate-400 dark:hover:text-blue-400 flex items-center gap-2 transition">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Kembali ke Dashboard
        </a>
    </div>

    <!-- Info Rekening Card -->
    <div class="bg-white dark:bg-slate-800 shadow-xl rounded-2xl overflow-hidden border border-slate-200 dark:border-slate-700 mb-8">
        <div class="p-6 md:p-8 text-center">
            <div class="w-16 h-16 bg-blue-100 dark:bg-blue-900/50 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
            </div>
            <h2 class="text-2xl font-bold text-slate-900 dark:text-white mb-2">Instruksi Pembayaran</h2>
            <p class="text-slate-500 dark:text-slate-400 mb-6">Silakan lakukan transfer biaya pendaftaran sebesar:</p>
            
            <div class="bg-slate-50 dark:bg-slate-900 rounded-xl p-6 border border-slate-200 dark:border-slate-700 inline-block w-full max-w-sm">
                <span class="block text-3xl font-extrabold text-blue-600 dark:text-blue-400 mb-1">Rp 250.000</span>
                <span class="text-xs text-slate-400 uppercase tracking-widest">Biaya Registrasi</span>
                
                <div class="my-4 border-t border-slate-200 dark:border-slate-700"></div>
                
                <div class="text-left space-y-3">
                    <div class="flex justify-between">
                        <span class="text-slate-500 dark:text-slate-400">Bank:</span>
                        <span class="font-bold text-slate-900 dark:text-white">BCA (Bank Central Asia)</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-slate-500 dark:text-slate-400">No. Rekening:</span>
                        <span class="font-bold text-slate-900 dark:text-white font-mono text-lg">123-456-7890</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-slate-500 dark:text-slate-400">Atas Nama:</span>
                        <span class="font-bold text-slate-900 dark:text-white">Yayasan Ucok University</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Form Upload -->
    <div class="bg-white dark:bg-slate-800 shadow-xl rounded-2xl overflow-hidden border border-slate-200 dark:border-slate-700">
        <div class="bg-slate-50 dark:bg-slate-900/50 px-6 py-4 border-b border-slate-200 dark:border-slate-700">
            <h3 class="font-bold text-slate-900 dark:text-white">Konfirmasi Pembayaran</h3>
        </div>
        
        <form action="{{ route('pembayaran.store') }}" method="POST" enctype="multipart/form-data" class="p-6 md:p-8">
            @csrf
            
            <div class="mb-6">
                <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-3">Upload Bukti Transfer</label>
                
                <div class="flex items-center justify-center w-full">
                    <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-48 border-2 border-slate-300 dark:border-slate-600 border-dashed rounded-2xl cursor-pointer bg-slate-50 dark:bg-slate-900 hover:bg-slate-100 dark:hover:bg-slate-800 transition">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <svg class="w-10 h-10 mb-3 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                            <p class="mb-2 text-sm text-slate-500 dark:text-slate-400"><span class="font-semibold">Klik untuk upload</span> atau drag and drop</p>
                            <p class="text-xs text-slate-500 dark:text-slate-400">PNG, JPG or JPEG (MAX. 2MB)</p>
                        </div>
                        <input id="dropzone-file" type="file" name="bukti_bayar" class="hidden" required />
                    </label>
                </div>
            </div>

            <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-8 rounded-xl shadow-lg shadow-green-500/30 transition transform hover:-translate-y-1">
                Kirim Bukti Pembayaran
            </button>
        </form>
    </div>

</div>

<!-- Script Preview Nama File -->
<script>
    const fileInput = document.getElementById('dropzone-file');
    fileInput.addEventListener('change', function() {
        if (this.files && this.files[0]) {
            alert('File terpilih: ' + this.files[0].name);
        }
    });
</script>
@endsection