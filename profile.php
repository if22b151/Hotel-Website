<?php
  session_start();
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
  
  <title>Profil</title>
</head>
<body>
  <div class="container-site d-flex flex-column justify-content-between">
    <div class="container-navbar-content d-flex flex-column">
      
      <?php include 'php/navbar.php'; ?>

      <div class="black_background">
      <div class="container site_content py-4">
        
        
        <h1>Kontodaten ändern</h1>

        
        <form action="" method="post">
          <!--Vorname-->
          <div class="input-field">
            <label for="first_name" class="form-label">Vorname: </label>
            <input type="text" name="first_name" class="form-control" id="first_name" placeholder="Neuer Vorname">
          </div>
          
          
          <!--Nachname-->
          <div class="mt-3">
            <label for="last_name" class="form-label">Nachname: </label>
            <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Neuer Nachname">
          </div>
          
          
          <!--Username-->
          <div class="mt-3">
            <label for="username" class="form-label">Nutzername: </label>
            <input type="text" name="username" class="form-control" id="username" maxlength="20" aria-describedby="inputGroupPrepend2" placeholder="Neuer Benutzername">
          </div>
          
          <!--E-mail Adresse-->
          <div class="mt-3">
            <label for="email" class="form-label">E-Mail: </label>
            <div class="input-group">
              <span class="input-group-text" id="inputGroupPrepend2">@</span>
              <input type="text" name="email" class="form-control" id="email" placeholder="Neue E-Mail Addresse">
            </div>
          </div>
          
          <!--Geschlecht-->
          <div class="">
            <div class="col-3 mt-3">
              <label for="gender" class="form-label">Geschlecht: </label>
              <select class="form-select" name="gender" id="gender">
                <option value="">Auswählen</option>
                <option value="male" <?php echo (0) ? 'selected':''?>>Mann</option>
                <option value="female" <?php echo (0) ? 'selected':''?>>Frau</option>
                <option value="other" <?php echo (0) ? 'selected':''?>>Divers</option>
              </select>
            </div>
          </div>

          <!--Passwort-->
          <div class="mt-3">
            <label for="password" class="form-label">Passwort: </label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Neues Passwort" minlength="8">
          </div>
          
          <!--Aktuelles Passwort-->
          <div class="mt-3">
            <label for="password2" class="form-label">Aktuelles Passwort zur Bestätigung</label>
            <input type="password" name="password2" class="form-control" id="password2" placeholder="Aktuelles Passwort" minlength="8" required>
          </div>
          
          <!--Button-->
          <div class="mt-3">
            <button class="btn btn-secondary" type="submit">Änderungen vornehmen</button>
          </div>
        </form>
        </form>


      </div>
      </div>
    </div>
    
    <?php include 'php/footer.php'; ?>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>