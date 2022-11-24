<?php 
  session_start();
  require 'php/scripts/login_logic.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/88b4eddc80.js" crossorigin="anonymous"></script>
    
    <title>Login</title>
</head>
<body>
  <div class="container-site d-flex flex-column justify-content-between">
    <div class="container-navbar-content d-flex flex-column justify-content-between">

      <!-- Navbar -->
      <?php include 'php/navbar.php' ?>
        
      <div class="flex-container black_background">
      <div class="container py-3 px-3 site_content">
        <h1>Login</h1>
        <p class="text-muted">Noch keinen Account? <a href="register.php">Registrieren</a> Sie sich!</p>
        
        <?php if(isset($_SESSION['name'])): ?>
          <p>
            Sie sind eingeloggt als <?php echo $_SESSION['name']?>.
          </p>
          <a class="btn btn-secondary" href="login.php?logout=true">Ausloggen</a>

        <?php else: ?>
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <!-- Error banner; shows up if anything in $errors array -->
            <div class="alert alert-warning mt-3 <?php echo (empty($errors)) ? 'd-none' : '' ?>" role="alert">
            <?php 
              foreach ($errors as $err){
                print($err . "<br>");
              } 
            ?>
            </div>

            <!-- E-mail -->
            <div class="mb-3">
              <label for="email" class="form-label">E-mail Adresse:</label>
              <input type="text" class="form-control" name="email" id="email" placeholder="example@gmail.com" required 
                value="<?php echo $_POST['email'] ?>"
              >
            </div>

            <!-- Passwort -->
            <div class="mb-3">
              <label for="password" class="form-label">Passwort:</label>
              <input type="password" class="form-control" name="password" id="password" placeholder="Passwort" required>
            </div>

            <!-- Submit -->
            <button class="btn btn-secondary" type="submit">Einloggen</button>
          </form>
        <?php endif ?>
      </div>
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
