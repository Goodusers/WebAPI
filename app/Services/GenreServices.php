<?php

namespace App\Services;

use App\Repositories\Interfaces\GenreRepositoryInterface;

class GenreServices{
    protected $genreRepository;

    public function __construct(GenreRepositoryInterface $genreRepository)
    {
        $this->genreRepository = $genreRepository;
    }

    public function getAllGenres(){
        return $this->genreRepository->getAllGenres();
    }

    public function createGenres( array $data ){
        return $this->genreRepository->createGenres($data);
    }

    public function updateGenres($id, array $data ){
        return $this->genreRepository->updateGenres($id, $data);
    }

    public function deleteGenres($id){
        return $this->genreRepository->deleteGenres($id);
    }
}