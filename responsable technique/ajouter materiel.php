<?php

session_start();

if(!isset($_SESSION['id']))
{
    header("Location:../index.html");
    exit();
}

?>

<!DOCTYPE html>

<html>

<head>

<meta charset="UTF-8">

<title>Ajouter Matériel</title>

<style>

body{

    font-family:Arial;
    background:#f4f4f4;

}

.container{

    width:500px;
    margin:40px auto;
    background:white;
    padding:30px;
    border-radius:10px;
    box-shadow:0px 0px 10px gray;

}

input{

    width:100%;
    padding:10px;
    margin-top:8px;
    margin-bottom:15px;

}

button{

    width:100%;
    padding:12px;
    background:#2563eb;
    color:white;
    border:none;
    cursor:pointer;
    font-size:16px;

}

button:hover{

    background:#1d4ed8;

}

a{

    text-decoration:none;

}

</style>

</head>

<body>

<div class="container">

<h2>Ajouter un Matériel</h2>

<form action="traitement_ajout.php" method="POST">

<label>ID Matériel</label>

<input
type="number"
name="id_materiel"
required>

<label>Type Matériel</label>

<input
type="text"
name="type_materiel"
required>

<label>Constructeur</label>

<input
type="text"
name="constructeur"
required>

<label>Modèle</label>

<input
type="text"
name="modele"
required>

<label>Date de Mise en Service</label>

<input
type="date"
name="date_service"
required>

<label>ID Agent</label>

<input
type="number"
name="id_agent"
required>

<button type="submit">

Ajouter

</button>

</form>

<br>

<a href="gerer_materiel.php">

<button>

Retour

</button>

</a>

</div>

</body>

</html>