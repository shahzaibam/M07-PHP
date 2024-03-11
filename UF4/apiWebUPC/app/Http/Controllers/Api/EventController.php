<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {

        $events = Event::all();

        if ($events->count() > 0) {
            return response()->json([
                'status' => 200,
                'events' => $events
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'events' => 'No records found'
            ], 404);
        }

    }

    public function myEvents()
    {
        $user = Auth::user();

        $events = $user->events()->with('user')->get(); //recoge solo los eventos del usuario logeado
        $eventsWithUser = Event::with('user')->get(); //relaciona eventps con usuarios, asi se puede coger el nombre del autor directamente desde el html con tournament.user.name

        if ($events->count() > 0) {
            return response()->json([
                'status' => 200,
                'events' => $events,
                'eventsWithUser' => $eventsWithUser
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'events' => 'No records found'
            ], 404);
        }
    }


    public function store(Request $request)
    {

        $usuario = Auth::user();
        $usuarioId = $usuario->id;

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:191',
            'description' => 'required|string|max:191',
            'date' => 'required|date',
            'time' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        } else {


            //de esta manera si guarda el userID
            $newEvent = new Event();
            $newEvent->name = $request->input('name');
            $newEvent->description = $request->input('description');
            $newEvent->date = $request->input('date');
            $newEvent->time = $request->input('time');
            $newEvent->user_id = $usuarioId; // Asignar el ID del usuario al evento

            $newEvent->save();


            //en cambio de esta manera no lo esta guardando, da nullo
//            $newEvent = Event::create([
//                'name' => $request->name,
//                'description' => $request->description,
//                'date' => $request->date,
//                'time' => $request->time,
//                'user_id' => $usuarioId
//            ]);


            if ($newEvent) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Event Created Successfully!'
                ], 200);
            } else {
                return response()->json([
                    'status' => 500,
                    'message' => 'Something went wrong!'
                ], 500);
            }

        }


    }


    public function registerForEvent(Request $request, $id)
    {
        $user = Auth::user();

        if (!$user) {
            return response()->json(['error' => 'Unauthenticated'], 401);
        }

        $event = Event::find($id);

        if (!$event) {
            return response()->json(['error' => 'Event not found'], 404);
        }

        // Verificar si el usuario ya está inscrito en el evento
        if ($event->users()->where('user_id', $user->id)->exists()) {
            return response()->json(['error' => 'User already registered for this event'], 400);
        }

        // Inscribir al usuario en el evento
        $event->users()->attach($user->id);

        return response()->json(['message' => 'User registered for the event successfully'], 200);
    }



    public function getUsersWithEvents()
    {
        // Obtener todos los usuarios con sus eventos
        $users = User::with('events')->get();

        // Retornar los usuarios en formato JSON
        return response()->json($users);
    }

    public function update(Request $request, $id)
    {
        $evento = Event::find($id);

        if (!$evento) {
            return response()->json([
                'status' => 404,
                'message' => 'Evento no encontrado'
            ], 404);
        }

        // Validar los datos de entrada
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:191',
            'description' => 'required|string|max:191',
            'date' => 'required|date',
            'time' => 'required|string',
        ]);


        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        // Actualizar el evento con los nuevos datos
        $evento->name = $request->input('name');
        $evento->description = $request->input('description');
        $evento->date = $request->input('date');
        $evento->time = $request->input('time');

        $evento->save();

        return response()->json([
            'status' => 200,
            'message' => 'Evento actualizado exitosamente'
        ], 200);
    }


    public function destroy($id)
    {
        $evento = Event::find($id);

        if (!$evento) {
            return response()->json([
                'status' => 404,
                'message' => 'Evento no encontrado'
            ], 404);
        }

        if (Auth::user()->id != $evento->user_id) {
            return response()->json([
                'status' => 403,
                'message' => 'No autorizado para eliminar este evento'
            ], 403);
        }

        $evento->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Evento eliminado exitosamente'
        ], 200);
    }


}
