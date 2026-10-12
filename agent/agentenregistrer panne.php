<?php

include("../connexion.php");

$id=$_POST['id_panne'];

$description=$_POST['description'];

$sql="UPDATE panne
SET `description par agent`='$description'
WHERE `id panne`='$id'";

if(mysqli_query($conn,$sql))
{

header("Location:agent acceuil.php");

}

else
{

echo "Erreur.";

}

?>