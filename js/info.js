// take the value of the address from the form
const latitude = document.querySelector("#latitude span").innerHTML;
const longitude = document.querySelector("#longitude span").innerHTML;

// function for init map
function initMap() {
  // The location of Uluru
  const uluru = { lat: +latitude, lng: +longitude };

  // The map, centered at Uluru
  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 10,
    center: uluru,
  });

  // The marker, positioned at Uluru
  const marker = new google.maps.Marker({
    position: uluru,
    map: map,
  });
}

window.initMap = initMap;
