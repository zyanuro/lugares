@extends('templates.register_user')

@section('titulo')
    Enchanted Places - Edit
@endsection

@section('titulo2')
    Edit a Enchanted Place
@endsection

@section('contenido')


    <div class="md:flex justify-center md:gap-10 md:items-center m-5">
        <div class="hidden md:w-6/12 p-5 shadow-2xl">
            <img src="{{ asset('img/login.jpg') }}" alt='Imagen de registro'>
            <hr />
        </div>

        <div class="md:w-auto bg-black">

            @if ($errors->any())
                <div class=" bg-red-400 transition-colors cursor-pointer  font-bold w-auto p-3 text-white mb-3 rounded-lg">

                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ url('places/' . $place->id . 'edit/') }}" method="POST" class="md:grid md:grid-cols-2 gap-4 border border-red-600 rounded-lg p-5" enctype="multipart/form-data">
                @method('PUT')
                @csrf


                <div class="mb-5">
                    <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">
                        Name of the place <span class=" text-red-600 font-mono">*</span>
                    </label>
                    <input id="name" name="name" type="text" placeholder="Name of the place"
                        class="border border-red-600 p-3 w-full rounded-lg" value="{{ $place->name }}" />
                </div>
                <div class="mb-5">
                    <label for="theme" class="mb-2 block uppercase text-gray-500 font-bold">
                        Theme <span class=" text-red-600 font-mono">*</span>
                    </label>
                    <select name="theme" id="theme" class="border border-red-600 p-3 w-full rounded-lg bg-red-200"
                        value="{{ $place->theme->name }}">

                        @foreach ($theme as $theme)
                            <option value="{{ $theme->id }}" class="mb-2 block uppercase text-gray-500 font-bold"
                                @if ($theme->id == $place->theme_id) {{ 'selected' }} @endif>{{ $theme->name }}</option>
                        @endforeach

                    </select>

                </div>

                <div class="mb-5">
                    <label for="latitude" class="mb-2 block uppercase text-gray-500 font-bold">
                        Latitude
                    </label>
                    <input id="latitude" name="latitude" type="text" placeholder="Latitude"
                        class="border border-red-600 p-3 w-full rounded-lg" value="{{ $place->latitude }}" />
                </div>
                <div class="mb-5">
                    <label for="length" class="mb-2 block uppercase text-gray-500 font-bold">
                        Length
                    </label>
                    <input id="length" name="length" type="text" placeholder="Length"
                        class="border border-red-600 p-3 w-full rounded-lg" value="{{ $place->length }}" />
                </div>
                

                <div class="text-white p-4 text-left">
                    <label for="image">Image:</label>
                    <input type="file" name="image" id="image" accept="image/*" class="border border-red-600 bg-blue-500">
                </div>
                <div class="flex flex-col items-center w-auto m-1">
                    <img src="{{ asset('/storage/' . $place->image) }}" alt="image card" class=" w-24 border rounded-lg mb-4">
                </div> 
                <div class="ml-5 mb-3 text-center">
                    <label for="select1" class="font-mono font-bold  text-cyan-300 mr-2  md:visible">Select a
                        filter <span class=" text-red-600 font-mono">*</span></label>
                    <select name="select1" id="select1" onchange="actualizarSelect2()"
                        class="rounded-xl font-mono bg-slate-300 text-gray-600">
                        <option value="opcion0">Select</option>
                        <option value="opcion5">-> Spain</option>
                        <option value="opcion4">Europe</option>
                        <option value="opcion1">Africa</option>
                        <option value="opcion2">America</option>
                        <option value="opcion3">Asia</option>
                        <option value="opcion6">Oceania</option>
                    </select>
                    <select name="location" id="select2" class="rounded-xl font-header bg-slate-300">
                        <!-- Este select se actualizará dinámicamente -->
                    </select>
                  
                            
                </div>
                <div class="text-center"><p class="text-cyan-400 font-mono mb-4">Location by now: <span
                    class="text-red-600 text-lg">{{ $place->location }}</span></p></div>  

                <div class="mb-5">
                    <label for="address" class="mb-2 block uppercase text-gray-500 font-bold">
                        Address <span class=" text-red-600 font-mono">*</span>
                    </label>
                    <input id="address" name="address" type="text" maxlength="250"
                        placeholder="Explanation of the address" class="border border-red-600 p-3 w-full rounded-lg"
                        value="{{ $place->address }}" />
                </div>
                <div class="mb-5">
                    <label for="description" class="mb-2 block uppercase text-gray-500 font-bold">
                        Description of the phenomenon <span class=" text-red-600 font-mono">*</span>
                    </label>
                    <input id="description" name="description" type="text" maxlength="250"
                        placeholder="Explanation of the phenomenon" class="border border-red-600 p-3 w-full rounded-lg"
                        value="{{ $place->description }}" />
                </div>
                <div class=" mb-5">
                    <label for="user" class="mb-2 block  text-gray-500 font-bold text-center">
                        <p class=" text-teal-600 border border-red-600 p-3 w-full rounded-lg">User :
                            {{ Auth::user()->email }}</p>
                    </label>
                    <input id="user" name="user" type="text" placeholder=""
                        class="hidden border border-red-600 p-3 w-full rounded-lg" value="{{ Auth::user()->id }}" />
                </div>

                <div><button type="submit"
                        class=" bg-transparent  hover:bg-teal-600 border transition-colors  shadow-teal-600 shadow-md cursor-pointer uppercase font-bold w-auto p-3 text-white rounded-lg">
                        Update
                    </button>

                    <a href="{{ url()->previous() }};
                        "
                        class=" ml-3 shadow-red-600 shadow-md border border-slate-200 uppercase hover:bg-white transition-colors cursor-pointer w-full p-3 text-red-600 rounded-lg">
                        Back
                    </a>
                </div>
                <p class=" text-slate-200"><span class=" text-red-600 font-mono">*</span> Mandatory</p>

            </form>
            <p class=" invisible">.</p>
            <p class=" invisible">.</p>
            <p class=" invisible">.</p>
            <p class=" invisible">.</p>
            <p class=" invisible">.</p>
            <p class=" invisible">.</p>

        </div>
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

    </div>

@endsection
