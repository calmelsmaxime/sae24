
 <?php

$host = 'lhcp3349.webapps.net';
$username = 'iv5g2mc0_adminsae24';
$password = 'Motdepasse24!'; 
$database = 'iv5g2mc0_sae24';

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die('Connexion impossible : ' . mysqli_connect_error());
}

?>
