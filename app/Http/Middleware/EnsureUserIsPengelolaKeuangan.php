<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsPengelolaKeuangan
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check() || !auth()->user()->isKeuangan()) {
            abort(403, 'Akses ditolak. Hanya Pengelola Keuangan yang dapat mengakses halaman ini.');
        }

        return $next($request);
    }
}
