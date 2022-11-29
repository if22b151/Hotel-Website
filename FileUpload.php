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

    <title>FileUpload</title>
    <style>
        .content-background{
            content-background-image: url('img/content-background.jpg');
        }
    </style>
</head>

<body>
  <div class="container-site d-flex flex-column justify-content-between">
    
    <div class="container-navbar-content d-flex flex-column flex-grow-1">

      <?php include 'php/navbar.php' ?>

      <div class="content-background flex-grow-1">
      <div class="container site_content py-5 pt-4 pb-5">


        <h1>File Upload</h1>
        <form enctype="multipart/form-data" method="post" action="php/scripts/upload.php">
          <div>
            <label for="desc">Beschreibung</label>
            <input class="form-control" type="text" id="desc" name="desc">
          </div>
          <div>
            <label for="image">Upload</label>
            <input class="form-control" type="file" id="image" name="image" accept="image/png/jpeg/gif">
          </div>

          <div>
            <input class="btn btn-success" type="submit" value="Hochladen">
          </div>
        </form>

      </div>
      </div>

    </div>
  
  <?php include 'php/footer.php' ?>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>
