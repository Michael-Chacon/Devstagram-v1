@extends('layouts.app')

@section('title')
    {{ $post->titulo }}
@endsection

@section('contenido')
<div class="container mx-auto md:flex">
    <div class="md:w-1/2">
        <img src="{{ asset('uploads') . '/' . $post->imagen }}" alt="Imagen de la publicación {{ $post->titulo }}">
        <div class="p-3 flex items-center gap-4">
            @auth
                <livewire:like-post :posts="$post" />
            @endauth
        </div>
            <div class="">
                <p class="font-bold">{{ $post->user->username }}</p>
                <p class="text-sm text-gray-500">
                    {{ $post->created_at->diffForHumans() }}
                </p>
                <p class="mt-5">
                    {{ $post->descripcion }}
                </p>
            </div>
            @auth
                @if ($post->user_id === auth()->user()->id)
                    <form action="{{ route('posts.destroy', $post) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Eliminar publicación" class="bg-red-500 hober:bg-red-600 p-2 rounded text-white font-bold mt-4 cursor-pointer">
                    </form>
                @endif
            @endauth
        </div>
        <div class="md:w-1/2 p-5">
            @auth
                
            <div class="shadow bg-white p-5 mb-5">
                <p class="text-xl font-bold text-center mb-4">
                    Agrega un Nuevo Comentario
                </p>

            </div>
            @if (session('mensaje'))
                <p class="bg-green-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ session('mensaje')}}</p>
            @endif
            <form action="{{ route('comentarios.store', ['user' => $user, 'post' => $post]) }}" method="POST">
                @csrf
                <div class="mb-5">
                    <label for="comentario" class="mb-2 block uppercase text-gray-500 font-bold">Comment:</label>
                    <textarea type="text" id="comentario" name="comentario" placeholder="Add Comment" class="border p-3 w-full rounded-lg @error('descripcion') border-red-500 @enderror"></textarea>
                    @error('comentario')
                        <p class="bg-red-500 text-black my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>
                
                <input type="submit" value="Comentar" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
            </form>
            @endauth
            <div class="mt-10 bg-white shadow md-5 rounded max-h-96 overflow-y-scroll">
                @if ($post->comentarios->count())
                    @foreach($post->comentarios as $comentario)
                        <div class="p-5 border-gray-300 border-b">
                            <a href="{{ route('posts.index', $comentario->user) }}" class="font-bold">
                                {{ $comentario->user->username }}
                            </a>
                            <p class="">
                                {{ $comentario->comentario }}
                            </p>
                            <small class="text-gray-500">
                                {{ $comentario->created_at->diffForHumans() }}
                            </small>
                        </div>
                    @endforeach
                @else
                    <p class="p-10 text-center">No hay comentarios aún</p>
                @endif
            </div>
        </div>
    </div>
    @endsection