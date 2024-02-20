@extends('adminpages.layout')
<title>Admin | Add on screen Movie</title>


@section('adminbody')



<div style="margin-top: 200px;" class="container">
  @if (session('message'))
      <div class="alert alert-success">{{ session('message') }}</div>
  @endif
        <h2 class="mt-5">Add On Screen Movies</h2>
        <form method="POST" action="{{ route('addonscreenmovie') }}" class="mt-5" enctype="multipart/form-data">
            @csrf
            <div class="row mb-4">
                <div class="col">
                    <div class="form-outline">
                        <input type="text" name="Movie_Title" id="form6Example1" class="form-control" required />
                        <label class="form-label" for="form6Example1">Movie Title</label>
                    </div>
                </div>

                <div class="col">
                    <div class="form-outline">
                        <input name="Movie_Genre" type="text" id="form6Example2" class="form-control" required />
                        <small id="emailHelp" class="form-text text-muted">E.g War/Drama</small>
                        <label class="form-label" for="form6Example2">Movie Genre</label>
                    </div>
                </div>


            </div>

            <div class="form-outline mb-4">
                <textarea class="form-control" name="Movie_Description" id="form6Example7" rows="4" required></textarea>
                <label class="form-label" for="form6Example7">Movie Description</label>
            </div>

            <div class="form-outline mb-4">
                <input type="text" name="Movie_Runtime" id="form6Example3" class="form-control" required />
                <small id="emailHelp" class="form-text text-muted">E.g 2hr 20min</small>
                <label class="form-label" for="form6Example3">Movie Runtime</label>
            </div>


            <div class="form-outline mb-4">
                <input name="Movie_Rating" type="text" id="form6Example4" class="form-control" required />
                <small id="emailHelp" class="form-text text-muted">E.g 7.2/10</small>
                <label class="form-label" for="form6Example4">Movie Rating</label>
            </div>

            <div class="form-outline mb-4">
                <input name="Movie_Director" type="text" id="form6Example4" class="form-control" required />
                <label class="form-label" for="form6Example4">Movie Director</label>
            </div>


            <div class="form-outline mb-4">
                <input name="Movie_Actors" type="text" id="form6Example4" class="form-control" required />
                <small id="emailHelp" class="form-text text-muted">E.g Christian Bale</small>
                <label class="form-label" for="form6Example4">Movie Actors</label>
                <strong>You can add the starring actor only if you want.</strong> <br>
            </div>

            <div class="form-outline mb-4">
                <input name="Movie_Year" type="number" id="form6Example4" class="form-control" required />
                <small id="emailHelp" class="form-text text-muted">E.g 2023</small>
                <label class="form-label" for="form6Example4">Movie Year</label>
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Movie Banner</label>
                <input class="form-control" name="bannerimg" type="file" id="bannerimg" required>
                <strong>Please ensure that the banner size exceeds 1920x1080 pixels.</strong> <br>

            </div>


            <div class="mb-3">
                <label for="formFile" class="form-label">Movie Poster/Cover</label>
                <input class="form-control" name="coverimg" type="file" id="coverimg" required>
            </div>

            <div class="mb-3">
                <label for="formFile" class="form-label">Movie Trailer</label>
                <input class="form-control" name="trailer" accept="video" type="file" required>
                <strong>Please upload trailers with a maximum size of 45 MB for the purpose of this project.</strong>
            </div>
            <div class="form-group ">
                <label for="screening_date">Ticket Prices</label>
                <input type="number" name="normalP" placeholder="Normal Seat Price"
                    class="form-control mt-2" required>
                <input type="number" name="deluxeP" placeholder="Deluxe Seat Price"
                    class="form-control mt-2" required>
                <input type="number" name="superP" placeholder="Super Seat Price"
                    class="form-control mt-2" required>
            </div>
            <div class="form-group ">
                <label for="screening_date">Screening Date</label>
                <input type="date" name="screening_date[]" min="<?php echo date('Y-m-d'); ?>"
                    class="form-control screening_date mt-2">
            </div>
            <div class="form-group">
                <label for="screening_time">Screening Time</label>
                <input type="time" name="screening_time[]" class="form-control screening_time mt-2">
            </div>

            <div class="form-group">
                <label for="theatre_id">Select Theatre</label>
                <select name="theatre_id[]" class="form-control theatre_id mt-2">
                    <option value="" selected>Select Theatre</option>
                    @foreach ($theatres as $theatre)
                        <option value="{{ $theatre->id }}">{{ $theatre->name }}</option>
                    @endforeach
                </select>
            </div>
            <strong class="mt-5">"When inserting a movie, you can only add one timing. However, you can edit the timings
                and add multiple timings in the admin dashboard."</strong>

            <input type="submit" value="Add Movie" class="btn btn-primary btn-block mt-4">
        </form>
    </div>
@endsection
