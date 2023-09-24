<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CookieController extends Controller
{
    public function index()
    {
        return view('/userzone/cookies');
    }



    public function cookiesAccept(Request $request)
    {
        $cookie = cookie('accept_cookies', 'yes', 1); // Validez de 30 días
        return redirect()->route('welcome')->withCookie($cookie);
    }

}