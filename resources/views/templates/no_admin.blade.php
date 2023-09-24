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
    <link
        href="https://fonts.googleapis.com/css2?family=Creepster&family=Homemade+Apple&family=Luckiest+Guy&display=swap"
        rel="stylesheet">
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCxjgP79p2DUT7Zt2-Fqqbx7EJym4RGupc&callback=iniciarMap">
    </script>

</head>

<body class="bg-black">

    <!-- Navbar is here -->
    <nav class="bg-black shadow border-t-4  border-t-red-600 border-b-gray-600 w-auto fixed top-0 sticky z-10">
        <div class="container px-6 mx-auto">
            <div class="md:flex flex row justify-between items-center">
                <!-- left section -->
                <div class=" bg-black">
                    <div class="w-auto">
                        <a href="{{ route('welcome') }}"><img src="{{ asset('img/logo_lugares_encantados.png') }}"
                                alt='logo image'
                                class="transition-colors duration-500 ease-in-out hover:border-l-4 hover:border-r-4 rounded-full hover:border-red-600"></a>
                    </div>
                </div>
                <div class=" text-center">
                    <a href="{{ route('welcome') }}"
                        class="  text-red-600 text-4xl md:text-8xl  hover:text-red-400 font-header duration-500 ease-in-out text-center w-auto">Enchanted
                        Places</a>
                </div>
                <div class="md:hidden">
                    <button id="nav-button" type="button"
                        class="duration-500 ease-in-out text-white hover:text-red-600 focus:text-red-600 focus:outline-none">
                        <svg viewBox="0 0 24 24" class="h-8 w-8 fill-current">
                            <path
                                d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z">
                            </path>
                        </svg>
                    </button>
                </div>
            </div>
            <!-- right section -->
            <div id="nav-menu"
                class=" bg-black font-header  flex flex-col mt-3 hidden lg:flex lg:flex-row :mt-0 md:block gap-2 items-start md:gap-0">
                <a href="{{ route('last') }}"
                    class="{{ request()->is('last') ? 'text-red-600' : 'text-gray-200' }} duration-300 ease-in-out text-lg hover:font-medium md:mx-4 hover:text-red-600 hover:border hover:border-red-600 hover:rounded-md hover:p-1 hover:shadow-white hover:shadow-lg">Last</a>
                <a href="{{ route('ranking') }}"
                    class="{{ request()->is('ranking') ? 'text-red-600' : 'text-gray-200' }} duration-300 ease-in-out text-lg hover:font-medium md:mx-4 hover:text-red-600 hover:border hover:border-red-600 hover:rounded-md hover:p-1 hover:shadow-white hover:shadow-lg">Ranking</a>
                <a href="{{ route('contact') }}"
                    class="{{ request()->is('contact') ? 'text-red-600' : 'text-gray-200' }} duration-300 ease-in-out text-lg hover:font-medium md:mx-4
                            @auth
hidden @endauth hover:text-red-600 hover:border hover:border-red-600 hover:rounded-md hover:p-1 hover:shadow-white hover:shadow-lg">Write</a>
                @if (!Auth::check())
                    <a href="{{ route('register') }}"
                        class="duration-300 ease-in-out font-header shadow-md shadow-white hover:shadow-lg hover:shadow-white p-1 bg-transparent hover:visited:border-x-gray-400 hover:bg-gray-100 transition-colors cursor-pointer 
                        uppercase text-lg text-red-600 hover:text-black border border-white rounded-md">Register</a>
                @endif
                @auth
                    <a href="{{ route('places.index') }}"
                        class="text-blue-500 duration-300 ease-in-out text-lg hover:font-medium md:mx-4 hover:text-red-600 hover:border hover:border-red-600 hover:rounded-md hover:p-1 hover:shadow-white hover:shadow-lg">User
                        Area</a>
                @endauth

                @auth
                    @if (Auth::user()->rol == 2)
                        <a href="{{ URL('admin') }}"><span
                                class="duration-500 ease-in-out font-header shadow-md shadow-white hover:shadow-lg hover:shadow-white p-1 bg-transparent hover:visited:border-x-gray-400 hover:bg-gray-100 transition-colors cursor-pointer 
                                uppercase text-lg text-rose-400 hover:text-black  rounded-md mr-3">Admin
                                Zone</span></a>
                    @endif
                @endauth


                @if (!Auth::check())
                    <a href="{{ url('dashboard') }}"
                        class="mt-2 md:mt-0 md:ml-3 font-header shadow-md shadow-white hover:shadow-lg hover:shadow-white p-1 bg-transparent hover:visited:border-x-gray-400 hover:bg-gray-100 transition-colors cursor-pointer 
                        uppercase  text-lg text-orange-500 hover:text-black border border-white rounded-md duration-500 ease-in-out">Login</a>
                @endif

                @auth
                    <a class="duration-500 ease-in-out mb-3 font-header shadow-md shadow-white bg-transparent hover:visited:border-x-gray-400 hover:bg-gray-100 transition-colors cursor-pointer 
                        uppercase font-thin text-lg text-amber-600 hover:text-black  rounded-md"
                        href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
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
        <a href="{{ route('profile.edit') }}">
            <p
                class=" duration-500 ease-in-out mr-10 font-header text-right text-3xl text-white hover:border-r-4 hover:border-red-600 p-2">
                Hello <span class="uppercase">{{ Auth::user()->name }}</span></p>
        </a>
    @endauth

    <main class="container mx-auto">
        <h2 class="text-3xl text-center p-5 text-gray-300 font-bold">
            @yield('titulo2')
        </h2>

        @yield('contenido')

    </main>

</body>
<footer class="bg-gray-900/50 text-white py-0 border-t border-b-4 border-red-600 text-center fixed bottom-0 w-full">
    <div class="container mx-auto flex flex-col lg:flex-row justify-between items-center">
        <div class="hidden mb-4 lg:mb-0">
            <h4 class="text-2xl font-semibold">Zyanuro productions</h4>
            <p class="text-gray-300"...</p>
        </div>
        <div>
            <h4 class="hidden text-2xl font-semibold">Quik links</h4>
            <div class="mt-2 font-header">
                <a href="{{ route('welcome') }}" class="text-red-600 hover:text-white mr-4">Home</a>
                <a href="#" class="text-white hover:text-red-600 mr-4">About us</a>
                @if (!Auth::check())
                    <a href="{{ route('login') }}" class=" text-red-600 hover:text-white mr-4">Login</a>
                    <a href="{{ route('register') }}" class=" text-gray-300 hover:text-red-600 mr-4">Register</a>
                @endauth
        </div>
    </div>
    <div>
        <h4 class="hidden text-2xl font-semibold">Follow us</h4>
        <div class="mt-2 font-header">
            <a href="#" class="text-gray-300 hover:text-red-600 mr-4">Facebook</a>
            <a href="#" class="text-gray-300 hover:text-red-600 mr-4">Twitter-X</a>
            <a href="#" class="text-gray-300 hover:text-red-600">Instagram</a>
        </div>
    </div>
    <div>
        <div class="p-3"><span class=" text-red-600">Enchanted Places</span> - All rights reserved -
            {{ now()->year }}</div>
    </div>
</div>
</footer>
<!-- politica de aceptación de cookies -->
@if (!request()->cookie('accept_cookies'))
<div class="relative min-h-screen">
    <!-- Contenido de tu sitio web -->
    <!-- Aviso de cookies (superpuesto) -->
    <div class="fixed bottom-0 left-0 w-full bg-red-900/80 text-white py-32">
        <div class="container mx-auto flex flex-col items-center justify-center h-full">
            <!-- Contenido del aviso de cookies -->
            <p class="mx -5 mb-2 text-center">This website uses cookies. By continuing to browse, you accept our use
                of cookies</p>
            <p class="mx -5 mb-2 text-center">Legal Notice and Cookie Policy <a href="{{ route('cookies') }}"
                    class=" text-cyan-300 border-y border-cyan-200">- Read -</a></p>
            <form method="post" action="{{ route('acceptCookies') }}">
                @csrf
                <!-- Otros campos o botones aquí -->
                <button type="submit"
                    class="duration-500 ease-in-out mb-3 font-header shadow-md shadow-white bg-slate-300/50 hover:visited:border-x-gray-400 hover:bg-gray-100 transition-colors cursor-pointer uppercase font-thin text-lg p-1 text-amber-400 hover:text-black rounded-md w-30">Accept</button>
            </form>
        </div>
    </div>
</div>
@endif

</html>
