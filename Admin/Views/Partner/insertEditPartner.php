<?php


include($_SERVER['DOCUMENT_ROOT'] . '/_blocks/doctype.php');
?>

</head>

<body>

    <div class="container">
        <br>
        <h1><?= $pageTitle; ?></h1>
        <br>
        <?php
        if (!empty($errors)) {
        ?>

            <div id="zoneErreur">
                <div id="danger" class="alert alert-danger" role="alert">
                    <p>Le formulaire n'est pas correctement renseigné :</p>
                    <ul>
                        <?php
                        foreach ($errors as $error) {
                        ?>
                            <li><?php echo $error; ?></li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
        <?php
        }
        ?>

        <form action="" method="POST" enctype="multipart/form-data">

            <div class="mb-3">
                <label for="firstname" class="form-label">Prénom</label>
                <input type="text" class="form-control" id="firstname" placeholder="Prénom" name="firstname" value="<?php if ($pageTitle === "Vue du Partenaire") {
                                                                                                                                echo $partner->partner_prenom;
                                                                                                                            }; ?>">
            </div>

            <div class="mb-3">
                <label for="lastname" class="form-label">Nom</label>
                <input type="text" class="form-control" id="lastname" placeholder="Nom" name="lastname" value="<?php if ($pageTitle === "Vue du Partenaire") {
                                                                                                                                echo $partner->partner_nom;
                                                                                                                            }; ?>">
            </div>

            <div class="mb-3">
                <label for="descript" class="form-label">Déscription</label><br>
                <textarea class="form-control" name="descript" id="descript" rows="6" cols="50"><?= $partnerDescript ?? ""; ?></textarea>
            </div>

            <div class="mb-3">
                <label for="cover" class="form-label">Image</label>
                <input type="file" class="form-control" id="cover" name="cover">
            </div>

            <div class="mb-3">
                <label for="link">Lien du partenaire</label>
                <input type="text" class="form-control" id="link" placeholder="Copier votre lien ici" name="link" value="<?php if ($pageTitle === "Vue du Partenaire") {
                                                                                                                                echo $partner->partner_link;
                                                                                                                            }; ?>">
            </div>

            <div>
                <button class="btn btn-success" type="submit"><?= $buttonValue ;?></button>
                <a class="btn btn-dark" href="/Partner">Retour</a>
            </div>
        </form>
    </div>

</body>

</html>