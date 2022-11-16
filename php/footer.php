<?php
  $current_url = htmlspecialchars($_SERVER["PHP_SELF"]);

  if (strpos($current_url, "index.php") || strpos($current_url, "signup.php") || strpos($current_url, "booking.php")){
    $fixation = '';
  } else {
    $fixation = 'fixed-bottom';
  }
?>

<footer class="container-fluid py-4 bg-dark <?php print($fixation)?>">
  <ul>
    <li>
      <a href="#">Twitter</a>
    </li>
    <li>
      <a href="#">Facebook</a>
    </li>
    <li>
        <a href="#">Instagram</a>
    </li>
    <li>
        <a href="#">TikTok</a>
    </li>
  </ul>
</footer>