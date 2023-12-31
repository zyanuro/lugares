@extends('templates.no_admin')

@section('titulo')
    Enchanted Places - Place data
@endsection

@section('titulo2')
    <p class=" font-caro">Place data</p>
@endsection

@section('contenido')
    <a href="{{ url()->previous() }}"
        class="ml-3 shadow-red-600 shadow-md border border-slate-200  hover:bg-white transition-colors cursor-pointer w-full p-2 text-red-600 rounded-lg">Back</a>

    <!-- Contenido de la ficha -->

    <div
        class="mt-10 md:mt-16 rounded-xl m-4 px-5 py-6 bg-indigo-400 bg-opacity-20 font-header shadow-white shadow-md border-2 border-red-800 
               grid grid-cols-1 place-items-center md:flex gap-14 md:justify-center items-center">
        <!-- Imagen -->
        <img src="{{ asset('img/' . $place->theme->name . '.jpg') }}" alt="image card"
            class=" w-56 rounded-full shadow-white shadow-md">

        <!-- Contenido de la tarjeta -->
        <div class="w-full font-mono">
            <!-- Nombre -->
            <div class="text-center text-2xl md:text-4xl font-bold text-slate-300 mb-3">{{ $place->name }}</div>
            <hr class="mb-3">

            <!-- Fecha de Creación -->
            <p class=" text-sky-300 text-base mb-2">Created at: <span class="text-gray-300">{{ $place->created_at }}</span>
            </p>

            <!-- Temática -->
            <p class="text-sky-300 text-base mb-2">Theme: <span
                    class="font-header text-cyan-700 border border-black p-1 rounded-md bg-gray-300">{{ $place->theme->name }}</span>
            </p>

            <!-- Autor -->
            <p class="text-sky-300 text-base">Author: <span class=" text-slate-300">{{ $place->user->name }}</span></p>
            <p class="text-sky-300 text-base">Extra address: <span class=" text-slate-300">{{ $place->address }}</span></p>
            <p class="text-sky-300 text-base ">Phenomenon: <span class=" text-slate-300">{{ $place->description }}</span>
            </p>

            <hr class="mt-3">

            <!-- Puntuación -->
            <div class="flex items-center my-2">
                <svg class="w-4 h-4 fill-current text-white mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path
                        d="M12 2C5.47 2 1 7.17 1 12a9 9 0 0 0 9 9 8.93 8.93 0 0 0 6.38-2.63 1 1 0 0 0 .12-1.4l-1.85-2.1a1 1 0 0 0-1.4-.12A6.93 6.93 0 0 1 3 12c0-3.86 3.14-7 7-7a7 7 0 0 1 5.78 3H10a1 1 0 0 0-1 1v2h6.58a7 7 0 0 1-1.96 6.84l-3.69 3.68A1 1 0 0 0 10 20a1 1 0 0 0 .7-.29L14.4 16h1.2a7 7 0 0 1 .97-2.83l2.53-2.54a1 1 0 0 0 .3-.71 1 1 0 0 0-.29-.7A9 9 0 0 0 12 2zM3 12a7 7 0 0 1 .78-3H5a1 1 0 0 0-1 1v2h-.22A6.93 6.93 0 0 1 3 12zm9 8a1 1 0 0 0 .71-.29l2.53-2.53a7.03 7.03 0 0 1-2.83-1.96H10v-1.2l3.85-3.85A9 9 0 0 0 12 20z" />
                    <path fill="none" d="M0 0h24v24H0z" />
                </svg>
                <span class="text-white">{{ $place->puntuation }} <span class="text-pink-500 ml-1">Likes</span></span>
                @auth
                    <div
                        class=" @foreach ($votes as $vote) @endforeach
                    @if ($vote->place_id == $place->id && $vote->user_id == Auth::id()) hidden
                        @else
                        visible @endif">
                        <form method="POST" action="{{ url('votation') }}">
                            @csrf
                            <input type="hidden" name="place_id" value="{{ $place->id }}">
                            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                            <input type="hidden" name="puntuation" value="{{ $place->puntuation }}">
                            <button type="submit"
                                class="ml-2 font-header text-amber-300 rounded-full border hover:text-red-600 border-white hover:border-red-600 p-1 px-2">Vote</button>
                        </form>
                    </div>
                @endauth
            </div>

            <!-- Enlace de mapas -->
        </div>
        <button id="" class="hidden rounded-2xl w-auto m-4">
            <div class="grid grid-cols-1 bg-slate-400 hover:bg-amber-500 text-center rounded-2xl m-4 w-full">

                <div class="flex mt-6">
                    <p class="text-gray-700 text-base">Latitude: <span
                            class=" text-slate-300">{{ $place->latitude }}</span></p>
                    <p class="text-gray-700 text-base">Length: <span class=" text-slate-300">{{ $place->length }}</span>
                    </p>
                </div>
                <img src="{{ asset('img/map.jpg') }}" alt="image card" class="w-full rounded-full p-3 ">
                <p class="text-red-700 text-base">PUSH HERE</p>
            </div>
        </button>
        <button id="btnMap" class="hover:bg-red-800 rounded-lg">
        <div class="flex flex-col items-center border border-lime-400 rounded-md">
            <div class="text-slate-300">
                <p> View Photograph</p>
            </div>
            
                <div class="w-auto m-1">
                    <img src="{{ asset('/storage/' . $place->image) }}" alt="image card" class=" w-96 rounded-lg">
                </div>            
            </div>
        </button>
    </div>

    <!-- Contenido de fotografía -->

    <div  id="map_content" class="hidden flex flex-col items-center m-1 w-auto ">
        <img src="{{ asset('/storage/' . $place->image) }}" alt="image card" class=" w-auto rounded-lg">
    </div>

    <!-- Contenido de Mapas -->

    <div  class="w-auto">
        <div
            class="md:mt-20 rounded-xl overflow-hidden  m-4 px-5 py-6 bg-indigo-400 bg-opacity-20 font-header shadow-white shadow-md border-2 border-red-800 
    grid grid-cols-1 place-items-center md:flex gap-10 md:justify-center items-center">
            <!-- Imagen -->


            <!-- Contenido de la tarjeta -->
            <div class="flex flex-col items-center px-1 text-center font-mono w-full">
                <!-- Nombre -->

                <div class="text-center text-2xl md:text-4xl font-bold text-slate-300 mb-3">Location Map</div>

                <!-- Mapa Google -->
                @if ($place->latitude != 1.00000 && $place->length != 1.00000)
                    <div id="map" class="border border-red-600 w-full" style="height: 400px; width: 100%;"></div>
                @else
                    <img src="{{ asset('img/enchanted_map.jpg') }}" alt="image card"
                        class="lowercase w-80 p-1 rounded-2xl ">
                    <p class=" text-red-500 font-extrabold font-mono text-center">Whithout Coordenates</p>
                    <p class=" text-red-500 font-extrabold font-mono text-center">Map Generation Not Available</p>
                @endif

                <!-- Fecha de Creación -->
                <p class="text-sky-300 text-base mt-3">Extra address: <span
                        class=" text-slate-300">{{ $place->address }}</span></p>
                <p class="text-sky-300 text-base mt-3">Location: <span
                        class=" text-slate-300">{{ $place->location }}</span></p>

                <hr class="mt-3">
            </div>
            <div class="grid grid-cols-1 bg-slate-400 border-4 border-lime-200 text-center rounded-2xl mr-4 p-10">

                <p class="text-gray-700 text-base">Latitude: <span class=" text-slate-300">{{ $place->latitude }}</span>
                </p>
                <p class="text-gray-700 text-base">Length: <span class=" text-slate-300">{{ $place->length }}</span>
                </p>

            </div>
        </div>
    </div>

    <!-- Comentatios de la tarjeta -->

    <div
        class="md:mt-20 rounded-xl overflow-hidden m-1 py-6 bg-indigo-400 bg-opacity-20 font-mono shadow-white shadow-md border-2 border-red-800 
grid grid-cols-1 place-items-center md:flex md:justify-center items-center">
        <!-- Imagen -->
        <!-- <img src="{{ asset('img/' . $place->theme->name . '.jpg') }}" alt="image card" class="lowercase w-auto p-1 rounded-full "> -->

        <!-- Comentatios de la tarjeta -->
        <div class="w-full">
            <!-- Nombre -->
            <div class="text-center text-2xl md:text-2xl font-bold text-slate-300 mb-1">Comments</div>

            @foreach ($comment as $comment)
                <div
                    class=" bg-slate-300 rounded-md shadow-red-600 shadow-md border-2 border-red-300 p-3 mx-4 md:mx-24 mb-4 w-auto">
                    <div class="flex justify-between items-center mb-2 text-red-600">

                        <span class="font-semibold mr-1">Author: <span
                                class=" text-indigo-800 rounded-md p-1 border border-indigo-800 bg-white">{{ $comment->user->name }}</span></span>
                        <span class="text-gray-500 text-sm">Created_at: <span
                                class=" text-indigo-800">{{ $comment->created_at }}</span></span>
                    </div>
                    <p class="text-gray-800 w-11/12">{{ $comment->comment }}</p>
                </div>
            @endforeach

            <!-- Formulario de mensajes -->
            @auth
                <div class="id="myForm" bg-black w-auto text-start">

                    @if ($errors->any())
                        <div
                            class=" font-sans bg-red-400 transition-colors cursor-pointer  font-bold w-auto p-3 text-white mb-3 rounded-lg">

                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ url('comment') }}" method="POST" class=" p-2 ">
                        @csrf

                        <div class="mb-1">
                            <label for="comment" class="mb-2 block text-xs text-gray-500 font-thin">
                                What is your opinion?
                            </label>
                            <textarea name="comment" id="comment" placeholder="Write a comment" value="{{ old('comment') }}" rows="4"
                                cols="35" maxlength="250" class=" rounded-lg"></textarea>
                        </div>
                        <div class="hidden mb-5">
                            <label for="user" class="mb-2 block  text-gray-500 font-bold text-center">
                                <p class=" text-teal-600 border border-red-600 p-3 w-full rounded-lg">User :
                                    {{ Auth::user()->email }}</p>
                            </label>
                            <input id="user" name="user" type="text" placeholder=""
                                class="hidden border border-red-600 p-3 w-full rounded-lg" value="{{ Auth::user()->id }}" />
                        </div>
                        <div class="hidden mb-5">
                            <label for="placeId" class="mb-2 block  text-gray-500 font-bold text-center">
                                <p class=" text-teal-600 border border-red-600 p-3 w-full rounded-lg">Place id :
                                    {{ $place->id }}</p>
                            </label>
                            <input id="placeId" name="placeId" type="text" placeholder=""
                                class="hidden border border-red-600 p-3 w-full rounded-lg" value="{{ $place->id }}" />
                        </div>

                        <div class="flex gap-3 w-2/3  p-4 font-header text-xl">
                            <button type="submit"
                                class="shadow-red-600 shadow-md border border-slate-200  hover:bg-white transition-colors cursor-pointer w-auto p-2 text-red-600 rounded-lg">
                                Send
                            </button>
                        </div>
                </div>
            </div>
        </div>
    @endauth
    @guest
        </div>
        </div>
    @endguest

    <div>
        <p class=" invisible">.</p>
        <p class=" invisible">.</p>
        <p class=" invisible">.</p>
        <p class=" invisible">.</p>
        <p class=" invisible">.</p>
        <p class=" invisible">.</p>
    </div>


    <!-- Script para generar Mapas de google con las coordenadas -->
    <script>
        var latitud = {{ $place->latitude }};
        var longitud = {{ $place->length }};
        var myPoint = 'Enchanted place';

        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                center: {
                    lat: latitud,
                    lng: longitud
                },
                zoom: 15 // Ajusta el nivel de zoom según tus necesidades
            });

            var marker = new google.maps.Marker({
                position: {
                    lat: latitud,
                    lng: longitud
                },
                map: map,
                title: myPoint // Cambia el título del marcador según tus necesidades
            });
        }

        initMap();
    </script>
@endsection
