<!DOCTYPE html>
<html lang="fr">
 <head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles/style_login.css">
	<meta charset="utf-8">
 </head>
 
 <body>
<?php

require '../connexion_bd.php';

//Requête pour trouver le dernier id 
$sql = 'SELECT id FROM mesure
		ORDER BY id DESC
		LIMIT 1';
$id_last = mysqli_query($conn, $sql);

//Requête pour supprimer la dernière mesure dans la table mesure
$sql2 = "DELETE FROM mesure
		WHERE id = $id_last";
$result2 = mysqli_query($conn, $sql2);


//Requête pour supprimer la dernière mesure dans la table resultat
$sql3 = "DELETE FROM resultat
		WHERE id = $id_last";
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