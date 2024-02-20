/*  var playt = document.getElementById('movie-trailer-play');
 playt.hide();
 $("#playtrailerbhai").on("click",function(){
  playt.requestFullscreen();
 }) */


/* $(document).ready(function(){

    $(".onscreen-m").on("mouseenter",function(){

        $(".hoverimg").css({"transform": "scale(1.2)","opacity": 0.8})
        
        
    });
        

}); */
$(".onscreen-m").on("mouseenter",function(){
    $(this).find('.hover-details').show()
    $(this).find('.hoverimg').css({"opacity":"0.7"})

})
$(".onscreen-m").on("mouseleave",function(){
    $(this).find('.hover-details').hide()
    $(this).find('.hoverimg').css({"opacity":"1"})
});

