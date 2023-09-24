@extends('templates.admin')

@section('titulo')
    Enchanted Places - Thematics Management
@endsection

@section('titulo2')
    Thematics Management - Create
@endsection

@section('contenido')


    <div class="md:flex justify-center md:gap-10 md:items-center m-5">
        <div class="hidden md:w-6/12 p-5 shadow-2xl">
            <img src="{{ asset('img/login.jpg') }}" alt='Imagen de registro'>
            <hr />
        </div>

        <div class="md:w-4/12 bg-black">

            @if ($errors->any())
                <div class=" bg-red-400 transition-colors cursor-pointer  font-bold w-auto p-3 text-white mb-3 rounded-lg">

                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ url('adminzone/thematics') }}" method="POST" class="border border-red-600 rounded-lg p-5">
                @csrf

                <div class="mb-5">
                    <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">
                        Name of the thematic
                    </label>
                    <input id="name" name="name" type="text" placeholder="Name of the thematic"
                        class="border border-red-600 p-3 w-full rounded-lg" value="{{ old('name') }}" />
                </div>


                <div class="flex gap-3 text-center p-4 font-header text-2xl"><button type="submit"
                        class=" shadow-red-600 shadow-md border border-slate-200  hover:bg-white transition-colors cursor-pointer w-full p-2 text-red-600 rounded-lg">
                        Done
                    </button>

                    <a href="{{ url('adminzone/thematics/show') }}"
                        class=" b shadow-red-600 shadow-md border border-slate-200  hover:bg-white transition-colors cursor-pointer w-full p-2 text-slate-400 rounded-lg">
                        Back
                    </a>
                </div>

            </form>
            <p class=" invisible">.</p>
            <p class=" invisible">.</p>
            <p class=" invisible">.</p>
            <p class=" invisible">.</p>
            <p class=" invisible">.</p>
            <p class=" invisible">.</p>

        </div>

    </div>

@endsection
