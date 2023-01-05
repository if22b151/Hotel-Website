<?php
require_once 'funcs.php';
require 'dbaccess.php';

$DEFAULT_STATUS = 'Neu';


function get_option_sql($booking_id, $option){
    // Return SQL to run for adding selected options to the database
    return "INSERT INTO booking_options VALUES (".$booking_id.", ".$option.")";
}


// Send user to login page if not logged in
require_login();


// Connect to DB
$db = get_db();
if(!$db){
    array_push($errors, "Konnte keine Verbindung zu Datenbank herstellen");
    return;
}

// Get current bookings
$sql = "SELECT * FROM booking 
        WHERE fk_userid = " . $_SESSION['userid'] . " 
        AND depart_day > " . time() - 86400;  // 86400s = 24h
        $bookings = $db->query($sql)->fetch_all(MYSQLI_ASSOC);  // Return all rows as an array of associative arrays
        
// Check for prior bookings
$has_prior_bookings = False;

$sql = "SELECT count(bookingid) FROM booking WHERE fk_userid = " . $_SESSION['userid'];
$result = $db->query($sql)->fetch_array();

if($result > sizeof($bookings)){
    $has_prior_bookings = True;
}
        
// Make form retain entered information
$errors = array();

$room = get_default($_POST['room']);
$date_start = get_default($_POST['date_start']);
$date_end = get_default($_POST['date_end']);
$late_check_out = get_default($_POST['late_check_out']);
$street = get_default($_POST['street']);
$street_nr = get_default($_POST['street_nr']);
$city = get_default($_POST['city']);
$plz = get_default($_POST['plz']);
$country = get_default($_POST['country']);
$phone_nr = get_default($_POST['phone_nr']);
$breakfast = get_default($_POST['breakfast']);
$parking = get_default($_POST['parking']);
$animals = get_default($_POST['animals']);

// Everything beyond this point should only happen once form has been submitted
if (!isset($_POST['submit'])){
    return;
}

// Error checking
if(is_empty_any($room, $date_start, $date_end, $street, $street_nr, $city, $plz, $country, $phone_nr)){
    array_push($errors, 'Alle Felder müssen ausgefüllt sein');
    return;
}
if(!in_array($room, array(1, 2, 3))){
    array_push($errors, 'Falscher Zimmertyp');
}
if(strtotime($date_start) < time()){
    array_push($errors, 'Erster Tag der Buchung liegt in der Vergangenheit');
}
if(strtotime($date_end) < strtotime($date_start)){
    array_push($errors, 'Letzter Tag der Buchung liegt vor erstem Tag');
}

if(!empty($errors)){
    // Errors found, so throw user back to fill-out
    return;
}

// Add to DB
$db->autocommit(False);

$sql = 'INSERT INTO booking(fk_userid, fk_roomtypeid, `status`, reservation_date, arrive_day, depart_day, `address`, country, plz, phone_number) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
$stmt_booking = $db->prepare($sql);
$stmt_booking->bind_param('iisiiisssi', $_SESSION['userid'], $room, $DEFAULT_STATUS, $reservation_date, $date_start, $date_end, $address, $country, $plz, $phone_nr);

// Some necessary transformations before execution of prepared statement
$room = (int) $room; 
$reservation_date = time();

$address = $street . ' ' . $street_nr;

$date_start = DateTime::createFromFormat('Y-m-d', $date_start);
$date_start = $date_start->getTimestamp();

$date_end = DateTime::createFromFormat('Y-m-d', $date_end);
$date_end = $date_end->getTimestamp();

// Add into booking
$stmt_booking->execute();
$booking_id = $db->insert_id;

// Add options
if($breakfast){
    $db->query(get_option_sql($booking_id, 1));
}
if($late_check_out){
    $db->query(get_option_sql($booking_id, 2));
}
if($parking){
    $db->query(get_option_sql($booking_id, 3));
}
if($animals){
    $db->query(get_option_sql($booking_id, 4));
}

// Commit to DB
if(!$db->commit()){
    array_push($errors, 'Fehler bei Verbindung zu Datenbank');
    $db->close();
    return;
}

$success = True;
clear_variables($room, $date_start, $date_end, $late_check_out, $street, $street_nr, $city, $plz, $country, $phone_nr, $breakfast, $parking, $animals);
?>