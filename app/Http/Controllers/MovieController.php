<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Models\Movies;
use App\Models\User;
use App\Models\theatres;
use App\Models\reviews;
use App\Models\screening;
use App\Models\Movie_Theatres;
use App\Models\insRelSoonMovie;
use Carbon\Carbon;



class MovieController extends Controller
{
    public function home(){
    
        

        $movies = Movies::orderBy('id','desc')->get();
        $movie = Movies::all();
        $count = $movies->count();

        return view("home",compact("movies","movie"),["count"=>$count]);
    }
    public function showRsMovie($id){
    
        $movies = insRelSoonMovie::findOrFail($id);
        return view("comingsoon",compact('movies'));
       }  

       public function theatres(){
        $theatres = Theatres::with('movie')->get();
        return view("theatres",compact("theatres"));


       }
       public function showTimings(){
        $movies = Movies::orderBy('id','desc')->get();
        $movie = Movies::all();

        return view('showtimings',compact("movies","movie"));

       }
       public function userReview(Request $req){

  $review = new reviews;
  $review->user_id = $req->user_id;
  $review->movie_id = $req->movie_id;
  $review->review = $req->review;
  $review->save();

  return response()->json(['success' => true]);



       }


}
