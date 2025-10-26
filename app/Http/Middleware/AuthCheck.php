<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthCheck
{
    public function handle(Request $request, Closure $next)
    {
        // Cek session, jika tidak ada redirect ke login
        if (!$request->session()->has('user_email')) {
            return redirect('/auth')->with('error', 'Anda harus login terlebih dahulu!');
        }

        return $next($request);
    }
}
