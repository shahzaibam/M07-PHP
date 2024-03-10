<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Event;
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


    public function store(Request $request)
    {

        $usuario = Auth::user();
        $usuarioId = $usuario->id;

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:191',
            'description' => 'required|string|max:191',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
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

}
