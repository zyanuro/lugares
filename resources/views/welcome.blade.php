@extends('templates.no_admin') 

@section('titulo')

Welcome Page

@endsection

@section('contenido')

<div class="md:flex justify-center md:gap-10 md:items-center">
    <div class="md:w-auto shadow-2xl">
        <img src="{{asset('img/big_moon.webp')}}" alt='welcome image' class="p-4 border-2 border-black  rounded-full">
        <hr/>
    </div>
   
  
</div>
@endsection