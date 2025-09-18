<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movies extends Model
{
    protected $fillable = ['title', 'synopsis', 'duration', 'releaseDate'];
    protected $hidden = ['created_at', 'updated_at'];
}
