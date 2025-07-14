document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('complaintForm');
    const nameInput = document.getElementById('name');
    const emailInput = document.getElementById('email');
    const phoneInput = document.getElementById('phone');
    const categoryInput = document.getElementById('complaint-category');
    const detailsInput = document.getElementById('details');
    const photoInput = document.getElementById('photo');
    const imagePreview = document.getElementById('imagePreview');

    // Handle image preview
    photoInput.addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            if (!file.type.startsWith('image/')) {
                alert('Please upload an image file');
                this.value = '';
                imagePreview.innerHTML = '';
                return;
            }

            const reader = new FileReader();
            reader.onload = function(e) {
                imagePreview.innerHTML = `<img src="${e.target.result}" alt="Preview">`;
            };
            reader.readAsDataURL(file);
        } else {
            imagePreview.innerHTML = '';
        }
    });

    // Function to set visual feedback
    function setFieldValidation(element, isValid) {
        element.style.borderColor = isValid ? '#4CAF50' : '#ff6b6b';
    }

    // Phone number validation pattern
    const phonePattern = /^[0-9]{10}$/;

    // Form validation function
    function validateForm() {
        let isValid = true;
        let errorMessage = '';

        // Name validation
        if (nameInput.value.trim().length < 3) {
            errorMessage += 'Name must be at least 3 characters long\n';
            isValid = false;
        }

        // Email validation
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(emailInput.value)) {
            errorMessage += 'Please enter a valid email address\n';
            isValid = false;
        }

        // Phone validation
        if (!phonePattern.test(phoneInput.value)) {
            errorMessage += 'Please enter a valid 10-digit phone number\n';
            isValid = false;
        }

        // Category validation
        if (categoryInput.value === '') {
            errorMessage += 'Please select a complaint category\n';
            isValid = false;
        }

        // Details validation
        if (detailsInput.value.trim().length < 20) {
            errorMessage += 'Please provide more details (minimum 20 characters)\n';
            isValid = false;
        }

        if (!isValid) {
            alert(errorMessage);
        }

        return isValid;
    }

    // Create success message container
    const successMessage = document.createElement('div');
    successMessage.className = 'success-message';
    successMessage.style.display = 'none';
    form.parentNode.insertBefore(successMessage, form.nextSibling);

    // Form submission handler
    form.addEventListener('submit', function(e) {
        e.preventDefault();

        if (validateForm()) {
            // Create form data object
            const formData = {
                name: nameInput.value,
                email: emailInput.value,
                phone: phoneInput.value,
                complaintLevel: document.getElementById('complaint-level').value,
                category: categoryInput.value,
                location: document.getElementById('location').value,
                details: detailsInput.value,
                file: document.getElementById('photo').files[0] ? document.getElementById('photo').files[0].name : 'No file attached'
            };

            // Generate complaint reference number
            const referenceNumber = generateReferenceNumber();

            // Show success message
            successMessage.style.display = 'block';
            successMessage.innerHTML = `
                <div class="success-content">
                    <h3>✅ Your Complaint is Successfully Submitted!</h3>
                    <div class="success-details">
                        <p class="main-message">Thank you for submitting your complaint. We have received it and will take appropriate action.</p>
                        <p class="reference">Your Complaint Reference Number: <strong>${referenceNumber}</strong></p>
                        <div class="contact-info">
                            <p>We will contact you at:</p>
                            <p>📧 ${formData.email}</p>
                            <p>📱 ${formData.phone}</p>
                        </div>
                        <p class="note">Please save your reference number for future tracking.</p>
                        <p class="support">For any queries, please contact our support team.</p>
                    </div>
                </div>
            `;

            // Reset form and preview elements
            form.reset();
            document.getElementById('imagePreview').innerHTML = '';
            document.getElementById('locationDetails').style.display = 'none';

            // Scroll to success message
            successMessage.scrollIntoView({ behavior: 'smooth' });
        }
    });

    function generateReferenceNumber() {
        const date = new Date();
        const year = date.getFullYear();
        const month = String(date.getMonth() + 1).padStart(2, '0');
        const day = String(date.getDate()).padStart(2, '0');
        const random = Math.floor(Math.random() * 10000).toString().padStart(4, '0');
        return `COMP-${year}${month}${day}-${random}`;
    }

    // Real-time validation
    const inputs = [nameInput, emailInput, phoneInput, detailsInput];
    inputs.forEach(input => {
        input.addEventListener('input', function() {
            let isValid = true;
            
            if (this === nameInput) {
                isValid = this.value.trim().length >= 3;
            } else if (this === emailInput) {
                const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                isValid = emailPattern.test(this.value);
            } else if (this === phoneInput) {
                isValid = phonePattern.test(this.value);
            } else if (this === detailsInput) {
                isValid = this.value.trim().length >= 20;
            }
            
            setFieldValidation(this, this.value.length === 0 || isValid);
        });
    });

    categoryInput.addEventListener('change', function() {
        setFieldValidation(this, this.value !== '');
    });
});

// Location functionality
document.getElementById('getLocation').addEventListener('click', function() {
    const locationDetails = document.getElementById('locationDetails');
    const locationInput = document.getElementById('location');

    if (navigator.geolocation) {
        locationDetails.style.display = 'block';
        locationDetails.textContent = 'Fetching location...';
        
        navigator.geolocation.getCurrentPosition(
            function(position) {
                const latitude = position.coords.latitude;
                const longitude = position.coords.longitude;
                
                // Reverse geocoding using Nominatim API
                fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${latitude}&lon=${longitude}`)
                    .then(response => response.json())
                    .then(data => {
                        const address = data.display_name;
                        locationInput.value = address;
                        locationDetails.textContent = `📍 Location detected: ${address}`;
                    })
                    .catch(error => {
                        locationDetails.textContent = 'Error fetching address. Please enter location manually.';
                        console.error('Error:', error);
                    });
            },
            function(error) {
                switch(error.code) {
                    case error.PERMISSION_DENIED:
                        locationDetails.textContent = "Location access denied. Please enter location manually.";
                        break;
                    case error.POSITION_UNAVAILABLE:
                        locationDetails.textContent = "Location information unavailable. Please enter location manually.";
                        break;
                    case error.TIMEOUT:
                        locationDetails.textContent = "Location request timed out. Please enter location manually.";
                        break;
                    default:
                        locationDetails.textContent = "An error occurred. Please enter location manually.";
                }
            }
        );
    } else {
        locationDetails.style.display = 'block';
        locationDetails.textContent = "Geolocation is not supported by this browser. Please enter location manually.";
    }
});