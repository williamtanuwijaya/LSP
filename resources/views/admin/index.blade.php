@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="max-w-7xl mx-auto space-y-6">

    {{-- ======================== --}}
    {{--  HEADER & QUICK ACTION   --}}
    {{-- ======================== --}}
    <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-slate-900 dark:text-white">
                Panel Admin PMB
            </h1>
            <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">
                Kelola akun, verifikasi biodata, dan konfirmasi pembayaran calon mahasiswa baru.
            </p>
        </div>

        <div class="flex items-center gap-3">
            {{-- Tombol Kelola Pengumuman --}}
            <a href="{{ route('admin.pengumuman.index') }}"
               class="px-4 py-2 bg-white dark:bg-slate-700 border border-slate-200 dark:border-slate-600 text-slate-700 dark:text-white rounded-lg font-semibold hover:bg-slate-50 dark:hover:bg-slate-600 transition flex items-center shadow-sm">
                <span class="mr-2">📢</span>
                Kelola Pengumuman
            </a>

            {{-- Badge Total Pendaftar --}}
            <span class="px-4 py-2 bg-blue-600 text-white rounded-lg font-bold shadow-lg shadow-blue-500/30 text-sm">
                Total Pendaftar: {{ count($pendaftar) }}
            </span>
        </div>
    </div>

    {{-- ======================== --}}
    {{--        NOTIF FLASH       --}}
    {{-- ======================== --}}
    @if(session('success'))
        <div class="p-4 bg-green-100 dark:bg-green-900/50 border border-green-200 dark:border-green-800 text-green-700 dark:text-green-300 rounded-xl flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M5 13l4 4L19 7" />
            </svg>
            <span class="text-sm">{{ session('success') }}</span>
        </div>
    @endif

    @if(session('error'))
        <div class="p-4 bg-red-100 dark:bg-red-900/50 border border-red-200 dark:border-red-800 text-red-700 dark:text-red-300 rounded-xl flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span class="text-sm">{{ session('error') }}</span>
        </div>
    @endif

    {{-- ======================== --}}
    {{--     TABEL AKTIVASI       --}}
    {{-- ======================== --}}
    @if(isset($usersBaru) && $usersBaru->count() > 0)
        <div class="bg-white dark:bg-slate-800 shadow-xl rounded-2xl overflow-hidden border border-slate-200 dark:border-slate-700">
            <div class="px-6 py-4 border-b border-slate-200 dark:border-slate-700 flex items-center justify-between">
                <div>
                    <h2 class="text-lg font-bold text-slate-800 dark:text-white">
                        Aktivasi Akun Baru
                    </h2>
                    <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">
                        Daftar akun calon mahasiswa yang baru mendaftar dan menunggu aktivasi admin.
                    </p>
                </div>
                <span class="text-xs px-3 py-1 rounded-full bg-slate-100 dark:bg-slate-700 text-slate-600 dark:text-slate-200 font-semibold">
                    {{ $usersBaru->count() }} akun menunggu
                </span>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-slate-500 dark:text-slate-400">
                    <thead class="text-xs text-slate-700 uppercase bg-slate-50 dark:bg-slate-700 dark:text-slate-400">
                        <tr>
                            <th class="px-6 py-3">Nama</th>
                            <th class="px-6 py-3">Email</th>
                            <th class="px-6 py-3">Tanggal Daftar</th>
                            <th class="px-6 py-3 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($usersBaru as $user)
                            @php
                                $status = $user->status_akun ?? 'pending';

                                $badgeClass = match ($status) {
                                    'active'   => 'bg-green-100 text-green-700 border border-green-200',
                                    'rejected' => 'bg-red-100 text-red-700 border border-red-200',
                                    default    => 'bg-yellow-100 text-yellow-700 border border-yellow-200',
                                };

                                $label = match ($status) {
                                    'active'   => 'AKTIF',
                                    'rejected' => 'DITOLAK',
                                    default    => 'PENDING',
                                };
                            @endphp

                            <tr class="bg-white border-b dark:bg-slate-800 dark:border-slate-700 hover:bg-slate-50 dark:hover:bg-slate-700 transition">
                                <td class="px-6 py-3 font-medium text-slate-900 dark:text-white">
                                    {{ $user->name }}
                                </td>
                                <td class="px-6 py-3">
                                    {{ $user->email }}
                                </td>
                                <td class="px-6 py-3 text-xs">
                                    {{ $user->created_at?->format('d M Y H:i') }}
                                </td>
                                <td class="px-6 py-3 text-center">
                                    <div class="flex flex-col items-center gap-2">

                                        {{-- Badge Status Akun --}}
                                        <span class="px-3 py-1 text-xs font-bold rounded-full {{ $badgeClass }}">
                                            {{ $label }}
                                        </span>

                                        {{-- Tombol Aksi --}}
                                        <div class="flex gap-2 justify-center">

                                            {{-- Tombol Aktifkan --}}
                                            <form action="{{ route('admin.user.aktivasi', $user->id) }}"
                                                  method="POST"
                                                  onsubmit="return confirm('Aktifkan akun ini?')">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit"
                                                        class="px-3 py-1 rounded text-xs font-bold bg-green-50 border border-green-200 text-green-700 hover:bg-green-100 transition">
                                                    ✓ Aktifkan
                                                </button>
                                            </form>

                                            {{-- Tombol Tolak (jika belum rejected) --}}
                                            @if($status !== 'rejected')
                                                <form action="{{ route('admin.user.tolak', $user->id) }}"
                                                      method="POST"
                                                      onsubmit="return confirm('Tolak akun ini? Mahasiswa akan dianggap ditolak.')">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit"
                                                            class="px-3 py-1 rounded text-xs font-bold bg-red-50 border border-red-200 text-red-700 hover:bg-red-100 transition">
                                                        ✕ Tolak
                                                    </button>
                                                </form>
                                            @endif

                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif

    {{-- ======================== --}}
    {{--      TABEL PENDAFTAR     --}}
    {{-- ======================== --}}
    <div class="bg-white dark:bg-slate-800 shadow-xl rounded-2xl overflow-hidden border border-slate-200 dark:border-slate-700">
        <div class="px-6 py-4 border-b border-slate-200 dark:border-slate-700 flex items-center justify-between">
            <div>
                <h2 class="text-lg font-bold text-slate-800 dark:text-white">
                    Data Calon Mahasiswa
                </h2>
                <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">
                    Rekap biodata, status verifikasi, dan pembayaran seluruh calon mahasiswa.
                </p>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-slate-500 dark:text-slate-400">
                <thead class="text-xs text-slate-700 uppercase bg-slate-50 dark:bg-slate-700 dark:text-slate-400">
                    <tr>
                        <th class="px-6 py-4">Nama / NISN</th>
                        <th class="px-6 py-4">Prodi</th>
                        <th class="px-6 py-4">Status Data</th>
                        <th class="px-6 py-4">Status Bayar</th>
                        <th class="px-6 py-4 text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($pendaftar as $data)
                        @php
                            $status = $data->status_pendaftaran;
                            $badgeClass = match ($status) {
                                'verified' => 'bg-green-100 text-green-700',
                                'rejected' => 'bg-red-100 text-red-700',
                                default    => 'bg-yellow-100 text-yellow-700',
                            };

                            $label = match ($status) {
                                'verified' => 'Terverifikasi',
                                'rejected' => 'Ditolak',
                                default    => 'Pending',
                            };
                        @endphp

                        <tr class="bg-white border-b dark:bg-slate-800 dark:border-slate-700 hover:bg-slate-50 dark:hover:bg-slate-700 transition">
                            {{-- Nama + NISN --}}
                            <td class="px-6 py-4 font-medium text-slate-900 dark:text-white">
                                {{ $data->user->name ?? 'User Terhapus' }}<br>
                                <span class="text-xs text-slate-500">
                                    NISN: {{ $data->nisn }}
                                </span>
                            </td>

                            {{-- Prodi --}}
                            <td class="px-6 py-4">
                                {{ $data->prodi_pilihan }}
                            </td>

                            {{-- Status Data --}}
                            <td class="px-6 py-4">
                                <span class="px-2 py-1 rounded-full text-xs font-bold {{ $badgeClass }}">
                                    {{ $label }}
                                </span>
                            </td>

                            {{-- Status Bayar --}}
                            <td class="px-6 py-4">
                                @if($data->pembayaran)
                                    <span class="px-2 py-1 rounded-full text-xs font-bold
                                        {{ $data->pembayaran->status_bayar == 'lunas'
                                            ? 'bg-green-100 text-green-700'
                                            : ($data->pembayaran->status_bayar == 'ditolak'
                                                ? 'bg-red-100 text-red-700'
                                                : 'bg-yellow-100 text-yellow-700') }}">
                                        {{ ucfirst($data->pembayaran->status_bayar) }}
                                    </span>
                                @else
                                    <span class="text-slate-400 text-xs italic">
                                        Belum Upload
                                    </span>
                                @endif
                            </td>

                            {{-- Aksi --}}
                            <td class="px-6 py-4 text-center">
                                <div class="flex flex-col items-center gap-2">

                                  {{-- Detail Camaba --}}
                                <button type="button"
                                        onclick="openModal('modal-detail-{{ $data->id }}')"
                                        class="inline-flex items-center justify-center text-blue-700 bg-blue-50 border border-blue-200 
                                            hover:bg-blue-100 px-3 py-1.5 rounded-md text-xs font-semibold shadow-sm transition">
                                    Detail Calon
                                </button>

                                {{-- Detail Pembayaran --}}
                                @if($data->pembayaran)
                                    <a href="{{ route('admin.pembayaran.show', $data->pembayaran->id) }}"
                                    target="_blank"
                                    class="inline-flex items-center justify-center text-indigo-700 bg-indigo-50 border border-indigo-200 
                                            hover:bg-indigo-100 px-3 py-1.5 rounded-md text-xs font-semibold shadow-sm transition">
                                        Detail Bayar
                                    </a>
                                @endif
                                    {{-- Verifikasi Data Diri --}}
                                    @if(in_array($data->status_pendaftaran, ['pending', 'rejected']))
                                        <div class="flex flex-col gap-2 w-full">

                                            <form action="{{ route('admin.verif.data', $data->id) }}"
                                                  method="POST"
                                                  onsubmit="return confirm('Yakin ingin ACC biodata ini?')">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit"
                                                        class="w-full text-blue-600 hover:text-blue-800 font-bold text-xs bg-blue-50 hover:bg-blue-100 border border-blue-200 px-3 py-1 rounded transition">
                                                    ✓ Verif Data
                                                </button>
                                            </form>

                                            <form action="{{ route('admin.tolak.data', $data->id) }}"
                                                  method="POST"
                                                  onsubmit="return confirm('Tolak biodata ini? Mahasiswa akan diminta memperbaiki data.')">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit"
                                                        class="w-full text-red-600 hover:text-red-800 font-bold text-xs bg-red-50 hover:bg-red-100 border border-red-200 px-3 py-1 rounded transition">
                                                    ✕ Tolak Data
                                                </button>
                                            </form>
                                        </div>
                                    @endif

                                    {{-- Verifikasi Pembayaran --}}
                                    @if($data->pembayaran && $data->pembayaran->status_bayar == 'pending')
                                        <div class="flex flex-col gap-2 w-full min-w-[140px]">
                                            <a href="{{ asset('storage/' . $data->pembayaran->bukti_bayar) }}"
                                               target="_blank"
                                               class="text-xs text-slate-500 hover:text-blue-600 underline flex items-center justify-center">
                                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                          d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                          d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                                Lihat Bukti
                                            </a>

                                            <div class="flex gap-1 justify-center">
                                                <form action="{{ route('admin.verif.bayar', $data->pembayaran->id) }}"
                                                      method="POST"
                                                      onsubmit="return confirm('Konfirmasi pembayaran lunas?')">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit"
                                                            class="text-green-600 bg-green-50 border border-green-200 hover:bg-green-100 px-2 py-1 rounded text-xs font-bold transition">
                                                        ✓ Terima
                                                    </button>
                                                </form>

                                                <form action="{{ route('admin.tolak.bayar', $data->pembayaran->id) }}"
                                                      method="POST"
                                                      onsubmit="return confirm('Tolak pembayaran ini?')">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit"
                                                            class="text-red-600 bg-red-50 border border-red-200 hover:bg-red-100 px-2 py-1 rounded text-xs font-bold transition">
                                                        ✕ Tolak
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    @elseif($data->pembayaran && $data->pembayaran->status_bayar == 'lunas')
                                        <span class="text-green-600 text-xs font-bold bg-green-50 px-2 py-1 rounded border border-green-100">
                                            Payment OK
                                        </span>
                                    @endif
                                </div>
                            </td>
                        </tr>

                        {{-- ======================== --}}
                        {{--    MODAL DETAIL CAMABA   --}}
                        {{-- ======================== --}}
                        <div id="modal-detail-{{ $data->id }}"
                             class="fixed inset-0 z-50 hidden flex items-center justify-center bg-black/40 transition-opacity duration-200 opacity-0">
                            <div data-modal-dialog
                                 class="bg-white dark:bg-slate-800 rounded-2xl shadow-2xl max-w-xl w-full mx-4 overflow-hidden border border-slate-200 dark:border-slate-700
                                        transform transition-all duration-200 opacity-0 scale-95 translate-y-4">

                                {{-- Header Modal --}}
                                <div class="px-6 py-4 bg-gradient-to-r from-blue-600 to-indigo-700 text-white flex items-center justify-between">
                                    <div>
                                        <h3 class="font-bold text-lg">Detail Calon Mahasiswa</h3>
                                        <p class="text-xs text-blue-100">
                                            {{ $data->user->name ?? 'User Terhapus' }} • NISN: {{ $data->nisn }}
                                        </p>
                                    </div>
                                    <button type="button"
                                            onclick="closeModal('modal-detail-{{ $data->id }}')"
                                            class="text-white/80 hover:text-white text-xl leading-none">
                                        &times;
                                    </button>
                                </div>

                                {{-- Body Modal --}}
                                <div class="px-6 py-5 space-y-3 text-sm text-slate-700 dark:text-slate-200">

                                    <div class="grid grid-cols-3 gap-2">
                                        <span class="font-semibold col-span-1">Nama</span>
                                        <span class="col-span-2">: {{ $data->user->name ?? '-' }}</span>
                                    </div>

                                    <div class="grid grid-cols-3 gap-2">
                                        <span class="font-semibold col-span-1">Email</span>
                                        <span class="col-span-2">: {{ $data->user->email ?? '-' }}</span>
                                    </div>

                                    <div class="grid grid-cols-3 gap-2">
                                        <span class="font-semibold col-span-1">NISN</span>
                                        <span class="col-span-2">: {{ $data->nisn }}</span>
                                    </div>

                                    <div class="grid grid-cols-3 gap-2">
                                        <span class="font-semibold col-span-1">Jenis Kelamin</span>
                                        <span class="col-span-2">: {{ $data->jenis_kelamin ? ucfirst($data->jenis_kelamin) : '-' }}</span>
                                    </div>

                                    <div class="grid grid-cols-3 gap-2">
                                        <span class="font-semibold col-span-1">Nomor WA</span>
                                        <span class="col-span-2">: {{ $data->nomor_hp }}</span>
                                    </div>

                                    <div class="grid grid-cols-3 gap-2">
                                        <span class="font-semibold col-span-1">Asal Sekolah</span>
                                        <span class="col-span-2">: {{ $data->asal_sekolah }}</span>
                                    </div>

                                    <div class="grid grid-cols-3 gap-2">
                                        <span class="font-semibold col-span-1">Program Studi</span>
                                        <span class="col-span-2">: {{ $data->prodi_pilihan }}</span>
                                    </div>

                                    <div class="grid grid-cols-3 gap-2">
                                        <span class="font-semibold col-span-1">Alamat</span>
                                        <span class="col-span-2">: {{ $data->alamat }}</span>
                                    </div>

                                    <div class="grid grid-cols-3 gap-2">
                                        <span class="font-semibold col-span-1">Status Pendaftaran</span>
                                        <span class="col-span-2">
                                            :
                                            <span class="px-2 py-0.5 rounded-full text-[11px] font-bold {{ $badgeClass }}">
                                                {{ $label }}
                                            </span>
                                        </span>
                                    </div>

                                    <div class="grid grid-cols-3 gap-2">
                                        <span class="font-semibold col-span-1">Status Bayar</span>
                                        <span class="col-span-2">
                                            :

                                            @if($data->pembayaran)

                                                @php
                                                    $statusBayar = $data->pembayaran->status_bayar;
                                                    $bayarClass = match ($statusBayar) {
                                                        'lunas'   => 'bg-green-100 text-green-700 border border-green-200',
                                                        'ditolak' => 'bg-red-100 text-red-700 border border-red-200',
                                                        default   => 'bg-yellow-100 text-yellow-700 border border-yellow-200', // pending
                                                    };
                                                @endphp

                                                <span class="px-2 py-0.5 rounded-full text-[11px] font-bold {{ $bayarClass }}">
                                                    {{ ucfirst($statusBayar) }}
                                                </span>

                                            @else
                                                <span class="px-2 py-0.5 rounded-full text-[11px] font-bold bg-slate-100 text-slate-600 border border-slate-200">
                                                    Belum Upload
                                                </span>
                                            @endif
                                        </span>
                                    </div>


                                    <div class="grid grid-cols-3 gap-2">
                                        <span class="font-semibold col-span-1">Tanggal Daftar</span>
                                        <span class="col-span-2">
                                            : {{ $data->created_at?->format('d M Y H:i') ?? '-' }}
                                        </span>
                                    </div>
                                </div>

                                {{-- Footer Modal --}}
                                <div class="px-6 py-4 bg-slate-50 dark:bg-slate-900 flex justify-end">
                                    <button type="button"
                                            onclick="closeModal('modal-detail-{{ $data->id }}')"
                                            class="px-4 py-2 text-sm font-bold rounded-lg bg-slate-200 hover:bg-slate-300 dark:bg-slate-700 dark:hover:bg-slate-600 text-slate-800 dark:text-slate-100">
                                        Tutup
                                    </button>
                                </div>
                            </div>
                        </div>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center text-slate-500 dark:text-slate-400">
                                <div class="flex flex-col items-center justify-center">
                                    <svg class="w-12 h-12 text-slate-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                    </svg>
                                    <p class="text-sm">Belum ada pendaftar yang masuk.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>
    </div>
</div>

{{-- SCRIPT MODAL ANIMASI --}}
<script>
    function openModal(id) {
        const modal = document.getElementById(id);
        if (!modal) return;

        const dialog = modal.querySelector('[data-modal-dialog]');

        modal.classList.remove('hidden');
        // trigger reflow
        void modal.offsetWidth;

        modal.classList.remove('opacity-0');
        modal.classList.add('opacity-100');

        dialog.classList.remove('opacity-0', 'scale-95', 'translate-y-4');
        dialog.classList.add('opacity-100', 'scale-100', 'translate-y-0');
    }

    function closeModal(id) {
        const modal = document.getElementById(id);
        if (!modal) return;

        const dialog = modal.querySelector('[data-modal-dialog]');

        modal.classList.remove('opacity-100');
        modal.classList.add('opacity-0');

        dialog.classList.remove('opacity-100', 'scale-100', 'translate-y-0');
        dialog.classList.add('opacity-0', 'scale-95', 'translate-y-4');

        setTimeout(() => {
            modal.classList.add('hidden');
        }, 200); // harus sama dengan duration-200
    }
</script>
@endsection
