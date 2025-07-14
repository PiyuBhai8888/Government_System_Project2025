document
  .getElementById("forgotPasswordForm")
  .addEventListener("submit", function (event) {
    event.preventDefault();

    let email = document.getElementById("email").value;
    let message = document.getElementById("message");

    if (validateEmail(email)) {
      message.style.color = "white";
      message.textContent = "Password reset link sent to your email!";
      // Simulate sending an email (in a real scenario, use a backend API)
    } else {
      message.style.color = "red";
      message.textContent = "Please enter a valid email!";
    }
  });

// Email validation function
function validateEmail(email) {
  let regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return regex.test(email);
}
