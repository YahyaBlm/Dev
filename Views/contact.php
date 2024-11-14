<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./public/assets/css/index.css" />
  <link rel="stylesheet" href="./public/assets/css/contact.css" />
  <title>Thalie Perrot</title>
</head>

<body>
  <header>
    <div class="navigation">
      <a href="/firstPage" class="logo">Thalie Perrot</a>

      <nav class="navBar">
        <a href="/home">Accueil</a>
        <a href="/books">Oeuvres</a>
        <a href="/articles">Articles</a>
        <a href="/partenaires">Partenaires</a>
        <a href="/contact" class="active">Contact</a>

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
    <img class="mere" src="./public/assets/Images/contactWallpaper.png" alt="bal dansant" />
    <img
      class="logoImg"
      src="./public/assets/Images/LogoThaliePerrot.png"
      alt="Logo Thalie Perrot" />
  </header>

  <img class="divider he" src="./public/assets/Images/dividerHeader.png" alt="baroque diviseur">

  <main>
    <section class="container-contact">
      <h2>Contactez-moi !</h2>

      <form class="formContact" name="form" action="#" method="post">
        <div class="divForm">
          <div class="input-radio">
            <input type="radio" class="radio" name="civil" checked id="mme" />
            <label for="mme">Mme. </label>

            <input type="radio" class="radio" name="civil" id="mr" />
            <label for="mr">Mr. </label>

            <input type="radio" class="radio" name="civil" id="autre" />
            <label for="autre">Autres </label><br />
          </div>
          <div class="input-group">
            <label for="nom">Nom</label>
            <input
              type="text"
              id="nom"
              class="champ"
              placeholder="Nom"
              required />
          </div>

          <div class="input-group">
            <label for="prenom">Prénom</label>
            <input
              type="text"
              id="prenom"
              class="champ"
              placeholder="Prénom"
              required />
          </div>

          <div class="input-group">
            <label for="email">E-mail</label>
            <input
              type="email"
              id="email"
              class="champ"
              placeholder="exemple@gmail.com"
              required />
          </div>
        </div>

        <div class="input-txtarea">
          <label for="message">Votre message</label><br />
          <textarea
            id="message"
            cols="30"
            rows="6"
            placeholder="Ajoutez votre message"></textarea><br />

          <input type="submit" value="Envoyer" id="submitContact" />
        </div>
      </form>
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