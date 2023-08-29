@extends('templates.no_admin') 

@section('titulo')

Página de bienvenida 

@endsection

@section('contenido')

<div class="md:flex justify-center md:gap-10 md:items-center">
    <div class="md:w-6/12 p-5 shadow-2xl">
        <img src="{{asset('img/registrar.jpg')}}" alt='Imagen de registro'>
        <hr/>
    </div>
   
  
</div>
@endsection