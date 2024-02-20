<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use App\Models\Movies;
use App\Models\theatres;
use App\Models\screening;
use App\Models\Movie_Theatres;
use App\Models\insRelSoonMovie;
use App\Models\User;
use App\Models\seats;
use App\Models\reviews;
use App\Models\categories;
use Carbon\Carbon;

class adminController extends Controller
{
    public function adminDB(){

        $movie = Movies::all();
        $rsMovie = insRelSoonMovie::all();
        $screening = screening::all();
        $userCount = User::count();
        $users = User::all();
        $reviews = reviews::all();
    $theatres = theatres::all();
        return view('adminpages.admin',compact('movie','userCount','rsMovie','theatres','screening','users','reviews'));
    }   
    public function updateAdminStatus($id)
    {
        $user = User::findOrFail($id);
        $user->is_admin = !$user->is_admin;
        $user->save();
    
        return response()->json(['success' => true]);
    }
    

    public function editMovie($id) 
{ 
    $movie = Movies::find($id); 
    return view('adminpages.editmovie', compact('movie')); 
}
public function editShowTimings($id)
{
    $theatreNew = theatres::all();
    $movie = Movies::find($id);
    $screenings = Screening::where('movie_id', $id)->get();
$screening_dates_times = [];
foreach ($screenings as $screening) {
    $theatre = theatres::find($screening->theatre_id);
    $date = Carbon::parse($screening->screening_time);
    $screening_date = $date->format("F d l");
    $screening_time = $date->format("h:i A");
    $screening_dates_times[] = [
        'id' => $screening->id,
        'date' => $screening_date,
        'time' => $screening_time,
        'theatre' => $theatre->name,
    ];
} 


return view('adminpages.editShowTimingsForm',['screening_dates_times' => $screening_dates_times], compact('movie','screening_dates_times','screening_date' ,'screening_time','screenings','theatre','theatreNew'));

}

public function updateTiming(Request $request, $id)
{
    $screening = Screening::find($id);

    $date = $request->date;
    $screening_time = $request->time;
    $time = Carbon::createFromFormat('H:i', $screening_time)->toDateTimeString();

    if(!empty($date)) {
        $screening->screening_date = $date;
    }

    if(!empty($time)) {
        $screening->screening_time = $time;
    }

    $screening->save();

    return response()->json(['message' => 'Date and Timings Updated']);
}
public function addTimings(Request $req)
{
    $dates = $req->dates;
    $times = $req->times;
    $movie_id = $req->movie_id;
    $theatre_id = $req->theatre_id;

    for ($i = 0; $i < count($dates); $i++) {
        $screening = new screening();
        $screening->movie_id = $movie_id;
        $screening->theatre_id = $theatre_id[$i];
        $screening->screening_date = Carbon::createFromFormat('Y-m-d', $dates[$i])->toDateTimeString();
        $screening->screening_time = Carbon::createFromFormat('H:i', $times[$i])->toDateTimeString();
        $screening->save();
    }

    return response()->json(['message' => 'Screening time and date saved']);
}


public function manageTheatres(){
    $theatres = Theatres::with('movie')->get();
    
    return view('adminpages.theatres', compact('theatres'));
}





public function theatrefetch(){

    $theatres = theatres::all();
    $movie = Movies::all();
    $screening = screening::all();

    return view('adminpages.addonscreen',compact('theatres','movie','screening'));
}

public function rsMovie(){

    $theatres = theatres::all();
    $movie = Movies::all();
    $screening = screening::all();

    return view('adminpages.comingsoonadmin',compact('theatres','movie','screening'));
}
public function releaseSoon(Request $req){
    
    $bannerimg = 'RS_banner' . time() .'.'. $req->bannerimg->getClientOriginalExtension();
    $req->bannerimg->move(public_path('movie-banner-img'),$bannerimg);
 
    $coverimg =  'RS_cover'.time() .'.'. $req->coverimg->getClientOriginalExtension();
    $req->coverimg->move(public_path('movie-cover-img'),$coverimg);




    $validatedData = $req->validate([
        'trailer' => 'required|file|mimetypes:video/mp4,video/avi,video/quicktime,video/x-ms-wmv|max:40480',
    ]);

    $trailer =  'RS_movietrailer'.time() .'.'. $req->trailer->extension();
    $req->trailer->move(public_path('movie-trailers'),$trailer);

    try {
        $image = Image::make(public_path('/movie-banner-img/'.$bannerimg))->resize(1650, 1050);
    } catch (\Intervention\Image\Exception\NotReadableException $e) {
        return $e->getMessage();
    }
    $image->save();



    $movie = new insRelSoonMovie();
    
    $movie->title = $req->title;
    $movie->description = $req->description;
    $movie->genre = $req->genre;
    $movie->director = $req->director;
    $movie->releaseDate = $req->releaseDate;
    $movie->actors = $req->actors;
    $movie->cover = $coverimg;
    $movie->banner = $bannerimg;
    $movie->trailer = $trailer;
    
    $movie->save();

    return redirect()->back()->with('message', 'Coming soon Movie added successfully');
}

public function addmovie(Request $req){


    $bannerimg = 'banner' . time() .'.'. $req->bannerimg->getClientOriginalExtension();
    $req->bannerimg->move(public_path('movie-banner-img'),$bannerimg);   
    $coverimg =  'cover'.time() .'.'. $req->coverimg->getClientOriginalExtension();
    $req->coverimg->move(public_path('movie-cover-img'),$coverimg);
    $validatedData = $req->validate([
        'trailer' => 'required|file|mimetypes:video/mp4,video/avi,video/quicktime,video/x-ms-wmv|max:40480',
    ]);
    $trailer =  'movietrailer'.time() .'.'. $req->trailer->extension();
    $req->trailer->move(public_path('movie-trailers'),$trailer);
    try {
        $image = Image::make(public_path('/movie-banner-img/'.$bannerimg))->resize(1650, 1050);
    } catch (\Intervention\Image\Exception\NotReadableException $e) {
        return $e->getMessage();
    }
    $image->save();

    $movies = new Movies();
    $movies->Movie_Title = $req->Movie_Title;
    $movies->Movie_Description = $req->Movie_Description;
    $movies->Movie_Genre = $req->Movie_Genre;
    $movies->Movie_Runtime = $req->Movie_Runtime;
    $movies->Movie_Banner = $bannerimg;
    $movies->Movie_Cover = $coverimg;
    $movies->Movie_Rating = $req->Movie_Rating;
    $movies->Movie_Director = $req->Movie_Director;
    $movies->Movie_Actors = $req->Movie_Actors;
    $movies->Movie_Year = $req->Movie_Year;
    $movies->Movie_Trailer = $trailer;
    $movies->save();

    $category = new categories();
    $category->movie_id = $movies->id;
    $category->normal = $req->input("normalP");
    $category->deluxe = $req->input("deluxeP");
    $category->super = $req->input("superP");
    $category->save();

    
    foreach($req->input('theatre_id') as $key => $theatreId) {
        $movieTheatre = new Movie_Theatres();
        $movieTheatre->movie_id = $movies->id;
        $movieTheatre->theatre_id = $theatreId;
        $movieTheatre->save();
 
        $screening = new screening();
        $dates = $req->input('screening_date');
        $times = $req->input('screening_time');
        $screening->movie_id = $movies->id;
        $screening->theatre_id = $theatreId;
        $screening->screening_date = Carbon::createFromFormat('Y-m-d', $dates[$key])->toDateTimeString();
        $screening->screening_time = Carbon::createFromFormat('H:i', $times[$key])->toDateTimeString();
        $screening->save();
        $theatre = theatres::find($theatreId);
        if ($theatre->layout_id == 1) {
            for ($i=1; $i<=18; $i++) {
                $seat = new Seats();
                $seat->seat_number = 'A'.$i;
                $seat->category_id = 1;
                 $seat->screening_id = $screening->id;
            $seat->theatre_id = $theatreId;
    $seat->movie_id = $movies->id;
                $seat->row_id = 1;
                $seat->available = true;
                $seat->save();
            }
            for ($i=1; $i<=22; $i++) {
                $seat = new Seats();
                $seat->seat_number = 'B'.$i;
                $seat->category_id = 1;
                 $seat->screening_id = $screening->id;
            $seat->theatre_id = $theatreId;
    $seat->movie_id = $movies->id;
                $seat->row_id = 2;
                $seat->available = true;
                $seat->save();
            }
            for ($i=1; $i<=18; $i++) {
                $seat = new Seats();
                $seat->seat_number = 'C'.$i;
                $seat->category_id = 1;
                 $seat->screening_id = $screening->id;
            $seat->theatre_id = $theatreId;
    $seat->movie_id = $movies->id;
                $seat->row_id = 3;
                $seat->available = true;
                $seat->save();
            }
            
            for ($i=1; $i<=6; $i++) {
                $seat = new Seats();
                $seat->seat_number = 'D'.$i;
                $seat->category_id = 1;
                 $seat->screening_id = $screening->id;
            $seat->theatre_id = $theatreId;
    $seat->movie_id = $movies->id;
                $seat->row_id = 4;
                $seat->available = true;
                $seat->save();
            }
            for ($i=7; $i<=11; $i++) {
                $seat = new Seats();
                $seat->seat_number = 'D'.$i;
                $seat->category_id = 2;
                 $seat->screening_id = $screening->id;
            $seat->theatre_id = $theatreId;
    $seat->movie_id = $movies->id;
                $seat->row_id = 4;
                $seat->available = true;
                $seat->save();
            }
            for ($i=11; $i<=18; $i++) {
                $seat = new Seats();
                $seat->seat_number = 'D'.$i;
                $seat->category_id = 1;
                 $seat->screening_id = $screening->id;
            $seat->theatre_id = $theatreId;
    $seat->movie_id = $movies->id;
                $seat->row_id = 4;
                $seat->available = true;
                $seat->save();
            }
            for ($i=1; $i<=5; $i++) {
                $seat = new Seats();
                $seat->seat_number = 'E'.$i;
                $seat->category_id = 1;
                 $seat->screening_id = $screening->id;
            $seat->theatre_id = $theatreId;
    $seat->movie_id = $movies->id;
                $seat->row_id = 5;
                $seat->available = true;
                $seat->save();
            }
            for ($i=5; $i<=12; $i++) {
                $seat = new Seats();
                $seat->seat_number = 'E'.$i;
                $seat->category_id = 2;
                 $seat->screening_id = $screening->id;
            $seat->theatre_id = $theatreId;
    $seat->movie_id = $movies->id;
                $seat->row_id = 5;
                $seat->available = true;
                $seat->save();
            }
            for ($i=12; $i<=18; $i++) {
                $seat = new Seats();
                $seat->seat_number = 'E'.$i;
                $seat->category_id = 1;
                 $seat->screening_id = $screening->id;
            $seat->theatre_id = $theatreId;
    $seat->movie_id = $movies->id;
                $seat->row_id = 5;
                $seat->available = true;
                $seat->save();
            }
            for ($i=1; $i<=18; $i++) {
                $seat = new Seats();
                $seat->seat_number = 'F'.$i;
                $seat->category_id = 1;
                 $seat->screening_id = $screening->id;
            $seat->theatre_id = $theatreId;
    $seat->movie_id = $movies->id;
                $seat->row_id = 6;
                $seat->available = true;
                $seat->save();
            }
            for ($i=1; $i<=5; $i++) {
                $seat = new Seats();
                $seat->seat_number = 'G'.$i;
                $seat->category_id = 1;
                 $seat->screening_id = $screening->id;
            $seat->theatre_id = $theatreId;
    $seat->movie_id = $movies->id;
                $seat->row_id = 7;
                $seat->available = true;
                $seat->save();
            }
            for ($i=5; $i<=14; $i++) {
                $seat = new Seats();
                $seat->seat_number = 'G'.$i;
                $seat->category_id = 3;
                $seat->screening_id = $screening->id;
                $seat->theatre_id = $theatreId;
    $seat->movie_id = $movies->id;
                $seat->movie_id = $movies->id;
                $seat->row_id = 7;
                $seat->available = true;
                $seat->save();
            }
            for ($i=14; $i<=22; $i++) {
                $seat = new Seats();
                $seat->seat_number = 'G'.$i;
                $seat->category_id = 3;
                $seat->screening_id = $screening->id;
                $seat->theatre_id = $theatreId;
    $seat->movie_id = $movies->id;
                $seat->movie_id = $movies->id;
                $seat->row_id = 7;
                $seat->available = true;
                $seat->save();
            }
            for ($i=14; $i<=22; $i++) {
                $seat = new Seats();
                $seat->seat_number = 'G'.$i;
                $seat->category_id = 3;
                $seat->screening_id = $screening->id;
                $seat->theatre_id = $theatreId;
    $seat->movie_id = $movies->id;
                $seat->movie_id = $movies->id;
                $seat->row_id = 7;
                $seat->available = true;
                $seat->save();
            }
        } 

        else if($theatre->layout_id == 2){


        for ($i=1; $i<=22; $i++) {
            $seat = new Seats();
            $seat->seat_number = 'A'.$i;
            $seat->category_id = 1;
             $seat->screening_id = $screening->id;
        $seat->theatre_id = $theatreId;
$seat->movie_id = $movies->id;
            $seat->row_id = 1;
            $seat->available = true;
            $seat->save();
        }
        for ($i=1; $i<=21; $i++) {
            $seat = new Seats();
            $seat->seat_number = 'B'.$i;
            $seat->category_id = 1;
             $seat->screening_id = $screening->id;
        $seat->theatre_id = $theatreId;
$seat->movie_id = $movies->id;
            $seat->row_id = 2;
            $seat->available = true;
            $seat->save();
        }
        for ($i=1; $i<=20; $i++) {
            $seat = new Seats();
            $seat->seat_number = 'C'.$i;
            $seat->category_id = 1;
             $seat->screening_id = $screening->id;
        $seat->theatre_id = $theatreId;
$seat->movie_id = $movies->id;
            $seat->row_id = 3;
            $seat->available = true;
            $seat->save();
        }
        
        for ($i=1; $i<=6; $i++) {
            $seat = new Seats();
            $seat->seat_number = 'D'.$i;
            $seat->category_id = 1;
             $seat->screening_id = $screening->id;
        $seat->theatre_id = $theatreId;
$seat->movie_id = $movies->id;
            $seat->row_id = 4;
            $seat->available = true;
            $seat->save();
        }
        for ($i=7; $i<=13; $i++) {
            $seat = new Seats();
            $seat->seat_number = 'D'.$i;
            $seat->category_id = 2;
             $seat->screening_id = $screening->id;
        $seat->theatre_id = $theatreId;
$seat->movie_id = $movies->id;
            $seat->row_id = 4;
            $seat->available = true;
            $seat->save();
        }
        for ($i=11; $i<=18; $i++) {
            $seat = new Seats();
            $seat->seat_number = 'D'.$i;
            $seat->category_id = 1;
             $seat->screening_id = $screening->id;
        $seat->theatre_id = $theatreId;
$seat->movie_id = $movies->id;
            $seat->row_id = 4;
            $seat->available = true;
            $seat->save();
        }
        for ($i=1; $i<=5; $i++) {
            $seat = new Seats();
            $seat->seat_number = 'E'.$i;
            $seat->category_id = 1;
             $seat->screening_id = $screening->id;
        $seat->theatre_id = $theatreId;
$seat->movie_id = $movies->id;
            $seat->row_id = 5;
            $seat->available = true;
            $seat->save();
        }
        for ($i=5; $i<=12; $i++) {
            $seat = new Seats();
            $seat->seat_number = 'E'.$i;
            $seat->category_id = 2;
             $seat->screening_id = $screening->id;
        $seat->theatre_id = $theatreId;
$seat->movie_id = $movies->id;
            $seat->row_id = 5;
            $seat->available = true;
            $seat->save();
        }
        for ($i=12; $i<=16; $i++) {
            $seat = new Seats();
            $seat->seat_number = 'E'.$i;
            $seat->category_id = 1;
             $seat->screening_id = $screening->id;
        $seat->theatre_id = $theatreId;
$seat->movie_id = $movies->id;
            $seat->row_id = 5;
            $seat->available = true;
            $seat->save();
        }
        for ($i=1; $i<=15; $i++) {
            $seat = new Seats();
            $seat->seat_number = 'F'.$i;
            $seat->category_id = 1;
             $seat->screening_id = $screening->id;
        $seat->theatre_id = $theatreId;
$seat->movie_id = $movies->id;
            $seat->row_id = 6;
            $seat->available = true;
            $seat->save();
        }
        for ($i=1; $i<=5; $i++) {
            $seat = new Seats();
            $seat->seat_number = 'G'.$i;
            $seat->category_id = 1;
             $seat->screening_id = $screening->id;
        $seat->theatre_id = $theatreId;
$seat->movie_id = $movies->id;
            $seat->row_id = 7;
            $seat->available = true;
            $seat->save();
        }
        for ($i=5; $i<=9; $i++) {
            $seat = new Seats();
            $seat->seat_number = 'G'.$i;
            $seat->category_id = 3;
            $seat->screening_id = $screening->id;
            $seat->theatre_id = $theatreId;
$seat->movie_id = $movies->id;
            $seat->movie_id = $movies->id;
            $seat->row_id = 7;
            $seat->available = true;
            $seat->save();
        }
        for ($i=14; $i<=13; $i++) {
            $seat = new Seats();
            $seat->seat_number = 'G'.$i;
            $seat->category_id = 3;
            $seat->screening_id = $screening->id;
            $seat->theatre_id = $theatreId;
$seat->movie_id = $movies->id;
            $seat->movie_id = $movies->id;
            $seat->row_id = 7;
            $seat->available = true;
            $seat->save();
        }
        for ($i=14; $i<=12; $i++) {
            $seat = new Seats();
            $seat->seat_number = 'G'.$i;
            $seat->category_id = 3;
            $seat->screening_id = $screening->id;
            $seat->theatre_id = $theatreId;
$seat->movie_id = $movies->id;
            $seat->movie_id = $movies->id;
            $seat->row_id = 7;
            $seat->available = true;
            $seat->save();
        }
       

    }else{
        for ($i=1; $i<=18; $i++) {
            $seat = new Seats();
            $seat->seat_number = 'A'.$i;
            $seat->category_id = 1;
             $seat->screening_id = $screening->id;
        $seat->theatre_id = $theatreId;
$seat->movie_id = $movies->id;
            $seat->row_id = 1;
            $seat->available = true;
            $seat->save();
        }
        for ($i=1; $i<=22; $i++) {
            $seat = new Seats();
            $seat->seat_number = 'B'.$i;
            $seat->category_id = 1;
             $seat->screening_id = $screening->id;
        $seat->theatre_id = $theatreId;
$seat->movie_id = $movies->id;
            $seat->row_id = 2;
            $seat->available = true;
            $seat->save();
        }
        for ($i=1; $i<=18; $i++) {
            $seat = new Seats();
            $seat->seat_number = 'C'.$i;
            $seat->category_id = 1;
             $seat->screening_id = $screening->id;
        $seat->theatre_id = $theatreId;
$seat->movie_id = $movies->id;
            $seat->row_id = 3;
            $seat->available = true;
            $seat->save();
        }
        
        for ($i=1; $i<=6; $i++) {
            $seat = new Seats();
            $seat->seat_number = 'D'.$i;
            $seat->category_id = 1;
             $seat->screening_id = $screening->id;
        $seat->theatre_id = $theatreId;
$seat->movie_id = $movies->id;
            $seat->row_id = 4;
            $seat->available = true;
            $seat->save();
        }
        for ($i=7; $i<=11; $i++) {
            $seat = new Seats();
            $seat->seat_number = 'D'.$i;
            $seat->category_id = 2;
             $seat->screening_id = $screening->id;
        $seat->theatre_id = $theatreId;
$seat->movie_id = $movies->id;
            $seat->row_id = 4;
            $seat->available = true;
            $seat->save();
        }
        for ($i=11; $i<=18; $i++) {
            $seat = new Seats();
            $seat->seat_number = 'D'.$i;
            $seat->category_id = 1;
             $seat->screening_id = $screening->id;
        $seat->theatre_id = $theatreId;
$seat->movie_id = $movies->id;
            $seat->row_id = 4;
            $seat->available = true;
            $seat->save();
        }
        for ($i=1; $i<=5; $i++) {
            $seat = new Seats();
            $seat->seat_number = 'E'.$i;
            $seat->category_id = 1;
             $seat->screening_id = $screening->id;
        $seat->theatre_id = $theatreId;
$seat->movie_id = $movies->id;
            $seat->row_id = 5;
            $seat->available = true;
            $seat->save();
        }
        for ($i=5; $i<=12; $i++) {
            $seat = new Seats();
            $seat->seat_number = 'E'.$i;
            $seat->category_id = 2;
             $seat->screening_id = $screening->id;
        $seat->theatre_id = $theatreId;
$seat->movie_id = $movies->id;
            $seat->row_id = 5;
            $seat->available = true;
            $seat->save();
        }
        for ($i=12; $i<=18; $i++) {
            $seat = new Seats();
            $seat->seat_number = 'E'.$i;
            $seat->category_id = 1;
             $seat->screening_id = $screening->id;
        $seat->theatre_id = $theatreId;
$seat->movie_id = $movies->id;
            $seat->row_id = 5;
            $seat->available = true;
            $seat->save();
        }
        for ($i=1; $i<=18; $i++) {
            $seat = new Seats();
            $seat->seat_number = 'F'.$i;
            $seat->category_id = 1;
             $seat->screening_id = $screening->id;
        $seat->theatre_id = $theatreId;
$seat->movie_id = $movies->id;
            $seat->row_id = 6;
            $seat->available = true;
            $seat->save();
        }
        for ($i=1; $i<=5; $i++) {
            $seat = new Seats();
            $seat->seat_number = 'G'.$i;
            $seat->category_id = 1;
             $seat->screening_id = $screening->id;
        $seat->theatre_id = $theatreId;
$seat->movie_id = $movies->id;
            $seat->row_id = 7;
            $seat->available = true;
            $seat->save();
        }
        for ($i=5; $i<=14; $i++) {
            $seat = new Seats();
            $seat->seat_number = 'G'.$i;
            $seat->category_id = 3;
            $seat->screening_id = $screening->id;
            $seat->theatre_id = $theatreId;
$seat->movie_id = $movies->id;
            $seat->movie_id = $movies->id;
            $seat->row_id = 7;
            $seat->available = true;
            $seat->save();
        }
        for ($i=14; $i<=22; $i++) {
            $seat = new Seats();
            $seat->seat_number = 'G'.$i;
            $seat->category_id = 3;
            $seat->screening_id = $screening->id;
            $seat->theatre_id = $theatreId;
$seat->movie_id = $movies->id;
            $seat->movie_id = $movies->id;
            $seat->row_id = 7;
            $seat->available = true;
            $seat->save();
        }
        for ($i=14; $i<=22; $i++) {
            $seat = new Seats();
            $seat->seat_number = 'G'.$i;
            $seat->category_id = 3;
            $seat->screening_id = $screening->id;
            $seat->theatre_id = $theatreId;
$seat->movie_id = $movies->id;
            $seat->movie_id = $movies->id;
            $seat->row_id = 7;
            $seat->available = true;
            $seat->save();
        }
    }

    }
   
    return redirect()->back()->with('message', 'Movie added successfully, with the chosen timings and theatres');

}
// Add Movie End

//Edit Movie


public function updateMovie(Request $request, $id) { 
$movie = Movies::find($id);
 $movie->update($request->all()); 
 return response()->json(['success' => 'Movie Updated']);
 
}


//Edit Movie End

// Delete Movie


public function deleteMovie($id) {
    $comingSoonMovie = insRelSoonMovie::find($id);
  
    $movie = Movies::find($id);
    $theatre = theatres::find($id);
    $users = User::find($id);
    $reviews = reviews::find($id);
    
    if($movie){
        Movie_Theatres::where('movie_id', $movie->id)->delete();
        screening::where('movie_id', $movie->id)->delete();
        seats::where('movie_id', $movie->id)->delete();
        reviews::where('movie_id', $movie->id)->delete();
        $pathbanner = 'public/movie-banner-img/'.$movie->Movie_Banner;
        $pathcover = 'public/movie-cover-img/'.$movie->Movie_Cover;
        $pathtrailer = 'public/movie-trailers/'.$movie->Movie_Trailer;
        if (File::exists($pathbanner) || File::exists($pathbanner) ||  $pathtrailer) {
            File::delete($pathbanner);
            File::delete($pathcover);
            File::delete($pathtrailer);
        }
        $movie->delete();
    }
    if($comingSoonMovie){
        $comingSoonMovie->delete();
    }
    if($theatre){
        $theatre->delete();
    }
    if($reviews){
        $reviews->delete();
    }
    if($users){
        $users->delete();
    }
    if(!$movie && !$comingSoonMovie && !$theatre && !$users){
        return response()->json(['error' => 'Movie, Coming Soon Movie, Theatre or User not found']);
    }
    return response()->json(['success' => 'Movie, Coming Soon Movie, Theatre or User Deleted']);
}

// Delete Movie End

}
