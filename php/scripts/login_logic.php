<?php
// Placeholder data
$valid_user = array(
    'usr_id'=>'sampleHex', 
    'name'=>'admin', 
    'email'=>'admin', 
    'pw'=>'admin'
);

require 'funcs.php';

$email = get_default($_POST['email']);
$pw = get_default($_POST['password']);

$errors = array();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
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
    
}

?>