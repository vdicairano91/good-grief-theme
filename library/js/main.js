const hamburger = document.getElementById("hamburger");
const menuItems = document.querySelectorAll(".menu-item");
let menuItemsActive = document.querySelectorAll(".menu-item.active");

//Mobile Menu Toggle
hamburger.addEventListener("click", toggleMenu);

function toggleMenu() {
    this.classList.toggle("open");
    document.getElementById("navigation").classList.toggle("open");
}

function closeMenuItem() {
    menuItemsActive[0].classList.remove("active");
}

for (let i = 0; i < menuItems.length; i++) {
    menuItems[i].addEventListener("click", function () {
        // closeMenuItem();
        this.classList.toggle("active");
    });
}