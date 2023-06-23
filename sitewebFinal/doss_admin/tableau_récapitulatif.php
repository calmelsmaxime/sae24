<!DOCTYPE html>
<html lang="fr">
 <head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style_login1.css">
	<link rel="stylesheet" href="../styles/nav.css">
	<link rel="stylesheet" href="../styles/tableau.css">
	<link rel="stylesheet" href="../styles/footer2.css">

	<title>Tableau récapitulatif</title>

 </head>
 
 <body>
   <header>
        <nav class="navbar">
            <div class="nav-links">
				<ul>
			
		   <li><a href="../index.html" >Accueil</a></li>
		   <li><a href="../consultation/consultation.php">Consultation</a></li>
		   <li><a href="../gestion_de_projet.html"> Gestion du projet </a></li>
		   <li class="actif"><a href="#">Tableau récapitulatif</a></li>
		   <li><a href="ajout_supp/ajout_supp.php">Ajout / Supression de valeur</a></li>

				</ul>
			</div>
    <a href="#" class="logo">SAE24 - Projet intégratif de S2</a>
        </nav>
    </header>
	
  <section>
  <h1 class="titretabl"> Tableau récapitulatif </h1>
  <br>
</section>
<section>
  <table>
        <tr>
            <th>Date</th>
            <th>Heure</th>
			<th>Case réelle</th>
			<th>Case calculée</th>
            <th>Amplitude capteur 1</th>
			<th>Amplitude capteur 2</th>
			<th>Amplitude capteur 3</th>
        </tr>

<?php 

require '../connexion_bd.php';

// Query to find the last 10 measurements in the table
$sql = "SELECT * FROM mesures
		ORDER BY id DESC
		LIMIT 10";
$result = mysqli_query($conn, $sql);



// Show in table
while ($row = mysqli_fetch_assoc($result)){

	$id = $row['id'];
    $date = $row['date']; 
	$heure = $row['heure'];
	$heure_formatee = date("H:i:s", strtotime($heure));
	$case_reel =  $row['case_val'];
	$amplitude_capteur_1 = $row ['valeur_c1'];
	$amplitude_capteur_2 = $row ['valeur_c2'];
	$amplitude_capteur_3 = $row ['valeur_c3'];

	$sql2 = "SELECT * FROM resultat
			WHERE id = '$id' 
			LIMIT 1";
	$result2 = mysqli_query($conn, $sql2);
	$row2 = mysqli_fetch_assoc($result2);
	
	$case = $row2 ['case_value'];

   // Displaying the latest values
        echo '<tr><td>', 
			$date, '</td><td>', 
			$heure_formatee, '</td><td>',
			$case_reel, '</td><td>',
			$case, '</td><td>', 
			$amplitude_capteur_1, '</td><td>',
			$amplitude_capteur_2, '</td><td>',
			$amplitude_capteur_3, '</td></tr>';
}


//Disconnecting from the database
mysqli_close($conn);



?>

</table>


</section>


</body>
</html>