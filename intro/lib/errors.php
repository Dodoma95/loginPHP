<?php

function getErrors($ex) {

    $currentMessageError = $ex->getMessage();
    $currentDate = date('l jS \of F Y h:i:s A');

    //dernier para LOCK_EX permet s'il y a conflit que le deuxieme attende la fin de l'écriture du premier
    file_put_contents('../logs/error.log', $currentDate . ' :: ' . $currentMessageError . "\n", FILE_APPEND | LOCK_EX );

}

