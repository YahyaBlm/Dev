<body>
  <header>

    <div class="navigation">
      <a href="/firstPage" class="logo">Thalie Perrot</a>

      <div class="menu_burgerbox">
        <img src="/public/assets/Images/menuBurger.png"
          id="menuBurger"
          alt="Déconnexion et options">
      </div>

      <section class="burgerBox" id="burgerBox">
        <button id="bouton"><img src="/public/assets/Images/BurgerHide.png" alt="bouton fermer le menu burger" id="cross"></button>
        <div id="burger-links">
          <a href="/home">Accueil</a>
          <a href="/books">Oeuvres</a>
          <a href="/articles">Articles</a>
          <a href="/partenaires">Partenaires</a>
          <a href="/contact">Contact</a>
          <?php if (isset($_SESSION['auth'])) { ?>
            <a href="/user/editUser/<?= $_SESSION['auth']->id ?>">Mon Profil</a>
            <?php if ($_SESSION['auth']->id_role > 1) { ?>
              <a href="/book/index">Admin</a>
            <?php } ?>
            <a href="/user/logout">Déconnexion</a>
          <?php } else { ?>
            <a id="nowrap" href="/user/login">Se connecter</a>
          <?php } ?>
        </div>
      </section>


      <nav class="navBar">
        <a href="/home">Accueil</a>
        <a href="/books">Oeuvres</a>
        <a href="/articles">Articles</a>
        <a href="/partenaires">Partenaires</a>
        <a href="/contact">Contact</a>

        <?php if (isset($_SESSION['auth'])) { ?>
          <div class="profile-dropdown">
            <img src="/public/assets/Images/iconparam.png"
              class="iconProfil dropdown-trigger"
              alt="Déconnexion et options">
            <div class="dropdown-menu">
              <a href="/user/editUser/<?= $_SESSION['auth']->id ?>">Mon Profil</a>
              <?php if ($_SESSION['auth']->id_role > 1) { ?>
                <a href="/book/index">Admin</a>
              <?php } ?>
              <a href="/user/logout">Déconnexion</a>
            </div>
          </div>
        <?php } else { ?>
          <a href="/user/login" class="icon-link">
            <img src="/public/assets/Images/iconProfil.png" class="iconProfil" alt="icon pour accéder à son profil">
          </a>
        <?php } ?>
      </nav>
    </div>