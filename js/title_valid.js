// get title input
const titleInput = document.querySelector("#title");

// get alert about input.value
const alert = document.querySelector("#titleFeedback");
// set attribute `hidden` to alert
alert.hidden = true;

// show alert with right error if it(error) exists
titleInput.addEventListener("input", (event) => {
  const { target } = event;
  const { value } = target;

  let errorText = "";

  if (value == "") {
    if (target.classList.contains("is-valid")) {
      target.classList.remove("is-valid");
    }
    target.classList.add("is-invalid");
    errorText = "You have not inputted a title for the meeting!";
    alert.innerText = errorText;
    alert.hidden = false;
  } else if (value.length < 2 || value.length > 255) {
    if (target.classList.contains("is-valid")) {
      target.classList.remove("is-valid");
    }
    target.classList.add("is-invalid");
    errorText = "Your title shorter than 2 or longer than 255!";
    alert.innerText = errorText;
    alert.hidden = false;
  } else {
    if (target.classList.contains("is-invalid")) {
      target.classList.remove("is-invalid");
    }
    target.classList.add("is-valid");
    errorText = "";
    alert.innerText = errorText;
    alert.hidden = true;
  }
});
