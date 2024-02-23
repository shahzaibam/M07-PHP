<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\CompañeroController::class, 'index'])->name('home');
Route::get('/listarCompañerosEmpresa', [App\Http\Controllers\CompañeroController::class, 'listarCompañerosEmpresa'])->name('listarCompañerosEmpresa');
Route::get('/añadirCompañero', [App\Http\Controllers\CompañeroController::class, 'añadirCompañero'])->name('añadirCompañero');
Route::get('/actualizarComapañero', [App\Http\Controllers\CompañeroController::class, 'actualizarComapañero'])->name('actualizarComapañero');
Route::get('/borrarCompañero', [App\Http\Controllers\CompañeroController::class, 'borrarCompañero'])->name('borrarCompañero');
