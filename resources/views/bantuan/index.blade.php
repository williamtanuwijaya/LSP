<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bantuan PMB - Ucok University</title>

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

    <!-- HERO BANTUAN -->
    <header class="pt-28 pb-16 bg-gradient-to-b from-slate-900 via-slate-900 to-slate-950 text-white relative overflow-hidden">
        <div class="pointer-events-none absolute -right-32 -top-32 w-64 h-64 rounded-full bg-blue-500/20 blur-3xl animate-soft-glow"></div>
        <div class="pointer-events-none absolute -left-32 bottom-0 w-64 h-64 rounded-full bg-emerald-500/10 blur-3xl"></div>

        <div class="max-w-screen-xl mx-auto px-4 relative">
            <div class="grid md:grid-cols-[1.6fr,1.1fr] gap-10 items-center">
                <div class="animate-fade-up">
                    <p class="text-xs font-semibold tracking-widest uppercase text-blue-300 mb-3">
                        Pusat Bantuan PMB
                    </p>
                    <h1 class="text-3xl md:text-4xl lg:text-5xl font-extrabold tracking-tight mb-4">
                        Ada Pertanyaan seputar <span class="text-blue-400">Penerimaan Mahasiswa Baru?</span>
                    </h1>
                    <p class="text-sm md:text-base text-slate-300 max-w-xl">
                        Temukan jawaban mengenai pendaftaran, akun, pembayaran, dan seleksi di halaman bantuan ini. 
                        Jika masih bingung, tim kami siap membantu melalui kontak resmi.
                    </p>

                    <div class="mt-6 flex flex-wrap gap-3">
                        <a href="#faq" class="inline-flex items-center px-4 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-sm font-semibold text-white shadow-lg shadow-blue-600/40 transition">
                            Lihat FAQ PMB
                        </a>
                        <a href="#kontak" class="inline-flex items-center px-4 py-2.5 rounded-xl border border-white/30 bg-white/5 hover:bg-white/10 text-sm font-semibold text-white transition">
                            Hubungi Kami
                        </a>
                    </div>
                </div>

                <div class="bg-slate-900/60 border border-slate-700 rounded-2xl p-5 md:p-6 shadow-xl animate-fade-up-delay">
                    <h2 class="text-lg font-semibold mb-3">Ringkasan Bantuan Cepat</h2>
                    <ul class="space-y-3 text-sm text-slate-200">
                        <li class="flex items-start gap-3">
                            <span class="mt-1 inline-flex items-center justify-center w-6 h-6 rounded-full bg-blue-600 text-xs font-bold">1</span>
                            <div>
                                <p class="font-semibold">Belum bisa login ke akun?</p>
                                <p class="text-slate-300 text-xs">Coba fitur lupa kata sandi atau hubungi admin PMB.</p>
                            </div>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="mt-1 inline-flex items-center justify-center w-6 h-6 rounded-full bg-emerald-500 text-xs font-bold">2</span>
                            <div>
                                <p class="font-semibold">Bingung cara upload berkas & bukti bayar?</p>
                                <p class="text-slate-300 text-xs">Ikuti panduan langkah demi langkah di FAQ.</p>
                            </div>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="mt-1 inline-flex items-center justify-center w-6 h-6 rounded-full bg-amber-500 text-xs font-bold">3</span>
                            <div>
                                <p class="font-semibold">Belum menerima pengumuman?</p>
                                <p class="text-slate-300 text-xs">Cek jadwal resmi dan status pendaftaran secara berkala.</p>
                            </div>
                        </li>
                    </ul>

                    <div class="mt-5 text-xs text-slate-400 border-t border-slate-700 pt-3">
                        Halaman ini diperbarui mengikuti kebijakan terbaru PMB Ucok University.
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- SECTION LANGKAH PMB SINGKAT -->
    <section class="bg-slate-50 dark:bg-slate-950 border-b border-slate-200 dark:border-slate-800 py-10">
        <div class="max-w-screen-xl mx-auto px-4">
            <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-6 mb-6 animate-fade-up">
                <div>
                    <p class="text-xs font-semibold tracking-widest uppercase text-slate-500 dark:text-slate-400">
                        Panduan Singkat
                    </p>
                    <h2 class="text-lg md:text-xl font-bold text-slate-900 dark:text-white">
                        Alur Pendaftaran Mahasiswa Baru
                    </h2>
                </div>
            </div>

            <div class="grid md:grid-cols-4 gap-4 text-sm">
                <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-2xl p-4 flex flex-col gap-2 animate-fade-up">
                    <span class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-blue-600 text-white text-xs font-bold">1</span>
                    <h3 class="font-semibold text-slate-900 dark:text-white">Buat Akun PMB</h3>
                    <p class="text-slate-500 dark:text-slate-400 text-xs">Daftar melalui portal PMB dan verifikasi email yang digunakan.</p>
                </div>
                <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-2xl p-4 flex flex-col gap-2 animate-fade-up" style="animation-delay: .06s;">
                    <span class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-blue-600 text-white text-xs font-bold">2</span>
                    <h3 class="font-semibold text-slate-900 dark:text-white">Lengkapi Biodata</h3>
                    <p class="text-slate-500 dark:text-slate-400 text-xs">Isi formulir, pilih program studi, dan upload berkas yang diminta.</p>
                </div>
                <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-2xl p-4 flex flex-col gap-2 animate-fade-up" style="animation-delay: .12s;">
                    <span class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-blue-600 text-white text-xs font-bold">3</span>
                    <h3 class="font-semibold text-slate-900 dark:text-white">Lakukan Pembayaran</h3>
                    <p class="text-slate-500 dark:text-slate-400 text-xs">Bayar biaya pendaftaran, upload bukti transfer, dan tunggu verifikasi.</p>
                </div>
                <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-2xl p-4 flex flex-col gap-2 animate-fade-up" style="animation-delay: .18s;">
                    <span class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-blue-600 text-white text-xs font-bold">4</span>
                    <h3 class="font-semibold text-slate-900 dark:text-white">Ikuti Seleksi & Cek Pengumuman</h3>
                    <p class="text-slate-500 dark:text-slate-400 text-xs">Ikuti tes (jika ada) dan pantau pengumuman hasil seleksi di portal.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ -->
    <section id="faq" class="bg-slate-50 dark:bg-slate-950 py-16">
        <div class="max-w-screen-xl mx-auto px-4 space-y-10">
            <div class="text-center animate-fade-up">
                <span class="inline-flex items-center px-3 py-1 rounded-full bg-blue-100 dark:bg-blue-900/40 text-blue-700 dark:text-blue-300 text-xs font-semibold tracking-wide uppercase">
                    FAQ PMB
                </span>
                <h2 class="mt-3 text-2xl md:text-3xl font-extrabold text-slate-900 dark:text-white">
                    Pertanyaan yang Sering Diajukan
                </h2>
                <p class="mt-3 text-sm md:text-base text-slate-500 dark:text-slate-400 max-w-2xl mx-auto">
                    Jika pertanyaanmu belum terjawab di sini, kamu bisa menghubungi tim PMB melalui kontak yang tersedia.
                </p>
            </div>

            <div class="max-w-3xl mx-auto space-y-3">
                <!-- Item FAQ -->
                <div class="border border-slate-200 dark:border-slate-800 rounded-2xl bg-white dark:bg-slate-900 overflow-hidden">
                    <button type="button" class="faq-toggle w-full flex items-center justify-between px-4 md:px-5 py-3 md:py-4 text-left">
                        <div class="flex items-center gap-3">
                            <span class="inline-flex items-center justify-center w-6 h-6 rounded-full bg-blue-600 text-white text-xs font-bold">1</span>
                            <span class="font-semibold text-sm md:text-base text-slate-900 dark:text-white">Bagaimana cara membuat akun PMB?</span>
                        </div>
                        <svg class="w-5 h-5 text-slate-500 dark:text-slate-400 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="faq-content px-4 md:px-5 pb-4 text-sm text-slate-600 dark:text-slate-300 hidden">
                        <p>
                            Buka halaman portal PMB, pilih menu <strong>Daftar</strong>, isi formulir pendaftaran awal 
                            (nama, email, nomor HP), lalu verifikasi akun melalui email yang dikirim sistem.
                        </p>
                    </div>
                </div>        

                <div class="border border-slate-200 dark:border-slate-800 rounded-2xl bg-white dark:bg-slate-900 overflow-hidden">
                    <button type="button" class="faq-toggle w-full flex items-center justify-between px-4 md:px-5 py-3 md:py-4 text-left">
                        <div class="flex items-center gap-3">
                            <span class="inline-flex items-center justify-center w-6 h-6 rounded-full bg-blue-600 text-white text-xs font-bold">2</span>
                            <span class="font-semibold text-sm md:text-base text-slate-900 dark:text-white">Metode pembayaran apa saja yang tersedia?</span>
                        </div>
                        <svg class="w-5 h-5 text-slate-500 dark:text-slate-400 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="faq-content px-4 md:px-5 pb-4 text-sm text-slate-600 dark:text-slate-300 hidden">
                        <p>
                            Informasi lengkap metode pembayaran (transfer bank, virtual account, dan lain-lain) 
                            tercantum di halaman <strong>Instruksi Pembayaran</strong> setelah kamu login ke portal PMB.
                        </p>
                    </div>
                </div>

                <div class="border border-slate-200 dark:border-slate-800 rounded-2xl bg-white dark:bg-slate-900 overflow-hidden">
                    <button type="button" class="faq-toggle w-full flex items-center justify-between px-4 md:px-5 py-3 md:py-4 text-left">
                        <div class="flex items-center gap-3">
                            <span class="inline-flex items-center justify-center w-6 h-6 rounded-full bg-blue-600 text-white text-xs font-bold">3</span>
                            <span class="font-semibold text-sm md:text-base text-slate-900 dark:text-white">Kapan jadwal pengumuman hasil seleksi?</span>
                        </div>
                        <svg class="w-5 h-5 text-slate-500 dark:text-slate-400 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="faq-content px-4 md:px-5 pb-4 text-sm text-slate-600 dark:text-slate-300 hidden">
                        <p>
                            Jadwal resmi pengumuman dapat dilihat pada menu <strong>Pengumuman</strong> di portal PMB 
                            atau di bagian pengumuman utama pada halaman depan.
                        </p>
                    </div>
                </div>

                <div class="border border-slate-200 dark:border-slate-800 rounded-2xl bg-white dark:bg-slate-900 overflow-hidden">
                    <button type="button" class="faq-toggle w-full flex items-center justify-between px-4 md:px-5 py-3 md:py-4 text-left">
                        <div class="flex items-center gap-3">
                            <span class="inline-flex items-center justify-center w-6 h-6 rounded-full bg-blue-600 text-white text-xs font-bold">4</span>
                            <span class="font-semibold text-sm md:text-base text-slate-900 dark:text-white">Saya sudah bayar tapi status belum terverifikasi, kenapa?</span>
                        </div>
                        <svg class="w-5 h-5 text-slate-500 dark:text-slate-400 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="faq-content px-4 md:px-5 pb-4 text-sm text-slate-600 dark:text-slate-300 hidden">
                        <p>
                            Proses verifikasi pembayaran dilakukan oleh admin PMB dalam beberapa waktu kerja. 
                            Pastikan bukti bayar yang diupload jelas. Jika lebih dari 1×24 jam belum berubah, 
                            silakan hubungi kontak resmi.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- KONTAK -->
    <section id="kontak" class="bg-white dark:bg-slate-900 py-16 border-t border-slate-100 dark:border-slate-800">
        <div class="max-w-screen-xl mx-auto px-4 space-y-10">
            <div class="text-center animate-fade-up">
                <span class="inline-flex items-center px-3 py-1 rounded-full bg-emerald-100 dark:bg-emerald-900/40 text-emerald-700 dark:text-emerald-300 text-xs font-semibold tracking-wide uppercase">
                    Kontak Resmi PMB
                </span>
                <h2 class="mt-3 text-2xl md:text-3xl font-extrabold text-slate-900 dark:text-white">
                    Masih Bingung? Tim Kami Siap Membantu
                </h2>
                <p class="mt-3 text-sm md:text-base text-slate-500 dark:text-slate-400 max-w-2xl mx-auto">
                    Hubungi kami melalui email, WhatsApp, atau datang langsung ke kampus pada jam kerja.
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-6">
                <div class="bg-slate-50 dark:bg-slate-950 border border-slate-200 dark:border-slate-800 rounded-2xl p-6 shadow-sm animate-fade-up">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="w-10 h-10 rounded-full bg-blue-600/10 flex items-center justify-center">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12H8m0 0l4 4m-4-4l4-4M3 12a9 9 0 1018 0 9 9 0 00-18 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-slate-900 dark:text-white text-sm">Email Resmi PMB</h3>
                            <p class="text-xs text-slate-500 dark:text-slate-400">Respon 1×24 jam kerja</p>
                        </div>
                    </div>
                    <p class="text-sm text-slate-600 dark:text-slate-300">
                        Kirim pertanyaan, konfirmasi pembayaran, atau kendala teknis ke:
                    </p>
                    <p class="mt-2 text-sm font-semibold text-blue-600 dark:text-blue-400">
                        pmb@ucok.ac.id
                    </p>
                </div>

                <div class="bg-slate-50 dark:bg-slate-950 border border-slate-200 dark:border-slate-800 rounded-2xl p-6 shadow-sm animate-fade-up" style="animation-delay: .08s;">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="w-10 h-10 rounded-full bg-emerald-500/10 flex items-center justify-center">
                            <svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h2.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-1.518.759a11.042 11.042 0 005.517 5.517l.76-1.518a1 1 0 011.21-.502l4.493 1.498A1 1 0 0121 19.72V22a2 2 0 01-2 2h-.25C9.55 24 0 14.45 0 3.25V3a2 2 0 012-2h1z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-slate-900 dark:text-white text-sm">WhatsApp PMB</h3>
                            <p class="text-xs text-slate-500 dark:text-slate-400">Jam kerja: 08.00–16.00 WIB</p>
                        </div>
                    </div>
                    <p class="text-sm text-slate-600 dark:text-slate-300">
                        Konsultasi cepat melalui WhatsApp admin PMB:
                    </p>
                    <p class="mt-2 text-sm font-semibold text-emerald-600 dark:text-emerald-400">
                        0811-2222-3333
                    </p>
                    <p class="mt-1 text-[11px] text-slate-500 dark:text-slate-400">
                        *Nomor ini hanya untuk chat, tidak menerima panggilan.
                    </p>
                </div>

                <div class="bg-slate-50 dark:bg-slate-950 border border-slate-200 dark:border-slate-800 rounded-2xl p-6 shadow-sm animate-fade-up" style="animation-delay: .16s;">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="w-10 h-10 rounded-full bg-amber-500/10 flex items-center justify-center">
                            <svg class="w-5 h-5 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-slate-900 dark:text-white text-sm">Loket PMB Offline</h3>
                            <p class="text-xs text-slate-500 dark:text-slate-400">Senin–Jumat</p>
                        </div>
                    </div>
                    <p class="text-sm text-slate-600 dark:text-slate-300">
                        Datang langsung ke loket PMB Ucok University pada jam kerja:
                    </p>
                    <p class="mt-2 text-sm font-semibold text-slate-900 dark:text-slate-100">
                        Kampus Ucok University<br>
                        Jl. Pendidikan No. 123, Kota Ucok
                    </p>
                    <p class="mt-1 text-[11px] text-slate-500 dark:text-slate-400">
                        Disarankan konfirmasi kedatangan melalui WhatsApp terlebih dahulu.
                    </p>
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
                    <a href="/prodi" class="hover:text-blue-400 hover:underline transition">Program Studi</a>
                    <a href="#faq" class="hover:text-blue-400 hover:underline transition">FAQ</a>
                    <a href="#kontak" class="hover:text-blue-400 hover:underline transition">Kontak</a>
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

        // FAQ Accordion sederhana
        document.addEventListener('DOMContentLoaded', function () {
            const toggles = document.querySelectorAll('.faq-toggle');

            toggles.forEach(btn => {
                btn.addEventListener('click', () => {
                    const content = btn.nextElementSibling;
                    const icon = btn.querySelector('svg');

                    const isOpen = !content.classList.contains('hidden');

                    // Tutup semua dulu
                    document.querySelectorAll('.faq-content').forEach(c => c.classList.add('hidden'));
                    document.querySelectorAll('.faq-toggle svg').forEach(i => i.classList.remove('rotate-180'));

                    // Kalau sebelumnya tertutup, buka; kalau sudah terbuka, biarkan semua tertutup
                    if (!isOpen) {
                        content.classList.remove('hidden');
                        icon.classList.add('rotate-180');
                    }
                });
            });
        });
    </script>
</body>
</html>
