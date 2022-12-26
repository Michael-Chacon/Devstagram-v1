<?php

namespace App\Http\Livewire;

use App\Models\Comentario;
use App\Models\Post;
use Livewire\Component;

class MostrarComentario extends Component
{
    public $post;
    
    protected $listeners = ['obtenerComentarios' => 'render', 'eliminarComentario'];

    public function eliminarComentario(Comentario $comentario)
    {
        $comentario->delete();
    }

    public function render()
    {   
        return view('livewire.mostrar-comentario', [
            'post' => $this->post,
        ]);
    }
}
