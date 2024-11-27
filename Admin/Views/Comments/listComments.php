<?php


include($_SERVER['DOCUMENT_ROOT'] . '/_blocks/doctype.php');
?>


        <div class="d-flex justify-content-between">
            <h1>Liste des Commentaires</h1>
            <br>
            <a class="btn btn-dark" href="/home">Retour au site</a>
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