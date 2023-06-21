<!DOCTYPE html>
<html lang="fr">
 <head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="styles/bas_de_page.css">

 </head>
 
 <body>
<?php 


$Date = $_POST['Date'];
$horaire = $_POST['horaire'];
$val1 = $_POST['val1'];
$val2 = $_POST['val2'];
$val3 = $_POST['val3'];


require '../../connexion_bd.php';


//Request to add the measure
$sql5 = "INSERT INTO mesures (`valeur_c1`, `valeur_c2`, `valeur_c3`, `date`, `heure`) 
         VALUES ('$val1', '$val2' ,'$val3', STR_TO_DATE('$Date', '%Y-%m-%d'), '$horaire')";
$result5 = mysqli_query($conn, $sql5);


// Requete pour trouver l'id de la mesure ajouté
$sql2 = "SELECT id FROM mesures
		WHERE valeur_c1 = '$val1' AND valeur_c2= '$val2' AND valeur_c3='$val3' AND date = STR_TO_DATE('$Date', '%Y-%m-%d') AND heure = '$horaire'
		LIMIT 1";
$result2 = mysql_query ($conn, $sql2);
$row2 = mysqli_fetch_assoc ($result2);
$id = $row2 ['id'];



// Calcul du résultat grâce à un script php
require 'ampli.php'


// Envoie du résultat dans la table résultat
$sql = "INSERT INTO resultat (`case`) 
		WHERE id = '$id'
       VALUES ('$case')";
$result = mysqli_query($conn, $sql);



// Check execution of the query
if ($result5 && result) {
    echo "La mesure a été ajouté avec succès.";
} else {
    echo "Une erreur s'est produite lors de l'ajout de la mesure : " . mysqli_error($conn);
}

//Disconnecting from the database
mysqli_close($conn);
?>



</body>
</html>