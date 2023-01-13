<?php
  require '../php/scripts/funcs.php';
  require '../php/scripts/dbaccess.php';
  
  
  session_start();
  require_login();
  
  // Connect to DB
  $db = get_db();

  $sql = "SELECT * FROM booking WHERE fk_userid = " . $_SESSION['userid'];
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
          <div class="mt-3">
            <div class="d-flex justify-content-between current-bookings">
              <h4 class="">Alle Buchungen</h3>
              <a class="" href="/booking.php">Buchungen</a>
            </div>

            <?php include '../php/templates/current_bookings.php'; ?>
          </div>          

      </div>
      </div>
    </div>

  <?php include '../php/footer.php' ?>
  </div>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>