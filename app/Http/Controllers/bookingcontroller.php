<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Models\Movies;
use App\Models\theatres;
use App\Models\screening;
use App\Models\seats;
use App\Models\seats_layout;
use App\Models\Movie_Theatres;
use App\Models\bookings;
use App\Models\reviews;
use App\Models\categories;
use DateTime;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\AsArrayObject;




class bookingcontroller extends Controller
{




    public function showBookingPage(Request $request , $id){

      
          
        $seats1 = seats::where('movie_id', $id)->where('row_id',1)->orderBy('id', 'asc')->get();
        $seats2 = seats::where('movie_id', $id)->where('row_id',2)->orderBy('id', 'asc')->get();
        $seats3 = seats::where('movie_id', $id)->where('row_id',3)->orderBy('id', 'asc')->get();
        $seats4 = seats::where('movie_id', $id)->where('row_id',4)->orderBy('id', 'asc')->get();
        $seats5 = seats::where('movie_id', $id)->where('row_id',5)->orderBy('id', 'asc')->get();
        $seats6 = seats::where('movie_id', $id)->where('row_id',6)->orderBy('id', 'asc')->get();
        $seats7 = seats::where('movie_id', $id)->where('row_id',7)->orderBy('id', 'asc')->get();
        $categories = categories::where('movie_id',$id)->get();
       $movies = Movies::findOrFail($id);
    
       $screenings = screening::with('theatre')->where('movie_id', $id)->get();
    
       $screening_dates_times = [];
       foreach ($screenings as $screening) {
           $theatre = $screening->theatre;
           $date = Carbon::parse($screening->screening_time);
           $screening_date = $date->format("M d D");
           $screening_time = $date->format("h:i A");
           $screening_dates_times[] = [
               'date' => $screening_date,
               'time' => $screening_time,
               'theatre' => $theatre,
           ];
       } 


      
       
       // Check if date and time filters are present in the request
   if($request->filled('date') && $request->filled('time')) {
    $filtered_screening_dates_times = [];
    // Loop through all screenings
    foreach($screening_dates_times as $screening) {
    $screening_time = Carbon::createFromFormat('Y-m-d H:i:s', $screening['screening_time']);
    // Check if the screening date and time match the filters
    if($screening_time->isSameAs($request->input('date') . ' ' . $request->input('time'))) {
    $filtered_screening_dates_times[] = $screening;
    }
    }
    // Check if any screenings match the filters
    if(count($filtered_screening_dates_times) > 0) {
    $screening_dates_times = $filtered_screening_dates_times;
    } else {
    return redirect()->back()->with('message', 'No theatres found for the given date and time');
    }
    }; 


    try {
        $theatres = Movie_Theatres::where('movie_id', $id)->get();
        $theatre_layouts = [];
        foreach ($theatres as $theatre) {
            $theatre_info = Theatres::with('seat_layout')->findOrFail($theatre->theatre_id);
            $layout = json_decode($theatre_info->seat_layout->layout, true);
            $theatre_layouts[$theatre->theatre_id] = $layout;
        }
    } catch (\Exception $e) {
        // Handle the exception, for example by logging the error message
        \Log::error($e->getMessage());
        // Return a default error message or a redirect to a custom error page
        return redirect()->route('error')->with('error', 'An error occurred while fetching the seat layouts');
    }

    $reviews = reviews::where('movie_id',$id)->get();
   
       return view('bookticket',['screening_dates_times' => $screening_dates_times]
         ,compact('screening_dates_times','layout','reviews','theatre_info','theatre_layouts',
         'seats1','seats2','seats3','seats4','seats5','seats6','seats7','categories',
         'screening_date','screening_time',
         'movies','theatres',));
         }




         public function filterTheatres(Request $request) {
            $date = $request->input('date');
            $time = $request->input('time');
        
            $theatres = Screening::where('screening_date', $date)
                        ->where('screening_time', $time)
                        ->pluck('theatre_id');
        
            $filteredTheatres = Theatre::whereIn('id', $theatres)->get();
        
            return response()->json($filteredTheatres);
        }

       }
