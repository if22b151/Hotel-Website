<?php
require_once 'funcs.php';
require 'dbaccess.php';

$email = get_default($_POST['email']);
$password = get_default($_POST['password']);


// Only go past this point if the form has been submitted
if($_SERVER['REQUEST_METHOD'] != 'POST'){
    return;
}

$errors = array();
    
if(empty($email) || empty($password)){
    array_push($errors, "E-Mail und Passwort Feld müssen ausgefüllt sein!");
    return;
}

// Connect to DB
$db = get_db();
if(!$db){
    array_push("Konnte keine Verbindung zur Datenbank herstellen");
    return;
}

// Check against DB
$password_hashed = hash('sha512', $password);

$query = $db->prepare("SELECT userid, username FROM user WHERE email LIKE ? AND password = ?");
$query->bind_param('ss', $email, $password_hashed);
$query->execute();

$result = $query->get_result();
$result = $result->fetch_assoc();

if(isset($result['userid'])){
    $_SESSION['userid'] = $result['userid'];
    $_SESSION['username'] = $result['username'];
} else {
    array_push($errors, "E-Mail oder Passwort stimmen nicht überein!");
}

?>