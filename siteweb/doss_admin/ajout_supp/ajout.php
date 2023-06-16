<!DOCTYPE html>
<html lang="fr">
 <head>
	<meta charset="UTF-8">

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


// Check execution of the query
if ($result5) {
    echo "La mesure a été ajouté avec succès.";
} else {
    echo "Une erreur s'est produite lors de l'ajout de la mesure : " . mysqli_error($conn);
}

//Disconnecting from the database
mysqli_close($conn);
?>



</body>
</html>