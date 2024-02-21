<?php

use Illuminate\Support\Facades\Auth;
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

//Route::get('/', function () {
//    return view('welcome')->name('welcome');
//});





/* PROJECT UPC -- ROUTING */

Auth::routes();

//welcome
Route::get('/', [App\Http\Controllers\WelcomeController::class, 'index'])->name('welcome');

//home when loggedIn
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//all Event Routes
Route::get('/events', [\App\Http\Controllers\EventsController::class, 'index'])->name('events.index');
Route::post('/events/create', [\App\Http\Controllers\EventsController::class, 'store'])->middleware('auth')->name('events.store');
Route::get('/events/{event}/edit', [App\Http\Controllers\EventsController::class, 'edit'])->middleware('auth')->name('events.edit');
Route::put('/events/{event}', [App\Http\Controllers\EventsController::class, 'update'])->middleware('auth')->name('events.update');
Route::delete('/events/{id}', [App\Http\Controllers\EventsController::class, 'delete'])->middleware('auth')->name('events.delete');

//tournaments
Route::get('/tournaments', [\App\Http\Controllers\TournamentsController::class, 'index'])->name('tournaments.index');
Route::post('/tournaments/create', [\App\Http\Controllers\TournamentsController::class, 'store'])->middleware('auth')->name('tournaments.store');
Route::get('/tournaments/{torneo}/edit', [App\Http\Controllers\TournamentsController::class, 'edit'])->middleware('auth')->name('tournaments.edit');
Route::put('/tournaments/{torneo}', [App\Http\Controllers\TournamentsController::class, 'update'])->middleware('auth')->name('tournaments.update');
Route::delete('/tournaments/{id}', [App\Http\Controllers\TournamentsController::class, 'delete'])->middleware('auth')->name('tournaments.delete');

//aboutus
Route::get('/aboutus', [\App\Http\Controllers\AboutUsController::class, 'index'])->name('aboutus.index');

//contact
Route::get('/contact', [\App\Http\Controllers\ContactUsController::class, 'index'])->name('contact.index');
