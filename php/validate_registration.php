<?php
if ($_SERVER['REQUEST_METHOD'] != 'POST'){
    return;
}

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$password2 = $_POST['password2'];
$gender = $_POST['gender'];
$gdpr = $_POST['gdpr'];
$newsletter = $_POST['newsletter'];

$errors = array();
$success = false;

if(empty($first_name) || empty($last_name) || empty($username) || empty($email) || empty($password) || empty($password2) || empty($gender)) {
    array_push($errors, "Alle Felder müssen ausgefüllt sein");
    return;
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

if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    array_push($errors, "Keine valide E-Mail Addresse");
}


if(empty($errors)){
    $success = true;
}

?>