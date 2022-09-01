<?php
    
    $id = $_POST['id'];
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

    if ($title == '') {
        echo 'Please input meet title';
        exit();
    } elseif (strlen($title) < 2 || strlen($title) > 255) {
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
    
    $sql = "UPDATE `meetings` SET `title` = ?, `date` = ? ,`latitude` = ? ,`longitude` = ? ,`country` = ? WHERE `meetings`.`id` = ?";
    $query = $pdo->prepare($sql);
    // $query->execute(['title' => $title, 'dateOfMeet' => $dateOfMeet, 'latitude' => $latitude, 'longitude' => $longitude, 'country' => $country]);
    $query->execute([$title, $dateOfMeet, $latitude, $longitude, $country, $id]);

    header('Location: /');
?>