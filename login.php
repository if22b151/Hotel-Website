<?php 
  session_start();
  if(isset($_SESSION['name'])){
    require 'php/scripts/logout_logic.php';
    print($debug);
  } else {
    require 'php/scripts/login_logic.php';
    print($debug);
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <title>Login</title>
</head>
<body>
  <!-- Navbar -->
  <?php include 'php/navbar.php' ?>
    
  <div class="flex-container black_background">
  <div class="container py-3 px-3 site_content">
    <h1>Login</h1>

    <?php
      print($output);
      if(isset($_SESSION['name'])){
        require 'php/logout_form.php';
      } else {
        require 'php/login_form.php';
      }
    ?>

  </div>
  </div>

  <!-- Footer -->
  <?php include 'php/footer.php' ?>

  <!-- Bootstrap Scripts -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>
