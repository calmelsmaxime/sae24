<!DOCTYPE html>
<html lang="fr">
 <head>
  <meta charset="utf-8">
 </head>
 <body>
 
 <?php

$host = 'localhost';
$username = 'root';
$password = ''; 
$database = 'sae24';

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die('Connexion impossible : ' . mysqli_connect_error());
}

?>
</body>
</html>