<?php

namespace App\Http\Controllers;

use App\Models\Apuntar;
use App\Models\Evento;
use App\Models\Torneo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TournamentsController extends Controller
{
    public function index() {
        $tournaments = Torneo::get();

        $user = Auth::user();

        $userType = $user->type ?? 'default';

        //esto funciona solo si en el Model de Evento digo que pertenece a User
        // Agregar el nombre del creador a cada evento como un atributo adicional
        $tournaments->each(function ($torneo) {
            $torneo->nombreCreador = $torneo->user->name; // Asumiendo que el usuario tiene un atributo 'name'
        });

        return view('tournaments.index', compact('tournaments', 'userType'));
    }

    /**
     * @param Request $request --> todos los datos introducidos en el form los validamos
     * @return \Illuminate\Http\RedirectResponse
     *
     * funcion que valida los campos del form y crea un evento, y asign el id del user activo al evento que se esta creando
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'fecha' => 'required|date',
            'hora' => 'required',
        ]);

        $validatedData['user_id'] = Auth::id();

        $tournaments = Torneo::create($validatedData);

        return redirect()->route('home')->with('status', 'Evento creado con éxito.');
    }







    /**
     * Comprobamos que el usuario activo tenga el mismo id al evento que va a editar, si son iguales redirigo a events.edit (al formulario
     * de actualizar) y le paso todo el evento que tiene que actualizar.
     *
     * si los ids son diferentes saltaria error, y no enviaria a la pagina de actualizar
     *
     * @param $id --> user_id del evento
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse
     */
    public function edit($id)
    {
        $torneo = Torneo::findOrFail($id);

        if (Auth::id() !== $torneo->user_id) {
            return redirect()->route('events.index')->with('error', 'No tienes permiso para editar este evento.');
        }

        return view('tournaments.edit', compact('torneo'));
    }




    public function apuntarTorneo(Request $request, $id) {


        $tournaments = Torneo::get();
        $eventos = Evento::get();

        $validatedData['user_id'] = Auth::id();
        $validatedData['torneos_id'] = $id;
        $validatedData['events_id'] = null;

        $inscripcion = Apuntar::create($validatedData);

        $userType = $user->type ?? 'default';


        return view('tournaments.index', compact('eventos', 'tournaments', 'userType'));



    }




    public function update(Request $request, $id)
    {
        // Buscar el evento que deseas actualizar mediante el $id del evento
        $torneo = Torneo::findOrFail($id);


        // Validar los datos recibidos del formulario
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'fecha' => 'required|date',
            'hora' => 'required',
        ]);

        // Actualizar el evento con los datos validados
        $torneo->update($validatedData);


        //mostrar el mensaje de success
        return redirect()->route('home')->with('status', 'Evento actualizado con éxito.');
    }


    public function delete( $id)
    {
        // Buscar el evento que deseas actualizar mediante el id del evento
        $torneo = Torneo::findOrFail($id);

        // Verificar si el usuario actual tiene permiso para eliminar este evento
        if (Auth::id() !== $torneo->user_id) {
            //mostrar mensaje de que no puede
            return redirect()->route('home')->with('error', 'No tienes permiso para actualizar este evento.');
        }

        //Eliminar el evento
        $torneo->delete();

        //mostrar mensaje de success
        return redirect()->route('home')->with('status', 'Evento eliminado con éxito.');
    }

}
