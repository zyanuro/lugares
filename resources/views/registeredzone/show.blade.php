@extends('templates.register_user')

@section('titulo')
    List of Places
@endsection

@section('titulo2')
    List of Places:
@endsection

@section('contenido')
    @use Illuminate\Pagination\Paginator

    <div class="hidden 2xl:flex justify-center mb-3 bg-black place-content-center">

        <table class=" text-white text-center">
            <div>
                <thead>
                    <tr class="text-red-600 uppercase border-b-white border-b">
                        <th class="p-2">Published</th>
                        <th class="p-2">Image</th>                        
                        <th class="p-2">Name</th>
                        <th class="p-2">Theme</th>
                        <th class="p-2">Latitude</th>
                        <th class="p-2">Length</th>
                        <th class="p-2">Address</th>
                        <th class="p-2">Zone</th>
                        <th class="p-2">Description</th>
                        <th class="p-2">Votes</th>
                        <th class="p-2"></th>
                        <th class="p-2"></th>
                    </tr>
                </thead>
            </div>
            <div >
                <tbody>

                    </form>
                    @foreach ($places as $place)
                        <tr class="border-b-red-600 border-b">

                            <td
                                class="p-5 @if ($place->control == 1) bg-orange-600 @else bg-violet-500 text-white @endif">
                                @if ($place->control == 1)
                                    PENDING
                                @else
                                    OK
                                @endif
                            </td>

                            <td <div class="w-auto m-1">
                                <img src="{{ asset('/storage/' . $place->image) }}" alt="image card" class=" w-96 rounded-lg">
                            </div></td> 
                            <td class="p-5">{{ $place->name }}</td>
                            <td class="p-5">{{ $place->theme->name }}</td>
                            <td class="p-5">{{ $place->latitude }}</td>
                            <td class="p-5">{{ $place->length }}</td>
                            <td class="p-5">{{ $place->address }}</td>
                            <td class="p-5">{{ $place->location }}</td>
                            <td class="p-5">{{ $place->description }}</td>
                            <td class="p-5 text-cyan-500 font-extrabold text-lg">{{ $place->puntuation }}</td>
                            <td class="p-5"><a href="{{ url('places/' . $place->id . '/edit') }}"
                                    class=" shadow-red-600 shadow-md border border-amber-400  hover:bg-sky-700 transition-colors cursor-pointer w-full p-2 text-amber-400 rounded-lg">Edit</a>
                            </td>
                            <td class="p-5">
                                <form action="{{ url('places/' . $place->id) }}" method="post" name="delete">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit"
                                        class="btnDelete shadow-amber-400 shadow-md border border-red-600 hover:bg-white transition-colors cursor-pointer
                         w-full p-1 text-red-600 rounded-lg">Delete</button>

                                </form>
                            </td>
                        </tr>
                    @endforeach



                </tbody>
            </div>

        </table>

       
    </div>

    


    <div class="flex 2xl:hidden justify-center mb-3  bg-black place-content-center">

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

                    @foreach ($mobile_places as $place)
                        <tr class="border-b-red-600 border-b">

                            <td class="p-5">{{ $place->name }}</td>

                            <td class="p-5"><a href="{{ url('places/' . $place->id . '/edit') }}"
                                    class="shadow-red-600 shadow-md border border-amber-400  hover:bg-sky-700 transition-colors cursor-pointer w-full p-2 text-amber-400 rounded-lg">Editar</a>
                            </td>
                            <td class="p-5">
                                <form action="{{ url('places/' . $place->id) }}" method="post" name="delete" class="shadow-amber-600 shadow-md border border-red-600  hover:bg-sky-700 transition-colors cursor-pointer w-full p-1 text-red-600 rounded-lg">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btnDelete type="submit"
                                        >Delete</button>

                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </div>

        </table>

    </div>

    <div class="">{{ $places->links() }}</div>

    <p class=" invisible">.</p>
    <p class=" invisible">.</p>
    <p class=" invisible">.</p>
    <p class=" invisible">.</p>
    <p class=" invisible">.</p>
    <p class=" invisible">.</p>
@endsection
