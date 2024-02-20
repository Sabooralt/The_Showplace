<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\seats_layout;


class seatlayoutseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* $seats = new seats_layout();
        $seats->name = 'The VIP Lounge';
        $seats->description = 'This layout is designed for movie-goers who want a luxurious and comfortable viewing experience. With plush seats, ample legroom, and a VIP entrance, this layout offers a premium experience for those who want to indulge in the ultimate movie-watching experience.';
        $seats->theatre_id = 3;
        $seats->save();

        $seats = new seats_layout();
        $seats->name = 'The Movie Buff';
        $seats->description = 'This layout is designed for movie enthusiasts who want to feel close to the action. With seats that are angled towards the screen and ample legroom, this layout offers an immersive and dynamic viewing experience.';
        $seats->theatre_id = 1;
        $seats->save();

        $seats = new seats_layout();
        $seats->name = 'The Royal Box';
        $seats->description = 'This layout is designed for movie-goers who want a truly royal experience. With plush seats, ample legroom, and a VIP entrance, this layout offers a premium experience for those who want to indulge in the ultimate movie-watching experience. This layout also includes a private balcony where guests can take in the view of the cinema.';
        $seats->theatre_id = 2;
        $seats->save(); */



        $layout1 = [
            'row1' => ['A1', 'A2', 'A3', 'A4'],
            'row2' => ['B1', 'B2', 'B3', 'B4'],
            'row3' => ['C1', 'C2', 'C3', 'C4'],
        ];
        $layout2 = [
            'row1' => ['A1', 'A2', 'A3', 'A4'],
            'row2' => ['B1', 'B2', 'B3', 'B4'],
            'row3' => ['C1', 'C2', 'C3', 'C4'],
        ];
        $layout3 = [
            'row1' => ['A1', 'A2', 'A3', 'A4'],
            'row2' => ['B1', 'B2', 'B3', 'B4'],
            'row3' => ['C1', 'C2', 'C3', 'C4'],
        ];
        $layouts = [
            [
            'id' => 1,
            'name' => 'The Royal Box',
        'theatre_id' => 2,
            'layout' => json_encode($layout1)
            ],
            [
            'id' => 2,
            'name' => 'The Movie Buff',
            'theatre_id' => 1,
        
            'layout' => json_encode($layout2)
            ],
            [
            'id' => 3,
            'name' => 'The Vip Lounge',
            'theatre_id' => 3,
        
            'layout' => json_encode($layout3)
            ],
            ];

            DB::table('seats_layouts')->insert($layouts);
    }
}
