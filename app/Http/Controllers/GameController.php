<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Services\GameServices;
use App\Services\GenreServices;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\StoreGameRequest;
use Illuminate\Support\Facades\DB;

class GameController extends Controller
{
    protected $gameService;
    protected $genreService;

    public function __construct(GameServices $gameService, GenreServices $genreService)
    {
        $this->gameService = $gameService;
        $this->genreService = $genreService;
    }

    /**
     * Получить список всех игр
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $games = $this->gameService->getAllGames();
        $genres = $this->genreService->getAllGenres();
        return response()->json([
            'games' => $games,
            'genres' => $genres
        ]);
    }

    /**
     * Получить игры определенного жанра
     *
     * @param int $id
     * @return JsonResponse
     */
    public function filter(int $id): JsonResponse
    {
        $games = $this->gameService->getGameById($id); // Метод для получения игр по жанру
        return response()->json([
            'games' => $games,
        ]);
    }

    /**
     * Создать новую игру
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function create_games(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'title' => 'required',
            'studio' => 'required',
            'genre_id' => 'required',
            
        ], [
            'title.required' => 'The field cannot be empty',
            'studio.required' => 'The field cannot be empty',
            'genre_id.required' => 'The field cannot be empty',
        ]);
        $game = $this->gameService->createGame($validated);

        return response()->json($game, 201); // Возвращает 201 статус
    }
    /**
     * Обновить игру
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'studio' => 'required|string'
        ]);

        $game = $this->gameService->updateGame($id, $validated);
        return response()->json($game);
    }

    /**
     * Удалить игру
     *
     * @param int $id
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
 
        return $this->gameService->deleteGame($id);
        // return response()->json(['message' => 'Game deleted successfully']);
    }
}
