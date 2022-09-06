<?php

namespace Info;

class Page
{
    public function getMeeting()
    {
        // connect the database
        require '../config/connect.php';

        // get the value from the link
        $id = $_GET['id'];

        // sql query
        $sql = "SELECT * FROM `meetings` WHERE `meetings`.`id` = '$id'";
        $query = $pdo->prepare($sql);
        $query->execute();

        // pdo to array
        $meet = $query->fetchAll(\PDO::FETCH_ASSOC);

        return $meet;
    }

    public function getInfo($meet)
    { ?>
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
<?php
    }
}
