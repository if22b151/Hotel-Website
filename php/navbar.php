<?php
    $current_url = $_SERVER['PHP_SELF'];
    $current_page = '';

    require_once 'scripts/funcs.php';
    require 'scripts/logout_logic.php';

    // So current page can be highlighted in Navbar
    if (strpos($current_url, 'index.php')) {
        $current_page = 'index';
    } elseif (strpos($current_url, 'login.php')) {
        $current_page = 'login';
    } elseif(strpos($current_url, 'signup.php')){
        $current_page = 'signup';
    } elseif(strpos($current_url, 'booking.php')){
        $current_page = 'booking';
    }
?>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark p-3 <?php print(($current_page == "index") ? "sticky-top" : "") ?>" id="headerNav">
  <div class="container-fluid">


    <a class="navbar-brand d-block d-lg-none" href="#">
      <img src="img/hotel_logo.png" height="30"></svg>
    </a>

    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>


    <li class="nav-item dropdown">
      <a class="nav-link mx-2" href="#" id="profileDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fa-solid fa-user profile-button"></i>  
      </a>
      <ul class="dropdown-menu profile-dropdown" aria-labelledby="profileDropdownMenuLink">
        <?php if(get_default($_SESSION['is_admin'])):?>
          <li><a class="dropdown-item" href="#">Blog Eintrag erstellen</a></li>            
        <?php endif; ?>
        <?php if(isset($_SESSION['id'])): ?>
          <li><a class="dropdown-item" href="profile.php">Profil</a></li>
          <li><a class="dropdown-item" href="booking.php">Buchungen</a></li>
          <li><a class="dropdown-item" href="?logout=true">Logout</a></li>
        <?php else: ?>
          <li><a class="dropdown-item" href="login.php">Login</a></li>
          <li><a class="dropdown-item" href="signup.php">Registrieren</a></li>
        <?php endif; ?>
      </ul>
    </li>
    

    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav mx-auto ">
        <li class="nav-item">
          <a class="nav-link mx-2 <?php print(($current_page == 'index') ? 'active' : '')?>" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link mx-2 <?php print(($current_page == 'booking') ? 'active' : '')?>" href="booking.php">Booking</a>
        </li>
        <li class="nav-item d-none d-lg-block">
          <a class="nav-link mx-2" href="index.php">
            <img src="img/hotel_logo.png" height="30" />
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link mx-2 <?php print(($current_page == 'signup') ? 'active' : '')?>" href="signup.php">Registrieren</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link mx-2 dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Mehr
          </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <li><a class="dropdown-item" href="login.php">Login</a></li>
          <li><a class="dropdown-item" href="#">Blog</a></li>
          <li><a class="dropdown-item" href="faq.php">FAQ</a></li>
          <li><a class="dropdown-item" href="impressum.php">Kontakt</a></li>
        </ul>
      </li>
    </ul>
  </div>
  </div>
</nav>