<?php

include($_SERVER['DOCUMENT_ROOT'] . '/_blocks/doctype.php');

?>

</head>

<body>
    <br>
    <div class="container">
        <h1><?= $delete ; ?></h1>
        <br>
        <form action="" method="POST">

                <input class="btn btn-success" type="submit" name="yes" value="Oui">
                <a href="<?= $root ;?>" class="btn btn-danger">Non</a>
            
        </form>
    </div>
</body>

</html>