<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Planet;
use App\Models\Film;
use App\Models\Specie;
use App\Models\Starship;
use App\Models\Vehicle;
use App\Models\Image;

class People extends Model
{
    use HasFactory;

    protected $table = 'people';

    protected $fillable = [
        'id',
        'name',
        'height',
        'mass',
        'hair_color',
        'skin_color',
        'eye_color',
        'birth_year',
        'gender',
        'planet_id',
        'created_at',
        'updated_at'
    ];

    public function planet()
    {
        return $this->belongsTo(Planet::class);
    }

    public function films()
    {
        return $this->belongsToMany(Film::class, 'people_films', 'people_id', 'film_id');
    }

    public function species()
    {
        return $this->belongsToMany(Specie::class, 'people_species', 'people_id', 'specie_id');
    }

    public function starships()
    {
        return $this->belongsToMany(Starship::class, 'people_starships', 'people_id', 'starship_id');
    }

    public function vehicles()
    {
        return $this->belongsToMany(Vehicle::class, 'people_vehicles', 'people_id', 'vehicle_id');
    }

    public function images() {
        return $this->belongsToMany(Image::class, 'people_images', 'people_id', 'image_id');
    }
}
