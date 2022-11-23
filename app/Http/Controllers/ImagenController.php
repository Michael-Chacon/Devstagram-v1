<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ImagenController extends Controller
{
    public function store(Request $request)
    {
        // Img temporal
        $imagen = $request->file('file');
        // Asignar nombre unico al a imagen 
        $nombreImagen = Str::uuid() . "." . $imagen->extension();
        // Crear instancia de la libreria Intervention Image
        $imagenServidor = Image::make($imagen);
        // Definir el ancho y el alto
        $imagenServidor->fit(1000, 1000);

        // Definir la ruta donde se va aguardar la imagen 
        $imagenPath = public_path('uploads') . '/' . $nombreImagen;
        // Guardar la imagen en la ruta creada 
        $imagenServidor->save($imagenPath);

        return response()->json(['imagen' => $nombreImagen]);  
    }
}
