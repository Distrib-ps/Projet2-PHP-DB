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
$sql_demande_del="SELECT EM.id_emprunt, EM.id_client, EM.id, LI.titre, AD.nom_client FROM emprunt as EM INNER JOIN `livre` as LI ON EM.id = LI.id INNER JOIN `adherents` as AD ON AD.id_client = EM.id_client WHERE EM.demande_emprunt = 0;";

//Attribution de la requête dans un PDO
$demande_del = $pdo->query($sql_demande_del);

$resulat = $demande_del->fetchAll(PDO::FETCH_OBJ); 

$count = $demande_del->rowCount();

for($n = 0; $n < $count; $n++) {
    echo '<pre> ID de l\'emprunt ';
    //La balise <pre> représente un texte préformaté, les espaces utilisés dans le document HTML seront retranscrits
        echo($resulat[$n]->id_emprunt);
        echo ' - Nom client ';
        echo($resulat[$n]->nom_client);
        echo ' - ID du livre ';
        echo($resulat[$n]->id);
        echo ' - ';
        echo($resulat[$n]->titre);
        echo '</pre>';
$id = $resulat[$n]->id;
$id_client = $resulat[$n]->id_client;
?>
</form>
<form  method="post" action="db_valide_livre.php">
<input type="hidden" name="idd" value="<?= $id ?>" />
<input type="hidden" name="id_client" value="<?= $id_client ?>" />
<ul>
<li><center>
<input type="submit" value="/!\ Valider la réservation ! <?= $id ?>" />
</center>
</li>
</ul>

      </form>
      <?php
    }

}
?>
</body>
</html>
