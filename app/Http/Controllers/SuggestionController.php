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
        $suggestion = Suggestion::where('control', '=', 1)
        ->orderBy('created_at', 'desc')
        ->paginate(6);
        return view('adminzone.inbox', ['suggestions'=>$suggestion]);
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
}
