<?php
    require "../lib/tag.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">-->
    <title>Document</title>
</head>

<body>

    <form action="produit.php" method="post">
        <label>1er nombre</label>
        <input type="number" name="premierNum" class="form-control" size="10">
        <label>2nd nombre</label>
        <input type="number" name="deuxiemeNum" class="form-control" size="10">
        <button type="submit" class="btn btn-primary">Valider</button>
    </form>

    <?php
    $premierNum = filter_input(INPUT_POST, "premierNum", FILTER_SANITIZE_NUMBER_INT) ?? 5;
    $deuxiemeNum = filter_input(INPUT_POST, "deuxiemeNum", FILTER_SANITIZE_NUMBER_INT) ?? 2;
    $resultat = $premierNum * $deuxiemeNum;
    ?>

    <?php
        echo htmlTag("p", "test de la fonction htmltag");
    ?>

    <p class="p-3 mb-2 bg-info text-white">
        <?php echo "Le résultat de la multiplication de $premierNum x $deuxiemeNum  =" ?> <?php echo $premierNum  * $deuxiemeNum; ?>
    </p>
    <br>

    <table class="table table-striped table-dark">
        <?php for ($i = 1; $i <= 10; $i++) : ?>
            <?php if ($i % 2) : ?>
                <tr>
                <?php else : ?>
                <tr></tr>
            <?php endif ?>

            <?php for ($k = 1; $k <= 10; $k++) : ?>
                <?php if ($k % 2 == 0) : ?>
                    <td><?= $i * $k ?></td>
                <?php else : ?>
                    <td><?= $i * $k ?></td>
                <?php endif ?>
            <?php endfor; ?>
            </tr>
        <?php endfor; ?>
    </table>

</body>

</html>