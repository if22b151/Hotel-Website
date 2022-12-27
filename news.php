<?php 
  session_start();
  require_once 'php/scripts/funcs.php';

  $page = get_default($_GET['p'], 1);
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
  
  <title>News</title>
</head>
<body>
  <div class="container-site d-flex flex-column justify-content-between">
    <div class="container-navbar-content d-flex flex-column flex-grow-1">

      <!-- Navbar -->
      <?php include 'php/navbar.php' ?>
        
      <div class="flex-container content-background flex-grow-1">
      <main class="container py-3 px-3 site_content">
        <h1>Neuigkeiten</h1>
        <hr>

        <main>
         <?php include 'php/newsfeed.php'; ?>
        </main>

        <div class="news-nav mt-4 pb-2 d-flex justify-content-between">
          <a <?=($page == 1) ? 'class="text-muted"' : 'href="?p=' . $page-1 . '"'?>><- Letzte Seite</a>
          <span class="text-muted"> <?php echo $page ?> </span>
          <a <?=($page == $max_page) ? 'class="text-muted"' : 'href="?p=' . $page+1 . '"'?>>Nächste Seite -></a>
        </div>

      </main>
      </div>
    </div>
  

  <!-- Footer -->
  <?php include 'php/footer.php' ?>
  </div>

  <!-- Bootstrap Scripts -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>
