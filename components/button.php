<?php

namespace Link;

class Button
{
    public function __construct($title, $href, $class = "btn btn-primary")
    {
        $this->title = $title;
        $this->href = $href;
        $this->class = $class;
    }

    public function getButton()
    { ?>
        <a href=<?= $this->href ?> class='<?= $this->class ?>'>
            <?= $this->title ?>
        </a>
<?php
    }
}
