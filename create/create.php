<?php

namespace Create;

class Page
{
    public function getForm()
    { ?>
        <form action="add.php" method="post" class="d-flex justify-content-between flex-wrap mt-3">
            <input class="form-control" type="text" name="meetTitle" id="title" placeholder="Please input meeting title">

            <div class="invalid-feedback w-100 mb-0 mt-2" id="titleFeedback" role="alert"></div>

            <input type="date" class="form-control mt-2" name="meetDate" style="width: 49%;">

            <input class="form-control mt-2" min="-85.05112873" max="85.05112873" type="number" step="any" id="lat" name="latitude" placeholder="Please input latitude" style="width: 49%;">

            <input class="form-control mt-2" min="-180" max="180" type="number" step="any" id="lng" name="longitude" placeholder="Please input longitude" style="width: 49%;">

            <select class="form-control mt-2" id="country" name="country" style="width: 49%;"></select>

            <div id="map" class="mt-2"></div>

            <button type="submit" class="btn btn-primary mt-3 mb-5">Create</button>
        </form>
<?php
    }
}
