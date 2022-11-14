<?php
  function generate_booking_row($booking){
    // Booking must be named array with id, type, begin, end & booked variables
    $html = 
    '<tr>
      <th class="bottom_border_none" scope="row">
        '. $booking['id'] .'
      </th>
      <td>Typ</td>
      <td>'. ucwords($booking['type']) .'</td>
    </tr>
    <tr>
      <td class="bottom_border_none"></td>
      <td>Anfang</td>
      <td>'. $booking['begin'] .'</td>
    </tr>
    <tr>
      <td class="bottom_border_none"></td>
      <td>Ende</td>
      <td>'. $booking['end'] .'</td>
    </tr>
    <tr>
      <td></td>
      <td>Gebucht</td>
      <td>'. $booking['booked'] .'</td>
    </tr>';

    return $html;
  }

  // Placeholder bookings until DB inclusion
  $debug_booking_a = array('id'=>'AB38FG', 'type'=>'suite', 'begin'=>'18.09.2000', 'end'=>'23.09.2000', 'booked'=>'08.07.2000');
  $debug_booking_b = array('id'=>'99GD23', 'type'=>'double bedroom', 'begin'=>'24.10.2000', 'end'=>'30.10.2000', 'booked'=>'25.09.2000');
  $bookings = array($debug_booking_a, $debug_booking_b);


  // Abort inclusion of below table if no bookings
  if(empty($bookings)){
    echo '<p>Noch keine Buchungen getätigt.</p>';
    return;
  }
?>

<table class="table">
  <thead>
    <th scope="col">Nr</th>
    <th scope="col">Details</th>
    <th scope="col"></th>
  </thead>
  <tbody>
    <?php
    foreach($bookings as $booking){
      echo generate_booking_row($booking);
    }
    ?>
  </tbody>
</table>