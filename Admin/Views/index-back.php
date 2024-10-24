<?php

use App\Router\Router;

//la constante contenant le dossier racine
define('ROOT',dirname(__DIR__));

//Autoloader
require "../vendor/autoload.php";

//on instancie Router
$routeur = new Router();
$routeur->start();

?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../public/assets/css/index.css" />
    <link rel="stylesheet" href="../public/assets/css/index-back.css" />
    <title>Dashboard</title>
  </head>
  <body>
    <!-- <header>
      <div class="navigation">
        <a href="firstPage.html" class="logo">Thalie Perrot</a>

        <nav class="navBar">
          <a href="index.html" class="active">Accueil</a>
          <a href="oeuvres.html">Oeuvres</a>
          <a href="articles.html">Articles</a>
          <a href="partenaires.html">Partenaires</a>
          <a href="contact.html">Contact</a>
          <a href="profile.html"
            ><img
              src="../Images/iconProfil.png"
              class="iconProfil"
              alt="icon pour acceder a son profile"
          /></a>
        </nav>
      </div>
    </header> -->

    <div class="dashboard">
      <h1>Dashbord</h1>
      <div class="buttons-container">
        <a class="btn" href="/Book">Œuvres</a>
        <a class="btn" href="./Articles/listArticles.php">Articles</a>
        <a class="btn" href="./Users/listUsers.php">Utilisateurs</a>
        <a class="btn" href="./Partner/listPartners.php">Partenaires</a>
        <a class="btn" href="">Commentaires</a>
      </div>
    </div>
  </body>
</html>
