<?php
require_once 'funcs.php';

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

// Error checking; should only happen once form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
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
}
?>