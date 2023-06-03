<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilmSpecie extends Model
{
    use HasFactory;

    protected $table = 'film_species';

    protected $fillable = [
        'film_id',
        'specie_id'
    ];
}
