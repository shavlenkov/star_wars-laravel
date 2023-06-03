<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\People;
use App\Models\Planet;

class Film extends Model
{
    use HasFactory;

    protected $table = 'films';

    protected $fillable = [
        'title',
        'episode_id',
        'opening_crawl',
        'director',
        'producer',
        'release_date',
        'created_at',
        'updated_at'
    ];

    public function people()
    {
        return $this->belongsToMany(People::class, 'people_films', 'film_id', 'people_id');
    }

    public function planets()
    {
        return $this->belongsToMany(Planet::class, 'planet_films', 'film_id', 'planet_id');
    }

    public function species()
    {
        return $this->belongsToMany(Specie::class, 'film_species', 'film_id', 'specie_id');
    }

    public function starships()
    {
        return $this->belongsToMany(Starship::class, 'film_starships', 'film_id', 'starship_id');
    }

    public function vehicles()
    {
        return $this->belongsToMany(Vehicle::class, 'film_vehicles', 'film_id', 'vehicle_id');
    }

}
