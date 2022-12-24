<?php
function get_db() : mysqli {
    $servername = "localhost";
    $db_server_user = "root";
    $db_server_pwd = "rmfAJVWkm&ze5!eLz$7SLL@nUSxpGJ";
    $dbname = "main";

    // Create connection
    $gateway = new mysqli($servername, $db_server_user, $db_server_pwd, $dbname);

    // Check connection
    if ($gateway->connect_error) {
        return NULL;
    }

    return $gateway; 
}
?>