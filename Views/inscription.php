<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="/public/assets/css/index.css" />
  <link rel="stylesheet" href="/public/assets/css/profile.css" />
  <title>Thalie Perrot</title>
</head>

<body>
  <div class="navigation">
    <a href="/firstPage" class="logo">Thalie Perrot</a>

    <nav class="navBar">
        <a href="/home">Accueil</a>
        <a href="/books">Oeuvres</a>
        <a href="/articles">Articles</a>
        <a href="/partenaires">Partenaires</a>
        <a href="/contact">Contact</a>

        <?php if (isset($_SESSION['auth']) && $_SESSION['auth']->id_role > 1) { ?>
          <a href="/book/index">Admin</a>
        <?php } ?>

        <?php if (!isset($_SESSION['auth'])) { ?>
          <a href="/user/login" class="active"><img src="/public/assets/Images/iconProfil.png" class="iconProfil" alt="icon pour acceder a son profile"></a>
        <?php } else { ?>
          <a href="/user/logout" class="active">Déconnexion</a>
        <?php   } ?>

      </nav>
  </div>
  <main>
    <section class="container-inscription">
      <h2 class="title">S'inscrire</h2>

      <form class="formInscription" name="form" action="" method="post">

        <div class="divFormInscription">

          <div class="input-group-inscription">
            <label for="nom" class="sign">Nom</label>
            <input type="text" id="nom" class="champ" placeholder="Nom" name="user_lastname" required />
          </div>

          <div class="input-group-inscription">
            <label for="prenom" class="sign">Prénom</label>
            <input type="text" id="prenom" class="champ" placeholder="prenom" name="user_firstname" required />
          </div>

          <div class="input-group-inscription">
            <label for="email" class="sign">E-mail</label>
            <input type="email" id="email" class="champ" placeholder="E-mail" name="user_email" required />
          </div>

          <div class="input-group-inscription">
            <label for="password" class="sign">Mot de passe</label>
            <input type="password" id="password" class="champ" placeholder="Mot de passe" name="user_password" required />
          </div>

          <div class="input-group-inscription">
            <label for="ConfPassword" class="sign">Confirmer mot de passe</label>
            <input type="password" id="ConfPassword" class="champ" placeholder="Mot de passe" name="confMdp"  required />
          </div><br>

          <div>
            <input type="submit" value="S'inscrire" id="submitInscription" class="submit" />
          </div>
        </div>

      </form>
    </section>
  </main>
</body>

</html>