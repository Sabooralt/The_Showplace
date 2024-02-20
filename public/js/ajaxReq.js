

$(document).ready(function() {
    $('#edit-movie-form').on("submit",function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: '/edit-movie-submit/'+$('input[name=movie_id]').val(),
            type: 'PUT',
            data: formData,
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.success) {
                    alert('Movie updated successfully!');
                } else {
                    alert('Error updating movie. Please try again.');
                }
            }
        });
    });
    
  });
  
  
  