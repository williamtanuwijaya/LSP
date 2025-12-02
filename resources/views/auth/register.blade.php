<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar - Ucok University</title>

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
                        fontFamily: { sans: ['Inter', 'sans-serif'] },
                        colors: {
                            primary: '#2563EB', // Royal Blue
                            secondary: '#0F172A', // Slate 900
                        }
                    }
                }
            }
        </script>
    @endif
</head>
<body class="bg-slate-50 font-sans text-slate-900 antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-slate-50">
        <div class="mb-6 text-center">
            <a href="/" class="flex items-center justify-center gap-2 group">
                <span class="text-3xl font-bold text-slate-900">Ucok University</span>
            </a>
            <h2 class="mt-4 text-center text-2xl font-bold leading-9 tracking-tight text-slate-900">
                Buat Akun Calon Mahasiswa
            </h2>
        </div>

        <div class="w-full sm:max-w-md mt-6 px-8 py-10 bg-white shadow-xl shadow-slate-200/60 overflow-hidden sm:rounded-2xl border border-slate-100">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div>
                    <label for="name" class="block text-sm font-medium leading-6 text-slate-900">Nama Lengkap</label>
                    <div class="mt-2">
                        <input id="name" name="name" type="text" autocomplete="name" required autofocus
                            class="block w-full rounded-lg border-0 py-2.5 px-3 text-slate-900 shadow-sm ring-1 ring-inset ring-slate-300 placeholder:text-slate-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 transition"
                            placeholder="Nama Lengkap">
                        @error('name')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mt-5">
                    <label for="email" class="block text-sm font-medium leading-6 text-slate-900">Alamat Email</label>
                    <div class="mt-2">
                        <input id="email" name="email" type="email" autocomplete="email" required 
                            class="block w-full rounded-lg border-0 py-2.5 px-3 text-slate-900 shadow-sm ring-1 ring-inset ring-slate-300 placeholder:text-slate-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 transition"
                            placeholder="nama@email.com">
                        @error('email')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mt-5">
                    <label for="password" class="block text-sm font-medium leading-6 text-slate-900">Kata Sandi</label>
                    <div class="mt-2">
                        <input id="password" name="password" type="password" autocomplete="new-password" required 
                            class="block w-full rounded-lg border-0 py-2.5 px-3 text-slate-900 shadow-sm ring-1 ring-inset ring-slate-300 placeholder:text-slate-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 transition">
                        @error('password')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mt-5">
                    <label for="password_confirmation" class="block text-sm font-medium leading-6 text-slate-900">Konfirmasi Kata Sandi</label>
                    <div class="mt-2">
                        <input id="password_confirmation" name="password_confirmation" type="password" autocomplete="new-password" required 
                            class="block w-full rounded-lg border-0 py-2.5 px-3 text-slate-900 shadow-sm ring-1 ring-inset ring-slate-300 placeholder:text-slate-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 transition">
                    </div>
                </div>

                <div class="mt-8">
                    <button type="submit" class="flex w-full justify-center rounded-lg bg-blue-600 px-3 py-2.5 text-sm font-semibold leading-6 text-white shadow-md hover:bg-blue-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600 transition duration-200">
                        Daftar Sekarang
                    </button>
                </div>
            </form>

            <p class="mt-8 text-center text-sm text-slate-500">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="font-semibold leading-6 text-blue-600 hover:text-blue-500 transition">Masuk disini</a>
            </p>
        </div>
    </div>
</body>
</html>