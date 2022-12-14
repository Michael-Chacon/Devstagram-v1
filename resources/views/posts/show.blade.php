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
                        <input type="submit" value="Eliminar publicación"
                            class="bg-red-500 hober:bg-red-600 p-2 rounded text-white font-bold mt-4 cursor-pointer">
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
                    <p class="bg-green-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ session('mensaje') }}</p>
                @endif
                <livewire:registrar-comentario :post="$post" />
            @endauth
            <livewire:mostrar-comentario :post="$post" />
        </div>
    </div>
    @push('scripts')
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            livewire.on('alertaRegistro', function() {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Tu comentario fue registrado con éxito',
                    showConfirmButton: false,
                    timer: 1500
                })
            });
        </script>
    @endpush
@endsection
