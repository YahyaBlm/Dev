// Menu Burger

const menuBurger = document.getElementById("menuBurger");
const cross = document.getElementById("cross");
const box = document.getElementById("burgerBox");

menuBurger.addEventListener("click", show);
cross.addEventListener("click", hide);

function show() {
  box.classList.add("showBurger");
  menuBurger.classList.remove("showBurger");
  document.body.style.height = "100dvh";
  document.body.style.overflow = "hidden";
}

function hide() {
  box.classList.remove("showBurger");
  menuBurger.classList.add("showBurger");
  document.body.style.height = "auto";
  document.body.style.overflow = "auto";
}
