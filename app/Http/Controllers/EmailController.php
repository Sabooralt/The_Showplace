<?php

namespace App\Http\Controllers;

use App\Models\Bookings;
use App\Models\Movies;
use App\Models\seats;
use App\Models\theatres;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{

    public function sendEmail(Request $request)
    {
        $seats_id = $request->seats_id;
        $seats = $request->seats;
        $theatre_id = $request->theatre_id;
        $date = $request->date;
        $time = $request->time;
        $movie_id = $request->movie_id;
        $total_price = $request->total_price;
        $bookings = Bookings::where('theatre_id', $theatre_id)
            ->where('date', $date)
            ->where('time', $time)
            ->where('movie_id', $movie_id)
            ->get();
        $booking = new Bookings;
        $booking->theatre_id = $theatre_id;
        $booking->movie_id = $movie_id;
        $booking->seat_number = $seats;
        $booking->date = $date;
        $booking->time = $time;
        $booking->total_price = $total_price;
        $booking->user_id = auth()->id();
        $booking->save();
        foreach ($seats_id as $id) {
            $seat = seats::where('id', $id)
                ->where('theatre_id', $theatre_id)
                ->where('movie_id', $movie_id)
                ->first();
            $seat->available = 0;
            $seat->save();

        }

        $data = [
            'email' => auth()->user()->email,
            'seats' => $request->seats,
            'date' => $date,
            'time' => $time,
            'theatres' => $request->theatres,
            'total_price' => $request->total_price,
        ];

        Mail::send('booking-confirmation', $data, function ($message) use ($data) {
            $message->to($data['email']);
            $message->subject('Booking Confirmation');
        });

        return response()->json(['message' => ' Device has been deleted!']);
    }

    public function yourBookings()
    {
        $user = Auth::user();
        $bookings = Bookings::where('user_id', $user->id)->get();
        return view('profile.your-booking', compact('bookings'));
    }

}
