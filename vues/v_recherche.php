<?php
session_start();
?>
<div>Recherche d'un produit </div>
<form method="POST" action="index.php?uc=rechercher_nom_produit">
    <label for="nom">Nom du produit :</label>
    <input type="text" name="nom" size=14 id="1">
    <input name="submit" type="submit" value="Entrer" /> 
</form>
<br>
<form method="POST" action="index.php?uc=rechercher_id_produit">
    <label for="id">Identifiant du produit :</label>
    <input type="text" name="id" size=14 id="1">
    <input name="submit" type="submit" value="Entrer" /> 
</form>