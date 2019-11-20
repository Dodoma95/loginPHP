<?php

    $users = [
       ["email" => "aaa@aaa.com", "pwd" => "aaa"],
       ["email" => "bbb@bbb.com", "pwd" => "bbb"],
       ["email" => "ccc@ccc.com", "pwd" => "ccc"]
    ];
    //Démarrage de session
    #session_start();//toutes les pages qu'on souhaite sécuriser doit commencer par cette expression

    $isPosted = filter_has_var(INPUT_POST, "submit");//tester si la variable submit existe
    $errors = [];

    // Initialisation de l'email
    $email = "";


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
            header("location:mainApp.php?route=intro"); // header sert a rediriger sur autre page en ecrivant dans l'url. NE PEUT ETRE UTILISE SEULEMENT SI PAS D'ECHOS ET EN DEHORS DU BLOC HTML    
        } else {
            array_push($errors, "Credentials incorrect");
        }
    }
    $isValid = count($errors) == 0; //test si tableau errors est vide... count(tableau) retourne longueur du tab
    //affichage de la vue login décorée par le gabarit
    $title = "seConnecter";
    $viewName = "loginView";
    require VIEW_PATH . "/gabarit.php";
?>
