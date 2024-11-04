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
            <h1>Liste des Utilisateurs</h1>

            <a class="btn btn-dark" href="/User/create">Nouvel utilisateur</a><br>
            <a class="btn btn-dark" href="/home">Retour au site</a>

        </div><br>

        <table class="table table-light table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($users as $index => $user){ ?>
            <!-- var_dump($user); die;?> --> 
                <tr>
                    <th scope="row"><?php echo $user->id; ?></th>
                    <td><?php echo ucfirst($user->user_prenom) ; ?></td>
                    <td><?php echo ucfirst($user->user_nom) ; ?></td>
                    <td><?php echo $user->user_email; ?></td>
                    <td><?php echo $user->role_name; ?></td>
                    <td><!--call to action-->
                        <a class="btn btn-success" href="/user/update/<?php echo $user->id; ?>">Modifier</a>
                        <?php if ($_SESSION['auth']->id_role > 2) { ?>
                        <a class="btn btn-danger" href="/user/delete/<?php echo $user->id; ?>">Supprimer</a>
                        <?php } ?>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>