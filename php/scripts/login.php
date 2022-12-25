<?php
require_once 'funcs.php';
require 'dbaccess.php';

$email = get_default($_POST['email']);
$password = get_default($_POST['password']);


$errors = array();

if(isset($_GET['access_denied'])){
    array_push($errors, "Login benötigt");
}

// Only go past this point if the form has been submitted
if($_SERVER['REQUEST_METHOD'] != 'POST'){
    return;
}
    
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

// Check if valid user
$password_hashed = hash('sha512', $password);

$query = $db->prepare("SELECT userid, username FROM user WHERE email LIKE ? AND password = ?");
$query->bind_param('ss', $email, $password_hashed);
$query->execute();

$result = $query->get_result();
$result = $result->fetch_assoc();

if($result['userid']){
    $_SESSION['userid'] = $result['userid'];
    $_SESSION['username'] = $result['username'];

    // Check for admin privileges
    if($db->query("SELECT fk_userid FROM admin WHERE fk_userid = " . $result['userid'])->num_rows){
        $_SESSION['is_admin'] = true;
    }

    // If user was redirected to login page because of insufficient privileges, redirect the user back to the page they meant to access
    if(isset($_GET['access_denied'])){
        header('Location: '.$_GET['access_denied']);
    }
} else {
    array_push($errors, "E-Mail oder Passwort stimmen nicht überein!");
}

$db->close();
?>