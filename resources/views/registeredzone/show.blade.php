@extends('templates.register_user')

@section('titulo')

List of Places 

@endsection

@section('titulo2')

List of Places:

@endsection

@section('contenido')


<div class="hidden md:flex justify-center  bg-black place-content-center">
    
    <table class=" text-white text-center">
        <div>
        <thead>
            <tr class="text-red-600 uppercase border-b-white border-b">
                
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
                @foreach ($place as $place)
                <tr class="border-b-red-600 border-b">
                    
                    <td class="p-5">{{ $place->name }}</td>
                    <td class="p-5">{{ $place->theme->name }}</td>
                    <td class="p-5">{{ $place->latitude }}</td>
                    <td class="p-5">{{ $place->length }}</td>
                    <td class="p-5">{{ $place->address }}</td>
                    <td class="p-5">{{ $place->description }}</td>
                    <td class="p-5"><a href="{{url('places/'.$place->id.'/edit')}}" class=" shadow-red-600 shadow-md border border-amber-400  hover:bg-sky-700 transition-colors cursor-pointer w-full p-2 text-amber-400 rounded-lg">Editar</a></td>
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

<div class="flex md:hidden justify-center  bg-black place-content-center">
    
    <table class=" text-white text-center">
        <div>
        <thead>
            <tr class="text-red-600 uppercase border-b-white border-b">
                
                <th class="p-2">Name</th>                
                <th class="p-2"></th>
                <th class="p-2"></th>
            </tr>
        </thead>
    </div>
        <div>
        <tbody>
            
                @foreach ($mobile_place as $place)
                <tr class="border-b-red-600 border-b">
                    
                    <td class="p-5">{{ $place->name }}</td>
                    
                    <td class="p-5"><a href="{{url('places/'.$place->id.'/edit')}}" class="shadow-red-600 shadow-md border border-amber-400  hover:bg-sky-700 transition-colors cursor-pointer w-full p-2 text-amber-400 rounded-lg">Editar</a></td>
                    <td class="p-5">
                        <form action="{{url('places/'.$place->id)}}" method="post" name="delete">
                        @method("DELETE")
                        @csrf
                        <button class="btnDelete type="submit" class=" shadow-amber-400 shadow-md border border-red-600 hover:bg-white transition-colors cursor-pointer   w-full p-1 text-red-600 rounded-lg " >Delete</button>
    
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