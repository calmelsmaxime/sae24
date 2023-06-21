<?php

require '../connexion_bd.php';

//Requête pour prendre les 5 dernier id dans la tables mesures
$sql = 'SELECT * FROM mesures
		ORDER BY id DESC
		LIMIT 5';
$result = mysqli_query($conn, $sql);



while ($row = mysqli_fetch_assoc($result)){
	//Recupération des informations à afficher dans les tables
	$date = $row['date']; 
	$heure = $row['heure'];
	$heure_formatee = date("H:i:s", strtotime($heure));
	$id = $row['id'];
	
	// Requête pour trouver les 5 dernières cases dans la table resultat
	$sql2 = "SELECT * FROM resultat
			WHERE id = '$id'
			LIMIT 1";
	$result2 = mysqli_query($conn, $sql2);
	$row2 = mysqli_fetch_assoc($result2);
	
	$case = $row2['case'];
	
	
	//Affichage de ses informations
	 echo '<tr><td>', 
			$date, '</td><td>', 
			$heure_formatee, '</td><td>', 
			$case, '</td></tr>';
	
}

//Disconnecting from the database
mysqli_close($conn);


?>
