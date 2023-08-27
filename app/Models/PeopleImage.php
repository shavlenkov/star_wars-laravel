<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeopleImage extends Model
{
    use HasFactory;

    protected $table = 'people_images';

    protected $fillable = [
        'people_id',
        'image_id',
    ];
}
