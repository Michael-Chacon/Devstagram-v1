<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $post->likes()->create([
            'user_id' => $request->user()->id
        ]);

        return back();
    }

    public function destroy(Request $request, Post $post )
    {
        // Liker hace referencia a la relación entre la tabla like y el modelo user,  un usuario tiene muchos likes
        $request->user()->likes()->where('post_id', $post->id)->delete();

        return back();
    }
}
