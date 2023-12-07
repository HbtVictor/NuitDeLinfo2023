function toggleDarkMode() {
    let element = document.body;
    let darkModeCheckbox = document.getElementById("darkmode");
    let navbar = document.querySelector(".navbar");

    if (darkModeCheckbox.checked) {
        element.className = "dark-mode";
        navbar.classList.remove("bg-primary-light");
        navbar.classList.add("bg-primary-dark");
        navbar.setAttribute("data-bs-theme", "light");
    } else {
        element.className = "light-mode";
        navbar.classList.remove("bg-primary-dark");
        navbar.classList.add("bg-primary-light");
        navbar.setAttribute("data-bs-theme", "dark");
    }
}
