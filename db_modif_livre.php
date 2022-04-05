

<?php
session_start();
if ($_SESSION['autoriser']!="oui") {
    header("location:index.php");
}
else {
    ?>
    <!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css"></head>
<body>
<form class="form-style-9" method="post" action="db_modif_livre.php">
    <?php
    $username = 'lou';
    $password = 'lou';
    $id = isset($_POST["idd"])?$_POST["idd"]:'';
    $titre = isset($_POST["titre"])?$_POST["titre"]:'';
    $auteur = isset($_POST["auteur"])?$_POST["auteur"]:'';
    $categorie = isset($_POST["categorie"])?$_POST["categorie"]:'';

    $pdo = new PDO("mysql:host=localhost;dbname=livre_projet_2", $username, $password);

    //Requête creation utilisateur
    $sql_update_client="UPDATE `livre` SET `titre`= ? , `auteur` = ? , `categorie` = ? WHERE `id` = $id";

    $req = $pdo->prepare($sql_update_client);

    $req->execute (array($titre, $auteur, $categorie));


    echo 'Enregistrement modifié avec succès !';
  
}
?>
<br><br>
<table>
  <tr>
    <td>ID du livre&nbsp;</td>
    <td>Titre&nbsp;</td>
    <td>Auteur&nbsp;</td>
    <td>Catégorie&nbsp;</td>
  </tr>
  <tr>
    <center><td><?= $id  ?></td></center>
    <td><?= $titre  ?></td>
    <td><?=  $auteur ?></td>
    <td><?=  $categorie  ?></td>
</td>
  </tr>
</table>
<br><br><a href="admin.php">Menu Admin</a>
</body>

