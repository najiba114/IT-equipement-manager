<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("Location:../index.html");
    exit();
}

include("../connexion.php");

$sql = "SELECT
            panne.`id panne`,
            materiel.`type materiel`,
            materiel.constructeur,
            materiel.modele
        FROM panne
        INNER JOIN materiel
        ON panne.`id materiel` = materiel.`id materiel`";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Menu Agent</title>

    <style>

        body{
            font-family:Arial;
            background:#f4f4f4;
            margin:0;
        }

        .container{
            width:80%;
            margin:auto;
            margin-top:30px;
        }

        table{
            width:100%;
            border-collapse:collapse;
            margin-top:20px;
            background:white;
        }

        table,th,td{
            border:1px solid gray;
        }

        th{
            background:#2563eb;
            color:white;
            padding:10px;
        }

        td{
            padding:10px;
        }

        input,textarea{

            width:100%;
            padding:10px;
            margin-top:10px;

        }

        input[type=submit]{

            width:200px;
            background:#2563eb;
            color:white;
            border:none;
            cursor:pointer;

        }

    </style>

</head>

<body>

<div class="container">

<h2>
Bienvenue
<?php
echo $_SESSION['nom']." ".$_SESSION['prenom'];
?>
</h2>

<h3>Liste des Pannes</h3>

<table>

<tr>

<th>ID Panne</th>

<th>Matériel</th>

</tr>

<?php

while($row=mysqli_fetch_assoc($result))
{

?>

<tr>

<td><?php echo $row['id panne']; ?></td>

<td>

<?php

echo $row['type materiel']." - ".
$row['constructeur']." - ".
$row['modele'];

?>

</td>

</tr>

<?php

}

?>

</table>

<h3>Ajouter une description</h3>

<form action="enregistrer panne.php" method="POST">

<label>ID Panne</label>

<input
type="number"
name="id panne"
required>

<label>Description</label>

<textarea
name="description"
rows="6"
required></textarea>

<br><br>

<input
type="submit"
value="Enregistrer">

</form>

<br>

<a href="../logout.php">

Déconnexion

</a>

</div>

</body>

</html>