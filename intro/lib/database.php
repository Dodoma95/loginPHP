<?php

function getPDO()
{
    $dsn = "mysql:host=localhost;dbname=test;charset=utf8";
    $user = "root";
    $pass = "";

    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ];

    return new PDO($dsn, $user, $pass, $options);
}
