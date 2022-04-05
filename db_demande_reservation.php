

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
    $id = $_POST['idd'];
    $nom = $_SESSION['nom'];
    $username = 'lou';
    $password = 'lou';

    $pdo = new PDO("mysql:host=localhost;dbname=livre_projet_2", $username, $password);

    $sql_touve_id="SELECT id_client from adherents where nom_client = ?;";
    $reqe = $pdo->prepare($sql_touve_id);
    $reqe->execute (array($nom));  
    $row = $reqe->fetchAll(PDO::FETCH_OBJ);
    $count = $reqe->rowCount();
    for($n = 0; $n < $count; $n++) {
$idclient = $row[$n]->id_client;
}

$date1 = date("Y-m-d"); 
$date2 = date("Y-m-d", strtotime($date1.'+ 31 days'));
        //Requête creation utilisateur
        $sql_update_ad="INSERT INTO `emprunt` (date_debut, date_fin, id_client, id) VALUES (?, ?, ?, ?)";
        $req = $pdo->prepare($sql_update_ad);
        $req->execute (array($date1, $date2, $idclient, $id));


    echo 'Demande effectué avec succès. Merci de patienter.';
  
}
?>
<br><br>

<br><br><a href="admin.php">Retour Menu</a>
</body>

