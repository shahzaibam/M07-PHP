<?php

namespace App\Http\Controllers;

use App\Models\Autonomo;
use App\Models\Empresa;
use App\Models\Evento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $eventos = collect();



        // Primero, determina si el usuario es autónomo o empresa
        if ($user->type == 'autonomo') {
            // Encuentra el ID de autónomo basado en user_id
            $autonomo = Autonomo::where('user_id', $user->id)->first();
            if ($autonomo) {
                // Usa el ID de autónomo para filtrar los eventos
                $eventos = Evento::where('autonomo_id', $autonomo->id)->get();
            }

        }

        if ($user->type == 'empresa') {
            // Encuentra el ID de empresa basado en user_id
            $empresa = Empresa::where('user_id', $user->id)->first();
            if ($empresa) {
                // Usa el ID de empresa para filtrar los eventos
                $eventos = Evento::where('empresa_id', $empresa->id)->get();
            }

            dd($user->id);
        }

        return view('home', compact('eventos'));
    }

}
