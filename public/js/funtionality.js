







$(document).ready(function() {
  $("#alertAuth").delay(4000).slideUp();
  $('#reviewSubmit').on("submit",function(e){
    e.preventDefault();
    $.ajax({
      type: 'POST',
      url: '/reviews',
      data: $(this).serialize(),
      success: function(data) {
        Swal.fire(
          'Thank you for submitting your review!',
          'Your thoughts and opinions on the movie are valuable to us and we appreciate your contribution.',
          'success'
        ).then(function(){
            $('#exampleModal').modal('hide');
            $('#reviews-section').html(data);
        })
      }
    });

})

// Preloader For EveryPage

document.onreadystatechange = function () {
  var state = document.readyState
  if (state == 'complete') {
    $('body').css({"overflow":"auto"})
  $('#preloader').delay(250).fadeOut('slow');
  $('body').show();

}
}


// Preloader For EveryPage End


// Admin Navbar
$("#header-toggle").on("click",function(){
  $(".header").toggleClass('body-pd')
  $(".l-navbar").toggleClass('show')
  $(".bx-menu").toggleClass('bx-x')
  $("body").toggleClass('body-pd')
})


// Admin Navbar End



// Timings Add

$("#timings-add-submit").on("click",function(e) {
  e.preventDefault();
  var dates = [];
  $("input[name='newdate[]']").each(function() {
    dates.push($(this).val());
  });
  var times = [];
  $("input[name='newtime[]']").each(function() {
    times.push($(this).val());
  });
  var movie_id = $("input[name='movie_id']").val();
  var theatre_id = [];
      $(".theatrevalue").each(function() {
        theatre_id.push($(this).val());
      });
      
      $.ajax({
        type: "POST",
        url: "/addTimings",
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: {
          theatre_id:  theatre_id,
          movie_id: movie_id, 
          dates: dates,
          times: times ,
        },
        success: function(data) {
          alert("timings added successfully")
        }
      });
    });
    
    // Timings Add End

    // User Dropdown
    
    var userd = $(".u-dropdown");

    userd.hide()
    
    $("#userdropdown").on("click", function(){
      $(userd).slideToggle();
      $(".arrow").toggleClass("transform");
    });
    
    $(document).on("click", function(event){
      if (!$(event.target).closest("#userdropdown").length && !$(event.target).closest(".u-dropdown").length) {
        userd.slideUp();
        $(".arrow").removeClass("transform");
      }
    });
    
    $("#userdropdown-r").on("click", function(){
      $(".arrow").toggleClass("transform");
    });
    

  // User Dropdown End

  // Nav Responsive
  
  $('.list-btn').on("click",function(){
    
    $('.nav-r-ul').css("right",0);
    
  })
  $('.cancel-btn').on("click",function(){
    $(userd).slideUp()
    
    $('.nav-r-ul').css("right","-522px");
  })
  
  if ( $(window).width() <= 610 ) {
    $(userd).slideToggle()
  
    $(this).css({"display":"none"});
  }
  
  
  // Nav Responsive End
  

  $('.text-value').click(function() {
    $(this).hide();
    $(this).siblings('.input-field').show();
    $(this).siblings('.submit-btn').show();
  });
  
  $('.submit-btn').click(function(e) {
    e.preventDefault();
    var screening_id = $(this).val();
    var updated_screening_date = $(this).siblings('.input-field').val();
    $(this).siblings('.input-field').hide();
    $(this).siblings('.text-value').text(updated_screening_date).show();

    // Make AJAX request to update the screening date
    $.ajax({
      type: 'POST',
      url: '/updateShowTimings/'+screening_id,
      data: {
        'screening_id': screening_id,
        date: $("input[name='dateUpdate']").val(),
        time: $("input[name='timeUpdate']").val(),
      },
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      success: function(response) {
        alert("Timings Updated Successfully!")
        $('.text-value').text(inputValue).show();
        $('.input-field').hide();

      }
    });
    
    
    
  });
var splide = new Splide( '.splide', {
    perPage: 3,
    type   : 'loop',
    dots : false,
    focus  : 'center',
    rewind: true,
    updateOnMove: true,
    updateOnMove: true,
    pagination:false,
  } );
  
  $("#time").on("change", function() {
    var selectedTime = $(this).val();
    updateTheatres(selectedTime);
});

$("#date-select .splide__slide").on("click", function() {
    var selectedDate = $(this).data('date');
    updateTheatres(null, selectedDate);
});

function updateTheatres(selectedTime, selectedDate) {
    $.ajax({
      url: '/filter-data',
      data: { date: selectedDate, time: selectedTime },
      success: function(data) {
        $("#theatres").empty();
        $.each(data, function(i, item) {
          $("#theatres").append($('<option>', {
            value: item.theatre.id,
            text: item.theatre.name
          }));
        });
      }
    });
}




    

});


//Ajax Requests


$(document).ready(function() {
  // Listen for changes on the date and time select elements
  $('#date-select').on('change', function() {
    filterTheatres();
  });
  $('#time-select').on('change', function() {
    filterTheatres();
  });

  function filterTheatres() {
    var date = $('#date-select').val();
    var time = $('#time-select').val();
    // Make the AJAX request to the server
    $.ajax({
      method: 'POST',
      url: '/theatres/filter',
      data: {
        date: date,
        time: time
      },
      success: function(response) {
        // Handle the response from the server
        // For example, update a div with the filtered theatres
        $('#theatres-list').html(response);
      }
    });
  }
});

// DeleteMovie
function deleteMovie(id) {
  if (confirm('Remember all the screening and timings of the movie will be deleted too. \n Are you sure you want to delete this movie?')) {
    $.ajax({
      url: '/delete-movie/' + id,
      type: 'DELETE',
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      success: function(response) {
        console.log(response);
        if (response.success) {
          $('#movie-' + id).remove();
          alert("movie deleted successfully")
        } else if(response.error) {
          alert(response.error);
        } else {
          alert('Error deleting movie. Please try again.');
        }
      }
      
          });
              }
            }
function deleteRsMovie(id) {
  if (confirm('Are you sure you want to delete this movie?')) {
    $.ajax({
      url: '/delete-rsmovie/' + id,
      type: 'DELETE',
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      success: function(response) {
        console.log(response);
        if (response.success) {
          $('#rsmovie-' + id).remove();
          alert("movie deleted successfully")
        } else if(response.error) {
          alert(response.error);
        } else {
          alert('Error deleting movie. Please try again.');
        }
      }
      
          });
              }
            }

   
            
// Confirm Ticket Purchase
