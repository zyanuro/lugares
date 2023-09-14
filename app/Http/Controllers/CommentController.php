<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Place;
use App\Models\Theme;
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
            'placeId'=>'required|max:25',
            'comment'=>'required|max:250',
            
        ]);

        $comment = new Comment();
        $place = new Place();
        $comment->user_id = $request->input('user');
        $comment->place_id = $request->input('placeId');
        $commentSend = $request->input('placeId');
        $comment->comment = $request->input('comment');
       
        $comment->save();      

       
        return view("userzone.msg", ['msg'=> "Comment Saved Succesfully...", 'place'=>$place]);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $placeId)
    {
        
       // Realiza una consulta para obtener los comentarios relacionados con el lugar específico
    $comment = Comment::where('place_id', $placeId)->get();
    $place = Place::all();
   
      
    // Puedes pasar los comentarios a tu vista para mostrarlos
    return view('places', compact('comment'), compact('place'));
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
