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

    public function updateGenres($id, array $data)
    {
        $genre = Genre::findOrFail($id);
        $genre -> update($data);
        return $genre;
    }

    public function deleteGenres($id)
    {
        $genre = Genre::findOrFail($id);
        $genre -> delete();
        return $genre;
    }
}