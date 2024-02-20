@extends('layouts.layout')

@section('css')
    <link rel="stylesheet" href="/css/ticketsection.css">
    <link rel="icon" href="/img/movieicon.png">
@endsection


@section('content')
    <title>The Showplace | Bookticket</title>
    <style>
        body {
            color: #fff;
            background-color: black;
        }

        .cat {
            object-fit: contain;
            font-family: 'Roboto', sans-serif;
        }
        .boorder{
    border-bottom: 3px solid #ffffffc9;
}

    </style>

<div style="padding-top: 200px;" class="cat pb-5 container-padding postion-absolute ">
    @if($bookings->count() > 0)
    <h4 class="c-white w-100"><strong>Your Bookings {{'('.count($bookings).')' }}</strong> </h4>
        <div class="row d-flex">
        @foreach($bookings as $booking)
        <div style="border: 3px solid #ffffff8c;" class="col-lg-6 my-3 col-md-6 col-sm-12">
                <div class="details-movie mt-4 py-3 d-flex flex-wrap">
                    <h5>Movie</h5>
                    <h6 class="position-absolute text-right">{{$booking->movie->Movie_Title}}</h6>
                </div>
                <div class="details-movie mt-4 py-3 d-flex flex-wrap">
                    <h5>Theatre</h5>
                    <h6 class="position-absolute text-right">{{$booking->theatre->name}}</h6>
                </div>
                <div class="details-movie mt-4 py-3 d-flex flex-wrap">
                    <h5>Seats</h5>
                    <h6 class="position-absolute text-right">{{$booking->seat_number}}</h6>
                </div>
                <div class="details-movie mt-4 py-3 d-flex flex-wrap">
                    <h5>Show Date</h5>
                    <h6 class="position-absolute text-right">{{$booking->date}}</h6>
                </div>
                <div class="details-movie mt-4 py-3 d-flex flex-wrap">
                    <h5>Show Time</h5>
                    <h6 class="position-absolute text-right">{{$booking->time}}</h6>
                </div>

                <div style="border: 0;" class="details-movie mt-4 py-3 d-flex flex-wrap">
                    <h5>Total Amount</h5>
                    <h6 class="position-absolute text-right">Rs.{{$booking->total_price}}</h6>
                </div>
                
            </div>
            @endforeach
    </div>
   
    @else
    <h4 class="c-white w-100">You currently have no bookings. Would you like to book a <a href="/movies"> <u> movie </u></a>?</h4>

    @endif
    </div>




@endsection

    
    