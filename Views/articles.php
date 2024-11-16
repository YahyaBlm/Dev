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
<img class="mere" src="/public/assets/Images/articlesWallpaper.png" alt="couple avec paysage" />

</header>

<img class="divider he" src="/public/assets/Images/dividerHeader.png" alt="baroque diviseur">

<main>
  <h1 class="title titre">Articles</h1>

  <article class="articles-container">
    <?php foreach ($articles as $index => $article) { ?>
      <div class="article-card">
        <img src="/Admin/public/assets/Images/ArticleImages/<?= $article->article_image; ?>" alt="Image de l'article" />

        <div class="article-content">
          <h3><?= $article->article_text ?></h3>
          <p>
            <?= substr($article->article_text, 0, 300) . '...'; ?>
          </p>
          <a href="/articles/details/<?= $article->id; ?>">En savoir plus</a>
        </div>

      </div>
    <?php } ?>
  </article>
</main>

<?php
include($_SERVER['DOCUMENT_ROOT'] . '/_blocks/docfoot.php');
?>