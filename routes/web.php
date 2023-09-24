<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\VotationController;
use App\Http\Controllers\SuggestionController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\ModerateUserController;

use App\Models\Comment;
use App\Models\Place;
use App\Models\Suggestion;
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

//controlador para acceder a indice de sugerencias dentro de user admin
Route::get('adminzone.inbox', [SuggestionController::class, 'index'])->name('suggestions.index');

//controlador para acceder a una de las sugerencias dentro de user admin
Route::put('adminzone.one_suggestion', [SuggestionController::class, 'update'])->name('suggestions.update');

Route::get('adminzone/one_suggestion', [SuggestionController::class, 'update'])->name('admin.one_suggestion');

Route::delete('delete_suggestion/{id}', [SuggestionController::class, 'destroy'])->name('suggestions.destroy');

Route::put('adminzone/users/update/{id}', [ModerateUserController::class, 'update'])->name('users.update');

//Acceso a la sugerencia seleccionada de la lista para leerla
/* Route::get('adminzone/one_suggestion/{id}', function ($id) {        
    $suggestion = Suggestion::find($id);   
    return view('adminzone/one_suggestion', ['suggestion'=>$suggestion]);
})->name('one'); */



//Ruta para moderaciones   
Route::resource('adminzone', AdminController::class);

//Ruta para la gestión de las temáticas
Route::resource('adminzone/thematics', ThemeController::class);

//Ruta para moderar usuarios y gestionar su rol 
Route::resource('adminzone/users', ModerateUserController::class);



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
})->name('list');
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
    ->paginate(8);
   
   
    return view('userzone.last', ['places'=>$place, 'mobile_place'=>$place]);
})->name('last');

Route::get('/contact', function () {
    return view('userzone/contact');
})->name('contact');

Route::get('/instructions', function () {
    return view('userzone/instructions');
})->name('instructions');

Route::get('/block', function () {
    return view('userzone/block');
})->name('block');


//  Rutas para la sección de Rankings y filtros

Route::get('/ranking', function () {
    $place = Place::where('control', '=', 0)
    ->orderBy('puntuation', 'desc')
    ->orderBy('control', 'asc')
    ->paginate(12);
    return view('userzone/ranking', ['places'=>$place, 'mobile_place'=>$place]);
})->name('ranking');

//Ruta para elegir filtro en la vista de rankings
Route::post('/seleccionarVista', [ViewController::class, 'seleccionarVista']);

//Ruta para elegir filtro en la vista de last
Route::post('/selectLocation', [ViewController::class, 'selectLocation']);

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
