<!DOCTYPE html>
<html class="" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Haunted Places - @yield('titulo')</title>
        @vite('resources/css/app.css', 'resources/js/app.js')

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Creepster&family=Homemade+Apple&family=Luckiest+Guy&display=swap" rel="stylesheet">
        
              
    </head>
 
    <body class="  bg-black">              
    
        <header class=" font-peitri lg:font-header p-2 md:py-5 border-red-600 bg-black shadow fixed-top-0  sticky border-t-4">
            <div class=" container mx-auto flex justify-between items-center ">

                <div class=" w-auto ">
                   <img src="{{asset('img/logo_lugares_encantados.png')}}" alt='logo image'>
                </div>
                <div>
                     <h1 class="text-center w-auto text-3xl text-red-600 md:text-8xl uppercase font-extrabold">Haunted Places</h1>

                </div>
               
                <nav class=" w-auto p-5 flex items-center gap-2">    

                    @if(!Auth::check()){
                    <div><a href="{{url('dashboard')}}" class=" shadow-lg shadow-white p-2 bg-transparent hover:visited:border-x-gray-400 hover:bg-gray-100 transition-colors cursor-pointer 
                    uppercase font-bold text-lg text-red-600 hover:text-black border border-white rounded-md" ">Login</a></div>}
                    @endif
                    <div>
                    @auth  
                    <a class=" shadow-lg shadow-white dropdown-item p-2 bg-transparent hover:visited:border-x-gray-400 hover:bg-gray-100 transition-colors cursor-pointer 
                    uppercase font-bold text-lg text-white hover:text-black border border-red-600 rounded-md" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    @endauth</div>                   
                       
                </nav>

            </div>
        </header>    
                
        <main class="container mx-auto mt-10">
            <h2 class="text-3xl text-center p-5 text-gray-300 font-bold">
                @yield('titulo')
            </h2>

            @yield('contenido') 

        </main>

    </body>

    <footer class=" bg-inherit w-full md:text-xl text-xs text-center text-gray-400 font-bold uppercase  fixed bottom-0">
       <div class="p-10 bg-black border-t-2 border-b-4 border-red-600"><span class=" text-red-600">Haunted Places</span> - All rights reserved - {{now()->year}}</div>
              
    </footer>

</html>
