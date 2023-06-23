<!DOCTYPE html>
<html lang="fr">
 <head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles/style_login.css">
	<link rel="stylesheet" href="../../styles/formulaire2.css">
	<link rel="stylesheet" href="../../styles/footer2.css">
	<link rel="stylesheet" href="../../styles/nav.css">


	<title>Ajout ou suppression de valeur</title>
 </head>
 
 <body>
   <header>
        <nav class="navbar">
            <div class="nav-links">
				<ul>
			
				   <li><a href="../../index.html" >Accueil</a></li>
				   <li><a href="../../consultation/consultation.php">Consultation</a></li>
				   <li><a href="../../gestion_de_projet.html"> Gestion du projet </a></li>
				   <li><a href="../tableau_récapitulatif.php">Tableau récapitulatif</a></li>
				   <li><a href="ajout_supp.html">Ajout / Supression de valeur</a></li>

				</ul>
			</div>
			<a href="#" class="logo">SAE24 - Projet intégratif de S2</a>
		</nav>
  </header> 
  
  <section>

	<form class="ajout_supp2"  action="supp.php" method="post">	
	<label for="horaire">Choisissez son horaire : </label><br>
			<select id="horaire" name="horaire"><br>
	<?php
	
	$date = $_POST['date'];

	require '../../connexion_bd.php';
	

	//Hours search
	$sql2 = "SELECT heure, date FROM mesures
			WHERE date = '$date'
			ORDER BY heure DESC";
	$result2 = mysqli_query($conn, $sql2);
	
			
	while ($row2 = mysqli_fetch_assoc($result2)){
		$heure = $row2['heure'];
		$heure_formatee = date("H:i:s", strtotime($heure));		
		echo "<option value= '$heure_formatee' > $heure_formatee </option>";
		
	};
	

//Disconnecting from the database
mysqli_close($conn);

echo "</select><br>";

echo '<input type="hidden" name="date" value="' . $date . '">';

	
	?>
		
			<input type="submit" value="Cliquez ici pour supprimer la valeur">
		</form>


</section>

</body>
</html>