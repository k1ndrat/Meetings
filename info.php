<?php

// connect the database
require 'config/connect.php';

// get the value from the link
$id = $_GET['id'];

// sql query
$sql = "SELECT * FROM `meetings` WHERE `meetings`.`id` = '$id'";
$query = $pdo->prepare($sql);
$query->execute();

// pdo to array
$meet = $query->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <title>Meetings</title>
    <style>
        #map {
            height: 500px;
            width: 100%;
        }
    </style>
</head>

<body>
    <div class="container">
        <h3 class="text-center mt-5">Information about meeting "<?= $meet[0]['title'] ?>"</h3>
        <a href="/" class="btn btn-link mt-2">Back</a>
        <div class="d-flex justify-content-between flex-wrap mt-3">
            <h5 class="w-50">Title: <?= $meet[0]['title'] ?></h5>
            <h5 class="w-50">Date: <?= $meet[0]['date'] ?></h5>

            <!-- checking address -->
            <?php if ($meet[0]['latitude'] != NULL && $meet[0]['longitude'] != NULL) { ?>
                <h5 class="w-50" id="latitude">Latitude: <span><?= $meet[0]['latitude'] ?></span></h5>
                <h5 class="w-50" id="longitude">Longitude: <span><?= $meet[0]['longitude'] ?></span></h5>
            <?php } ?>

            <h5 class="w-50">Country: <?= $meet[0]['country'] ?></h5>
        </div>

        <!-- checking address -->
        <?php if ($meet[0]['latitude'] != NULL && $meet[0]['longitude'] != NULL) { ?>
            <div id="map"></div>
        <?php } ?>

        <a href='delete.php?id=<?= $id ?>' class="btn btn-danger mt-3 mb-5">Delete</a>
    </div>

    <script src="js/info.js"></script>

    <script src="js/map.js"></script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyALHILzUv7JU_Uei-WUn7g3mnD3G0cz5hg&callback=initMap&v=weekly" defer></script>

</body>

</html>