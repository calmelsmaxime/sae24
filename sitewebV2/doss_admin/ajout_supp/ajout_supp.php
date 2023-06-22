<!DOCTYPE html>
<html lang="fr">
 <head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles/style_login.css">
	<link rel="stylesheet" href="../../styles/formulaire.css">
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
				   <li class="actif"><a href="">Ajout / Supression de valeur</a></li>

				</ul>
			</div>
			<a href="#" class="logo">SAE24 - Projet intégratif de S2</a>
		</nav>
  </header> 
   <section>
    <h1 class="white"> Ajout/Suppression de valeurs</h1>
	</section>
  <section>
	<form class="ajout_aj" action="ajout1.html" method="post">			
			<input type="submit" name="ajout" value="Cliquez ici pour ajouter une valeur">
		</form>
&ensp;
		<form class="ajout_supp" action="supp1.php" method="post">			
			<input type="submit" name="suppression" value="Cliquez ici pour supprimer une valeur">
		</form>
&ensp;
		<form class="ajout_supp" action="supp_der.php" method="post">			
			<input type="submit" name="suppression" value="Cliquez ici pour supprimer la dernière valeur">
		</form>
&ensp;

</section>


<section>
<?php 

if (isset($_GET['message'])) {
    $message = $_GET['message'];
    echo "<script>alert('" . htmlspecialchars($message) . "');</script>";
}

if (isset($_GET['message2'])) {
    $message2 = $_GET['message2'];
    echo "<script>alert('" . htmlspecialchars($message2) . "');</script>";
}

if (isset($_GET['message3'])) {
    $message2 = $_GET['message3'];
    echo "<script>alert('" . htmlspecialchars($message3) . "');</script>";
}


?>
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