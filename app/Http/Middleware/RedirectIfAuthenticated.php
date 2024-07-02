<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            // Check the role of the authenticated user
            $role = Auth::user()->role->role_name;

            // Redirect berdasarkan on the role
            if ($role === 'admin') {
                return redirect()->route('dashboard.admin.index');
            } elseif ($role === 'user') {
                return redirect()->route('dashboard.user.index');
            }
        }

        // Jika tidak terautentikasi atau tidak ada role, lanjutkan ke request selanjutnya
        return $next($request);
    }
}
