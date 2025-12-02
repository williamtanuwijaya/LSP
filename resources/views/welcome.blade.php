<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Penerimaan Mahasiswa Baru - Ucok University</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800&display=swap" rel="stylesheet" />

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class', // Wajib 'class' agar kita bisa kontrol manual
            theme: {
                extend: {
                    colors: { primary: '#2563EB', secondary: '#0F172A' }
                }
            }
        }
    </script>

    <style>
        .video-docker video {
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        .video-docker::after {
            content: "";
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            background: rgba(15, 23, 42, 0.6);
            z-index: 1;
        }
    </style>

    <script>
        // Logika Baru: 
        // Cek apakah user PERNAH memilih 'light' sebelumnya?
        if (localStorage.getItem('theme') === 'light') {
            // Jika pernah pilih light, matikan dark mode
            document.documentElement.classList.remove('dark');
        } else {
            // Jika belum pernah pilih (pengunjung baru) ATAU pernah pilih dark:
            // PAKSA NYALAKAN DARK MODE
            document.documentElement.classList.add('dark');
            // Simpan state default ke dark
            localStorage.setItem('theme', 'dark');
        }
    </script>
</head>
<body class="antialiased font-sans text-slate-600 dark:text-slate-300 bg-slate-50 dark:bg-slate-950 transition-colors duration-300">

    <nav class="fixed w-full z-50 top-0 start-0 transition-all duration-300 bg-white/90 dark:bg-slate-900/90 backdrop-blur-md border-b border-slate-200 dark:border-slate-800 shadow-sm">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="#" class="flex items-center rtl:space-x-reverse">
                <span class="self-center text-2xl font-extrabold whitespace-nowrap text-slate-900 dark:text-white tracking-tight transition-colors">Ucok University</span>
            </a>
            
            <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse items-center">
                <div class="hidden md:flex space-x-3 mr-4">
                    <a href="{{ route('login') }}" class="text-slate-900 dark:text-white hover:text-blue-600 dark:hover:text-blue-400 font-medium rounded-lg text-sm px-4 py-2 text-center transition">
                        Masuk
                    </a>
                    <a href="{{ route('register') }}" class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center transition shadow-lg shadow-blue-600/30">
                        Daftar Sekarang
                    </a>
                </div>

                <button onclick="toggleTheme()" class="p-2 rounded-lg bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-200 hover:bg-slate-200 dark:hover:bg-slate-700 transition focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <svg class="hidden dark:block w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    <svg class="block dark:hidden w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path></svg>
                </button>
            </div>
        </div>
    </nav>

    <section class="relative h-screen flex flex-col items-center justify-center text-center text-white overflow-hidden">
        <div class="video-docker absolute top-0 left-0 w-full h-full overflow-hidden z-0">
            <video class="min-w-full min-h-full absolute object-cover" src="{{ asset('assets/videos/kampus2.mp4') }}" type="video/mp4" autoplay muted loop playsinline></video>
        </div>

        <div class="relative z-10 px-4 max-w-4xl mx-auto mt-16">
            <span class="inline-block py-1 px-3 rounded-full bg-blue-600/90 text-white text-sm font-semibold mb-6 tracking-wide shadow-lg backdrop-blur-sm border border-blue-400">
                Penerimaan Mahasiswa Baru 2025/2026
            </span>
            <h1 class="text-5xl md:text-7xl font-extrabold tracking-tight mb-6 leading-tight drop-shadow-md">
                Wujudkan Masa Depan di <br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-white">Ucok University</span>
            </h1>
            <p class="text-lg md:text-xl text-slate-200 mb-10 max-w-2xl mx-auto leading-relaxed drop-shadow-sm">
                Kampus berbasis teknologi dengan kurikulum internasional. Bergabunglah dengan komunitas inovator masa depan.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                <a href="{{ route('register') }}" class="px-8 py-4 text-lg font-bold text-white bg-blue-600 rounded-xl hover:bg-blue-700 transition transform hover:-translate-y-1 hover:shadow-2xl shadow-blue-600/40">Daftar Sekarang</a>
                <a href="#prodi" class="px-8 py-4 text-lg font-bold text-white border border-white/30 bg-white/10 backdrop-blur-sm rounded-xl hover:bg-white hover:text-slate-900 transition transform hover:-translate-y-1">Lihat Program Studi</a>
            </div>
        </div>
        <div class="absolute bottom-10 z-10 animate-bounce">
            <svg class="w-6 h-6 text-white/70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path></svg>
        </div>
    </section>

    <section class="bg-white dark:bg-slate-800 border-b border-slate-100 dark:border-slate-700 relative z-20 -mt-8 mx-4 rounded-xl shadow-xl max-w-6xl lg:mx-auto p-8 transition-colors duration-300">
        <dl class="grid gap-8 text-center sm:grid-cols-3 divide-y sm:divide-y-0 sm:divide-x divide-slate-100 dark:divide-slate-700">
            <div class="flex flex-col items-center justify-center p-2">
                <dt class="mb-2 text-4xl font-extrabold text-blue-600 dark:text-blue-400">A</dt>
                <dd class="font-medium text-slate-500 dark:text-slate-400 uppercase tracking-wide text-sm">Akreditasi Institusi</dd>
            </div>
            <div class="flex flex-col items-center justify-center p-2">
                <dt class="mb-2 text-4xl font-extrabold text-blue-600 dark:text-blue-400">15+</dt>
                <dd class="font-medium text-slate-500 dark:text-slate-400 uppercase tracking-wide text-sm">Program Studi</dd>
            </div>
            <div class="flex flex-col items-center justify-center p-2">
                <dt class="mb-2 text-4xl font-extrabold text-blue-600 dark:text-blue-400">5000+</dt>
                <dd class="font-medium text-slate-500 dark:text-slate-400 uppercase tracking-wide text-sm">Alumni Sukses</dd>
            </div>
        </dl>
    </section>

    <section class="bg-slate-50 dark:bg-slate-950 py-20 transition-colors duration-300">
        <div class="max-w-screen-xl px-4 mx-auto">
            <div class="text-center mb-16">
                <span class="text-blue-600 dark:text-blue-400 font-bold tracking-wide uppercase text-sm">Galeri Kampus</span>
                <h2 class="mt-2 text-3xl font-extrabold text-slate-900 dark:text-white sm:text-4xl">Fasilitas & Kehidupan Kampus</h2>
                <p class="mt-4 text-lg text-slate-500 dark:text-slate-400 max-w-2xl mx-auto">Lingkungan belajar modern yang dirancang untuk mendukung kreativitas dan kolaborasi mahasiswa.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 h-auto md:h-[500px]">
                <div class="group relative overflow-hidden rounded-2xl col-span-1 md:col-span-2 lg:col-span-2 row-span-2 h-64 md:h-full shadow-lg border border-slate-200 dark:border-slate-800">
                    <img src="https://images.unsplash.com/photo-1562774053-701939374585?q=80&w=1000&auto=format&fit=crop" alt="Gedung Utama" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/90 via-transparent to-transparent flex items-end p-6">
                        <div>
                            <h3 class="text-white font-bold text-xl">Gedung Rektorat Modern</h3>
                            <p class="text-slate-200 text-sm">Pusat administrasi dan layanan mahasiswa terpadu.</p>
                        </div>
                    </div>
                </div>
                <div class="group relative overflow-hidden rounded-2xl shadow-lg h-64 md:h-auto border border-slate-200 dark:border-slate-800">
                    <img src="https://images.unsplash.com/photo-1521587760476-6c12a4b040da?q=80&w=800&auto=format&fit=crop" alt="Perpustakaan" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 to-transparent flex items-end p-4">
                        <span class="text-white font-semibold">Perpustakaan Digital</span>
                    </div>
                </div>
                <div class="group relative overflow-hidden rounded-2xl shadow-lg h-64 md:h-auto border border-slate-200 dark:border-slate-800">
                    <img src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?q=80&w=800&auto=format&fit=crop" alt="Mahasiswa" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 to-transparent flex items-end p-4">
                        <span class="text-white font-semibold">Diskusi Kelompok</span>
                    </div>
                </div>
                <div class="group relative overflow-hidden rounded-2xl shadow-lg h-64 md:h-auto border border-slate-200 dark:border-slate-800">
                    <img src="https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?q=80&w=800&auto=format&fit=crop" alt="Auditorium" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 to-transparent flex items-end p-4">
                        <span class="text-white font-semibold">Co-Working Space</span>
                    </div>
                </div>
                <div class="group relative overflow-hidden rounded-2xl shadow-lg h-64 md:h-auto border border-slate-200 dark:border-slate-800">
                    <img src="https://images.unsplash.com/photo-1531482615713-2afd69097998?q=80&w=800&auto=format&fit=crop" alt="Laboratorium" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 to-transparent flex items-end p-4">
                        <span class="text-white font-semibold">Lab Komputer</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

        <!-- SECTION PENGUMUMAN -->
    @if($pengumuman->count() > 0)
        @php
            $highlight = $pengumuman->first();
            $others = $pengumuman->skip(1);
        @endphp

        <section id="pengumuman" class="bg-slate-50 dark:bg-slate-950 py-20 transition-colors duration-300">
            <div class="max-w-screen-xl mx-auto px-4 space-y-10">
                <div class="text-center">
                    <span class="inline-flex items-center px-3 py-1 rounded-full bg-blue-100 dark:bg-blue-900/40 text-blue-700 dark:text-blue-300 text-xs font-semibold tracking-wide uppercase">
                        📢 Pengumuman Resmi PMB
                    </span>
                    <h2 class="mt-3 text-3xl md:text-4xl font-extrabold text-slate-900 dark:text-white">
                        Pengumuman Terbaru
                    </h2>
                    <p class="mt-3 text-sm md:text-base text-slate-500 dark:text-slate-400 max-w-2xl mx-auto">
                        Pantau selalu informasi terkini terkait jadwal pendaftaran, ujian seleksi, dan kelulusan calon mahasiswa baru.
                    </p>
                </div>

                <div class="grid gap-8 lg:grid-cols-3">
                    {{-- Highlight pengumuman terbaru --}}
                    <article class="lg:col-span-2 bg-white dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-slate-700 shadow-xl p-6 md:p-8 relative overflow-hidden">
                        <div class="absolute -top-10 -right-10 w-32 h-32 rounded-full bg-blue-600/10 blur-3xl pointer-events-none"></div>

                        <div class="relative z-10 space-y-4">
                            <div class="flex items-center gap-2 text-xs font-semibold text-slate-500 dark:text-slate-400">
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full bg-blue-50 dark:bg-blue-900/40 text-blue-700 dark:text-blue-300">
                                    PENGUMUMAN UTAMA
                                </span>
                                <span class="h-1 w-1 rounded-full bg-slate-400"></span>
                                <span>{{ $highlight->created_at->translatedFormat('d M Y') }}</span>
                                <span class="text-[11px] text-slate-400">
                                    ({{ $highlight->created_at->diffForHumans() }})
                                </span>
                            </div>

                            <h3 class="text-2xl font-bold text-slate-900 dark:text-white leading-snug">
                                {{ $highlight->judul }}
                            </h3>

                            <p class="text-sm md:text-base text-slate-600 dark:text-slate-300 leading-relaxed">
                                {{ $highlight->isi }}
                            </p>

                            <div class="pt-4 border-t border-dashed border-slate-200 dark:border-slate-700 flex items-center justify-between">
                                <div class="flex items-center gap-2 text-xs text-slate-500 dark:text-slate-400">
                                    <span class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-blue-50 dark:bg-blue-900/40 text-blue-700 dark:text-blue-300 text-sm">
                                        ℹ️
                                    </span>
                                    <span>Pastikan Anda membaca pengumuman ini dengan saksama.</span>
                                </div>
                                {{-- Jika nanti punya halaman detail, bisa pakai route detail di sini --}}
                                {{-- <a href="#" class="text-xs font-semibold text-blue-600 dark:text-blue-400 hover:underline">
                                    Baca selengkapnya →
                                </a> --}}
                            </div>
                        </div>
                    </article>

                    {{-- Daftar pengumuman lain --}}
                    <div class="space-y-4">
                        <h4 class="text-sm font-semibold text-slate-500 dark:text-slate-400 tracking-wide uppercase">
                            Pengumuman Lainnya
                        </h4>

                        @forelse($others as $info)
                            <article class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-slate-700 p-4 shadow-sm hover:shadow-md transition duration-200 group">
                                <div class="flex items-start gap-3">
                                    <div class="mt-1">
                                        <span class="inline-flex items-center justify-center w-9 h-9 rounded-full bg-blue-50 dark:bg-blue-900/40 text-blue-700 dark:text-blue-300 text-xs font-bold group-hover:scale-105 transition">
                                            {{ $loop->iteration + 1 }}
                                        </span>
                                    </div>
                                    <div class="flex-1 space-y-1.5">
                                        <div class="flex items-center gap-2 text-[11px] text-slate-400">
                                            <span>{{ $info->created_at->translatedFormat('d M Y') }}</span>
                                            <span class="h-1 w-1 rounded-full bg-slate-400"></span>
                                            <span>{{ $info->created_at->diffForHumans() }}</span>
                                        </div>
                                        <h5 class="text-sm font-semibold text-slate-900 dark:text-white line-clamp-2 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition">
                                            {{ $info->judul }}
                                        </h5>
                                        <p class="text-xs text-slate-500 dark:text-slate-400 line-clamp-2">
                                            {{ $info->isi }}
                                        </p>
                                    </div>
                                </div>
                            </article>
                        @empty
                            <p class="text-sm text-slate-500 dark:text-slate-400">
                                Belum ada pengumuman tambahan.
                            </p>
                        @endforelse
                    </div>
                </div>
            </div>
        </section>
    @endif



    <footer class="bg-slate-900 dark:bg-slate-950 text-white pt-16 pb-8 border-t-4 border-blue-600 transition-colors duration-300">
        <div class="max-w-screen-xl mx-auto px-4">
            <div class="flex flex-col md:flex-row justify-between items-center mb-8">
                <div class="mb-6 md:mb-0 text-center md:text-left">
                    <span class="text-3xl font-extrabold tracking-tight text-white">Ucok University</span>
                    <p class="text-slate-400 text-sm max-w-sm mt-2">Kampus modern berbasis teknologi untuk mencetak Generasi Emas Masa Depan Indonesia.</p>
                </div>
                <div class="flex space-x-8 text-sm font-medium text-slate-300">
                    <a href="#" class="hover:text-blue-400 hover:underline transition">Tentang Kami</a>
                    <a href="#" class="hover:text-blue-400 hover:underline transition">Program Studi</a>
                    <a href="#" class="hover:text-blue-400 hover:underline transition">Bantuan</a>
                    <a href="#" class="hover:text-blue-400 hover:underline transition">Kontak</a>
                </div>
            </div>
            <div class="border-t border-slate-800 pt-8 mt-8 text-center">
                <p class="text-slate-500 text-sm">&copy; {{ date('Y') }} Ucok University. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        const html = document.documentElement;
        
        function toggleTheme() {
            if (html.classList.contains('dark')) {
                // Pindah ke Light
                html.classList.remove('dark');
                localStorage.setItem('theme', 'light');
            } else {
                // Pindah ke Dark
                html.classList.add('dark');
                localStorage.setItem('theme', 'dark');
            }
        }
    </script>
</body>
</html>