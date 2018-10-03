<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

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
    public function handle($request, Closure $next, $guard = null)
    {
        switch ($guard){
            case 'sekolah':
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('sekolah');
                }
                break;
            case 'pengurus':
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('pengurus');
                }
                break;
            case 'pengajar':
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('pengajar');
                }
                break;
            case 'siswa':
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('siswa');
                }
                break;
            default:
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('home');
                }
                break;
        }

        return $next($request);
    }
}
