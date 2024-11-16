<?php
include($_SERVER['DOCUMENT_ROOT'] . '/_blocks/meta.php');
?>

<link rel="stylesheet" href="/public/assets/css/profile.css">

</head>

<?php
include($_SERVER['DOCUMENT_ROOT'] . '/_blocks/dochead.php');
?>

  <main>
    <section class="container-inscription">
      <h2 class="title"><?= $pageTitle ?></h2>

      <form class="formInscription" name="form" action="" method="post">

        <div class="divFormInscription">

          <div class="input-group-inscription">
            <label for="nom" class="sign">Nom</label>
            <input type="text" id="nom" class="champ" placeholder="Nom" name="user_lastname" value="<?php if ($pageTitle === "Mes informations") {
                                                                                                                                echo $user->user_nom;
                                                                                                                            }; ?>" required />
          </div>

          <div class="input-group-inscription">
            <label for="prenom" class="sign">Prénom</label>
            <input type="text" id="prenom" class="champ" placeholder="prenom" name="user_firstname" value="<?php if ($pageTitle === "Mes informations") {
                                                                                                                                echo $user->user_prenom;
                                                                                                                            }; ?>" required />
          </div>

          <div class="input-group-inscription">
            <label for="email" class="sign">E-mail</label>
            <input type="email" id="email" class="champ" placeholder="E-mail" name="user_email" value="<?php if ($pageTitle === "Mes informations") {
                                                                                                                                echo $user->user_email;
                                                                                                                            }; ?>" required />
          </div>

          <?php if(isset($_SESSION['auth'])) { ?>

            <div>
            <a class="submit" href="/user/userPassword/<?php echo $user->id; ?>">Modifier mot de passe</a>
          </div> <br>
          <?php } else { ?>
          <div class="input-group-inscription">
            <label for="password" class="sign">Mot de passe</label>
            <input type="password" id="password" class="champ" placeholder="Mot de passe" name="user_password"  required />
          </div>

          <div class="input-group-inscription">
            <label for="ConfPassword" class="sign">Confirmer mot de passe</label>
            <input type="password" id="ConfPassword" class="champ" placeholder="Mot de passe" name="confMdp"  required />
          </div><br>

          <?php } ?>
          <div>
            <input type="submit" value="<?= $buttonValue ?>" id="submitInscription" class="submit" />
          </div>
        </div>

      </form>
    </section>
  </main>
</body>

</html>