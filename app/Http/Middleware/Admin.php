<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!FacadesAuth::user() || !FacadesAuth::user()->level == 'admin') {
            return redirect()->route('login');
        }
        return $next($request);
    }
}
