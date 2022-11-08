<?php include 'php/validate_registration.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <title>Registrierung</title>
</head>
<body>
  <!-- Navbar -->
  <?php include 'php/navbar.php' ?>

  <div class="flex-container black_background">
  <div class="container pt-3 pb-4 site_content">

    <h1>Registrierung</h1>

    <div class="alert alert-warning mt-3 <?php echo (empty($errors)) ? 'd-none' : '' ?>" role="alert">
      <?php 
        foreach ($errors as $err){
          print($err . "<br>");
        } 
      ?>
    </div>

    <div class="alert alert-success mt-3 <?php echo ($success) ? '' : 'd-none' ?>" role="alert">
      Sie sind nun registriert!
    </div>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
      <!--Vorname-->
      <div class="row">
        <div class="col">
        <label for="first_name" class="form-label">Vorname</label>
        <input type="text" name="first_name" class="form-control" id="first_name" placeholder="Vorname" value="<?php echo $first_name ?>" required>
        </div>
      </div>


      <!--Nachname-->
      <div class="row mt-3">
        <div class="col">
        <label for="last_name" class="form-label">Nachname</label>
        <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Nachname" value="<?php echo $last_name ?>"required>
        </div>
      </div>
      

      <!--Username-->
      <div class="row mt-3">
        <div class="col">
        <label for="username" class="form-label">Nutzername</label>
        <input type="text" name="username" class="form-control" id="username" maxlength="20" aria-describedby="inputGroupPrepend2" placeholder="Benutzername" value="<?php echo $username ?>" required>
        </div>
      </div>

      <!--E-mail Adresse-->
      <div class="row mt-3">
        <div class="col">
          <label for="email" class="form-label">E-Mail Addresse</label>
          <div class="input-group">
            <span class="input-group-text" id="inputGroupPrepend2">@</span>
            <input type="text" name="email" class="form-control" id="email" placeholder="E-Mail Addresse" value="<?php echo $email ?>" required>
          </div>
        </div>
      </div>

      <!--Passwort-->
      <div class="row mt-3">
        <div class="col">
        <label for="password" class="form-label">Passwort</label>
        <input type="password" name="password" class="form-control" id="password" placeholder="Passwort" minlength="8" required>
        </div>
      </div>
      
      <!--Passwort wiederholen-->
      <div class="row mt-3">
        <div class="col">
        <label for="password2" class="form-label">Passwort wiederholen</label>
        <input type="password" name="password2" class="form-control" id="password2" placeholder="Passwort wiederholen" minlength="8" required>
        </div>
      </div>

      <!--Geschlecht-->
      <div class="row">
        <div class="col-3 mt-3">
        <label for="gender" class="form-label">Geschlecht</label>
        <select class="form-select" name="gender" id="gender" required>
          <option value="">Auswählen</option>
          <option value="male" <?php echo ($gender == 'male') ? 'selected':''?>>Mann</option>
          <option value="female" <?php echo ($gender == 'female') ? 'selected':''?>>Frau</option>
          <option value="other" <?php echo ($gender == 'other') ? 'selected':''?>>Divers</option>
        </select>
        </div>
      </div>

      <input class="mt-4" type="checkbox" name="gdpr" id="gdpr" <?php echo ($gdpr) ? 'checked':''?> required>
      <label for="gdpr">Ich habe die <a href="#">Datenschutzerklärung</a> gelesen und stimme ihr zu.</label>
      <br>
      <input class="mt-2" type="checkbox" name="newsletter" id="newsletter" <?php echo ($newsletter) ? 'checked':'' ?>>
      <label for="newsletter">Ich möchte per E-Mail über Nachrichten und Angebote des Hotels benachrichtigt werden.</label>

      <!--Button-->
      <div class="RegisterButton mt-3">
        <div class="col-5">
          <button class="btn btn-secondary" type="submit">Registrieren</button>
        </div>
      </div>
    </form>
    </div>
  </div>

  <!-- Footer -->
  <?php include 'php/footer.php' ?>

  <!-- Bootstrap Scripts -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>
