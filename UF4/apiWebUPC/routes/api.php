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


// Rutas protegidas con JWT
Route::middleware(['jwt.auth'])->group(function () {
    Route::get('/events', [\App\Http\Controllers\Api\EventController::class, 'index'])->name('events.index');
    Route::post('/events', [\App\Http\Controllers\Api\EventController::class, 'store'])->name('events.store');
});


