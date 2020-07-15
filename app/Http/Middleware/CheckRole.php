<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        // petugas / admin
        if (Auth::user()->role != $role) {
            Auth::logout();
            return redirect('/login')->with('error', 'Anda tidak punya hak akses!');
        }
        return $next($request);
    }
}
