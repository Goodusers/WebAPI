<?php
namespace App\Repositories\Interfaces;

interface GenreRepositoryInterface{
    public function getAllGenres();
    public function createGenres(array $data);
    public function updateGenres($id, array $data);
    public function deleteGenres($id);
}