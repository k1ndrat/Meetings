const select = document.querySelector("#country");

// const value = select.getAttribute("value").toString();

const selectedOption = document.querySelector(
  `option[value='${select.getAttribute("value")}']`
);

selectedOption.setAttribute("selected", "");

const latitude = document
  .querySelector("[name=latitude]")
  .getAttribute("value");

const longitude = document
  .querySelector("[name=longitude]")
  .getAttribute("value");

console.log(latitude);

function initMap() {
  // The location of Uluru

  const uluru = { lat: +latitude, lng: +longitude };
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

  latInput = document.getElementById("lat");
  lngInput = document.getElementById("lng");

  google.maps.event.addListener(marker, "drag", function (event) {
    latInput.value = this.position.lat();
    lngInput.value = this.position.lng();
  });

  latInput.addEventListener("input", (event) => {
    marker.setPosition(
      new google.maps.LatLng(+latInput.value, +lngInput.value)
    );

    if (event.target.value == "") {
      marker.setVisible(false);
    } else {
      marker.setVisible(true);
    }
  });

  lngInput.addEventListener("input", (event) => {
    marker.setPosition(
      new google.maps.LatLng(+latInput.value, +lngInput.value)
    );

    if (event.target.value == "") {
      marker.setVisible(false);
    } else {
      marker.setVisible(true);
    }
  });
}

window.initMap = initMap;
