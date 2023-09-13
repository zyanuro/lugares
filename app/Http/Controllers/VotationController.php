<?php

namespace App\Http\Controllers;

use App\Models\Place;
use App\Models\Theme;
use Illuminate\Http\Request;

class VotationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       // dd($id);
        $request->validate ([
            
            'puntuation'=>'required|max:10',
            
        ]);
       
        $place = Place::find($id);
        $prepuntuation = 1;
        $postpuntuation = $request->input('puntuation');
        $place->puntuation = $prepuntuation + $postpuntuation;
        $place->save();

        return view("userzone.place", ['place'=>$place, 'theme'=>Theme::all(), 'msg'=> "Updated Succesfully..."]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
