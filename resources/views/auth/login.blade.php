<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Masuk - Ucok University</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />
    <link rel="icon" href="{{ asset('assets/ucok.png') }}">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: { sans: ['Inter', 'sans-serif'] },
                    colors: {
                        primary: '#2563EB',
                        secondary: '#0F172A',
                    }
                }
            }
        }
    </script>

    <script>
        if (localStorage.getItem('theme') === 'light') {
            document.documentElement.classList.remove('dark');
        } else {
            document.documentElement.classList.add('dark');
            localStorage.setItem('theme', 'dark');
        }
    </script>

    <style>
        .fade-in {
            animation: fadeIn 0.5s ease-out forwards;
        }
        .slide-up {
            animation: slideUp 0.5s ease-out forwards;
        }
        @keyframes fadeIn {
            from { opacity: 0;}
            to { opacity: 1;}
        }
        @keyframes slideUp {
            from { opacity: 0; transform: translateY(16px);}
            to { opacity: 1; transform: translateY(0);}
        }
    </style>
</head>
<body class="bg-slate-50 dark:bg-slate-950 font-sans text-slate-900 dark:text-slate-200 antialiased transition-colors duration-300">

    {{-- Tombol Back --}}
    <div class="absolute top-5 left-5 z-50">
        <a href="/"
           class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-white/90 dark:bg-slate-800/90 
                  text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-700 
                  shadow-sm border border-slate-200 dark:border-slate-700 transition text-xs font-medium">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                 stroke-width="2" stroke="currentColor" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M15.75 19.5L8.25 12l7.5-7.5" />
            </svg>
            <span>Kembali</span>
        </a>
    </div>

    {{-- Tombol Theme --}}
    <div class="absolute top-5 right-5 z-50">
        <button onclick="toggleTheme()"
                class="p-2 rounded-full bg-white/90 dark:bg-slate-800/90 text-slate-700 dark:text-slate-200 
                       hover:bg-slate-100 dark:hover:bg-slate-700 shadow-sm border border-slate-200 
                       dark:border-slate-700 transition">
            <svg class="hidden dark:block w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
            </svg>
            <svg class="block dark:hidden w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
            </svg>
        </button>
    </div>

    <div class="min-h-screen flex items-center justify-center px-4 py-8 sm:px-6 lg:px-8 relative overflow-hidden">
        {{-- Background dekor --}}
        <div class="pointer-events-none absolute inset-0">
            <div class="absolute -top-24 -left-24 w-64 h-64 bg-blue-500/10 dark:bg-blue-500/15 rounded-full blur-3xl"></div>
            <div class="absolute -bottom-24 -right-24 w-72 h-72 bg-sky-400/10 dark:bg-indigo-500/15 rounded-full blur-3xl"></div>
        </div>

        <div class="relative w-full max-w-5xl mx-auto flex flex-col md:flex-row items-center gap-10 fade-in">

            {{-- Kiri: Branding --}}
            <div class="w-full md:w-1/2 text-center md:text-left space-y-4 slide-up">
                <div class="inline-flex items-center gap-3 px-3 py-1.5 rounded-full bg-white/80 dark:bg-slate-800/80 border border-slate-200 dark:border-slate-700 shadow-sm mb-2">
                    <span class="inline-flex items-center justify-center w-6 h-6 rounded-full bg-blue-600 text-white text-xs font-semibold">U</span>
                    <span class="text-xs font-medium text-slate-700 dark:text-slate-300">
                        Ucok University • Portal PMB Online
                    </span>
                </div>

                <h1 class="text-3xl sm:text-4xl font-extrabold tracking-tight text-slate-900 dark:text-white">
                    Selamat Datang di
                    <span class="text-blue-600">Portal PMB</span>
                </h1>
                <p class="text-sm sm:text-base text-slate-600 dark:text-slate-400 max-w-md">
                    Masuk untuk melanjutkan pendaftaran, mengisi biodata, dan memantau status seleksi Ucok University.
                </p>

                <ul class="mt-3 space-y-1.5 text-xs sm:text-sm text-slate-600 dark:text-slate-400">
                    <li class="flex items-center gap-2">
                        <span class="w-4 h-4 rounded-full bg-green-500/10 text-green-600 flex items-center justify-center text-[10px]">
                            ✓
                        </span>
                        Akses status pendaftaran dan pembayaran secara real-time.
                    </li>
                    <li class="flex items-center gap-2">
                        <span class="w-4 h-4 rounded-full bg-blue-500/10 text-blue-600 flex items-center justify-center text-[10px]">
                            ✓
                        </span>
                        Lengkapi biodata dan upload dokumen dengan mudah.
                    </li>
                </ul>
            </div>

            {{-- Kanan: Card Login --}}
            <div class="w-full md:w-1/2">
                <div class="w-full mt-4 sm:mt-0 px-6 sm:px-8 py-8 sm:py-9 bg-white/95 dark:bg-slate-900/95 backdrop-blur border border-slate-100 dark:border-slate-700 shadow-xl shadow-slate-200/60 dark:shadow-none rounded-2xl transition-colors duration-300 slide-up">
                    
                    <div class="flex items-center justify-between mb-5">
                        <div>
                            <h2 class="text-xl font-bold leading-7 tracking-tight text-slate-900 dark:text-slate-100">
                                Masuk ke Akun Anda
                            </h2>
                            <p class="mt-1 text-xs text-slate-500 dark:text-slate-400">
                                Gunakan email dan kata sandi yang terdaftar saat pendaftaran.
                            </p>
                        </div>
                    </div>

                    <form method="POST" action="{{ route('login') }}" class="space-y-5">
                        @csrf

                        {{-- Email --}}
                        <div>
                            <label for="email" class="block text-xs font-medium leading-6 text-slate-800 dark:text-slate-200">
                                Alamat Email
                            </label>
                            <div class="mt-2 relative">
                                <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-slate-400">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M16 12H8m0 0l4-4m-4 4l4 4M4 6h16v12H4z" />
                                    </svg>
                                </span>
                                <input id="email" name="email" type="email" autocomplete="email" required
                                       class="block w-full rounded-lg border-0 py-2.5 pl-9 pr-3 text-sm text-slate-900 dark:text-white 
                                              bg-white dark:bg-slate-900 shadow-sm ring-1 ring-inset ring-slate-300 dark:ring-slate-700 
                                              placeholder:text-slate-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 transition-colors"
                                       placeholder="nama@email.com">
                            </div>
                            @error('email')
                                <p class="mt-2 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Password --}}
                        <div>
                            <div class="flex items-center justify-between">
                                <label for="password" class="block text-xs font-medium leading-6 text-slate-800 dark:text-slate-200">
                                    Kata Sandi
                                </label>
                                @if (Route::has('password.request'))
                                    <div class="text-xs">
                                        <a href="{{ route('password.request') }}"
                                           class="font-medium text-blue-600 hover:text-blue-500 transition">
                                            Lupa kata sandi?
                                        </a>
                                    </div>
                                @endif
                            </div>
                            <div class="mt-2 relative">
                                <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-slate-400">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M12 11c.943 0 1.714-.771 1.714-1.714S12.943 7.571 12 7.571 10.286 8.343 10.286 9.286 11.057 11 12 11z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M5 20.429V19a7 7 0 0114 0v1.429" />
                                    </svg>
                                </span>
                                <input id="password" name="password" type="password" autocomplete="current-password" required
                                       class="block w-full rounded-lg border-0 py-2.5 pl-9 pr-3 text-sm text-slate-900 dark:text-white 
                                              bg-white dark:bg-slate-900 shadow-sm ring-1 ring-inset ring-slate-300 dark:ring-slate-700 
                                              placeholder:text-slate-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 transition-colors">
                            </div>
                            @error('password')
                                <p class="mt-2 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Remember --}}
                        <div class="flex items-center justify-between">
                            <label for="remember_me" class="inline-flex items-center gap-2">
                                <input id="remember_me" type="checkbox"
                                       class="rounded border-slate-300 dark:border-slate-600 text-blue-600 shadow-sm 
                                              focus:ring-blue-600 bg-white dark:bg-slate-900"
                                       name="remember">
                                <span class="text-xs text-slate-600 dark:text-slate-400">Ingat saya di perangkat ini</span>
                            </label>
                        </div>

                        {{-- Tombol Masuk --}}
                        <div>
                            <button type="submit"
                                    class="flex w-full justify-center items-center gap-2 rounded-lg bg-blue-600 px-3 py-2.5 
                                           text-sm font-semibold leading-6 text-white shadow-md hover:bg-blue-700 
                                           focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 
                                           focus-visible:outline-blue-600 transition duration-200">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M5 12h9m0 0l-3-3m3 3l-3 3M19 5v14" />
                                </svg>
                                <span>Masuk</span>
                            </button>
                        </div>
                    </form>

                    <p class="mt-7 text-center text-xs sm:text-sm text-slate-500 dark:text-slate-400">
                        Belum punya akun pendaftaran?
                        <a href="{{ route('register') }}"
                           class="font-semibold leading-6 text-blue-600 hover:text-blue-500 transition">
                            Daftar sekarang
                        </a>
                    </p>

                    <p class="mt-3 text-center text-[11px] text-slate-400 dark:text-slate-500">
                        Pastikan Anda menggunakan email aktif karena seluruh informasi seleksi akan dikirimkan ke sana.
                    </p>
                </div>
            </div>
        </div>
    </div>

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
