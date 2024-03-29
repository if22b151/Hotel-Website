<?php
  $BOOKINGS_PER_PAGE = 15;
  $DATE_FORMAT = 'd.m.Y';
  
  
  require '../php/scripts/funcs.php';
  require '../php/scripts/dbaccess.php';


  // Prevent non-admins
  session_start();
  require_admin();

  // Connect to DB
  $db = get_db();

  // Ensure user is on correct ?p= page
  $page = get_default($_GET['p'], 1);
  $max_page = ceil($db->query("SELECT * FROM booking")->num_rows / $BOOKINGS_PER_PAGE);  // First gets total number of articles, 
  // then divides it by articles per page to get maximum page. ceil() rounds up, since, if 3.2 pages are needed, we display 4. 

  if($page > $max_page){
    header('Location: ?p='.$max_page);
    exit();
  } elseif($page < 1){
    header('Location: ?p=1');
    exit();
  }

  // Check if there should be a filter for a particular user
  $where_clause = '';
  if(isset($_GET['user'])){
    $where_clause = 'WHERE userid = '.$_GET['user'];
    $username = $db->query('SELECT username FROM user WHERE userid = '.$_GET['user']);
  }

  // Get $users from DB
  $user_range_start = $BOOKINGS_PER_PAGE * ($page-1);
  $sql = 'SELECT *
          FROM user 
          JOIN booking ON userid = fk_userid
          JOIN person ON fk_personid = personid
          '.$where_clause.'
          ORDER BY reservation_date DESC
          LIMIT '. $user_range_start . ',' . $BOOKINGS_PER_PAGE;

  $bookings = $db->query($sql)->fetch_all(MYSQLI_ASSOC);  // Return all rows as an array of associative arrays
  
  // Change reservation status
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // $_POST['status] is a string akin to the format "34-2"; with 2 being the selected status and 34 the bookingid
    // that the selected status is meant to be applied to. It's exploded so as to get both individual parts out of it.
    $array = explode('-', $_POST['status']);
    
    $bookingid = $array[0];
    $new_status = $array[1];

    print($new_status . ' ' . $bookingid);
    
    $stmt = $db->prepare('UPDATE booking SET `status` = ? WHERE bookingid = ?');
    $stmt->bind_param('ii', $new_status, $bookingid);
    $stmt->execute();
    
    // Reload page so changes can take visible effect
    header('Location: '.$_SERVER['REQUEST_URI']);
  }
  ?>


<!DOCTYPE html>
<html lang="de">
  <head>
  <?php require '../php/head.php'; ?>
  <title>Buchungen verwalten</title>
</head>
<body>
  <div class="container-site d-flex flex-column justify-content-between">
  <div class="container-navbar-content d-flex flex-column flex-grow-1">
    
    <?php include '../php/navbar.php' ?>
    
    <div class="flex-container content-background admin-bookings flex-grow-1">
    <div class="container site_content py-2 pb-4">
      
      <div class="d-flex justify-content-between align-items-center">
        <h1 class="mb-1">Buchungen verwalten</h1>

        <div class="me-3 switch-page-container d-flex justify-content-between">
          <span><?=switch_page_button(-1)?></span>
          <span><?=switch_page_button(+1)?></span>
        </div>
      </div>
      
      <?php if(isset($_GET['user'])): ?>
        <p class="text-muted"> <?='Nutzer: '.$bookings[0]['username']?> </p>
      <?php endif; ?>
      
      <?php if(empty($bookings)): ?>
        <p class="mb-0">Keine Buchungen vorhanden</p>
      <?php else: ?>
        <div class="mt-2 container-fluid row text-center">
          <span class="d-none d-lg-inline col-lg-1 accordion-title">ID</span>
          <span class="d-none d-lg-inline col-lg-2 accordion-title">Status</span>
          <span class="d-none d-lg-inline col-lg-2 accordion-title">Nachname</span>
          <span class="d-none d-lg-inline col-lg-2 accordion-title">Gebucht</span>
          <span class="d-none d-lg-inline col-lg-2 accordion-title">Anfang</span>
          <span class="d-none d-lg-inline col-lg-2 accordion-title">Ende</span>
        </div>
      
        <div class="accordion mt-2" id="accordionPanelsStayOpenExample">
          
          
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
                      <label class="d-block d-lg-none text-center" for="bookingid"><b>ID</b></label>
                      <span class="d-block text-center" id="bookingid"> <?=$booking['bookingid']?> </span>
                    </div>
                    <div class="col-6 col-sm-4 col-lg-2 mt-lg-0 accordion-title">
                      <label class="d-block d-lg-none text-center" for="status"><b>Status</b></label>
                      <span class="d-block text-center" id="status"> <?=$status?> </span>
                    </div>
                    <div class="col-6 col-sm-4 col-lg-2 mt-3 mt-sm-0 accordion-title">
                      <label class="d-block d-lg-none text-center" for="lastname"><b>Nachname</b></label>
                      <span class="d-block text-center" id="lastname"> <?=$booking['lastname']?> </span>
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
                        <td>Status</td>
                        <td>
                          <form class="row" action="" method="post">
                            <div class="col-8">
                              <select class="form-select col-8" name="status" id="status" aria-label="Status">
                                <option value="<?=$id?>-0" <?=($booking['status'] == 0 ? 'selected' : '')?>>Neu</option>
                                <option value="<?=$id?>-1" <?=($booking['status'] == 1 ? 'selected' : '')?>>Bestätigt</option>
                                <option value="<?=$id?>-2" <?=($booking['status'] == 2 ? 'selected' : '')?>>Storniert</option>
                              </select>
                            </div>
                            <div class="col-4 admin-bookings-submit-button">
                              <button class="btn btn-secondary" type="submit">-></button>
                            </div>
                          </form>
                        </td>
                      </tr>
                      <tr>
                        <td>Typ</td>
                        <td><?=$roomtype?></td>
                      </tr>
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
        </div>
      <?php endif; ?> 


    </div>          
    </div>
  </div>
  </div>

  <?php include '../php/footer.php' ?>
  </div>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="/js/bootstrap.min.js"></script>
</body>
</html>

