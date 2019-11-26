<?php

//connexion à la base de donnée
$pdo = getPDO();

//Initialisation des variables
$lastName = "";
$firstName = "";
$dbVersion = null;
$errors = [];

// récupération des données
$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
$isPosted = filter_has_var(INPUT_POST, "submit");

//$formVersion = filter_input(INPUT_POST, "version", FILTER_SANITIZE_NUMBER_INT);

//si id correct et pas cliqué sur bouton submit, récuperer les infos du contact courant pour modification
if($id>0) {
    $sql = "SELECT lastName, firstName, version FROM contacts WHERE id = ?";
    $statement = $pdo->prepare($sql);
    $statement->execute([$id]);
    $data = $statement->fetch(PDO::FETCH_ASSOC);
    $lastName = $data["lastName"];
    $firstName = $data["firstName"];
    $dbVersion = $data["version"];
}

if($isPosted){

    $lastName = filter_input(INPUT_POST, "lastName", FILTER_SANITIZE_STRING);
    $firstName = filter_input(INPUT_POST, "firstName", FILTER_SANITIZE_STRING);

    $formVersion = filter_input(INPUT_POST, "version", FILTER_SANITIZE_NUMBER_INT);
    // validation et traitement
    if(empty(trim($lastName)) && empty(trim($firstName))){
        array_push($errors, "Saisie invalide");
    } else if(mb_strlen($lastName)<2){
        array_push($errors, "le nom doit comporter plus de 1 caractere");
    } else {
        $message = "Bonjour $firstName $lastName , vous avez bien été insérés";
    }

    //Insertion ou modification dans la BD avec un prepare statement si pas d'erreur
    if(count($errors) == 0){
        try {

            if($id>0){

                if($formVersion != $dbVersion) {
                    $_SESSION["message"] = "Les données ont été modifiées depuis le chargement du formulaire";
                    header("location:mainApp.php?route=contactsForm&id=$id");
                    exit;
                }

                $sql = "UPDATE contacts SET lastName=?, firstName=?, version=? WHERE id=?";
                $statement = $pdo->prepare($sql);
                $statement->execute([$lastName , $firstName, $dbVersion+1, $id]);

            } else {
                $sql = "INSERT INTO contacts (firstName, lastName) VALUES (?, ?)";
                $statement = $pdo->prepare($sql);
                $statement->execute([$lastName , $firstName]);
            }

            //redirection liste des contacts
            header("location: /mainApp.php?route=contacts");
        } catch (PDOException $ex){
            array_push($errors, "Impossible de créer votre contact");
            getErrors($ex);
        }

    }
}


$title = "Ajout de contact";
$viewName = "contactForm";

require VIEW_PATH . "/gabarit.php";
