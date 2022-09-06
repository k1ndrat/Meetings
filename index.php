<?php

require 'components/header.php';
require 'components/footer.php';
require 'main.php';
require 'components/button.php';

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
