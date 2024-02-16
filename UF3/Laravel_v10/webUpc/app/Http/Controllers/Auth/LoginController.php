<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function showLoginForm()
    {
        return view('auth.login');
    }


    protected function attemptLogin(Request $request)
    {
        // Intenta autenticar como 'empresa'
        $guard = 'empresa';
        if ($this->guard($guard)->attempt($this->credentials($request), $request->filled('remember'))) {
            return true; // Autenticación exitosa como empresa
        }

        // Si falla, intenta autenticar como 'autonomo'
        $guard = 'autonomo';
        if ($this->guard($guard)->attempt($this->credentials($request), $request->filled('remember'))) {
            return true; // Autenticación exitosa como autónomo
        }

        // Si ambas autenticaciones fallan, devuelve false
        return false;
    }
}
