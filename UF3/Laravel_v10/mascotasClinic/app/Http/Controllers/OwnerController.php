<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OwnerController extends Controller
{
    public function listAll() {
        return view('owner.listAll');
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
