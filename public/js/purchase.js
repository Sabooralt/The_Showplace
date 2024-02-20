$(document).ready(function(){



    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
var selectedSeats = [];
    $(".seat").click(function() {
        var seat_id = $(this).data('seat-id');
        var seat_name = $(this).data('seat-name');
        var category_id = $(this).data('category-id');
        
        if ($(this).hasClass("selected-seat")) {
            $(this).removeClass("selected-seat");
            selectedSeats = selectedSeats.filter(function(seat) {
                return seat.id !== seat_id;
            });
        } else {
            
            $(this).addClass("selected-seat");
            selectedSeats.push({id: seat_id, name: seat_name, category: category_id});
        }

        
        if (selectedSeats.length > 6) {
            $("#error-message").text("You can only select a maximum of 6 seats at a time.");
            return;
        }else if(selectedSeats.length == 0){
            $('.seats-booking').css("bottom","-200px");
        }else if(selectedSeats.length > 0){
            $('.seats-booking').css("bottom",0);
        }
        // Update the selected seats display
        var seatsList = "";
        var seatsCount = selectedSeats.length;
        selectedSeats.forEach(function(seat) {
            seatsList += 
            `<button value='${seat.id}' style='background-color: #3592C9 !important; color:#fff;' class='btn seats-selected'>${seat.name}</button>`;
        });
        $("#selected-seats").html(seatsList);
        $("#seats-count").text(`(${seatsCount})`);

      

        $.ajax({
            type: "POST",
            url: "/updatePrice",
            data: { 
                seats: JSON.stringify(selectedSeats), 
                movie_id: $("#movie-id").val() 
            },
            success: function(data) {
 
                $("#normal-p").text('PKR.' + data.normalPrice);
                $("#deluxe-p").text('PKR.' + data.deluxePrice);
                $("#super-p").text('PKR.' + data.superPrice);
                $("#total-p").text(data.total);
            }
        });

    });
$("#purchase").on("click",function() {
        $('#preloader').show();
        $("body").css("overflow", "hidden");
    var seats = $(".seats-selected");
    var seatIds = [];
    for (var i = 0; i < seats.length; i++) {
        seatIds.push($(seats[i]).val());
    }
    var  seatsName = seats.text()

    var data = {
        seats: seatsName,
        seats_id: seatIds,
        theatre_id: $("#theatres").data('tid'),
        movie_id: $("#movie-id").val(),
        movie_banner: $("#movie-banner").val(),
        movie: $("#m-title").text(),
        theatre: $("#theatres").text(),
        date: $("#date").text(),
        time: $("#time").val(),
        total_price: $("#total-p").text(),
    };
    console.log(data)
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: "POST",
        url: "/send-email",
        data: data,
        success: function(response) {
                $('#preloader').hide();
                $("body").css("overflow", "auto");
            console.log(data)
            Swal.fire({
                title: data.movie,
                text: `Tickets have been successfully booked! \n Please refer to your email or bookings section for further information.`,
                
                imageUrl: data.movie_banner,
                imageWidth: 400,
                imageHeight: 200,
                imageAlt: data.movie,
              }).then(function () {
                window.location.href = '/redirectToHome?message=' + data.message;
            });
        }
    });
    

  });
})
$(document).on('click', '.seats-selected', function() {

  });
  