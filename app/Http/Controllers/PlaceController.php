<?php

namespace App\Http\Controllers;

use App\Models\Place;
use App\Models\Theme;
use Auth;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $place = Place::all();
        return view('registeredzone.index', ['place' => $place]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $place = Place::all();
        $theme = Theme::all();

        return view('registeredzone.create', ['place' => $place, 'theme' => $theme]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([

            'name' => 'required|max:250',
            'theme' => 'required|max:50',
            'latitude' => 'decimal:2,5|nullable',
            'length' => 'decimal:2,5|nullable',
            'location' => 'required|max:250',
            'address' => 'required|max:250',
            'description' => 'required|max:250',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048|nullable',
            // Ejemplo de reglas de validación para la imagen

        ]);

        $place = new Place();
        $place->name = $request->input('name');
        $place->theme_id = $request->input('theme');
        $place->latitude = $request->input('latitude');
        $place->length = $request->input('length');
        $place->location = $request->input('location');
        $place->address = $request->input('address');
        $place->description = $request->input('description');
        $place->photo_theme = $request->input('theme');
        $place->user_id = $request->input('user');
        $place->control = 1;
        $place->puntuation = 0;
        
        // Subir la imagen al servidor
        
            $image = $request->file('image');
           // dd($image);
            $routeImage = $image->store('images', 'public');
            $place->image = $routeImage;
        
        // Crear una nueva instancia del modelo y asignar la ubicación de la imagen
         // Asignar la ubicación de la imagen

        // Guardar el registro en la base de datos
       
        $place->save();

        return view("registeredzone.msg", ['msg' => "Saved Succesfully..."]);
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {

        $place = Place::paginate(5);
        dd($place);
        return view('registeredzone.show', ['place' => $place, 'mobile_place' => $place]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $place = Place::find($id);
        return view('registeredzone.edit', ['place' => $place, 'theme' => Theme::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([

            'name' => 'required|max:250',
            'theme' => 'required|max:50',
            'latitude' => 'decimal:2,5|nullable',
            'length' => 'decimal:2,5|nullable',
            'address' => 'required|max:250',
            'description' => 'required|max:250',
            'location' => 'required|max:250',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048|nullable',
            // Ejemplo de reglas de validación para la imagen
        ]);

        $place = Place::find($id);
        $place->name = $request->input('name');
        $place->theme_id = $request->input('theme');
        $place->latitude = $request->input('latitude');
        $place->length = $request->input('length');
        $place->address = $request->input('address');
        $place->description = $request->input('description');
        $place->photo_theme = $request->input('theme');
        $place->user_id = $request->input('user');
        $place->control = 1;
        $place->location = $request->input('location');
        //$place->puntuation = 0;  
         // Subir la imagen al servidor
        
         $image = $request->file('image');
          //dd($image);
          $routeImage = $image->store('images', 'public');
          $place->image = $routeImage;



        $place->save();

        return view("registeredzone.msg", ['msg' => "Updated Succesfully..."]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $placeToDelete = Place::find($id);
        $placeToDelete->delete();
        $place = Place::all();
        $mobile_place = Place::all();
        return view("registeredzone.msg", ['msg' => "Deleted Succesfully..."]);
    }
}