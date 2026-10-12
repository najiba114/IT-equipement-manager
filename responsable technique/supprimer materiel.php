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

<title>Supprimer Matériel</title>

<style>

body{

font-family:Arial;
background:#f4f4f4;

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

background:#dc3545;
color:white;
padding:10px;

}

td{

padding:10px;
text-align:center;

}

button{

padding:8px 15px;
background:#dc3545;
color:white;
border:none;
cursor:pointer;
border-radius:5px;

}

button:hover{

background:#b02a37;

}

a{

text-decoration:none;

}

</style>

</head>

<body>

<div class="container">

<h2>Supprimer un Matériel</h2>

<table>

<tr>

<th>ID</th>

<th>Type</th>

<th>Constructeur</th>

<th>Modèle</th>

<th>Action</th>

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

<td>

<a href="traitement supprimer.php?id=<?php echo $row['id materiel']; ?>"

onclick="return confirm('Voulez-vous vraiment supprimer ce matériel ?');">

<button>

Supprimer

</button>

</a>

</td>

</tr>

<?php

}

?>

</table>

<br>

<a href="gerer materiel.php">

<button style="background:#2563eb;">

Retour

</button>

</a>

</div>

</body>

</html>