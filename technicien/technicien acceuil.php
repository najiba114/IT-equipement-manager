<?php

session_start();

if(!isset($_SESSION['id']))
{

header("Location:../index.php");

}

?>

<!DOCTYPE html>

<html>

<head>

<title>Technicien</title>

</head>

<body>

<h1>

Bienvenue

<?php

echo $_SESSION['nom']." ".$_SESSION['prenom'];

?>

</h1>

<h2>Menu Technicien</h2>

<a href="../logout.php">Déconnexion</a>

</body>

</html>