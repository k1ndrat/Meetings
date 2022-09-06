<!-- controller -->

<?php

require '../components/header.php';
require '../components/footer.php';
require 'create.php';
require '../components/button.php';

// view
$header = new Header($title = 'Create new meeting');
$header->getHeader();

$btn = new Link\Button($title = 'Back', $href = '/', $class = 'btn btn-link mt-2');
$btn->getButton();

$page = new Create\Page;
$page->getForm();

$footer = new Footer($urlJsList = ["../js/create.js", "../js/country.js", "../js/title_valid.js"]);
$footer->getFooter();
