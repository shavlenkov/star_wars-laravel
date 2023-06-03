<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeopleSpecie extends Model
{
    use HasFactory;

    protected $table = 'people_species';

    protected $fillable = [
        'people_id',
        'specie_id'
    ];
}
