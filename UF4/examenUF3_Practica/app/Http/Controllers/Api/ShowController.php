<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Show;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function index()
    {
        $shows = Show::with('categories')->get();

        return response()->json([
            'status' => 200,
            'shows' => $shows
        ], 200);
    }

    public function store(Request $request)
    {
        // Validar la solicitud de entrada
        $validated = $request->validate([
            'nombre' => 'required|string|max:150',
            'duracion' => 'required|string|max:300',
            'fecha' => 'required|string|max:300',
            'idioma' => 'required|string|max:300',
            'precio' => 'required|string|max:300',
            'valoracion' => 'required|string|max:300',
            'categories' => 'sometimes|array', // El campo 'categories' puede ser un array opcional
            'categories.*' => 'exists:categories,id' // Verificar si cada ID de categoría existe en la tabla de categorías
        ]);

        // Crear un nuevo espectáculo
        $show = Show::create([
            'nombre' => $validated['nombre'],
            'duracion' => $validated['duracion'],
            'fecha' => $validated['fecha'],
            'idioma' => $validated['idioma'],
            'precio' => $validated['precio'],
            'valoracion' => $validated['valoracion'],
        ]);

        // Asignar categorías al espectáculo si se proporcionan
        if (isset($validated['categories'])) {
            $show->categories()->attach($validated['categories']);
        }

        // Cargar las categorías relacionadas con el espectáculo y devolver la respuesta
        $show->load('categories');

        return response()->json([
            'status' => 201,
            'message' => 'Show created successfully',
            'show' => $show
        ], 201);
    }
}
