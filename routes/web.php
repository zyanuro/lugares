<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\VotationController;
use App\Http\Controllers\SuggestionController;
use App\Models\Comment;
use App\Models\Place;
use App\Models\Theme;
use App\Models\Votation;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*****************************************************/
// Admin
/*****************************************************/
Route::group(['middleware' => 'admin'], function () {  
    // Poner aquí las vistas y rutas solo para admin
    Route::get('admin', function () {
        return view('adminzone.index');
    })->name('admin');

Route::get('adminzone.inbox', [SuggestionController::class, 'index'])->name('suggestions.index');

    //Ruta para moderaciones
Route::resource('adminzone', AdminController::class);
});



/*****************************************************/
// Registrados
/*****************************************************/
Route::group(['middleware' => 'auth'], function () {  
    // Poner aquí las vistas y rutas solo para usuarios registrados
    Route::resource('/places', PlaceController::class);
    // Ruta para mostrar los lugares por usuario

Route::get('/registeredzone.show/{id}', function($id) { 
       
    $place = Place::all()->where('user_id', $id);                 
  
    return view('registeredzone.show', ['places'=>$place, 'mobile_places'=>$place]);
});
});

//Mostrar los comentarios para cada lugar que sean propios
Route::get('/place/{id}', function ($id) {
    $comment = Comment::where('place_id', $id)->get();    
    $place = Place::find($id);
    $theme = Theme::all();    
    return view('userzone.place', ['place'=>$place, 'comment'=>$comment, 'votes'=>Votation::all()]);
})->name('place');

//Ruta para votaciones
Route::resource('/votation', VotationController::class);

// Ruta para mostrar los coomentarios de usuario
Route::resource('/comment', CommentController::class);

//Ruta para formulario de contacto de autentificados

Route::get('/contact_auth', function () {
    return view('registeredzone/contact');
})->name('contact_auth');

/**************************************************/
/** Rutas para usuarios no registrados y anónimos **/
/**************************************************/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/last', function () {
    $place = Place::where('control', '=', 0)
    ->orderBy('created_at', 'desc')
    ->orderBy('control', 'asc')
    ->paginate(6);
   
   
    return view('userzone.last', ['places'=>$place, 'mobile_place'=>$place]);
})->name('last');

Route::get('/contact', function () {
    return view('userzone/contact');
})->name('contact');

Route::get('/instructions', function () {
    return view('userzone/instructions');
})->name('instructions');


//  Rutas para la sección de Rankings y filtros

Route::get('/ranking', function () {
    $place = Place::where('control', '=', 0)
    ->orderBy('puntuation', 'desc')
    ->orderBy('control', 'asc')
    ->paginate(9);
    return view('userzone/ranking', ['places'=>$place, 'mobile_place'=>$place]);
})->name('ranking');

Route::post('/seleccionarVista', [ViewController::class, 'seleccionarVista']);

//Ruta para sugerencias 
Route::get('/suggestions', [SuggestionController::class, 'store']);




/*********************************************/
// Rutas preinstaladas de Laravel para users
/*********************************************/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
