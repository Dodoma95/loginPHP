<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <title>Document</title>
</head>

<body class="container-fluid">

    <?php

    // récupération des données
    $lastName = filter_input(INPUT_POST, "nom", FILTER_SANITIZE_STRING);
    $firstName = filter_input(INPUT_POST, "prenom", FILTER_SANITIZE_STRING);
    $agree = filter_has_var(INPUT_POST, "agree"); //retourne un boolean si variable existe (ici case a cocher)
    $competences = filter_input(INPUT_POST, "competence", FILTER_SANITIZE_STRING, FILTER_REQUIRE_ARRAY);

    var_dump($competences);

    //echo $agree;
    // validation et traitement
    if (empty(trim($lastName)) || empty(trim($firstName))) {
        $message = "Saisie invalide";
    } else {
        $message = "Bonjour $firstName $lastName";
        if($agree) {
            $message .= ", merci d'être aussi crédule"; // .= permet la concaténation comme += en java
        }
    }

    ?>


    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1 class="text-center">Formulaire de contacts</h1>
            <form method="post" action="formulaire_contact.php">
                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input class="form-control" type="text" id="nom" name="nom" placeholder="nom...">
                    <small id="nomHelp" class="form-text text-danger">
                        <?php if (isset($message)) { } else {
                            $message = " ";
                        }
                        echo $message; ?></small>
                </div>
                <div class="form-group">
                    <label for="prenom">Prénom</label>
                    <input class="form-control" type="text" id="prenom" name="prenom" placeholder="prenom...">
                    <small id="prenomHelp" class="form-text text-danger">
                        <?php if (isset($message)) { } else {
                            $message = " ";
                        }
                        echo $message; ?></small>
                </div>

                <div class="form-check mb-2">
                    <input type="checkbox" name="agree" class="form-check-input" id="agree">
                    <label for="agree" class="form-check-label">J'accepte tout ce que vous voulez</label>
                </div>

                <div class="form-check form-check-inline mb-2">
                    <input type="checkbox" id="java" name="competence[]" value="java" class="form-check-input">
                    <label for="java" class="form-check-label">Java</label>
                </div>

                <div class="form-check form-check-inline mb-2">
                    <input type="checkbox" id="php" name="competence[]" value="php" class="form-check-input">
                    <label for="php" class="form-check-label">PHP</label>
                </div>

                <div class="form-check form-check-inline mb-2">
                    <input type="checkbox" id="ruby" name="competence[]" value="ruby" class="form-check-input">
                    <label for="ruby" class="form-check-label">Ruby</label>
                </div>


                <button type="submit" class="btn btn-primary btn-block">Valider</button>
            </form>
        </div>
    </div>


</body>

</html>