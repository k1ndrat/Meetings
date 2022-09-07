<?php

namespace Edit;

class Page
{
    public function getMeeting()
    {
        // connect the database
        require $_SERVER['DOCUMENT_ROOT'] . '/config/connect.php';

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

    public function getForm($meet)
    { ?>
        <form action="update.php" method="post" class="d-flex justify-content-between flex-wrap mt-3">
            <input type="hidden" name="id" value="<?= $meet[0]['id'] ?>">
            <input class="form-control" type="text" id="title" name="meetTitle" placeholder="Please input meeting title" value="<?= htmlspecialchars($meet[0]['title']) ?>">

            <div class="invalid-feedback w-100 mb-0 mt-2" id="titleFeedback" role="alert"></div>

            <input type="date" class="form-control mt-2" name="meetDate" style="width: 49%; " value="<?= $meet[0]['date'] ?>">

            <input class="form-control mt-2" min="-85.05112873" max="85.05112873" type="number" step="any" id="lat" name="latitude" placeholder="Please input latitude" style="width: 49%;" value="<?= $meet[0]['latitude'] ?>">

            <input class="form-control mt-2" min="-180" max="180" type="number" step="any" id="lng" name="longitude" placeholder="Please input longitude" style="width: 49%;" value="<?= $meet[0]['longitude'] ?>">

            <select class="form-control mt-2" id="country" name="country" style="width: 49%;" value="<?= $meet[0]['country'] ?>"></select>

            <div id="map" class="mt-2"></div>

            <a href='../delete/?id=<?= $meet[0]['id'] ?>' class="btn btn-danger mt-3 mb-5">Delete</a>

            <button type="submit" class="btn btn-primary mt-3 mb-5">Save</button>
        </form>
<?php
    }
}
