<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\People;

class Planet extends Model
{
    use HasFactory;

    protected $table = 'planets';

    protected $fillable = [
        'name',
        'rotation_period',
        'orbital_period',
        'diameter',
        'climate',
        'gravity',
        'terrain',
        'surface_water',
        'population',
    ];

    public function people()
    {
        return $this->hasMany(People::class);
    }

    public function films()
    {
        return $this->belongsToMany(Film::class, 'planet_films', 'planet_id', 'film_id');
    }
}
