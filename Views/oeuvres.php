<?php
include($_SERVER['DOCUMENT_ROOT'] . '/_blocks/meta.php');
?>

<link rel="stylesheet" href="/public/assets/css/oeuvres.css">

</head>

<?php
include($_SERVER['DOCUMENT_ROOT'] . '/_blocks/dochead.php');
?>

<img class="logoImg" src="/public/assets/Images/LogoThaliePerrot.png" alt="Logo Thalie Perrot">
<img class="mere" src="./public/assets/Images/oeuvreWallpaper.png" alt="bal dansant" />

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

<?php
include($_SERVER['DOCUMENT_ROOT'] . '/_blocks/docfoot.php');
?>