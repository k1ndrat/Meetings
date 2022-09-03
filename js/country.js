// create an array with all option-country elements
const countryOptionList = document.querySelectorAll("#country option");

// assign the value attribute of the option element the value that is inside the tag
countryOptionList.forEach((countryOption) => {
  if (countryOption.getAttribute("value") != "") {
    countryOption.setAttribute("value", countryOption.innerHTML);
  }
});

