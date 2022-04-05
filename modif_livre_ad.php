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
<form class="form-style-9">

<ul>
<li>
    <a href="http://localhost/projet2-php-db/admin.php"><input type="button" value="Panel admin !" /></a>
</li>
<?php
$id = "lou";
$mdp = 'lou';
$pdo = new PDO("mysql:host=localhost;dbname=livre_projet_2", $id, $mdp);
$idC = $_POST['idLivre'] ?? "";
$nom = $_SESSION['nom'];
$dem_emp = 0;



$sql_touve_id="SELECT id_client from adherents where nom_client = ?;";
$reqe = $pdo->prepare($sql_touve_id);
$reqe->execute (array($nom));  
$row = $reqe->fetchAll(PDO::FETCH_OBJ);
$count = $reqe->rowCount();
for($n = 0; $n < $count; $n++) {
$idclient = $row[$n]->id_client;
}
$sql_update_ad="SELECT demande_emprunt from emprunt WHERE demande_emprunt = 1 AND id_client = ?";
$reqe = $pdo->prepare($sql_update_ad);
$reqe->execute (array($idclient));
$row = $reqe->fetchAll(PDO::FETCH_OBJ);
$count = $reqe->rowCount();
for($n = 0; $n < $count; $n++) {
$dem_emp = $row[$n]->demande_emprunt;
}

$query = $pdo->prepare("SELECT * FROM livre WHERE id=:idC OR titre LIKE :titre");
$query->bindValue(':idC', $idC, PDO::PARAM_STR);
$query->bindValue(':titre', '%'.$idC.'%', PDO::PARAM_STR);
$query->execute();

$row = $query->fetchAll(PDO::FETCH_OBJ);

$count = $query->rowCount();

if(empty($count)) {
    echo 'Vide - Erreur';
} elseif ($dem_emp == 1) {
    echo 'Vous avez déja une réservation en cours...';
}
else{
for($n = 0; $n < $count; $n++) {
?>

    <tr><b>
    <td><?php echo $row[$n]->id ?></td> | 
    <td><?php echo $row[$n]->titre ?></td> | 
    <td><?php echo $row[$n]->auteur ?></td> | 
    <td><?php echo $row[$n]->categorie ?></td> | 
    <td><?php echo $row[$n]->nb_exemplaires.' exemplaire' ?></td></b>


    
</tr>
<?php $id = $row[$n]->id ?>
<?php $titre = $row[$n]->titre;?>
<?php $auteur = $row[$n]->auteur;?>
<?php $categorie = $row[$n]->categorie;?>
<?php $nb_exemplaires = $row[$n]->nb_exemplaires;?>



<ul>
</form>
<?php
   
if ($nb_exemplaires == 0) {
    echo '<br>Aucun livre disponible. Vous ne pouvez pas réserver.<br><br>';

} else {
?>





<li>
    <br>
    
    <form method="post" action="db_demande_reservation.php">
<input type="hidden" name="idd" value="<?= $id ?>" />

<input type="submit" value="Demande de réservation" />
</li>
</ul>
</form>

</form>
<?php
}
			}
        }
			?>
</body>
</html>
<?php 
 //   }
//    catch (Exception $e) {
//        echo 'erreur' . $e->getMessage();
 //   }
//}
}
?>