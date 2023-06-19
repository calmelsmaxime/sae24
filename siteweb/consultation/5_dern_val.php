
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
$row2 = mysqli_fetch_assoc($result2);

$m = 0;
while ($row2) {
    $m++;
    $dern_position[$m] = $row2['case'];
	$row2 = mysqli_fetch_assoc($result2); // Mettre à jour $row2 pour obtenir le prochain enregistrement
}


// Requête pour trouver les 4 dernière mesures sans la toute dernière et la 5
$sql = "SELECT DISTINCT id, `case` FROM resultat
		ORDER BY id DESC
		LIMIT 3 OFFSET 1";
$result = mysqli_query($conn, $sql);


// Reqête pour trouver la 5ème dernière valeur
$sql3 = "SELECT DISTINCT id, `case` FROM resultat
		ORDER BY id DESC
		LIMIT 1 OFFSET 4";
$result3 = mysqli_query($conn, $sql3);
$row3 = mysqli_fetch_assoc($result3);
$val5 = $row3['case'];



//Boucle pour faire le graphique
for ($i=0; $i<16 ; $i++){
	for ($j=0; $j<16; $j++){
		
		$position = "$i.$j";
		
		// Si c'est la dernière valeur
		for ($p=1; $p<=$m; $p++){
			if ($dern_position[$p] == $position  ){
				echo '<div class="bloc_green">
							</div>';
			}
		}

		// Si c'est la 5 ème dernière valeur
		if ($val5 == $position ){
			echo '<div class="bloc_red">
					</div>';
		}	

		while ($row = mysqli_fetch_assoc($result)){
			$position2 = $row['case'];
			// Si c'est la 2,3 ou 4 ème dernière valeurs
			if ($position2 == $position){
				echo '<div class="bloc_orange">
						</div>';
				}		
		}
		// Si il n'y a aucune valeur
		echo '<div class="bloc"></div>';			
	}
		
		
}

//Disconnecting from the database
mysqli_close($conn);


?>
	</div>

