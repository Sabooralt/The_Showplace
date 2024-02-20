$(document).ready(function() {
    var screening_time = $('.screening_time').last().clone();
    var screening_date = $('.screening_date').last().clone();
    var theatre_id = $('.theatre_id').last().clone();
    $('#addDate').click(function() {
        screening_date.val('');
        $('.screening_date').parent().append(screening_date);
        $('.screening_date').addClass('mt-2')

    });
    $('#addTiming').click(function() {
        screening_time.val('');
        $('.screening_time').parent().append(screening_time);
    });
    $('#addTheatre').click(function() {
        theatre_id.val('');
        $('.theatre_id').parent().append(theatre_id);
    });

});
$(document).ready(function(){
    $("#submit-form").click(function(){
        var theatre = $(".theatre_select").val();
        var date = $(".screening_date").val();
        var time = $(".screening_time").val();
        $("#form-message").append("You have chosen theatre: " + theatre + " for date: " + date + " at time: " + time);
    });
});