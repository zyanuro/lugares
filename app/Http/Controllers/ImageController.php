<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function uploadImage(Request $request)
{
    // Valida la solicitud
    $request->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:4048', // Ejemplo de reglas de validación
    ]);

    // Obtiene el archivo de imagen
    $imagen = $request->file('image');

    // Guarda la imagen en el sistema de archivos
    $imagen->store('images', 'public');

    // Devuelve una respuesta o redirige a donde necesites
    return redirect('/')->with('success', 'Imagen subida con éxito');
}

}
