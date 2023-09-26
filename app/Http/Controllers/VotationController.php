<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Place;
use App\Models\Theme;
use App\Models\Votation;
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
        $request->validate([

            'puntuation' => 'required|max:10',

        ]);

        $vote = new Votation();
        $prepuntuation = 1;
        $postpuntuation = $request->input('puntuation');
        $vote->user_id = $request->input('user_id');
        $vote->place_id = $request->input('place_id');
        $vote->save();
        $idPlace = $request->input('place_id');
        $place = Place::find($idPlace);
        $place->puntuation = $prepuntuation + $postpuntuation;
        $place->save();

        return back();
        //return view("userzone.place", ['place' => $place, 'theme' => Theme::all(), 'comment' => Comment::where('place_id', $idPlace)->get(), 'votes' => Votation::all(), 'msg' => "Updated Succesfully..."]);
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
    public function update(Request $request)
    {
        // dd($id);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}