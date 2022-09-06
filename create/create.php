<?php

namespace Create;

class Page
{
    public function getForm()
    { ?>
        <form action="add.php" method="post" class="d-flex justify-content-between flex-wrap mt-3">
            <input class="form-control" type="text" name="meetTitle" placeholder="Please input meeting title">

            <input type="date" class="form-control mt-2" name="meetDate" style="width: 49%;">

            <input class="form-control mt-2" type="number" step="any" id="lat" name="latitude" placeholder="Please input latitude" style="width: 49%;">

            <input class="form-control mt-2" type="number" step="any" id="lng" name="longitude" placeholder="Please input longitude" style="width: 49%;">

            <select class="form-control mt-2" id="country" name="country" style="width: 49%;">

            </select>

            <div id="map" class="mt-2"></div>

            <button type="submit" class="btn btn-primary mt-3 mb-5">Create</button>
        </form>
<?php
    }
}
