<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\seats_layout;
use App\Models\seats;
use App\Models\Movies;
use App\Models\screening;

class theatres extends Model
{
    use HasFactory;
    public function seat_layout() {
        return $this->belongsTo(seats_layout::class, 'layout_id', 'id');
    }

    public function movie()
    {
        return $this->hasManyThrough(Movies::class, 'App\Models\Movie_Theatres', 'theatre_id', 'id', 'id', 'movie_id');
    }
    public function seats()
    {
        return $this->hasMany(seats::class);
    }

    public function screenings()
    {

        return $this->hasMany(screening::class);
    }
    public function movie_theatres() {
        return $this->hasMany('App\Movie_Theatres');
    }
}
