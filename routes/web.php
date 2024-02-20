<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\seatscontroller;
use App\Http\Controllers\bookingcontroller;
use App\Http\Controllers\AllMovies;
use App\Http\Controllers\InsertMovie;
use App\Http\Controllers\adminController;
use App\Http\Controllers\EmailController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::middleware(['auth', 'check.is.admin'])->group(function ()  {
    Route::get("/adminpanel",[adminController::class,"adminDB"]);
    Route::get('/edit-movie/{id}',[adminController::class,'editMovie']);
    Route::get('/edit-show-timings/{id}', [adminController::class, 'editShowTimings']);
    Route::get('/adminpanel/managetheatres',[adminController::class,"manageTheatres"]);
    Route::get('/timings',[bookingcontroller::class,"fetchTimings"]);
    Route::get("/adminpanel/addonscreenmovie",[adminController::class,"theatrefetch"]);
    Route::get("/adminpanel/insertReleasingSoonMovie", [adminController::class, "rsMovie"])->name("insertReleasingSoonMovie");
    Route::post('/update-admin-status{id}', [adminController::class, 'updateAdminStatus']);
    Route::get('/showtimings',[MovieController::class,"showTimings"]);
    Route::post("/adminpanel/insertReleasingSoonMovie", [adminController::class, "releaseSoon"])->name("releasingsoon");
    Route::post('/send-email', [EmailController::class,'sendEmail']);
    Route::post('/filter-data', [bookingcontroller::class, "filterTheatres"]);
    Route::post("/addonscreenmovie",[adminController::class,"addmovie"])->name('addonscreenmovie');
    Route::post("/updatePrice",[seatscontroller::class,"updatePrice"]);
    Route::post('updateShowTimings/{id}',[adminController::class,"updateTiming"]);
    Route::post('addTimings',[adminController::class,"addTimings"]);
    Route::post('/reviews',[MovieController::class,"userReview"]);
    Route::put('/edit-movie-submit/{id}', [adminController::class,'updateMovie']);
    Route::delete('/delete-movie/{id}', [adminController::class, 'deleteMovie']);
    Route::delete('/delete-rsmovie/{id}', [adminController::class, 'deleteMovie']);
});



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get("/bookticket/{movie_id}",[bookingcontroller::class,"showBookingPage"]);
    Route::get("/movies",[AllMovies::class,"show"])->name('movies');   
    Route::get('/comingsoon/{id}',[MovieController::class,"showRsMovie"]);
    Route::get("/theatres",[MovieController::class,"theatres"]);
Route::get("/user/YourBookings",[EmailController::class,"yourBookings"]);

    
    Route::get('/dashboard', function () {
        return redirect()->route('home');
    })->name('dashboard');
});

Route::get('/redirectToHome', function () {
    $message = request()->input('message');
    session()->flash('Ticket Booked Successfully Pls check your email or orders for more information. Thank You for Choosing Us!', $message);
    return redirect()->route('home');
  });
  

Route::get("/",[MovieController::class,"home"])->name('home');








// send email


// send email





// Admin Work


// Movie CRUD




// Add 

// Delete Movie


// Edit Movie

// Update Movie Timings


// Movie CRUD


// Ajax





