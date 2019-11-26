<?php

//connexion à la base de donnée
$pdo = getPDO();
//j'execute une requete sur l'objet connection et me permet d'obtenir un objet qui me permet de recuperer des données
$recordSet = $pdo->query("SELECT * FROM contacts");
//fetch permet de déplacer le curseur//equivalent a next
//fetchAll recupere toutes les données
//FETCH_ASSOC recupere les données sous forme de tableau associatif
$contactList = $recordSet->fetchAll(PDO::FETCH_ASSOC);

#var_dump($contactList);

$title = "liste des contacts";
$viewName = "contactList";

require VIEW_PATH . "/gabarit.php";