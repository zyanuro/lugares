@extends('templates.admin')

@section('titulo')

Admin Area - moderation zone

@endsection

@section('titulo2')

Moderation zone

@endsection

@section('contenido')

<a href="{{ url()->previous() }}" class="ml-3 shadow-red-600 shadow-md border border-slate-200  hover:bg-white transition-colors cursor-pointer w-full p-2 text-red-600 rounded-lg">Back</a>


<div class="md:flex justify-center mt-10 bg-black place-content-center mx-5">
    
    <table class=" text-white text-center">
        <div>
        <thead>
            <tr class="text-red-600 uppercase border-b-white border-b">
                
               
                <th class="p-2">User Email</th>
                <th class="p-2 hidden md:block">Rol</th>
                <th class="p-2 hidden md:block">Created_at</th>                
                <th class="p-2">Change Rol</th>
                <th class="p-2"></th>

            </tr>
        </thead>
    </div>
        <div>
        <tbody>           

                </form>
                @foreach ($users as $user)
                <tr class="border-b-red-600 border-b">

                   
                    
                    <td class="p-5">{{ $user->email }}</td>
                    <td class="p-5 hidden md:block 
                        @if ($user->rol === 0) border border-red-600 text-red-600 
                        @elseif ($user->rol == 1) border border-blue-600 text-blue-600 
                        @elseif ($user->rol == 2) border border-green-600 text-green-600
                        @endif ">
                        @if ($user->rol === 0)Blocked
                        @elseif ($user->rol == 1)Registered
                        @elseif ($user->rol == 2)Admin                        
                        @endif</td>
                    <td class="p-5 hidden md:block">{{ $user->created_at }}</td>
                    
                    <td class="@if ($user->name == 'Anonymous')
                         hidden
                        
                    @endif"><form action="{{url('adminzone/users/update', $user->id)}}" method="post">
                     @csrf
                     @method("PUT")
                         <!-- Campo de entrada oculto -->
                         <select id="rol" name="rol" class="text-red-600 font-bold bg-slate-300 rounded-full  w-2/3 my-1">

                            <option value="2">- Select -</option>
                            <option value="0" class="@if ($user->rol === 0) hidden 
                            @endif">Block User</option>
                            <option value="1" class="@if ($user->rol == 1) hidden
                                @endif">Convert Registered</option>
                            <option value="2" class="@if ($user->rol == 2) hidden
                                @endif">Make admin</option>
                        </select>
                         <!-- Botón de envío -->
                          <input type="submit" value="Done" class=" shadow-red-600 shadow-md border border-amber-400 bg-slate-500 hover:bg-sky-700 transition-colors cursor-pointer w-auto p-2 text-slate-900 font-sans font-bold rounded-full">
                     </form></td>

                    <td class="p-5 @if ($user->name == 'Anonymous')
                        hidden
                       
                   @endif">
                        <form action="{{url('adminzone/users/'.$user->id)}}" method="post" name="delete" class="my-3">
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