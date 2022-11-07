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

    <div class="Header">
        <h1>Registrierung</h1>
    </div>    
    <div class="OverallContainer">
    <div class="Sign-UpContainer">
    <form>
        <!--Vorname-->
         <div class="col-md-7">
          <label for="validationVorname" class="form-label">Vorname</label>
          <input type="text" name="validationVorname" class="form-control" id="validationDefault01" placeholder="Max" required>
        </div>


          <!--Nachname-->
          <div class="col-md-7">
          <label for="validationNachname" class="form-label">Nachname</label>
          <input type="text" name="validationNachname" class="form-control" id="validationDefault02" placeholder="Mustermann" required>
        </div>
        

        <!--Username-->
          <div class="col-md-7">
          <label for="validationUsername" class="form-label">Username</label>
            <input type="text" name="validationUsername" class="form-control" id="validationDefaultUsername"  aria-describedby="inputGroupPrepend2" required>
        </div>


        <!--E-mail Adresse-->
          <div class="col-md-7">
          <label for="validationEmail" class="form-label">E-mail Adresse</label>
          <div class="input-group">
            <span class="input-group-text" id="inputGroupPrepend2">@</span>
          <input type="text" name="validationEmail" class="form-control" id="validationDefault03" placeholder="example@gmail.com" required>
          </div>
        </div>

        <!--Passwort-->
         <div class="col-md-7">
          <label for="validationPasswort" class="form-label">Passwort</label>
          <input type="password" name="validationPasswort" class="form-control" id="validationDefault03" required>
         </div> 

        <!--Geschlecht-->
          <div class="col-md-5">
          <label for="validationGeschlecht" class="form-label">Geschlecht</label>
          <select class="form-select" name="validationGeschlecht" id="validationDefault04" required>
            <option selected disabled value="">Auswählen</option>
            <option>Mann</option>
            <option>Frau</option>
            <option>Divers</option>
            <option>Keine Angabe</option>
          </select>
          </div>


       <!--Button-->
       <div class="RegisterButton">
        <div class="col-l-5">
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
