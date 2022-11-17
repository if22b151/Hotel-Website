<?php
if ($_SERVER['REQUEST_METHOD'] != 'POST'){
    return;
}

include 'funcs.php';

$errors = array();

$room = $_POST['room'];
$date_start = $_POST['date_start'];
$date_end = $_POST['date_end'];
$late_check_out = $_POST['late_check_out'];
$street = $_POST['street'];
$street_nr = $_POST['street_nr'];
$city = $_POST['city'];
$plz = $_POST['plz'];
$country = $_POST['country'];
$phone_nr = $_POST['phone_nr'];
$breakfast = $_POST['breakfast'];
$parking = $_POST['parking'];
$animals = $_POST['animals'];

if(is_empty_any($room, $date_start, $date_end, $street, $street_nr, $city, $plz, $country, $phone_nr)){
    array_push($errors, 'Alle Felder müssen ausgefüllt sein');
    return;
}

if(!in_array($room, array('suite', 'single', 'double'))){
    array_push($errors, 'Falscher Zimmertyp');
}

if(strtotime($date_start) < time()){
    array_push($errors, 'Erster Tag der Buchung liegt in der Vergangenheit');
}

if(strtotime($date_end) < strtotime($date_start)){
    array_push($errors, 'Letzter Tag der Buchung liegt vor erstem Tag');
}

?>