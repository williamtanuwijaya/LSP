<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Program Beasiswa - Ucok University</title>

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
        /* ===== ANIMASI & UTILS ===== */
        @keyframes fadeUp { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
        .animate-fade-up { animation: fadeUp 0.7s ease-out both; }
        
        /* Class Parallax CSS (Fixed Background) */
        .parallax-hero {
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        /* Styling khusus untuk FAQ detail/summary yang smooth */
        details > summary {
            list-style: none;
        }
        details > summary::-webkit-details-marker {
            display: none;
        }
        details[open] summary ~ * {
            animation: sweep .3s ease-in-out;
        }
        @keyframes sweep {
            0%    {opacity: 0; transform: translateY(-10px)}
            100%  {opacity: 1; transform: translateY(0)}
        }
    </style>

    <script>
        if (localStorage.getItem('theme') === 'light') {
            document.documentElement.classList.remove('dark');
        } else {
            document.documentElement.classList.add('dark');
            localStorage.setItem('theme', 'dark');
        }
    </script>
</head>
<body class="antialiased font-sans text-slate-600 dark:text-slate-300 bg-slate-50 dark:bg-slate-950 transition-colors duration-300">

    <nav class="fixed w-full z-50 top-0 start-0 bg-white/90 dark:bg-slate-900/90 backdrop-blur-md border-b border-slate-200 dark:border-slate-800 shadow-sm">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="/" class="flex items-center gap-2">
                <span class="self-center text-xl font-bold whitespace-nowrap text-slate-900 dark:text-white tracking-tight">Ucok University</span>
            </a>
            
            <div class="flex items-center gap-3">
                <a href="{{ route('register') }}" class="hidden md:block text-white bg-blue-600 hover:bg-blue-700 font-medium rounded-lg text-sm px-5 py-2.5 transition shadow-lg shadow-blue-600/30">Daftar Akun</a>
                <button onclick="toggleTheme()" class="p-2 rounded-lg bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-200 hover:bg-slate-200 dark:hover:bg-slate-700 transition">
                    <svg class="hidden dark:block w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 0 8 0z"></path></svg>
                    <svg class="block dark:hidden w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path></svg>
                </button>
            </div>
        </div>
    </nav>

    <header class="parallax-hero relative h-[60vh] flex items-center justify-center text-center text-white" 
            style="background-image: url('https://images.unsplash.com/photo-1523050854058-8df90110c9f1?q=80&w=1920&auto=format&fit=crop');">
        <div class="absolute inset-0 bg-slate-900/70"></div>
        
        <div class="relative z-10 px-4 max-w-4xl mx-auto animate-fade-up">
            <span class="text-blue-400 font-bold tracking-wider uppercase text-sm mb-2 block">Scholarship Program 2025</span>
            <h1 class="text-4xl md:text-6xl font-extrabold mb-6 leading-tight">
                Raih Pendidikan Berkualitas <br> Tanpa Batas Biaya
            </h1>
            <p class="text-slate-200 text-lg md:text-xl max-w-2xl mx-auto mb-8">
                Ucok University berkomitmen mencetak generasi emas melalui berbagai program beasiswa penuh dan parsial bagi putra-putri terbaik bangsa.
            </p>
            <a href="#jenis-beasiswa" class="px-8 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-full transition shadow-lg shadow-blue-600/50">
                Lihat Pilihan Beasiswa
            </a>
        </div>
    </header>

    <div class="relative z-20 -mt-10 max-w-5xl mx-auto px-4">
        <div class="bg-white dark:bg-slate-800 rounded-xl shadow-xl p-8 grid grid-cols-1 md:grid-cols-3 gap-8 border border-slate-100 dark:border-slate-700 text-center">
            <div>
                <div class="text-3xl font-extrabold text-blue-600 dark:text-blue-400">500+</div>
                <div class="text-sm font-medium text-slate-500 dark:text-slate-400 uppercase mt-1">Penerima Beasiswa</div>
            </div>
            <div class="md:border-x border-slate-200 dark:border-slate-700">
                <div class="text-3xl font-extrabold text-blue-600 dark:text-blue-400">100%</div>
                <div class="text-sm font-medium text-slate-500 dark:text-slate-400 uppercase mt-1">Bebas Uang Gedung</div>
            </div>
            <div>
                <div class="text-3xl font-extrabold text-blue-600 dark:text-blue-400">3</div>
                <div class="text-sm font-medium text-slate-500 dark:text-slate-400 uppercase mt-1">Kategori Utama</div>
            </div>
        </div>
    </div>

    <main class="max-w-screen-xl mx-auto px-4 py-20 space-y-24">
        
        <section id="jenis-beasiswa">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-slate-900 dark:text-white">Pilih Program Beasiswa</h2>
                <p class="mt-4 text-slate-500 dark:text-slate-400">Temukan skema bantuan pendidikan yang paling sesuai dengan kualifikasi Anda.</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white dark:bg-slate-900 rounded-2xl p-6 shadow-lg border border-slate-200 dark:border-slate-800 hover:border-blue-500 dark:hover:border-blue-500 transition duration-300 group">
                    <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900/50 rounded-lg flex items-center justify-center text-blue-600 dark:text-blue-400 mb-4 group-hover:scale-110 transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.384-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-2">Beasiswa Generasi Emas</h3>
                    <p class="text-slate-500 dark:text-slate-400 text-sm mb-4">Untuk siswa dengan prestasi akademik luar biasa (Ranking 1-3 Umum) atau juara olimpiade tingkat nasional.</p>
                    <ul class="text-sm space-y-2 mb-6 text-slate-600 dark:text-slate-300">
                        <li class="flex items-center gap-2"><span class="text-green-500">✓</span> Bebas SPP 8 Semester</li>
                        <li class="flex items-center gap-2"><span class="text-green-500">✓</span> Uang Saku Bulanan</li>
                    </ul>
                    <a href="#" class="block w-full py-2 text-center border border-blue-600 text-blue-600 dark:text-blue-400 rounded-lg font-semibold hover:bg-blue-600 hover:text-white transition">Detail Persyaratan</a>
                </div>

                <div class="bg-white dark:bg-slate-900 rounded-2xl p-6 shadow-lg border border-slate-200 dark:border-slate-800 hover:border-purple-500 dark:hover:border-purple-500 transition duration-300 group">
                    <div class="w-12 h-12 bg-purple-100 dark:bg-purple-900/50 rounded-lg flex items-center justify-center text-purple-600 dark:text-purple-400 mb-4 group-hover:scale-110 transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-2">Beasiswa Bakat & Seni</h3>
                    <p class="text-slate-500 dark:text-slate-400 text-sm mb-4">Ditujukan bagi penghafal Al-Qur'an (Min. 5 Juz) atau atlet/seniman berprestasi tingkat provinsi.</p>
                    <ul class="text-sm space-y-2 mb-6 text-slate-600 dark:text-slate-300">
                        <li class="flex items-center gap-2"><span class="text-green-500">✓</span> Potongan SPP 50-100%</li>
                        <li class="flex items-center gap-2"><span class="text-green-500">✓</span> Prioritas Asrama</li>
                    </ul>
                    <a href="#" class="block w-full py-2 text-center border border-purple-600 text-purple-600 dark:text-purple-400 rounded-lg font-semibold hover:bg-purple-600 hover:text-white transition">Detail Persyaratan</a>
                </div>

                <div class="bg-white dark:bg-slate-900 rounded-2xl p-6 shadow-lg border border-slate-200 dark:border-slate-800 hover:border-teal-500 dark:hover:border-teal-500 transition duration-300 group">
                    <div class="w-12 h-12 bg-teal-100 dark:bg-teal-900/50 rounded-lg flex items-center justify-center text-teal-600 dark:text-teal-400 mb-4 group-hover:scale-110 transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-2">Beasiswa Peduli Negeri</h3>
                    <p class="text-slate-500 dark:text-slate-400 text-sm mb-4">Bantuan pendidikan khusus bagi calon mahasiswa yang memiliki keterbatasan ekonomi namun bertekad kuat.</p>
                    <ul class="text-sm space-y-2 mb-6 text-slate-600 dark:text-slate-300">
                        <li class="flex items-center gap-2"><span class="text-green-500">✓</span> Bebas Uang Pangkal</li>
                        <li class="flex items-center gap-2"><span class="text-green-500">✓</span> Subsidi SPP Bertahap</li>
                    </ul>
                    <a href="#" class="block w-full py-2 text-center border border-teal-600 text-teal-600 dark:text-teal-400 rounded-lg font-semibold hover:bg-teal-600 hover:text-white transition">Detail Persyaratan</a>
                </div>
            </div>
        </section>

        <section class="grid lg:grid-cols-2 gap-12 items-start">
            <div>
                <h3 class="text-2xl font-bold text-slate-900 dark:text-white mb-6 flex items-center gap-2">
                    <span class="flex items-center justify-center w-8 h-8 rounded-full bg-blue-600 text-white text-sm">📅</span>
                    Timeline Seleksi
                </h3>
                <div class="relative border-l border-slate-200 dark:border-slate-700 ml-4 space-y-8">
                    <div class="ml-6 relative">
                        <span class="absolute -left-[37px] top-1 w-5 h-5 bg-green-500 rounded-full border-4 border-white dark:border-slate-950"></span>
                        <h4 class="font-bold text-slate-900 dark:text-white">Pendaftaran Online</h4>
                        <p class="text-sm text-slate-500">1 Januari - 31 Maret 2025</p>
                        <p class="text-slate-600 dark:text-slate-400 mt-1 text-sm">Unggah berkas rapor dan sertifikat melalui portal pendaftaran.</p>
                    </div>
                    <div class="ml-6 relative">
                        <span class="absolute -left-[37px] top-1 w-5 h-5 bg-slate-300 dark:bg-slate-700 rounded-full border-4 border-white dark:border-slate-950"></span>
                        <h4 class="font-bold text-slate-900 dark:text-white">Seleksi Berkas & Wawancara</h4>
                        <p class="text-sm text-slate-500">1 April - 15 April 2025</p>
                    </div>
                    <div class="ml-6 relative">
                        <span class="absolute -left-[37px] top-1 w-5 h-5 bg-slate-300 dark:bg-slate-700 rounded-full border-4 border-white dark:border-slate-950"></span>
                        <h4 class="font-bold text-slate-900 dark:text-white">Pengumuman Kelulusan</h4>
                        <p class="text-sm text-slate-500">30 April 2025</p>
                    </div>
                </div>
            </div>

            <div class="bg-slate-100 dark:bg-slate-800/50 p-8 rounded-2xl">
                <h3 class="text-2xl font-bold text-slate-900 dark:text-white mb-6">Persyaratan Umum</h3>
                <ul class="space-y-4">
                    <li class="flex items-start gap-3">
                        <div class="mt-1 min-w-[20px] text-blue-500">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <span class="text-slate-700 dark:text-slate-300">Warga Negara Indonesia (WNI) dan berdomisili di Indonesia.</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <div class="mt-1 min-w-[20px] text-blue-500">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <span class="text-slate-700 dark:text-slate-300">Lulusan SMA/SMK/MA sederajat tahun 2023, 2024, atau 2025.</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <div class="mt-1 min-w-[20px] text-blue-500">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <span class="text-slate-700 dark:text-slate-300">Tidak sedang menerima beasiswa dari pihak lain.</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <div class="mt-1 min-w-[20px] text-blue-500">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <span class="text-slate-700 dark:text-slate-300">Sehat jasmani dan rohani serta bebas narkoba.</span>
                    </li>
                </ul>
                <div class="mt-8">
                    <a href="{{ route('download.brosur.img') }}"  
                      class="text-blue-600 hover:text-blue-700 dark:text-blue-400 font-semibold flex items-center gap-1 group transition-colors">
                        
                        Download Brosur Lengkap 
                        
                        <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </section>

        <section class="max-w-3xl mx-auto">
            <h2 class="text-3xl font-bold text-center text-slate-900 dark:text-white mb-8">Pertanyaan Sering Diajukan</h2>
            
            <div class="space-y-4">
                <details class="group bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-xl overflow-hidden shadow-sm">
                    <summary class="flex justify-between items-center font-medium cursor-pointer p-5 text-slate-900 dark:text-slate-100 hover:bg-slate-50 dark:hover:bg-slate-800/50 transition">
                        <span>Apakah beasiswa ini mencakup biaya hidup (Living Cost)?</span>
                        <span class="transition group-open:rotate-180">
                            <svg fill="none" height="24" shape-rendering="geometricPrecision" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" width="24"><path d="M6 9l6 6 6-6"></path></svg>
                        </span>
                    </summary>
                    <div class="text-slate-600 dark:text-slate-400 p-5 pt-0 leading-relaxed border-t border-transparent group-open:border-slate-100 dark:group-open:border-slate-800">
                        Untuk Beasiswa Generasi Emas, biaya hidup bulanan sudah termasuk. Namun untuk kategori Bakat & Seni serta Peduli Negeri, bantuan difokuskan pada pembebasan biaya akademik (SPP dan Uang Gedung).
                    </div>
                </details>

                <details class="group bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-xl overflow-hidden shadow-sm">
                    <summary class="flex justify-between items-center font-medium cursor-pointer p-5 text-slate-900 dark:text-slate-100 hover:bg-slate-50 dark:hover:bg-slate-800/50 transition">
                        <span>Apakah nilai rapor semester 6 wajib dilampirkan?</span>
                        <span class="transition group-open:rotate-180">
                            <svg fill="none" height="24" shape-rendering="geometricPrecision" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" width="24"><path d="M6 9l6 6 6-6"></path></svg>
                        </span>
                    </summary>
                    <div class="text-slate-600 dark:text-slate-400 p-5 pt-0 leading-relaxed border-t border-transparent group-open:border-slate-100 dark:group-open:border-slate-800">
                        Bagi pendaftar yang belum menerima rapor semester 6, dapat menggunakan rapor semester 1-5. Nilai semester 6 dapat disusulkan setelah kelulusan resmi dari sekolah.
                    </div>
                </details>
                
                <details class="group bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-xl overflow-hidden shadow-sm">
                    <summary class="flex justify-between items-center font-medium cursor-pointer p-5 text-slate-900 dark:text-slate-100 hover:bg-slate-50 dark:hover:bg-slate-800/50 transition">
                        <span>Bagaimana jika saya mengundurkan diri setelah diterima?</span>
                        <span class="transition group-open:rotate-180">
                            <svg fill="none" height="24" shape-rendering="geometricPrecision" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" width="24"><path d="M6 9l6 6 6-6"></path></svg>
                        </span>
                    </summary>
                    <div class="text-slate-600 dark:text-slate-400 p-5 pt-0 leading-relaxed border-t border-transparent group-open:border-slate-100 dark:group-open:border-slate-800">
                        Calon mahasiswa yang telah melakukan daftar ulang dan mengundurkan diri akan dikenakan penalti administratif sesuai ketentuan yang berlaku di Ucok University.
                    </div>
                </details>
            </div>
        </section>

    </main>

    <footer class="bg-slate-900 dark:bg-slate-950 text-white pt-16 pb-8 border-t-4 border-blue-600">
        <div class="max-w-screen-xl mx-auto px-4 text-center">
            <h2 class="text-2xl font-bold mb-4">Siap Mengukir Prestasi?</h2>
            <p class="text-slate-400 mb-8 max-w-lg mx-auto">Jangan lewatkan kesempatan emas ini. Bergabunglah bersama kami dan jadilah pemimpin masa depan.</p>
            <a href="{{ route('register') }}" class="inline-block px-8 py-3 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-lg transition transform hover:-translate-y-1">Daftar Sekarang</a>
            
            <div class="border-t border-slate-800 pt-8 mt-12">
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