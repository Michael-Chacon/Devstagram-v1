@extends('layouts.app')
@section('title')
    Pagina principal
@endsection

@section('contenido')
    @if ($posts->count())
    <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @foreach($posts as $post)
            <div>
                <a href="{{ route('posts.show', ['post' => $post, 'user' => $post->user]) }}">
                    <img src="{{ asset('uploads') . '/' . $post->imagen }}" alt="Imagen del posts {{ $post->titulo }}">
                </a>

                <h4 class="gap-5">{{ $post->user->username }}</h4>
            </div>
        @endforeach
    </div>

    <div class="my-10">
        {{ $posts->links() }}
    </div>
    @else
    <p>No hay posts</p>
    @endif
@endsection
