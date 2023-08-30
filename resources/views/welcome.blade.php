@extends('templates.no_admin') 

@section('titulo')

<p class=" font-caro">Welcome to the mistery... </p>

@endsection

@section('contenido')

<div class="md:flex justify-center md:items-center">
    <div class="md:w-auto shadow-2xl">
        <img src="{{asset('img/big_moon.webp')}}" alt='welcome image' class="p-10 rounded-full">       
    </div> 
</div>

@endsection