@extends('templates.admin')

@section('titulo')

Enchanted Place - Admin Inbox

@endsection

@section('titulo2')

Admin Area - Inbox

@endsection

@section('contenido')

<a href="{{ url()->previous() }}" class="ml-3 shadow-red-600 shadow-md border border-slate-200  hover:bg-white transition-colors cursor-pointer w-full p-2 text-red-600 rounded-lg">Back</a>


<div class="md:flex justify-center mt-10 mx-5 bg-black place-content-center rounded-xl pb-5">
    
    <table class=" text-white text-center">
        <div>
        <thead>
            <tr class="text-red-600 uppercase border-b-white border-b">
                
                <th class="p-2">ROL</th>
                <th class="p-2">Name</th>
                <th class="p-2">Email</th>                                
                <th class="p-2">Email User app</th>
                <th class="p-2">Suggestion</th>
                <th class="p-2">Created at</th>
                
                
            </tr>
        </thead>
    </div>
        <div>
        <tbody>           

                </form>
                @foreach ($suggestions as $suggestion)
                <tr class="border-b-red-600 border-b ">

                   
                    <td class="border border-x-red-600 p-5 uppercase text-pink-600 font-bold @if ($suggestion->user->rol == 1) text-yellow-400 @elseif ($suggestion->user->rol == 2) text-teal-600 @else text-white @endif">
                     @if ($suggestion->user->rol == 1)Registered @elseif ($suggestion->user->rol ==2) Admin @else Anonymou @endif</td>
                    <td class="p-5">{{ $suggestion->name }}</td>
                    <td class="p-5">{{ $suggestion->email }}</td>                    
                    <td class="p-5">{{ $suggestion->user->email }}</td>
                    <td class="p-5">{{ $suggestion->suggestion }}</td>
                    <td class="border-r border-red-600 p-5">{{ $suggestion->created_at }}</td>
                    
                    
                </tr>                
                @endforeach      
               
                
                   
        </tbody>
      
    </div>
    
    </table>        
    
</div>
<div class="mt-5">{{ $suggestions->links() }}</div>

<p class=" invisible">.</p>
<p class=" invisible">.</p>
<p class=" invisible">.</p>    
<p class=" invisible">.</p>
<p class=" invisible">.</p>
<p class=" invisible">.</p>
@endsection