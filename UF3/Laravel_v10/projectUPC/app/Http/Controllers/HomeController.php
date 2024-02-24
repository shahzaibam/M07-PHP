<?php

namespace App\Http\Controllers;

use App\Models\Apuntar;
use App\Models\Autonomo;
use App\Models\Empresa;
use App\Models\Evento;
use App\Models\Torneo;
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
        $userType = $user->type ?? 'default';

        // Variables comunes que se pasarán a la vista
        $eventos = Evento::where("user_id", $user->id)->get();
        $tournaments = Torneo::all(); // Cambiado a all() para mantener consistencia
        $apuntados = Apuntar::where('user_id', $user->id)->get();


        $eventos->each(function ($evento) {
            $evento->nombreCreador = $evento->user->name ?? 'Desconocido';
        });
        $tournaments->each(function ($torneo) {
            $torneo->nombreCreador = $torneo->user->name ?? 'Desconocido';
        });

        if ($userType == 'empresa') {

            return view('home', compact('eventos', 'userType', 'tournaments'));

        } elseif ($userType == 'guest') {


            return view('home', compact('userType', 'apuntados'));

        } else {

            return view('home', compact('eventos', 'userType'));

        }
    }

}
