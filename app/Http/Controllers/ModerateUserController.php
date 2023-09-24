<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ModerateUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('adminzoneBis.users', ['users'=>$users]);
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
        $users = User::all();
        return view('adminzone.users.show', ['users'=>$users]);
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
        $request->validate ([
                    
        ]);

        $idReceive = $request->input('rol'); 
        $user = User::find($id);       
        $user->rol = $idReceive;        
        $user->save();
        
        return view('adminzone.msg', ['msg'=>"Rol Update Succesfully..."]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //dd($id);
        $user = User::find($id);
       // dd($user);
        $user->delete();
       
        return view("adminzone.msg", ['msg'=> "User Deleted Succesfully..."]);
    }
}
