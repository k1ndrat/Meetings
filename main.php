<?php

namespace Main;

class Page
{
    public function getAllMeetings()
    {
        // connect the database
        require 'config/connect.php';

        // sql query
        $query = $pdo->query('SELECT * FROM `meetings` ORDER BY id DESC');

        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function viewOfMeeting($row)
    { ?>
        <div class="card mt-4" style="width: 100%;">
            <div class="card-body">
                <h5 class="card-title"><?php echo $row['title'] ?></h5>
                <p class="card-text"><?php echo $row['date'] ?></p>
                <a href='info/?id=<?= $row['id'] ?>' class="btn btn-primary mr-1">More Details</a>
                <a href='edit/?id=<?= $row['id'] ?>' class="btn btn-primary mr-1">Edit</a>
                <a href='delete/?id=<?= $row['id'] ?>' class="btn btn-danger">Delete</a>
            </div>
        </div>
<?php
    }

    public function viewOfAllMeeting($allMeetings)
    {
        foreach ($allMeetings as $row) {
            $this->viewOfMeeting($row);
        }
    }
}
