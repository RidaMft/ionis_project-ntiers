<html>
     
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<br>
<br>
<li><a href=index.php?uc=ajouter>Ajouter un produit</a></li>
<br>
<table width='85%' border='1px' height='90' align='center'>
  <tr>
    <td>Numero</td>
    <td>Libelle</td>
    <td>Prix</td>
    <td>Quantité</td>
    <td>Description</td>
    <td>TVA</td>
    <td>Photo</td>
    <td>Modifier</td>
    <td>Supprimer</td>
  </tr>

 <?php
 $_POST['ListeV']=$pdo->getLesProduits();
 foreach($_POST['ListeV'] as $val => $unProduit)
 {
    echo"<tr>";
        echo "<td>$unProduit[id]</td>";
        echo "<td>$unProduit[libelle]</td>";
        echo "<td>$unProduit[prix]</td>";
        echo "<td>$unProduit[quantite]</td>";
        echo "<td>$unProduit[description]</td>";
        echo "<td>$unProduit[tva]</td>";
        echo "<td><img src=images/$unProduit[photo] alt=$unProduit[photo] title=images/$unProduit[photo] width='200' height='150'/></td>";
        echo "<td> <a href=index.php?uc=modifier&cleP=$unProduit[id]>Modifier</a></td>";
        echo "<td> <a href=index.php?uc=suppression&cleP=$unProduit[id]>Supprimer</a></td>";
    echo "</tr>";  
}
?>

</table> 

</body>

</html>

