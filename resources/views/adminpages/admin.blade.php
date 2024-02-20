@extends('adminpages.layout')


@section('adminbody')
    <title>Admin | Dashboard</title>


    <style>
        body{
            scroll-padding-top: 500px;
        }
        .table-of-c {
            background-color: #000000be !important;
            color: #fff;
        }

        .btn-group {
            position: fixed;
            top: 64px;
        }
        .btn-group > .btn{
            background-color: #000000be !important;
            color: #fff;
        }
        .dropdown-item{
            background-color: #000000d3;
            color: #fff;
        }
        .dropdown-menu{
            padding: 0;
        }
    </style>

    <!-- Example single danger button -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>



    <!--Container Main start-->


    <div style="margin-top: 200px; padding-right:6rem;" class="container">
        <div class="btn-group w-100 table-of-c">
            <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                Table Of Contents
            </button>
            <div style="width: 89%" class="dropdown-menu dropdown-menu-end">
                <a href="#onscreen"><button class="dropdown-item" type="button">On Screen Movies</button> </a>
                <a href="#rsmovie"><button class="dropdown-item" type="button">Releasing Soon Movies</button> </a>
                <a href="#theatres_link"> <button class="dropdown-item" type="button">Manage Theatres</button> </a>
                <a href="#managereviews"> <button class="dropdown-item" type="button">Manage Reviews</button> </a>
                <a href="#users"> <button class="dropdown-item" type="button">Manage Users</button> </a>
            </div>
        </div>

        <h3 style="text-transform: uppercase">On Screen Movies</h3>

        <table id="onscreen" style="border-radius: 20px; border:1px solid #867e7e" class="table table-sm ">
            <thead>
                <tr>
                    <th style="border-radius: 20px" scope="col">Id</th>
                    <th scope="col">Poster</th>
                    <th scope="col">Name</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($movie as $movies)
                    <tr id="movie-{{ $movies->id }}">
                        <th scope="row">{{ $movies->id }}</th>
                        <td><img style="border-radius: 10px; object-fit:contain" width="70px" height="90px"
                                src="/movie-cover-img/{{ $movies->Movie_Cover }}" alt=""></td>
                        <td>{{ $movies->Movie_Title }}</td>

                        <td>
                            <button class="btn btn-danger" onclick="deleteMovie({{ $movies->id }})">Delete</button>
                            <a href="/edit-movie/{{ $movies->id }}">

                                <button class="btn btn-primary ">Edit Movie</button>
                            </a>
                            <a href="/edit-show-timings/{{ $movies->id }}">
                                <button class="btn btn-info">Edit Timings</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <h3 id="rsmovie" style="text-transform: uppercase" class="mt-5">Coming Soon Movies</h3>
        <table style="border-radius: 20px; border:1px solid #867e7e" class="table table-sm ">
            <thead>
                <tr>
                    <th style="border-radius: 20px" scope="col">Id</th>
                    <th scope="col">Poster</th>
                    <th scope="col">Name</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rsMovie as $movies)
                    <tr id="movie-{{ $movies->id }}">
                        <th scope="row">{{ $movies->id }}</th>
                        <td><img style="border-radius: 10px; object-fit:contain" width="70px" height="90px"
                                src="/movie-cover-img/{{ $movies->cover }}" alt=""></td>
                        <td>{{ $movies->title }}</td>

                        <td>
                            <button class="btn btn-danger" onclick="deleteRsMovie({{ $movies->id }})">Delete</button>
                            <a href="/edit-movie/{{ $movies->id }}">

                                <button class="btn btn-primary ">Edit Movie</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <h3 id="theatres_link" style="text-transform: uppercase" class="mt-5">Theatres</h3>

        <table style="border-radius: 20px; border:1px solid #867e7e" class="table table-sm ">
            <thead>
                <tr>
                    <th style="border-radius: 20px" scope="col">Theatre_Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Location</th>
                    <th scope="col">Layout_id</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($theatres as $theatre)
                    <th scope="row">{{ $theatre->id }}</th>
                    <td>{{ $theatre->name }}</td>
                    <td>{{ $theatre->location }}</td>
                    <td>{{ $theatre->layout_id }}</td>

                    <td>
                        <button class="btn btn-danger" onclick="deleteMovie({{ $theatre->id }})">Delete</button>

                    </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <h3 id="managereviews" class="mt-5">Reviews</h3>
        <h6>Total Reviews: {{ count($reviews) }}</h6>
        <table style="border-radius: 20px; border:1px solid #867e7e" class="table table-sm ">
            <thead>
                <tr>
                    <th style="border-radius: 20px" scope="col">User_Id</th>
                    <th scope="col">UserName</th>
                    <th scope="col">Movie_Id</th>
                    <th scope="col">Actual Review</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reviews as $review)
                    <th scope="row">{{ $review->user->id }}</th>
                    <td>{{ $review->user->name }}</td>
                    <td>{{ $review->movie_id}}</td>
                    <td>{{ $review->review}}</td>
                    <td>
                        <button class="btn btn-danger" onclick="deleteMovie({{ $review->id }})">Delete</button>

                    </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <h3 id="users" class="mt-5">Users</h3>
        <h6>Total Users Registered : {{ $userCount }}</h6>
        <table style="border-radius: 20px; border:1px solid #867e7e" class="table table-sm ">
            <thead>
                <tr>
                    <th style="border-radius: 20px" scope="col">User_Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Profile Photo</th>
                    <th scope="col">Is_Admin</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td><img style="border-radius: 10px; object-fit:contain" width="40px" height="40px"
                            src="{{ $user->profile_photo_path ? asset('storage/' . $user->profile_photo_path) : '/avatar.jpg' }}"
                            alt="Image"></td>
                            <td class="is_admin"> {{ $user->is_admin == 1 ? "True" : "False" }} </td>


                    <td>
                        <button class="btn btn-danger" onclick="deleteMovie({{ $user->id }})">Delete</button>

                        <button id="toggle-admin" class="btn btn-primary" data-user-id="{{ $user->id }}">Toggle Admin Role</button>

                    </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <script>
       
        </script>




    </div>
@endsection
