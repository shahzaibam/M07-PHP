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

Route::get('/listarTodo', [App\Http\Controllers\ShowController::class, 'listarTodo'])->name('listarTodo');
Route::get('/listarTodo/{id}', [App\Http\Controllers\ShowController::class, 'listarTodoId'])->name('listarTodoId');
Route::get('/listarOrdenPrecio', [App\Http\Controllers\ShowController::class, 'listarOrdenPrecio'])->name('listarOrdenPrecio');
Route::get('/listarCategories', [App\Http\Controllers\CategoryController::class, 'index'])->name('listarCategories');
Route::get('/listarShowCategory', [App\Http\Controllers\ShowController::class, 'listarShowsVerComentarios'])->name('listarShowsVerComentarios');
