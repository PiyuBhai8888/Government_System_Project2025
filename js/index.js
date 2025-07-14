// Read More / Read Less toggle for Digital India section
function myFunction() {
    const dots = document.getElementById("dots");
    const moreText = document.getElementById("more");
    const btnText = document.getElementById("myBtn");

    if (dots.style.display === "none") {
        dots.style.display = "inline";
        btnText.innerHTML = "Read More";
        moreText.style.display = "none";
    } else {
        dots.style.display = "none";
        btnText.innerHTML = "Read Less";
        moreText.style.display = "inline";
    }
}

// Dropdown redirection for complaints
function goToLink() {
    const select = document.getElementById("complaints");
    const selectedValue = select.value;

    if (selectedValue && selectedValue !== "TOP") {
        window.location.href = selectedValue;
    }
}
