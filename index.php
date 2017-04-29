<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $login = null;

        include("vues/v_entete.php");
        require_once("util/class.PDO.Ionis.inc.php");

        if (!isset($_REQUEST['uc']))
            $uc = 'accueil';
        else
            $uc = $_REQUEST['uc'];
        //Utile lors de l'utilisation de la base de données
        $pdo = PdoIonis::getPdoIonis();

        switch ($uc) {
            case 'accueil': {
                    if (!isset($_SESSION['login']) && (!isset($_SESSION['passwd']))) {
                        include("vues/v_bandeau.php");
                        include("vues/v_accueil.php");
                    } else {
                        include("vues/v_bandeauAdmin.php");
                        include("vues/v_accueil.php");
                    }
                    break;
                }

            case 'voirProduits' : {

                    if (!isset($_SESSION['login']) && (!isset($_SESSION['passwd']))) {
                        include("vues/v_bandeau.php");
                        include("vues/v_afficheProduits.php");
                    } else {
                        include("vues/v_bandeauAdmin.php");
                        include("vues/v_afficheProduits.php");
                        $var = $pdo->getLesProduits();
                        var_dump($var);
                        $res = $pdo -> addConsultation($_SESSION['login'], json_encode($var));
                    }
                    break;
                }

            case 'administrer' : {

                    if (!isset($_SESSION['login']) && (!isset($_SESSION['passwd']))) {
                        include("vues/v_bandeau.php");
                        include("vues/v_connexion.php");
                    } else {
                        include("vues/v_bandeauAdmin.php");
                        include("vues/v_voirProduits.php");
                    }
                    break;
                }

            case 'deconnexion': {
                    include("vues/v_bandeau.php");
                    session_unset();
                    echo 'Déconnexion réussie';
                    break;
                }

            case 'modifier': {
                    if (!isset($_SESSION['login']) && (!isset($_SESSION['passwd']))) {
                        include("vues/v_bandeauAdmin.php");
                        include 'vues/v_connexion';
                    } else {
                        include("vues/v_bandeauAdmin.php");
                        $id = $_GET['cleP'];
                        $login = $_SESSION['login'];
                        $unProduit = $pdo->afficheProduit($id);
                        include 'vues/v_modif.php';
                    }
                    break;
                }

            case 'modification': {
                    include("vues/v_bandeauAdmin.php");
                    $id = $_REQUEST['id'];
                    $libelle = $_REQUEST['libelle'];
                    $prix = $_REQUEST['prix'];
                    $description = $_REQUEST['description'];
                    $quantite = $_REQUEST['quantite'];
                    $tva = $_REQUEST['tva'];
                    $photo = $_REQUEST['photo'];
                    $login = $_SESSION['login'];

                    $res = $pdo->modifProduit($id, $libelle, $prix, $quantite, $description, $tva, $photo, $login);

                    if ($res) {
                        echo 'Modification pris en compte';
                        include("vues/v_voirProduits.php");
                    } else {
                        echo 'Erreur modification ';
                        include("vues/v_erreur.php");
                    }
                    break;
                }

            case 'suppression': {
                    include("vues/v_bandeauAdmin.php");
                    $id = $_REQUEST['cleP'];
                    $res = $pdo->suppProduit($id);
                    if ($res) {
                        echo 'Suppression effectué';
                        //include("vues/v_voirProduits.php");
                    } else {
                        echo 'Erreur suppression';
                        include("vues/v_erreur.php");
                    }
                    break;
                }

            case 'ajouter': {
                    include("vues/v_bandeauAdmin.php");

                    if (!isset($_SESSION['login']) && (!isset($_SESSION['passwd']))) {
                        include("vues/v_connexion.php");
                    } else {
                        include 'vues/v_ajout.php';
                    }
                    break;
                }

            case 'insertion': {
                    include("vues/v_bandeauAdmin.php");
                    if (!isset($_REQUEST['ajouter'])) {
                        $id = $_REQUEST['id'];
                        $libelle = $_POST['libelle'];
                        $prix = $_POST['prix'];
                        $quantite = $_POST['quantite'];
                        $description = $_POST['description'];
                        $tva = $_POST['tva'];
                        $photo = $_POST['photo'];
                        $login = $_SESSION['login'];
                        $res = $pdo->ajoutProduit($id, $libelle, $prix, $quantite, $description, $tva, $photo, $login);
                        include("vues/v_accueil.php");
                    }
                    break;
                }

            case 'connexion' : {
                    include("vues/v_bandeauAdmin.php");
                    $login = $_POST['login'];
                    $passwd = $_POST['passwd'];

                    $res = $pdo->log($login, $passwd);
                    if ($res == 0) {
                        include("vues/v_erreur.php");
                    } else {
                        $_SESSION['login'] = $login;
                        $_SESSION['passwd'] = $passwd;
                        include("vues/v_voirProduits.php");
                    }
                    break;
                }


            case 'rechercher' : {
                    include("vues/v_bandeauAdmin.php");
                    include("vues/v_recherche.php");
                    break;
                }

            case 'rechercher_id_produit' : {
                    include("vues/v_bandeauAdmin.php");
                    $id = $_POST['id'];
                    $unProduit = $pdo->afficheProduit($id);
                    include("vues/v_afficheUnProduitId.php");
                    break;
                }

            case 'rechercher_nom_produit' : {
                    include("vues/v_bandeauAdmin.php");
                    $nom = $_POST['nom'];
                    $lesProduits = $pdo->afficheProduitParNom($_POST['nom']);
                    include("vues/v_afficheProduitParNom.php");
                    break;
                }
        }
        include("vues/v_pied.php");
        ?>
    </body>
</html>
