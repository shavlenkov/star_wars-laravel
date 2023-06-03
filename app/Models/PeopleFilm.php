<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeopleFilm extends Model
{
    use HasFactory;

    protected $table = 'people_films';

    protected $fillable = [
        'people_id',
        'film_id'
    ];
}
