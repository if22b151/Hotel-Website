<?php 
  session_start();
  require 'php/scripts/login.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?php require 'php/head.php'; ?> 
  <title>Login</title>
</head>
<body>
  <div class="container-site d-flex flex-column justify-content-between">
    <div class="container-navbar-content d-flex flex-column flex-grow-1">

      <!-- Navbar -->
      <?php include 'php/navbar.php' ?>

  
      <div class="flex-container content-background flex-grow-1 background-image">
        <main class="container py-3 px-3 site_content">
          <h1>Login</h1>
          
          <!-- Show login confirmation if logged in -->
          <?php if(isset($_SESSION['username'])): ?>

            <p>
              Sie sind eingeloggt als <?php echo $_SESSION['username']?>.
            </p>
            <a class="btn btn-secondary" href="login.php?logout=true">Ausloggen</a>
            
          <!-- Show login form if not logged in --> 
          <?php else: ?>

            <p class="text-muted">Noch keinen Account? <a href="signup.php">Registrieren</a> Sie sich!</p>

            <!-- Error banner; shows up if anything in $errors array -->
            <?php if (!empty($errors)): ?>
              <div class="alert alert-warning mt-3" role="alert">
              <?php 
                foreach ($errors as $err){
                  print($err . "<br>");
                } 
              ?>
              </div>
            <?php endif; ?>

            <form action="" method="post">
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
