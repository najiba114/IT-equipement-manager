<?php

session_start();

if (!isset($_SESSION['id'])) {
    header("Location:../index.html");
    exit();
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>

<meta charset="UTF-8">

<title>Menu Responsable Technique</title>

<style>

body{

    margin:0;
    font-family:Arial;
    background:#f4f4f4;

}

.container{

    width:500px;
    margin:60px auto;
    background:white;
    padding:30px;
    border-radius:10px;
    text-align:center;
    box-shadow:0px 0px 10px gray;

}

h1{

    color:#2563eb;

}

button{

    width:250px;
    padding:15px;
    margin:15px;
    font-size:18px;
    background:#2563eb;
    color:white;
    border:none;
    border-radius:8px;
    cursor:pointer;

}

button:hover{

    background:#1d4ed8;

}

a{

    text-decoration:none;

}

.logout{

    margin-top:30px;

}

</style>

</head>

<body>

<div class="container">

<h1>

Bienvenue

<?php

echo $_SESSION['nom']." ".$_SESSION['prenom'];

?>

</h1>

<a href="gerer materiel.php">
<button>Gérer Matériel</button>
</a>

<br>

<a href="gerer technicien.php">
<button>Gérer Technicien</button>
</a>

<br>

<a href="affecter panne.php">
<button>Affecter une Panne</button>
</a>

<br>

<a href="consulter reparation.php">
<button>Consulter Réparations</button>
</a>

<div class="logout">

<a href="../logout.php">

<button>Déconnexion</button>

</a>

</div>

</div>

</body>

</html>