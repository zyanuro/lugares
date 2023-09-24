@extends('templates.no_admin')

@section('titulo')
    The Last...
@endsection

@section('titulo2')
    <p class=" font-caro">the Last ... </p>
@endsection

@section('contenido')
    <div class="  ml-5 ">
        <form action="{{ url('/selectLocation') }}" method="POST">
            @csrf
            <label for="select1" class="font-sans font-bold text-xl text-cyan-300 mr-2 hidden md:visible">Select a
                filter:</label>
            <select name="select1" id="select1" onchange="actualizarSelect2()"
                class="rounded-xl font-sans font-extrabold uppercase bg-slate-300 text-gray-600">
                <option value="opcion0"> Select </option>
                <option value="opcion5">-> Spain</option>
                <option value="opcion4">Europe</option>
                <option value="opcion1">Africa</option>
                <option value="opcion2">America</option>
                <option value="opcion3">Asia</option>
                <option value="opcion6">Oceania</option>
            </select>
            <select name="location" id="select2" class="rounded-xl font-sans font-extrabold uppercase bg-slate-300">
                <!-- Este select se actualizará dinámicamente -->
            </select>
            <input type="submit" value="Show"
                class="bg-red-600 border border-gray-400 shadow-red-600 shadow-md text-slate-200 font-bold text-xl p-1 px-4 rounded-xl hover:bg-black hover:text-white">

        </form>
    </div>

    <div class="container mx-auto p-4 mt-0 shadow-2xl">

        <div class="grid grid-cols-1 md:grid-cols-4 bg-black p-4 rounded-lg">

            @foreach ($places as $place)
                <a href="{{ asset('place/' . $place->id) }}" class="">
                    <div
                        class="hover:bg-red-900 transition-colors duration-500 ease-in-out max-w-xs rounded-xl overflow-hidden mx-auto my-4
             @if ($place->theme->id == 5) bg-slate-400 
              @elseif ($place->theme->id == 4)
               bg-zinc-400
              @elseif ($place->theme->id == 3)
               bg-orange-800
               @elseif ($place->theme->id == 2)
             bg-indigo-300 
               @elseif ($place->theme->id == 1)
               bg-slate-800
               @elseif ($place->theme->id == 26)
                bg-fuchsia-200
               @elseif ($place->theme->id == 6)
               bg-teal-900 @endif              
              font-header  ">
                        <!-- Imagen -->
                        <img src="{{ asset('img/' . $place->theme->name . '.jpg') }}" alt="image card"
                            class="lowercase w-full p-1 rounded-xl ">

                        <!-- Contenido de la tarjeta -->
                        <div class="px-10 py-4 ">
                            <!-- Nombre -->

                            <div
                                class=" text-center  @if ($place->theme->id == 1) text-white @else text-slate-800 mb-1 @endif">
                                {{ $place->name }}</div>
                            <hr>
                            <!-- Puntuación -->
                            <div class="flex items-center my-2">
                                <svg class="w-4 h-4 fill-current text-black mr-1" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M12 2C5.47 2 1 7.17 1 12a9 9 0 0 0 9 9 8.93 8.93 0 0 0 6.38-2.63 1 1 0 0 0 .12-1.4l-1.85-2.1a1 1 0 0 0-1.4-.12A6.93 6.93 0 0 1 3 12c0-3.86 3.14-7 7-7a7 7 0 0 1 5.78 3H10a1 1 0 0 0-1 1v2h6.58a7 7 0 0 1-1.96 6.84l-3.69 3.68A1 1 0 0 0 10 20a1 1 0 0 0 .7-.29L14.4 16h1.2a7 7 0 0 1 .97-2.83l2.53-2.54a1 1 0 0 0 .3-.71 1 1 0 0 0-.29-.7A9 9 0 0 0 12 2zM3 12a7 7 0 0 1 .78-3H5a1 1 0 0 0-1 1v2h-.22A6.93 6.93 0 0 1 3 12zm9 8a1 1 0 0 0 .71-.29l2.53-2.53a7.03 7.03 0 0 1-2.83-1.96H10v-1.2l3.85-3.85A9 9 0 0 0 12 20z" />
                                    <path fill="none" d="M0 0h24v24H0z" />
                                </svg>
                                <span class="text-white">{{ $place->puntuation }} Likes</span>
                            </div>

                            <!-- Fecha de Creación -->
                            <p class=" text-gray-700 text-base mb-2">Created at: <span
                                    class="text-gray-300">{{ $place->created_at }}</span></p>

                            <!-- Temática -->
                            <p class="text-gray-700 text-base mb-2">Theme: <span
                                    class="text-cyan-700 border border-black p-1 rounded-md bg-gray-300">{{ $place->theme->name }}</span>
                            </p>

                            <!-- Autor -->
                            <p class="text-gray-700 text-base">Author: <span
                                    class=" text-slate-300">{{ $place->user->name }}</span></p>
                            <!-- Location -->
                            <p class="text-gray-700 text-base">Location: <span
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

    <script>
        function actualizarSelect2() {
            var select1 = document.getElementById("select1");
            var select2 = document.getElementById("select2");
            var select1Value = select1.value;

            // Borramos todas las opciones del segundo select
            select2.innerHTML = "";

            // Agregamos las opciones correspondientes al valor seleccionado en el primer select
            if (select1Value === "opcion1") {
                var opciones = ["Africa"];
            } else if (select1Value === "opcion2") {
                var opciones = ["America"];
            } else if (select1Value === "opcion3") {
                var opciones = ["Asia"];
            } else if (select1Value === "opcion4") {
                var opciones = ["Europe"];
            } else if (select1Value === "opcion5") {
                var opciones = ["Álava", "Albacete", "Alicante", "Almería", "Asturias", "Ávila", "Badajoz", "Barcelona",
                    "Burgos", "Cáceres", "Cádiz", "Cantabria", "Castellón", "Ciudad Real",
                    "Córdoba", "Cuenca", "Gerona", "Granada", "Guadalajara", "Guipúzcoa", "Huelva", "Huesca",
                    "Islas Balears", "Jaén", "La Coruña", "La Rioja", "Las Palmas", "León", "Lérida", "Lugo",
                    "Madrid", "Málaga", "Murcia", "Navarra", "Orense", "Palencia", "Pontevedra", "Salamanca",
                    "Santa Cruz de Tenerife", "Segovia", "Sevilla", "Soria", "Tarragona", "Teruel", "Toledo",
                    "Valencia", "Valladolid", "Vizcaya", "Zamora", "Zaragoza"
                ];
            } else if (select1Value === "opcion6") {
                var opciones = ["Oceania"];
            }
            // Agregamos las nuevas opciones al segundo select
            for (var i = 0; i < opciones.length; i++) {
                var opcion = document.createElement("option");
                opcion.text = opciones[i];
                opcion.value = opciones[i];
                select2.add(opcion);
            }
        }
    </script>

    <p class=" invisible">.</p>
    <p class=" invisible">.</p>
    <p class=" invisible">.</p>
    <p class=" invisible">.</p>
    <p class=" invisible">.</p>
    <p class=" invisible">.</p>
@endsection
