

<?php

require '../connexion_bd.php';

//Query to take the last 5 ids in the measurement tables
$sql = 'SELECT * FROM mesures
		ORDER BY id DESC
		LIMIT 5';
$result = mysqli_query($conn, $sql);


while ($row = mysqli_fetch_assoc($result)){
	//Retrieving information to display in tables
	$date = $row['date']; 
	$heure = $row['heure'];
	$heure_formatee = date("H:i:s", strtotime($heure));
	$case = $row ['case_val'];
	
	//Display of its information
	 echo '<tr><td>', 
			$date, '</td><td>', 
			$heure_formatee, '</td><td>', 
			$case, '</td></tr>';
	
}

//Disconnecting from the database
mysqli_close($conn);


?>
