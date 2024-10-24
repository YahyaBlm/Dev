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
                <label for="title" class="form-label">Titre</label>
                <input type="text" class="form-control" id="title" placeholder="Titre" name="title" value="<?php if ($pageTitle === "Vue de l'article") {
                                                                                                                echo $article->article_titre;
                                                                                                            }; ?>">
            </div>

            <div class="mb-3">
                <label for="article" class="form-label">Article</label><br>
                <textarea class="form-control" name="article" id="article" rows="6" cols="50"><?= $articleText ?? ""; ?></textarea>
            </div>

            <div class="mb-3">
                <label for="cover" class="form-label">Couverture</label>
                <input type="file" class="form-control" id="cover" name="cover" >
            </div>

            <div>
                <button class="btn btn-success" type="submit" ><?= $buttonValue; ?></button>
                <a class="btn btn-dark" href="/Article">Retour</a>
            </div>
        </form>
    </div>

</body>

</html>