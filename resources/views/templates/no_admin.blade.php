    
        <header class="p-5 border-b bg-white shadow">
            <div class=" container mx-auto flex justify-between items-center">

                <h1 class="text-3xl font-extrabold">DevStagram</h1>

                <nav class="flex gap-2 items-center">
                    <a class="p-2 bg-slate-400 hover:visited:border-x-gray-400 hover:bg-gray-100 transition-colors cursor-pointer 
                    uppercase font-bold  text-back border-zinc-950 rounded-lg" href="{{url('admin')}}">Admin</a>
                    <a href="{{url('trabajadores')}}" class="p-2 bg-slate-400 hover:visited:border-x-gray-400 hover:bg-gray-100 transition-colors cursor-pointer 
                    uppercase font-bold  text-back border-zinc-950 rounded-lg" ">Menu</a></div>
                    <a href="{{url('dashboard')}}" class="p-2 bg-slate-400 hover:visited:border-x-gray-400 hover:bg-gray-100 transition-colors cursor-pointer 
                    uppercase font-bold  text-back border-zinc-950 rounded-lg" ">Usuario</a></div>
                   @auth
                       
                  
                    <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    @endauth
                       
                </nav>

            </div>
        </header>    
        
        <main class="container mx-auto mt-10">
            <h2 class="text-3xl text-center p-5 text-gray-500 font-bold">
                @yield('titulo')
            </h2>

            @yield('contenido') 


        </main>
    </body>

    <footer class="text-center p-5 text-gray-500 font-bold uppercase">
        DevStagram - Todos los derechos reservados - {{now()->year}}
              
    </footer>

</html>