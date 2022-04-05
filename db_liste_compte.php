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
$sql_demande_del="SELECT * FROM adherents WHERE demande_delete = 1";

//Attribution de la requête dans un PDO
$demande_del = $pdo->query($sql_demande_del);

$resulat = $demande_del->fetchAll(PDO::FETCH_OBJ); 

$count = $demande_del->rowCount();

for($n = 0; $n < $count; $n++) {
    echo '<pre>';
    //La balise <pre> représente un texte préformaté, les espaces utilisés dans le document HTML seront retranscrits
        echo($resulat[$n]->id_client);
        echo ' - ';
        echo($resulat[$n]->nom_client);
        echo ' - ';
        echo($resulat[$n]->prenom_client);
        echo ' - ';
        echo($resulat[$n]->adresse_client);
        echo ' - ';
        echo($resulat[$n]->code_postal);
        echo ' - ';
        echo($resulat[$n]->ville);
        echo '</pre>';
$id = $resulat[$n]->id_client;
?>
<form  method="post" action="db_suppression.php">
<input type="hidden" name="idd" value="<?= $id ?>" />
<ul>
<li><center>
<input type="submit" value="/!\ Suppression du compte ! <?= $id ?>" />
</center>
</li>
</ul>
</form>
      </form>
      <?php
    }

}
?>
</body>
</html>
