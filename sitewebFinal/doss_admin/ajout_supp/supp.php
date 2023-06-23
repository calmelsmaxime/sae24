<!DOCTYPE html>
<html lang="fr">
 <head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="styles/bas_de_page.css">

 </head>
 
 <body>
<?php 

$Date = $_POST['date'];
$horaire = $_POST['horaire'];


require '../../connexion_bd.php';

// Look for the corresponding id in the measurement table
$sql = "SELECT * FROM mesures
		WHERE date = '$Date' AND heure = '$horaire' ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$id = $row['id'];

//Remove the id from the result table
$sql2 = "DELETE FROM resultat
		WHERE id = $id ";
$result2 = mysqli_query($conn, $sql2);


//Remove the id in the measure table
$sql3 = "DELETE FROM mesures
		WHERE id = $id ";
$result3 = mysqli_query($conn, $sql3);

//Disconnecting from the database
mysqli_close($conn);

// Check execution of the query
if ($result3 &&$result2 ) {
	$message2 = "La donnée à bien été supprimé";
	header("Location: ajout_supp.php?message2=" . urlencode($message2));
	exit;
} else {
    echo "Une erreur s'est produite lors de la suppression de la mesure ";
}


?>


</body>
</html>