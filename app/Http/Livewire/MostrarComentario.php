<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Comentario;

class MostrarComentario extends Component
{
    public $post;
    
    protected $listeners = ['eliminarComentario', 'tal' => 'render', 'obtenerComentarios' => 'render'];

    public function eliminarComentario(Comentario $comentario)
    {
        $comentario->delete();
        $this->emit('tal');
    }

    public function render()
    {   
        return view('livewire.mostrar-comentario');
    }


}
