<html>
<br>
<form name="modification" action="index.php?uc=modification" method="POST">
  <table border="0" align="center" cellspacing="10" cellpadding="10">
    <tr align="center">
      <td>ID</td>
      <td><input type="text" name="id" value="<?php echo $unProduit['id'] ;?>" readonly="readonly"></td>
    </tr>
    <tr align="center">
      <td>Libellé</td>
      <td><input type="text" name="nom" value="<?php echo $unProduit['libelle'] ;?>"></td>
    </tr>
    <tr align="center">
      <td>Prix</td>
      <td><input type="text" name="prenom" value="<?php echo $unProduit['prix'] ;?>"></td>
    </tr>
        <tr align="center">
      <td>Quantité</td>
      <td><input type="text" name="mdp" value="<?php echo $unProduit['quantite'] ;?>"></td>
    </tr>
    <tr align="center">
      <td>Description</td>
      <td><input type="text" name="adresse_mail" value="<?php echo $unProduit['description'] ;?>"></td>
    </tr>
    <tr align="center">
      <td>TVA</td>
      <td><input type="text" name="niveau_etude" value="<?php echo $unProduit['tva'] ;?>"></td>
    </tr>
    <tr align="center">
      <td>PHOTO</td>
      <td><input type="file" name="photo" /></td>
    </tr>
    <tr align="center">
      <td colspan="2"><input type="submit" value="modifier"></td>
    </tr>
  </table>
</form>
</html>

