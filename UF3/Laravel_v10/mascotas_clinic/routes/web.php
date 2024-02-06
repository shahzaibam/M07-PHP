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

$post = [
    ["title" => "1r Post"],
    ["title" => "2n Post"],
    ["title" => "3d Post"],
    ["title" => "4t Post"],
];


//Route::get('/', function () {
//    return view('home.index');
//});


Route::get('/', [\App\Http\Controllers\OwnerController::class, 'index']) ->name('home.index');
Route::get('owner/listAll', [\App\Http\Controllers\OwnerController::class, 'listAll']) ->name('owner.listAll');
Route::get('owner/searchPet', [\App\Http\Controllers\OwnerController::class, 'searchPet']) ->name('owner.searchPet');
Route::get('owner/modify', [\App\Http\Controllers\OwnerController::class, 'modify']) ->name('owner.modify');
Route::get('owner/add', [\App\Http\Controllers\OwnerController::class, 'add']) ->name('owner.add');
