<?php
  session_start();
  require 'php/scripts/signup_logic.php';
  require_once 'php/scripts/funcs.php';
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

    <title>Registrierung</title>
</head>

  <div class="container-site d-flex flex-column justify-content-between">
    <div class="container-navbar-content d-flex flex-column flex-grow-1">

      <!-- Navbar -->
      <?php include 'php/navbar.php' ?>

      <div class="flex-container content-background flex-grow-1 background-image">
      <div class="container pt-3 pb-4 px-3 site_content">
      <main>
        <h1>Registrieren</h1>

        <!-- Information and error banners -->
        <?php if(isset($_SESSION['id'])): ?>

          <div class="alert alert-success mt-3" role="alert">
            Sie sind bereits eingeloggt!
          </div>

        <?php else: ?>

          <p class="text-muted">Sollten Sie bereits ein Konto haben, <a href="login.php">loggen</a> Sie sich ein!</p>
          
          <?php if(!empty($errors)): ?>

            <div class="alert alert-warning mt-3" role="alert">
              <?php 
                foreach($errors as $err){
                  print($err . "<br>");
                } 
              ?>
            </div>

          <?php elseif(get_default($success)): ?>
          
            <div class="alert alert-success mt-3" role="alert">
              Sie sind nun registriert!<br>
              <a href="/login.php">Hier</a> geht's zum Login.
            </div>

          <?php endif; ?>

        <?php endif; ?>

          
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
          <!--Vorname-->
          <div class="">
            <label for="first_name" class="form-label">Vorname</label>
            <input type="text" name="first_name" class="form-control" id="first_name" placeholder="Vorname" 
              value="<?php echo $first_name ?>" required>
          </div>
          
          
          <!--Nachname-->
          <div class="mt-3">
            <label for="last_name" class="form-label">Nachname</label>
            <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Nachname" 
              value="<?php echo $last_name ?>"required>
          </div>
          
          
          <!--Username-->
          <div class="mt-3">
            <label for="username" class="form-label">Nutzername</label>
            <input type="text" name="username" class="form-control" id="username" maxlength="20" aria-describedby="inputGroupPrepend2" placeholder="Benutzername" 
              value="<?php echo $username ?>" required>
          </div>
          
          <!--E-mail Adresse-->
          <div class="mt-3">
            <label for="email" class="form-label">E-Mail Addresse</label>
            <div class="input-group">
              <span class="input-group-text" id="inputGroupPrepend2">@</span>
              <input type="text" name="email" class="form-control" id="email" placeholder="E-Mail Addresse" 
                value="<?php echo $email ?>" required>
            </div>
          </div>
          
          <!--Passwort-->
          <div class="mt-3">
            <label for="password" class="form-label">Passwort</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Passwort" minlength="8" required>
          </div>
          
          <!--Passwort wiederholen-->
          <div class="mt-3">
            <label for="password2" class="form-label">Passwort wiederholen</label>
            <input type="password" name="password2" class="form-control" id="password2" placeholder="Passwort wiederholen" minlength="8" required>
          </div>
          
          <!--Geschlecht-->
          <div class="">
            <div class="col-12 col-sm-3 mt-3">
            <label for="gender" class="form-label">Geschlecht</label>
            <select class="form-select" name="gender" id="gender" required>
              <option value="">Auswählen</option>
              <option value="male" <?php echo ($gender == 'male') ? 'selected':''?>>Mann</option>
              <option value="female" <?php echo ($gender == 'female') ? 'selected':''?>>Frau</option>
              <option value="other" <?php echo ($gender == 'other') ? 'selected':''?>>Divers</option>
            </select>
            </div>
          </div>
          
          <!-- Checkboxes -->
          <div class="">
            <input class="mt-4" type="checkbox" name="gdpr" id="gdpr" 
              <?php echo ($gdpr) ? 'checked':''?> required>
            <label class="form-label d-inline" for="gdpr">Ich habe die <a href="#">Datenschutzerklärung</a> gelesen und stimme ihr zu.</label>
          </div>
          
          <div class="">
            <input class="mt-2" type="checkbox" name="newsletter" id="newsletter" 
              <?php echo ($newsletter) ? 'checked':'' ?>>
            <label class="form-label d-inline" for="newsletter">Ich möchte per E-Mail über Angebote benachrichtigt werden.</label>
          </div>
          
          <!--Button-->
          <div class="mt-3">
            <button class="btn btn-secondary" type="submit">Registrieren</button>
          </div>
        </form>
      </div>
      </div>
    </div>
  </main>
    
  <!-- Footer -->
  <?php include 'php/footer.php' ?>
  </div>

  <!-- Bootstrap Scripts -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>
