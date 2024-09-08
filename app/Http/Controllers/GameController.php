<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use App\Services\GameServices;
use App\Services\GenreServices;

class GameController extends Controller
{
    protected $gameService;
    protected $genreService;

    public function __construct(GameServices $gameService, GenreServices $genreService)
    {
        $this->gameService = $gameService;
        $this->genreService = $genreService;
    }

    public function index(){
        $game = $this->gameService->getAllGames();
        $genre = $this->genreService->getAllGenres();
        return view('index', ['game' => $game, 'genre' => $genre]);
    }

    public function filter($id){ // Список игр определенного жанра
        $game = $this->gameService->getGameById($id);
        return view('filter', ['game' => $game, 'genre' => $this->genreService->getAllGenres()]);    
    }

    public function create(Request $request){
        $request->validate([
            'Title' => 'required',
            'Studio' => 'required'
        ],[
            'Title.required' => 'Поле не может быть пустым',
            'Studio.required' => 'Поле не может быть пустым'
        ]);
        $data = $request->all();
        $this->gameService->createGame($data);
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $data = $request->except(['_token', '_method']); // Удаляем ненужные поля
        $this->gameService->updateGame($id, $data);
        return redirect()->back();
    }

    public function delete($id)
    {
        $this->gameService->deleteGame($id);
        return redirect()->back();

    }
}