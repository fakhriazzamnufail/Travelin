<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Memeriksa role pengguna sebelum mengakses halaman tertentu.
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        // Belum login
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        // Role tidak sesuai
        if (auth()->user()->role !== $role) {
            abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }

        return $next($request);
    }
}