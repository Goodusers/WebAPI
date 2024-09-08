<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GenreServices;

class GenreController extends Controller
{
    protected $genreService;

    public function __construct(GenreServices $genreService)
    {
        $this->genreService = $genreService;
    }
    public function create_genre(Request $request){
         $request->validate([
            'title' => 'required'
        ],[
            'title.required' => 'Поле не может быть пустым'
        ]);
    
        $value = $request->all();
        $this->genreService->createGenres($value);
        return redirect()->back();
    }
    
}
