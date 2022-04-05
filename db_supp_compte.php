

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
    $nom = $_SESSION['nom'];
    $username = 'lou';
    $password = 'lou';

    $pdo = new PDO("mysql:host=localhost;dbname=livre_projet_2", $username, $password);

    //Requête creation utilisateur
    $sql_update_del="UPDATE `adherents` SET `demande_delete`= 1 WHERE `nom_client` = ?";

    $req = $pdo->prepare($sql_update_del);

    $req->execute (array($nom));


    echo 'Demande effectué avec succès. Merci de patienter.';
  
}
?>
<br><br>

<br><br><a href="admin.php">Retour Menu</a>
</body>

