
document.addEventListener("DOMContentLoaded", function () {
    // Typing effect for the welcome message
    const text = "Welcome to Digital India Mission";
    let index = 0;
    const heading = document.querySelector(".wel_part1 h1");

    function typeEffect() {
        if (index < text.length) {
            heading.innerHTML += text.charAt(index);
            index++;
            setTimeout(typeEffect, 100);
        }
    }
    heading.innerHTML = ""; // Clear existing text before animation
    typeEffect();

    // Smooth scrolling for anchor links
    document.querySelectorAll("a.button").forEach(anchor => {
        anchor.addEventListener("click", function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute("href"));
            if (target) {
                target.scrollIntoView({ behavior: "smooth" });
            } else {
                window.location.href = this.getAttribute("href"); // Navigate if target not found
            }
        });
    });

    // Digital Clock Functionality
    function updateClock() {
        const now = new Date();
        const hours = now.getHours().toString().padStart(2, "0");
        const minutes = now.getMinutes().toString().padStart(2, "0");
        const seconds = now.getSeconds().toString().padStart(2, "0");
        document.getElementById("clock").textContent = `${hours}:${minutes}:${seconds}`;
    }
    setInterval(updateClock, 1000);
    updateClock(); // Call once to avoid initial delay
});
