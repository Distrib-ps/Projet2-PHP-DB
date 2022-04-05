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
<form class="form-style-9" method="post" action="db_modif.php">
<ul>
<li>
    <a href="http://localhost/projet2-php-db/admin.php"><input type="button" value="Panel admin !" /></a>
</li>
<?php
$id = "lou";
$mdp = 'lou';
$pdo = new PDO("mysql:host=localhost;dbname=livre_projet_2", $id, $mdp);
$idC = $_POST['idClient'] ?? "";

$query = $pdo->prepare("SELECT * FROM adherents WHERE id_client=:idC OR nom_client=:idC");
$query->bindValue(':idC', $idC, PDO::PARAM_STR);
$query->execute();

$row = $query->fetchAll(PDO::FETCH_OBJ);

$count = $query->rowCount();

if(empty($count)) {
    echo 'Vide - Erreur';
}
else{
for($n = 0; $n < $count; $n++) {
?>

    <tr>
    <td><?php echo $row[$n]->id_client ?></td>
    <td><?php echo $row[$n]->nom_client ?></td>
    <td><?php echo $row[$n]->prenom_client ?></td>
    <td><?php echo $row[$n]->adresse_client ?></td>
    <td><?php echo $row[$n]->code_postal ?></td>
    <td><?php echo $row[$n]->ville ?></td>


    
</tr>
<?php $id = $row[$n]->id_client ?>
<?php $cp = $row[$n]->code_postal;?>
<?php $ad = $row[$n]->adresse_client;?>
<?php $ville = $row[$n]->ville;?>
<ul>
<li>
    <br>
<input type="hidden" name="idd" value="<?= $id ?>" />
    <input type="text" name="cp" class="field-style field-split align-left" placeholder="Code Postal" value="<?= $cp ?>" />
    <input type="text" name="ville" class="field-style field-split align-right" placeholder="Ville" value="<?= $ville ?>"/>
<input type="text" name="adresse" class="field-style" placeholder="Adresse" value="<?= $ad ?>"> </input>
<input type="submit" value="Modif" />
</li>
</ul>
</form>
<form method="post" action="db_suppression.php">
<input type="hidden" name="idd" value="<?= $id ?>" />
<ul>
<li><center>
    <br>
<input type="submit" value="/!\ Suppression du compte !" />
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
<?php 
 //   }
//    catch (Exception $e) {
//        echo 'erreur' . $e->getMessage();
 //   }
//}
}
?>