

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

    $pdo = new PDO("mysql:host=localhost;dbname=livre_projet_2", $username, $password);

    $sql_del_client="DELETE FROM `livre` WHERE `id`= ?";

    $req = $pdo->prepare($sql_del_client);

    $req->execute (array($id)); 


    echo "Suppression du livre associé à l'id ".$id. ' effectué avec succès.';
  
}
?>
<br><br><a href="admin.php">Menu Admin</a>
</body>

