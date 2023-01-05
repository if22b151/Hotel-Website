<?php
require_once 'funcs.php';
require 'dbaccess.php';

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

// Prevents script from continuing if no form has been submitted
if ($_SERVER['REQUEST_METHOD'] != 'POST'){
    return;
}

// Server-side input checks
if(is_empty_any($first_name, $last_name, $username, $email, $password, $password2, $gender)){
    array_push($errors, "Alle Felder müssen ausgefüllt sein");
    return;
}

if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    array_push($errors, "Keine valide E-Mail Addresse");
}

if(strlen($username) < 6 || strlen($username) > 20){
    array_push($errors, "Nutzername muss zwischen 6 und 20 Zeichen betragen");
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

// Connect to DB
$db = get_db();
if(!$db){
    array_push($errors, "Konnte keine Verbindung zur Datenbank herstellen");
    return;
}

// Check against DB to prevent duplicate accounts
if(is_duplicate($email, 's', $db, 'user', 'email')){
    array_push($errors, "Es existiert bereits ein Konto mit dieser E-Mail");
}

if(is_duplicate($username, 's', $db, 'user', 'username')){
    array_push($errors, "Es existiert bereits ein Konto mit diesem Nutzernamen");
}

// Add user to DB
if(empty($errors)){
    $success = True;

    $db->autocommit(False); // Since we have two prepared statements here, if autocommit were turned on,
                            // it would be possible for one statement to execute while the other fails.
                            // We prevent this by manually committing both insert statements at the same time. 

    $statement_person = $db->prepare('INSERT INTO person(firstname, lastname, gender) VALUES (?, ?, ?)');
    $statement_person->bind_param('sss', $first_name, $last_name, $gender);
    $statement_person->execute();


    $password_hash = hash('sha512', $password);
    $fk_person_id = $db->insert_id;

    $statement_user = $db->prepare('INSERT INTO user(fk_personid, username, password, email) VALUES (?, ?, ?, ?)');
    $statement_user->bind_param('isss', $fk_person_id, $username, $password_hash, $email);
    $statement_user->execute();
    
    // Commit changes, check if commit successful
    if(!$db->commit()){
        array_push($errors, 'Fehler bei Verbindung zu Datenbank');
        $db->close();
        return;
    }

    $success = true;
    $db->close();

    // Clear variables so form is blank upon success 
    clear_variables($first_name, $last_name, $username, $email, $gender, $gdpr, $newsletter);
}

?>