// get title input
const titleInput = document.querySelector("#title");

// get alert about input.value
const alert = document.querySelector(".alert");
// set attribute `hidden` to alert
alert.hidden = true;

// show alert with right error if it(error) exists
titleInput.addEventListener("input", (event) => {
  const { target } = event;
  const { value } = target;

  let errorText = "";

  if (value == "") {
    errorText = "You have not inputted a title for the meeting!";
    alert.innerText = errorText;
    alert.hidden = false;
  } else if (value.length < 2 || value.length > 255) {
    errorText = "Your title shorter than 2 or longer than 255!";
    alert.innerText = errorText;
    alert.hidden = false;
  } else {
    errorText = "";
    alert.innerText = errorText;
    alert.hidden = true;
  }
});
