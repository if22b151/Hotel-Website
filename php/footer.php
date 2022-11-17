<?php
  $current_url = $_SERVER["PHP_SELF"];

  if (strpos($current_url, "index.php") || strpos($current_url, "signup.php") || strpos($current_url, "booking.php")){
    $fixation = '';
  } else {
    $fixation = 'fixed-bottom';
  }
?>

<footer class="container-fluid py-4 bg-dark <?php print($fixation)?>">
  <ul class="">
    <li class="footer-item">
      <a href="#">Twitter</a>
    </li>
    <li class="footer-item">
      <a href="#">Facebook</a>
    </li>
    <li class="footer-item text-follow-us">
      Social Media
    </li>
    <li class="footer-item">
        <a href="#">Instagram</a>
    </li>
    <li class="footer-item">
        <a href="#">TikTok</a>
    </li>
  </ul>
</footer>