<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\seats;
use App\Models\categories;

class seatscontroller extends Controller
{
   
    
    public function updatePrice(Request $request)
    {
        $seats = json_decode($request->input('seats'), true);
        $movie_id = $request->input('movie_id');
        $normalPrice = 0;
        $deluxePrice = 0;
        $superPrice = 0;
        
        $category = categories::where('movie_id', $movie_id)->first();
    
        foreach($seats as $seat){
            switch ($seat['category']) {
                case 1:
                    $normalPrice += $category->normal;
                    break;
                case 2:
                    $deluxePrice += $category->deluxe;
                    break;
                case 3:
                    $superPrice += $category->super;
                    break;
            }
        }
    
        $total = array_sum(['normalPrice' => $normalPrice, 'deluxePrice' => $deluxePrice, 'superPrice' => $superPrice]);
    
        
        
        return response()->json(['normalPrice' => $normalPrice, 'deluxePrice' => $deluxePrice, 'superPrice' => $superPrice, 'total' => $total]);
    }
    
    
 
    
}
