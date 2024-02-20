
$(document).ready(function(){

$('#toggle-admin').on('click',function(e) {
    e.preventDefault();
    var userId = $(this).data('user-id');
    $.ajax({
   url: '/update-admin-status'+userId,
   type: 'POST',
   headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
   contentType: false,
   processData: false,
   success: function(response) {
    if(confirm("Do you want to update the admin role for this user?")){

        if ((response.success)) {
            alert('Admin role updated successfully!');
            location.reload();
        }
       else {
           alert('Error updating admin role. Please try again.');
       }
    }
   }
});
});
});

















