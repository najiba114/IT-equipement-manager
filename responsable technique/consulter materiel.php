<?php

session_start();

if(!isset($_SESSION['id']))
{
    header("Location:../index.html");
    exit();
}

include("../connexion.php");

$sql="SELECT * FROM materiel";

$result=mysqli_query($conn,$sql);

?>

<!DOCTYPE html>

<html>

<head>

<meta charset="UTF-8">

<title>Consulter Matériel</title>

<style>

body{

    font-family:Arial;
    background:#f4f4f4;
    margin:0;

}

.container{

    width:90%;
    margin:auto;
    margin-top:30px;

}

table{

    width:100%;
    border-collapse:collapse;
    background:white;

}

table,th,td{

    border:1px solid black;

}

th{

    background:#2563eb;
    color:white;
    padding:10px;

}

td{

    padding:10px;
    text-align:center;

}

button{

    padding:10px 20px;
    background:#2563eb;
    color:white;
    border:none;
    cursor:pointer;
    border-radius:5px;

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

<h2>Liste des Matériels</h2>

<table>

<tr>

<th>ID Matériel</th>

<th>Type</th>

<th>Constructeur</th>

<th>Modèle</th>

<th>Date Mise en Service</th>

<th>ID Agent</th>

</tr>

<?php

while($row=mysqli_fetch_assoc($result))
{

?>

<tr>

<td><?php echo $row['id materiel']; ?></td>

<td><?php echo $row['type materiel']; ?></td>

<td><?php echo $row['constructeur']; ?></td>

<td><?php echo $row['modele']; ?></td>

<td><?php echo $row['date mise en service']; ?></td>

<td><?php echo $row['id agent']; ?></td>

</tr>

<?php

}

?>

</table>

<br>

<a href="gerer_materiel.php">

<button>

Retour

</button>

</a>

</div>

</body>

</html>