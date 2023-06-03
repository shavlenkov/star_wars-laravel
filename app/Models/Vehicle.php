<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\People;
use App\Models\Film;

class Vehicle extends Model
{
    use HasFactory;

    protected $table = 'vehicles';

    protected $fillable = [
        'name',
        'model',
        'manufacturer',
        'cost_in_credits',
        'length',
        'max_atmosphering_speed',
        'crew',
        'passengers',
        'cargo_capacity',
        'consumables',
        'vehicle_class',
    ];

    public function people()
    {
        return $this->belongsToMany(People::class, 'people_vehicles', 'vehicle_id', 'people_id');
    }

    public function films()
    {
        return $this->belongsToMany(Film::class, 'film_vehicles', 'vehicle_id', 'film_id');
    }
}
