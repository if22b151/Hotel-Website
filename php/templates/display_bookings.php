<?php 
// For this page to be loaded, a valid $bookings variable must already be present
// See scripts/booking_logic.php 

$DATE_FORMAT = 'd.m.Y';
?>

<div class="accordion mt-2" id="accordionPanelsStayOpen">

  <?php
  foreach($bookings as $booking): 
    $id = $booking['bookingid'];
    
    switch($booking['status']){
      case 0: $status = 'Neu'; break;
      case 1: $status = 'Bestätigt'; break;
      case 2: $status = 'Storniert'; break;
    }
    
    switch($booking['fk_roomtypeid']){
      case 1: $roomtype = 'Suite'; break;
      case 2: $roomtype = 'Doppelbett'; break;
      case 3: $roomtype = 'Einzelbett'; break;
    } 
    
    // Get selected options
    $options = array();

    $sql = 'SELECT `name` 
            FROM booking_options JOIN options ON fk_optionsid = optionsid
            WHERE fk_bookingid = '.$id;
    $results = $db->query($sql)->fetch_all();
    
    foreach($results as $result){
      array_push($options, $result[0]);
    }
  ?>            


  <div class="accordion-item">
    <div class="accordion-header" id="panelsStayOpen-heading<?=$id?>">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse<?=$id?>" aria-expanded="false" aria-controls="panelsStayOpen-collapse<?=$id?>">
        <div class="row" style="width: 100%; color: black; font-weight: normal;">

          <div class="col-6 col-sm-4 col-lg-1 mt-lg-0 accordion-title">
            <label class="d-block d-lg-none text-center" for="bookingid"><b>Nummer</b></label>
            <span class="d-block text-center" id="bookingid"> <?=$booking['bookingid']?> </span>
          </div>
          <div class="col-6 col-sm-4 col-lg-2 mt-lg-0 accordion-title">
            <label class="d-block d-lg-none text-center" for="status"><b>Status</b></label>
            <span class="d-block text-center" id="status"> <?=$status?> </span>
          </div>
          <div class="col-6 col-sm-4 col-lg-2 mt-3 mt-sm-0 accordion-title">
            <label class="d-block d-lg-none text-center" for="lastname"><b>Typ</b></label>
            <span class="d-block text-center" id="lastname"> <?=$roomtype?> </span>
          </div>
          <div class="col-6 col-sm-4 col-lg-2 mt-3 mt-lg-0 accordion-title">
            <label class="d-block d-lg-none text-center" for="booked"><b>Gebucht</b></label>
            <span class="d-block text-center" id="booked"> <?=date($DATE_FORMAT, $booking['reservation_date'])?> </span>
          </div>
          <div class="col-6 col-sm-4 col-lg-2 mt-3 mt-lg-0 accordion-title">
            <label class="d-block d-lg-none text-center" for="start_date"><b>Anfang</b></label>
            <span class="d-block text-center" id="start_date"> <?=date($DATE_FORMAT, $booking['arrive_day'])?> </span>
          </div>
          <div class="col-6 col-sm-4 col-lg-2 mt-3 mt-lg-0">
            <label class="d-block d-lg-none text-center" for="end_date"><b>Ende</b></label>
            <span class="d-block text-center" id="end_date"> <?=date($DATE_FORMAT, $booking['depart_day']) ?> </span>
          </div>

        </div>
      </button>
    </div>
    <div id="panelsStayOpen-collapse<?=$id?>" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-heading<?=$id?>">
      <div class="accordion-body col-md-8">

        <table class="table">
          <tbody>


            <tr>
              <td>Vorname</td>
              <td> <?=$booking['firstname']?> </td>
            </tr>
            <tr>
              <td>Nachname</td>
              <td> <?=$booking['lastname']?> </td>
            </tr>
            <tr>
              <td>Addresse</td>
              <td> <?=$booking['address'] . '<br>' . $booking['plz'] . ', ' . $booking['country']?> </td>
            </tr>
            <tr>
              <td>Telefonnummer</td>
              <td> <?=$booking['phone_number']?> </td>
            </tr>
            <tr>
              <td>Parkplatz</td>
              <td> <?=(in_array('Parking', $options)) ? 'Ja' : 'Nein'?> </td>
            </tr>
            <tr>
              <td>Frühstück</td>
              <td> <?=(in_array('Breakfast', $options)) ? 'Ja' : 'Nein'?> </td>
            </tr>
            <tr>
              <td>Late Check-Out</td>
              <td> <?=(in_array('Late Checkout', $options)) ? 'Ja' : 'Nein'?> </td>
            </tr>
            <tr>
              <td>Haustiere</td>
              <td> <?=(in_array('Pets', $options)) ? 'Ja' : 'Nein'?> </td>
            </tr>
          </tbody>
        </table>

      </div>
    </div>
  </div>


<?php endforeach; ?>