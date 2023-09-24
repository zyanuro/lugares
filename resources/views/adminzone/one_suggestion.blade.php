@extends('templates.admin')

@section('titulo')
    Enchanted Place - Admin Suggestion
@endsection

@section('titulo2')
    Admin Area - Suggestion
@endsection

@section('contenido')
    <a href="{{ url()->previous() }}"
        class="ml-3 shadow-red-600 shadow-md border border-slate-200  hover:bg-white transition-colors cursor-pointer w-full p-2 text-red-600 rounded-lg">
        Back</a>


    <div class="md:flex justify-center mt-10 mx-5 bg-black place-content-center rounded-xl pb-5">




    </div>

    <body class="bg-gray-100">
        <div class="max-w-screen-lg mx-auto p-4 mt-8">
            <div class="bg-white shadow-lg rounded-lg p-6">
                <p class="text-xl font-bold text-gray-800">User: {{ $suggestion->name }} <span class=" text-lg"><span>-
                            address: {{ $suggestion->email }} - </span></p>
                <p
                    class="@if ($suggestion->user->rol == 1) text-green-600 @elseif ($suggestion->user->rol == 2) text-pink-600 @else text-gray-600 @endif">
                    From: @if ($suggestion->user->rol == 1)
                        Registered
                    @elseif ($suggestion->user->rol == 2)
                        Admin
                    @else
                        Anonymou
                    @endif
                </p>

                <p class="text-gray-600">Received message: {{ $suggestion->created_at }}</p>
                <div class="bg-gray-300 p-3 rounded-lg mt-4">
                    <pre class="whitespace-pre-wrap">{{ $suggestion->suggestion }}         
                          
                
                
                
                </pre>
                </div>
            </div>
        </div>
    </body>

    <p class=" invisible">.</p>
    <p class=" invisible">.</p>
    <p class=" invisible">.</p>
    <p class=" invisible">.</p>
    <p class=" invisible">.</p>
    <p class=" invisible">.</p>
@endsection
