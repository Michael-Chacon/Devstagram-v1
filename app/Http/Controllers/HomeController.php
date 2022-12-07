<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
        // Obtener a quienes seguimos 
        $ids = auth()->user()->followings->pluck('id')->toArray();
        // Filtrar los datos, whereIn xq estamos usando toArray en la variable $ids
        $post = Post::whereIn('user_id', $ids)->paginate(20);

        return view('home', compact('post'));
    }
}
