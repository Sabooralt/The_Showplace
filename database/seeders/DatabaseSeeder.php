<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(Category_seed::class);
        $this->call(SeatsTableSeeder::class);
        $this->call(movieseeder::class);
        $this->call(rowsseeder::class);
        $this->call(seatlayoutseeder::class);
        $this->call(theatreseeder::class);
    }
}
