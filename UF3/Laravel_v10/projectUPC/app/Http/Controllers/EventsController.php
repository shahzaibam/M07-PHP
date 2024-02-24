<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Torneo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventsController extends Controller
{


    public function index()
    {

        $user = Auth::user();

        $userType = $user->type ?? 'default';


        $eventos = Evento::get();


        //esto funciona solo si en el Model de Evento digo que pertenece a User
        // Agregar el nombre del creador a cada evento como un atributo adicional
        $eventos->each(function ($evento) {
            $evento->nombreCreador = $evento->user->name; // Asumiendo que el usuario tiene un atributo 'name'
        });


        if ($userType == 'guest') {


            $tournaments = Torneo::get();
            $eventos = Evento::get();

            return view('events.index', compact('eventos', 'tournaments', 'userType'));

        }else {
            return view('events.index', compact('eventos'));
        }

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

        $evento = Evento::create($validatedData);

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
        $evento = Evento::findOrFail($id);

        if (Auth::id() !== $evento->user_id) {
            return redirect()->route('events.index')->with('error', 'No tienes permiso para editar este evento.');
        }

        return view('events.edit', compact('evento'));
    }


    public function update(Request $request, $id)
    {
        // Buscar el evento que deseas actualizar mediante el $id del evento
        $evento = Evento::findOrFail($id);


        // Validar los datos recibidos del formulario
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'fecha' => 'required|date',
            'hora' => 'required',
        ]);

        // Actualizar el evento con los datos validados
        $evento->update($validatedData);


        //mostrar el mensaje de success
        return redirect()->route('home')->with('status', 'Evento actualizado con éxito.');
    }


    public function delete($id)
    {
        // Buscar el evento que deseas actualizar mediante el id del evento
        $evento = Evento::findOrFail($id);

        // Verificar si el usuario actual tiene permiso para eliminar este evento
        if (Auth::id() !== $evento->user_id) {
            //mostrar mensaje de que no puede
            return redirect()->route('home')->with('error', 'No tienes permiso para actualizar este evento.');
        }

        //Eliminar el evento
        $evento->delete();

        //mostrar mensaje de success
        return redirect()->route('home')->with('status', 'Evento eliminado con éxito.');
    }


}
