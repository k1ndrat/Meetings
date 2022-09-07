<?php

// get the value from the form
$title = htmlspecialchars(trim($_POST['meetTitle']));
$dateOfMeet = $_POST['meetDate'];

$latitude = $_POST['latitude'];
if ($latitude == '') {
    $latitude = NULL;
}

$longitude = $_POST['longitude'];
if ($longitude == '') {
    $longitude = NULL;
}

$country = $_POST['country'];

// validation
if ($title == '') {
    echo 'Please input meet title';
    exit();
} elseif (mb_strlen($title) < 2 || mb_strlen($title) > 255) {
    echo 'Your title shorter than 2 or longer than 255';
    exit();
} elseif ($dateOfMeet == '') {
    echo 'Please input meet date';
    exit();
} elseif ($latitude != NULL && ($latitude < -85.05112873 || $latitude > 85.05112873)) {
    echo 'Your latitude smaller than -85.05112873 or bigger than 85.05112873';
    exit();
} elseif ($longitude != NULL && ($longitude < -180 || $longitude > 180)) {
    echo 'Your longitude smaller than -180 or bigger than 180';
    exit();
} elseif ($country == '') {
    echo 'Please input meet country';
    exit();
}

// connect the database
require $_SERVER['DOCUMENT_ROOT'] . '/config/connect.php';

// sql query
$sql = 'INSERT INTO meetings(title, date, latitude, longitude, country) VALUES(:title, :dateOfMeet, :latitude, :longitude, :country)';
$query = $pdo->prepare($sql);
$query->execute(['title' => $title, 'dateOfMeet' => $dateOfMeet, 'latitude' => $latitude, 'longitude' => $longitude, 'country' => $country]);

// forwarding
header('Location: /create/');
