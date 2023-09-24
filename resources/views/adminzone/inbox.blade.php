@extends('templates.admin')

@section('titulo')
    Enchanted Place - Admin Inbox
@endsection

@section('titulo2')
    Admin Area - Inbox
@endsection

@section('contenido')
    <a href="{{ url()->previous() }}"
        class="ml-3 shadow-red-600 shadow-md border border-slate-200  hover:bg-white transition-colors cursor-pointer w-full p-2 text-red-600 rounded-lg">
        Back</a>


    <div class="md:flex justify-center mt-10 mx-5 bg-black place-content-center rounded-xl pb-5">

        <table class=" text-white text-center">
            <div>
                <thead>
                    <tr class="text-red-600 uppercase border-b-white border-b">

                        <th class="p-2">Read</th>
                        <th class="p-2">ROL</th>
                        <th class="p-2">Name</th>
                        <th class="p-2">Email</th>
                        <th class="p-2">Created at</th>


                    </tr>
                </thead>
            </div>
            <div>
                <tbody>

                    </form>
                    @foreach ($suggestions as $suggestion)
                        @if ($suggestion->control == 1)
                            <tr class="border-b-red-600 border-b ">
                                <td class="text-green-800 p-4"><a href=""
                                        class="border-2 p-2 border-green-500 rounded-full font-extrabold">New</a></td>

                                <td
                                    class="border border-x-red-600 p-5 uppercase text-pink-600 font-bold @if ($suggestion->user->rol == 1) text-yellow-400 @elseif ($suggestion->user->rol == 2) text-teal-600 @else text-white @endif">
                                    @if ($suggestion->user->rol == 1)
                                        Registered
                                    @elseif ($suggestion->user->rol == 2)
                                        Admin
                                    @else
                                        Anonymou
                                    @endif
                                </td>
                            @else
                            <tr class="border-b-red-600 border-b text-gray-700">
                                <td class="p-5"></td>
                                <td
                                    class="border border-x-red-600 p-5 uppercase text-gray-600 font-bold @if ($suggestion->user->rol == 1) text-gray-400 @elseif ($suggestion->user->rol == 2) text-gray-600 @else text-gray-600 @endif">
                                    @if ($suggestion->user->rol == 1)
                                        Registered
                                    @elseif ($suggestion->user->rol == 2)
                                        Admin
                                    @else
                                        Anonymou
                                    @endif
                                </td>
                        @endif
                        <td class="p-5">{{ $suggestion->name }}</td>
                        <td class="p-5">{{ $suggestion->email }}</td>
                        <td class="border-r border-red-600 p-5">{{ $suggestion->created_at }}</td>

                        <td class="p-5">
                            <form action="{{ route('suggestions.update') }}" method="post">
                                @csrf
                                @method('PUT')
                                <!-- Campo de entrada oculto -->
                                <input type="hidden" id="campoOculto" name="control" value="{{ $suggestion->id }}">

                                <!-- Botón de envío -->
                                <input type="submit" value="Read"
                                    class=" shadow-red-600 shadow-md border border-amber-400 bg-gray-500  hover:bg-sky-700 transition-colors cursor-pointer w-full p-2 text-slate-900 font-header rounded-lg">
                            </form>
                        </td>
                        <td class="p-5">
                            <form action="{{ url('delete_suggestion/' . $suggestion->id) }}" method="post" name="delete">
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
    <div class="mt-5">{{ $suggestions->links() }}</div>

    <p class=" invisible">.</p>
    <p class=" invisible">.</p>
    <p class=" invisible">.</p>
    <p class=" invisible">.</p>
    <p class=" invisible">.</p>
    <p class=" invisible">.</p>
@endsection
