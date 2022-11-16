<?php
  // Placeholder bookings until DB inclusion
  $debug_booking_a = array('id'=>'AB38FG', 'type'=>'suite', 'begin'=>'18.09.2000', 'end'=>'23.09.2000', 'booked'=>'08.07.2000');
  $debug_booking_b = array('id'=>'99GD23', 'type'=>'double bedroom', 'begin'=>'24.10.2000', 'end'=>'30.10.2000', 'booked'=>'25.09.2000');
  $bookings = array($debug_booking_a, $debug_booking_b);
?>

<!-- current_booking.php start -->
<?php if(empty($bookings)): ?>
  <p>Noch keine Buchungen getätigt.</p>'
<?php else: ?>
  <table class="table">
    <thead>
      <th scope="col">Nr</th>
      <th scope="col">Details</th>
      <th scope="col"></th>
    </thead>
    <tbody>
      <?php foreach($bookings as $booking): ?>
        <tr>
          <th class="bottom_border_none" scope="row"><?php echo $booking['id'] ?></th>
          <td>Typ</td>
          <td><?php echo ucwords($booking['type']) ?></td>
        </tr>

        <tr>
          <td class="bottom_border_none"></td>
          <td>Anfang</td>
          <td><?php echo $booking['begin'] ?></td>
        </tr>

        <tr>
          <td class="bottom_border_none"></td>
          <td>Ende</td>
          <td><?php echo $booking['end'] ?></td>
        </tr>

        <tr>
          <td></td>
          <td>Gebucht</td>
          <td><?php echo $booking['booked'] ?></td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
<?php endif ?>
<!-- current_booking.php end -->