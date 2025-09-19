<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Generos extends Model
{
    protected $fillable = ['title'];

    public function movies(){
        return $this->belongsToMany(Movies::class, 'movies_generos', 'genero_id', 'movie_id');
    }
}
