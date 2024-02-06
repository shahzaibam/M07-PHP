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

Route::get('/', [\App\Http\Controllers\OwnerController::class, 'index']) ->name('home.index');
Route::get('/events', [\App\Http\Controllers\OwnerController::class, 'events']) ->name('navbar.events');
Route::get('/aboutus', [\App\Http\Controllers\OwnerController::class, 'aboutus']) ->name('navbar.aboutus');
Route::get('/contact', [\App\Http\Controllers\OwnerController::class, 'contact']) ->name('navbar.contact');

