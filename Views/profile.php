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
    <section class="container-connexion">

      <form class="formConnexion" name="form" action="" method="POST">
        <h2 class="title">Se connecter</h2><br>

        <div class="divFormCon">

          <div class="input-group-conexion">
            <label for="email" class="sign">E-mail</label>
            <input type="email" id="email" class="champ" placeholder="E-mail" name="user_email" required />
          </div>

          <div class="input-group-conexion">
            <label for="password" class="sign">Mot de passe</label>
            <input type="password" id="password" class="champ" placeholder="Mot de passe" name="user_password" required />
          </div>
          <div>
            <input type="submit" value="Se connecter" id="submitConexion" class="submit" />
          </div><br>
          <a href="/user/register" class="signin">S'inscrire</a>
        </div>

      </form>
    </section>
  </main>
</body>

</html>