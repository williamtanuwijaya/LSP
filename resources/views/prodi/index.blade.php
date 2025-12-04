<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Program Studi - Ucok University</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800&display=swap" rel="stylesheet" />
    <link rel="icon" href="{{ asset('assets/ucok.png') }}">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: { primary: '#2563EB', secondary: '#0F172A' }
                }
            }
        }
    </script>

    <style>
        /* === ANIMASI CUSTOM === */
        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(18px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes scaleIn {
            from {
                opacity: 0;
                transform: scale(0.96);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        @keyframes softGlow {
            0%, 100% {
                opacity: 0.5;
                transform: translateY(0);
            }
            50% {
                opacity: 1;
                transform: translateY(-4px);
            }
        }

        .animate-fade-up {
            animation: fadeUp 0.7s ease-out both;
        }

        .animate-fade-up-delay-1 {
            animation: fadeUp 0.8s ease-out 0.12s both;
        }

        .animate-fade-up-delay-2 {
            animation: fadeUp 0.85s ease-out 0.22s both;
        }

        .animate-scale-in {
            animation: scaleIn 0.45s ease-out both;
        }

        .animate-soft-glow {
            animation: softGlow 2.4s ease-in-out infinite;
        }
    </style>

    <script>
        // Default: paksa dark mode, kecuali user pernah pilih "light"
        if (localStorage.getItem('theme') === 'light') {
            document.documentElement.classList.remove('dark');
        } else {
            document.documentElement.classList.add('dark');
            localStorage.setItem('theme', 'dark');
        }
    </script>
</head>
<body class="antialiased font-sans text-slate-600 dark:text-slate-300 bg-slate-50 dark:bg-slate-950 transition-colors duration-300">

    <!-- NAVBAR -->
    <nav class="fixed w-full z-50 top-0 start-0 transition-all duration-300 bg-white/90 dark:bg-slate-900/90 backdrop-blur-md border-b border-slate-200 dark:border-slate-800 shadow-sm">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="{{ url('/') }}" class="flex items-center rtl:space-x-reverse">
                <span class="self-center text-2xl font-extrabold whitespace-nowrap text-slate-900 dark:text-white tracking-tight transition-colors">
                    Ucok University
                </span>
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
                    <svg class="hidden dark:block w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                    <svg class="block dark:hidden w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
                    </svg>
                </button>
            </div>
        </div>
    </nav>

    <!-- HEADER / HERO PRODI -->
    <header class="pt-28 pb-16 bg-gradient-to-b from-slate-900 via-slate-900 to-slate-950 text-white relative overflow-hidden">
        <!-- Glow dekoratif -->
        <div class="pointer-events-none absolute -right-32 -top-32 w-64 h-64 rounded-full bg-blue-500/20 blur-3xl animate-soft-glow"></div>
        <div class="pointer-events-none absolute -left-32 bottom-0 w-64 h-64 rounded-full bg-emerald-500/10 blur-3xl"></div>

        <div class="max-w-screen-xl mx-auto px-4 relative">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-8">
                <div class="animate-fade-up">
                    <p class="text-xs font-semibold tracking-widest uppercase text-blue-300 mb-3">
                        Program Studi
                    </p>
                    <h1 class="text-3xl md:text-4xl lg:text-5xl font-extrabold tracking-tight mb-4">
                        Pilih Program Studi <span class="text-blue-400">Terbaik</span> Untuk Masa Depanmu
                    </h1>
                    <p class="text-sm md:text-base text-slate-300 max-w-xl">
                        Ucok University menawarkan berbagai program studi unggulan yang dirancang 
                        untuk menjawab kebutuhan industri dan perkembangan teknologi terkini.
                    </p>
                    <div class="mt-6 flex flex-wrap gap-3">
                        <span class="inline-flex items-center px-3 py-1 rounded-full bg-blue-500/20 text-blue-200 text-xs font-medium">
                            Akreditasi Institusi A
                        </span>
                        <span class="inline-flex items-center px-3 py-1 rounded-full bg-emerald-500/20 text-emerald-200 text-xs font-medium">
                            Kurikulum Berbasis OBE
                        </span>
                        <span class="inline-flex items-center px-3 py-1 rounded-full bg-amber-500/20 text-amber-100 text-xs font-medium">
                            Dosen Praktisi Profesional
                        </span>
                    </div>
                </div>
                <div class="bg-slate-900/60 border border-slate-700 rounded-2xl p-5 md:p-6 shadow-xl max-w-sm w-full animate-fade-up-delay-1">
                    <h2 class="text-lg font-semibold mb-3">Ringkasan Program Studi</h2>
                    <dl class="space-y-3 text-sm">
                        <div class="flex items-center justify-between">
                            <dt class="text-slate-300">Jenjang</dt>
                            <dd class="font-semibold text-white">Diploma & Sarjana</dd>
                        </div>
                        <div class="flex items-center justify-between">
                            <dt class="text-slate-300">Total Program Studi</dt>
                            <dd class="font-semibold text-white">15+</dd>
                        </div>
                        <div class="flex items-center justify-between">
                            <dt class="text-slate-300">Fakultas</dt>
                            <dd class="font-semibold text-white">5 Fakultas</dd>
                        </div>
                        <div class="flex items-center justify-between">
                            <dt class="text-slate-300">Metode</dt>
                            <dd class="font-semibold text-white">Offline & Hybrid</dd>
                        </div>
                    </dl>
                    <a href="{{ route('register') }}" class="mt-5 inline-flex items-center justify-center w-full px-4 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-sm font-semibold text-white shadow-lg shadow-blue-600/40 transition transform hover:-translate-y-0.5">
                        Daftar Sebagai Calon Mahasiswa
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- FILTER / TAG JENJANG -->
    <section class="bg-slate-50 dark:bg-slate-950 border-b border-slate-200 dark:border-slate-800">
        <div class="max-w-screen-xl mx-auto px-4 py-6 flex flex-wrap items-center justify-between gap-4 animate-fade-up-delay-2">
            <div>
                <p class="text-xs font-semibold tracking-widest uppercase text-slate-500 dark:text-slate-400">
                    Jelajahi Program Studi
                </p>
                <h2 class="text-lg font-bold text-slate-900 dark:text-white">
                    Program Studi Berdasarkan Jenjang
                </h2>
            </div>
            <div class="flex flex-wrap gap-2 text-xs">
                <span class="inline-flex items-center px-3 py-1 rounded-full bg-blue-600 text-white font-semibold shadow-sm">
                    Semua Jenjang
                </span>
                <span class="inline-flex items-center px-3 py-1 rounded-full bg-slate-200 dark:bg-slate-800 text-slate-700 dark:text-slate-200">
                    Diploma (D3)
                </span>
                <span class="inline-flex items-center px-3 py-1 rounded-full bg-slate-200 dark:bg-slate-800 text-slate-700 dark:text-slate-200">
                    Sarjana (S1)
                </span>
                <span class="inline-flex items-center px-3 py-1 rounded-full bg-slate-200 dark:bg-slate-800 text-slate-700 dark:text-slate-200">
                    Profesi / Lanjutan
                </span>
            </div>
        </div>
    </section>

    <!-- DAFTAR PRODI -->
    <main id="prodi" class="bg-slate-50 dark:bg-slate-950 py-16 transition-colors duration-300">
        <div class="max-w-screen-xl mx-auto px-4 space-y-16">

            <!-- FAKULTAS SAINS & TEKNOLOGI -->
            <section class="animate-fade-up">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h3 class="text-xl md:text-2xl font-extrabold text-slate-900 dark:text-white">
                            Fakultas Sains & Teknologi
                        </h3>
                        <p class="text-sm text-slate-500 dark:text-slate-400 mt-1 max-w-xl">
                            Berfokus pada pengembangan keilmuan di bidang teknologi, informatika, dan sains terapan.
                        </p>
                    </div>
                    <span class="hidden md:inline-flex items-center px-3 py-1 rounded-full bg-emerald-100 dark:bg-emerald-900/40 text-emerald-700 dark:text-emerald-300 text-xs font-semibold">
                        Rata-rata Akreditasi: Baik Sekali
                    </span>
                </div>

                <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                    <!-- Prodi 1 -->
                    <article class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-2xl p-6 shadow-sm hover:shadow-xl transition group animate-scale-in">
                        <div class="flex items-start justify-between gap-3">
                            <div>
                                <h4 class="text-lg font-bold text-slate-900 dark:text-white group-hover:text-blue-600 dark:group-hover:text-blue-400 transition">
                                    S1 Teknik Informatika
                                </h4>
                                <p class="mt-1 text-xs font-medium text-slate-500 dark:text-slate-400 uppercase tracking-wide">
                                    Jenjang Sarjana • Akreditasi A
                                </p>
                            </div>
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full bg-blue-50 dark:bg-blue-900/30 text-blue-700 dark:text-blue-300 text-[11px] font-semibold">
                                Teknologi
                            </span>
                        </div>
                        <p class="mt-3 text-sm text-slate-600 dark:text-slate-300 leading-relaxed">
                            Mempelajari pengembangan perangkat lunak, kecerdasan buatan, komputasi awan, dan teknologi digital untuk menjawab kebutuhan industri 4.0.
                        </p>
                        <dl class="mt-4 space-y-1 text-xs text-slate-500 dark:text-slate-400">
                            <div class="flex justify-between">
                                <dt>Durasi Studi</dt>
                                <dd class="font-semibold text-slate-800 dark:text-slate-200">8 Semester</dd>
                            </div>
                            <div class="flex justify-between">
                                <dt>Gelar Lulusan</dt>
                                <dd class="font-semibold text-slate-800 dark:text-slate-200">S.Kom.</dd>
                            </div>
                        </dl>
                        <div class="mt-5 flex items-center justify-between">
                            <button class="text-xs font-semibold text-blue-600 dark:text-blue-400 hover:underline">
                                Lihat Kurikulum
                            </button>
                            <a href="{{ route('register') }}" class="inline-flex items-center text-xs font-semibold text-emerald-600 dark:text-emerald-400 hover:underline">
                                Daftar ke Prodi Ini →
                            </a>
                        </div>
                    </article>

                    <!-- Prodi 2 -->
                    <article class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-2xl p-6 shadow-sm hover:shadow-xl transition group animate-scale-in" style="animation-delay: .08s;">
                        <div class="flex items-start justify-between gap-3">
                            <div>
                                <h4 class="text-lg font-bold text-slate-900 dark:text-white group-hover:text-blue-600 dark:group-hover:text-blue-400 transition">
                                    S1 Sistem Informasi
                                </h4>
                                <p class="mt-1 text-xs font-medium text-slate-500 dark:text-slate-400 uppercase tracking-wide">
                                    Jenjang Sarjana • Akreditasi B
                                </p>
                            </div>
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full bg-amber-50 dark:bg-amber-900/30 text-amber-700 dark:text-amber-300 text-[11px] font-semibold">
                                Bisnis & TI
                            </span>
                        </div>
                        <p class="mt-3 text-sm text-slate-600 dark:text-slate-300 leading-relaxed">
                            Mengintegrasikan teknologi informasi dengan proses bisnis untuk merancang, mengelola, dan mengoptimalkan sistem informasi di organisasi.
                        </p>
                        <dl class="mt-4 space-y-1 text-xs text-slate-500 dark:text-slate-400">
                            <div class="flex justify-between">
                                <dt>Durasi Studi</dt>
                                <dd class="font-semibold text-slate-800 dark:text-slate-200">8 Semester</dd>
                            </div>
                            <div class="flex justify-between">
                                <dt>Gelar Lulusan</dt>
                                <dd class="font-semibold text-slate-800 dark:text-slate-200">S.Kom.</dd>
                            </div>
                        </dl>
                        <div class="mt-5 flex items-center justify-between">
                            <button class="text-xs font-semibold text-blue-600 dark:text-blue-400 hover:underline">
                                Lihat Kurikulum
                            </button>
                            <a href="{{ route('register') }}" class="inline-flex items-center text-xs font-semibold text-emerald-600 dark:text-emerald-400 hover:underline">
                                Daftar ke Prodi Ini →
                            </a>
                        </div>
                    </article>

                    <!-- Prodi 3 -->
                    <article class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-2xl p-6 shadow-sm hover:shadow-xl transition group animate-scale-in" style="animation-delay: .16s;">
                        <div class="flex items-start justify-between gap-3">
                            <div>
                                <h4 class="text-lg font-bold text-slate-900 dark:text-white group-hover:text-blue-600 dark:group-hover:text-blue-400 transition">
                                    S1 Teknologi Informasi
                                </h4>
                                <p class="mt-1 text-xs font-medium text-slate-500 dark:text-slate-400 uppercase tracking-wide">
                                    Jenjang Sarjana • Akreditasi Baik
                                </p>
                            </div>
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-200 text-[11px] font-semibold">
                                Developer
                            </span>
                        </div>
                        <p class="mt-3 text-sm text-slate-600 dark:text-slate-300 leading-relaxed">
                            Berfokus pada kemampuan praktis pengelolaan sistem informasi dan aplikasi perkantoran berbasis teknologi.
                        </p>
                        <dl class="mt-4 space-y-1 text-xs text-slate-500 dark:text-slate-400">
                            <div class="flex justify-between">
                                <dt>Durasi Studi</dt>
                                <dd class="font-semibold text-slate-800 dark:text-slate-200">6 Semester</dd>
                            </div>
                            <div class="flex justify-between">
                                <dt>Gelar Lulusan</dt>
                                <dd class="font-semibold text-slate-800 dark:text-slate-200">S.Kom.</dd>
                            </div>
                        </dl>
                        <div class="mt-5 flex items-center justify-between">
                            <button class="text-xs font-semibold text-blue-600 dark:text-blue-400 hover:underline">
                                Lihat Kurikulum
                            </button>
                            <a href="{{ route('register') }}" class="inline-flex items-center text-xs font-semibold text-emerald-600 dark:text-emerald-400 hover:underline">
                                Daftar ke Prodi Ini →
                            </a>
                        </div>
                    </article>
                </div>
            </section>

            <!-- FAKULTAS EKONOMI & BISNIS -->
            <section class="animate-fade-up">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h3 class="text-xl md:text-2xl font-extrabold text-slate-900 dark:text-white">
                            Fakultas Ekonomi & Bisnis
                        </h3>
                        <p class="text-sm text-slate-500 dark:text-slate-400 mt-1 max-w-xl">
                            Menyiapkan lulusan yang siap bersaing di dunia usaha, kewirausahaan, dan industri kreatif.
                        </p>
                    </div>
                </div>

                <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                    <article class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-2xl p-6 shadow-sm hover:shadow-xl transition group animate-scale-in">
                        <div class="flex items-start justify-between gap-3">
                            <div>
                                <h4 class="text-lg font-bold text-slate-900 dark:text-white group-hover:text-blue-600 dark:group-hover:text-blue-400 transition">
                                    S1 Bisnis Digital
                                </h4>
                                <p class="mt-1 text-xs font-medium text-slate-500 dark:text-slate-400 uppercase tracking-wide">
                                    Jenjang Sarjana • Akreditasi Baik Sekali
                                </p>
                            </div>
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full bg-emerald-50 dark:bg-emerald-900/30 text-emerald-700 dark:text-emerald-300 text-[11px] font-semibold">
                                Bisnis
                            </span>
                        </div>
                        <p class="mt-3 text-sm text-slate-600 dark:text-slate-300 leading-relaxed">
                            Mempelajari manajemen keuangan, pemasaran, SDM, dan kewirausahaan dengan pendekatan studi kasus dan project-based learning.
                        </p>
                        <dl class="mt-4 space-y-1 text-xs text-slate-500 dark:text-slate-400">
                            <div class="flex justify-between">
                                <dt>Durasi Studi</dt>
                                <dd class="font-semibold text-slate-800 dark:text-slate-200">8 Semester</dd>
                            </div>
                            <div class="flex justify-between">
                                <dt>Gelar Lulusan</dt>
                                <dd class="font-semibold text-slate-800 dark:text-slate-200">S.M.</dd>
                            </div>
                        </dl>
                        <div class="mt-5 flex items-center justify-between">
                            <button class="text-xs font-semibold text-blue-600 dark:text-blue-400 hover:underline">
                                Lihat Kurikulum
                            </button>
                            <a href="{{ route('register') }}" class="inline-flex items-center text-xs font-semibold text-emerald-600 dark:text-emerald-400 hover:underline">
                                Daftar ke Prodi Ini →
                            </a>
                        </div>
                    </article>

                    <article class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-2xl p-6 shadow-sm hover:shadow-xl transition group animate-scale-in" style="animation-delay: .08s;">
                        <div class="flex items-start justify-between gap-3">
                            <div>
                                <h4 class="text-lg font-bold text-slate-900 dark:text-white group-hover:text-blue-600 dark:group-hover:text-blue-400 transition">
                                    S1 Akuntansi
                                </h4>
                                <p class="mt-1 text-xs font-medium text-slate-500 dark:text-slate-400 uppercase tracking-wide">
                                    Jenjang Sarjana • Akreditasi B
                                </p>
                            </div>
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full bg-sky-50 dark:bg-sky-900/30 text-sky-700 dark:text-sky-300 text-[11px] font-semibold">
                                Keuangan
                            </span>
                        </div>
                        <p class="mt-3 text-sm text-slate-600 dark:text-slate-300 leading-relaxed">
                            Berfokus pada akuntansi keuangan, audit, perpajakan, dan sistem informasi akuntansi yang relevan dengan praktik industri.
                        </p>
                        <dl class="mt-4 space-y-1 text-xs text-slate-500 dark:text-slate-400">
                            <div class="flex justify-between">
                                <dt>Durasi Studi</dt>
                                <dd class="font-semibold text-slate-800 dark:text-slate-200">8 Semester</dd>
                            </div>
                            <div class="flex justify-between">
                                <dt>Gelar Lulusan</dt>
                                <dd class="font-semibold text-slate-800 dark:text-slate-200">S.Ak.</dd>
                            </div>
                        </dl>
                        <div class="mt-5 flex items-center justify-between">
                            <button class="text-xs font-semibold text-blue-600 dark:text-blue-400 hover:underline">
                                Lihat Kurikulum
                            </button>
                            <a href="{{ route('register') }}" class="inline-flex items-center text-xs font-semibold text-emerald-600 dark:text-emerald-400 hover:underline">
                                Daftar ke Prodi Ini →
                            </a>
                        </div>
                    </article>

                    <!-- Tambah prodi lain di sini sesuai kebutuhan -->
                </div>
            </section>

        </div>
    </main>

    <!-- FOOTER -->
    <footer class="bg-slate-900 dark:bg-slate-950 text-white pt-16 pb-8 border-t-4 border-blue-600 transition-colors duration-300">
        <div class="max-w-screen-xl mx-auto px-4">
            <div class="flex flex-col md:flex-row justify-between items-center mb-8">
                <div class="mb-6 md:mb-0 text-center md:text-left">
                    <span class="text-3xl font-extrabold tracking-tight text-white">Ucok University</span>
                    <p class="text-slate-400 text-sm max-w-sm mt-2">
                        Kampus modern berbasis teknologi untuk mencetak Generasi Emas Masa Depan Indonesia.
                    </p>
                </div>
                <div class="flex space-x-8 text-sm font-medium text-slate-300">
                    <a href="{{ url('/') }}" class="hover:text-blue-400 hover:underline transition">Beranda</a>
                    <a href="/prodi" class="hover:text-blue-400 hover:underline transition">Program Studi</a>
                    <a href="/bantuan" class="hover:text-blue-400 hover:underline transition">Bantuan</a>
                    <a href="/bantuan#kontak" class="hover:text-blue-400 hover:underline transition">Kontak</a>
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
                html.classList.remove('dark');
                localStorage.setItem('theme', 'light');
            } else {
                html.classList.add('dark');
                localStorage.setItem('theme', 'dark');
            }
        }
    </script>
</body>
</html>
