document.addEventListener("DOMContentLoaded", function () {
    const loginForm = document.querySelector("form");
    const aadhaarInput = document.querySelector("input[name='Aadhaar_number']");
    const passwordInput = document.querySelector("input[name='password']");
    
    loginForm.addEventListener("submit", function (event) {
        event.preventDefault(); // Prevent form submission
        
        const aadhaar = aadhaarInput.value.trim();
        const password = passwordInput.value.trim();

        // Aadhaar Number Validation (Must be 12 digits)
        const aadhaarPattern = /^[0-9]{12}$/;
        if (!aadhaarPattern.test(aadhaar)) {
            alert("Please enter a valid 12-digit Aadhaar number.");
            return;
        }

        // Password Validation (Minimum 6 characters)
        if (password.length < 6) {
            alert("Password must be at least 6 characters long.");
            return;
        }

        // If validation passes, proceed with login (e.g., send data to server)
        alert("Login successful! Redirecting...");
        window.location.href = "dashboard.html"; // Redirect to the dashboard (Change accordingly)
    });
});
