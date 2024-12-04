document.addEventListener("DOMContentLoaded", () => {
    const toggleButton = document.querySelector(".menu-toggle");
    const navLinks = document.querySelector(".nav-links");

    if (toggleButton && navLinks) { // Ensure elements exist
        toggleButton.addEventListener("click", () => {
            navLinks.classList.toggle("active");
        });
    } else {
        console.error("Toggle button or nav-links not found.");
    }
});
