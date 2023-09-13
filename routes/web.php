<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\VotationController;
use App\Models\Place;
use App\Models\Theme;
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
    $place = Place::all();
    return view('userzone.last', ['place'=>$place, 'mobile_place'=>$place]);
})->name('last');

Route::get('/ranking', function () {
    return view('userzone/ranking');
})->name('ranking');

Route::get('/contact', function () {
    return view('userzone/contact');
})->name('contact');

Route::get('/instructions', function () {
    return view('userzone/instructions');
})->name('instructions');

Route::resource('/places', PlaceController::class);

// Ruta para mostrar los lugares por usuario
Route::get('/registeredzone.show/{id}', function($id) { 
       
    $place = Place::all()->where('user_id', $id);                 
  
    return view('registeredzone.show', ['place'=>$place, 'mobile_place'=>$place]);
});

Route::get('/place/{id}', function ($id) {
    $place = Place::find($id);
    $theme = Theme::all();
    return view('userzone.place', ['place'=>$place]);
})->name('place');

//Ruta para votaciones
Route::resource('/votes', VotationController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
