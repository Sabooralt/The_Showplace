<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\screening;


class screenings_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $screen = new screening();
        $screen->movie_id = 15;
        $screen->theatre_id = 2;
        $screen->screening_time = '2023-01-01T20:53';
        $screen->screening_date = '2023-01-01T20:53';
        $screen->save();
    }
}
