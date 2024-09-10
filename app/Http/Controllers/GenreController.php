<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GenreServices;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class GenreController extends Controller
{
    protected $genreService;

    public function __construct(GenreServices $genreService)
    {
        $this->genreService = $genreService;
    }
    /** 
     * Создание нового жанра
     * 
     * @param Requset $request
     * @return jsonResponse
    **/

    public function create_genre(Request $request): JsonResponse
    {
            $validated = $request->validate([
                'title' => 'required'
            ], [
                'title.required' => 'The field cannot be empty',
            ]);
    
            // Создание жанра
            $genre = $this->genreService->createGenres($validated);
    
            return response()->json($genre, 201); // Возвращает 201 статус

    }
    

}
