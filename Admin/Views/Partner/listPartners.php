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
            <h1>Liste des Partenaires</h1>

            <a class="btn btn-dark" href="/Partner/create">Nouveau Partenaire</a><br>
            <a class="btn btn-dark" href="/home">Retour au site</a>

        </div><br>

        <table class="table table-light table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Déscription</th>
                    <th scope="col">Image</th>
                    <th scope="col">lien</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($partners as $index => $partner){ ?>
                <tr>
                    <th scope="row"><?php echo $partner->id; ?></th>
                    <td><?php echo ucfirst($partner->partner_prenom) ; ?></td>
                    <td><?php echo ucfirst($partner->partner_nom) ; ?></td>
                    <td><?php echo substr($partner->partner_description, 0, 30) . "..."; ?></td>
                    <td><img src="/Admin/public/assets/Images/PartnerImages/<?= $partner->partner_image; ?>" alt="image" width="150" height="150"></td>
                    <td><?php echo substr($partner->partner_link, 0, 30) . "..."; ?></td>
                    <td><!--call to action-->
                        <a class="btn btn-success" href="/Partner/update/<?php echo $partner->id; ?>">Modifier</a>
                        <?php if ($_SESSION['auth']->id_role > 2) { ?>
                            <a class="btn btn-danger" href="/Partner/delete/<?php echo $partner->id; ?>">Supprimer</a>
                        <?php } ?>
                    </td>
                </tr>
            </tbody>
            <?php } ?>
        </table>
    </div>
</body>

</html>