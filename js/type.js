document.addEventListener("DOMContentLoaded", function () {
    // Login Form Validation
    const loginForm = document.querySelector("form");  // Select the login form

    if (loginForm) {
        loginForm.addEventListener("submit", function (event) {
            event.preventDefault();
            const aadhaar = document.querySelector('input[name="Aadhaar_number"]').value.trim();
            const password = document.querySelector('input[name="password"]').value.trim();

            if (!validateAadhaar(aadhaar)) {
                alert("Invalid Aadhaar number! It must be 12 digits.");
                return;
            }
            if (password.length < 6) {
                alert("Password must be at least 6 characters long.");
                return;
            }

            alert("Login Successful!");
            loginForm.submit(); // Submit after validation
        });
    }

    // Registration Form Validation
    const registerForm = document.querySelector(".register form");

    if (registerForm) {
        registerForm.addEventListener("submit", function (event) {
            event.preventDefault();

            const name = document.getElementById("name").value.trim();
            const email = document.getElementById("Email").value.trim();
            const mobile = document.getElementById("mobile number").value.trim();
            const aadhaar = document.getElementById("addharcard_Number").value.trim();
            const password = document.getElementById("Password").value.trim();
            const confirmPassword = document.getElementById("conform Password").value.trim();

            if (name.length < 3) {
                alert("Name must be at least 3 characters long.");
                return;
            }
            if (!validateEmail(email)) {
                alert("Invalid Email Address!");
                return;
            }
            if (!validateMobile(mobile)) {
                alert("Invalid Mobile Number! It must be 10 digits.");
                return;
            }
            if (!validateAadhaar(aadhaar)) {
                alert("Invalid Aadhaar number! It must be 12 digits.");
                return;
            }
            if (password.length < 6) {
                alert("Password must be at least 6 characters long.");
                return;
            }
            if (password !== confirmPassword) {
                alert("Passwords do not match!");
                return;
            }

            alert("Registration Successful!");
            registerForm.submit(); // Submit after validation
        });
    }

    // Function to validate Aadhaar number (must be 12 digits)
    function validateAadhaar(aadhaar) {
        return /^\d{12}$/.test(aadhaar);
    }

    // Function to validate Email format
    function validateEmail(email) {
        return /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/.test(email);
    }

    // Function to validate Mobile Number (must be 10 digits)
    function validateMobile(mobile) {
        return /^[6-9]\d{9}$/.test(mobile);
    }
});
