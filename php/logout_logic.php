<?php
$debug = "logout_logic.php loaded";

if($_POST['wants_logout']){
    session_destroy();
}
?>