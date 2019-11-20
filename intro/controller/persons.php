<?php

$personText = file_get_contents(ROOT_PATH . "/data/persons.json");
$personData = json_decode($personText, true);

var_dump($personData);