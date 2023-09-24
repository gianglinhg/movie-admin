<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    public function movies()
    {
        return $this->belongsToMany(Movie::class, 'movie_region', 'region_id', 'movie_id');
    }
}
