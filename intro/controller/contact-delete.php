<?php

//connexion à la base de donnée
$pdo = getPDO();

//récupération de l'id du contact à supprimer
$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

if($id > 0) {
    try {
        $statement = $pdo->prepare("DELETE FROM contacts WHERE id=?");
        $statement->execute([$id]);
    } catch (PDOException $ex) {
        $_SESSION["message"] = "Impossible de supprimer ce contact";
        getErrors($ex);
    }
} else {
    $_SESSION["message"] = "Le parametre id passé est incorrect";
}

header("location:/mainApp.php?route=contacts");



$title = "Suppression d'un contact";
$viewName = "contactList";

require VIEW_PATH . "/gabarit.php";
