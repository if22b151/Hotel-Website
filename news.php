<?php 
  session_start();
  require_once 'php/scripts/funcs.php';

  $page = get_default($_GET['p'], 1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?php require 'php/head.php'; ?> 
  <title>News</title>
</head>
<body>
  <div class="container-site d-flex flex-column justify-content-between">
    <div class="container-navbar-content d-flex flex-column flex-grow-1">

      <!-- Navbar -->
      <?php include 'php/navbar.php' ?>
        
      <div class="flex-container content-background flex-grow-1">
      <main class="news container py-3 px-4 site_content">
        <h1 class="text-center">Neuigkeiten</h1>
        
        <div class="d-flex flex-column">
          <hr class="article-hr my-3">
          <?php include 'php/templates/newsfeed.php'; ?>
        </div>
        
        <div class="news-nav mt-4 pb-2 d-flex justify-content-between">
          <a <?=($page == 1) ? 'class="disabled"' : 'href="?p='.$page-1 .'" role="button"'?>>
            <i class="fa-solid fa-arrow-left"></i>
          </a>
          <span class="text-muted"> <?php echo $page ?> </span>
          <a <?=($page == $max_page) ? 'class="disabled"' : 'href="?p='.$page+1 .'" role="button"'?>>
            <i class="fa-solid fa-arrow-right"></i>
          </a>
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
