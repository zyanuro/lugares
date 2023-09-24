@extends('templates.no_admin')

@section('titulo')
    Block Info
@endsection

@section('titulo2')
@endsection

@section('contenido')
    <div class="flex flex-col space-y-4 items-center mx-5 mt-20">
        <div>
            <p
                class="border border-white p-5 mb-7 rounded-xl shadow-red-300 shadow-xl uppercase font-sans text-4xl text-red-300 text-center">
                This User has been blocked. Please contact whith the administrator. Thanks</p>
        </div>
        <div>
            <a href="{{ url()->previous() }}"
                class=" shadow-white shadow-md hover:text-slate-300 bg-transparent border border-red-600 font-sans hover:bg-red-700 transition-colors cursor-pointer uppercase font-bold w-auto p-3 text-red-600 rounded-lg">
                Back
            </a>
        </div>
    </div>
@endsection
