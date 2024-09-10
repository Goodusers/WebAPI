<?php

namespace App\Repositories;

use App\Models\Genre;
use App\Repositories\Interfaces\GenreRepositoryInterface;

class GenreRepository implements GenreRepositoryInterface{

    public function getAllGenres()
    {
        return Genre::all();
    }

    public function createGenres(array $data)
    {
        return Genre::create($data);
    }

}