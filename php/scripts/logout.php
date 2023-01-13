<?php
if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['logout'])){
    session_destroy();

    // Reloads current page so logout changes can take effect
    header('location: /index.php');
}
?>