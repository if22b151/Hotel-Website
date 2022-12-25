<?php
function update_field($value, $db, $column){
  // Joins both user and person tables together, then updates the given field
  $sql = "UPDATE `user` u
            JOIN `person` p
            ON u.fk_personid = p.personid  
            SET ".$column." = ?  
            WHERE u.userid = ".$_SESSION['userid'];

  $statement = $db->prepare($sql);
  $statement->bind_param('s', $value);
  $statement->execute();
}

session_start();

require_once 'funcs.php';
require 'dbaccess.php';

// Ensure user is logged in
require_login();

$errors = array();

// Get current data from DB
$db = get_db();
$result = $db->query("SELECT * FROM user, person WHERE user.userid = " . $_SESSION['userid'] . " AND user.fk_personid = person.personid");
$result = $result->fetch_assoc();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  
  $firstname = $_POST['first_name'];
  $lastname = $_POST['last_name'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $gender = $_POST['gender'];
  $new_password = $_POST['new_password'];
  $current_password = $_POST['current_password'];
  
  // Check if correct confirmation password was entered
  if(hash('sha512', $current_password) != $result['password']){
    array_push($errors, "Falsches Passwort");
    return;
  } else {

    $db->autocommit = false;

    // Update fields
    if($firstname){update_field($firstname, $db, 'firstname');}
    if($lastname){update_field($lastname, $db, 'lastname');}
    if($username){update_field($username, $db, 'username');}
    if($gender){update_field($gender, $db, 'gender');}
    if($new_password){update_field(hash('sha512', $new_password), $db, 'password');}
    
    // Check for duplicates where needed
    if($email){
      if(!is_duplicate($email, 's', $db, 'user', 'email')){
        update_field($email, $db, 'email'); 
      } else {
        array_push($errors, "Es existiert bereits ein Konto mit dieser E-Mail");
      }
    }
    
    if($username){
      if(!is_duplicate($username, 's', $db, 'user', 'username')){
        update_field($username, $db, 'username'); 
      } else {
        array_push($errors, "Es existiert bereits ein Konto mit diesem Benutzernamen");
      }
    }
    
    // Commit changes
    if(!empty($errors)){
      return;
    }
    
    if($db->commit() == False){
      array_push($errors, "Fehler bei Verbindung zur Datenbank");
      return;
    }

    header("Location: /profile.php?success");  
  }
}
?>