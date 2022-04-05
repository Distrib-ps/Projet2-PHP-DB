<?php
session_start();
if ($_SESSION['autoriser']!="oui") {
    header("location:index.php");
}
else {
    $bienvenue = "Bienvenue ".$_SESSION['nom']." <br>";
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css"></head>
<body>
<form class="form-style-9" >
<ul>
<li>
    <a href="http://localhost/projet2-php-db/admin.php"><input type="button" value="Panel admin !" /></a>
</li>
<?php
    $username = 'lou';
    $password = 'lou';


$pdo = new PDO("mysql:host=localhost;dbname=livre_projet_2", $username, $password);

//Requête creation utilisateur
$sql_recherche_client="SELECT * FROM livre";

//Attribution de la requête dans un PDO
$recherche_client = $pdo->query($sql_recherche_client);

$resulat = $recherche_client->fetchAll(PDO::FETCH_OBJ); 

$count = $recherche_client->rowCount();

for($n = 0; $n < $count; $n++) {
    echo '<pre>';
    //La balise <pre> représente un texte préformaté, les espaces utilisés dans le document HTML seront retranscrits
        echo($resulat[$n]->id);
        echo ' - ';
        echo($resulat[$n]->titre);
        echo ' - ';
        echo($resulat[$n]->auteur);
        echo ' - ';
        echo($resulat[$n]->categorie);
        echo ' - ';
        echo($resulat[$n]->nb_exemplaires.' livre disponible');
        echo '</pre>';
}

}
?>
      </form>
</body>
</html>
