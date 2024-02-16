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

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home.index');
Route::get('/events', [\App\Http\Controllers\EventsController::class, 'index'])->name('events.index');
Route::get('/tournaments', [\App\Http\Controllers\TournamentsController::class, 'index'])->middleware('auth')->name('tournaments.index');
Route::get('/aboutus', [\App\Http\Controllers\AboutUsController::class, 'index'])->name('aboutus.index');
Route::get('/contact', [\App\Http\Controllers\ContactUsController::class, 'index'])->name('contact.index');
Route::get('/signUp', [\App\Http\Controllers\SignUpController::class, 'index'])->name('signUp.index');
Route::post('/signUp', [\App\Http\Controllers\SignUpController::class, 'store'])->name('signUp.store');
Route::get('/login', [\App\Http\Controllers\LogInController::class, 'index'])->name('login');
Route::post('/login', [\App\Http\Controllers\LogInController::class, 'check'])->name('login.check');
