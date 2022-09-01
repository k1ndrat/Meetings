<?php
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

    // echo strlen($title);

    if ($title == '') {
        echo 'Please input meet title';
        exit();
    } elseif (strlen($title) <= 2 || strlen($title) >= 255) {
        echo 'Your title shorter than 2 or longer than 255';
        exit();
    } elseif ($dateOfMeet == '') {
        echo 'Please input meet date';
        exit();
    } elseif ($country == '') {
        echo 'Please input meet country';
        exit();
    }

    require 'config/connect.php';
    
    $sql = 'INSERT INTO meetings(title, date, latitude, longitude, country) VALUES(:title, :dateOfMeet, :latitude, :longitude, :country)';
    $query = $pdo->prepare($sql);
    $query->execute(['title' => $title, 'dateOfMeet' => $dateOfMeet, 'latitude' => $latitude, 'longitude' => $longitude, 'country' => $country]);

    header('Location: create.php');
?>