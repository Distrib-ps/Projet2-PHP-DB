<?php
$username = 'lou';
$password = 'lou';
$pdo = new PDO("mysql:host=localhost;dbname=livre_projet_2", $username, $password);
$keyword = $_POST['id_client'];

$query = $pdo->prepare("SELECT * FROM adherents WHERE 'id_client'=:id_client");
$query->bindValue('id_client', PDO::PARAM_STR);
$query->execute();

$ligne = $query->fetch(PDO::FETCH_ASSOC);

$count = $query->rowCount();

for($n = 0; $n < $count; $n++) {
?>
    <tr>
    <td><?php echo $row['nom_client']?></td>
    <td><?php echo $row['prenom_client']?></td>
    <td><?php echo $row['adresse_client']?></td>
    <td><?php echo $row['code_postal']?></td>
    <td><?php echo $row['ville']?></td>
</tr>
<?php
			}
			?>