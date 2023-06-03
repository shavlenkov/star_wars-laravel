<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilmStarship extends Model
{
    use HasFactory;

    protected $table = 'film_starships';

    protected $fillable = [
        'film_id',
        'starship_id'
    ];
}
