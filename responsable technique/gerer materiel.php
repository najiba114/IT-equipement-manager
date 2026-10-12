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

<title>Gérer Matériel</title>

<style>

body{

    font-family:Arial;
    background:#f4f4f4;

}

.container{

    width:500px;
    margin:50px auto;
    background:white;
    padding:30px;
    border-radius:10px;
    text-align:center;
    box-shadow:0 0 10px gray;

}

button{

    width:250px;
    padding:15px;
    margin:10px;
    background:#2563eb;
    color:white;
    border:none;
    border-radius:8px;
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

<h2>Gestion des Matériels</h2>

<a href="ajouter_materiel.php">
<button>Ajouter</button>
</a>

<br>

<a href="consulter_materiel.php">
<button>Consulter</button>
</a>

<br>

<a href="modifier_materiel.php">
<button>Modifier</button>
</a>

<br>

<a href="supprimer_materiel.php">
<button>Supprimer</button>
</a>

<br><br>

<a href="accueil_responsable.php">
<button>Retour</button>
</a>

</div>

</body>

</html>