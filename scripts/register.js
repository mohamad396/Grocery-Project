const logregBox = document.querySelector(".logreg-box");
const loginLink = document.querySelector(".login-link");
const registerLink = document.querySelector(".register-link");
const loginForm = document.querySelector(".login form");
const registerForm = document.querySelector(".register form");

// Corrected the typo here
registerLink.addEventListener("click", () => {
    logregBox.classList.add("active");
});

loginLink.addEventListener("click", () => {
    logregBox.classList.remove("active");
});

registerForm.addEventListener("submit", e => {
 const passwordInput = registerForm.querySelector(".psw");
 const confirmPasswordInput = registerForm.querySelector(".conf-psw");
 const termsAndConditionsCheckbox = registerForm.querySelector(".remember-forgot input");

 if (passwordInput.value !== confirmPasswordInput.value) {
  e.preventDefault();
  alert("Password in \"Confirm Password\" field does not match actual password.");
 }

 if (!termsAndConditionsCheckbox.checked) {
  e.preventDefault();
  alert("Must accept the terms and conditions to register.");
 }
});