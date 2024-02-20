<h2>Booking Confirmation</h2>
<p>Dear {{ auth()->user()->name }},</p>
<p>Thank you for booking the seats. Here are the details of your booking:</p>
<p>Date: {{ $date }}</p>
<p>Time: {{ $time }}</p>
<p>Seats: {{ $seats }}</p>
<p>Total Price: {{ $total_price }}</p>
<p>Thank you for choosing us!</p>
