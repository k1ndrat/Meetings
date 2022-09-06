<?php

class Footer
{
    public function __construct($urlJsList = [])
    {
        $this->urlJsList = $urlJsList;
    }

    public function getFooter()
    { ?>
        </div>
        <?php
        if ($this->urlJsList != []) {
            foreach ($this->urlJsList as $urlJs) { ?>
                <script src="<?= $urlJs ?>"></script>
        <?php }
        } ?>

        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyALHILzUv7JU_Uei-WUn7g3mnD3G0cz5hg&callback=initMap&v=weekly" defer></script>

        </body>

        </html>
<?php
    }
}
