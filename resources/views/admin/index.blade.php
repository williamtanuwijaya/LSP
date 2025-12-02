@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="max-w-7xl mx-auto">
    <div class="flex items-center justify-between mb-8">
        <h1 class="text-3xl font-bold text-slate-900 dark:text-white">Panel Admin PMB</h1>
        <span class="px-4 py-2 bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200 rounded-lg font-bold">
            Total Pendaftar: {{ count($pendaftar) }}
        </span>
    </div>

    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 dark:bg-green-900 text-green-700 dark:text-green-300 rounded-lg">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="mb-4 p-4 bg-red-100 dark:bg-red-900 text-red-700 dark:text-red-300 rounded-lg">
            {{ session('error') }}
        </div>
    @endif

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

                        <td class="px-6 py-4">{{ $data->prodi_pilihan }}</td>

                        <td class="px-6 py-4">
                             <span class="px-2 py-1 rounded-full text-xs font-bold {{ $data->status_pendaftaran == 'verified' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                                {{ ucfirst($data->status_pendaftaran) }}
                            </span>
                        </td>

                        <td class="px-6 py-4">
                            @if($data->pembayaran)
                                <span class="px-2 py-1 rounded-full text-xs font-bold 
                                    {{ $data->pembayaran->status_bayar == 'lunas' ? 'bg-green-100 text-green-700' : ($data->pembayaran->status_bayar == 'ditolak' ? 'bg-red-100 text-red-700' : 'bg-yellow-100 text-yellow-700') }}">
                                    {{ ucfirst($data->pembayaran->status_bayar) }}
                                </span>
                            @else
                                <span class="text-slate-400 text-xs italic">Belum Upload</span>
                            @endif
                        </td>

                        <td class="px-6 py-4 text-center">
                            <div class="flex flex-col items-center gap-2">
                                
                                @if($data->status_pendaftaran == 'pending')
                                    <form action="{{ route('admin.verif.data', $data->id) }}" method="POST" onsubmit="return confirm('Yakin data ini valid?')">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="w-full text-blue-600 hover:text-blue-800 font-bold text-xs bg-blue-50 hover:bg-blue-100 border border-blue-200 px-3 py-1 rounded transition">
                                            Verif Data
                                        </button>
                                    </form>
                                @endif

                                @if($data->pembayaran && $data->pembayaran->status_bayar == 'pending')
                                    <div class="flex flex-col gap-1 w-full">
                                        <a href="{{ asset('storage/' . $data->pembayaran->bukti_bayar) }}" target="_blank" class="text-xs text-slate-500 underline mb-1">Lihat Bukti</a>
                                        
                                        <div class="flex gap-1 justify-center">
                                            <form action="{{ route('admin.verif.bayar', $data->pembayaran->id) }}" method="POST" onsubmit="return confirm('Konfirmasi pembayaran lunas?')">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="text-green-600 bg-green-50 border border-green-200 hover:bg-green-100 px-2 py-1 rounded text-xs font-bold">
                                                    ✓ Terima
                                                </button>
                                            </form>

                                            <form action="{{ route('admin.tolak.bayar', $data->pembayaran->id) }}" method="POST" onsubmit="return confirm('Tolak pembayaran ini?')">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="text-red-600 bg-red-50 border border-red-200 hover:bg-red-100 px-2 py-1 rounded text-xs font-bold">
                                                    ✕ Tolak
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                @elseif($data->pembayaran && $data->pembayaran->status_bayar == 'lunas')
                                    <span class="text-green-600 text-xs font-bold">Payment OK</span>
                                @endif

                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-8 text-center text-slate-500 dark:text-slate-400">
                            Belum ada pendaftar yang masuk.
                        </td>
                    </tr>
                    @endforelse
                    </tbody>
            </table>
        </div>
    </div>
</div>
@endsection