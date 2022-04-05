<?php
session_start();
$erreur = "";

if (isset($_POST["connexion"])){
    $mdp = $_POST["mdp"];
    $pseudo = htmlspecialchars($_POST["nom"]);
    $utilExiste = false;
    $pass = "lou";
    $user = "lou";
    //connexion à la bdd grâce à pdo
    $pdo = new PDO("mysql:host=localhost;dbname=livre_projet_2", $user, $pass);

    $sql = $pdo->prepare("SELECT * FROM adherents WHERE nom_client = ?");
    $sql->execute(array($pseudo));
    $utilExiste = $sql->fetchAll(PDO::FETCH_OBJ);

    $nb_result=count($utilExiste);

    if ($utilExiste) {
        $mdp_bdd = $utilExiste[0]->mdp;
        if ($mdp == $mdp_bdd)
        {
            $_SESSION['nom'] = $pseudo;
            $_SESSION['autoriser'] = 'oui';
            header('location:admin.php');
            $erreur = 'Connexion réussie';
        }
        else $erreur = 'Mot de passe incorrect.';
    }
    else $erreur = "Ce pseudo n'est pas inscrit dans la base";
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css"></head>
<body>
<form class="form-style-9" method="post" action="">
<ul>
<li>
    <input type="text" name="nom" class="field-style field-split align-left" placeholder="Nom" required/>
    <input type="password" name="mdp" class="field-style field-split align-right" placeholder="Mot de passe" required/>


</li>
<li>
<input type="submit" name="connexion" value="Login !" />
</li>
</ul>
</form>
<a href="index.php">S'inscrire</a>
<?php echo $erreur ?>
</body>
</html>

