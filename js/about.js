document.addEventListener("DOMContentLoaded", function () {
    // Smooth scrolling for menu links
    document.querySelectorAll("a").forEach(anchor => {
        anchor.addEventListener("click", function (e) {
            const target = document.querySelector(this.getAttribute("href"));
            if (target) {
                e.preventDefault();
                target.scrollIntoView({ behavior: "smooth", block: "start" });
            }
        });
    });

    // Dropdown menu animation
    const dropdownMenu = document.querySelector(".dropdown_menu");
    const servicesLink = document.querySelector("nav ul li:first-child a");

    if (dropdownMenu && servicesLink) {
        servicesLink.addEventListener("mouseenter", () => {
            dropdownMenu.style.display = "block";
            dropdownMenu.style.opacity = "1";
        });
        servicesLink.addEventListener("mouseleave", () => {
            setTimeout(() => {
                dropdownMenu.style.opacity = "0";
                dropdownMenu.style.display = "none";
            }, 500);
        });
    }

    // Back to Top Button
    const backToTopBtn = document.createElement("button");
    backToTopBtn.id = "backToTop";
    backToTopBtn.innerHTML = "⬆";
    document.body.appendChild(backToTopBtn);

    window.addEventListener("scroll", () => {
        if (window.scrollY > 200) {
            backToTopBtn.style.display = "block";
        } else {
            backToTopBtn.style.display = "none";
        }
    });

    backToTopBtn.addEventListener("click", () => {
        window.scrollTo({ top: 0, behavior: "smooth" });
    });

    // Dark/Light Mode Toggle
    const themeToggle = document.createElement("button");
    themeToggle.id = "themeToggle";
    themeToggle.innerHTML = "🌙";
    document.body.appendChild(themeToggle);

    themeToggle.addEventListener("click", () => {
        document.body.classList.toggle("dark-mode");
        if (document.body.classList.contains("dark-mode")) {
            themeToggle.innerHTML = "☀️";
            localStorage.setItem("theme", "dark");
        } else {
            themeToggle.innerHTML = "🌙";
            localStorage.setItem("theme", "light");
        }
    });

    // Load saved theme
    if (localStorage.getItem("theme") === "dark") {
        document.body.classList.add("dark-mode");
        themeToggle.innerHTML = "☀️";
    }

    // Auto-update last updated date
    const lastUpdated = document.querySelector(".footer-1 p");
    if (lastUpdated) {
        const today = new Date();
        lastUpdated.textContent = `Last Updated: ${today.toLocaleDateString()}`;
    }
});
