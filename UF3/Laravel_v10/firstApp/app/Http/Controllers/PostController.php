<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        return "Aqui se mostrará el Listado de todos los POSTS";
    }

    public function create() {
        return "Aquí se mostrará el formulario para crear el POST";
    }

    public function store() {
        return "Aquí se almacenará el POST en la BD (por ejemplo)";
    }

    public function show($post) {
        return "Aquí se mostrará el POST con id '$post'";
    }

    public function edit($post) {
        return "Aquí se mostrará el FORMULARIO para editar el post $post";
    }

    public function update($post) {
        return "Aquí se ACTUALIZA el POST con la id $post";
    }


    public function destroy($post) {
        return "Aquí se ELIMINARÁ el POST con la id $post";
    }
}

