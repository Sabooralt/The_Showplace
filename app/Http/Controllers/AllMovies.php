<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movies;
use App\Models\insRelSoonMovie;
use Illuminate\Support\Facades\Auth;


class AllMovies extends Controller
{
    public function show(){
        $movies = Movies::all();
        $rsMovie = insRelSoonMovie::all();
        return view('movies',compact('movies','rsMovie'));
    }
/* public function userName(){

    $user = Auth::user();
    $name = $user->name;
    return view("Layouts.layout");
} */
}
