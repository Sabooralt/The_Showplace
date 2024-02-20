<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movies extends Model
{
    use HasFactory;
    protected $fillable = [
        'seat_number', 'Movie_Description', 'Movie_Runtime' , 'Movie_Genre','Movie_Cover','Movie_Banner','Movie_Rating','Movie_Director','Movie_Actors','Movie_Year','Movie_Trailer',
    ];

    
    public function screenings()
    {
        return $this->hasMany('App\screening');
    }

    public function theatres()
    {return $this->belongsToMany('App\theatres', 'movie__theatres','screenings','movie_id', 'theatre_id','bookings');
    }
    public function movie_theatres() {
        return $this->hasMany('App\MovieTheatres');
    }


}
