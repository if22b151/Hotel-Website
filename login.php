<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <title>Log-In</title>
</head>
<body>
  <!-- Navbar -->
  <?php include 'php/navbar.php' ?>
    
  <div class="flex-container black_background">
  <div class="container py-3 px-3 site_content">
   <h1>Login</h1>

    <form action="">
      <!-- E-mail -->
      <div class="col E-mailContainer">
      <div class="mb-3">
        <label for="email" class="form-label">E-mail Adresse :</label>
        <input type="text" class="form-control" id="email" placeholder="example@gmail.com" required>
      </div>
      </div>

      <!-- Passwort -->
      <div class="mb-3 PasswortContainer">
        <label for="password" class="form-label">Passwort :</label>
        <input type="password" class="form-control" id="password" placeholder="Passwort" required>
      </div>

      <!--Button-->
      <div class="Button">
        <button class="btn btn-secondary" type="submit">Einloggen</button>
      </div>
    </form>

  </div>
  </div>

</div>
  <!-- Bootstrap Scripts -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>
