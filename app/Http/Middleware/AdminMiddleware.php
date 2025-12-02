<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // Cek 1: Apakah user sudah login?
        // Cek 2: Apakah role user adalah 'admin'?
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request); // Silakan masuk
        }

        // Jika bukan admin, tolak akses (403 Forbidden)
        abort(403, 'ANDA BUKAN ADMIN! Akses ditolak.');
    }
}
