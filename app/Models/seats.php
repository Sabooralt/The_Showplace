<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\theatres;

class seats extends Model
{
    use HasFactory;
  
    public function getClass() {
        if($this->category_id == 2) {
            return 'deluxe-seat';
        } elseif($this->category_id == 3) {
            return 'super-seat';
        } else {
            return 'normal-seat';
        }
    }
    public function theatre()
    {
        return $this->belongsTo(theatres::class);
    }

}
