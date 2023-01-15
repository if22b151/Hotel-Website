<?php
function get_db() : mysqli {
    $SERVERNAME = "localhost";
    $db_server_user = "root";
    $db_server_pwd = "";
    $dbname = "main";

    // Create connection
    $gateway = new mysqli($SERVERNAME, $db_server_user, $db_server_pwd, $dbname);

    // Check connection
    if ($gateway->connect_error) {
        return NULL;
    }

    return $gateway; 
}
?>