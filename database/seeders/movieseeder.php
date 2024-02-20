<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Movies;


class movieseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $movies = [

            
            [

                'Movie_Title' => 'Top Gun: Maverick',
                
                'Movie_Description' => 'Thirty years of service leads Maverick to train a group of elite TOPGUN graduates to prepare for a high-profile mission while Maverick battles his past demons.',
                
                'Movie_Genre' => 'Action/Drama',
                
                'Movie_Runtime' => '2h 11m',
                
                'Movie_Cover' => 'cover1673372919.jpg',
                
                'Movie_Banner' => 'banner1673372919.jpg',
                
                'Movie_Rating' => '8.3/10',

                'Theatre_Id' => 2,

                'Movie_Director' => 'Joseph Kosinski',
                
                'Movie_Actors' => 'Tom Cruise',
                
                'Movie_Year' => 2022,
                
                'Movie_Trailer' => 'movietrailer1673383779.mp4',
                
                ],
                [
    
                    'Movie_Title' => 'Blade Runner 2049',
    
                    'Movie_Description' => 'K, an officer with the Los Angeles Police Department, unearths a secret that could create chaos. He goes in search of a former blade runner who has been missing for over three decades.',
    
                    'Movie_Genre' => 'Sci-fi/Action',
    
                    'Movie_Runtime' => '2h 43m',

                'Theatre_Id' => 2,

                    
                    'Movie_Cover' => 'cover1673373545.jpg',
    
                    'Movie_Banner' => 'banner1673373545.jpg',
                    
                    'Movie_Rating' => '8/10',
    
                    'Movie_Director' => 'Denis Villeneuve',
                    
                    'Movie_Actors' => 'Ryan Gosling',
                    
                    'Movie_Year' => 2017,
                    
                    'Movie_Trailer' => 'https://www.youtube.com/watch?v=gCcx85zbxz4',
                    
                ],
                [
                    
                    'Movie_Title' => 'The Revenant',
                    
                    'Movie_Description' => 'Hugh Glass, a legendary frontiersman, is severely injured in a bear attack and is abandoned by his hunting crew. He uses his skills to survive and take revenge on his companion who betrayed him.',
                    
                'Movie_Genre' => 'Western/Adventure',

                'Movie_Cover' => 'cover1673361859.jpg',
                
                'Movie_Runtime' => '2h 36m',
                'Theatre_Id' => 2,
                
                'Movie_Banner' => 'banner1673361859.jpg',
                
                'Movie_Rating' => '8/10',

                'Movie_Director' => 'Alejandro González Iñárritu',
                
                'Movie_Actors' => 'Leonardo DiCaprio',
                
                'Movie_Year' => 2015,
                
                'Movie_Trailer' => 'https://www.youtube.com/watch?v=LoebZZ8K5N0&ab_channel=20thCenturyStudios',

                ],
                 [
    
                    'Movie_Title' => 'The Pale Blue Eye',
    
                    'Movie_Description' => 'Veteran detective Augustus Landor investigates a series of grisly murders with the help of a young cadet who will eventually go on to become the world-famous author Edgar Allan Poe.',
    
                    'Movie_Genre' => 'Mystery/Crime',
    
                    'Movie_Cover' => 'cover1673373179.jpg',
                    'Theatre_Id' => 2,
    
                    'Movie_Runtime' => '2h 8m',
    
                    'Movie_Banner' => 'banner1673373179.jpg',
                    
                    'Movie_Rating' => '6.7/10',
    
                    'Movie_Director' => ' Scott Cooper',
                    
                    'Movie_Actors' => 'Christian Bale',
                    
                    'Movie_Year' => 2022,
                    
                    'Movie_Trailer' => 'https://www.youtube.com/watch?v=ddbL9jvg77w&ab_channel=Netflix',
    
                ]

                

        ];

        foreach ($movies as $values) {
         Movies::create($values);   
        }
    }
    }
