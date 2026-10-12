<?php

session_start();

if(!isset($_SESSION['id']))
{
    header("Location:../index.html");
    exit();
}

include("../connexion.php");

/* Si l'utilisateur a cliqué sur Modifier */
if(isset($_GET['id']))
{

$id=$_GET['id'];

$sql="SELECT * FROM materiel WHERE `id materiel`='$id'";

$result=mysqli_query($conn,$sql);

$row=mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>

<html>

<head>

<meta charset="UTF-8">

<title>Modifier Matériel</title>

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

}

input{

width:100%;
padding:10px;
margin-bottom:15px;

}

button{

width:100%;
padding:12px;
background:#2563eb;
color:white;
border:none;
cursor:pointer;

}

</style>

</head>

<body>

<div class="container">

<h2>Modifier Matériel</h2>

<form action="traitement_modifier.php" method="POST">

<input
type="hidden"
name="id materiel"
value="<?php echo $row['id materiel']; ?>">

<label>Type Matériel</label>

<input
type="text"
name="type_materiel"
value="<?php echo $row['type materiel']; ?>">

<label>Constructeur</label>

<input
type="text"
name="constructeur"
value="<?php echo $row['constructeur']; ?>">

<label>Modèle</label>

<input
type="text"
name="modele"
value="<?php echo $row['modele']; ?>">

<label>Date Mise en Service</label>

<input
type="date"
name="date service"
value="<?php echo $row['date mise en service']; ?>">

<label>ID Agent</label>

<input
type="number"
name="id agent"
value="<?php echo $row['id agent']; ?>">

<button type="submit">

Modifier

</button>

</form>

</div>

</body>

</html>

<?php

}

/* Sinon afficher la liste */

else
{

$sql="SELECT * FROM materiel";

$result=mysqli_query($conn,$sql);

?>

<!DOCTYPE html>

<html>

<head>

<meta charset="UTF-8">

<title>Choisir Matériel</title>

<style>

table{

width:100%;
border-collapse:collapse;

}

table,th,td{

border:1px solid black;

}

th,td{

padding:10px;
text-align:center;

}

button{

padding:8px 15px;

}

</style>

</head>

<body>

<h2>Choisir un Matériel à Modifier</h2>

<table>

<tr>

<th>ID</th>

<th>Type</th>

<th>Constructeur</th>

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

<td>

<a href="modifier materiel.php?id=<?php echo $row['id materiel']; ?>">

<button>

Modifier

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

<button>

Retour

</button>

</a>

</body>

</html>

<?php

}

?>