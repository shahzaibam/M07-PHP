<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {

        $posts = Post::all();

        return response()->json([
            'status' => 200,
            'posts' => $posts
        ], 200);
    }

    public function store(Request $request)
    {
        // Antes de crear el post, puedes agregar validación para asegurarte
        // de que los datos proporcionados sean correctos y completos.
        // Por ejemplo:
        $validated = $request->validate([
            'name' => 'required|string|max:150',
            'description' => 'required|string|max:300',
            'categories' => 'sometimes|array',
            'categories.*' => 'exists:categories,id' // Esto asegura que cada ID de categoría exista.
        ]);

        // Crear el nuevo post utilizando datos validados.
        $post = Post::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
        ]);

        // Asignar categorías al post basándonos en la entrada del usuario.
        // Utiliza los datos validados para mayor seguridad.
        $post->categories()->sync($validated['categories'] ?? []); // Usar datos validados aquí.

        // Devolver una respuesta, podría ser el post creado con sus categorías.
        return response()->json([
            'status' => 201,
            'message' => 'Post created successfully',
            'post' => $post->load('categories') // Carga y devuelve las categorías relacionadas con el post.
        ], 201);
    }
}
