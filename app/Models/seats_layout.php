<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\theatres;


class seats_layout extends Model
{
    use HasFactory;

        public function theatre() {
            return $this->hasMany(theatres::class);
        }
    
}
