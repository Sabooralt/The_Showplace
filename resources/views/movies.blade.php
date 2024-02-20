@extends('layouts.layout')

@section('css')
    <link rel="stylesheet" href="css/allmovies.css">
    <link rel="icon" href="/img/movieicon.png">
@endsection


@section('content')

    <title>The Showplace | Movies</title>




    <div style="padding-top: 10rem" class="container-padding position-relative ">

        <h4 class="boorder p-3">On Screen Movies</h4>


        <div class="row movies-row">
            @foreach ($movies as $movie)
                <div class="onscreen-m">
                    <div class="hover-details">
                        <h4 style="white-space: pre;">{{ $movie->Movie_Title }}</h4>
                        <div class="d-flex">
                            <p class="mb-0"><i class="bi bi-star-fill"></i> {{ $movie->Movie_Rating }}</p>
                            <p class="mb-0">{{ $movie->Movie_Year }}</p>
                            <p class="mb-0">{{ $movie->Movie_Runtime }} </p>
                        </div>
                        <div>
                            <p style="color:#949ea9; font-size:12px;" class="mt-1">{{ $movie->Movie_Description }}</p>
                            <p style="color:#949ea9; font-size:12px;" class="m-0">Genre: <span
                                    style="color:#ffffffd6">{{ $movie->Movie_Genre }}</span></p>
                            <p style="color:#949ea9; font-size:12px;" class="m-0">Starring actor: <span
                                    style="color:#ffffffd6">{{ $movie->Movie_Actors }}</span></p>
                            <a class="mt-1" href="/bookticket/{{ $movie->id }}">
                                <button style="" class="btn my-2 buy-ticket-btn"><i class="bi bi-ticket-detailed"></i>
                                    Buy Ticket</button>
                            </a>
                            <a href="/bookticket/{{ $movie->id }}">
                                <button id="playtrailerbhai" class="btn watch-trailer-btn" style=""
                                    class="btn my-2"><i class="bi bi-display"></i> View Details</button>
                            </a>
                        </div>
                    </div>

                    <a id="hoverimg{{ $movie->id }}" href="/bookticket/{{ $movie->id }}">

                        <img class="hoverimg" src="/movie-cover-img/{{ $movie->Movie_Cover }}" alt="">
                    </a>

                    <h5 style="color: #e2dede;" class="px-2 pt-3"><strong>{{ $movie->Movie_Title }}</strong></h5>

                    <div class="d-flex mx-2">
                        <p style="color: #ffffffa6;">{{ $movie->Movie_Year }} <i class="bi bi-dot"></i>
                            {{ $movie->Movie_Runtime }}</p>
                        <p class="ml-auto bla">Movie</p>
                    </div>




                </div>
            @endforeach



        </div>



        <h4 class="p-3 mt-5 boorder">Coming Soon</h4>

        <div id="cs" class="row movies-row">

            @foreach ($rsMovie as $movie)
                <div class="onscreen-m ">
                    <div class="hover-details">
                        <h4>{{ $movie->title }}</h4>
                        <div class="d-flex">
                            <p class="mb-0">{{ $movie->releaseDate }}</p>
                        </div>
                        <div>
                            <p style="color:#949ea9; font-size:12px;" class="mt-1">{{ $movie->description }}</p>
                            <p style="color:#949ea9; font-size:12px;" class="m-0">Genre: <span
                                    style="color:#ffffffd6">{{ $movie->genre }}</span></p>
                            <p style="color:#949ea9; font-size:12px;" class="m-0">Starring actor: <span
                                    style="color:#ffffffd6">{{ $movie->actors }}</span></p>
                            <a href="/comingsoon/{{ $movie->id }}">
                                <button id="playtrailerbhai" class="btn watch-trailer-btn btn mt-2"><i
                                        class="bi bi-display"></i> View Details</button>
                            </a>
                        </div>
                    </div>
                    <a href="comingsoon/{{ $movie->id }}">

                        <img class="hoverimg" src="/movie-cover-img/{{ $movie->cover }}" alt="">
                    </a>

                    <h5 style="color: #fff;" class="pt-3 pl-2"><b> {{ $movie->title }} </b></h5>
                    <p style="color: #ffffffa6;" class="mb-0 ml-2 mt-1">{{ $movie->releaseDate }}</p>



                </div>
            @endforeach

        </div>

    </div>





@section('js')
    <script src="js/allmovies.js"></script>
@endsection




@endsection
