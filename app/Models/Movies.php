<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movies extends Model
{
    protected $fillable = ['title', 'synopsis', 'duration', 'releaseDate'];
    protected $hidden = ['created_at', 'updated_at'];
    

    public function generos(){
        return $this->belongsToMany(Generos::class, 'movies_generos', 'movie_id', 'genero_id');
    }
}
