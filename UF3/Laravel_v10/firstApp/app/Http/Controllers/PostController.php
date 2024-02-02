<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        return view('posts.index', [
            'prueba' => 'Este mensaje es de prueba en DAW2'
        ]);
    }

    public function create() {
        return view('posts.create');
    }

    public function store() {
        return "Aquí se almacenará el POST en la BD (por ejemplo)";
    }

    public function show($post) {
        return view('posts.show', [
            'post' => $post
        ]);


        //forma de enviar datos con el ->with()
//        return view ('posts.show')->with('post', $post);

    }

    public function edit($post) {
        return view('posts.edit', [
            'post' => $post
        ]);
    }

    public function update($post) {
        return "Aquí se ACTUALIZA el POST con la id $post";
    }


    public function destroy($post) {
        return "Aquí se ELIMINARÁ el POST con la id $post";
    }
}

