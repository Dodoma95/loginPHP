<?php

$isPosted = filter_has_var(INPUT_POST, "submit");

if($isPosted){
    $myPhoto = $_FILES["photo"];//comme on récupére un tableau il nous faut ajouter ce 4eme argument
    //Définition de l'extension du fichier
    $extension = explode("/", $myPhoto["type"])[1];

    //Le chemin du stockage de l'image
    $imageFolder = ROOT_PATH . "/www/images/";

    //Nom de l'image
    $fileName = uniqid("photo_") . "." . $extension;

    //Déplacement du fichier temporaire
    if(move_uploaded_file($myPhoto["tmp_name"], $imageFolder . $fileName)){
        $_SESSION["message"] = "téléchargement terminé";
    } else {
        $_SESSION["message"] = "Echec du téléchargement";
    }
}

$title = "Ma photo";
$viewName = "uploadView";

require VIEW_PATH . "/gabarit.php";
