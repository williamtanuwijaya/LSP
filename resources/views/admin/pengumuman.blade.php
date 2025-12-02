@extends('layouts.app')

@section('title', 'Kelola Pengumuman')

@section('content')
<div class="max-w-7xl mx-auto relative">
    <div class="flex items-center justify-between mb-8">
        <h1 class="text-3xl font-bold text-slate-900 dark:text-white">Kelola Pengumuman</h1>
    </div>

    @if(session('success'))
        <div class="mb-6 p-4 bg-green-100 dark:bg-green-900/50 text-green-700 dark:text-green-300 rounded-lg border border-green-200 dark:border-green-800">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <!-- FORM TAMBAH (Kiri) -->
        <div class="lg:col-span-1">
            <div class="bg-white dark:bg-slate-800 p-6 rounded-2xl shadow-lg border border-slate-200 dark:border-slate-700 sticky top-24">
                <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-4">Buat Pengumuman Baru</h3>
                <form action="{{ route('admin.pengumuman.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Judul</label>
                        <input type="text" name="judul" class="w-full rounded-lg bg-slate-50 dark:bg-slate-900 border-slate-300 dark:border-slate-600 text-slate-900 dark:text-white focus:ring-blue-500 focus:border-blue-500" required placeholder="Contoh: Jadwal Ujian...">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Isi Pengumuman</label>
                        <textarea name="isi" rows="4" class="w-full rounded-lg bg-slate-50 dark:bg-slate-900 border-slate-300 dark:border-slate-600 text-slate-900 dark:text-white focus:ring-blue-500 focus:border-blue-500" required placeholder="Tulis detail pengumuman disini..."></textarea>
                    </div>
                    <button type="submit" class="w-full py-2 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-lg transition shadow-lg shadow-blue-500/30">Terbitkan</button>
                </form>
            </div>
        </div>

        <!-- LIST PENGUMUMAN (Kanan) -->
        <div class="lg:col-span-2 space-y-4">
            @foreach($pengumuman as $item)
            <div class="bg-white dark:bg-slate-800 p-6 rounded-2xl shadow-md border border-slate-200 dark:border-slate-700 flex flex-col md:flex-row justify-between items-start gap-4">
                <div class="flex-grow">
                    <div class="flex items-center gap-2 mb-1">
                        <h4 class="text-lg font-bold text-slate-900 dark:text-white">{{ $item->judul }}</h4>
                        @if($loop->first)
                            <span class="bg-green-100 text-green-800 text-xs font-bold px-2 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Terbaru</span>
                        @endif
                    </div>
                    <p class="text-xs text-slate-500 dark:text-slate-400 mb-3">Dibuat: {{ $item->created_at->format('d M Y, H:i') }}</p>
                    <p class="text-slate-700 dark:text-slate-300 text-sm whitespace-pre-line">{{ $item->isi }}</p>
                </div>
                
                <div class="flex items-center gap-2 flex-shrink-0">
                    <!-- Tombol Edit (Memicu Modal) -->
                    <button 
                        onclick="openEditModal(this)"
                        data-id="{{ $item->id }}"
                        data-judul="{{ $item->judul }}"
                        data-isi="{{ $item->isi }}"
                        class="text-yellow-600 hover:text-yellow-800 font-bold text-xs bg-yellow-50 hover:bg-yellow-100 border border-yellow-200 px-3 py-2 rounded-lg transition">
                        Edit
                    </button>

                    <!-- Tombol Hapus -->
                    <form action="{{ route('admin.pengumuman.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus pengumuman ini?')">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-600 hover:text-red-800 font-bold text-xs bg-red-50 hover:bg-red-100 border border-red-200 px-3 py-2 rounded-lg transition">Hapus</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- MODAL EDIT (Hidden by default) -->
    <div id="editModal" class="fixed inset-0 z-50 hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <!-- Backdrop -->
        <div class="fixed inset-0 bg-slate-900/75 transition-opacity" onclick="closeEditModal()"></div>

        <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
            <div class="relative transform overflow-hidden rounded-2xl bg-white dark:bg-slate-800 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg border border-slate-200 dark:border-slate-700">
                
                <!-- Modal Header -->
                <div class="bg-white dark:bg-slate-800 px-4 pb-4 pt-5 sm:p-6 sm:pb-4 border-b border-slate-100 dark:border-slate-700">
                    <h3 class="text-xl font-bold leading-6 text-slate-900 dark:text-white" id="modal-title">Edit Pengumuman</h3>
                </div>

                <!-- Modal Body (Form) -->
                <form id="editForm" method="POST" class="p-6 space-y-4">
                    @csrf
                    @method('PATCH') <!-- Method Patch untuk Update -->
                    
                    <div>
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Judul</label>
                        <input type="text" id="editJudul" name="judul" class="w-full rounded-lg bg-slate-50 dark:bg-slate-900 border-slate-300 dark:border-slate-600 text-slate-900 dark:text-white focus:ring-blue-500 focus:border-blue-500" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Isi Pengumuman</label>
                        <textarea id="editIsi" name="isi" rows="5" class="w-full rounded-lg bg-slate-50 dark:bg-slate-900 border-slate-300 dark:border-slate-600 text-slate-900 dark:text-white focus:ring-blue-500 focus:border-blue-500" required></textarea>
                    </div>

                    <div class="mt-5 sm:mt-6 sm:grid sm:grid-flow-row-dense sm:grid-cols-2 sm:gap-3">
                        <button type="submit" class="inline-flex w-full justify-center rounded-lg bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 sm:col-start-2">Simpan Perubahan</button>
                        <button type="button" onclick="closeEditModal()" class="mt-3 inline-flex w-full justify-center rounded-lg bg-white dark:bg-slate-700 px-3 py-2 text-sm font-semibold text-slate-900 dark:text-white shadow-sm ring-1 ring-inset ring-slate-300 dark:ring-slate-600 hover:bg-slate-50 dark:hover:bg-slate-600 sm:col-start-1 sm:mt-0">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

<!-- SCRIPT UNTUK MODAL -->
<script>
    function openEditModal(button) {
        // 1. Ambil data dari tombol yang diklik
        const id = button.getAttribute('data-id');
        const judul = button.getAttribute('data-judul');
        const isi = button.getAttribute('data-isi');

        // 2. Isi form di dalam modal
        document.getElementById('editJudul').value = judul;
        document.getElementById('editIsi').value = isi;

        // 3. Update Action URL Form agar mengarah ke ID yang benar
        // Format Route: /admin/pengumuman/{id}
        const form = document.getElementById('editForm');
        form.action = '/admin/pengumuman/' + id;

        // 4. Tampilkan Modal
        document.getElementById('editModal').classList.remove('hidden');
    }

    function closeEditModal() {
        document.getElementById('editModal').classList.add('hidden');
    }
</script>
@endsection