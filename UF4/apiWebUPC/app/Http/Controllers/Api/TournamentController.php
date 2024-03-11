<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Tournament;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TournamentController extends Controller
{
    public function index()
    {


        $tournaments = Tournament::with('user')->get(); //relaciona torneos con usuarios, asi se puede coger el nombre del autor directamente desde el html con tournament.user.name

        if ($tournaments->count() > 0) {
            return response()->json([
                'status' => 200,
                'tournaments' => $tournaments,
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'tournaments' => 'No records found'
            ], 404);
        }

    }

    public function myTournaments()
    {
        $user = Auth::user();

        $tournaments = $user->tournaments()->with('user')->get(); //recoge solo los tournaments del usuario logeado
        $tournamentsWithUser = Tournament::with('user')->get(); //relaciona eventps con usuarios, asi se puede coger el nombre del autor directamente desde el html con tournament.user.name

        if ($tournaments->count() > 0) {
            return response()->json([
                'status' => 200,
                'tournaments' => $tournaments,
                'tournamentsWithUser' => $tournamentsWithUser
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'tournaments' => 'No records found'
            ], 404);
        }
    }


    public function store(Request $request)
    {

        $usuario = Auth::user();
        $usuarioId = $usuario->id;

        if ($usuario->type !== 'empresa') {
            return response()->json(['error' => 'Solo los usuarios de tipo "empresa" pueden crear torneos'], 403);
        }

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
            $newTournament = new Tournament();
            $newTournament->name = $request->input('name');
            $newTournament->description = $request->input('description');
            $newTournament->date = $request->input('date');
            $newTournament->time = $request->input('time');
            $newTournament->user_id = $usuarioId; // Asignar el ID del usuario al tournament

            $newTournament->save();


            //en cambio de esta manera no lo esta guardando, da nullo
//            $newTournament = Tournament::create([
//                'name' => $request->name,
//                'description' => $request->description,
//                'date' => $request->date,
//                'time' => $request->time,
//                'user_id' => $usuarioId
//            ]);


            if ($newTournament) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Tournament Created Successfully!'
                ], 200);
            } else {
                return response()->json([
                    'status' => 500,
                    'message' => 'Something went wrong!'
                ], 500);
            }

        }


    }



    public function registerForTournament(Request $request, $id)
    {
        $user = Auth::user();

        if (!$user) {
            return response()->json(['error' => 'Unauthenticated'], 401);
        }

        $tournament = Tournament::find($id);

        if (!$tournament) {
            return response()->json(['error' => 'Tournament not found'], 404);
        }

        // Verificar si el usuario ya está inscrito en el tournament
        if ($tournament->users()->where('user_id', $user->id)->exists()) {
            return response()->json(['error' => 'User already registered for this tournament'], 400);
        }

        // Inscribir al usuario en el tournament
        $tournament->users()->attach($user->id);

        return response()->json(['message' => 'User registered for the tournament successfully'], 200);
    }


    public function getUsersWithTournaments()
    {
        // Obtener todos los usuarios con sus tournaments
        $users = User::with('tournaments')->get();

        // Retornar los usuarios en formato JSON
        return response()->json($users);
    }


    public function update(Request $request, $id)
    {
        $tournament = Tournament::find($id);

        if (!$tournament) {
            return response()->json([
                'status' => 404,
                'message' => 'Tournamento no encontrado'
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

        // Actualizar el tournament con los nuevos datos
        $tournament->name = $request->input('name');
        $tournament->description = $request->input('description');
        $tournament->date = $request->input('date');
        $tournament->time = $request->input('time');

        $tournament->save();

        return response()->json([
            'status' => 200,
            'message' => 'Tournament actualizado exitosamente'
        ], 200);
    }


    public function destroy($id)
    {
        $tournament = Tournament::find($id);

        if (!$tournament) {
            return response()->json([
                'status' => 404,
                'message' => 'Tournament no encontrado'
            ], 404);
        }

        if (Auth::user()->id != $tournament->user_id) {
            return response()->json([
                'status' => 403,
                'message' => 'No autorizado para eliminar este tournament'
            ], 403);
        }

        $tournament->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Tournament eliminado exitosamente'
        ], 200);
    }


}
