<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Auth;
// use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller {

    use AuthenticatesUsers;
    protected $redirectTo;
    public function redirectTo() {
        switch (Auth::user()->role) {
            case "admin":
                $this->redirectTo = '/admin';
                return $this->redirectTo;
                break;
            case "cs":
                $this->redirectTo = '/cs';
                return $this->redirectTo;
                break;
            case "pemohon":
                $this->redirectTo = '/pemohon';
                return $this->redirectTo;
                break;
            case "pengujian":
                $this->redirectTo = '/pengujian';
                return $this->redirectTo;
                break;
            case "pimpinan":
                $this->redirectTo = '/pimpinan';
                return $this->redirectTo;
                break;
            case "verifikator":
                $this->redirectTo = '/verifikator';
                return $this->redirectTo;
                break;
            case "keuangan":
                $this->redirectTo = '/keuangan';
                return $this->redirectTo;
                break;
            case "pengangkut":
                $this->redirectTo = '/pengangkut';
                return $this->redirectTo;
                break;
            default:
                $this->redirectTo = '/login';
                return $this->redirectTo;
        }

        // return $next($request);
    }

    public function __construct() {
        // $this->middleware('guest')->except('logout');
    }
}
