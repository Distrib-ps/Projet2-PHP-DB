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

$query = $pdo->prepare("SELECT * FROM livre WHERE id=:idC OR titre LIKE :titre");
$query->bindValue(':idC', $idC, PDO::PARAM_STR);
$query->bindValue(':titre', '%'.$idC.'%', PDO::PARAM_STR);
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
    <td><?php echo $row[$n]->id ?></td> | 
    <td><?php echo $row[$n]->titre ?></td> | 
    <td><?php echo $row[$n]->auteur ?></td> | 
    <td><?php echo $row[$n]->categorie ?></td> | 
    <td><?php echo $row[$n]->nb_exemplaires.' exemplaire' ?></td>


    
</tr>
<?php $id = $row[$n]->id ?>
<?php $titre = $row[$n]->titre;?>
<?php $auteur = $row[$n]->auteur;?>
<?php $categorie = $row[$n]->categorie;?>
<ul>
</form>
<li>
    <br>
    
    <form method="post" action="db_modif_livre.php">
<input type="hidden" name="idd" value="<?= $id ?>" />
    <input type="text" name="titre" class="field-style field-split align-left" placeholder="Titre" value="<?= $titre ?>" />
    <input type="text" name="auteur" class="field-style field-split align-right" placeholder="Auteur" value="<?= $auteur ?>"/>
<input type="text" name="categorie" class="field-style" placeholder="Categorie" value="<?= $categorie ?>"> </input>
<input type="submit" value="Modif" />
</li>
</ul>
</form>
<form method="post" action="db_suppression.php">
<input type="hidden" name="idd" value="<?= $id ?>" />
<ul>
<li><center>
    <br>
<input type="submit" value="/!\ Suppression du livre !" />
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