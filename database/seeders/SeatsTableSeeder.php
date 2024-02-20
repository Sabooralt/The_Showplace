<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\seats;


class SeatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i<=18; $i++) {
            $seat = new Seats();
            $seat->seat_number = 'A'.$i;
            $seat->category_id = 1;
            $seat->row_id = 1;
            $seat->available = true;
            $seat->save();
        }
        for ($i=1; $i<=22; $i++) {
            $seat = new Seats();
            $seat->seat_number = 'B'.$i;
            $seat->category_id = 1;
            $seat->row_id = 2;
            $seat->available = true;
            $seat->save();
        }
        for ($i=1; $i<=18; $i++) {
            $seat = new Seats();
            $seat->seat_number = 'C'.$i;
            $seat->category_id = 1;
            $seat->row_id = 3;
            $seat->available = true;
            $seat->save();
        }
        
        for ($i=1; $i<=6; $i++) {
            $seat = new Seats();
            $seat->seat_number = 'D'.$i;
            $seat->category_id = 1;
            $seat->row_id = 4;
            $seat->available = true;
            $seat->save();
        }
        for ($i=7; $i<=11; $i++) {
            $seat = new Seats();
            $seat->seat_number = 'D'.$i;
            $seat->category_id = 2;
            $seat->row_id = 4;
            $seat->available = true;
            $seat->save();
        }
        for ($i=11; $i<=18; $i++) {
            $seat = new Seats();
            $seat->seat_number = 'D'.$i;
            $seat->category_id = 1;
            $seat->row_id = 4;
            $seat->available = true;
            $seat->save();
        }
        for ($i=1; $i<=5; $i++) {
            $seat = new Seats();
            $seat->seat_number = 'E'.$i;
            $seat->category_id = 1;
            $seat->row_id = 5;
            $seat->available = true;
            $seat->save();
        }
        for ($i=5; $i<=12; $i++) {
            $seat = new Seats();
            $seat->seat_number = 'E'.$i;
            $seat->category_id = 2;
            $seat->row_id = 5;
            $seat->available = true;
            $seat->save();
        }
        for ($i=12; $i<=18; $i++) {
            $seat = new Seats();
            $seat->seat_number = 'E'.$i;
            $seat->category_id = 1;
            $seat->row_id = 5;
            $seat->available = true;
            $seat->save();
        }
        for ($i=1; $i<=18; $i++) {
            $seat = new Seats();
            $seat->seat_number = 'F'.$i;
            $seat->category_id = 1;
            $seat->row_id = 6;
            $seat->available = true;
            $seat->save();
        }
        for ($i=1; $i<=5; $i++) {
            $seat = new Seats();
            $seat->seat_number = 'G'.$i;
            $seat->category_id = 1;
            $seat->row_id = 7;
            $seat->available = true;
            $seat->save();
        }
        for ($i=5; $i<=14; $i++) {
            $seat = new Seats();
            $seat->seat_number = 'G'.$i;
            $seat->category_id = 3;
            $seat->row_id = 7;
            $seat->available = true;
            $seat->save();
        }
        for ($i=14; $i<=22; $i++) {
            $seat = new Seats();
            $seat->seat_number = 'G'.$i;
            $seat->category_id = 3;
            $seat->row_id = 7;
            $seat->available = true;
            $seat->save();
        }
       
        
   
    }
}
