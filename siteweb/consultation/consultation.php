<!DOCTYPE html>
<html lang="fr">
 <head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style_login.css">
	<link rel="stylesheet" href="../styles/style_grid.css">
	<link rel="stylesheet" href="../styles/bas_de_page.css">
	<script src="actualisation.js"></script>

	<title>Consultation</title>
 </head>
 
 <body>
   <header>
        <nav class="navbar">
            <div class="nav-links">
				<ul>
				   <li><a href="../index.html" >Accueil</a></li>
				   <li><a href="">Consultation</a></li>
				   <li><a href="../gestion_de_projet.html"> Gestion du projet </a></li>
				   <li><a href="../doss_admin/page_admin.html">Administrateur</a></li>
				   <li><a href="../mention_légale.html">Mention légale</a></li>
                </ul>
            </div>
        </nav>
    </header>
  
<section id="zero">
<h1 id="titre_grille"> Affichage des 5 dernières mesures sous forme de graphique</h1>
<div class="grid">


<?php

require '5_dern_val.php';


?>
	</div>
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
