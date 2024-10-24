<?php


include($_SERVER['DOCUMENT_ROOT'] . '/_blocks/doctype.php');
?>
</head>

<body>
    <br>
    <div class="container">
        <div class="d-flex justify-content-between">

            <a class="btn btn-primary" href="/Book">Oeuvres</a>
            <a class="btn btn-primary" href="/Article">Articles</a>
            <a class="btn btn-primary" href="/User">Utilisateurs</a>
            <a class="btn btn-primary" href="/Partner">Partenaires</a>
            <a class="btn btn-primary" href="/Comment">Commentaires</a>

        </div><br>

        <div class="d-flex justify-content-between">
            <h1>Liste des Articles</h1>

            <a class="btn btn-dark" href="/Article/create">Nouvel Article</a>

        </div><br>

        <table class="table table-light table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Titre</th>
                    <th scope="col">Article</th>
                    <th scope="col">Couverture</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($articles as $index => $article) { ?>
                    <tr>
                        <th scope="row"><?php echo $article->id; ?></th>
                        <td><?php echo ucfirst($article->article_titre); ?></td>
                        <td><?php echo substr($article->article_text, 0, 50) . "..."; ?></td>
                        <td><img src="/Admin/public/assets/Images/ArticleImages/<?= $article->article_image; ?>" alt="image" width="150" height="90"></td>
                        <td><!--call to action-->
                            <a class="btn btn-success" href="Article/update/<?php echo $article->id; ?>">Modifier</a>
                            <a class="btn btn-danger" href="Article/delete/<?php echo $article->id; ?>">Supprimer</a>

                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>