@extends('templates.register_user')

@section('titulo')

Message confirmation

@endsection

@section('titulo2')



@endsection

@section('contenido')

<div class="flex flex-col space-y-4 items-center">
    <div> 
        <p class="border border-white p-5 mb-7 rounded-xl shadow-teal-300 shadow-xl uppercase font-header text-4xl text-teal-600 text-center">{{$msg}}</p>
    </div>
    <div>
        <a href="{{url('places/list')}}" class="bg-zinc-500 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-auto p-3 text-white rounded-lg">
        Volver
        </a>
    </div>
</div>

@endsection