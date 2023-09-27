@extends('templates.no_admin') 

@section('titulo')

Welcome to the mistery... 

@endsection

@section('titulo2')

<p class="font-caro">Welcome to the mistery... </p>

@endsection

@section('contenido')

<div class="md:flex justify-center md:items-center mx-8">
    <div class="md:w-2/6 shadow-2xl mt-10">
       <a href="{{route('last')}}"><img src="{{asset('img/big_moon.jpg')}}" alt='welcome image' class="shadow-red-600 shadow-2xl  rounded-full"></a>        
    </div> 
</div>
<p class=" invisible">.</p>
    <p class=" invisible">.</p>
    <p class=" invisible">.</p>
    <p class=" invisible">.</p>
    <p class=" invisible">.</p>
    <p class=" invisible">.</p>
@endsection