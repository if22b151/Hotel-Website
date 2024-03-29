<?php
  session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <?php include 'php/head.php'; ?> 
  <title>Vienna City Hotel</title>
  <style>.site_content{padding: 0rem 2rem;}</style>
</head>
<body>
  <!-- Header -->
  <header class="container-fluid py-3 bg-dark logo_bar d-none d-xl-block">
    <a href="/index.php">
      <p>Vienna</p>
      <img src="img/hotel_logo.png" height="30" alt="link to homepage" />
      <p>Hotel</p>
    </a>
  </header>
  
  <!-- Carousel -->
  <div id="carousel-index" class="carousel slide" data-bs-ride="carousel" data-interval="15000" data-pause="false">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carousel-index" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carousel-index" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carousel-index" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="img/index_preview_3.jpeg" class="d-block w-100" alt="picture of buildings in viennas first district">
        <div class="carousel-caption d-none d-md-block">
          <h5>Erleben Sie die Sights</h5>
          <p>Eine Stadt voller Abenteuer</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="img/index_preview_2.jpeg" class="d-block w-100" alt="picture of the hotels bar with counter and seats">
        <div class="carousel-caption d-none d-md-block">
          <h5>Hauseigene Bar</h5>
          <p>Zur Erfrischung nach einem langen Tag</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="img/index_preview_1.jpeg" class="d-block w-100" alt="picture of outside of the hotel with mountains in the winter">
        <div class="carousel-caption d-none d-md-block">
          <h5>Ruhige Lage</h5>
          <p>Zur Entspannung nach der hauseigenen Bar</p>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carousel-index" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carousel-index" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  
  <!-- Navbar -->
  <?php include 'php/navbar.php' ?>
  
  <!-- Zimmer -->
  <div class="content-background">
    <main class="container site_content py-5 pt-4 pb-5">
      <!-- Suite -->
      <div class="row room">
        <div class="row">
          <div class="col-md-4"></div>
            <div class="col-md-8">
              <p class="room_title">Suite</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="row">
            <img src="img/room1.jpg" class="img-fluid" alt="picture of a suite room">
          </div>
        </div>
        
        <div class="col-md-8 mt-3 mt-md-0 d-flex flex-column justify-content-between">

          <div class="row">
            <p>Unsere Suite bietet Ihnen eine luxuriöse Unterkunft in Wien. Sie verfügt über ein geräumiges Schlafzimmer mit einem Kingsize-Bett, einen separaten Wohnbereich mit Sofa und Sesseln, einen Schreibtisch, einen Flachbild-TV und kostenfreies WLAN. Das Badezimmer ist mit einer großen Badewanne und einer separaten Dusche ausgestattet. Durch die Fenster genießen Sie einen atemberaubenden Blick auf die Stadt. Erleben Sie den ultimativen Luxus und entspannen Sie in privater Atmosphäre.</p>
          </div>

          <div class="row">
            <a href="booking.php?room=1" class="btn_booking">
              <div class="btn_booking">
                <p>NUR 250€/NACHT</p>
              </div>
            </a>
          </div>

        </div>
      </div>

      <!-- Double Bedroom -->
      <div class="row room mt-5">
        <div class="row">
          <div class="col-md-4"></div>
          <div class="col-md-8">
            <p class="room_title">Doppelbett</p>
          </div>
        </div>

        <div class="col-md-4">
          <div class="row">
            <img src="img/room2.jpg" class="img-fluid" alt="picture of a double bed room">
          </div>
        </div>

        <div class="col-md-8 mt-3 mt-md-0 d-flex flex-column justify-content-between">

          <div class="row">
            <p>Unser geräumiges Doppelzimmer bietet Ihnen eine komfortable Unterkunft für Ihren Aufenthalt in Wien. Es verfügt über ein großes Doppelbett, einen Schreibtisch, einen Flachbild-TV und kostenfreies WLAN. Das Bad ist mit einer Badewanne ausgestattet. Durch die Fenster des Zimmers genießen Sie einen schönen Blick auf die Stadt. Ob Sie alleine oder zu zweit unterwegs sind, unser Doppelzimmer bietet Ihnen einen perfekten Rückzugsort.</p>
          </div>

          <div class="row">
            <a href="booking.php?room=2" class="btn_booking">
              <div class="btn_booking">
                <p>NUR 150€/NACHT</p>
              </div>
            </a>
          </div>

        </div>
      </div>

      <!-- Single Bedroom-->
      <div class="row room mt-5">
        <div class="row">
          <div class="col-md-4"></div>
          <div class="col-md-8">
            <p class="room_title">Einzelbett</p>
          </div>
        </div>

        <div class="col-md-4">
          <div class="row">
            <img src="img/room3.jpg" class="img-fluid" alt="picture of a single bed room">
          </div>
        </div>

        <div class="col-md-8 mt-3 mt-md-0 d-flex flex-column justify-content-between">
          <div class="row">
            <p>Unser Einzelzimmer in Wien bietet Ihnen eine komfortable Unterkunft für Ihren Aufenthalt. Es verfügt über ein komfortables Bett, einen Schreibtisch, einen Flachbild-TV und kostenfreies WLAN. Das Bad ist mit einer Dusche ausgestattet. Durch die Fenster des Zimmers genießen Sie einen schönen Blick auf die Stadt. Erholen Sie sich in privater Atmosphäre und starten Sie erfrischt in den Tag.</p>
          </div>

          <div class="row">
            <a href="booking.php?room=3" class="btn_booking">
              <div class="btn_booking">
                <p>NUR 130€/Nacht</p>
              </div>
            </a>
          </div>

        </div>

      </div>
    </main>
  </div>
  <!-- Footer -->
  <?php include 'php/footer.php' ?>

  <!-- Bootstrap Scripts -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>
