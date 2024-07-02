<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle($request, Closure $next, $role)
    {
        if (!Auth::check() || Auth::user()->role->role_name !== $role) {
            return redirect('home'); // Ganti dengan rute yang sesuai jika perlu
        }

        return $next($request);
    }
}
