@extends('templates.register_user')

@section('titulo')
    Welcome to the mistery...
@endsection

@section('titulo2')
@endsection

@section('contenido')
    <div class="flex justify-center  bg-black place-content-center">

        <div class="md:w-auto shadow-2xl ">
            <a href="{{ route('last') }}"><img src="{{ asset('img/user_zone.jpg') }}" alt='welcome image'
                    class="h-96 pt-20 shadow-red-600 shadow-2xl  rounded-full"></a>
        </div>

    </div>
@endsection
