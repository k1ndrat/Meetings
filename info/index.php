<!-- controller -->

<?php

require $_SERVER['DOCUMENT_ROOT'] . '/components/header.php';
require $_SERVER['DOCUMENT_ROOT'] . '/components/footer.php';
require $_SERVER['DOCUMENT_ROOT'] . '/info/info.php';
require $_SERVER['DOCUMENT_ROOT'] . '/components/button.php';

// model
$page = new Info\Page;
$meeting = $page->getMeeting();
$title = $meeting[0]['title'];
$id = $meeting[0]['id'];

// view
$header = new Header($title = "Information about meeting '$title' ");
$header->getHeader();

$btn = new Link\Button($title = 'Back', $href = '/', $class = 'btn btn-link mt-2');
$btn->getButton();

$page->getInfo($meeting);

$btn = new Link\Button($title = 'Delete', $href = "../delete/?id=$id", $class = 'btn btn-danger mt-3 mb-5');
$btn->getButton();

$footer = new Footer($urlJsList = ['../js/info.js']);
$footer->getFooter();
