<?php
require 'funcs.php';

$first_name = get_default($_POST['first_name']);
$last_name = get_default($_POST['last_name']);
$username = get_default($_POST['username']);
$email = get_default($_POST['email']);
$password = get_default($_POST['password']);
$password2 = get_default($_POST['password2']);
$gender = get_default($_POST['gender']);
$gdpr = get_default($_POST['gdpr']);
$newsletter = get_default($_POST['newsletter']);

$errors = array();
$success = false;

// Error checking; should only happen when form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(is_empty_any($first_name, $last_name, $username, $email, $password, $password2, $gender)){
        array_push($errors, "Alle Felder müssen ausgefüllt sein");
        return;
    }

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        array_push($errors, "Keine valide E-Mail Addresse");
    }

    if(strlen($password) <= 8){
        array_push($errors, "Passwort muss länger als 8 Zeichen sein");
    }

    if($password !== $password2){
        array_push($errors, "Passwörter stimmen nicht überein");
    }

    if(empty($gdpr)){
        array_push($errors, "Datenschutzerklärung muss akzeptiert werden");
    }
    

    if(empty($errors)){
        $success = true;
    }
}
?>