<?php
namespace App\Repositories\Interfaces;

interface GameRepositoryInterface{
    public function getAllGames();
    public function getGamaById($id);
    public function createGame(array $data);
    public function updateGame($id, array $data);
    public function deleteGame($id);
}