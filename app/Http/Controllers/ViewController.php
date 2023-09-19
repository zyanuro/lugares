<?php

namespace App\Http\Controllers;

use App\Models\Place;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function seleccionarVista(Request $request)
    {
        $option = $request->input('view');
      
        // Utilizando una estructura switch para determinar la vista
        switch ($option) {
            case 'favourites':
                $place = Place::where('control', '=', 0)
                ->orderBy('puntuation', 'desc')
                ->orderBy('control', 'asc')
                ->paginate(15);
                return view('userzone/ranking', ['places'=>$place, 'mobile_place'=>$place]);
                break;

            case 'abandoned':
                $place = Place::where('theme_id', '=', 6)
                ->where('control', '=', 0)
                ->orderBy('puntuation', 'desc')
                ->orderBy('theme_id', 'asc')
                ->paginate(9);
                return view('userzone/ranking', ['places'=>$place, 'mobile_place'=>$place]);
                break;

            case 'creatures':
                $place = Place::where('theme_id', '=', 3)
                ->where('control', '=', 0)
                ->orderBy('puntuation', 'desc')
                ->orderBy('theme_id', 'asc')
                ->paginate(9);
                return view('userzone/ranking', ['places'=>$place, 'mobile_place'=>$place]);
                break;

            case 'ufo':
                $place = Place::where('theme_id', '=', 1)
                ->where('control', '=', 0)
                ->orderBy('puntuation', 'desc')
                ->orderBy('theme_id', 'asc')
                ->paginate(9);
                return view('userzone/ranking', ['places'=>$place, 'mobile_place'=>$place]); 
                break;

            case 'haunted':
                $place = Place::where('theme_id', '=', 4)
                ->where('control', '=', 0)
                ->orderBy('puntuation', 'desc')
                ->orderBy('theme_id', 'asc')
                ->paginate(9);
                return view('userzone/ranking', ['places'=>$place, 'mobile_place'=>$place]);
                break;

            case 'mystery':
                $place = Place::where('theme_id', '=', 2)
                ->where('control', '=', 0)
                ->orderBy('puntuation', 'desc')
                ->orderBy('theme_id', 'asc')
                ->paginate(9);
                return view('userzone/ranking', ['places'=>$place, 'mobile_place'=>$place]);
                break;

            case 'others':
                $place = Place::where('theme_id', '=', 5)
                ->where('control', '=', 0)
                ->orderBy('puntuation', 'desc')
                ->orderBy('theme_id', 'asc')
                ->paginate(9);
                return view('userzone/ranking', ['places'=>$place, 'mobile_place'=>$place]);
                break;

            default:
                // Si la opción no coincide con ninguna de las anteriores, puedes redirigir a una vista de error o manejarlo como desees.
                return view('Error, doesnt exist result for this query - Error sin resultado');
                break;
        }
    }    

    public function selectLocation(Request $request)
    {
        
        $optionZone = $request->input('location');
//dd($optionZone);
        $place = $this->location($optionZone);
        return $place;
       
    }

    public function location($optionZone)
       
    // Función para devolver la vista seleccionada por localizaciones
        {
            $place = Place::where('control', '=', 0)           
            ->where('location', '=', $optionZone)
            ->orderBy('puntuation', 'desc')
            ->orderBy('control', 'asc')
            ->paginate(15);
            return view('userzone/last', ['places'=>$place, 'mobile_place'=>$place]);
        }
  
}

