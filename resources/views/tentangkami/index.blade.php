<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tentang Kami - Ucok University</title>

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
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(18px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        @keyframes softGlow {
            0%, 100% { opacity: 0.5; transform: translateY(0); }
            50%      { opacity: 1;   transform: translateY(-4px); }
        }
        .animate-fade-up { animation: fadeUp .6s ease-out both; }
        .animate-fade-up-delay { animation: fadeUp .7s ease-out .1s both; }
        .animate-fade-up-delay-2 { animation: fadeUp .8s ease-out .2s both; }
        .animate-soft-glow { animation: softGlow 2.4s ease-in-out infinite; }
    </style>

    <script>
        // Default: dark mode, kecuali user pernah pilih 'light'
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

    <!-- HERO TENTANG KAMI -->
    <header class="pt-28 pb-16 bg-gradient-to-b from-slate-900 via-slate-900 to-slate-950 text-white relative overflow-hidden">
        <div class="pointer-events-none absolute -right-32 -top-32 w-64 h-64 rounded-full bg-blue-500/20 blur-3xl animate-soft-glow"></div>
        <div class="pointer-events-none absolute -left-32 bottom-0 w-64 h-64 rounded-full bg-emerald-500/10 blur-3xl"></div>

        <div class="max-w-screen-xl mx-auto px-4 relative">
            <div class="grid md:grid-cols-[1.6fr,1.1fr] gap-10 items-center">
                <div class="animate-fade-up">
                    <p class="text-xs font-semibold tracking-widest uppercase text-blue-300 mb-3">
                        Tentang Kami
                    </p>
                    <h1 class="text-3xl md:text-4xl lg:text-5xl font-extrabold tracking-tight mb-4">
                        Ucok University <span class="text-blue-400">Kampus Inovasi</span> untuk Generasi Masa Depan
                    </h1>
                    <p class="text-sm md:text-base text-slate-300 max-w-xl">
                        Ucok University berkomitmen menjadi perguruan tinggi modern berbasis teknologi, 
                        yang melahirkan lulusan berkarakter, unggul, dan siap bersaing secara global.
                    </p>
                    <div class="mt-6 flex flex-wrap gap-3">
                        <span class="inline-flex items-center px-3 py-1 rounded-full bg-blue-500/20 text-blue-200 text-xs font-medium">
                            Akreditasi Institusi A
                        </span>
                        <span class="inline-flex items-center px-3 py-1 rounded-full bg-emerald-500/20 text-emerald-200 text-xs font-medium">
                            Berbasis Teknologi & Inovasi
                        </span>
                        <span class="inline-flex items-center px-3 py-1 rounded-full bg-amber-500/20 text-amber-100 text-xs font-medium">
                            Jaringan Alumni Luas
                        </span>
                    </div>
                </div>

                <div class="bg-slate-900/60 border border-slate-700 rounded-2xl p-5 md:p-6 shadow-xl animate-fade-up-delay">
                    <h2 class="text-lg font-semibold mb-3">Sekilas Ucok University</h2>
                    <dl class="space-y-3 text-sm text-slate-200">
                        <div class="flex items-center justify-between">
                            <dt>Tahun Berdiri</dt>
                            <dd class="font-semibold">20XX</dd>
                        </div>
                        <div class="flex items-center justify-between">
                            <dt>Jumlah Program Studi</dt>
                            <dd class="font-semibold">15+</dd>
                        </div>
                        <div class="flex items-center justify-between">
                            <dt>Jumlah Fakultas</dt>
                            <dd class="font-semibold">5 Fakultas</dd>
                        </div>
                        <div class="flex items-center justify-between">
                            <dt>Alumni</dt>
                            <dd class="font-semibold">5.000+ Lulusan</dd>
                        </div>
                    </dl>
                    <p class="mt-4 text-xs text-slate-400 border-t border-slate-700 pt-3">
                        Data di atas bersifat ilustratif dan dapat disesuaikan dengan kondisi aktual kampus.
                    </p>
                </div>
            </div>
        </div>
    </header>

    <!-- VISI & MISI -->
    <section class="bg-slate-50 dark:bg-slate-950 border-b border-slate-200 dark:border-slate-800 py-16">
        <div class="max-w-screen-xl mx-auto px-4 grid md:grid-cols-2 gap-10 items-start">
            <div class="animate-fade-up">
                <h2 class="text-2xl font-extrabold text-slate-900 dark:text-white mb-4">
                    Visi
                </h2>
                <p class="text-sm md:text-base text-slate-600 dark:text-slate-300 leading-relaxed">
                    Menjadi perguruan tinggi unggul berbasis teknologi dan riset terapan yang berkontribusi 
                    nyata bagi pembangunan bangsa dan masyarakat global.
                </p>
            </div>
            <div class="animate-fade-up-delay">
                <h2 class="text-2xl font-extrabold text-slate-900 dark:text-white mb-4">
                    Misi
                </h2>
                <ul class="space-y-3 text-sm md:text-base text-slate-600 dark:text-slate-300">
                    <li class="flex gap-2">
                        <span class="mt-1 w-2 h-2 rounded-full bg-blue-500"></span>
                        <span>Menyelenggarakan pendidikan tinggi yang berkualitas dan relevan dengan kebutuhan industri.</span>
                    </li>
                    <li class="flex gap-2">
                        <span class="mt-1 w-2 h-2 rounded-full bg-blue-500"></span>
                        <span>Mengembangkan riset dan inovasi yang aplikatif di bidang sains, teknologi, dan sosial.</span>
                    </li>
                    <li class="flex gap-2">
                        <span class="mt-1 w-2 h-2 rounded-full bg-blue-500"></span>
                        <span>Melaksanakan pengabdian kepada masyarakat berbasis ilmu pengetahuan dan teknologi.</span>
                    </li>
                    <li class="flex gap-2">
                        <span class="mt-1 w-2 h-2 rounded-full bg-blue-500"></span>
                        <span>Membangun jejaring kolaboratif dengan dunia usaha, industri, pemerintah, dan lembaga internasional.</span>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <!-- SEJARAH SINGKAT -->
    <section class="bg-slate-50 dark:bg-slate-950 py-12">
        <div class="max-w-screen-xl mx-auto px-4 grid md:grid-cols-[1.3fr,1.1fr] gap-10 items-start">
            <div class="animate-fade-up">
                <h2 class="text-2xl font-extrabold text-slate-900 dark:text-white mb-4">
                    Sejarah Singkat
                </h2>
                <p class="text-sm md:text-base text-slate-600 dark:text-slate-300 leading-relaxed mb-3">
                    Ucok University didirikan sebagai respon terhadap kebutuhan pendidikan tinggi yang adaptif 
                    terhadap perkembangan teknologi informasi dan industri kreatif. Sejak awal berdiri, kampus ini 
                    menempatkan inovasi, integritas, dan kolaborasi sebagai nilai utama dalam setiap aktivitas akademik.
                </p>
                <p class="text-sm md:text-base text-slate-600 dark:text-slate-300 leading-relaxed">
                    Dengan dukungan yayasan yang kuat, jajaran pimpinan yang visioner, serta dosen dan tenaga kependidikan 
                    yang profesional, Ucok University terus bertransformasi menjadi kampus yang kompetitif di tingkat nasional 
                    maupun internasional.
                </p>
            </div>
            <div class="animate-fade-up-delay">
                <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-2xl p-5 shadow-sm">
                    <h3 class="text-sm font-semibold text-slate-900 dark:text-white mb-2">Nilai Utama (Core Values)</h3>
                    <ul class="text-sm text-slate-600 dark:text-slate-300 space-y-2">
                        <li><span class="font-semibold text-blue-600 dark:text-blue-400">INTEGRITAS</span> — menjunjung tinggi etika dan kejujuran.</li>
                        <li><span class="font-semibold text-blue-600 dark:text-blue-400">INOVASI</span> — mendorong kreativitas dan pembaruan.</li>
                        <li><span class="font-semibold text-blue-600 dark:text-blue-400">KOLABORASI</span> — membangun kerja sama lintas disiplin.</li>
                        <li><span class="font-semibold text-blue-600 dark:text-blue-400">KEUNGGULAN</span> — berorientasi pada mutu dan prestasi.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- STRUKTUR ORGANISASI -->
    <section class="bg-white dark:bg-slate-900 border-t border-b border-slate-100 dark:border-slate-800 py-16">
        <div class="max-w-screen-xl mx-auto px-4 space-y-10">
            <div class="text-center animate-fade-up">
                <span class="inline-flex items-center px-3 py-1 rounded-full bg-blue-100 dark:bg-blue-900/40 text-blue-700 dark:text-blue-300 text-xs font-semibold tracking-wide uppercase">
                    Struktur Organisasi
                </span>
                <h2 class="mt-3 text-2xl md:text-3xl font-extrabold text-slate-900 dark:text-white">
                    Pimpinan Yayasan & Universitas
                </h2>
                <p class="mt-3 text-sm md:text-base text-slate-500 dark:text-slate-400 max-w-2xl mx-auto">
                    Struktur organisasi Ucok University dibangun untuk memastikan tata kelola yang profesional, 
                    transparan, dan akuntabel, dari tingkat yayasan hingga program studi.
                </p>
            </div>

            <!-- BAGIAN PIMPINAN UTAMA -->
            <div class="max-w-3xl mx-auto animate-fade-up-delay">
                <div class="flex flex-col items-center gap-6">

                    <!-- Ketua Yayasan -->
                    <div class="relative w-full">
                        <div class="bg-slate-50 dark:bg-slate-950 border border-slate-200 dark:border-slate-800 rounded-2xl p-5 text-center shadow-sm">
                            <p class="text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wide">
                                Ketua Yayasan
                            </p>
                            <p class="mt-1 text-lg font-bold text-slate-900 dark:text-white">
                                Prof. Dr. William Tanuwijaya, M.Sc., M.Si., M.Pd.
                            </p>
                            <p class="mt-1 text-xs text-slate-500 dark:text-slate-400">
                                Penanggung jawab utama arah kebijakan yayasan dan pengembangan universitas.
                            </p>
                        </div>
                        <!-- garis ke bawah -->
                        <div class="h-6 w-px bg-slate-300 dark:bg-slate-700 mx-auto"></div>
                    </div>

                    <!-- Rektor -->
                    <div class="relative w-full">
                        <div class="bg-slate-50 dark:bg-slate-950 border border-slate-200 dark:border-slate-800 rounded-2xl p-5 text-center shadow-sm">
                            <p class="text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wide">
                                Rektor
                            </p>
                            <p class="mt-1 text-lg font-bold text-slate-900 dark:text-white">
                                Dr. Ir. Christofer Evan Setiawan, M.T.
                            </p>
                            <p class="mt-1 text-xs text-slate-500 dark:text-slate-400">
                                Pemimpin tertinggi universitas yang mengelola penyelenggaraan pendidikan tinggi.
                            </p>
                        </div>
                        <!-- garis ke bawah -->
                        <div class="h-6 w-px bg-slate-300 dark:bg-slate-700 mx-auto"></div>
                    </div>

                    <!-- WAKIL REKTOR -->
                    <div class="w-full">
                        <p class="text-center text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase mb-3 tracking-wide">
                            Wakil Rektor
                        </p>
                        <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-4">
                            <div class="bg-slate-50 dark:bg-slate-950 border border-slate-200 dark:border-slate-800 rounded-2xl p-4 text-center text-xs shadow-sm">
                                <p class="font-semibold text-slate-900 dark:text-white">Wakil Rektor I</p>
                                <p class="mt-1 text-[11px] text-slate-500 dark:text-slate-400">Bidang Akademik</p>
                                <p class="mt-2 text-[11px] text-slate-500 dark:text-slate-400">Andhika Rizky Cahya Putra, M.Kom., Ph.D.</p>
                            </div>
                            <div class="bg-slate-50 dark:bg-slate-950 border border-slate-200 dark:border-slate-800 rounded-2xl p-4 text-center text-xs shadow-sm">
                                <p class="font-semibold text-slate-900 dark:text-white">Wakil Rektor II</p>
                                <p class="mt-1 text-[11px] text-slate-500 dark:text-slate-400">Bidang Administrasi & Keuangan</p>
                                <p class="mt-2 text-[11px] text-slate-500 dark:text-slate-400">Verino Aditya, M.Si., M.Kom., Ph.D.</p>
                            </div>
                            <div class="bg-slate-50 dark:bg-slate-950 border border-slate-200 dark:border-slate-800 rounded-2xl p-4 text-center text-xs shadow-sm">
                                <p class="font-semibold text-slate-900 dark:text-white">Wakil Rektor III</p>
                                <p class="mt-1 text-[11px] text-slate-500 dark:text-slate-400">Bidang Kemahasiswaan</p>
                                <p class="mt-2 text-[11px] text-slate-500 dark:text-slate-400">DR. Jovansa Putra Laksamana, M.T., M.Kom.</p>
                            </div>
                            <div class="bg-slate-50 dark:bg-slate-950 border border-slate-200 dark:border-slate-800 rounded-2xl p-4 text-center text-xs shadow-sm">
                                <p class="font-semibold text-slate-900 dark:text-white">Wakil Rektor IV</p>
                                <p class="mt-1 text-[11px] text-slate-500 dark:text-slate-400">Bidang Kerja Sama & Inovasi</p>
                                <p class="mt-2 text-[11px] text-slate-500 dark:text-slate-400">Ir. Chandra Saputra, S.Kom., M.T.I.</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- PARA KAPRODI -->
            <div class="space-y-6 animate-fade-up-delay-2">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                    <div>
                        <h3 class="text-xl font-extrabold text-slate-900 dark:text-white">
                            Ketua Program Studi (Kaprodi)
                        </h3>
                        <p class="mt-1 text-sm text-slate-500 dark:text-slate-400 max-w-xl">
                            Kaprodi bertanggung jawab atas pengelolaan akademik di tingkat program studi, 
                            mulai dari kurikulum, proses pembelajaran, hingga pengembangan mutu.
                        </p>
                    </div>
                    <p class="text-xs text-slate-500 dark:text-slate-400">
                        *Nama & prodi di bawah ini dapat disesuaikan dengan data aktual kampus.
                    </p>
                </div>

                <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-3">
                    <!-- Contoh kaprodi statis, silakan diganti -->
                    <article class="bg-slate-50 dark:bg-slate-950 border border-slate-200 dark:border-slate-800 rounded-2xl p-4 text-sm shadow-sm">
                        <p class="text-[11px] font-semibold text-blue-600 dark:text-blue-400 uppercase tracking-wide">
                            Kaprodi S1 Informatika
                        </p>
                        <p class="mt-1 text-sm font-bold text-slate-900 dark:text-white">
                            Nama Kaprodi Informatika
                        </p>
                        <p class="mt-2 text-xs text-slate-500 dark:text-slate-400">
                            Fokus pada pengembangan kurikulum, riset, dan kerja sama di bidang Informatika.
                        </p>
                    </article>

                    <article class="bg-slate-50 dark:bg-slate-950 border border-slate-200 dark:border-slate-800 rounded-2xl p-4 text-sm shadow-sm">
                        <p class="text-[11px] font-semibold text-blue-600 dark:text-blue-400 uppercase tracking-wide">
                            Kaprodi S1 Sistem Informasi
                        </p>
                        <p class="mt-1 text-sm font-bold text-slate-900 dark:text-white">
                            Nama Kaprodi Sistem Informasi
                        </p>
                        <p class="mt-2 text-xs text-slate-500 dark:text-slate-400">
                            Mengelola program studi yang mengintegrasikan teknologi informasi dengan proses bisnis.
                        </p>
                    </article>

                    <article class="bg-slate-50 dark:bg-slate-950 border border-slate-200 dark:border-slate-800 rounded-2xl p-4 text-sm shadow-sm">
                        <p class="text-[11px] font-semibold text-blue-600 dark:text-blue-400 uppercase tracking-wide">
                            Kaprodi D3 Manajemen Informatika
                        </p>
                        <p class="mt-1 text-sm font-bold text-slate-900 dark:text-white">
                            Nama Kaprodi Manajemen Informatika
                        </p>
                        <p class="mt-2 text-xs text-slate-500 dark:text-slate-400">
                            Berfokus pada kompetensi vokasi di bidang pengelolaan sistem informasi.
                        </p>
                    </article>

                    <article class="bg-slate-50 dark:bg-slate-950 border border-slate-200 dark:border-slate-800 rounded-2xl p-4 text-sm shadow-sm">
                        <p class="text-[11px] font-semibold text-blue-600 dark:text-blue-400 uppercase tracking-wide">
                            Kaprodi S1 Manajemen
                        </p>
                        <p class="mt-1 text-sm font-bold text-slate-900 dark:text-white">
                            Nama Kaprodi Manajemen
                        </p>
                        <p class="mt-2 text-xs text-slate-500 dark:text-slate-400">
                            Mengembangkan kualitas pembelajaran di bidang manajemen dan kewirausahaan.
                        </p>
                    </article>

                    <article class="bg-slate-50 dark:bg-slate-950 border border-slate-200 dark:border-slate-800 rounded-2xl p-4 text-sm shadow-sm">
                        <p class="text-[11px] font-semibold text-blue-600 dark:text-blue-400 uppercase tracking-wide">
                            Kaprodi S1 Akuntansi
                        </p>
                        <p class="mt-1 text-sm font-bold text-slate-900 dark:text-white">
                            Nama Kaprodi Akuntansi
                        </p>
                        <p class="mt-2 text-xs text-slate-500 dark:text-slate-400">
                            Mengelola pengembangan akademik di bidang akuntansi dan keuangan.
                        </p>
                    </article>
                </div>
            </div>
        </div>
    </section>

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
                    <a href="{{ url('/prodi') }}" class="hover:text-blue-400 hover:underline transition">Program Studi</a>
                    <a href="{{ url('/bantuan') }}" class="hover:text-blue-400 hover:underline transition">Bantuan</a>
                    <a href="{{ url('/tentangkami') }}" class="hover:text-blue-400 hover:underline transition">Tentang Kami</a>
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
