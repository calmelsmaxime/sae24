<!DOCTYPE html>
<html lang="fr">
 <head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style_login.css">
	<link rel="stylesheet" href="../styles/nav.css">
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
				   <li class="actif"><a href="">Consultation</a></li>
				   <li><a href="../gestion_de_projet.html"> Gestion du projet </a></li>
				   <li><a href="../doss_admin/page_admin.html">Administrateur</a></li>
				   <li><a href="../mention_légale.html">Mention légale</a></li>
                </ul>
            </div>
			<a href="#" class="logo">SAE24 - Projet intégratif de S2</a>
        </nav>
    </header>
  
<section>
<h1 class="white"> Affichage des 5 dernières mesures estimées sous forme de graphique</h1>
</section>

<section>
<div class="grid">

<?php

require '5_dern_val.php';


?>
	</div>
 </section>
 
 <section class ="top"> 
<section> 
 <p class = "vert" > Couleur de la dernière valeur</p>

 </section>
 
 <section>
 <p class = "bleu" > Couleur de l'avant dernière valeur</p>

 </section>
 
 <section>
  <p class = "jaune" >Couleur de la valeur avant la dernière valeur</p>

 </section>
 
 <section>
 <p class = "orange"> Couleur de la valeur d'après</p>

 </section>
 
 <section>
 <p class = "rouge"> Valeur qui vas être supprimer en suivant</p>

 </section>
  </section>

 
<br>

 <section>
<h1 class="titretabl"> Affichage des 5 dernières mesures réelles sous forme de tableau</h1>
<br>

</section>

<section>
<table>
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
 
 <footer class = "mention">
    <ul>
	  <li>IUT de Blagnac</li>
	  <li>Département Réseaux et Télécommunications</li>
      <li>BUT1</li>
	</ul>  
  </footer>
 
</body>
</html>
