<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeopleStarship extends Model
{
    use HasFactory;

    protected $table = 'people_starships';

    protected $fillable = [
        'people_id',
        'starship_id'
    ];
}
