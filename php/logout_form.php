<p>
  Sie sind eingeloggt als <?php echo $_SESSION['name']?>.
</p>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
  <!-- HACK: Invisible checkbox to pass data to logout script -->
  <input class="d-none" type="checkbox" name="wants_logout" id="wants_logout" checked>
  <button class="btn btn-secondary" type="submit">Ausloggen</button>
</form>