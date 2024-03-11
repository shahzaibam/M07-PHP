<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::post('/register', [\App\Http\Controllers\Api\UserController::class, 'register'])->name('users.register');
Route::post('/login', [\App\Http\Controllers\Api\UserController::class, 'login'])->name('users.login');
Route::get('/eventsAll', [\App\Http\Controllers\Api\EventController::class, 'index'])->name('events.all');
Route::get('/tournamentsAll', [\App\Http\Controllers\Api\TournamentController::class, 'index'])->name('tournaments.all');

// Nueva ruta para obtener el tipo de usuario
Route::middleware(['jwt.auth'])->get('/userType', function (Request $request) {
    return response()->json(['userType' => $request->user()->type]); // Suponiendo que el tipo de usuario se almacena en el campo 'type'
});

// Rutas protegidas con JWT
Route::middleware(['jwt.auth'])->group(function () {
    Route::get('/events', [\App\Http\Controllers\Api\EventController::class, 'index'])->name('events.index');
    Route::get('/my-events', [\App\Http\Controllers\Api\EventController::class, 'myEvents'])->name('events.myEvents');
    Route::post('/events', [\App\Http\Controllers\Api\EventController::class, 'store'])->name('events.store');
    Route::put('/events/{id}', [\App\Http\Controllers\Api\EventController::class, 'update'])->name('events.update');
    Route::delete('/events/{id}', [\App\Http\Controllers\Api\EventController::class, 'destroy'])->name('events.destroy');
    Route::post('/events/{id}/register', [\App\Http\Controllers\Api\EventController::class, 'registerForEvent'])->name('events.register');
    Route::get('/users-with-events', [\App\Http\Controllers\Api\EventController::class, 'getUsersWithEvents'])->name('events.getUser');

    Route::get('/tournaments', [\App\Http\Controllers\Api\TournamentController::class, 'index'])->name('events.index');
    Route::get('/my-tournaments', [\App\Http\Controllers\Api\TournamentController::class, 'myTournaments'])->name('events.myTournaments');
    Route::post('/tournaments', [\App\Http\Controllers\Api\TournamentController::class, 'store'])->name('events.store');
    Route::put('/tournaments/{id}', [\App\Http\Controllers\Api\TournamentController::class, 'update'])->name('events.update');
    Route::delete('/tournaments/{id}', [\App\Http\Controllers\Api\TournamentController::class, 'destroy'])->name('events.destroy');
});
