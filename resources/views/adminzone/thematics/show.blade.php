@extends('templates.admin')

@section('titulo')
    List of Thematics
@endsection

@section('titulo2')
    List of Thematics:
@endsection

@section('contenido')
    <div class="md:flex justify-center grid grid-cols-1 bg-black place-content-center">
        <table class="my-10 mx-5 text-white text-center">
            <div>
                <div><a href="{{ url('adminzone') }}"
                        class="mx-10  shadow-red-600 shadow-md border border-slate-200  hover:bg-white transition-colors cursor-pointer w-full p-2 text-slate-400 rounded-lg">
                        Back
                    </a></div>

                <thead>
                    <tr class="text-red-600 uppercase border-b-white border-b">

                        <th class="p-2">#</th>
                        <th class="p-2">Name</th>
                        <th class="p-2"></th>
                        <th class="p-2"></th>
                    </tr>
                </thead>


            </div>
            <div>
                <tbody>

                    </form>
                    @foreach ($themes as $theme)
                        <tr class="border-b-red-600 border-b">

                            <td class="p-5">{{ $theme->id }}</td>
                            <td class="p-5">{{ $theme->name }}</td>
                            <td class="p-5">{{ $theme->created_at }}</td>
                            <td class="p-5"><a href="{{ url('adminzone/thematics/' . $theme->id . '/edit') }}"
                                    class=" shadow-red-600 shadow-md border border-amber-400  hover:bg-sky-700 transition-colors cursor-pointer w-full p-2 text-amber-400 rounded-lg">Edit</a>
                            </td>
                            <td class="p-5">
                                <form action="{{ url('adminzone/thematics/' . $theme->id) }}" method="post" name="delete">
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
        <div>
            <a href="{{ url('adminzone/thematics/create') }}"
                class=" font-bold text-xl
                 mx-10 shadow-red-600 shadow-md border border-teal-500  hover:bg-teal-800 transition-colors cursor-pointer w-full p-2 text-teal-500 rounded-lg">New</a>
        </div>

    </div>

    <p class=" invisible">.</p>
    <p class=" invisible">.</p>
    <p class=" invisible">.</p>
    <p class=" invisible">.</p>
    <p class=" invisible">.</p>
    <p class=" invisible">.</p>
@endsection
