<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <title>Meetings</title>
</head>

<body>
    <div class="container">
        <h3 class="text-center mt-5 mb-5">List of the all meetigs</h3>

        <?php
        // connect the database
        require 'config/connect.php';

        // sql query
        $query = $pdo->query('SELECT * FROM `meetings` ORDER BY id DESC');

        while ($row = $query->fetch(PDO::FETCH_OBJ)) { ?>
            <div class="card mt-4" style="width: 100%;">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $row->title ?></h5>
                    <p class="card-text"><?php echo $row->date ?></p>
                    <a href='info.php?id=<?= $row->id ?>' class="btn btn-primary mr-1">More Details</a>
                    <a href='edit.php?id=<?= $row->id ?>' class="btn btn-primary mr-1">Edit</a>
                    <a href='delete.php?id=<?= $row->id ?>' class="btn btn-danger">Delete</a>
                </div>
            </div>
        <?php } ?>

        <a href="create.php" class="btn btn-primary mt-4 mb-5">Create new meet</a>
    </div>
</body>

</html>