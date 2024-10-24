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

        <form action="" method="POST">

            <div class="mb-3">
                <label for="user_firstname" class="form-label">Prénom</label>
                <input type="text" class="form-control" id="firstname" placeholder="Prénom" name="user_firstname" value="<?php if ($pageTitle === "Vue de l'utilisateur") {
                                                                                                                                echo $user->user_prenom;
                                                                                                                            }; ?>">
            </div>

            <div class="mb-3">
                <label for="user_lastname" class="form-label">Nom</label>
                <input type="text" class="form-control" id="lastname" placeholder="Nom" name="user_lastname" value="<?php if ($pageTitle === "Vue de l'utilisateur") {
                                                                                                                        echo $user->user_nom;
                                                                                                                    }; ?>">
            </div>

            <div class="mb-3">
                <label for="user_email" class="form-label">Email</label>
                <input type="email" class="form-control" id="mail" placeholder="Email" name="user_email" value="<?php if ($pageTitle === "Vue de l'utilisateur") {
                                                                                                                    echo $user->user_email;
                                                                                                                } ?>">
            </div>

            <div class="mb-3">
                <label for="role">Rôle de l'utilisateur</label>
                <select class="form-select" id="id_role" name="role" aria-label="Default select example">

                    <?php
                    foreach ($roles as $index => $role) { ?>
                        <option value="<?php echo $role->id; ?>"
                            <?php if (isset($user) && $user->id_role === $role->id) {
                                echo " selected";
                            } ?>>
                            <?php echo $role->role_name; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>

            <!-- <p style="border: 2px solid red;">If Add New User</p> -->

            <?php if ($pageTitle === "Ajouter un utilisateur") { ?>
                <div class="mb-3">
                    <label for="user_password" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control" id="mdp" placeholder="Mot de passe" name="user_password">
                </div>

                <div class="mb-3">
                    <label for="confMdp" class="form-label">Confirmer mot de passe</label>
                    <input type="password" class="form-control" id="confMdp" placeholder="Confirmer mot de passe" name="confMdp">
                </div>
            <?php } ?>
            <input class="btn btn-success" type="submit" name="addUser" Value="<?= $buttonValue; ?>">
            <a href="/User" class="btn btn-dark">Retour</a>

        </form>
    </div>

</body>

</html>