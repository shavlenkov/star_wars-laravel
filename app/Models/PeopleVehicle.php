<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeopleVehicle extends Model
{
    use HasFactory;

    protected $table = 'people_vehicles';

    protected $fillable = [
        'people_id',
        'vehicle_id'
    ];
}
