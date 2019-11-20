<?php
session_start();
//Point d'entrée principal de l'appli web
//définition du chemin racine
define("ROOT_PATH", dirname(__DIR__));
//définition autre chemin nécessaire
define("VIEW_PATH", ROOT_PATH."/views");
define("CONTROLLER_PATH", ROOT_PATH."/controller");
define("MODEL_PATH", ROOT_PATH."/model");

//récupération de la route passée en paramètre URL : /mainApp?route=
$route = filter_input(INPUT_GET, "route") ?? "default";
#echo $route;

//gestion des messages flash
//recupération du message flash
$message = $_SESSION["message"] ?? "";
unset($_SESSION["message"]); //suppression du message dans la session

//définition de raccourcis pour les routes sous forme de tableau
$routes = [
    "test" => "controleur.php",
    "contact" => "formulaire_contact.html",
    "login" => "login.php",
    "logout" => "logout.php",
    "produit" => "produit.php",
    "intro" => "intro.php",
    "ma-photo" => "upload.php",
    "person_json" => "persons.php"
];

if(array_key_exists($route, $routes)) {
    $controller = $routes[$route];
} else {
    $controller = "404.html";
    $route="404";
}

//test de l'authentification
$publicRoutes = [
    "login",
    "produit",
    "404"
];

//si la route n'est pas public alors l'utilisateur ne peut acceder a la page sans etre logué
if (! in_array($route, $publicRoutes)){
    if(isset($_SESSION["email"])){
        $email = $_SESSION["email"];
    } else {
        $_SESSION["message"] = "Vous devez être connecté pour accéder a la page intro";
        header("location:mainApp.php?route=login");
    }
}


//Inclusion du controleur
require CONTROLLER_PATH . "/$controller";


?>