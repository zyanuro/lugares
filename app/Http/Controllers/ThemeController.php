<?php

namespace App\Http\Controllers;

use App\Models\Theme;
use Illuminate\Http\Request;

class ThemeController extends Controller
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
        $themes=Theme::all();        
       
    return view('adminzone.thematics.create', ['themes'=>$themes]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate ([
            
            'name'=>'required|unique:themes|max:250',
                        
        ]);

        $theme = new Theme();
        $theme->name = $request->input('name');
          

        $theme->save();

        return view("adminzone.thematics.msg", ['msg'=> "Saved Succesfully..."]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $themes = Theme::all();
       // dd($themes);
        return view('adminzone.thematics.show', ['themes'=>$themes]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $theme = Theme::find($id);
        return view('adminzone.thematics.edit',['theme'=>$theme]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate ([
            
            'name'=>'required|max:250|unique:themes', $id,           
        ]);

        $theme = Theme::find($id);
        $theme->name = $request->input('name');
       
        $theme->save();

        return view("adminzone.thematics.msg", ['msg'=> "Updated Succesfully..."]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $theme = Theme::find($id);
        //dd($theme);
        $theme->delete();
        
        return view("adminzone.thematics.msg", ['msg'=> "Deleted Succesfully..."]);
    }
}
