@extends('templates.register_user') 

@section('titulo')

Contact us 

@endsection

@section('titulo2')

<p class=" font-caro">Contact us </p>

@endsection

@section('contenido')

<div class="container mx-auto p-4 font-header block ">
    <div class="max-w-md mx-auto bg-gray-4 00 p-6 rounded-md shadow-md border-2 border-red-600 bg-gray-300">
        <h2 class="text-2xl font-semibold mb-4">Send your suggestion</h2>

        @if ($errors->any())
        <div class=" bg-red-400 transition-colors cursor-pointer  font-thin w-auto p-3 text-white mb-3 rounded-lg">

        <ul>
            @foreach ($errors->all() as $error)
 
            <li>{{ $error }}</li>
                
            @endforeach
        </ul>    
        </div>        
        @endif
        
        <form action="{{url('suggestions')}}" method="GET" class="">
            @csrf

            <div class="@auth hidden @endauth">
                <label for="name" class=" text-gray-800 text-sm font-medium mb-2">Name:</label>
                <input type="text" name="name" id="name" class="w-full px-3 py-2 border rounded-md" required
                value="{{ Auth::user()->name }}">                
            </div>

            <div class="@auth hidden @endauth">
                <label for="email" class="block text-gray-800 text-sm font-medium mb-2">Email:</label>
                <input type="text" name="email" id="email" class="w-full px-3 py-2 border rounded-md" required
                value="{{ Auth::user()->email }}">
                
            </div>

            <div class="mb-4">
                <label for="suggestion" class="block text-gray-800 text-sm font-medium mb-2">Message:</label>
                <textarea name="suggestion" id="suggestion" rows="4" maxlength="250" class="w-full px-3 py-2 border rounded-md" required                >
                </textarea>
            </div>
                       
                        
            <div class="mb-5">
                <label for="user_id" class="mb-2 block  text-gray-500 font-bold text-center">
                    <p class=" font-sans text-teal-600 border border-red-600 p-3 w-full rounded-lg">"User : @auth                        
                    {{ Auth::user()->email }}  @endauth</p>
                </label>
                <input 
                id="user_id"
                name="user_id"
                type="text"
                placeholder=""
                class="hidden border border-red-600 p-3 w-full rounded-lg"                 
                @auth value="{{ Auth::user()->id }}" @endauth
                value='6'                                  
                />
            </div>
            

            <div class="mt-6">
                <button type="submit" class="bg-gray-300 @if (!isset($msg)) visible @else invisible @endif                    
                  border border-gray-400 shadow-red-600 shadow-md text-red-800 text-xl py-2 px-4 rounded-md hover:bg-black hover:text-white">Send</button>
            </div>
            @if(isset($msg) && $msg !== null)
            <hr>
            <span class=" text-indigo-900 text-xl ">{{ $msg }}</span>
            <hr>
            @endif
        </form>
    </div>
</div>
@endsection
