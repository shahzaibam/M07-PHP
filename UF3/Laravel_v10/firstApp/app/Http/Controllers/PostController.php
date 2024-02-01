<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        return "Aqui se mostrará el Listado de todos los POSTS";
    }

    public function create() {
        return "Let's create";
    }
}
