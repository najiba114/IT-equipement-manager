<?php

session_start();

if(!isset($_SESSION['id']))
{
    header("Location:../index.html");
    exit();
}

include("../connexion.php");

$id_materiel = $_POST['id_materiel'];
$type = $_POST['type_materiel'];
$constructeur = $_POST['constructeur'];
$modele = $_POST['modele'];
$date = $_POST['date_service'];
$id_agent = $_POST['id_agent'];

$sql = "UPDATE materiel
SET
`type materiel`='$type',
constructeur='$constructeur',
modele='$modele',
`date mise en service`='$date',
`id agent`='$id_agent'
WHERE `id materiel`='$id_materiel'";

if(mysqli_query($conn,$sql))
{
    header("Location:consulter_materiel.php");
    exit();
}
else
{
    echo "Erreur : ".mysqli_error($conn);
}

mysqli_close($conn);

?>