
document.getElementById("add-file-button").addEventListener("click", function() {
    
    // Crée un nouvel input file
    const newInput = document.createElement("input");
    newInput.type = "file";
    newInput.name = "images[]"; // fichiers sont dans un tableau
    newInput.classList.add("form-control");

    // Ajoute le nouvel élément input au conteneur
    document.getElementById("file-input-container").appendChild(newInput);
});

