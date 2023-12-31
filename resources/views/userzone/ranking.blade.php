@extends('templates.no_admin')

@section('titulo')
    Ranking...
@endsection

@section('titulo2')
    <p class=" font-caro">Favourites... </p>
@endsection

@section('contenido')
    <div class="container mx-auto p-4">
        <div></div>
        <div>
            <form action="{{ url('/seleccionarVista') }}" method="POST">
                @csrf
                <label for="vistaSelector" class=" font-sans font-bold text-xl text-cyan-300 mr-2"></label>
                <select id="vistaSelector" name="view" class=" rounded-xl font-sans font-extrabold uppercase bg-slate-300">
                    <option value="favourites">Favourites</option>
                    <option value="abandoned">Abandoned Places</option>
                    <option value="creatures">Creatures</option>
                    <option value="ufo">UFO / Ovni</option>
                    <option value="haunted">Haunted House</option>
                    <option value="mystery">Mystery</option>
                    <option value="apparitions">Apparitions</option>
                    <option value="others">Others</option>
                </select>
                <input type="submit" value="Show"
                    class="bg-red-600 border border-gray-400 shadow-red-600 shadow-md text-slate-200 font-bold text-xl p-1 px-4 rounded-xl hover:bg-black hover:text-white">
            </form>
        </div>

        <div
            class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4  bg-black    p-4 rounded-lg">

            @foreach ($places as $place)
                <a href="{{ asset('place/' . $place->id) }}" class="">
                    <div
                        class="hover:bg-red-900 transition-colors  duration-500 ease-in-out max-w-xs rounded-xl overflow-hidden mx-auto my-4
                        @if ($place->theme->id == 5) bg-slate-400 
                        @elseif ($place->theme->id == 4)
                         bg-cyan-800
                        @elseif ($place->theme->id == 3)
                         bg-orange-800
                         @elseif ($place->theme->id == 2)
                         bg-indigo-400 
                         @elseif ($place->theme->id == 1)
                         bg-slate-700
                         @elseif ($place->theme->id == 26)
                         bg-yellow-800
                         @elseif ($place->theme->id == 6)
                         bg-teal-900 @endif            
              font-mono  ">
                        <!-- Imagen -->
                        <img src="{{ asset('img/' . $place->theme->name . '.jpg') }}" alt="image card"
                            class="lowercase w-full p-1 rounded-xl ">

                        <!-- Contenido de la tarjeta -->
                        <div class="px-10 py-4">
                            <!-- Nombre -->

                            <div class="text-center font-bold @if ($place->theme->id == 1) text-red-600  mb-1 @endif">{{ $place->name }}</div>
                            <hr>
                            <!-- Puntuación -->
                            <div class="flex items-center my-2">
                                <svg class="w-4 h-4 fill-current text-pink-400 mr-1" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M12 2C5.47 2 1 7.17 1 12a9 9 0 0 0 9 9 8.93 8.93 0 0 0 6.38-2.63 1 1 0 0 0 .12-1.4l-1.85-2.1a1 1 0 0 0-1.4-.12A6.93 6.93 0 0 1 3 12c0-3.86 3.14-7 7-7a7 7 0 0 1 5.78 3H10a1 1 0 0 0-1 1v2h6.58a7 7 0 0 1-1.96 6.84l-3.69 3.68A1 1 0 0 0 10 20a1 1 0 0 0 .7-.29L14.4 16h1.2a7 7 0 0 1 .97-2.83l2.53-2.54a1 1 0 0 0 .3-.71 1 1 0 0 0-.29-.7A9 9 0 0 0 12 2zM3 12a7 7 0 0 1 .78-3H5a1 1 0 0 0-1 1v2h-.22A6.93 6.93 0 0 1 3 12zm9 8a1 1 0 0 0 .71-.29l2.53-2.53a7.03 7.03 0 0 1-2.83-1.96H10v-1.2l3.85-3.85A9 9 0 0 0 12 20z" />
                                    <path fill="none" d="M0 0h24v24H0z" />
                                </svg>
                                <span class="text-white">{{ $place->puntuation }} Likes</span>
                            </div>

                            <!-- Fecha de Creación -->
                            <p class=" text-amber-500 text-base mb-2">Created at: <span
                                    class="text-gray-300">{{ $place->created_at }}</span></p>

                            <!-- Temática -->
                            <p class="text-gray-900 text-base mb-2">Theme: <span
                                    class="text-cyan-700 border border-black p-1 rounded-md bg-gray-300">{{ $place->theme->name }}</span>
                            </p>

                            <!-- Autor -->
                            <p class="text-gray-900 text-base">Author: <span
                                    class=" text-slate-300">{{ $place->user->name }}</span></p>
                            <p class="text-gray-900 text-base">Location: <span
                                    class=" text-slate-300">{{ $place->location }}</span></p>

                            <hr class="mt-3">
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

    </div>




    <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">



    {{ $places->links() }}






    <p class=" invisible">.</p>
    <p class=" invisible">.</p>
    <p class=" invisible">.</p>
    <p class=" invisible">.</p>
    <p class=" invisible">.</p>
    <p class=" invisible">.</p>
@endsection
