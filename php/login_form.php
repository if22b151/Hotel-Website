<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
  <!-- Error banner; shows up if any errors -->
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
      value="<?php echo (!empty($_POST['email'])) ? $_POST('email') : ''?>"
    >
  </div>

  <!-- Passwort -->
  <div class="mb-3">
    <label for="password" class="form-label">Passwort:</label>
    <input type="password" class="form-control" name="password" id="password" placeholder="Passwort" required>
  </div>

  <!--Button-->
  <button class="btn btn-secondary" type="submit">Einloggen</button>
</form>