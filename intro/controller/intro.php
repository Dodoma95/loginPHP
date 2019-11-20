<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <title>Document</title>
</head>
<body>
    <?php

        var_dump($_GET);//permet de retourner valeur passé dans url du navigateur sous forme de tableau super global

        $name = filter_input(INPUT_GET, "name") ?? "Joe"; // 1er argument de la fonction, nom de la collection ou on va chercher les infos, second argument nom de la variable
        // ?? opérateur qui signale si valeur precedent nulle permet d'afficher une valeur par défaut
        $age = filter_input(INPUT_GET, "age", FILTER_SANITIZE_NUMBER_INT) ?? 18;
        //3eme parametre, FILTER_SANITIZE_NUMBER_INT sert a enregistrer simplement des chiffres ce qui exclut tout autre caractere

        //Meme rendu avec des conditions :

        /*if(isset($_GET["name"])){
            $name= $_GET["name"];
        } else {
            $name = "Ursule";
        }
        if(isset($_GET["age"])){
            $age = $_GET["age"];
        } else {
            $age = 18;
        }*/
        
    ?>

    <h1>
        Vous êtes bien connecté
        <br>
        Votre email est <?= $email ?>
    </h1>

    <a href="mainApp.php?route=logout">Déconnection</a>
</body>
</html>