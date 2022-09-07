<!-- controller -->

<?php

require $_SERVER['DOCUMENT_ROOT'] . '/components/header.php';
require $_SERVER['DOCUMENT_ROOT'] . '/components/footer.php';
require $_SERVER['DOCUMENT_ROOT'] . '/main.php';
require $_SERVER['DOCUMENT_ROOT'] . '/components/button.php';

// model
$page = new Main\Page;
$allMeetings = $page->getAllMeetings();

// view
$header = new Header($title = 'List of the all meetigs');
$header->getHeader();

$page->viewOfAllMeeting($allMeetings);

$btn = new Link\Button($title = 'Create new meet', $href = '/create/', $class = 'btn btn-primary mt-4 mb-5');
$btn->getButton();

$footer = new Footer();
$footer->getFooter();
