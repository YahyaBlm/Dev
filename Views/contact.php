<?php
include($_SERVER['DOCUMENT_ROOT'] . '/_blocks/meta.php');
?>

<link rel="stylesheet" href="/public/assets/css/contact.css">

</head>

<?php
include($_SERVER['DOCUMENT_ROOT'] . '/_blocks/dochead.php');
?>

<img class="logoImg" src="/public/assets/Images/LogoThaliePerrot.png" alt="Logo Thalie Perrot">
<img class="mere" src="./public/assets/Images/contactWallpaper.png" alt="bal dansant" />

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

<?php
include($_SERVER['DOCUMENT_ROOT'] . '/_blocks/docfoot.php');
?>