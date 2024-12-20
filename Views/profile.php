<?php
include($_SERVER['DOCUMENT_ROOT'] . '/_blocks/meta.php');
?>

<link rel="stylesheet" href="/public/assets/css/profile.css">

</head>

<?php
include($_SERVER['DOCUMENT_ROOT'] . '/_blocks/dochead.php');
?>

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