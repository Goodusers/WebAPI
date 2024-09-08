<?php

namespace App\Repositories;

use App\Models\Game;
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
        $game = Game::findOrFail($id);
        $game -> delete();
        return $game;
    }
}