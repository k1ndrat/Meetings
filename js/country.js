const countryOptionList = document.querySelectorAll("#country option");

countryOptionList.forEach((countryOption) => {
  if (countryOption.getAttribute("value") != "") {
    countryOption.setAttribute("value", countryOption.innerHTML);
  }
});
