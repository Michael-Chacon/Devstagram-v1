<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PerfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('perfil.index');
    }

    public function store(Request $request)
    {
        $request->request->add(['username' => Str::slug($request->username)]);
        $this->validate($request, [
            'username' => ['required', 'unique:users,username,'.auth()->user()->id, 'min:3', 'max:20', 'not_in:twitter,editar-perfil,root'],
        ]);

        if($request->imagen){
            // Img temporal
        $imagen = $request->file('imagen');
        // Asignar nombre unico al a imagen 
        $nombreImagen = Str::uuid() . "." . $imagen->extension();
        // Crear instancia de la libreria Intervention Image
        $imagenServidor = Image::make($imagen);
        // Definir el ancho y el alto
        $imagenServidor->fit(1000, 1000);

        // Definir la ruta donde se va aguardar la imagen 
        $imagenPath = public_path('perfiles') . '/' . $nombreImagen;
        // Guardar la imagen en la ruta creada 
        $imagenServidor->save($imagenPath);
        }
        $usuario = User::find(auth()->user()->id);
        $usuario->username = $request->username;
        $usuario->imagen = $nombreImagen ?? auth()->user()->imagen ?? null;
        $usuario->save();   

        return redirect()->route('posts.index', $usuario->username);
        
    }
}
