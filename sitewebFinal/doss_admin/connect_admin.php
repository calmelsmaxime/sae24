<!DOCTYPE html>
<html lang="fr">
 <head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style_login.css">
  <meta charset="utf-8">
 </head>
 
 <body>

<section>
 <?php
 
//Connecting to the database
require '../connexion_bd.php';


// Retrieving data from the form
$username = $_POST['username'];
$password = $_POST['password'];

// Query to retrieve the user matching the provided credentials
$sql = "SELECT * FROM administration 
		WHERE login = '$username' AND mdp = '$password'";
$result = mysqli_query($conn, $sql);


if (mysqli_num_rows($result) == 1) {
	header('Location:tableau_récapitulatif.php');
    exit();
} else {
    echo "<p class='white'>Nom d'utilisateur ou mot de passe incorrect ! <p>";
}

//Disconnecting from the database
mysqli_close($conn);

?>

</section>
</body>
</html>