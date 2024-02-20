@extends('layouts.layout')
@section('css')
    <link rel="stylesheet" href="css/home.css">
    <link rel="icon" href="/img/movieicon.png">

@endsection
@section('content')

    <title>The Showplace | Home</title>

    <style>
        .playbtn {
            color: #fff;
            position: absolute;
            margin: 19px 133px !important;
        }

        .userimg {
            top: 0 !important;
        }
        .alert-div {
            width: 100%;
            height: 31px;
            position: fixed;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #00ff2b;
            color: #000;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            bottom: 0;
            z-index: 20;
        }
    </style>


@if (session('success_message'))
<div id="alertAuth" class="alert-div" role="alert">
  {{ session('success_message') }}
</div>
@php
        session()->forget('success_message');
    @endphp
    @endif
    
    @auth
    @php
        session()->flash('success_message', 'Welcome ' . auth()->user()->name . '!');
    @endphp
@endauth


    @foreach ($movies as $index => $val)
        <div id="item" data-trailer="{{ $val->Movie_Trailer }}" data-index="{{ $index + 1 }}"
            data-runtime="{{ $val->Movie_Runtime }}" data-year="{{ $val->Movie_Year }}"
            data-director="{{ $val->Movie_Director }}" data-banner="{{ $val->Movie_Banner }}"
            data-trailerbtn="{{ $val->Movie_Banner }}" data-id="{{ $val->id }}" data-name="{{ $val->Movie_Title }}"
            data-description="{{ $val->Movie_Description }}">{{ $val->Movie_Name }}</div>
    @endforeach

 







    <div id="banner" class="banner"></div>

    <!-- Content -->
    <div class="my-container">


        <div class="movie-details">

            <h1 id="name" class="title"></h1>

            <div class="d-flex details">

                <div id="director" class="border">

                </div>
                <div id="year" class="border year">
                </div>
                <div id="runtime" class="border runtime">
                </div>
            </div>
        </div>
        <a id="M-Link" class="urlbook" href="">
            <div class="buyticket">Buy Ticket</div>
        </a>

        <div id="continent" class="content">

            <h3>WHAT'S ON THE SCREEN?</h3>

            <div class="outof5">

                <div id="index" class="prev"> <span id="index"></span> </div>
                <span class="slash">/</span>
                <div class="next"> <span>{{ $count }}</span></div>
            </div>
        </div>

        <div style="" class="sliderbtn">
            <div id="prev-button" class="sliderprev"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25 25">
                    <path style="fill:#fff"
                        d="M24 12.001H2.914l5.294-5.295-.707-.707L1 12.501l6.5 6.5.707-.707-5.293-5.293H24v-1z"
                        data-name="Left" />
                </svg></div>
            <div id="next-button" class="slidernext"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25 25">
                    <path style="fill:#fff"
                        d="M24 12.001H2.914l5.294-5.295-.707-.707L1 12.501l6.5 6.5.707-.707-5.293-5.293H24v-1z"
                        data-name="Left" />
                </svg></div>
        </div>






        <div style="right: 71px;" class="sliderbtn-right">
            <a id="myLink" class="urlbook" href="">
                <button class="ticketbtn">Buy Ticket</button>
            </a>
        </div>





        <div class="trailer">

            <div id="traileranimation" class="youtube-video">
                <div class="arrow-down"></div>
                <video class="ytvid" id="trailer"></video>

            </div>
            <div class="d-flex trailerani">

                <span class="trailer-arrow-bg"> <span></span></span>
                <p class="trailertitle" style="color: #fff;"> Trailer </p> <br>
            </div>
            <button id="trailerbtn" class="trailerbtn">
                <div class="ml-auto play-btn">

                    <i style="font-size: 23px" class="bi bi-play-fill"></i>
                </div>
            </button>
        </div>
    </div>
