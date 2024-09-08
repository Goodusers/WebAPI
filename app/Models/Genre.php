<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    public $timestamps = false; // Отключает временные метки

    protected $fillable = ['title'];

    function Game(){
        return $this->BelongsTo(Game::class);
    }
}
