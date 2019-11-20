<?php
session_destroy();
session_start();
session_regenerate_id();

$_SESSION["message"] = "Vous êtes déconnecté";

//redirection vers login
header("location:mainApp.php?route=login");
?>


<!--<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LOG out</title>
</head>
<body>
    <h1>Vous êtes bien déconnecté !!</h1>
</body>
</html>-->