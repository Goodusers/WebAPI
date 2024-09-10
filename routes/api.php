<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\GameController;
use App\Http\Controllers\GenreController;
use App\Repositories\GameRepository;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::controller(GameController::class)->group(function(){
    Route::get('/games', 'index')->name('index');
    Route::get('/filter/{id}', 'filter')->name('filter');
    Route::post('/create_games', 'create_games')->name('create_games');
    Route::put('/update/{id}', 'update')->name('update');
    Route::delete('/delete/{id}', 'delete')->name('delete');
});
Route::controller(GenreController::class)->group(function(){
    Route::get('/genre', 'genre')->name('genre');
    Route::post('/create_genre', 'create_genre')->name('create_genre');
});
