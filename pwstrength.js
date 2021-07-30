const togglePassword = document.querySelector("#togglePassword");
const password = document.querySelector("#pw");

//REGEX FOR MEDIUM AND STRONG PASSWORD
const strongPassword =
  /(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9])(?=.{8,})/;
const mediumPassword =
  /((?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.{6,}))|((?=.*[0-9])(?=.*[A-Z])(?=.*[^A-Za-z0-9])(?=.{6,}))|((?=.*[a-z])(?=.*[A-Z])(?=.*[^A-Za-z0-9])(?=.{6,}))|((?=.*[0-9])(?=.*[a-z])(?=.*[^A-Za-z0-9])(?=.{6,}))/;

function validate(field, regex) {
  if (regex.test(field.value)) {
    field.className = "valid";
    document.getElementById("submitbutton").disabled = false; //allow user to save if form fields are valid
  } else {
    field.className = "invalid";
    document.getElementById("submitbutton").disabled = true; //prevent user from saving if form fields are invalid
  }
}

// CHECK STRENGTH
document.getElementById("pw").addEventListener("keyup", (e) => {
  document.querySelector("i").innerText = "SHOW";

  const passwordbox = e.target.value;

  if (strongPassword.test(passwordbox)) {
    document.getElementById("strength").className = "green";
    strength = "strong";
  } else if (mediumPassword.test(passwordbox)) {
    document.getElementById("strength").className = "orange";
    strength = "medium";
  } else {
    document.getElementById("strength").className = "red";
    strength = "weak";
  }

  if (strength === "weak") {
    document.querySelectorAll("td")[0].className = "weak";
    document.querySelectorAll("td")[1].className = "neutral";
    document.querySelectorAll("td")[2].className = "neutral";
  } else if (strength === "medium") {
    document.querySelectorAll("td")[0].className = "weak";
    document.querySelectorAll("td")[1].className = "medium";
    document.querySelectorAll("td")[2].className = "neutral";
  } else {
    document.querySelectorAll("td")[0].className = "weak";
    document.querySelectorAll("td")[1].className = "medium";
    document.querySelectorAll("td")[2].className = "strong";
  }

  document.getElementById("strength").innerHTML =
    "<p style='text-align:center'>Your password is " + strength + "</p>";

  if (passwordbox === "") {
    document.querySelector("i").innerText = "";
    document.querySelectorAll("td")[0].className = "neutral";
    document.querySelectorAll("td")[1].className = "neutral";
    document.querySelectorAll("td")[2].className = "neutral";
    document.getElementById("strength").innerHTML = "";
  }
});

// SHOW OR HIDE PASSWORD
togglePassword.addEventListener("click", function (e) {
  const type =
    password.getAttribute("type") === "password" ? "text" : "password";
  password.setAttribute("type", type);
  if (type === "text") {
    document.querySelector("i").innerText = "HIDE";
  } else {
    document.querySelector("i").innerText = "SHOW";
  }
});
