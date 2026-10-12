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

$sql = "INSERT INTO materiel
(`id materiel`,`type materiel`,constructeur,modele,`date mise en service`,`id agent`)
VALUES
('$id_materiel','$type','$constructeur','$modele','$date','$id_agent')";

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