<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Masuk - Ucok University</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: { sans: ['Inter', 'sans-serif'] },
                    colors: {
                        primary: '#2563EB', // Royal Blue
                        secondary: '#0F172A', // Slate 900
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
</head>
<body class="bg-slate-50 dark:bg-slate-950 font-sans text-slate-900 dark:text-slate-200 antialiased transition-colors duration-300">

    <div class="absolute top-5 right-5 z-50">
        <button onclick="toggleTheme()" class="p-2 rounded-lg bg-white dark:bg-slate-800 text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-700 shadow-sm border border-slate-200 dark:border-slate-700 transition">
            <svg class="hidden dark:block w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
            <svg class="block dark:hidden w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path></svg>
        </button>
    </div>

    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-slate-50 dark:bg-slate-950 transition-colors duration-300">
        <div class="mb-6 text-center">
            <a href="/" class="flex items-center justify-center gap-2 group">
                <span class="text-3xl font-bold text-slate-900 dark:text-white tracking-tight">Ucok University</span>
            </a>
            <h2 class="mt-4 text-center text-2xl font-bold leading-9 tracking-tight text-slate-900 dark:text-slate-200">
                Masuk ke Portal PMB
            </h2>
        </div>

        <div class="w-full sm:max-w-md mt-6 px-8 py-10 bg-white dark:bg-slate-800 shadow-xl shadow-slate-200/60 dark:shadow-none overflow-hidden sm:rounded-2xl border border-slate-100 dark:border-slate-700 transition-colors duration-300">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div>
                    <label for="email" class="block text-sm font-medium leading-6 text-slate-900 dark:text-slate-200">Alamat Email</label>
                    <div class="mt-2">
                        <input id="email" name="email" type="email" autocomplete="email" required 
                            class="block w-full rounded-lg border-0 py-2.5 px-3 text-slate-900 dark:text-white bg-white dark:bg-slate-900 shadow-sm ring-1 ring-inset ring-slate-300 dark:ring-slate-700 placeholder:text-slate-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 transition-colors"
                            placeholder="nama@email.com">
                        @error('email')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mt-5">
                    <div class="flex items-center justify-between">
                        <label for="password" class="block text-sm font-medium leading-6 text-slate-900 dark:text-slate-200">Kata Sandi</label>
                        @if (Route::has('password.request'))
                            <div class="text-sm">
                                <a href="{{ route('password.request') }}" class="font-semibold text-blue-600 hover:text-blue-500 transition">Lupa kata sandi?</a>
                            </div>
                        @endif
                    </div>
                    <div class="mt-2">
                        <input id="password" name="password" type="password" autocomplete="current-password" required 
                            class="block w-full rounded-lg border-0 py-2.5 px-3 text-slate-900 dark:text-white bg-white dark:bg-slate-900 shadow-sm ring-1 ring-inset ring-slate-300 dark:ring-slate-700 placeholder:text-slate-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 transition-colors">
                        @error('password')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="block mt-5">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-slate-300 dark:border-slate-600 text-blue-600 shadow-sm focus:ring-blue-600 bg-white dark:bg-slate-900" name="remember">
                        <span class="ms-2 text-sm text-slate-600 dark:text-slate-400">Ingat Saya</span>
                    </label>
                </div>

                <div class="mt-6">
                    <button type="submit" class="flex w-full justify-center rounded-lg bg-blue-600 px-3 py-2.5 text-sm font-semibold leading-6 text-white shadow-md hover:bg-blue-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600 transition duration-200">
                        Masuk
                    </button>
                </div>
            </form>

            <p class="mt-8 text-center text-sm text-slate-500 dark:text-slate-400">
                Belum punya akun pendaftaran?
                <a href="{{ route('register') }}" class="font-semibold leading-6 text-blue-600 hover:text-blue-500 transition">Daftar sekarang</a>
            </p>
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