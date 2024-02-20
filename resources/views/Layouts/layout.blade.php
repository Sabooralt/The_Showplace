@extends('layouts.cdn')

@section('css')
    <link rel="icon" href="/img/movieicon.png">
@endsection
@section('body')
    @php
        use Illuminate\Support\Facades\Auth;
    @endphp

    <div id="preloader">
                <div class="spinner"></div>
            </div>

    <style>
     .spinner {
    position: relative;
    top: 32%;
    width: 40px;
    height: 40px;
    margin: 100px auto;
    border-radius: 100%;
    border: 3px solid #ddd;
    border-top-color: #3498db;
    animation: spin 1s ease-in-out infinite;
  }
  #preloader {
display: none;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(0, 0, 0, 0.432);
    z-index: 99999;
  }

      
    </style>
 

    <nav class="navbar-showplace">
        <div class="heading-box">

            <h1 class="heading">THE SHOWPLACE </h1>
            <i style="font-size:28px" class="bi bi-play-circle-fill playbtn"></i>
        </div>
        <ul class="nav-ul">

            <li><a href="/">Home</a></li>
            <li><a href="/movies">Movies</a></li>
            <li><a href="/movies#cs">Coming Soon</a></li>
            <li><a href="/theatres">Theatres</a></li>
        </ul>
        <div class="nav-responsive">

            <ul class="nav-r-ul ">
                <div class="cancel-btn ">
                    <i class="bi bi-x-lg"></i>
                </div>

                @if (Auth::check())
                    <button id="userdropdown-r" class="userdropdown">
                        <img class="userimg"
                            src="{{ Auth::user() && Auth::user()->profile_photo_path ? asset('storage/' . Auth::user()->profile_photo_path) : asset('avatar.jpg') }}"
                            alt="User Photo">
                        <p>{{ Auth::user()->name }}</p>
                        <div class="arrow"></div>
                    </button>
                    <div id="user-dropdown" class="u-dropdown">
                        <div class="d-flex">
                            <ul class="u-ul">
                                <li>
                                    <p>{{ Auth::user()->name }}</p>
                                </li>
                                <div style="height: 1px; background-color: rgba(255, 255, 255, 0.733);" class="w-100 mb-2">
                                </div>

                                <a href="/user/profile">
                                    <li class="pl-1">Account Settings <i class="bi bi-arrow-up-right-circle"></i></li>
                                </a>
                                <a href="/user/YourBookings">
                                    <li class="pl-1">Your Bookings <i class="bi bi-arrow-up-right-circle"></i></li>
                                </a>
                                <a href="#"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <li class="pl-1">Sign Out</li>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </ul>
                        </div>
                    </div>
                @endif

                <li><a href="/">Home</a></li>
                <li><a href="/movies">Movies</a></li>
                <li><a href="">Buy Tickets</a></li>
                <li><a href="">Request a Movie</a></li>

                <p class="pt-4">Built with passion by Saboor Ahmed using Laravel 8 and MySQL, this website aims to provide
                    a seamless and efficient movie booking experience. Proudly powered by cutting-edge technologies, My goal
                    is to enhance the way you book your favorite movies. <br> © 2023, All rights reserved.</p>

                <div class="socials py-4">
                    <a href="https://www.facebook.com/profile.php?id=100053190711596"> <i class="bi bi-facebook"></i></a>
                    <a href="https://www.instagram.com/saboorahmed26/"> <i class="bi bi-instagram"></i></a>
                    <a href="https://twitter.com/saboor_x"> <i class="bi bi-twitter"></i></a>
                </div>
                <div class="c-white pt-4">
                    <h6 style="margin: 0;"><i class="bi bi-c-circle"></i> THE SHOWPLACE</i></h6>
                    <p>theshowplacecinema@gmail.com</p>
                </div>
            </ul>
        </div>

        <div class="navelements ml-auto">

            <button class="btn list-btn"><i style="color:#fff; font-size:35px;" class="bi bi-list"></i></button>


            @if (Auth::check())
                <button id="userdropdown" class="userdropdown">
                    <img class="userimg"
                        src="{{ Auth::user() && Auth::user()->profile_photo_path ? asset('storage/' . Auth::user()->profile_photo_path) : asset('avatar.jpg') }}"
                        alt="User Photo">
                    <p>{{ Auth::user()->name }}</p>
                    <div class="arrow"></div>
                </button>
                <div id="user-dropdown" class="u-dropdown">
                    <div class="d-flex">
                        <ul class="u-ul">
                            <li>
                                <p>{{ Auth::user()->name }}</p>
                            </li>
                            <div style="height: 1px; background-color: rgba(255, 255, 255, 0.733);" class="w-100 mb-2">
                            </div>

                            <a href="/user/profile">
                                <li class="pl-1">Account Settings <i class="bi bi-arrow-up-right-circle"></i></li>
                            </a>
                            <a href="/user/YourBookings">
                                <li class="pl-1">Your Bookings <i class="bi bi-arrow-up-right-circle"></i></li>
                            </a>
                            <a href="#"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <li class="pl-1">Sign Out</li>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </ul>
                    </div>
                </div>
                
                
                @if(Auth::user()->is_admin == 1)
                <a href="/adminpanel">

                    <button class="btn admin-btn"><i class="bi bi-door-open"></i></button>
                    
                    
                </a>
                @endif
                @else
                <a href="/login"><button
                        style="top: 7px;color:#fff; background-color: #3592C9 !important;
      position: relative; padding:.375rem 1.5rem"
                        class="btn">Sign in</button></a>
        </div>
        
        @endif
    </nav>



    @yield('content')
@endsection
