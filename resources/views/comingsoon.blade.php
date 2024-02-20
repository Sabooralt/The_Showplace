@extends('layouts.layout')

@section('css')
    <link rel="stylesheet" href="/css/ticketsection.css">
    <link rel="icon" href="/img/movieicon.png">
@endsection

@section('js')
    <script src="/js/carousel.js"></script>
@endsection
@section('content')
    <title>The Showplace | Coming Soon</title>

    <style>
        .cat {
            background: linear-gradient(180deg, rgb(23 24 29 / 97%) 0%, rgb(23 24 29 / 97%) 100%), url(/movie-banner-img/{{ $movies->banner }});
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            object-fit: contain;
            font-family: 'Roboto', sans-serif;
        }
    </style>

    <div style="padding-top: 200px;" class="cat pb-5 container-padding postion-absolute ">
        <h1 class="c-white" style="text-transform: uppercase">{{ $movies->title }}</h1>
        <div style="height: 1px; background-color: rgba(255, 255, 255, 0.733);" class="w-100 my-3"></div>

        <div class="row">
            <div class="col-5 mr-auto align-self-center">


                <h5 class="c-white">STORYLINE</h3>
                    <p class="pt-4 para">{{ $movies->description }}</p>


            </div>


            <div style="flex-direction: column; justify-content:center; align-items:center; color:#fff;"
                class="col-6 ml-auto d-flex">


                <video id="bt-fullscreen" src="/movie-trailers/{{ $movies->trailer }}" autoplay loop controls></video>

            </div>





        </div>







        <div style="height: 1px; background-color: rgba(255, 255, 255, 0.733);" class="w-100 my-3"></div>

        <div class="row mt-5">

            <div class="col-12 mr-auto">


                <h3 class="c-white">DETAILS</h3>
                <div class="details-movie mt-4 py-3 d-flex flex-wrap">
                    <h5>DIRECTOR</h5>


                    <h6 class="position-absolute text-right">{{ $movies->director }}</h6>
                </div>
                <div class="details-movie mt-4 py-3 d-flex flex-wrap">
                    <h5>Starring Actor(s)</h5>
                    <h6 class="position-absolute text-right">{{ $movies->actors }}</h6>
                </div>
                <div class="details-movie mt-4 py-3 d-flex flex-wrap">
                    <h5>Release Date</h5>
                    <h6 class="position-absolute text-right">{{ $movies->releaseDate }}</h6>
                </div>
                <div class="details-movie mt-4 py-3 d-flex flex-wrap">
                    <h5>Running Time</h5>
                    <h6 class="position-absolute text-right">N/A</h6>
                </div>
                <div class="details-movie mt-4 py-3 d-flex flex-wrap">
                    <h5>Genre</h5>
                    <h6 class="position-absolute text-right">{{ $movies->genre }}</h6>

                </div>
                <div class="details-movie mt-4 py-3 d-flex flex-wrap">
                    <h5>Rating</h5>
                    <h6 class="position-absolute text-right">N/A</h6>

                </div>


            </div>
        </div>
    @endsection
