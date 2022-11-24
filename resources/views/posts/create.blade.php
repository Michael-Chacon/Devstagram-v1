@extends('layouts.app')

@section('title')
    Crear una nueva publicación
@endsection
@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush
    
@section('contenido')
    <div class="md:flex md:items-center">
        <div class="md:w-1/2 px-10">
            <form action="{{ route('imagenes.store') }}" enctype="multipart/form-data" method="POST" id="dropzone" class="dropzone border-dashed border-2 w-full h-92 rounded flex flex-col justify-center items-center">
                @csrf
            </form>
        </div>

        <div class="md:w-1/2 p-10  bg-white  rounded-lg shadow-lg mt-10 md:mt-0">
            <form action="{{ route('posts.store') }}" method="POST">
                @csrf
                <div class="mb-5">
                    <label for="title" class="mb-2 block uppercase text-gray-500 font-bold">Title:</label>
                    <input type="text" id="title" name="titulo" placeholder="Title of your publication" class="border p-3 w-full rounded-lg @error('titulo') border-red-500 @enderror" value="{{ old('titulo') }}">
                    @error('titulo')
                        <p class="bg-red-500 text-black my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="description" class="mb-2 block uppercase text-gray-500 font-bold">Description:</label>
                    <textarea type="text" id="description" name="descripcion" placeholder="descripcion of your publication" class="border p-3 w-full rounded-lg @error('descripcion') border-red-500 @enderror">{{ old('descripcion') }}</textarea>
                    @error('descripcion')
                        <p class="bg-red-500 text-black my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>

                <input type="hidden" name="imagen" value="{{ old('imagen') }}">
                @error('imagen')
                    <p class="bg-red-500 text-black my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                @enderror

                <input type="submit" value="Save publication" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
            </form>
        </div>
    </div>
@endsection