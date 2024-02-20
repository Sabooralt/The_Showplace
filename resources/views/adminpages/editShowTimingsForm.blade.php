

@extends("adminpages.layout")

<title>Admin | Edit Show Timings</title>

@section("adminbody")


<meta name="csrf-token" content="{{ csrf_token() }}">

<style>
    #timings{
        padding: 3rem 0;
        
    }
    .timings-box{
        padding: 1rem;
        border: 2px solid #000;
        border: 2px solid #000;
        
    }
    .text-value{
        color: #000;
    }
    </style>


<div style="margin-top: 200px" class="container">

    
    <form action="" class="mt-5" method="post">
        @csrf
        <input type="hidden" name="movie_id" value="{{ $movie->id }}">
        
        <h5>Add/Update Show Timings For {{ $movie->Movie_Title }}</h5>
        <h6>Current Show Timings</h6>
        <p style="color: #000;" class="font-weight-normal c-black">Click on the date or timings text to edit. </p>
        <table class="table bordered">
            <thead class="thead-dark">
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Timinings</th>
                <th scope="col">Dates</th>
                <th scope="col">Theatre</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
   
            

        <tbody>
            @foreach($screening_dates_times as $screen)
      
            <tr>
                <th scope="row">{{ $screen['id'] }}</th>

                <td> <form action="" method="post">
                    @csrf
                    <span class="text-value">{{ $screen['time'] }}</span>
                    <input type="time" name="timeUpdate" class="input-field" value="{{ $screen['time'] }}" style="display:none;" required>
                </td>
                <td>
                    <span class="text-value">{{ $screen['date'] }}</span>
                    <input type="date" name="dateUpdate" class="input-field" value="{{ $screen['date'] }}" style="display:none;" required> </form>
                </td>
                <td>{{ $screen['theatre'] }}</td>
                <td><button class="btn btn-danger">Delete</button> <button type="submit" class="btn btn-info submit-btn text-value" value="{{$screen['id']}}">Update</button></td>
            </tr>
            @endforeach
          </tbody>

         
                 
           
           
 
          </table>
          
          
          
        </form>

        <form action="" method="POST">
            @csrf

            <input type="button" class="btn btn-info" id="add-btn" value="Add Timing">
            <a href="addTimings/{id}">
        </a>
      
        <div id="timings">
            <script>
                $(document).ready(function() {
  $("#add-btn").click(function() {
    var timeInput = $("<div class='form-group'> <label for='screening_date'>Screening Time</label> <input type='time' class='input-field' name='newtime[]' required> </div>");
    var dateInput = $("<div class='form-group'> <label for='screening_time'>Screening Date</label> <input type='date' class='input-field' name='newdate[]' required> </div>");
    var theatreInput = `<div class="form-group">
                  <label for="theatre_id">Select Theatre</label>
                  <select name="theatre_id[]" class="form-control theatrevalue mt-2">
                      <option value="" selected>Select Theatre</option>`;
              
                var theatreOptions = '';
                @foreach ($theatreNew as $theatre)
                  theatreOptions += `<option value="{{ $theatre->id }}">{{ $theatre->name }}</option>`;
                @endforeach
                
                theatreInput += theatreOptions + `</select>
                </div>`;

    var removeBtn = $("<button class='remove-btn btn btn-danger'>Remove</button>");
    removeBtn.click(function() {
      $(this).parent().remove();
    });
    var newTiming = $("<div class='timings-box'></div>");
    newTiming.append(timeInput, dateInput, theatreInput, removeBtn);
    $("#timings").append(newTiming);
  });
});

              </script>
                        
        </div>
        <button type="submit" id="timings-add-submit" class="btn btn-primary">Submit</button>
    </form>

</div>


@endsection
@section('js')
<script src="/js/addscreening.js"></script>
@endsection







