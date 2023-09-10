<!DOCTYPE html>
<html class="" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Enchanted Places - @yield('titulo')</title>
        @vite('resources/css/app.css')
        @vite('resources/js/app.js')

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Creepster&family=Homemade+Apple&family=Luckiest+Guy&display=swap" rel="stylesheet">       
              
    </head>
 
    <body class="bg-black">        
     
        <!-- Navbar is here -->
		<nav class="bg-black shadow border-t-4  border-t-red-600 border-b-gray-600 w-auto fixed top-0 sticky">
            <div class="container px-6 mx-auto">
                <div class="md:flex flex row justify-between items-center">
                    <!-- left section -->
                    <div class=" bg-black">
                        <div class="w-auto">
                            <a href="{{route('welcome')}}"><img src="{{asset('img/logo_lugares_encantados.png')}}" alt='logo image'></a>
                        </div>                          
                    </div>
                    <div class=" text-center">
                        <a href="{{route('welcome')}}" class="  text-red-600 text-4xl md:text-8xl font-bold hover:text-red-800 font-header text-center w-auto">Enchanted Places</a>
                    </div>
                    <div class="md:hidden">
                        <button id="nav-button" type="button" class=" text-white hover:text-red-600 focus:text-red-600 focus:outline-none">
                            <svg viewBox="0 0 24 24" class="h-8 w-8 fill-current">
                                <path d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"></path>
                            </svg>  
                        </button>
                    </div>
                </div>
                    <!-- right section -->
                    <div id="nav-menu" class=" bg-black font-header  flex flex-col mt-3 hidden lg:flex lg:flex-row :mt-0 md:block items-center">
                        <a href="{{route('last')}}" class="{{request()-> is('last') ? 'text-red-600' : 'text-gray-200'}} text-sm hover:font-medium md:mx-4 hover:text-red-600 hover:border hover:border-red-600 hover:rounded-md hover:p-1 hover:shadow-white hover:shadow-lg">Last</a>
                        <a href="{{route('ranking')}}" class="{{request()-> is('ranking') ? 'text-red-600' : 'text-gray-200'}} text-sm hover:font-medium md:mx-4 hover:text-red-600 hover:border hover:border-red-600 hover:rounded-md hover:p-1 hover:shadow-white hover:shadow-lg">Ranking</a>
                        <a href="{{route('contact')}}" class="{{request()-> is('contact') ? 'text-red-600' : 'text-gray-200'}} text-sm hover:font-medium md:mx-4 hover:text-red-600 hover:border hover:border-red-600 hover:rounded-md hover:p-1 hover:shadow-white hover:shadow-lg">Contact</a>
                        @if(!Auth::check())  
                        <a href="{{route('register')}}" class="font-header shadow-md shadow-white hover:shadow-lg hover:shadow-white p-1 bg-transparent hover:visited:border-x-gray-400 hover:bg-gray-100 transition-colors cursor-pointer 
                        uppercase font-bold text-lg text-red-600 hover:text-black border border-white rounded-md">Register</a>
                        @endif
                        @auth
                         <a href="{{route('places.index')}}" class="text-blue-500 text-sm hover:font-medium md:mx-4 hover:text-red-600 hover:border hover:border-red-600 hover:rounded-md hover:p-1 hover:shadow-white hover:shadow-lg">Management</a>
                        @endauth

                            @if(!Auth::check())                       
                        <a href="{{url('dashboard')}}" class="mt-2 md:mt-0 md:ml-3 font-header shadow-md shadow-white hover:shadow-lg hover:shadow-white p-1 bg-transparent hover:visited:border-x-gray-400 hover:bg-gray-100 transition-colors cursor-pointer 
                        uppercase font-bold text-lg text-amber-400 hover:text-black border border-white rounded-md">Login</a>
                        @endif
                           
                        @auth  
                        <a class=" font-header shadow-md shadow-white p-2 bg-transparent hover:visited:border-x-gray-400 hover:bg-gray-100 transition-colors cursor-pointer 
                        uppercase font-bold text-lg text-white hover:text-black border border-red-600 rounded-md" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('Log-out') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                        </form>
                        @endauth
                          
                    </div>
               
            </div>
        </nav>
        @auth
        <a href="{{route('profile.edit')}}"><p class="mr-10 font-header text-right text-3xl text-teal-700">Hello <span class="uppercase">{{ Auth::user()->name }}</span></p></a>     
        @endauth
                
        <main class="container mx-auto">
            <h2 class="text-3xl text-center p-5 text-gray-300 font-bold">
                @yield('titulo2')
            </h2>

            @yield('contenido') 

        </main>

    </body>

    <footer class="bg-inherit w-full md:text-xl text-xs text-center text-gray-400 font-bold uppercase max-h-screen fixed bottom-0">
       <div class="p-3 bg-black border-t-2 border-b-4 border-red-600"><span class=" text-red-600">Enchanted Places</span> - All rights reserved - {{now()->year}}</div>
              
    </footer> 

</html>
