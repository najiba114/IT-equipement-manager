<?php

session_start();

if(!isset($_SESSION['id']))
{
    header("Location:../index.html");
    exit();
}

include("../connexion.php");


// nethabet elli fama id jey mel bouton supprimer

if(isset($_GET['id']))
{

    $id = $_GET['id'];


    // requete suppression

    $sql = "DELETE FROM materiel WHERE `id materiel` = '$id'";


    $result = mysqli_query($conn,$sql);


    if($result)
    {
        echo "
        <script>
        alert('Matériel supprimé avec succès');
        window.location.href='supprimer_materiel.php';
        </script>
        ";
    }

    else
    {
        echo "
        <script>
        alert('Erreur lors de la suppression');
        window.location.href='supprimer_materiel.php';
        </script>
        ";
    }


}

else
{

    header("Location:supprimer_materiel.php");

}


?>