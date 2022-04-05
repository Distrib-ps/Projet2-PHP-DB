<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css"></head>
<body>
<form class="form-style-9" method="post" action="db.php">
<ul>
<li>
    <input type="text" name="nom" class="field-style field-split align-left" placeholder="Nom" required/>
    <input type="text" name="prenom" class="field-style field-split align-right" placeholder="Prenom" required/>
    <input type="password" name="mdp" class="field-style field-split align-right" placeholder="Mot de passe" required/>

</li>
<li>
    <input type="text" name="cp" class="field-style field-split align-left" placeholder="Code Postal" required/>
    <input type="text" name="ville" class="field-style field-split align-right" placeholder="Ville" required/>
</li>
<li>
<input type="text" name="adresse" class="field-style" placeholder="Adresse" required></input>
</li>
<li>
<input type="text" name="age" class="field-style" placeholder="Age" required></input>
</li>
<li>
<input type="submit" value="Inscriptions !" />
<a href="http://localhost/projet2-php-db/login.php"><input type="button" value="Login !" /></a>
</li>
</ul>
</form>
</body>
</html>