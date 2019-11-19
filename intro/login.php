<?php

    $users = [
       ["email" => "aaa@aaa.com", "pwd" => "aaa"],
       ["email" => "bbb@bbb.com", "pwd" => "bbb"],
       ["email" => "ccc@ccc.com", "pwd" => "ccc"]
    ];
    //Démarrage de session
    session_start();//toutes les pages qu'on souhaite sécuriser doit commencer par cette expression

    $isPosted = filter_has_var(INPUT_POST, "submit");//tester si la variable submit existe
    $errors = [];

    // Initialisation de l'email
    $email = "";

    //recupération du message flash
    $message = $_SESSION["message"] ?? "";
    unset($_SESSION["message"]); //suppression du message dans la session

    if($isPosted){
        // récupération des données
        $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
        $pwd = filter_input(INPUT_POST, "pwd");

        // Validation de la saisie
        if(! filter_var($email, FILTER_VALIDATE_EMAIL)){
            array_push($errors, "votre email n'est pas valide");//ajoute au tableau $errors un message d'erreur si email non valide
        }
        if(! $pwd){
            array_push($errors, "le mot de passe ne peut être vide");
        } 
        // authenticate
        if($email == "dodo@mail.com" && $pwd == "aaa"){
            //régénérisation de la session une fois l'utilisateur logué par mesure de sécurité
            session_regenerate_id(true);
            //Stockage de l'email dans la session           
            $_SESSION["email"] = $email; //injection dans variable tableau de l'email
            //Redirection en cas de succès
            header("location:intro.php"); // header sert a rediriger sur autre page en ecrivant dans l'url. NE PEUT ETRE UTILISE SEULEMENT SI PAS D'ECHOS ET EN DEHORS DU BLOC HTML    
        } else {
            array_push($errors, "Credentials incorrect");
        }
    }
    $isValid = count($errors) == 0; //test si tableau errors est vide... count(tableau) retourne longueur du tab
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <title>Login</title>
</head>

<body class="container-fluid">

    <div class="row justify-content-center">
        <div class="col-md-3">
            <h1 class="text-center">Login</h1>

            <?php if(! $isValid): ?>
                <ul class="alert alert-danger">
                    <?php for($i=0; $i < count($errors); $i++) : ?>
                        <li> <?= $errors[$i] ?> </li>
                    <?php endfor ?>
                </ul>
                    <!--$tableauErrors = implode(", et ", $errors); PERMET de transformer un tableau en chaine de caractere -->
            <?php endif ?>

            <?php if(! empty($message)): ?> <!--affichage du message d'erreur si message n'est pas vide-->
                <div class="alert alert-warning">
                    <?= $message ?>
                </div>
            <?php endif ?>

            <form method="post">
                <div class="form-group">
                    <label for="email">Identifiant</label>
                    <input type="text" id="email" name="email" class="form-control" placeholder="entrez votre email ici" value="<?= $email ?>">
                </div>
                <div class="form-group">
                    <label for="pwd">Password</label>
                    <input type="password" id="pwd" name="pwd" class="form-control" placeholder="entrez votre mot de passe ici">
                </div>
                <button type="submit" name="submit" class="btn btn-block btn-success">Connexion</button>
            </form>
        </div>
    </div>
    
</body>
</html>