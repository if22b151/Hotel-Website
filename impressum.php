<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?php require 'php/head.php'; ?>
  <title>Impressum</title>
</head>
<body>
  <div class="container-site d-flex flex-column justify-content-between">
  <div class="container-navbar-content d-flex flex-column flex-grow-1">

    <!-- Navbar -->
    <?php include 'php/navbar.php' ?>

    <div class="flex-container content-background flex-grow-1" style="background-color: #ffffff">
      <main class="cotainer site_content">
        <div class="d-flex justify-content-center">
          <h1 class="mt-4">Impressum</h1>
        </div>
        <div class="TableContainer">
        <table>
          <tr>
            <td>Name</td>
            <td>Hotel Mustermann</td>
          </tr>
          <tr>
            <td>Inhaber</td>
            <td>Andretsch Adrian <br> Paul Felgitsch</td>
          </tr>
          <tr>
            <td>Firmenart</td>
            <td>Hotellerie</td>
          </tr>
          <tr>
            <td>Anschrift</td>
            <td>Mustestraße 9, 1220 Wien</td>
          </tr>
          <tr>
            <td>Tel. Nr.</td>
            <td>0660 7048700</td>
          </tr>
          <tr>
            <td>E-Mail</td>
            <td>admin@hotel-mustermann.at</td>
          </tr>
          <tr>
            <td>Privacy</td>
            <td><a href="/datenschutz.html">Siehe Datenschutzerklärung</a></td>
          </tr>
        </table>
        </div>

    
        <div class="d-flex justify-content-center mt-5">
          <div class="img-fluid">
          <div class="mx-5">
            <img src="img/paul.jpeg" class="img-fluid" alt="Paul Felgitsch">
            <p>Paul Felgitsch</p>
          </div>
          </div>

        <div class="img-fluid">
          <div class="mx-5">
            <img src="img/adrian.jpg" class="img-fluid" alt="Adrian Andretsch">
            <p>Adrian Andretsch</p>
          </div>
        </div>
      </main>
    </div>

    </div>
    
  <!-- Footer -->
  <?php include 'php/footer.php' ?>
  </div>
    
  <!-- Bootstrap Scripts -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>
