<?php

// get the value from the form
$title = $_POST['meetTitle'];
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
} elseif ($country == '') {
    echo 'Please input meet country';
    exit();
}

// connect the database
require 'config/connect.php';

// sql query
$sql = 'INSERT INTO meetings(title, date, latitude, longitude, country) VALUES(:title, :dateOfMeet, :latitude, :longitude, :country)';
$query = $pdo->prepare($sql);
$query->execute(['title' => $title, 'dateOfMeet' => $dateOfMeet, 'latitude' => $latitude, 'longitude' => $longitude, 'country' => $country]);

// forwarding
header('Location: create.php');
