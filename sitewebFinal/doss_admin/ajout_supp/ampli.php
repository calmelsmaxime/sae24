<?php

// Création des tableaux pour stocker les amplitudes
$ampli_micro1 = array();
$ampli_micro2 = array();
$ampli_micro3 = array();

// Choisissez combien de chiffres après la virgule vous souhaitez conserver
$num_decimal_places = 15;

// Constante pour le coefficient
$const = 8.854187 * pow(10, -12);

// Calcul des amplitudes pour le micro 1
for ($i = 0; $i < 16; $i++) {
    for ($j = 0; $j < 16; $j++) {
        $a = pow($i * 0.5, 2);
        $b = pow($j * 0.5, 2);
        $dist = sqrt($a + $b);
        if ($dist != 0) {
            $ampli = $const / pow($dist, 2);
        } else {
            $ampli = 0.0;
        }
        // Conversion de l'amplitude en entier long en déplaçant la virgule décimale
        $ampli_long = (int)($ampli * pow(10, $num_decimal_places));
        // Stockage de l'amplitude en format binaire dans le tableau
        $ampli_micro1["$i,$j"] = decbin($ampli_long);
    }
}

// Calcul des amplitudes pour le micro 2
for ($i = 0; $i < 16; $i++) {
    for ($j = 0; $j < 16; $j++) {
        $y = abs($j - 15);
        $a = pow($i * 0.5, 2);
        $b = pow($y * 0.5, 2);
        $dist = sqrt($a + $b);
        if ($dist != 0) {
            $ampli = $const / pow($dist, 2);
        } else {
            $ampli = 0.0;
        }
        // Conversion de l'amplitude en entier long en déplaçant la virgule décimale
        $ampli_long = (int)($ampli * pow(10, $num_decimal_places));
        // Stockage de l'amplitude en format binaire dans le tableau
        $ampli_micro2["$i,$j"] = decbin($ampli_long);
    }
}

// Calcul des amplitudes pour le micro 3
for ($i = 0; $i < 16; $i++) {
    for ($j = 0; $j < 16; $j++) {
        $x = abs($i - 15);
        $y = abs($j - 15);
        $a = pow($x * 0.5, 2);
        $b = pow($y * 0.5, 2);
        $dist = sqrt($a + $b);
        if ($dist != 0) {
            $ampli = $const / pow($dist, 2);
        } else {
            $ampli = 0.0;
        }
        // Conversion de l'amplitude en entier long en déplaçant la virgule décimale
        $ampli_long = (int)($ampli * pow(10, $num_decimal_places));
        // Stockage de l'amplitude en format binaire dans le tableau
        $ampli_micro3["$i,$j"] = decbin($ampli_long);
    }
}

// Vos amplitudes en binaire
$amplitude1_bin = "110111010";
$amplitude2_bin = "1000100000";
$amplitude3_bin = "11010000";

// Tableaux pour stocker les cases correspondant à chaque amplitude
$cases1 = array();
$cases2 = array();
$cases3 = array();

// Vérification des amplitudes pour chaque microphone
foreach ($ampli_micro1 as $case => $ampli_bin) {
    if ($ampli_bin == $amplitude1_bin) {
        $cases1[] = explode(",", $case);
    }
}

foreach ($ampli_micro2 as $case => $ampli_bin) {
    if ($ampli_bin == $amplitude2_bin) {
        $cases2[] = explode(",", $case);
    }
}

foreach ($ampli_micro3 as $case => $ampli_bin) {
    if ($ampli_bin == $amplitude3_bin) {
        $cases3[] = explode(",", $case);
    }
}

// Recherche d'une valeur commune aux trois listes de cases
$common_case = null;
foreach ($cases1 as $case1) {
    if (in_array($case1, $cases2) && in_array($case1, $cases3)) {
        $common_case = $case1;
        break;
    }
}

// Mise de la valeur dans la table résultat si celle-ci est trouvé
if ($common_case) {
    $case = $commom_case;
	break
} else {
    echo "Aucune case commune trouvée pour les trois amplitudes";
}
?>
