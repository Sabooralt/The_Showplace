@extends('layouts.layout')

@section('css')
    <link rel="stylesheet" href="/css/ticketsection.css">
    <link rel="icon" href="/img/movieicon.png">
@endsection


@section('content')
    <title>The Showplace | Bookticket</title>
    <style>
        body {
            background: linear-gradient(180deg, rgb(23 24 29 / 97%) 0%, rgb(23 24 29 / 97%) 100%), url(/movie-banner-img/{{ $movies->Movie_Banner }});
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
        }

        .cat {
            object-fit: contain;
            font-family: 'Roboto', sans-serif;
        }

        .seats-id-selected {
            visibility: hidden;
        }
    </style>

    @if (session('TicketBooked'))
        <div class="alert alert-success">
            {{ session('TicketBooked') }}
        </div>
    @endif
    <div style="text-transform: uppercase" class=" w-100 seats-booking">
        <div class="d-flex pt-1 w-100 row">

            <div class="d-flex seats-classes col-lg-4 col-md-4 col-sm-12">
                <div class="s-date">
                    <h6 style="opacity: .7" class="c-white">Normal</h6>
                    <p id="normal-p" style="font-size: 20px;
  font-weight: 500;" class="pt-1 m-0 c-white"></p>
                </div>
                <div class="s-date">
                    <h6 style="opacity: .7" class="c-white">Deluxe</h6>
                    <p id="deluxe-p" style="font-size: 20px;
  font-weight: 500;" class="pt-1 m-0 c-white"></p>
                </div>
                <div class="s-date">
                    <h6 style="opacity: .7" class="c-white">Super</h6>
                    <p id="super-p" style="font-size: 20px;
  font-weight: 500;" class="pt-1 m-0 c-white"></p>
                </div>
            </div>

            <div class="col-lg-8 col-md-8 col-sm-12 d-flex">


                <div class="your-seats mr-auto">
                    <h6 style="opacity: .7" class="c-white">Your Seats <span id="seats-count"></span></h6>
                    <p id="selected-seats" style="font-size: 20px; font-weight: 500; gap:5px; max-width:400px;"
                        class="pt-1 m-0 c-white flex-wrap d-flex">0</p>
                </div>






                <button id="purchase" style="color: #fff;" class="btn checkout-btn ml-auto">PURCHASE Rs.(<span id="total-p"></span>)</button>


            </div>
        </div>



    </div>

    <div style="padding-top: 200px;" class="cat pb-5 container-padding postion-absolute ">
        <div class="row">
            <h1 class="c-white mx-auto" id="m-title" style="text-transform: uppercase">{{ $movies->Movie_Title }}</h1>
            <div style="height: 1px; background-color: rgba(255, 255, 255, 0.733);" class="w-100 my-3"></div>
            <div class="col-lg-6 col-md-12 mr-auto align-self-center">
                <h5 class="c-white">STORYLINE</h3>
                    <p class="pt-4 para">{{ $movies->Movie_Description }}</p>
                    <input type="hidden" id="movie-id" value="{{ $movies->id }}">
                    <input type="hidden" id="movie-banner" value="/movie-banner-img/{{ $movies->Movie_Banner }}">
            </div>
            <div class="col-lg-6 col-12">
                <video id="bt-fullscreen" src="/movie-trailers/{{ $movies->Movie_Trailer }}" autoplay loop controls></video>
            </div>
        </div>







        <div style="height: 1px; background-color: rgba(255, 255, 255, 0.733);" class="w-100 my-3"></div>
        <h5 class="heading-d mt-5 ">REVIEWS</h3>
            <div class="row mt-2">
                <div class="col-lg-5 col-md-6 col-sm-12 py-3">
                    @if (count($reviews) == 0)
                        <p>No reviews for this movie yet. Be the first one to leave a review!</p>
                    @else
                        @foreach ($reviews as $review)
                            <div class="w-100 reviews my-2">
                                <i style="font-size: 40px;" class="bi bi-quote"></i>
                                <div>
                                    <p class="user-review">{{ $review->review }}</p>

                                </div>
                                <div style="gap: 1rem;" class="d-flex mt-3 user-r-box">

                                    @if ($review->user->profile_photo_path)
                                        <img class="reviews-img" src="/storage/{{ $review->user->profile_photo_path }}">
                                    @else
                                        <img class="reviews-img" src="/avatar.jpg">
                                    @endif
                                    <h5 class="user-review-name">{{ $review->user->name }}</h5>
                                </div>

                            </div>
                        @endforeach
                    @endif




                    <!-- Button trigger modal -->
                    <button style="bottom:0;" type="button" class="btn btn-primary position-absolute"
                        data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Write a review <i class="bi bi-plus-lg"></i>
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 style="color: #000;" class="modal-title fs-5" id="exampleModalLabel">Write a review
                                        for {{ $movies->Movie_Title }}</h3>
                                    <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close"><i
                                            class="bi bi-x-lg"></i></button>
                                </div>
                                <div class="modal-body">
                                    <form id="reviewSubmit" method="post">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                        <input type="hidden" name="movie_id" value="{{ $movies->id }}">
                                        <div class="form-group">
                                            <label for="review_text">Review:</label>
                                            <textarea name="review" rows="5" id="review" class="form-control" required></textarea>
                                        </div>


                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Submit Review</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>





                <div class="col-lg-6 col-md-6 col-sm-12 ml-auto">


                    <h5 class="c-white">DETAILS</h3>
                        <div class="details-movie mt-4 py-3 d-flex flex-wrap">
                            <h5>DIRECTOR</h5>


                            <h6 class="position-absolute text-right">{{ $movies->Movie_Director }}</h6>
                        </div>
                        <div class="details-movie mt-4 py-3 d-flex flex-wrap">
                            <h5>Starring Actor(s)</h5>
                            <h6 class="position-absolute text-right">{{ $movies->Movie_Actors }}</h6>
                        </div>
                        <div class="details-movie mt-4 py-3 d-flex flex-wrap">
                            <h5>Release Year</h5>
                            <h6 class="position-absolute text-right">{{ $movies->Movie_Year }}</h6>
                        </div>
                        <div class="details-movie mt-4 py-3 d-flex flex-wrap">
                            <h5>Running Time</h5>
                            <h6 class="position-absolute text-right">{{ $movies->Movie_Runtime }}</h6>
                        </div>
                        <div class="details-movie mt-4 py-3 d-flex flex-wrap">
                            <h5>Genre</h5>
                            <h6 class="position-absolute text-right">{{ $movies->Movie_Genre }}</h6>

                        </div>
                        <div class="details-movie mt-4 py-3 d-flex flex-wrap">
                            <h5>Rating</h5>
                            <h6 class="position-absolute text-right">{{ $movies->Movie_Rating }}</h6>

                        </div>


                </div>
            </div>


            <div class="row pt-5">
                <div class="col-lg-5 col-md-5 col-sm-12">
                    <h5 class="heading-d ">DATE</h3>
                        <div class="splide pt-2" role="group" aria-label="Splide Basic HTML Example">
                            <div class="splide__track">
                                <ul id="date-select" class="splide__list" id="date-select">
                                    @foreach ($screening_dates_times as $screening)
                                        <li name="date" class="splide__slide text-center">
                                            <div id="date" class="date pt-1 py-2">

                                                <span class="movie-month"
                                                    data-date="{{ $screening['date'] }}">{{ $screening['date'] }}</span>

                                            </div>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 ml-auto">



                    <h5 class="heading-d ">Time</h5>
                    <div class="dropdownxd">

                        <select name="time" onChange="filterTheatres()" class="time-btn" id="time">


                            @foreach ($screening_dates_times as $screening)
                                <option class="time-btn-option" value="{{ $screening['time'] }}">
                                    {{ $screening['time'] }}</option>
                            @endforeach
                        </select>
                    </div>







                </div>
            </div>


            <div class="row pt-5">
                <div class="col-lg-5 col-md-10 col-sm-12 mr-auto">

                    <h5 class="heading-d ">Theatre</h5>

                    <div class="dropdownxd">

                        <select data-tid="{{ $screening['theatre']->id }}" name="" id="theatres"
                            class="time-btn">

                            @foreach ($screening_dates_times as $screening)
                                <option class="time-btn-option" value="{{ $screening['theatre']->id }}">
                                    {{ $screening['theatre']->name }}</option>
                            @endforeach

                        </select>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 ml-auto ticket-pricing">

                    <h5 class="heading-d">Ticket Pricing</h5>

                    <div class="details-movie mt-4 py-3 d-flex flex-wrap">
                        <h5>Normal</h5>
                        @foreach ($categories as $category)
                            <h6 class="position-absolute text-right">Rs. {{ $category->normal }}</h6>
                    </div>
                    <div class="details-movie mt-4 py-3 d-flex flex-wrap">
                        <h5>Deluxe</h5>
                        <h6 class="position-absolute text-right">Rs. {{ $category->deluxe }}</h6>
                    </div>
                    <div class="details-movie mt-4 py-3 d-flex flex-wrap">
                        <h5>Super</h5>
                        <h6 class="position-absolute text-right">Rs. {{ $category->super }}</h6>
                    </div>
                    @endforeach
                </div>
            </div>

            <div id="preloader">
                <div class="spinner"></div>
            </div>





            <div>
            </div>
    </div>
    <div class="container-lg-padding h-100">
        <div class="row s-name-row h-100">

            <div style="color: #fff;" class="col-6 ">
                <div class="seats-guide">

                    <div class="seats-show d-flex">

                        <div style="margin-left:0.75rem; width: 30px; height:20px;" class="normal-seat ">
                        </div>
                        <div style="width: 30px; height:20px;" class="deluxe-seat">
                            <div></div>
                        </div>
                        <div style="width: 30px; height:20px;" class="super-seat ">
                            <div></div>
                        </div>
                    </div>
                    <div class="d-flex seat-name">

                        <p class="normal">Normal</p>
                        <p class="deluxe">Deluxe</p>
                        <p class="super">Super</p>
                    </div>
                </div>
            </div>
            <div class="col-6">

                <div style="position: absolute; right: 0; top: 10px; gap: 20px;" class="d-flex">

                    <div style="width: 30px; height:20px;" class="sold-seat ">
                    </div>
                    <p>Sold</p>
                    <div style="width: 30px; height:20px;" class="normal-seat">
                    </div>
                    <p>Available</p>
                    <div style="width: 30px; height:20px;" class="selected-seat ">
                    </div>
                    <p>Selected</p>
                </div>
            </div>
        </div>

        <div class="w-100 h-100 theatre">
            <div class="screen">
                <div class="clip-path">
                </div>
                <h6 class="mx-auto">SCREEN THIS WAY</h6>
            </div>

            <div class="seats-section mb-5">

                {{-- Row 1 --}}
                <div class="d-flex row seats-row">
                    <h6 class="position-absolute row-number-left">A</h6>
                    <h6 class="position-absolute row-number-right">A</h6>
                    @foreach ($seats1 as $seat)
                        <div data-seat-id="{{ $seat->id }}" data-seat-name="{{ $seat->seat_number }}"
                            data-category-id="{{ $seat->category_id }}"
                            class="{{ $seat->available == 0 ? 'not-available' : $seat->getClass() . ' seat' }}">

                        </div>
                    @endforeach
                </div>
                {{-- Row 2 --}}


                <div class="d-flex row seats-row">
                    <h6 class="position-absolute row-number-left">B</h6>
                    <h6 class="position-absolute row-number-right">B</h6>
                    @foreach ($seats2 as $seat)
                        <div data-seat-id="{{ $seat->id }}" data-seat-name="{{ $seat->seat_number }}"
                            data-seat-name="{{ $seat->seat_number }}" data-category-id="{{ $seat->category_id }}"
                            class="{{ $seat->available == 0 ? 'not-available' : $seat->getClass() . ' seat' }}">

                        </div>
                    @endforeach
                </div>
                <div class="d-flex row-3 row seats-row">
                    <h6 class="position-absolute row-number-left">-</h6>
                    <h6 class="position-absolute row-number-right">-</h6>
                    <h6 style="color: #ff0d00;" id="error-message"></h6>
                </div>

                <div class="d-flex row seats-row ">
                    <h6 class="position-absolute row-number-left">C</h6>
                    <h6 class="position-absolute row-number-right">C</h6>
                    @foreach ($seats3 as $seat)
                        <div data-seat-id="{{ $seat->id }}" data-seat-name="{{ $seat->seat_number }}"
                            data-category-id="{{ $seat->category_id }}"
                            class="{{ $seat->available == 0 ? 'not-available' : $seat->getClass() . ' seat' }}">

                        </div>
                    @endforeach
                </div>
                <div class="d-flex row seats-row ">
                    <h6 class="position-absolute row-number-left">D</h6>
                    <h6 class="position-absolute row-number-right">D</h6>
                    @foreach ($seats4 as $seat)
                        <div data-seat-id="{{ $seat->id }}" data-seat-name="{{ $seat->seat_number }}"
                            data-category-id="{{ $seat->category_id }}"
                            class="{{ $seat->available == 0 ? 'not-available' : $seat->getClass() . ' seat' }}">

                        </div>
                    @endforeach
                </div>
                <div class="d-flex row seats-row">
                    <h6 class="position-absolute row-number-left">E</h6>
                    <h6 class="position-absolute row-number-right">E</h6>
                    @foreach ($seats5 as $seat)
                        <div data-seat-id="{{ $seat->id }}" data-seat-name="{{ $seat->seat_number }}"
                            data-category-id="{{ $seat->category_id }}"
                            class="{{ $seat->available == 0 ? 'not-available' : $seat->getClass() . ' seat' }}">

                        </div>
                    @endforeach
                </div>
                <div class="d-flex row seats-row">
                    <h6 class="position-absolute row-number-left">F</h6>
                    <h6 class="position-absolute row-number-right">F</h6>
                    @foreach ($seats6 as $seat)
                        <div data-seat-id="{{ $seat->id }}" data-seat-name="{{ $seat->seat_number }}"
                            data-category-id="{{ $seat->category_id }}"
                            class="{{ $seat->available == 0 ? 'not-available' : $seat->getClass() . ' seat' }}">

                        </div>
                    @endforeach
                </div>
                <div class="d-flex row seats-row pb-5">
                    <h6 class="position-absolute row-number-left">G</h6>
                    <h6 class="position-absolute row-number-right">G</h6>
                    @foreach ($seats7 as $seat)
                        <div data-seat-id="{{ $seat->id }}" data-seat-name="{{ $seat->seat_number }}"
                            data-category-id="{{ $seat->category_id }}"
                            class="{{ $seat->available == 0 ? 'not-available' : $seat->getClass() . ' seat' }}">
                        </div>
                    @endforeach
                </div>

            </div>







        </div>


    </div>
    </div>
    </div>



@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="/js/purchase.js"></script>
    <script src="/js/carousel.js"></script>
@endsection
@endsection
