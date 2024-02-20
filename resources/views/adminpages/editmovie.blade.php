@extends("layouts.cdn")

@section("css")
<link rel="stylesheet" href="/css/admin/admin.css">
@endsection

@section("body")

<title>Admin | Edit Movie</title>



       


<div class="container mt-5">
  

  <a href="/adminpanel/insertReleasingSoonMovie"><h6>Insert Releasing Soon Movie </h6></a>
 
 <a href="/"><h4><< Back</h4></a>
    
    <h2 id="hide" class="mt-5">Edit Movie</h2>
    <form method="POST"  id="edit-movie-form" class="mt-5" enctype="multipart/form-data">
        <!-- 2 column grid layout with text inputs for the first and last names -->
        @csrf
        @method('PUT')
        <input type="hidden" name="movie_id" value="{{$movie->id}}">
        <div class="row mb-4">
            <div class="col">   
                <div class="form-outline">
                    <input type="text"  name="Movie_Title" id="form6Example1" value="{{$movie->Movie_Title}}" class="form-control" />
                    <label class="form-label" for="form6Example1">Movie Title</label>
                </div>
            </div>

            <div class="col">
        <div class="form-outline">
          <input name="Movie_Genre" type="text" id="form6Example2" value="{{$movie->Movie_Genre}}" class="form-control"  />
          <label class="form-label" for="form6Example2">Movie Genre</label>
        </div>
      </div>
            <!-- Message input -->
            
        </div>
        
        <div class="form-outline mb-4">
          <textarea class="form-control" name="Movie_Description" id="form6Example7" value="{{$movie->Movie_Description}}" rows="4" >{{$movie->Movie_Description}}</textarea>
          <label class="form-label" for="form6Example7">Movie Description</label>
        </div>
    <!-- Text input -->
    <div class="form-outline mb-4">
      <input type="text" name="Movie_Runtime" id="form6Example3" value="{{$movie->Movie_Runtime}}" class="form-control" />
      <label class="form-label" for="form6Example3">Movie Runtime</label>
    </div>
  
  
    <div class="mb-3">
        <label for="formFile" class="form-label">Movie Banner</label>
        <input class="form-control" name="bannerimg" type="file" id="bannerimg" >
      </div>


    <div class="mb-3">
        <label for="formFile" class="form-label">Movie Poster/Cover</label>
        <input class="form-control" name="coverimg" type="file" id="coverimg" >
      </div>

    <div class="mb-3">
        <label for="formFile" class="form-label">Movie Trailer</label>
        <input class="form-control" name="trailer" accept="video" type="file" >
      </div>
    <!-- Text input -->
    <div class="form-outline mb-4">
      <input name="Movie_Rating" type="text" id="form6Example4" value="{{$movie->Movie_Rating}}" class="form-control"  />
      <label class="form-label" for="form6Example4">Movie Rating</label>
    </div>
    <!-- Text input -->
    <div class="form-outline mb-4">
      <input name="Movie_Director" type="text" id="form6Example4" value="{{$movie->Movie_Director}}" class="form-control" />
      <label class="form-label" for="form6Example4">Movie Director</label>
    </div>
    <!-- Text input -->
    
    <div class="form-outline mb-4">
      <input name="Movie_Actors" type="text" id="form6Example4" value="{{$movie->Movie_Actors}}" class="form-control"   />
      <label class="form-label" for="form6Example4">Movie Actors</label>
    </div>

    <div class="form-outline mb-4">
      <input name="Movie_Year" type="text" id="form6Example4" value="{{$movie->Movie_Year}}" class="form-control" />
      <label class="form-label" for="form6Example4">Movie Year</label>
    </div>

   
  
    

 
    <button type="submit"  class="btn btn-info btn-block mt-4">Save Changes</button>
  </form>
</div>






@section('js')
<script src="/js/ajaxReq.js"></script>

@endsection


























