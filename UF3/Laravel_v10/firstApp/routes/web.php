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
//    return view('welcome');
//});
Route::view('/', 'welcome'); // --> manera más corta de escribir rutas

Route::get('cursos', function () {
    return "Bienvenido a la pagina CURSOS";
});


Route::get('cursos/create', function () {
    return "Estas en la pagina del formulario crear curso";
});


//Route::get('cursos/{curso}', function (string $curso) {
//    return "Bienvenido a la pagina CURSOS de : $curso";
//});


//rutas con parametros opcionales
//Route::get('cursos/{curso}/{categoria?}', function (string $curso, string $categoria = NULL) {
//
//    if($categoria) {
//        return "Bienvenido a la página de:{$curso}, de la categoria {$categoria}";
//    }else {
//        return "Bienvenido a la página de:{$curso}";
//    }
//});


//rutas con expresiones regulares
Route::get('cursos/{curso}', function (string $curso) {
    return "Bienvenido a la pagina de: $curso";
})->where('curso', '[A-za-z]+');


