<?php

namespace App\Http\Controllers;

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

        $eventos = Evento::where("user_id", $user->id)->get();

        $names = $user->name;


        $userType = $user->type;


        if($userType == 'empresa') {
            $tournaments = Torneo::get();


            //esto funciona solo si en el Model de Evento digo que pertenece a User
            // Agregar el nombre del creador a cada evento como un atributo adicional
            $tournaments->each(function ($torneo) {
                $torneo->nombreCreador = $torneo->user->name; // Asumiendo que el usuario tiene un atributo 'name'
            });


            return view('home', compact('eventos', 'names', 'userType', 'tournaments'));
        }


        return view('home', compact('eventos', 'names', 'userType'));
    }

}
