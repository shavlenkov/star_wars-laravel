<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilmVehicle extends Model
{
    use HasFactory;

    protected $table = 'film_vehicles';

    protected $fillable = [
        'film_id',
        'vehicle_id'
    ];
}
