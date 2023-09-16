@extends('templates.admin')

@section('titulo')

Admin Area - moderation zone

@endsection

@section('titulo2')

Moderation zone

@endsection

@section('contenido')

<a href="{{ url()->previous() }}" class="ml-3 shadow-red-600 shadow-md border border-slate-200  hover:bg-white transition-colors cursor-pointer w-full p-2 text-red-600 rounded-lg">Back</a>


<div class="hidden md:flex justify-center mt-10 bg-black place-content-center">
    
    <table class=" text-white text-center">
        <div>
        <thead>
            <tr class="text-red-600 uppercase border-b-white border-b">
                
                <th class="p-2 text-green-700">State</th>
                <th class="p-2">Name</th>
                <th class="p-2">Theme</th>
                <th class="p-2">Latitude</th>
                <th class="p-2">Length</th>
                <th class="p-2">Address</th>
                <th class="p-2">Description</th>
                <th class="p-2"></th>
                <th class="p-2"></th>
            </tr>
        </thead>
    </div>
        <div>
        <tbody>           

                </form>
                @foreach ($places as $place)
                <tr class="border-b-red-600 border-b">

                    <td class="p-5">On Hold -{{ $place->control }}-</td>
                    <td class="p-5">{{ $place->name }}</td>
                    <td class="p-5">{{ $place->theme->name }}</td>
                    <td class="p-5">{{ $place->latitude }}</td>
                    <td class="p-5">{{ $place->length }}</td>
                    <td class="p-5">{{ $place->address }}</td>
                    <td class="p-5">{{ $place->description }}</td>

                    <td class="p-5"><form action="{{route('adminzone.update', $place->id)}}" method="post">
        @csrf
        @method("PUT")
    <!-- Campo de entrada oculto -->
    <input type="hidden" id="campoOculto" name="campoOculto" value="Valor oculto que se enviará al servidor">

    <!-- Botón de envío -->
    <input type="submit" value="Activate" class=" shadow-red-600 shadow-md border border-amber-400 bg-green-500  hover:bg-sky-700 transition-colors cursor-pointer w-full p-2 text-slate-900 font-header rounded-lg">
    </form></td>

                    <td class="p-5">
                        <form action="{{url('places/'.$place->id)}}" method="post" name="delete">
                        @method("DELETE")
                        @csrf
                        <button type="submit" class="btnDelete shadow-amber-400 shadow-md border border-red-600 hover:bg-white transition-colors cursor-pointer
                         w-full p-1 text-red-600 rounded-lg">Delete</button>
    
                        </form>
                    </td>
                </tr>                
                @endforeach      
               
                
                   
        </tbody>
      
    </div>
    
    </table>    
         
    
</div>

<p class=" invisible">.</p>
<p class=" invisible">.</p>
<p class=" invisible">.</p>    
<p class=" invisible">.</p>
<p class=" invisible">.</p>
<p class=" invisible">.</p>

@endsection