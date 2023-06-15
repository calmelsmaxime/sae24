<html lang="fr">
 <head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style_login.css">
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