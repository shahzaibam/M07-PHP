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
//    return 'Bienvenido';
});

Route::get('posts', [\App\Http\Controllers\PostController::class, 'index'])->name("posts.index"); //shows all the posts
Route::get('posts/create', [\App\Http\Controllers\PostController::class, 'create'])->name("posts.create"); //shows a create form
Route::post('posts', [\App\Http\Controllers\PostController::class, 'store'])->name("posts.store"); //sends forms data to /posts by method POST
Route::get('posts/{post}', [\App\Http\Controllers\PostController::class, 'show'])->name("posts.show");//shows a single post
Route::get('posts/{post}/edit', [\App\Http\Controllers\PostController::class, 'edit'])->name("posts.edit");//Edits a single post
Route::put('posts/{post}', [\App\Http\Controllers\PostController::class, 'update'])->name("posts.update");//updates a single post
Route::delete('posts/{post}', [\App\Http\Controllers\PostController::class, 'destroy'])->name("posts.destroy");//deletes a single post







//Route::view('/', 'welcome'); // --> manera más corta de escribir rutas

//Route::get('cursos', function () {
//    return "Bienvenido a la pagina CURSOS";
//});
//
//
//Route::get('cursos/create', function () {
//    return "Estas en la pagina del formulario crear curso";
//});


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


////rutas con expresiones regulares
//Route::get('cursos/{curso}', function (string $curso) {
//    return "Bienvenido a la pagina de: $curso";
//})->where('curso', '[A-za-z]+');
//
//
