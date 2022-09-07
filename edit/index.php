<!-- controller -->

<?php

require $_SERVER['DOCUMENT_ROOT'] . '/components/header.php';
require $_SERVER['DOCUMENT_ROOT'] . '/components/footer.php';
require $_SERVER['DOCUMENT_ROOT'] . '/edit/edit.php';
require $_SERVER['DOCUMENT_ROOT'] . '/components/button.php';

// model
$page = new Edit\Page;
$meeting = $page->getMeeting();

// view
$header = new Header($title = 'Edit meeting');
$header->getHeader();

$btn = new Link\Button($title = 'Back', $href = '/', $class =  'btn btn-link mt-2');
$btn->getButton();

$page->getForm($meeting);

$footer = new Footer($urlJsList = ['../js/country.js', "../js/edit.js", "../js/title_valid.js"]);
$footer->getFooter();
