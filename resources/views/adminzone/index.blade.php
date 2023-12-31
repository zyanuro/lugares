@extends('templates.admin')

@section('titulo')
    Welcome to
@endsection

@section('titulo2')
   Dashboard
@endsection

@section('contenido')
    <div class="grid grid-cols-1 text-center place-items-center md:flex bg-black md:place-content-center md:mt-10">


        <div
            class="grid grid-cols-1 md:grid md:grid-cols-2 place-content-center gap-1 m-10 lg:m-0 bg-black   rounded-md  font-header text-2xl items-center">
            <!-- Fila 1 -->
            <a href="{{ url('adminzone/show') }}">
                <div
                    class="lg:w-64 lg:h-64 p-5 bg-red-800 lg:rounded-full rounded-md hover:bg-red-300  text-gray-300 hover:text-gray-900 transition-colors duration-500 ease-in-out flex items-center justify-center">
                    Moderate Places</div>
            </a>
            <a href="{{ url('adminzone/users/index') }}">
                <div
                    class="lg:w-64 lg:h-64 p-5 bg-gray-500 hover:bg-gray-700 lg:rounded-full hover:text-gray-300 transition-colors duration-500 ease-in-out flex items-center justify-center">
                    Moderate Users</div>
            </a>
            <!-- Fila 2 -->
            <a href="{{ url('adminzone/thematics/show') }}">
                <div
                    class="lg:w-64 lg:h-64 p-5 bg-gray-300 hover:bg-gray-500 lg:rounded-full hover:text-gray-300 transition-colors duration-500 ease-in-out flex items-center justify-center">
                    Edit Thematics</div>
            </a>
            <a href="{{ url('adminzone.inbox') }}">
                <div
                    class="lg:w-64 lg:h-64 p-5 bg-red-400 lg:rounded-full rounded-md hover:bg-red-300 text-gray-300 hover:text-gray-900 transition-colors duration-500 ease-in-out flex items-center justify-center">
                    Suggestions Inbox</div>
            </a>
        </div>

    </div>

    <p class=" invisible">.</p>
    <p class=" invisible">.</p>
    <p class=" invisible">.</p>
    <p class=" invisible">.</p>
    <p class=" invisible">.</p>
    <p class=" invisible">.</p>
@endsection
