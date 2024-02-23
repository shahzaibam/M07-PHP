<?php

namespace App\Http\Controllers;

use App\Models\Show;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function listarTodo()
    {

        $shows = Show::get();


        return view('shows.listarTodo',compact('shows'));
    }


    public function listarTodoId( $id)
    {
        $shows = Show::where("id", $id)->get();

        return view('shows.listarTodoId',compact('shows'));
    }


    public function listarOrdenPrecio()
    {

        $shows = Show::orderBy('precio', 'asc')->get();

        $category = Show::find(1)->categories()->get();

//        dd($category);

        return view('shows.listarPorPrecio',compact('shows', 'category'));
    }


    public function listarShowsVerComentarios()
    {

        $shows = Show::orderBy('precio', 'asc')->get();

        $comentarios = Show::find(1)->categories()->get();


        return view('shows.listarShowsVerComentarios',compact('shows', 'comentarios'));
    }



}
