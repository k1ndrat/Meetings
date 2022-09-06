<?php

require '../components/header.php';
require '../components/footer.php';
require 'edit.php';
require '../components/button.php';

// model
$page = new Edit\Page;
$meeting = $page->getMeeting();

// view
$header = new Header($title = 'Edit meeting');
$header->getHeader();

$btn = new Link\Button($title = 'Back', $href = '/', $class =  'btn btn-link mt-2');
$btn->getButton();

$page->getForm($meeting);

$footer = new Footer($urlJsList = ['../js/country.js', "../js/edit.js"]);
$footer->getFooter();
