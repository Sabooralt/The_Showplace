@extends("adminpages.layout")


@section("adminbody")

<title>Admin | Theatres</title>


<div style="margin: 200px 0" class="container-fluid">
<h1>Total Theatres: {{$theatres->count()}}</h1> <br>
    <div class="row">
      @foreach ($theatres as $theatre)
        <div class="col-lg-6 col-md-6 col-sm-12 mx-auto">
         
                    <h2>{{ $theatre->name }}</h2>
                    <h6>Location: {{ $theatre->location }}.</h6>
                    <h5>Seats Layout: {{ '"'.$theatre->seat_layout->name.'"'}}.</h5>
                    <h5>Total Movies Hosting: {{ '(' .$theatre->movie->count() .')' ?? 0}}.</h5>

                    <table class="table table-dark">
                      <thead>
                        <tr>
                          <th scope="col">Movie Id</th>
                          <th scope="col">Movie Poster</th>
                          <th scope="col">Movie Name</th>
                          <th scope="col">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($theatre->movie as $movie)
                        <tr>
                          <th scope="row">{{ $movie->id }}</th>
                          <td><img style="border-radius: 10px; object-fit:contain" width="70px" height="90px" src="/movie-cover-img/{{$movie->Movie_Cover}}" alt=""></td>
                          <td>{{ $movie->Movie_Title }}</td>
                          <td><button class="btn btn-danger" onclick="deleteRsMovie({{ $movie->id }})" >Delete</button></td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                        <td>
                         
                        </td>
                    </tr>
                    
                    
                  </div>
                  @endforeach
    </div>
</div>











@endsection