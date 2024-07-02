<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle($request, Closure $next, $role)
    {
        if (!Auth::check()) {
            // Jika tidak terautentikasi, redirect ke halaman login
            return redirect('/login');
        }

        $user = Auth::user();

        if ($user->role->role_name !== $role) {
            // Redirect ke dashboard yang sesuai berdasarkan peran
            if ($user->role->role_name === 'admin') {
                return redirect()->route('dashboard.admin.index');
            } elseif ($user->role->role_name === 'user') {
                return redirect()->route('dashboard.user.index');
            }
        }

        return $next($request);
    }
}
