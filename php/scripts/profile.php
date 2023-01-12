<?php
require_once 'funcs.php';
require 'dbaccess.php';


function update_field($value, $mysqli_gateway, $column, $param_string='s'){
  // Joins both user and person tables together, then updates the given field
  // TODO: Use a view for this
  GLOBAL $userid;

  $sql = "UPDATE `user` u
            JOIN `person` p
            ON u.fk_personid = p.personid  
            SET ".$column." = ?  
            WHERE u.userid = ".$userid;

  $statement = $mysqli_gateway->prepare($sql);
  $statement->bind_param($param_string, $value);
  $statement->execute();
}


session_start();

$errors = array();


$admin_edit_mode = False;
// Ensure user has the right permissions
if(isset($_GET['edit'])){
  // If admin wants to edit a user
  require_admin();
  $userid = $_GET['edit'];
  $admin_edit_mode = True;
} else {
  // If user wants to edit themselves
  require_login();
  $userid = $_SESSION['userid'];
}

print($userid);

// Get current data from DB
$db = get_db();
$user_details = $db->query("SELECT * FROM user, person WHERE user.userid = " . $userid . " AND user.fk_personid = person.personid");
$user_details = $user_details->fetch_assoc();


if(empty($user_details)){
  array_push($errors, 'Couldn\'t find user in database');
}


// Only continue if form has been sent
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  // Prevent input from being lost upon reloading the page; input should stay on form in case of error
  $firstname = $_POST['first_name'];
  $lastname = $_POST['last_name'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $gender = $_POST['gender'];
  $new_password = $_POST['new_password'];
  $current_password = $_POST['current_password'];
  $status = get_default($_POST['status']);  // Since status selection only exist for admins
  
  // Check confirmation password
  if($admin_edit_mode){
    $admin_password = $db->query("SELECT `password` FROM user WHERE userid = ".$_SESSION['userid'])->fetch_array(MYSQLI_NUM)[0];
    if(hash('sha512', $current_password) != $admin_password){
      array_push($errors, "Falsches Passwort");
      return;
    }
  } else {
    // If a user is trying to make a change
    if(hash('sha512', $current_password) != $user_details['password']){
      array_push($errors, "Falsches Passwort");
      return;
    }
  }

  $db->autocommit = False;

  // Update fields
  if($firstname){update_field($firstname, $db, 'firstname');}
  if($lastname){update_field($lastname, $db, 'lastname');}
  if($username){update_field($username, $db, 'username');}
  if($gender){update_field($gender, $db, 'gender');}
  if($new_password){update_field(hash('sha512', $new_password), $db, 'password');}
  if($admin_edit_mode){
    update_field($status, $db, 'status', 'i');  // No check whether var is set, as dropdown menus are always set to a value
  }

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
  if(empty($errors)){
    $db->commit();
    
    if($admin_edit_mode){
      header("Location: /user/profile.php?success&edit=".$userid);  
    } else {
      header("Location: /user/profile.php?success");  
    }
    return;
    }
  }
?>