<?php
session_start();
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <br>
    <br>
    <table width='70%' border='1px' height='90' align='center'>
        <tr>
            <td>Numero</td>
            <td>SKU</td>
            <td>Libelle</td>
            <td>Prix</td>
            <td>Quantité</td>
            <td>Description</td>
            <td>TVA</td>
            <td>Login</td>
            <td>Etat</td>
            <td>Date</td>
            <td>Photo</td>
        </tr>
        <?php
        $_POST['ListeV'] = $pdo->getLesProduits();
        foreach ($_POST['ListeV'] as $val => $unProduit) {
            echo"<tr>";
            echo "<td>$unProduit[id]</td>";
            echo "<td>$unProduit[sku]</td>";
            echo "<td>$unProduit[libelle]</td>";
            echo "<td>$unProduit[prix]</td>";
            echo "<td>$unProduit[quantite]</td>";
            echo "<td>$unProduit[description]</td>";
            echo "<td>$unProduit[tva]</td>";
            echo "<td>$unProduit[login]</td>";
            echo "<td>$unProduit[etat]</td>";
            echo "<td>$unProduit[date]</td>";
            echo "<td><img src=images/$unProduit[7] alt=$unProduit[7] title=images/$unProduit[7] width='200' height='150'/></td>";
            echo "</tr>";
        }
        ?>
    </table> 
</body>
</html>