<!DOCTYPE html>
<html>
<head>
    <title>Vienna City Hotel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
</head>
<body>
  <!-- Header -->
  <header class="container-fluid py-3 bg-dark logo_bar d-none d-xl-block">
    <p>Vienna</p>
    <img src="img/hotel_logo.png" height="30" />
    <p>Hotel</p>
  </header>

  <!-- Carousel -->
  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="img/index_preview_3.jpeg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Erleben Sie die Sights</h5>
          <p>Eine Stadt voller Abenteuer</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="img/index_preview_2.jpeg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Hauseigene Bar</h5>
          <p>Zur Erfrischung nach einem langen Tag</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="img/index_preview_1.jpeg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Ruhige Lage</h5>
          <p>Zur Entspannung nach der hauseigenen Bar</p>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <!-- Navbar -->
  <?php include 'php/navbar.php' ?>
  
  <!-- Zimmer -->
  <div class="black_background">
  <div class="container site_content pt-4 pb-5">
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
          <img src="img/black_square.png" class="img-fluid" alt="">
        </div>
      </div>
      
      <div class="col-md-8 mt-3 mt-md-0">
        <div class="row">
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita ducimus quasi odit autem debitis. Neque nobis nam ipsa, harum assumenda nesciunt corporis veniam porro non sequi. Dolores quasi </p>
        </div>

        <div class="row">
          <a href="#" class="btn_booking">
            <div class="btn_booking">
              <p>BUCHEN</p>
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
          <img src="img/black_square.png" class="img-fluid" alt="">
        </div>
      </div>

      <div class="col-md-8 mt-3 mt-md-0">
        <div class="row">
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita ducimus quasi odit autem debitis. Neque nobis nam ipsa, harum assumenda nesciunt corporis veniam porro non sequi. Dolores quasi </p>
        </div>

        <div class="row">
          <a href="#" class="btn_booking">
            <div class="btn_booking">
              <p>BUCHEN</p>
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
          <img src="img/black_square.png" class="img-fluid" alt="">
        </div>
      </div>

      <div class="col-md-8 mt-3 mt-md-0">
        <div class="row">
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita ducimus quasi odit autem debitis. Neque nobis nam ipsa, harum assumenda nesciunt corporis veniam porro non sequi. Dolores quasi </p>
        </div>

        <div class="row">
          <a href="#" class="btn_booking">
            <div class="btn_booking">
              <p>BUCHEN</p>
            </div>
          </a>
        </div>

      </div>

    </div>
  </div>
  </div>

  <!-- Footer -->
  <?php include 'php/footer.php' ?>

  <!-- Bootstrap Scripts -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>
