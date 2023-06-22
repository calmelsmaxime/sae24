
<?php

require '../connexion_bd.php';

	
//Requête pour trouver le dernier id 
$sql4 = 'SELECT id FROM resultat
		ORDER BY id DESC
		LIMIT 1';
$result4 = mysqli_query($conn, $sql4);
$row4 = mysqli_fetch_assoc($result4);
$id_last = $row4['id'];


// Reqête pour trouver la dernière valeur
$sql2 = "SELECT * FROM resultat
		WHERE id = '$id_last'";
$result2 = mysqli_query($conn, $sql2);
$row2 = mysqli_fetch_assoc($result2);

$m = 0;
while ($row2) {
    $m++;
    $dern_position[$m] = $row2['case_value'];
	$row2 = mysqli_fetch_assoc($result2); // Mettre à jour $row2 pour obtenir le prochain enregistrement
}


// Requête pour trouver la 4 ème mesures
$sql = "SELECT DISTINCT id, `case_value` FROM resultat
		ORDER BY id DESC
		LIMIT 1 OFFSET 1";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$val2 = $row['case_value'];


// Requête pour trouver la 3 ème mesures
$sql4 = "SELECT DISTINCT id, `case_value` FROM resultat
		ORDER BY id DESC
		LIMIT 1 OFFSET 2";
$result4 = mysqli_query($conn, $sql4);
$row4 = mysqli_fetch_assoc($result4);
$val3 = $row4['case_value'];


// Requête pour trouver la 4 ème mesures
$sql5 = "SELECT DISTINCT id, `case_value` FROM resultat
		ORDER BY id DESC
		LIMIT 1 OFFSET 3";
$result5 = mysqli_query($conn, $sql5);
$row5 = mysqli_fetch_assoc($result5);
$val4 = $row5['case_value'];


// Reqête pour trouver la 5ème dernière valeur
$sql3 = "SELECT DISTINCT id, `case_value` FROM resultat
		ORDER BY id DESC
		LIMIT 1 OFFSET 4";
$result3 = mysqli_query($conn, $sql3);
$row3 = mysqli_fetch_assoc($result3);
$val5 = $row3['case_value'];



//Boucle pour faire le graphique

for ($i = 15; $i >= 0 ;$i--) {

    for ($j = 0; $j <= 15; $j++) {
        $position = "$j.$i";
        

        // Vérifier si c'est la dernière valeur
        $isLastPosition = false;
        for ($p = 1; $p <= $m; $p++) {
            if ($dern_position[$p] === $position) {
                $isLastPosition = true;
                break;
            }
        }
        
        // Vérifier si c'est la 5ème dernière valeur
        $isFifthLastPosition = ($val5 === $position);
        
        // Vérifier si c'est la 4ème valeurs
		$is4val = ($val4 === $position);
		
		// Vérifier si c'est la 3ème valeurs
		$is3val = ($val3 === $position);
		
		// Vérifier si c'est la 2ème valeurs
		$is2val = ($val2 === $position);
		
        
        // Générer la div correspondante en fonction de la position
        if ($isLastPosition) {
            echo '<div class="bloc_green"></div>';
        } elseif ($isFifthLastPosition) {
            echo '<div class="bloc_red"></div>';
        } elseif ($is3val) {
            echo '<div class="bloc_jaune"></div>';	
        }elseif ($is4val) {
            echo '<div class="bloc_orange"></div>';	
        }elseif ($is2val) {
            echo '<div class="bloc_bleu"></div>';	
        }
		else {
            echo '<div class="bloc"></div>';
        }
    }

}


//Disconnecting from the database
mysqli_close($conn);

?>


