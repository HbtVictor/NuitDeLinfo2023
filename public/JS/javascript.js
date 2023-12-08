function toggleDarkMode() {
    let element = document.body;
    let element1 = document.querySelector("h3");
    let element2 = document.querySelector(".text-muted-light");
    let darkModeCheckbox = document.getElementById("darkmode");
    let navbar = document.querySelector(".navbar");
 
    if (darkModeCheckbox.checked) {
       element.className = "dark-mode";
       element1.className = "h3-dark";
       element2.classList.replace("text-muted-light", "text-muted-dark");
       navbar.classList.remove("bg-primary-light");
       navbar.classList.add("bg-primary-dark");
       navbar.setAttribute("data-bs-theme", "dark");
    } else {
       element.className = "light-mode";
       element1.className = "h3-light";
       element2.classList.replace("text-muted-dark", "text-muted-light");
       navbar.classList.remove("bg-primary-dark");
       navbar.classList.add("bg-primary-light");
       navbar.setAttribute("data-bs-theme", "dark");
    }
 }
 