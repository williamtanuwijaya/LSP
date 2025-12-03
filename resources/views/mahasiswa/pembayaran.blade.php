@extends('layouts.app')

@section('title', 'Pembayaran Pendaftaran')

@section('content')
<div class="max-w-2xl mx-auto">
    
    <!-- Tombol Kembali -->
    <div class="mb-6">
        <a href="{{ route('dashboard') }}" class="text-slate-500 hover:text-blue-600 dark:text-slate-400 dark:hover:text-blue-400 flex items-center gap-2 transition">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Kembali ke Dashboard
        </a>
    </div>

    <!-- Info Rekening Card -->
    <div class="bg-white dark:bg-slate-800 shadow-xl rounded-2xl overflow-hidden border border-slate-200 dark:border-slate-700 mb-8">
        <div class="p-6 md:p-8 text-center">
            <div class="w-16 h-16 bg-blue-100 dark:bg-blue-900/50 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                </svg>
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

    <!-- Form Upload Wrapper (Relative diperlukan untuk overlay) -->
    <div class="bg-white dark:bg-slate-800 shadow-xl rounded-2xl overflow-hidden border border-slate-200 dark:border-slate-700 relative">
        
        <div class="bg-slate-50 dark:bg-slate-900/50 px-6 py-4 border-b border-slate-200 dark:border-slate-700">
            <h3 class="font-bold text-slate-900 dark:text-white">Konfirmasi Pembayaran</h3>
        </div>
        
        <form id="pembayaran-form" action="{{ route('pembayaran.store') }}" method="POST" enctype="multipart/form-data" class="p-6 md:p-8">
            @csrf
            
            <div class="mb-6">
                <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-3">Upload Bukti Transfer</label>
                
                <div class="flex flex-col items-center justify-center w-full">
                    <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-48 border-2 border-slate-300 dark:border-slate-600 border-dashed rounded-2xl cursor-pointer bg-slate-50 dark:bg-slate-900 hover:bg-slate-100 dark:hover:bg-slate-800 transition group">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <svg class="w-10 h-10 mb-3 text-slate-400 group-hover:text-blue-500 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                            </svg>
                            <p class="mb-2 text-sm text-slate-500 dark:text-slate-400">
                                <span class="font-semibold">Klik untuk upload</span> atau drag and drop
                            </p>
                            <p class="text-xs text-slate-500 dark:text-slate-400">
                                PNG, JPG atau JPEG (MAX. 2MB)
                            </p>
                        </div>
                        <input id="dropzone-file" type="file" name="bukti_bayar" class="hidden" accept="image/*" required />
                    </label>

                    <!-- Preview Nama File -->
                    <p id="file-name" class="mt-3 text-sm text-blue-600 dark:text-blue-400 font-medium hidden flex items-center animate-pulse">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span id="file-name-text"></span>
                    </p>

                    <!-- Preview Gambar -->
                    <div id="image-preview" class="mt-4 hidden w-full">
                        <img id="preview-img"
                             class="w-full max-h-64 object-contain rounded-xl border border-slate-300 dark:border-slate-700 shadow-md"
                             alt="Preview Bukti Transfer">
                    </div>
                </div>
            </div>

            <button id="submit-btn" type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-8 rounded-xl shadow-lg shadow-green-500/30 transition transform hover:-translate-y-1 flex items-center justify-center">
                <span>Kirim Bukti Pembayaran</span>
            </button>
        </form>

        <!-- Overlay Loading (Hidden by default) -->
        <div id="upload-overlay" class="hidden absolute inset-0 bg-white/90 dark:bg-slate-900/90 flex flex-col items-center justify-center z-50 backdrop-blur-sm">
            <div class="relative">
                <div class="w-16 h-16 border-4 border-slate-200 dark:border-slate-700 border-t-green-500 rounded-full animate-spin"></div>
                <div class="absolute inset-0 flex items-center justify-center">
                    <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                    </svg>
                </div>
            </div>
            <h3 class="mt-4 text-lg font-bold text-slate-800 dark:text-white animate-pulse">Mengirim Data...</h3>
            <p class="text-sm text-slate-500 dark:text-slate-400">Mohon jangan tutup halaman ini.</p>
        </div>

    </div>
</div>

<!-- JAVASCRIPT LOGIC -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const fileInput    = document.getElementById('dropzone-file');
        const fileNameEl   = document.getElementById('file-name');
        const fileNameTxt  = document.getElementById('file-name-text');
        const form         = document.getElementById('pembayaran-form');
        const submitBtn    = document.getElementById('submit-btn');
        const overlay      = document.getElementById('upload-overlay');
        const imgPreview   = document.getElementById('image-preview');
        const previewImg   = document.getElementById('preview-img');

        // 1. Tampilkan Nama File + Preview Gambar saat dipilih
        fileInput.addEventListener('change', function() {
            if (this.files && this.files[0]) {
                const file = this.files[0];

                // Tampilkan nama file
                fileNameTxt.textContent = file.name;
                fileNameEl.classList.remove('hidden');

                // Validasi sederhana: pastikan file adalah gambar
                if (!file.type.startsWith('image/')) {
                    fileNameTxt.textContent = 'File harus berupa gambar (PNG, JPG, JPEG)';
                    imgPreview.classList.add('hidden');
                    previewImg.removeAttribute('src');
                    this.value = '';
                    return;
                }

                // Preview gambar menggunakan FileReader
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImg.src = e.target.result;
                    imgPreview.classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            } else {
                // Reset jika tidak ada file
                fileNameEl.classList.add('hidden');
                imgPreview.classList.add('hidden');
                previewImg.removeAttribute('src');
            }
        });

        // 2. Animasi saat Submit
        form.addEventListener('submit', function(e) {
            // Cek apakah file sudah dipilih (Validasi JS sederhana)
            if (!fileInput.files || !fileInput.files[0]) {
                // Biarkan validasi HTML5 'required' yang bekerja
                return;
            }

            // Kunci tombol
            submitBtn.disabled = true;
            submitBtn.classList.add('opacity-75', 'cursor-not-allowed');
            submitBtn.classList.remove('hover:-translate-y-1', 'hover:bg-green-700'); // Hilangkan efek hover
            
            // Ubah teks tombol
            submitBtn.innerHTML = `
                <svg class="w-5 h-5 mr-2 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                </svg>
                Memproses...
            `;

            // Tampilkan Overlay Loading
            overlay.classList.remove('hidden');
        });
    });
</script>
@endsection
