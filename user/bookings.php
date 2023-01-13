<?php
  // Show all of user's bookings
  $BOOKINGS_PER_PAGE = 1;
  $DATE_FORMAT = 'd.m.Y';
  
  
  require '../php/scripts/funcs.php';
  require '../php/scripts/dbaccess.php';


  // Prevent anonymous users
  session_start();
  require_login();

  // Connect to DB
  $db = get_db();

  // Ensure user is on correct ?p= page
  $page = get_default($_GET['p'], 1);
  $max_page = ceil($db->query("SELECT * FROM booking WHERE fk_userid = ".$_SESSION['userid'])->num_rows / $BOOKINGS_PER_PAGE);  // First gets total number of articles, 
  // then divides it by articles per page to get maximum page. ceil() rounds up, since, if 3.2 pages are needed, we display 4. 

  if($page > $max_page){
    header('Location: ?p='.$max_page);
    exit();
  } elseif($page < 1){
    header('Location: ?p=1');
    exit();
  }

  $sql = 'SELECT *
          FROM user 
          JOIN booking ON userid = fk_userid
          JOIN person ON fk_personid = personid
          WHERE userid = '.$_SESSION['userid'].'
          ORDER BY reservation_date DESC';
  $bookings = $db->query($sql)->fetch_all(MYSQLI_ASSOC);  // Return all rows as an array of associative arrays
?>

<!DOCTYPE html>
<html lang="de">
<head>
  <?php require '../php/head.php'; ?>
  <title>Alle Buchungen</title>
</head>
<body>
  <div class="container-site d-flex flex-column justify-content-between">
    <div class="container-navbar-content d-flex flex-column flex-grow-1">

      <?php include '../php/navbar.php' ?>
      
      <div class="flex-container content-background flex-grow-1">
      <div class="container site_content py-2 pb-4">
        <h1>Booking</h1>

          <!-- Past Bookings -->
          <div class="mt-3 d-flex justify-content-between current-bookings">
            <h4 class="">Alle Buchungen</h3>
            <a class="" href="/booking.php">Buchungen</a>
          </div>

          <?php if(empty($bookings)): ?>
            <p>Keine Buchung gefunden</p>
          <?php else: ?>
            <div class="mt-2 container-fluid row text-center">
              <span class="d-none d-lg-inline col-lg-1 accordion-title">Nr.</span>
              <span class="d-none d-lg-inline col-lg-2 accordion-title">Status</span>
              <span class="d-none d-lg-inline col-lg-2 accordion-title">Zimmer</span>
              <span class="d-none d-lg-inline col-lg-2 accordion-title">Gebucht</span>
              <span class="d-none d-lg-inline col-lg-2 accordion-title">Anfang</span>
              <span class="d-none d-lg-inline col-lg-2 accordion-title">Ende</span>
            </div>     
            <?php require '../php/templates/display_bookings.php'; ?>
          <?php endif; ?>

      </div>
      </div>
    </div>

  <?php include '../php/footer.php' ?>
  </div>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="/js/bootstrap.min.js"></script>
</body>
</html>