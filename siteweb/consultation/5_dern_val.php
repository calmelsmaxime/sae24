<!DOCTYPE html>
<html lang="fr">
 <head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style_login.css">
	<link rel="stylesheet" href="../styles/tableau.css">
 </head>
 
 <body>
 <section id="zero">
<h1 id="titre_grille"> Affichage des 5 dernières mesures sous forme de graphique</h1>
<div class="grid">


<?php

require '../connexion_bd.php';

//Requête pour trouver le dernier id 
$sql4 = 'SELECT id FROM mesures
		ORDER BY id DESC
		LIMIT 1';
$result4 = mysqli_query($conn, $sql4);
$row4 = mysqli_fetch_assoc($result4);
$id_last = $row4['id'];



// Reqête pour trouver la dernière valeur
$sql2 = "SELECT * FROM resultat
		WHERE id = $id_last";
$result2 = mysqli_query($conn, $sql2);
$m = 0;

while ($row2 = mysqli_fetch_assoc($result2)) {
    $m++;
    $dern_position[$m] = $row2['case'];
}


// Requête pour trouver les 4 dernière mesures sans la toute dernière et la 5
$id4 = $id_last - 1;
$id2 = $id_last - 3 ;

$sql = "SELECT DISTINCT id, case FROM resultat
		WHERE id BETWEEN $id2 AND $id4
		ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);


// Reqête pour trouver la 5ème dernière valeur
$id5 = $id_last - 4;
$sql3 = "SELECT DISTINCT id, case FROM resultat
		WHERE id = $id5";
$result3 = mysqli_query($conn, $sql3);
$row3 = mysqli_fetch_assoc($result3);
$val5 = $row3['case'];



//Boucle pour faire le graphique
for ($i=0; $i<16 ; $i++){
	for ($j=0; $j<16; $j++){
		
		$position = "$i.$j";
		// Si c'est la dernière valeur
		for ($p=0; $p<$m; $p++){
			if ($dern_position[$p] == $position  ){
				echo '<div class="bloc">
							<img src="img/vert.png">
						</div>';
			}
		}

		// Si c'est la 5 ème dernière valeur
		if ($val5 == $i.$j ){
			echo '<div class="bloc">
						<img src="img/rouge.png">
					</div>';
		}	

		// Si c'est ni l'un ni l'autre
		else {
			
			$found = false;
			while ($row){
				$position2 = $row['case'];
				
				// Si c'est la 2,3 ou 4 ème dernière valeurs
				if ($position2 == $position){
					echo '<div class="bloc">
								<img src="img/orange.png">
							</div>';
					$found = true;
                    break;
				}
			$row = mysqli_fetch_assoc($result);
			}
			
			// Si il n'y a aucune valeur
			if (!$found) {
				echo '<div class="bloc"></div>';
			}
	
		}
	}
}
//Disconnecting from the database
mysqli_close($conn);


?>
		</div>
    </section>

</body>
</html>