document.addEventListener("DOMContentLoaded", function () {
    const registerForm = document.querySelector("form");

    registerForm.addEventListener("submit", function (event) {
        event.preventDefault(); // Prevent form submission for validation
        const name = document.getElementById("name").value.trim();
        const email = document.getElementById("email").value.trim(); // ✅ lowercase
        const mobile = document.getElementById("mobile_number").value.trim(); // ✅ valid ID
        // Removed unused 'address' variable declaration
        const panCard = document.getElementById("pan_number").value.trim(); // ✅ valid ID
        const aadhaar = document.getElementById("aadhaar_number").value.trim(); // ✅ valid ID
        const password = document.getElementById("password").value.trim(); // ✅ lowercase
        const confirmPassword = document.getElementById("confirm_password").value.trim(); // ✅ lowercase

        // Name Validation
        const namePattern = /^[A-Za-z\s]+$/;
        if (!namePattern.test(name)) {
            alert("Please enter a valid name (letters only).");
            return;
        }

        // Email Validation
        const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        if (!emailPattern.test(email)) {
            alert("Please enter a valid email.");
            return;
        }

        // Mobile Number Validation (10 digits)
        const mobilePattern = /^\d{10}$/;
        if (!mobilePattern.test(mobile)) {
            alert("Please enter a valid 10-digit mobile number.");
            return;
        }

        // PAN Card Validation
        const panPattern = /^[A-Z]{5}\d{4}[A-Z]$/;
        if (!panPattern.test(panCard)) {
            alert("Please enter a valid PAN number (e.g., ABCDE1234F).");
            return;
        }

        // Aadhaar Validation
        const aadhaarPattern = /^\d{12}$/;
        if (!aadhaarPattern.test(aadhaar)) {
            alert("Please enter a valid 12-digit Aadhaar number.");
            return;
        }

        // Password Length
        if (password.length < 6) {
            alert("Password must be at least 6 characters long.");
            return;
        }

        // Password Match
        if (password !== confirmPassword) {
            alert("Passwords do not match.");
            return;
        }
        alert("Registration Successful! Submitting form...");
        registerForm.submit(); // ✅ Allow form to submit
    });
        // All validations passed
        document.querySelector('button[type="submit"]').addEventListener("click", function () {
            registerForm.submit();
        });

    // Optional: Reset handler
    document.querySelector('button[type="reset"]').addEventListener("click", function () {
        registerForm.reset();
    });
});
