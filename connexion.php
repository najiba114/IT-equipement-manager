<?php

$host="localhost";
$user="root";
$password="";
$database="gestion de materiel";

$conn=mysqli_connect($host,$user,$password,$database);

if(!$conn)
{
    die("Erreur de connexion.");
}

?>