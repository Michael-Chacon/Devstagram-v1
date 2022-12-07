<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke()
    {
        // Obtener a quienes seguimos 
        $ids = auth()->user()->followings->pluck('id')->toArray();

        // Filtrar los datos, whereIn xq estamos usando toArray en la variable $ids
        $posts = Post::whereIn('user_id', $ids)->latest()->paginate(20);

        return view('home', compact('posts'));
    }
}
