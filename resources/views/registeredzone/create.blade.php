@extends('templates.register_user')

@section('titulo')

Enchanted Places - User Management

@endsection

@section('titulo2')

<p class=" font-header">Hello again - <span class=" text-red-600">{{ Auth::user()->name }}</span></p>

@endsection

@section('contenido')

<div class="md:flex justify-center md:items-center">
    
    <div class="md:w-auto shadow-2xl">
        <a href="{{route('last')}}"><img src="{{asset('img/user_zone.jpg')}}" alt='welcome image' class=" h-96 pt-20 shadow-red-600 shadow-2xl  rounded-full"></a>        
     </div> 
    
</div>

@endsection