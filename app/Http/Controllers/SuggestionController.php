<?php

namespace App\Http\Controllers;

use App\Models\Suggestion;
use Illuminate\Http\Request;

class SuggestionController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suggestions = Suggestion::orderBy('created_at', 'desc')
        ->paginate(6);
        return view('adminzone.inbox', ['suggestions'=>$suggestions]);
    }    
   
    
    public function store(Request $request)
    {
     
        $request->validate ([
            
            'name'=>'required|max:100',
            'email'=>'email|required|max:50',
            'suggestion'=>'required|max:250',
            'control'=>'max:10|nullable',
            'user_id'=>'max:10|nullable',
            
        ]);

        $suggestion = new Suggestion();
        $suggestion->name = $request->input('name');
        $suggestion->email = $request->input('email'); 
        $suggestion->suggestion = $request->input('suggestion');
        $suggestion->control = 1;
        $suggestion->user_id = $request->input('user_id');  
        $view_from = $request->input('user_id');

        $suggestion->save();

        if ($view_from == 6){
            return view("userzone.contact", ['msg'=> "Suggestion Sent Succesfully... Thanks!"]);
        }else {
            return view("registeredzone.contact", ['msg'=> "Suggestion Sent Succesfully... Thanks!"]);

        }     
        
        
    }

    public function update(Request $request)
    {
        $request->validate ([

                        
        ]);
        $id = $request->input('control');
        //dd($id);
        $suggestion = Suggestion::find($id); 
        //dd($suggestion);
        if ($suggestion) {
            // Si la sugerencia se encontró, asigna el valor 0
            //dd('que pasa?');
            $suggestion->control = 0;
            $suggestion->save();
        } else {
            // Manejar el caso en el que la sugerencia no se encontró
            // Puedes redirigir o mostrar un mensaje de error
           // dd('en serio?');
        };
       
       
       // $suggestions = Place::where('control', 1)->get();  
        $suggestions = Suggestion::find($id);  
        return view('adminzone.one_suggestion', ['suggestion'=>$suggestions]);
    }

    public function destroy(string $id)
    {
        
        $suggestions = Suggestion::find($id);
        $suggestions->delete();
        $suggestions = Suggestion::all();
        $suggestions = Suggestion::orderBy('created_at', 'desc')
        ->paginate(6);
        return view('adminzone.inbox', ['suggestions'=>$suggestions]);
    }
}
