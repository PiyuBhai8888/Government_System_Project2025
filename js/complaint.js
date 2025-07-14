document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("complaintForm");

    form.addEventListener("submit", function (e) {
        // Basic front-end validation
        const phone = document.getElementById("phone").value;
        const aadhar = document.getElementById("aadhar").value;
        const pan = document.getElementById("pan").value;

        // Validate phone
        if (!/^\d{10}$/.test(phone)) {
            alert("Please enter a valid 10-digit phone number.");
            e.preventDefault();
            return;
        }

        // Validate Aadhar
        if (!/^\d{12}$/.test(aadhar)) {
            alert("Please enter a valid 12-digit Aadhar number.");
            e.preventDefault();
            return;
        }

        // Validate PAN
        if (!/^[A-Z]{5}\d{4}[A-Z]$/.test(pan)) {
            alert("Please enter a valid PAN number (e.g., ABCDE1234F).");
            e.preventDefault();
            return;
        }

        // Confirm submission
        const confirmSubmit = confirm("Are you sure you want to submit the complaint?");
        if (!confirmSubmit) {
            e.preventDefault(); // Cancel form submission
        }
    });
});
