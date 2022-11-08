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
  <div class="container py-3 site_content">

    <h1>Registrierung</h1>

    <form>
      <!--Vorname-->
      <div class="col">
        <label for="validationVorname" class="form-label">Vorname</label>
        <input type="text" name="validationVorname" class="form-control" id="first_name" placeholder="" required>
      </div>


      <!--Nachname-->
      <div class="col">
        <label for="validationNachname" class="form-label">Nachname</label>
        <input type="text" name="validationNachname" class="form-control" id="last_name" placeholder="" required>
      </div>
      

      <!--Username-->
      <div class="col">
        <label for="validationUsername" class="form-label">Username</label>
          <input type="text" name="validationUsername" class="form-control" id="username"  aria-describedby="inputGroupPrepend2" required>
      </div>


      <!--E-mail Adresse-->
      <div class="col">
        <label for="validationEmail" class="form-label">E-mail Adresse</label>
        <div class="input-group">
          <span class="input-group-text" id="inputGroupPrepend2">@</span>
          <input type="text" name="validationEmail" class="form-control" id="email" placeholder="" required>
        </div>
      </div>

      <!--Passwort-->
      <div class="col">
        <label for="validationPassword" class="form-label">Passwort</label>
        <input type="password" name="validationPassword" class="form-control" id="password" required>
      </div>
      
      <!--Passwort wiederholen-->
      <div class="col">
        <label for="validationPassword2" class="form-label">Passwort wiederholen</label>
        <input type="password" name="validationPassword2" class="form-control" id="password2" required>
      </div>

      <!--Geschlecht-->
      <div class="col-3">
      <label for="validationGeschlecht" class="form-label">Geschlecht</label>
      <select class="form-select" name="validationGeschlecht" id="gender" required>
        <option selected disabled value="">Auswählen</option>
        <option>Mann</option>
        <option>Frau</option>
        <option>Divers</option>
        <option>Keine Angabe</option>
      </select>
      </div>


      <!--Button-->
      <div class="RegisterButton">
        <div class="col-5">
          <button class="btn btn-secondary" type="submit">Register</button>
        </div>
      </div>
    </form>
    </div>
  </div>

  <!-- Bootstrap Scripts -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>
