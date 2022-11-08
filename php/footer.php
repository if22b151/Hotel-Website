<?php
  $current_url = htmlspecialchars($_SERVER["PHP_SELF"]);
  
  if (strpos($current_url, "index.php")){
    $fixation = '';
  } else {
    $fixation = 'fixed-bottom';
  }
?>

<footer class="container-fluid py-4 bg-dark <?php print($fixation)?>">
  <div class="container">
    <div class="row">
    <div class="col-3">
        <a href="#">Twitter</a>
    </div>
    <div class="col-3">
        <a href="#">Facebook</a>
    </div>
    <div class="col-3">
        <a href="#">Instagram</a>
    </div>
    <div class="col-3">
        <a href="#">TikTok</a>
    </div>
    </div>
  </div>
</footer>