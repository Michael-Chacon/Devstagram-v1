@extends('layouts.app')

@section('title')
    Registrate en DevStagram
@endsection

@section('contenido')
    <div class="md:flex md:justify-center">
        <div class="md:w-4/12">
            <img src="" alt="Crar cuenta">
        </div>
        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-lg ">
            <form action="">
                <div class="mb-5">
                    <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">Name:</label>
                    <input type="text" id="name" name="name" placeholder="Your name" class="border p-3 w-full rounded-lg">
                </div>
                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">Username:</label>
                    <input type="text" id="username" name="username" placeholder="Nombre de usuario" class="border p-3 w-full rounded-lg">
                </div>
                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">Email:</label>
                    <input type="email" id="email" name="email" placeholder="Your email" class="border p-3 w-full rounded-lg">
                </div>
                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">Password:</label>
                    <input type="password" id="password" name="password" placeholder="Your password" class="border p-3 w-full rounded-lg">
                </div>
                <div class="mb-5">
                    <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">Repead assword:</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Repead your password" class="border p-3 w-full rounded-lg">
                </div>
                <input type="submit" value="Crear cuenta" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
            </form>
        </div>
    </div>
@endsection