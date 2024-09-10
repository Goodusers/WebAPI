<?php

namespace App\Repositories;

use App\Models\Game;
use App\Models\Genre;
use App\Repositories\Interfaces\GameRepositoryInterface;
use Illuminate\Support\Facades\DB;


class GameRepository implements GameRepositoryInterface{
    public function getAllGames()
    {
        return DB::table('games')->join('genres', 'games.genre_id', '=', 'genres.id')->get(['games.id','games.Title', 'games.Studio', 'genres.title']);
    }

    public function getGamaById($id) // Список игр с оределенным жанром
    {
        return Game::where('genre_id', $id)->get();
    }

    public function createGame(array $data)
    {
        return Game::create($data);
    }

    public function updateGame($id, array $data)
    {
        $game = Game::where('id', $id);
        $game -> update($data);
        return $game;
    }

    public function deleteGame($id)
    {
        DB::beginTransaction();
    
        try {
            $game = Game::findOrFail($id);
            // Запомнить жанр игры перед удалением
            $genreId = $game->genre_id;
    
            // Удаление игры
            $game->delete();
    
            // Проверка, остались ли игры у жанра
            $genre = Genre::find($genreId);
            if ($genre) {
                $hasGames = $genre->game()->exists(); 
    
                if (!$hasGames) {
                    DB::commit(); // Подтверждаем транзакцию
                    return response()->json([
                        'message' => "Игра успешно удалена, а также у жанра '" . $genre->title . "' больше нет игр в базе"
                    ], 200);
                }
            }
    
            DB::commit();
    
            return response()->json([
                'message' => 'Игра успешно удалена',
                'game' => $game
            ]);
    
        } catch (\Exception $e) {
            // Откат транзакции в случае ошибки
            DB::rollBack();
    
            // Возвращаем ошибку
            return response()->json([
                'message' => 'Ошибка удаления игры: ' . $e->getMessage()
            ], 500);
        }
    }
    
}