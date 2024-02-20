



$(document).ready(function() {
    // Get the first item
    let currentItem = $('#item').first();
    let count = $("#count").attr("data-count");
    let counter = 1;
    let index = $('#index').attr("data-index");
    let imgsrc = '/movie-banner-img/';
    let vidsrc = '/movie-trailers/';
    let video = $('#trailer');
    let id = currentItem.data("id");
    let mylink = $("#myLink");
    mylink.attr("href", "/bookticket/"+id);
    let Mlink = $("#M-Link");
    Mlink.attr("href", "/bookticket/"+id);


    // Update the values

    $('#banner').css('background', 'linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(' + imgsrc + currentItem.data('banner') + ')');
    $('#trailerbtn').css('background', 'linear-gradient(rgba(0, 0, 0, 0.2),rgba(0, 0, 0, 0.5)), url(' + imgsrc + currentItem.data('trailerbtn') + ')');
    $('#count').text(currentItem.data('count'));
    $("#myLink").attr("href", "/bookticket/"+id);
    video.attr("src", vidsrc + currentItem.data("trailer"));
    $('#index').text(currentItem.data('index'));
    $('#name').text(currentItem.data('name'));
    $('#runtime').text(currentItem.data('runtime'));
    $('#year').text(currentItem.data('year'));
    $('#director').text(currentItem.data('director'));
    $('#description').text(currentItem.data('description'));
  
    // Handle the click event for the "Prev" button
    $('#prev-button').click(function() {

      // Get the previous item
      let prevItem = currentItem.prev();

      index = prevItem.data('index');
      if (count == index) {
        prevItem = $('#item').last();
        console.log(count + `this is index ${index}`)
        
      }
      currentItem = prevItem;
      $('#banner').fadeOut(function() {
        
        $(this).css('background', 'linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(' + imgsrc + currentItem.data('banner') + ')').fadeIn();
      });
      $('#trailerbtn').fadeOut(function() {

        $(this).css('background', 'linear-gradient(rgba(0, 0, 0, 0.2),rgba(0, 0, 0, 0.5)), url(' + imgsrc + currentItem.data('trailerbtn') + ')').fadeIn();
      });
      $('#name').slideUp(function() {
        $(this).text(currentItem.data('name')).slideDown("fast");
      });
      video.attr("src", vidsrc + currentItem.data("trailer"));


      
      var prevId = currentItem.data("id");
      mylink.attr("href", "/bookticket/"+prevId);
      Mlink.attr("href", "/bookticket/"+prevId);
      $('#index').text(currentItem.data('index'));
      $('#count').text(currentItem.data('count'));
      $('#runtime').text(currentItem.data('runtime'));
      $('#year').text(currentItem.data('year'));
      $('#director').text(currentItem.data('director'));
      $('#description').text(currentItem.data('description'));
      
    });
  
    $('#next-button').click(function() {
      // Get the next item
      var nextItem = currentItem.next();
  
      // If there is no next item, go back to the first item

      if (count == counter) {
         nextItem = $('#item').first();
        counter=0;
      }
  
      // Update the current item and update the values
      currentItem = nextItem;
      $('#banner').fadeOut(function() {
        $(this).css('background', 'linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(' + imgsrc + currentItem.data('banner') + ')').fadeIn();
      });
      $('#trailerbtn').fadeOut(function() {

        $(this).css('background', 'linear-gradient(rgba(0, 0, 0, 0.2),rgba(0, 0, 0, 0.5)), url(' + imgsrc + currentItem.data('trailerbtn') + ')').fadeIn();
      });
      $('#name').slideUp(function() {
        $(this).text(currentItem.data('name')).slideDown("fast");
      });
      video.attr("src", vidsrc + currentItem.data("trailer"));

      var nextId = currentItem.data("id");
      mylink.attr("href", "/bookticket/"+nextId);
      Mlink.attr("href", "/bookticket/"+nextId);
      $('#index').text(currentItem.data('index'));
      $('#count').text(currentItem.data('count'));
      $('#runtime').text(currentItem.data('runtime'));
      $('#year').text(currentItem.data('year'));
      $('#director').text(currentItem.data('director'));
      $('#description').text(currentItem.data('description'));
      counter++;
    });
    
 var traileran = $('#traileranimation');
var play = document.getElementById('trailer');
    traileran.hide();
    $('.trailer').on('mouseenter',function(){
      
      traileran.slideDown();
      play.play();
    }
    );
    $('.trailer').on('mouseleave',function(){
      
      traileran.slideUp();
      play.pause();
    }
    );
    $('.trailerbtn').on('click',function(){
      play.muted = !play.muted;
      play.requestFullscreen();
    })
    $(play).on('click',function(){
      play.muted = !play.muted;
      play.requestFullscreen();
    })

    $("#bt-fullscreen").on("click",function(){
      $(this).requestFullscreen();
    })

   
  });
 
