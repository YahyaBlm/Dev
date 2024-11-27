<?php

include($_SERVER['DOCUMENT_ROOT'] . '/_blocks/doctype.php');

?>


        <div class="d-flex justify-content-between">
            <h1>Liste des Oeuvres</h1>

            <a class="btn btn-dark" href="/Book/create">Nouvel Oeuvre</a><br>
            <a class="btn btn-dark" href="/home">Retour au site</a>

        </div><br>

        <table class="table table-light table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Titre</th>
                    <th scope="col">Résumé</th>
                    <th scope="col">Couverture</th>
                    <th scope="col">Lien de vente</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
                foreach ($books as $index => $book){ ?>
                <tr>
                    <th scope="row"><?php echo $book->id; ?></th>
                    <td><?php echo ucfirst(substr($book->livre_titre, 0, 40)); ?></td>
                    <td><?php echo substr($book->livre_resume, 0, 30) . '...'; ?></td>
                    <td><img src="/Admin/public/assets/Images/BookImages/<?= $book->livre_couverture; ?>" alt="image" width="110" height="150"></td>
                    <td><?php echo substr($book->livre_linkSale, 0, 30) . '...'; ?></td>
                    <td><!--call to action-->
                        <a class="btn btn-success" href="/Book/update/<?php echo $book->id; ?>">Modifier</a>
                        <?php if ($_SESSION['auth']->id_role > 2) { ?>
                            <a class="btn btn-danger" href="/Book/delete/<?php echo $book->id; ?>">Supprimer</a>
                        <?php } ?>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>