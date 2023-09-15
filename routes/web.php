<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\VotationController;
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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/last', function () {
    $place = Place::orderBy('created_at', 'desc')->paginate(6);
    return view('userzone.last', ['places'=>$place, 'mobile_place'=>$place]);
})->name('last');

Route::get('/ranking', function () {
    $place = Place::orderBy('puntuation', 'desc')->paginate(12);
    return view('userzone/ranking', ['places'=>$place, 'mobile_place'=>$place]);
})->name('ranking');

Route::get('/contact', function () {
    return view('userzone/contact');
})->name('contact');

Route::get('/instructions', function () {
    return view('userzone/instructions');
})->name('instructions');

Route::resource('/places', PlaceController::class);

// Ruta para mostrar los coomentarios de usuario
Route::resource('/comment', CommentController::class);

// Ruta para mostrar los lugares por usuario
Route::get('/registeredzone.show/{id}', function($id) { 
       
    $place = Place::all()->where('user_id', $id);                 
  
    return view('registeredzone.show', ['places'=>$place, 'mobile_places'=>$place]);
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






Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
