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
            <h1>Liste des Commentaires</h1>
        </div><br>

        <table class="table table-light table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Commentaire</th>
                    <th scope="col">Oeuvre</th>
                    <th scope="col">Utilisateur</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($comments as $index => $comment) { ?>
                    <tr>
                        <th scope="row"><?php echo $comment->id; ?></th>
                        <td><?php echo substr($comment->commentaire, 0, 80) . "..."; ?></td>
                        <td><?php echo $comment->livre_titre; ?></td>
                        <td><?php echo $comment->user_prenom . " " . $comment->user_nom; ?></td>
                        <td><!--call to action-->
                            <a class="btn btn-success" href="/Comment/show/<?php echo $comment->id; ?>">Voir</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>