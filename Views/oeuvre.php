<?php
include($_SERVER['DOCUMENT_ROOT'] . '/_blocks/meta.php');
?>

<link rel="stylesheet" href="/public/assets/css/oeuvres.css">
<link rel="stylesheet" href="/public/assets/css/contact.css">

</head>

<?php
include($_SERVER['DOCUMENT_ROOT'] . '/_blocks/dochead.php');
?>

<img class="logoImg" src="/public/assets/Images/LogoThaliePerrot.png" alt="Logo Thalie Perrot">
<img class="mere" src="/public/assets/Images/oeuvresWallpaper.png" alt="bal dansant" />

</header>

<img class="divider he" src="/public/assets/Images/dividerHeader.png" alt="baroque diviseur">

<main class="bookContainer">
  <h1 class="title titre"><?= $book->livre_titre ?></h1>

  <section class="book-container">
    <div class="card">
      <img src="/Admin/public/assets/Images/BookImages/<?= $book->livre_couverture; ?>" alt="Image Oeuvre" />
    </div>
    <div class="cardBook-content">
      <p>
        <?= $book->livre_resume; ?>
      </p>
    </div>

    <div class="cardBook-content">
      <a
        href="<?= $book->livre_linkSale; ?>" target="_blank">
        Acheter sur Amazon !! <br>
        <img src="/public/assets/Images/amazonLink.png" alt="logo amazon" width="160px">
      </a>
    </div>

    <div class="carousel">
      <button id="left-btn"><i class="arrow"></i></button>
      <img id="carousel" src="" alt="">
      <button id="right-btn"><i class="arrow"></i></button>
    </div>

  </section>

  <section class="comment-container">
    <h2>Commentaires</h2>

    <?php if (isset($_SESSION['auth'])) { ?>

      <form action="/comment/insertComment/<?= $book->id ?>" method="POST">
        <textarea name="comment" placeholder="Laissez un commentaire..." required id="comment"
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

<script src="/public/assets/js/Carousel.js"></script>

<?php
include($_SERVER['DOCUMENT_ROOT'] . '/_blocks/docfoot.php');
?>