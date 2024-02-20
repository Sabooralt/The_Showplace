<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\theatres;

class screening extends Model
{
    use HasFactory;
    
        public function theatre()
        {
            return $this->belongsTo(theatres::class);
        }
    
    
}
