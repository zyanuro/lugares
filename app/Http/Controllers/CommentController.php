<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Place;
use Auth;
use Illuminate\Http\Request;

class CommentController extends Controller
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
        $request->validate ([
            
            'user'=>'required|max:25',
            'comment'=>'required|max:250',
            
        ]);

        $comment = new Comment();
        $comment->user_id = $request->input('user');
        $comment->comment = $request->input('comment'); 
        $commentario = $request->input('comment'); 
        $comment->save(); 

        $placeId = $request->input('placeId');         

        $place = Place::find($placeId);
        $comment = new Comment(['comment' => $commentario]); // Reemplaza 'texto' con el nombre del campo en tu tabla 'comentarios'
        $place->comment()->save($comment);


        return view("registeredzone.msg", ['msg'=> "Saved Succesfully..."]);
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
