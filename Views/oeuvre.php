<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="/public/assets/css/index.css" />
  <link rel="stylesheet" href="/public/assets/css/oeuvres.css" />
  <link rel="stylesheet" href="/public/assets/css/contact.css" />
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
    <img class="mere" src="/public/assets/Images/oeuvresWallpaper.png" alt="bal dansant" />
    <img
      class="logoImg"
      src="/public/assets/Images/LogoThaliePerrot.png"
      alt="Logo Thalie Perrot" />
  </header>

  <img class="divider he" src="/public/assets/Images/dividerHeader.png" alt="baroque diviseur">

  <main class="bookContainer">
    <h1 class="title titre"><?= $book->livre_titre ?></h1>

    <section class="book-container">
      <div class="card">
        <img src="/Admin/public/assets/Images/BookImages/<?= $book->livre_couverture; ?>" alt="Image Oeuvre1" />
      </div>
      <div class="cardBook-content">
        <p>
          <?= $book->livre_resume; ?>
        </p>
      </div>

      <div class="cardBook-content">
        <a
          href="<?= $book->livre_linkSale; ?>" target="_blank">
          Lien d'achat vers Amazon
        </a>
      </div>
    </section>

    <section class="comment-container">
      <h2>Commentaires</h2>

      <?php if (isset($_SESSION['auth'])) { ?>

        <form action="/comment/insertComment/<?= $book->id ?>" method="POST">
          <textarea name="comment" placeholder="Laisser un commentaire..." required id="comment"
            cols="80"
            rows="8"></textarea>

          <input type="submit" value="Envoyer" id="submitContact" />
        </form>

      <?php } else { ?>
        <a class="loginComment"
          href="/user/login">
          Connectez-vous pour laisser un commentaire !
        </a>
      <?php } ?>

      <div class="comment">
        <?php foreach ($comments as $index => $comment) { ?>
          <p> <?= $comment->user_prenom . " " . $comment->user_nom; ?> </p>
          <p> <?= $comment->commentaire; ?> </p>
        <?php } ?>
      </div>
    </section>
  </main>

  <div class="divider-container">
    <img class="divider fo" src="/public/assets/Images/dividerFooter.png" alt="baroque diviseur">
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