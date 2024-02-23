<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use Illuminate\Http\Request;

class OwnerController extends Controller
{

    public function index() {
        return view('home.index');
    }

    public function listAll() {
        $owners = Owner::get();

        return view('owner.listAll', compact('owners'));

    }

    public function searchOwner() {
        return view('owner.searchOwner');
    }

    public function searchByForm(Request $request) {
        $ownerId = $request->input('ownerId');
        return redirect()->route('owner.searchOwnerId', ['id' => $ownerId]);
    }


    public function searchOwnerId($id) {
        $owner = Owner::findOrFail($id);

        return view('owner.showOwnersResult', compact('owner'));

    }


    public function modify() {
        return view('owner.modify');
    }



    public function add() {
        return view('owner.addOwner');
    }

    public function store(Request $request) {

        $validatedData = $request->validate([
            'nif' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|string',
            'phone' => 'required|string',
        ]);


        $owners = Owner::create($validatedData);

        return redirect()->route('owner.listAll')->with('status', 'Evento creado con éxito.');

    }
}
