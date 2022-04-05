

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
    $nom = $_SESSION['nom'];
    $id_client = isset($_POST['id_client'])?$_POST["id_client"]:'';

    $pdo = new PDO("mysql:host=localhost;dbname=livre_projet_2", $username, $password);

    $sql_update_ad="UPDATE `emprunt` SET `demande_emprunt` = 1 WHERE `id_client` = ? AND `id` = ?;";
    $req = $pdo->prepare($sql_update_ad);
    $req->execute (array($id_client, $id));

    $sql_update_stock="UPDATE `livre` SET `nb_exemplaires` = 0 WHERE `id` = ?;";
    $req = $pdo->prepare($sql_update_stock);
    $req->execute (array($id));


    $sql_update_stock="UPDATE `livre` SET `id_adherent_livre` = ? WHERE `id` = ?;";
    $req = $pdo->prepare($sql_update_stock);
    $req->execute (array($id_client, $id));

    echo "<br>La demande de réservation de l'id $id_client a été validé !";
  
}
?>
<br><br><a href="admin.php">Menu Admin</a>
</body>

