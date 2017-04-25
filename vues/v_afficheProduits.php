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
            <td>Libelle</td>
            <td>Prix</td>
            <td>Quantité</td>
            <td>Description</td>
            <td>TVA</td>
            <td>Photo</td>
        </tr>
        <?php
        $_POST['ListeV'] = $pdo->getLesProduits();
        foreach ($_POST['ListeV'] as $val => $unProduit) {
            echo"<tr>";
            echo "<td>$unProduit[0]</td>";
            echo "<td>$unProduit[1]</td>";
            echo "<td>$unProduit[2]</td>";
            echo "<td>$unProduit[3]</td>";
            echo "<td>$unProduit[4]</td>";
            echo "<td>$unProduit[5]</td>";
            echo "<td>$unProduit[6]</td>";
            echo "<td><img src=images/$unProduit[7] alt=$unProduit[7] title=images/$unProduit[7] width='200' height='150'/></td>";
            echo "</tr>";
        }
        ?>
    </table> 
</body>
</html>