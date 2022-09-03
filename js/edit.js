// assign droplist to the `select` variable
const select = document.querySelector("#country");

// get the option element that should be selected
const selectedOption = document.querySelector(
  `option[value='${select.getAttribute("value")}']`
);

// set attribute `selected` to selectedOption
selectedOption.setAttribute("selected", "");

// get address input elements
const latInput = document.getElementById("lat");
const lngInput = document.getElementById("lng");

// function for init map
function initMap() {
  // The location of Uluru
  const uluru = { lat: +latInput.value, lng: +lngInput.value };

  // The map, centered at Uluru
  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 4,
    center: uluru,
  });

  // The marker, positioned at Uluru
  const marker = new google.maps.Marker({
    position: uluru,
    map: map,
    draggable: true,
  });

  // assign the position of the marker to value attributes of address elements
  google.maps.event.addListener(marker, "drag", function (event) {
    latInput.value = this.position.lat();
    lngInput.value = this.position.lng();
  });

  // assign the value attributes of address elements to position of the marker, when changing the first
  latInput.addEventListener("input", (event) => {
    marker.setPosition(
      new google.maps.LatLng(+latInput.value, +lngInput.value)
    );

    // hide the marker when at least one of the fields is empty
    checkingInput(latInput, lngInput, marker);
  });

  lngInput.addEventListener("input", (event) => {
    marker.setPosition(
      new google.maps.LatLng(+latInput.value, +lngInput.value)
    );

    // hide the marker when at least one of the fields is empty
    checkingInput(latInput, lngInput, marker);
  });
}

// hide the marker when at least one of the fields is empty
function checkingInput(lat, lng, marker) {
  if (lat.value == "" || lng.value == "") {
    marker.setVisible(false);
  } else {
    marker.setVisible(true);
  }
}

window.initMap = initMap;
