<?php
    require 'config/connect.php';

    $id = $_GET['id'];
    $sql = "DELETE FROM `meetings` WHERE `meetings`.`id` = '$id'";
    $query = $pdo->prepare($sql);
    $query->execute();

    header('Location: /');

?>