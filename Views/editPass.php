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
        <h2 class="title">Modifier le mot de passe</h2><br>

        <div class="divFormCon">

          <div class="input-group-conexion">
            <label for="password" class="sign">Nouveau mot de passe</label>
            <input type="password" id="password" class="champ" placeholder="Mot de passe" name="user_password" required />
          </div>

          <div class="input-group-conexion">
            <label for="ConfPassword" class="sign">Confirmer mot de passe</label>
            <input type="password" id="ConfPassword" class="champ" placeholder="Confirmer mot de passe" name="confMdp" required />
          </div>
          <div>
            <input type="submit" value="Modifier" id="submit" class="submit" />
          </div><br>
        </div>

      </form>
    </section>
  </main>
</body>

</html>