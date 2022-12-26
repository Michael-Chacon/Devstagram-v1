<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Comentario;
use App\Models\Post;

class RegistrarComentario extends Component
{
    public $user;
    public $post;
    public $comentario;

    protected $rules =[
        'comentario' => 'required|max:255',
    ];

    public function registrarComentario() 
    {
        $datos = $this->validate();

        Comentario::create([
            'user_id' => auth()->user()->id,
            'post_id' => $this->post->id,
            'comentario' => $this->comentario,
        ]);
        $this->reset(['comentario']);

        $this->emit('obtenerComentarios');
        $this->emit('alertaRegistro');
    }
    

    public function render()
    {
        return view('livewire.registrar-comentario');
    }
}
