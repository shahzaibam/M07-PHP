<?php

namespace App\Http\Controllers;

use App\Models\Autonomo;
use Illuminate\Http\Request;
use App\Models\Empresa;

class SignUpController extends Controller
{
    public function index() {
        return view('signUp.index');
    }


    // Procesa los datos del formulario de registro
    public function store(Request $request) {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'nif' => 'required|max:255',
            'nombre' => 'required|max:255',
            'email' => 'required',
            'type' => 'required',
            'password' => 'required',
        ]);


        //comprobamos que si el tipo es empresa o es un autonomo
        //si es empresa lo metemos en una tabla de empresa
        if($request->type == 'empresa') {
            $empresa = Empresa::create([
                'nif' => $validatedData['nif'],
                'nombre' => $validatedData['nombre'],
                'email' => $validatedData['email'],
                'type' => $validatedData['type'],
                'password' => $validatedData['password'],
            ]);
        }else { //si es un autonomo lo metemos en una tabla de autonomos
            $autonomo = Autonomo::create([
                'nif' => $validatedData['nif'],
                'nombre' => $validatedData['nombre'],
                'email' => $validatedData['email'],
                'type' => $validatedData['type'],
                'password' => $validatedData['password'],
            ]);
        }



        // Redireccionar a una ruta específica después del registro
        return redirect()->route('home.index')->with('success', 'Empresa registrada con éxito.');
    }
}
