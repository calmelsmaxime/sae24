<!DOCTYPE html>
<html lang="fr">
 <head>
  <meta charset="utf-8">
 </head>
 <body>

<?php

require '../connexion_bd.php';


// Reqête pour trouver la dernière valeur
$sql2 = 'SELECT * FROM resultat
		ORDER BY id DESC
		LIMIT 1';
$result2 = mysqli_query($conn, $sql2);
$row2 = mysqli_fetch_assoc($result2);
$dern_position = $row2['position'];
$der_id = $row2['id'];


// Requête pour trouver les 4 dernière mesures sans la toute dernière et la 5
$id4 = $der_id - 1;
$id2 = $der_id - 3;

$sql = 'SELECT * FROM resultat
		ORDER BY id DESC
		LIMIT BETWEEN "id2" "$id4"';
$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);


// Reqête pour trouver la 5ème dernière valeur
$id5 = $der_id - 4;

$sql3 = 'SELECT * FROM resultat
		ORDER BY id DESC
		LIMIT BETWEEN "$id5" AND "$id5"';
$result3 = mysqli_query($conn, $sql3);
$row3 = mysqli_fetch_assoc($result3);
$val5 = $row3['position'];

//Disconnecting from the database
mysqli_close($conn);



//Boucle pour faire le graphique
for ($i=0; $i<16 ; $i++){
	for ($j=0; $j<16; $j++){

		// Si c'est la dernière valeur
		if ($dern_position = $i.$j ){
			echo 'image verte';
		}

		// Si c'est la 5 ème dernière valeur
		else if ($val5 = $iS.$j ){
			echo 'image rouge';
		}	

		// Si c'est ni l'un ni l'autre
		else {

			while ($row){
				$position = $row['position'];
				
				// Si c'est la 2,3 ou 4 ème dernière valeurs
				if ($position = '$i.$j'){
					echo 'image orange ';
				}

				// Si il n'y a aucune valeur
				else {
					echo 'image gris';
				}
			}
		}
	
	}
}

?>

</body>
</html>