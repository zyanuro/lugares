<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Haunted Places - @yield('titulo')</title>
        @vite('resources/css/app.css', 'resources/js/app.js')
              
    </head>

    <body class=" bg-black">         
           
    
        <header class="p-5 border-b bg-black shadow">
            <div class=" container mx-auto flex justify-between items-center">

                <div class=" w-auto ">
                   <img src="{{asset('img/logo_lugares_encantados.png')}}" alt='logo image'>
                </div>

                <h1 class=" w-auto text-3xl text-red-600 md:text-6xl font-extrabold">Haunted Places</h1>

                <nav class=" w-auto flex items-center gap-2 ">    

                    <div><a href="{{url('dashboard')}}" class="p-1 bg-slate-400 hover:visited:border-x-gray-400 hover:bg-gray-100 transition-colors cursor-pointer 
                    uppercase font-bold  text-back border-zinc-950 rounded-lg" ">Usuario</a></div>
                    <div>@auth  
                    <a class="dropdown-item p-1 bg-slate-400 hover:visited:border-x-gray-400 hover:bg-gray-100 transition-colors cursor-pointer 
                    uppercase font-bold  text-back border-zinc-950 rounded-lg" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
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

    <footer class="text-center p-5 text-gray-400 font-bold uppercase">
        DevStagram - Todos los derechos reservados - {{now()->year}}
              
    </footer>

</html>
