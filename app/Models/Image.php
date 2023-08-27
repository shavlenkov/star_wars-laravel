<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;


    protected $table = 'images';

    protected $fillable = [
        'id',
        'url',
        'created_at',
        'updated_at'
    ];

    public function people() {
        return $this->belongsToMany(People::class, 'people_images', 'image_id', 'people_id');
    }
}
