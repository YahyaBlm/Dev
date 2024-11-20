<?php
include($_SERVER['DOCUMENT_ROOT'] . '/_blocks/meta.php');
?>

<link rel="stylesheet" href="/public/assets/css/oeuvres.css">
<link rel="stylesheet" href="/public/assets/css/articles.css">

</head>

<?php
include($_SERVER['DOCUMENT_ROOT'] . '/_blocks/dochead.php');
?>

<img class="logoImg" src="/public/assets/Images/LogoThaliePerrot.png" alt="Logo Thalie Perrot">
<img class="mere" src="/public/assets/Images/articleWallpaper.png" alt="bal dansant" />

</header>

<img class="divider he" src="/public/assets/Images/dividerHeader.png" alt="baroque diviseur">

<main>
  <h1 class="title titre"><?= $article->article_titre ?></h1>

  <section class="book-container">
    <div class="cardArticle">
      <img src="/Admin/public/assets/Images/ArticleImages/<?= $article->article_image; ?>" alt="Image Oeuvre1" />
    </div>
    
    <div class="cardBook-content">
      <p>
        <?= $article->article_text ?>
      </p>
    </div>
  </section>
</main>

<?php
include($_SERVER['DOCUMENT_ROOT'] . '/_blocks/docfoot.php');
?>

