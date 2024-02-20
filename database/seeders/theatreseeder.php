<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\theatres;


class theatreseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $theatres = new theatres();
        $theatres->id= 1;
        $theatres->name = 'The Silver Screen';
        $theatres->location = 'Karachi,Pakistan';
        $theatres->layout_id = 3;
        $theatres->save();
        
        $theatres = new theatres();
        $theatres->id= 2;
        $theatres->name = 'The Film Society';
        $theatres->location = 'Karachi,Pakistan';
        $theatres->layout_id = 1;
        $theatres->save();
        
        $theatres = new theatres();
        $theatres->id= 3;
        $theatres->name = 'The Film Forum';
        $theatres->location = 'Karachi,Pakistan';
        $theatres->layout_id = 2;
        $theatres->save();
    }
}
