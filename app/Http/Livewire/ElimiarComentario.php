<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Comentario;

class ElimiarComentario extends Component
{   
    // public function eliminarComentario(Comentario $comentario)
    // {
    //     $comentario->delete();
    //     // $this->emit('eliminarComentario');
    // }

    public function render()
    {
        return view('livewire.elimiar-comentario');
    }
}
