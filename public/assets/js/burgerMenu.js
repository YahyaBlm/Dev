
// Menu Burger

const nav = document.getElementById("navBar");
const burgerMenu = document.getElementById("burgerMenu");

burgerMenu.addEventListener('click', show);

function show() {
    nav.classList.toggle('navBarShow');
}