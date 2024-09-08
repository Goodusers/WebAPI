<?php

namespace App\Services;

use App\Repositories\Interfaces\GameRepositoryInterface;

class GameServices{
    protected $gameRepository;

    public function __construct(GameRepositoryInterface $gameRepository)
    {
        $this->gameRepository = $gameRepository;
    }

    public function getAllGames(){
        return $this->gameRepository->getAllGames();
    }

    public function getGameById($id){
        return $this->gameRepository->getGamaById($id);
    }

    public function createGame( array $data ){
        return $this->gameRepository->createGame($data);
    }

    public function updateGame($id, array $data ){
        return $this->gameRepository->updateGame($id, $data);
    }

    public function deleteGame($id){
        return $this->gameRepository->deleteGame($id);
    }
}