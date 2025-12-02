@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="max-w-7xl mx-auto">
    <!-- Header dengan Tombol Pengumuman -->
    <div class="flex flex-col md:flex-row items-center justify-between mb-8 gap-4">
        <h1 class="text-3xl font-bold text-slate-900 dark:text-white">
            Panel Admin PMB
        </h1>

        <div class="flex items-center gap-3">
            <!-- Tombol Kelola Pengumuman -->
            <a href="{{ route('admin.pengumuman.index') }}"
               class="px-4 py-2 bg-white dark:bg-slate-700 border border-slate-200 dark:border-slate-600 text-slate-700 dark:text-white rounded-lg font-bold hover:bg-slate-50 dark:hover:bg-slate-600 transition flex items-center shadow-sm">
                <span class="mr-2">📢</span> Kelola Pengumuman
            </a>

            <!-- Badge Total -->
            <span class="px-4 py-2 bg-blue-600 text-white rounded-lg font-bold shadow-lg shadow-blue-500/30">
                Total: {{ count($pendaftar) }}
            </span>
        </div>
    </div>

    <!-- Alert Notifikasi -->
    @if(session('success'))
        <div class="mb-6 p-4 bg-green-100 dark:bg-green-900/50 border border-green-200 dark:border-green-800 text-green-700 dark:text-green-300 rounded-xl flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M5 13l4 4L19 7"></path>
            </svg>
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="mb-6 p-4 bg-red-100 dark:bg-red-900/50 border border-red-200 dark:border-red-800 text-red-700 dark:text-red-300 rounded-xl flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            {{ session('error') }}
        </div>
    @endif

    {{-- ======================== --}}
    {{--  TABEL AKTIVASI AKUN    --}}
    {{-- ======================== --}}
    @if(isset($usersBaru) && $usersBaru->count() > 0)
        <div class="bg-white dark:bg-slate-800 shadow-xl rounded-2xl overflow-hidden border border-slate-200 dark:border-slate-700 mb-8">
            <div class="px-6 py-4 border-b border-slate-200 dark:border-slate-700">
                <h2 class="text-lg font-bold text-slate-800 dark:text-white">
                    Aktivasi Akun Baru
                </h2>
                <p class="text-xs text-slate-500 dark:text-slate-400">
                    Daftar akun calon mahasiswa yang baru mendaftar dan menunggu aktivasi admin.
                </p>
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
    @php
        $status = $user->status_akun ?? 'pending';

        $badgeClass = match ($status) {
            'active'   => 'bg-green-100 text-green-700 border border-green-200',
            'rejected' => 'bg-red-100 text-red-700 border border-red-200',
            default    => 'bg-yellow-100 text-yellow-700 border border-yellow-200', // pending
        };

        $label = match ($status) {
            'active'   => 'AKTIF',
            'rejected' => 'DITOLAK',
            default    => 'PENDING',
        };
    @endphp

    <div class="flex flex-col items-center gap-2">
        {{-- Badge Status Akun --}}
        <span class="px-3 py-1 text-xs font-bold rounded-full {{ $badgeClass }}">
            {{ $label }}
        </span>

        {{-- Tombol Aksi --}}
        <div class="flex gap-2 justify-center">

            {{-- Tombol Aktifkan: SELALU ADA selama user masih di tabel ini (is_active = 0) --}}
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

            {{-- Tombol Tolak: hanya muncul jika status masih pending --}}
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

    <!-- Tabel Pendaftar -->
    <div class="bg-white dark:bg-slate-800 shadow-xl rounded-2xl overflow-hidden border border-slate-200 dark:border-slate-700">
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
                        <tr class="bg-white border-b dark:bg-slate-800 dark:border-slate-700 hover:bg-slate-50 dark:hover:bg-slate-700 transition">
                            <td class="px-6 py-4 font-medium text-slate-900 dark:text-white">
                                {{ $data->user->name ?? 'User Terhapus' }}<br>
                                <span class="text-xs text-slate-500">{{ $data->nisn }}</span>
                            </td>

                            <td class="px-6 py-4">
                                {{ $data->prodi_pilihan }}
                            </td>

<td class="px-6 py-4">
    @php
        $status = $data->status_pendaftaran;
        $badgeClass = match ($status) {
            'verified' => 'bg-green-100 text-green-700',
            'rejected' => 'bg-red-100 text-red-700',
            default    => 'bg-yellow-100 text-yellow-700', // pending / lainnya
        };

        $label = match ($status) {
            'verified' => 'Terverifikasi',
            'rejected' => 'Ditolak',
            default    => 'Pending',
        };
    @endphp

    <span class="px-2 py-1 rounded-full text-xs font-bold {{ $badgeClass }}">
        {{ $label }}
    </span>
</td>


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

                            <td class="px-6 py-4 text-center">
                                <div class="flex flex-col items-center gap-2">
                                    <!-- Detail Button: buka detail pembayaran jika ada, jika tidak buka detail pendaftar -->
                                    @if($data->pembayaran)
                                        <a href="{{ route('admin.pembayaran.show', $data->pembayaran->id) }}"
                                           target="_blank"
                                           class="w-full text-slate-700 bg-slate-50 border border-slate-200 hover:bg-slate-100 px-3 py-1 rounded text-xs font-bold">
                                            Detail Pembayaran
                                        </a>
                                    @else
                                        {{-- <a href="{{ route('admin.pendaftar.show', $data->id) }}"
                                           class="w-full text-slate-700 bg-slate-50 border border-slate-200 hover:bg-slate-100 px-3 py-1 rounded text-xs font-bold">
                                            Detail Pendaftar
                                        </a> --}}
                                    @endif

                                    <!-- Verifikasi Data Diri -->
                                   @if(in_array($data->status_pendaftaran, ['pending', 'rejected']))
    <div class="flex flex-col gap-2 w-full">

        {{-- Tombol Verifikasi Data --}}
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

        {{-- Tombol Tolak Data --}}
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


                                    <!-- Verifikasi Pembayaran -->
                                    @if($data->pembayaran && $data->pembayaran->status_bayar == 'pending')
                                        <div class="flex flex-col gap-2 w-full min-w-[140px]">
                                            <a href="{{ asset('storage/' . $data->pembayaran->bukti_bayar) }}"
                                               target="_blank"
                                               class="text-xs text-slate-500 hover:text-blue-600 underline flex items-center justify-center">
                                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                          d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                          d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
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
                    @empty
                        <tr>
                            <td colspan="5"
                                class="px-6 py-12 text-center text-slate-500 dark:text-slate-400">
                                <div class="flex flex-col items-center justify-center">
                                    <svg class="w-12 h-12 text-slate-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                                    </svg>
                                    <p>Belum ada pendaftar yang masuk.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
