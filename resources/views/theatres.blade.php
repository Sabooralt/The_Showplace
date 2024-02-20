@extends('layouts.layout')

@section('css')
    <link rel="stylesheet" href="css/allmovies.css">
    <link rel="icon" href="/img/movieicon.png">
@endsection


@section('content')

    <title>The Showplace | Movies</title>

    <style>
        body {
            background: linear-gradient(180deg, rgba(23, 24, 29, 0.986) 0%, rgba(23, 24, 29, 0.986) 100%), url(https://wallpapercave.com/wp/VmN49xl.jpg);
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>



    <div style="padding-top: 10rem" class="font-f container-padding position-relative ">



        <div class="row font-f">
            @foreach ($theatres as $theatre)
                <div class="col-12 mt-5">
                    <div style="border-bottom: 2px solid #fff;" class="row position-relative">
                        <div style="flex-direction:column;bottom:0;" class="d-flex position-absolute">

                            <h2>{{ $theatre->name }}</h2>
                            <h6>Total Movies Hosting: {{ '(' . $theatre->movie->count() . ')' ?? 0 }}</h6>
                        </div>
                        <div class="ml-auto pt-5">

                            <h6>Location: {{ $theatre->location }}</h6>
                            <h6>Seats Layout: {{ '"' . $theatre->seat_layout->name . '"' }}</h6>
                        </div>
                    </div>




                    <div style="gap:30px; padding: 1rem 3rem;" class="row font-f">
                    @foreach ($theatre->movie as $movie)
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
                </div>

        </div>
        @endforeach
    </div>
    </div>




@section('js')
    <script src="js/allmovies.js"></script>
@endsection




@endsection
