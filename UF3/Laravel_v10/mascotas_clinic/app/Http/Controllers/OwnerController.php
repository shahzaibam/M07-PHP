<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OwnerController extends Controller
{

    public function index() {
        return view('home.index');
    }

    public function listAll() {
        $owner = [
            ["title" => "1st Owner"],
            ["title" => "2nd Owner"],
            ["title" => "3rd Owner"],
            ["title" => "4th Owner"],
        ];

        return view('owner.listAll', ['post' => $owner]);
    }

    public function searchPet() {
        return view('owner.searchPet');
    }

    public function modify() {
        return view('owner.modify');
    }

    public function add() {
        return view('owner.addOwner');
    }
}
