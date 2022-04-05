

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
<form class="form-style-9" method="post" action="db_modif.php">
    <?php
    $username = 'lou';
    $password = 'lou';
    $id = isset($_POST["idd"])?$_POST["idd"]:'';
    $cp = isset($_POST["cp"])?$_POST["cp"]:'';
    $ville = isset($_POST["ville"])?$_POST["ville"]:'';
    $adresse = isset($_POST["adresse"])?$_POST["adresse"]:'';

    $pdo = new PDO("mysql:host=localhost;dbname=livre_projet_2", $username, $password);

    //Requête creation utilisateur
    $sql_update_client="UPDATE `adherents` SET `code_postal`= ? , `adresse_client` = ? , `ville` = ? WHERE `id_client` = $id";

    $req = $pdo->prepare($sql_update_client);

    $req->execute (array($cp, $adresse, $ville));


    echo 'Enregistrement modifié avec succès !';
  
}
?>
<br><br>
<table>
  <tr>
    <td>ID du client&nbsp;</td>
    <td>Code postal&nbsp;</td>
    <td>Ville&nbsp;</td>
    <td>Adresse&nbsp;</td>
  </tr>
  <tr>
    <center><td><?= $id  ?></td></center>
    <td><?= $cp  ?></td>
    <td><?=  $ville ?></td>
    <td><?=  $adresse  ?></td>
</td>
  </tr>
</table>
<br><br><a href="admin.php">Menu Admin</a>
</body>

