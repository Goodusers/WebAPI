<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\GenreController;
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

Route::controller(GameController::class)->group(function(){
    Route::get('/', 'index')->name('index');
    Route::get('/filter/{id}', 'filter')->name('filter');
    Route::post('/create', 'create')->name('create');
    Route::put('/update/{id}', 'update')->name('update');
    Route::delete('/delete/{id}', 'delete')->name('delete');
});
Route::controller(GenreController::class)->group(function(){
    Route::get('/genre', 'genre')->name('genre');
    Route::post('/create_genre', 'create_genre')->name('create_genre');

});