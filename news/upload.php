<?php
  session_start();

  require('../php/scripts/upload.php');
?>

<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/styles.css">
  <link href="/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/88b4eddc80.js" crossorigin="anonymous"></script>

  <title>News Beitrag erstellen</title>
</head>
<body>
  <div class="container-site d-flex flex-column justify-content-between">
    <div class="container-navbar-content d-flex flex-column flex-grow-1">

      <?php include '../php/navbar.php' ?>

      <div class="content-background flex-grow-1">
      <div class="container site_content py-3">


        <h1>News Beitrag erstellen</h1>

        <form enctype="multipart/form-data" method="post" action="">
          <div class="mb-3">
            <label class="form-label" for="title">Titel</label>
            <input class="form-control" type="text" id="title" name="title" required>
          </div>
          <div class="mb-3">
            <label class="form-label" for="image">Bild</label>
            <input class="form-control" type="file" id="image" name="image" accept="image/png/jpeg/gif">
          </div>
          <div class="mb-3">
            <label class="form-label" for="content">Inhalt</label>
            <textarea class="form-control" id="content" name="content" rows=10 required></textarea>
          </div>

          <input class="btn btn-secondary" type="submit" name="submit" value="Veröffentlichen">
        </form>

      </div>
      </div>

    </div>
  
  <?php include '../php/footer.php' ?>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
</body>
</html>
