<!DOCTYPE html>
<html lang="fr">
 <head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style_login.css">
	<title>Tableau récapitulatif</title>
  <meta charset="utf-8">
 </head>
 
 <body>
   <header>
        <nav class="navbar">
            <div class="nav-links">
				<ul>
			
		   <li><a href="../index.html" >Accueil</a></li>
		   <li><a href="../consultation/consultation.php">Consultation</a></li>
		   <li><a href="../gestion_de_projet.html"> Gestion du projet </a></li>
		   <li><a href="#">Tableau récapitulatif</a></li>
		   <li><a href="ajout_supp/ajout_supp.html">Ajout / Supression de valeur</a></li>

    </ul>
   </nav>
  </header> 
  
  <section>
<table>
	<caption> Tableau récapitulatif </caption>
        <tr>
            <th>Date</th>
            <th>Heure</th>
			<th>case axes x</th>
			<th>case axes y</th>
            <th>amplitude capteur 1</th>
			<th>amplitude capteur 2</th>
			<th>amplitude capteur 3</th>
        </tr>

<?php 

require '../connexion_bd.php';

// Requête pour trouver les 10 dernière mesures
sql = 'SELECT * FROM resultat
		ORDER BY id DESC
		LIMIT 10';
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

//Disconnecting from the database
mysqli_close($conn);


// Afficher dans le tableau
while (row){

    $date = $row['Date']; 
	$heure = $row['Horaire'];
	$heure_formatee = date("H:i:s", strtotime($heure));
	$case_axes_x = $row [''];
	$case_axes_y = $row [''];
	$amplitude_capteur_1 = $row [''];
	$amplitude_capteur_2 = $row [''];
	$amplitude_capteur_3 = $row [''];


   // Displaying the latest values
        echo '<tr><td>', 
			$date, '</td><td>', 
			$heure_formatee, '</td><td>', 
			$case_axes_x, '</td><td>', 
			$case_axes_y, '</td><td>', 
			$amplitude_capteur_1, '</td><td>',
			$amplitude_capteur_2, '</td><td>',
			$amplitude_capteur_3, '</tr>';
}













?>

</table>


</section>

<footer>
    <ul>
	  <li>IUT de Blagnac</li>
	  <li>Département Réseaux et Télécommunications</li>
      <li>BUT1</li>
	</ul>  
  </footer>

</body>
</html>