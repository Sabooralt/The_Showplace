<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\categories;

class category_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new categories();
        $category->movie_id = 82; 
        $category->normal = 600;
        $category->deluxe = 800;
        $category->super = 1000;
        $category->save();
    
        $category = new categories();
        $category->movie_id = 81; 
        $category->normal = 1000;
        $category->deluxe = 1200;
        $category->super = 1400;
        $category->save();

        $category = new categories();
        $category->movie_id = 80; 
        $category->normal = 700;
        $category->deluxe = 900;
        $category->super = 1150;
        $category->save();
        
        $category = new categories();
        $category->movie_id = 78; 
        $category->normal = 700;
        $category->deluxe = 900;
        $category->super = 1150;
        $category->save();
    }
}
