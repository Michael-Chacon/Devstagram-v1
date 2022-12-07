<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LikePost extends Component
{   
    public $posts;
    public $isLiked;
    public $likes;

    public function mount($posts)
    {
        $this->isLiked = $posts->checkLike(auth()->user());
        $this->likes = $posts->likes->count();
    }

    public function like()
    {
        if ($this->posts->checkLike(auth()->user())){
            // Liker hace referencia a la relación entre la tabla like y el modelo user,  un usuario tiene muchos likes
            $this->posts->likes()->where('post_id', $this->posts->id)->delete();
            $this->isLiked = false;
            $this->likes--;
        }else{
            $this->posts->likes()->create([
                'user_id' => auth()->user()->id
            ]);
            $this->isLiked = true;
            $this->likes++;
        }
    }

    public function render()
    {
        return view('livewire.like-post');
    }
}
