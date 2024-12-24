<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class Verifikator {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next) {
        // return $next($request);
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (Auth::user()->role == 'admin') {
            return redirect()->route('admin.home');
        }

        if (Auth::user()->role == 'pemohon') {
            return redirect()->route('pemohon.home');
        }

        if (Auth::user()->role == 'cs') {
            return redirect()->route('cs.home');
        }

        if (Auth::user()->role == 'pengujian') {
            return redirect()->route('pengujian.home');
        }

        if (Auth::user()->role == 'verifikator') {
            return $next($request);
        }

        if (Auth::user()->role == 'pimpinan') {
            return redirect()->route('pimpinan.home');
        }

        if (Auth::user()->role == 'keuangan') {
            return redirect()->route('keuangan.home');
        }

        if (Auth::user()->role == 'pengangkut') {
            return redirect()->route('pengangkut.home');
        }
    }
}
