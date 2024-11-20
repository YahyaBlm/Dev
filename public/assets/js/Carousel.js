const img = document.getElementById("carousel");
const rightBtn = document.getElementById("right-btn");
const leftBtn = document.getElementById("left-btn");

//je recupere l'URL de la page actuel de laquel j'extrait le dernier parametre que j'asigne a id
const id = window.location.pathname.split("/").pop();
let position;
let pictures = [];

async function getImages() {
  const response = await fetch(`/Books/getImages/${id}`);
  //   L'API envoie une reponse en json, on la decode
  pictures = await response.json();
  return pictures;
}
// window (au chargement de la page)
window.addEventListener("load", async () => {
  //await = attente
  pictures = await getImages();
  position = 0;
  // pictures est un tableau d'objet, je recupere l'image de ce dernier
  img.src = "/Admin/public/assets/Images/BookImages/" + pictures[0].image;
});

const moveRight = () => {
  if (position >= pictures.length - 1) {
    position = 0;
    img.src =
      "/Admin/public/assets/Images/BookImages/" + pictures[position].image;
    return;
  }
  img.src =
    "/Admin/public/assets/Images/BookImages/" + pictures[position + 1].image;
  position++;
};

const moveLeft = () => {
  if (position < 1) {
    position = pictures.length - 1;
    img.src =
      "/Admin/public/assets/Images/BookImages/" + pictures[position].image;
    return;
  }
  img.src =
    "/Admin/public/assets/Images/BookImages/" + pictures[position - 1].image;
  position--;
};

rightBtn.addEventListener("click", moveRight);
leftBtn.addEventListener("click", moveLeft);
