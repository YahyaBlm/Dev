<?php

include($_SERVER['DOCUMENT_ROOT'] . '/_blocks/doctype.php');

?>

</head>

<body>
    <br>
    <div class="container">
        <h1>Commentaire de <?php echo $comment->user_prenom . ' ' . $comment->user_nom; ?></h1>
        <br>
        <h3>Oeuvre : <?php echo $comment->livre_titre; ?></h3>
        <br>
        <p><?php echo $comment->commentaire; ?></p>
        <br>
        <?php if ($_SESSION['auth']->id_role > 2) { ?>
            <a class="btn btn-danger" href="/Comment/delete/<?php echo $comment->id; ?>">Supprimer</a>
        <?php } ?>
        <a class="btn btn-dark" href="/Comment">Retour</a>
    </div>
</body>

</html>