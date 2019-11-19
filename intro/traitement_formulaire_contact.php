<?php
    // récupération des données
    $lastName = filter_input(INPUT_POST, "nom", FILTER_SANITIZE_STRING);
    $firstName = filter_input(INPUT_POST, "prenom", FILTER_SANITIZE_STRING);

    // validation et traitement
    if(empty($lastName) && empty($firstName)){
        $message = "Saisie invalide";
    } else {
        $message = "Bonjour $firstName $lastName";
    }

    // restitution
    echo $message;

?>