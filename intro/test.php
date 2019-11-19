<?php

$message = "Hello";
$greet = function ($name) use ($message) {
    echo "$message $name";
    $message = "Hola";
    echo "$message $name";
};

$message = "Hola";
$greet("dodo");
