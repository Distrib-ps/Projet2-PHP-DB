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

$titre = $_POST["titre"];
$auteur = $_POST["auteur"];
$categorie = $_POST["categorie"];


$pdo = new PDO("mysql:host=localhost;dbname=livre_projet_2", $username, $password);

//Requête creation utilisateur
$sql_ajout_livre="INSERT INTO `livre` (`titre`, `auteur`, `categorie`, `nb_exemplaires`) VALUES ('$titre', '$auteur', '$categorie', 1);";

//Attribution de la requête dans un PDO
$ajout_livre = $pdo->query($sql_ajout_livre);

$resulat = $ajout_livre->fetchAll(PDO::FETCH_OBJ); 


header("location:listes_livre.php");
  
?>
</body>

