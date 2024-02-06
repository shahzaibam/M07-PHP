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

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']) ->name('home.index');
Route::get('/events', [\App\Http\Controllers\EventsController::class, 'index']) ->name('events.index');
Route::get('/aboutus', [\App\Http\Controllers\AboutUsController::class, 'index']) ->name('aboutus.index');
Route::get('/contact', [\App\Http\Controllers\ContactUsController::class, 'index']) ->name('contact.index');

