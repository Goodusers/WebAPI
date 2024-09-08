<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Game extends Model
{
    use HasFactory;

    public $timestamps = false; // Отключает временные метки

    protected $fillable = ['Title', 'Studio', 'genre_id'];

    function Genre(){
        return $this->BelongsTo(Genre::class);
    }
}
