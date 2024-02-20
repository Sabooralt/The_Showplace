@extends("adminpages.layout")

  <script>
    document.getElementByClassName("RsMovie").addClass('active')
    $(".RsMovie").addClass('active');
    $(".nav_link").removeClass('active');
  </script>

@section("adminbody")


<title>Admin | Add Coming Soon Movie</title>



<div style="margin-top: 200px;" class="container">


 
  
    @if (session('message'))
      <div class="alert alert-success">{{ session('message') }} <a href="/movies">View movie</a></div>
  @endif
    <h2 class="mt-5">Add Releasing Soon Movies</h2>
    <form method="POST" action="{{route('releasingsoon')}}" class="mt-5" enctype="multipart/form-data">
      @csrf 
  
        <div class="row mb-4">
            <div class="col">
                <div class="form-outline">
                    <input type="text"  name="title" id="form6Example1" class="form-control" required/>
                    <label class="form-label" for="form6Example1">Movie Title</label>
                </div>
            </div>

            <div class="col">
        <div class="form-outline">
          <input name="genre" type="text" id="form6Example2" class="form-control" required />
          <label class="form-label" for="form6Example2">Movie Genre</label>
        </div>
      </div>
            <!-- Message input -->
            
        </div>
        
        <div class="form-outline mb-4">
          <textarea class="form-control" name="description" id="form6Example7" rows="4" required></textarea>
          <label class="form-label" for="form6Example7">Movie Description</label>
        </div>
    <!-- Text input -->
  
  
    <div class="mb-3">
        <label for="formFile" class="form-label">Movie Banner</label>
        <input class="form-control" name="bannerimg" type="file" id="bannerimg" required>
      </div>


    <div class="mb-3">
        <label for="formFile" class="form-label">Movie Poster/Cover</label>
        <input class="form-control" name="coverimg" type="file" id="coverimg" required>
      </div>

    <div class="mb-3">
        <label for="formFile" class="form-label">Movie Trailer</label>
        <input class="form-control" name="trailer" accept="video" type="file" required>
      </div>
    <!-- Text input -->
    <!-- Text input -->
    <div class="form-outline mb-4">
      <input name="director" type="text" id="form6Example4" class="form-control" required/>
      <label class="form-label" for="form6Example4">Movie Director</label>
    </div>
    <!-- Text input -->
    
    <div class="form-outline mb-4">
      <input name="actors" type="text" id="form6Example4" class="form-control"  required />
      <label class="form-label" for="form6Example4">Movie Actors</label>
    </div>

    <div class="form-outline mb-4">
      <input name="releaseDate" type="text" id="form6Example4" class="form-control" required/>
      <label class="form-label" for="form6Example4">Release Date</label>
    </div>
    

 
    <button type="submit" class="btn btn-primary btn-block mb-4">Add Movie</button>
  </form>
</div>

































