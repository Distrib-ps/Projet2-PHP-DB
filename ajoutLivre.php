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
<form class="form-style-9" method="post" action="db_AjouterLivre.php">
<ul>
<li>
    <input type="text" name="titre" class="field-style field-split align-left" placeholder="Titre" required/>
    <input type="text" name="auteur" class="field-style field-split align-right" placeholder="Auteur" required/><br>
    <input type="text" name="categorie" class="field-style field-split align-right" placeholder="Catégorie" required/>

</li>
<li>
<input type="submit" value="Ajouter livre !" />
<a href="http://localhost/projet2-php-db/admin.php"><input type="button" value="Retour" /></a>
</li>
</ul>
</form>
</body>
</html>
<?php
}
?>