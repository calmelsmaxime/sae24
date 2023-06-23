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
				   <li><a href="ajout_supp.php">Ajout / Supression de valeur</a></li>

				</ul>
			</div>
			<a href="#" class="logo">SAE24 - Projet intégratif de S2</a>
		</nav>
  </header> 
  
  <section>

	<form class="ajout_supp2"  action="supp2.php" method="post">	
	<label for='date'>Choisissez la date : </label><br>
			<select name="date" id="date"><br>
	<?php
	
	require '../../connexion_bd.php';
	
	// Search dates
	$sql = "SELECT DISTINCT date FROM mesures
			ORDER BY date DESC";
	$result = mysqli_query($conn, $sql);
	
	while ($row = mysqli_fetch_assoc($result)){
		$date = $row ['date'];
		echo "<option value='$date'> $date </option>";
		
	};
	
	
//Disconnecting from the database
mysqli_close($conn);


	
	?>
			</select><br>
		<input type="submit" value="Cliquez ici pour choisir l'heure">
	</form>




</section>

</body>
</html>