<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\People;
use App\Models\Film;

class Specie extends Model
{
    use HasFactory;

    protected $table = 'species';

    protected $fillable = [
        'name',
        'classification',
        'average_height',
        'skin_colors',
        'hair_colors',
        'eye_colors',
        'average_lifespan',
        'language',
    ];

    public function people()
    {
        return $this->belongsToMany(People::class, 'people_species', 'specie_id', 'people_id');
    }

    public function films()
    {
        return $this->belongsToMany(Film::class, 'film_species', 'specie_id', 'film_id');
    }


}
