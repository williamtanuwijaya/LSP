<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Penerimaan Mahasiswa Baru - Ucok University</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        fontFamily: {
                            sans: ['Inter', 'sans-serif'],
                        },
                        colors: {
                            // Kita pakai warna standar Tailwind saja untuk tombol agar aman
                            secondary: '#0F172A', 
                        }
                    }
                }
            }
        </script>
    @endif
</head>
<body class="antialiased font-sans text-slate-600 bg-slate-50">

    <nav class="bg-white/90 backdrop-blur-md fixed w-full z-20 top-0 start-0 border-b border-slate-200 shadow-sm">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="#" class="flex items-center rtl:space-x-reverse">
                <span class="self-center text-2xl font-bold whitespace-nowrap text-slate-900">Ucok University</span>
            </a>
            
            <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                <a href="{{ route('login') }}" class="text-slate-900 hover:text-blue-600 font-medium rounded-lg text-sm px-4 py-2 text-center md:mr-2 transition">
                    Masuk
                </a>
                
                <a href="{{ route('register') }}" class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center transition shadow-md shadow-blue-500/20">
                    Daftar Sekarang
                </a>
            </div>
        </div>
    </nav>

    <section class="bg-white pt-32 pb-20 lg:pt-40 lg:pb-28">
        <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
            <div class="mr-auto place-self-center lg:col-span-7">
                <h1 class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl text-slate-900">
                    Wujudkan Masa Depan di <br>
                    <span class="text-blue-600">Ucok University</span>
                </h1>
                <p class="max-w-2xl mb-6 font-light text-slate-500 lg:mb-8 md:text-lg lg:text-xl">
                    Bergabunglah dengan ribuan mahasiswa berprestasi. Penerimaan Mahasiswa Baru Tahun Ajaran 2025/2026 kini telah dibuka dengan kurikulum internasional.
                </p>
                <div class="flex flex-col space-y-4 sm:flex-row sm:justify-start sm:space-y-0 sm:space-x-4">
                    <a href="{{ route('register') }}" class="inline-flex justify-center items-center py-3 px-6 text-base font-medium text-center text-white rounded-lg bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 transition shadow-lg shadow-blue-500/30 transform hover:-translate-y-1">
                        Daftar Online
                        <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
                    </a>
                    <a href="#prodi" class="inline-flex justify-center items-center py-3 px-6 text-base font-medium text-center text-slate-900 rounded-lg border border-slate-300 hover:bg-slate-50 focus:ring-4 focus:ring-slate-100 transition">
                        Lihat Program Studi
                    </a>
                </div>
            </div>
            <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
                <img 
                    src="{{ asset('assets/ucok.png') }}" 
                    alt="Mahasiswa Ucok University" 
                    class="rounded-2xl shadow-2xl rotate-2 hover:rotate-0 transition duration-700 border-4 border-white shadow-blue-200"
                >
            </div>
        </div>
    </section>

    <section class="bg-slate-50 border-y border-slate-200">
        <div class="max-w-screen-xl px-4 py-8 mx-auto text-center lg:py-12 lg:px-6">
            <dl class="grid max-w-screen-md gap-8 mx-auto text-gray-900 sm:grid-cols-3">
                <div class="flex flex-col items-center justify-center p-4 bg-white rounded-lg shadow-sm">
                    <dt class="mb-2 text-3xl md:text-4xl font-extrabold text-blue-600">A</dt>
                    <dd class="font-medium text-slate-500">Akreditasi Institusi</dd>
                </div>
                <div class="flex flex-col items-center justify-center p-4 bg-white rounded-lg shadow-sm">
                    <dt class="mb-2 text-3xl md:text-4xl font-extrabold text-blue-600">15+</dt>
                    <dd class="font-medium text-slate-500">Program Studi</dd>
                </div>
                <div class="flex flex-col items-center justify-center p-4 bg-white rounded-lg shadow-sm">
                    <dt class="mb-2 text-3xl md:text-4xl font-extrabold text-blue-600">5000+</dt>
                    <dd class="font-medium text-slate-500">Alumni Sukses</dd>
                </div>
            </dl>
        </div>
    </section>

    <section class="bg-white py-16">
        <div class="max-w-screen-xl px-4 mx-auto">
            <div class="text-center mb-12">
                <span class="text-blue-600 font-semibold tracking-wide uppercase text-sm">Proses Seleksi</span>
                <h2 class="mt-2 text-3xl font-bold tracking-tight text-slate-900 sm:text-4xl">Alur Pendaftaran</h2>
                <p class="mt-4 text-lg text-slate-500">Mudah dan cepat, berikut langkah menjadi bagian dari Ucok University.</p>
            </div>
            
            <div class="grid gap-8 md:grid-cols-3">
                <div class="p-8 bg-white rounded-2xl border border-slate-100 shadow-lg shadow-slate-200/50 hover:shadow-xl hover:-translate-y-1 transition duration-300">
                    <div class="w-14 h-14 bg-blue-50 rounded-xl flex items-center justify-center mb-6 text-blue-600 font-bold text-2xl">1</div>
                    <h3 class="mb-3 text-xl font-bold text-slate-900">Buat Akun</h3>
                    <p class="text-slate-500 leading-relaxed">Klik tombol daftar dan isi data diri Anda untuk mendapatkan akses ke portal PMB yang terintegrasi.</p>
                </div>
                <div class="p-8 bg-white rounded-2xl border border-slate-100 shadow-lg shadow-slate-200/50 hover:shadow-xl hover:-translate-y-1 transition duration-300">
                    <div class="w-14 h-14 bg-blue-50 rounded-xl flex items-center justify-center mb-6 text-blue-600 font-bold text-2xl">2</div>
                    <h3 class="mb-3 text-xl font-bold text-slate-900">Lengkapi Berkas</h3>
                    <p class="text-slate-500 leading-relaxed">Upload dokumen persyaratan digital seperti Scan Ijazah/SKL, Pas Foto Terbaru, dan Kartu Keluarga.</p>
                </div>
                <div class="p-8 bg-white rounded-2xl border border-slate-100 shadow-lg shadow-slate-200/50 hover:shadow-xl hover:-translate-y-1 transition duration-300">
                    <div class="w-14 h-14 bg-blue-50 rounded-xl flex items-center justify-center mb-6 text-blue-600 font-bold text-2xl">3</div>
                    <h3 class="mb-3 text-xl font-bold text-slate-900">Ujian & Hasil</h3>
                    <p class="text-slate-500 leading-relaxed">Ikuti ujian seleksi berbasis komputer (CBT) secara online dan pantau hasil kelulusan realtime.</p>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-slate-900 text-white pt-16 pb-8">
        <div class="max-w-screen-xl mx-auto px-4">
            <div class="flex flex-col md:flex-row justify-between items-center mb-8">
                <div class="mb-6 md:mb-0 text-center md:text-left">
                    <div class="flex items-center justify-center md:justify-start gap-3 mb-2">
                        <span class="text-2xl font-bold">Ucok University</span>
                    </div>
                    <p class="text-slate-400 text-sm max-w-sm">Kampus modern berbasis teknologi untuk mencetak Generasi Emas Masa Depan Indonesia.</p>
                </div>
                <div class="flex space-x-8 text-sm font-medium text-slate-300">
                    <a href="#" class="hover:text-white hover:underline transition">Tentang Kami</a>
                    <a href="#" class="hover:text-white hover:underline transition">Program Studi</a>
                    <a href="#" class="hover:text-white hover:underline transition">Bantuan</a>
                    <a href="#" class="hover:text-white hover:underline transition">Kontak</a>
                </div>
            </div>
            
            <div class="border-t border-slate-800 pt-8 mt-8 text-center">
                <p class="text-slate-500 text-sm">
                    &copy; {{ date('Y') }} Ucok University. All rights reserved.
                </p>
            </div>
        </div>
    </footer>

</body>
</html>