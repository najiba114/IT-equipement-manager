<?php

session_start();

include("connexion.php");

$id=$_POST['id'];

$password=$_POST['password'];

$fonction=$_POST['fonction'];

$sql="SELECT * FROM employé
WHERE 'id employé' ='$id'
AND 'mot de passe'='$password'
AND 'fonction'='$fonction';

$result=mysqli_query($conn,$sql);

if(mysqli_num_rows($result)==1)
{

$user=mysqli_fetch_assoc($result);

$_SESSION['id']=$user['id employé'];

$_SESSION['nom']=$user['nom'];

$_SESSION['prenom']=$user['prenom'];

$_SESSION['fonction']=$user['fonction'];

if($fonction=="Agent")
{

header("Location:agent/agent acceuil.php");

}

elseif($fonction=="Responsable Technique")
{

header("Location:/gestion materiel/responsable/responsable acceuil.php");

}

elseif($fonction=="Technicien")
{

header("Location:technicien/technicien acceuil.php");

}

}

else
{

echo "ID ou mot de passe incorrect.";

}

?>