<!DOCTYPE html>
<html lang="fr">
 <head>
	<meta charset="UTF-8">
 </head>
 
 <body>
<?php 

$Date = $_POST['Date'];
$horaire = $_POST['horaire'];
require '../connexion_bd.php';

// Cherche id correspondant dans la table mesure
$sql = "SELECT * FROM mesures
		WHERE date = $Date AND heure = $horaire ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$id = $row['id'];

//Suprime l'id dans la table resultat
$sql2 = "DELETE FROM resultat
		WHERE id = $id ";
$result2 = mysqli_query($conn, $sql2);


//Suprime l'id dans la table mesure
$sql3 = "DELETE FROM mesures
		WHERE id = $id ";
$result3 = mysqli_query($conn, $sql3);

//Disconnecting from the database
mysqli_close($conn);

// Check execution of the query
if ($result3 &&$result2 ) {
    echo "Le bâtiment a été ajouté avec succès.";
} else {
    echo "Une erreur s'est produite lors de l'ajout du bâtiment : ";
}


?>


</body>
</html>