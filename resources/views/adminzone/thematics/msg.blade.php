@extends('templates.admin')

@section('titulo')

Message confirmation

@endsection

@section('titulo2')



@endsection

@section('contenido')

<div class="flex flex-col space-y-4 items-center">
    <div> 
        <p class="border border-white p-5 mb-7 rounded-xl shadow-amber-500 shadow-xl uppercase font-header text-4xl text-amber-500 text-center">{{$msg}}</p>
    </div>
    <div>
        <a href="{{url('adminzone/thematics/show')}}" class="bg-zinc-500 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-auto p-3 text-white rounded-lg">
        Volver
        </a>
    </div>
</div>

@endsection