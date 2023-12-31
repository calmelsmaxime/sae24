<!DOCTYPE html>
<html lang="fr">
 <head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style_login.css">
	<link rel="stylesheet" href="../styles/style_grid.css">
	<link rel="stylesheet" href="../styles/footer2.css">
	<link rel="stylesheet" href="../styles/tableau.css">

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
  
<section>
<h1> Affichage des 5 dernières mesures retrouvées sous forme de graphique</h1>
<div class="grid">


<?php

require '5_dern_val.php';


?>
	</div>
 </section>
 
 <section>
<h1> Affichage des 5 dernières mesures réel sous forme de tableau</h1>

<table>
	<caption> Tableau des 5 dernière valeurs</caption>
        <tr>
            <th>Date</th>
            <th>Heure</th>
			<th>Case</th>
        </tr>


<?php

require 'val_tab.php';


?>

</table>
 </section>
 
 <footer class = "white">
    <ul>
	  <li>IUT de Blagnac</li>
	  <li>Département Réseaux et Télécommunications</li>
      <li>BUT1</li>
	</ul>  
  </footer>
 
</body>
</html>
