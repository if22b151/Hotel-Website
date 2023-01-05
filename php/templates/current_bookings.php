<?php 
// For this page to be loaded, $bookings must already be present from scripts/booking_logic.php 

$DATE_FORMAT = 'd.m.Y';
?>


<!-- current_booking.php start -->
<?php if(empty($bookings)): ?>
  <p>Noch keine Buchungen getätigt.</p>
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
          <th class="bottom_border_none" scope="row"><?='#'.$booking['bookingid'] ?></th>
          <td>Typ</td>
          <td><?php 
            switch($booking['fk_roomtypeid']){
              case 1: echo 'Suite'; break;
              case 2: echo 'Double Bedroom'; break;
              case 3: echo 'Single Bedroom'; break;
            } 
            ?></td>
        </tr>

        <tr>
          <td class="bottom_border_none"></td>
          <td>Anfang</td>
          <td><?=date($DATE_FORMAT, $booking['arrive_day'])?></td>
        </tr>

        <tr>
          <td class="bottom_border_none"></td>
          <td>Ende</td>
          <td><?=date($DATE_FORMAT, $booking['depart_day'])?></td>
        </tr>

        <tr>
          <td class="bottom_border_none"></td>
          <td>Gebucht</td>
          <td><?=date($DATE_FORMAT, $booking['reservation_date'])?></td>
        </tr>

        <tr>
          <td></td>
          <td>Status</td>
          <td><?=$booking['status'] ?></td>
        </tr>


      <?php endforeach ?>
    </tbody>
  </table>
<?php endif ?>
<!-- current_booking.php end -->