@extends('templates.register_user')

@section('titulo')

Enchanted Places - User Management

@endsection

@section('titulo2')

Create a new Enchanted Place


@endsection

@section('contenido')


<div class="md:flex justify-center md:gap-10 md:items-center m-5">
    <div class="hidden md:w-6/12 p-5 shadow-2xl">
        <img src="{{asset('img/login.jpg')}}" alt='Imagen de registro'>
        <hr/>
    </div>
    
    <div class="md:w-4/12 bg-black p-5 border border-red-600 rounded-lg shadow-xl">
       
        @if ($errors->any())
        <div class=" bg-red-300 transition-colors cursor-pointer  font-bold w-auto p-3 text-white">

        <ul>
            @foreach ($errors->all() as $error)
 
            <li>{{ $error }}</li>
                
            @endforeach
        </ul>    
        </div>        
        @endif

        <form action="{{url('registeredzone')}}" method="POST">
            @csrf

            <div class="mb-5">
                <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">
                    Name of the place
                </label>
                <input 
                   id="name"
                   name="name"
                   type="text"
                   placeholder="Name of the place"
                   class="border border-red-600 p-3 w-full rounded-lg"   
                   value="{{old('name')}}"              
                />
            </div>

            <div class="mb-5">
                 <label for="theme" class="mb-2 block uppercase text-gray-500 font-bold">
                    Theme
                 </label>
                 <input 
                    id="theme"
                    name="theme"
                    type="text"
                    placeholder="The Theme"
                    class="border p-3 w-full rounded-lg"     
                    value="{{old('theme')}}"            
                    />
            </div>

            <div class="mb-5">
                <label for="latitude" class="mb-2 block uppercase text-gray-500 font-bold">
                   Latitude
                </label>
                <input 
                id="latitude"
                name="latitude"
                type="text"
                placeholder="Latitude"
                class="border p-3 w-full rounded-lg"  
                value="{{old('latitude')}}"                    
                />
            </div>
            <div class="mb-5">
                <label for="length" class="mb-2 block uppercase text-gray-500 font-bold">
                    Length
                </label>
                <input 
                id="length"
                name="length"
                type="text"
                placeholder="Length"
                class="border p-3 w-full rounded-lg"  
                value="{{old('length')}}"                   
                />
            </div>
           
            <div><button 
                type="submit"                
                class=" bg-red-600  hover:bg-red-300 transition-colors cursor-pointer uppercase font-bold w-auto p-3 text-white rounded-lg"> 
                Grabar
                </button>

                <a href="{{url('places')}}" class=" bg-slate-600  hover:bg-slate-300 transition-colors cursor-pointer uppercase font-bold w-auto p-3 text-white rounded-xl">
                Volver
                </a>
            </div>
                
        </form>
    </div>
</div>




@endsection