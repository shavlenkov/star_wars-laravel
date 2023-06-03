<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanetFilm extends Model
{
    use HasFactory;

    protected $table = 'planet_films';

    protected $fillable = [
        'planet_id',
        'film_id'
    ];
}
