<?php

class Header
{
    public function __construct($title)
    {
        $this->title = $title;
    }

    public function getHeader()
    {
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
                <h3 class="text-center mt-5 mb-5"><?= $this->title; ?></h3>

        <?php
    }
}
