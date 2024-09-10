<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    public $timestamps = false; // Отключает временные метки

    protected $fillable = ['title', 'studio', 'genre_id'];

    function Genre(){
        return $this->hasMany(Genre::class);
    }
}
