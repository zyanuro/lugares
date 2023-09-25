@extends('templates.no_admin')

@section('titulo')
    About
@endsection

@section('titulo2')
About 
@endsection

@section('contenido')
    <div class="flex flex-col space-y-4 items-center">
        <div>
            <!DOCTYPE html>
            <html lang="es">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Finalidad del sitio Web (www.enchantedplaces.com)</title>
                <!-- Agrega aquí tus enlaces a los archivos CSS de Tailwind CSS y otros estilos si los tienes -->
            </head>
            <div class="bg-gray-300 mb-5 font-sans rounded-xl m-5">
                <div class="container mx-auto p-10 text-gray-800 w-auto ">
                    <h1 class="text-2xl font-bold mb-4 text-center">Finalidad del sitio Web (www.enchantedplaces.com)</h1>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illum, in. Atque perspiciatis minima velit deserunt autem laboriosam incidunt voluptate dolor sequi quaerat,
                         voluptatibus, harum architecto! Suscipit hic fugiat eius quia?</p>
            
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illum, in. Atque perspiciatis minima velit deserunt autem laboriosam incidunt voluptate dolor sequi quaerat,
                        voluptatibus, harum architecto! Suscipit hic fugiat eius quia?</p>
            
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illum, in. Atque perspiciatis minima velit deserunt autem laboriosam incidunt voluptate dolor sequi quaerat,
                        voluptatibus, harum architecto! Suscipit hic fugiat eius quia?</p>
            
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illum, in. Atque perspiciatis minima velit deserunt autem laboriosam incidunt voluptate dolor sequi quaerat,
                        voluptatibus, harum architecto! Suscipit hic fugiat eius quia?</p>
            
                    <h2 class="text-lg font-semibold my-2">Lorem Ipsum</h2>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illum, in. Atque perspiciatis minima velit deserunt autem laboriosam incidunt voluptate dolor sequi quaerat,
                        voluptatibus, harum architecto! Suscipit hic fugiat eius quia?</p>
            
                    <h2 class="text-lg font-semibold my-2">Lorem Ipsum</h2>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illum, in. Atque perspiciatis minima velit deserunt autem laboriosam incidunt voluptate dolor sequi quaerat,
                        voluptatibus, harum architecto! Suscipit hic fugiat eius quia?</p>
            
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illum, in. Atque perspiciatis minima velit deserunt autem laboriosam incidunt voluptate dolor sequi quaerat,
                        voluptatibus, harum architecto! Suscipit hic fugiat eius quia?</p>
                </div>
            </div>
            </html>
            
        </div>
        <div>
            <a href="{{ url()->previous() }}"
                class=" shadow-white shadow-md hover:text-slate-300 bg-transparent border border-red-600 font-sans hover:bg-red-700 transition-colors cursor-pointer uppercase font-bold w-auto p-3 text-red-600 rounded-lg">
                Back
            </a>
        </div>
    </div>
    <p class=" invisible">.</p>
    <p class=" invisible">.</p>
    <p class=" invisible">.</p>
    <p class=" invisible">.</p>
    <p class=" invisible">.</p>
    <p class=" invisible">.</p>
@endsection
