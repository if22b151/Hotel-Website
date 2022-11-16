<?php
$debug = "login_logic.php loaded";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // Placeholder
    $valid_user = array(
        'usr_id'=>'sampleHex', 
        'name'=>'admin', 
        'email'=>'admin', 
        'pw'=>'admin'
    ); 
    
    $errors = array();
    
    $email = $_POST['email'];
    $pw = $_POST['password'];
    
    if(empty($email) || empty($pw)){
        array_push($errors, "E-Mail und Passwort Feld müssen ausgefüllt sein!");
        return;
    }

    if($email == $valid_user['email'] && $pw == $valid_user['pw']){
        $_SESSION['id'] = $valid_user['usr_id'];
        $_SESSION['name'] = $valid_user['name'];
        
        // Clear errors
        $errors = array();
    } else {
        array_push($errors, "E-Mail oder Passwort stimmen nicht überein!");
    }
    
} elseif($_GET['logout'] == TRUE){
    session_destroy();
}

?>