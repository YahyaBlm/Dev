<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./public/assets/css/index.css" />
  <link rel="stylesheet" href="./public/assets/css/oeuvres.css" />
  <title>Thalie Perrot</title>
</head>

<body>
  <header>
    <div class="navigation">
      <a href="/firstPage" class="logo">Thalie Perrot</a>

      <nav class="navBar">
        
        <a href="/home">Accueil</a>
        <a href="/books" class="active">Oeuvres</a>
        <a href="/articles">Articles</a>
        <a href="/partenaires">Partenaires</a>
        <a href="/contact">Contact</a>

        <?php if (isset($_SESSION['auth']) && $_SESSION['auth']->id_role > 1) { ?>
          <a href="/book/index">Admin</a>
        <?php } ?>

        <?php if (!isset($_SESSION['auth'])) { ?>
          <a href="/user/login" class="active"><img src="/public/assets/Images/iconProfil.png" class="iconProfil" alt="icon pour acceder a son profile"></a>
        <?php } else { ?>
          <a href="/user/logout">Déconnexion</a>
        <?php   } ?>

      </nav>
    </div>
    <img class="mere" src="./public/assets/Images/oeuvreWallpaper.png" alt="bal dansant" />

    <img
      class="logoImg"
      src="./public/assets/Images/LogoThaliePerrot.png"
      alt="Logo Thalie Perrot" />
  </header>

  <img class="divider he" src="./public/assets/Images/dividerHeader.png" alt="baroque diviseur">

  <main>
    <h1 class="title titre">Mes Oeuvres</h1>
    <section>

      <article class="cards-container">
        <?php foreach ($books as $index => $book) { ?>
          <div class="card">
            <img src="/Admin/public/assets/Images/BookImages/<?= $book->livre_couverture; ?>" alt="Image de l'oeuvre" />

            <div class="card-content">
              <h3><?= $book->livre_titre ?></h3>
              <p>
                <?= substr($book->livre_resume, 0, 30) . '...'; ?>
              </p>
              <a href="/books/details/<?= $book->id; ?>">En savoir plus</a>
            </div>

          </div>
        <?php } ?>

      </article>

    </section>
  </main>

  <div class="divider-container">
    <img class="divider fo" src="./public/assets/Images/dividerFooter.png" alt="baroque diviseur">
  </div>

  <footer>
    <address>
      <p>Thalie Perrot &copy;</p>
      <p>123 rue de l'exemple</p>
      <p>Ville, code postal</p>
      <p>Tél : <a href="tel:+2126660606">+2126660606</a></p>
      <p>
        Email : <a href="mailto:contact@entreprise.com">contact@thalie.com</a>
      </p>
    </address>
  </footer>
</body>

</html>