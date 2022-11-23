<?php
  $current_url = $_SERVER["PHP_SELF"];

  if (strpos($current_url, "index.php") || strpos($current_url, "signup.php") || strpos($current_url, "booking.php")){
    $fixation = '';
  } else {
    $fixation = 'fixed-bottom';
  }
?>

<footer class="container-fluid py-4 bg-dark <?php print($fixation)?>">
  <ul class="d-sm-flex justify-content-center">
    <li class="footer-item d-flex justify-content-center d-sm-block">
      <a href="#">Twitter</a>
    </li>
    <li class="footer-item  d-flex justify-content-center d-sm-block">
      <a href="#">Facebook</a>
    </li>
    <li class="footer-item text-follow-us d-flex justify-content-center d-sm-block">
      Social Media
    </li>
    <li class="footer-item d-flex justify-content-center d-sm-block">
        <a href="#">Instagram</a>
    </li>
    <li class="footer-item d-flex justify-content-center d-sm-block">
        <a href="#">TikTok</a>
    </li>
  </ul>
</footer>