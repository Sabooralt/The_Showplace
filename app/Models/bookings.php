<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bookings extends Model
{
        use HasFactory;
        public function user()
        {
            return $this->belongsTo('App\Models\User');
        }
    public function movie(){
        return $this->belongsTo('App\Models\Movies');
    }
        public function theatre()
        {
            return $this->belongsTo('App\Models\Theatres');
        }
    }
    

