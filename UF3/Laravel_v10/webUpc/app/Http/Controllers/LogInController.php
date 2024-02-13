<?php

namespace App\Http\Controllers;

use App\Models\Autonomo;
use App\Models\Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SignInController extends Controller
{
    public function index() {
        return view('signIn.index');
    }


    public function check(Request $request) {



        // Validar los datos del formulario
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = [
            'email' => $validatedData['email'],
            'password' => $validatedData['password']
        ];

        // Intentar autenticar como empresa
        if (Auth::guard('empresa')->attempt($credentials)) {
            // Autenticación exitosa, redirigir al dashboard de empresa
            return redirect()->intended('/')->with('success', 'Inicio de sesión exitoso como empresa.');
        }

        // Si la autenticación de empresa falla, intentar como autónomo
        if (Auth::guard('autonomo')->attempt($credentials)) {
            // Autenticación exitosa, redirigir al dashboard de autónomo
            return redirect()->intended('/')->with('success', 'Inicio de sesión exitoso como empresa.');
        }

        // Autenticación fallida, redirigir de vuelta con un mensaje de error
        return back()->withErrors(['login_error' => 'Las credenciales proporcionadas no coinciden con nuestros registros.']);
    }
}
