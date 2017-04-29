<?php
session_start();
?>
<br>
<br>
<br>
<div>
    Bienvenue <?php echo $_SESSION[login];?>, vous pouvez pleinement utiliser l'application :)
</div>

<br>
<br>
<br>
<form name="formulaire" action="index.php?uc=connexion" method="post">
    </br>
    Identifiant : <input type="text" name="login"></br>
    Mot de passe : <input type="password" name="passwd"></br>
    </br>
    <input type="submit" value="Connexion">
</form>
