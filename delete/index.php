<?php

// connect the database
require $_SERVER['DOCUMENT_ROOT'] . '/config/connect.php';

// get the value from the link
$id = $_GET['id'];

// sql query
$sql = "DELETE FROM `meetings` WHERE `meetings`.`id` = '$id'";
$query = $pdo->prepare($sql);
$query->execute();

// forwarding
header('Location: /');
