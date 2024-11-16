<?php
include($_SERVER['DOCUMENT_ROOT'] . '/_blocks/meta.php');
?>

<link rel="stylesheet" href="/public/assets/css/oeuvres.css">
<link rel="stylesheet" href="/public/assets/css/articles.css">
<link rel="stylesheet" href="/public/assets/css/partenaires.css">

</head>

<?php
include($_SERVER['DOCUMENT_ROOT'] . '/_blocks/dochead.php');
?>

<img class="logoImg" src="/public/assets/Images/LogoThaliePerrot.png" alt="Logo Thalie Perrot">
<img
  class="mere"
  src="./public/assets/Images/partnerWallpaper.png"
  alt="bateau sur mere" />

</header>

<img
  class="divider he"
  src="./public/assets/Images/dividerHeader.png"
  alt="baroque diviseur" />

<main>
  <h1 class="title titre">Partenaires</h1>

  <section class="partner-container">
    <?php foreach ($partners as $index => $partner) { ?>
      <div class="partner-card">
        <img src="/Admin/public/assets/Images/PartnerImages/<?= $partner->partner_image; ?>" alt="Image du partenaire" />

        <div class="article-content">
          <h3><?= $partner->partner_prenom . " " . $partner->partner_nom ?></h3>
          <p>
            <?= $partner->partner_description; ?>
          </p>
          <a href="<?= $partner->partner_link; ?>" target="_blank"><?= $partner->partner_link; ?></a>
        </div>
      </div>
    <?php } ?>
  </section>
</main>

<?php
include($_SERVER['DOCUMENT_ROOT'] . '/_blocks/docfoot.php');
?>