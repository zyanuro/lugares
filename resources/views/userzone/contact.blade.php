@extends('templates.no_admin') 

@section('titulo')

Contact us 

@endsection

@section('titulo2')

<p class=" font-caro">Contact us </p>

@endsection

@section('contenido')

<div class="container mx-auto p-4 font-header block ">
    <div class="max-w-md mx-auto bg-gray-300 p-6 rounded-md shadow-md border-2 border-red-600">
        <h2 class="text-2xl font-semibold mb-4">Send your suggestion</h2>
        
        <form " method="POST" class="">
            @csrf

            <div class="mb-4">
                <label for="name" class=" text-gray-800 text-sm font-medium mb-2">Name:</label>
                <input type="text" name="name" id="name" class="w-full px-3 py-2 border rounded-md" required>
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-800 text-sm font-medium mb-2">Email:</label>
                <input type="email" name="email" id="email" class="w-full px-3 py-2 border rounded-md" required>
            </div>

            <div class="mb-4">
                <label for="message" class="block text-gray-800 text-sm font-medium mb-2">Message:</label>
                <textarea name="message" id="message" rows="4" maxlength="250" class="w-full px-3 py-2 border rounded-md" required></textarea>
            </div>

            <div class="mt-6">
                <button type="submit" class="bg-gray-300 border border-gray-400 shadow-red-600 shadow-md text-red-800 text-xl py-2 px-4 rounded-md hover:bg-black hover:text-white">Send</button>
            </div>
        </form>
    </div>
</div>
@endsection
