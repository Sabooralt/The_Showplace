<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie_Theatres extends Model
{
    use HasFactory;
    public function movie() {
        return $this->belongsTo('App\Movie');
    }
    
    public function theatre() {
        return $this->belongsTo('App\Theatres');
    }
}
