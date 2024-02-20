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



//Route::get('/', function () {
//    return view('home.index');
//});


Route::get('/', [\App\Http\Controllers\OwnerController::class, 'index']) ->name('home.index');
Route::get('owner/listAll', [\App\Http\Controllers\OwnerController::class, 'listAll']) ->name('owner.listAll');
Route::get('owner/searchPet', [\App\Http\Controllers\OwnerController::class, 'searchPet']) ->name('owner.searchPet');
Route::get('owner/modify', [\App\Http\Controllers\OwnerController::class, 'modify']) ->name('owner.modify');
Route::get('owner/add', [\App\Http\Controllers\OwnerController::class, 'add']) ->name('owner.add');
Route::post('owner/addOwner', [\App\Http\Controllers\OwnerController::class, 'store']) ->name('owner.store');
