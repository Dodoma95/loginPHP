<?php

/**
 * Cette fonction génére une chaine de caractere
 * représentant une balise html et son contenu
 * 
 * @param string $tag : la balise a creer
 * @param string $content : le contenu de la balise
 * @param array $attributes : un tableau associatif des attributs html
 * @param bool $autoclosed : la balise est elle auto-fermante?
 * @return string
 */
function htmlTag(string $tag, string $content = "", bool $autoclosed = false, array $attributes = []):string {
    //declaration variable pour recueillir la balise fermante
    $baliseFermeture = "";
    //si variable est true alors
    if ($autoclosed == true) {
        $baliseFermeture = "</"."$tag".">";
    }
    //boucle sur le tableau associatif et concatene une chaîne
    $cleVal = "";
    foreach($attributes as $key=>$val) {
        $cleVal .= "$key=$val ";
    };

    //supprime le dernier caractere car l'espace est de trop
    $new_cleVal = substr($cleVal, 0, -1);
    //retourne la phrase recherchée
    return "<"."$tag "."$new_cleVal".">"."$content"."$baliseFermeture";
};

#echo htmlTag("img", "", false, ["src"=>'"img/toureffeil.png"', "class"=>'"btn-danger"']);
#echo "\n";
#echo htmlTag("p", "Bienvenu dans le générateur de contenu HTML", true, ["style"=>'"color:red"', "class"=>'"btn-danger"']);