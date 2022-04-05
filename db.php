<html>
    <head>
        <title>Formulaire DB</title>
        <meta charset="utf-8">
        <link rel="stylesheet">
    </head>
    <body>
        <center><h1> Formulaire DB</h1></center>
<?php
$username = 'lou';
$password = 'lou';

$nom = $_POST["nom"];
$prenom = $_POST["prenom"];
$mdp = $_POST["mdp"];
$cp = $_POST["cp"];
$ville = $_POST["ville"];
$adresse = $_POST["adresse"];
$age = $_POST["age"];

$pdo = new PDO("mysql:host=localhost;dbname=livre_projet_2", $username, $password);

//Requête creation utilisateur
$sql_creation_client="INSERT INTO `adherents` (`nom_client`, `prenom_client`, `adresse_client`, `code_postal`, `ville`, `mdp`, `age`) VALUES ('$nom', '$prenom', '$adresse', '$cp', '$ville', '$mdp', '$age');";

//Attribution de la requête dans un PDO
$creation_client = $pdo->query($sql_creation_client);

$resulat = $creation_client->fetchAll(PDO::FETCH_OBJ); 


header("location:login.php");
  
?>
</body>

