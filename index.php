<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            session_start();   
            $login = $_SESSION['login'];
            
            include("vues/v_entete.php") ;
            require_once("util/class.PDO.Ionis.inc.php");

            if(!isset($_REQUEST['uc']))
                 $uc = 'accueil';
            else
                    $uc = $_REQUEST['uc'];
            //Utile lors de l'utilisation de la base de données
            $pdo = PdoIonis::getPdoIonis();	 	 

            switch($uc)
            {
                case 'accueil':
                {
                    include("vues/v_bandeau.php");
                    include("vues/v_accueil.php");
                    break;            
                }

                case 'voirProduits' :
                {
                    include("vues/v_bandeau.php");
                    include("vues/v_afficheProduits.php");  
                    break;
                }

                case 'administrer' :
                {
                    include("vues/v_bandeau.php") ;
                    if(!isset($_SESSION['login'])&& (!isset($_SESSION['passwd'])))
                    {        
                        include("vues/v_connexion.php");  
                    }
                    else
                    {
                        include("vues/v_voirProduits.php");  
                    }
                    break;
                }

                case  'deconnexion':
                {
                    include("vues/v_bandeau.php") ;
                    session_unset();
                    echo 'Déconnexion réussie';
                    break;
                }

                case 'modifier':
                {
                    include("vues/v_bandeauAdmin.php") ;
                    $id=$_GET['cleP'];
                    $unProduit=$pdo->afficheProduit($id); 
                    include 'vues/v_modif.php';
                    break;
                 }

                case 'modification':
                {
                    include("vues/v_bandeauAdmin.php") ;
                    $id=$_REQUEST['id'];
                    $libelle=$_POST['libelle'];
                    $prix=$_POST['prix'];
                    $description=$_POST['description'];
                    $tva=$_POST['tva'];
                    $photo=$_POST['photo'];
                    $login=$_SESSION['login'];

                    $res=$pdo->modifProduit($id, $libelle, $prix, $description, $tva, $photo);
                    
                    
                    if($res)
                    {
                        echo 'Modification pris en compte';
                        echo $login; 
                        include("vues/v_voirProduits.php");  
                    }
                    else
                    {
                        echo 'Erreur modification ';
                        include("vues/v_erreur.php");  
                    }
                    break;
                }

                case 'suppression':
                {
                    include("vues/v_bandeauAdmin.php") ;
                    $id=$_REQUEST['cleP'];
                    $res=$pdo->suppProduit($id);
                    if($res)
                    {
                        echo 'Suppression effectué';
                        include("vues/v_voirProduits.php");  
                    }
                    else 
                    {
                        echo 'Erreur suppression';
                        include("vues/v_erreur.php");  
                    }
                    break;
                }

                case 'ajouter':
                {
                    include("vues/v_bandeauAdmin.php") ;
                    include 'vues/v_ajout.php';
                    break;
                }

                case 'insertion':
                {
                    include("vues/v_bandeauAdmin.php") ;
                    if(!isset($_REQUEST['ajouter']))
                    {
                        $id=$_REQUEST['id'];
                        $libelle=$_POST['libelle'];
                        $prix=$_POST['prix'];
                        $quantite = $_POST['quantite'];
                        $description=$_POST['description'];
                        $tva=$_POST['tva'];
                        $photo=$_POST['photo'];
                        $res=$pdo->ajoutProduit($id,$libelle,$prix, $quantite, $description, $tva, $photo);
                        include("vues/v_voirProduits.php");                        
                    }
                    break;
                }

                case 'connexion' :
                {
                    include("vues/v_bandeauAdmin.php") ;
                    $login=$_POST['login'];
                    $passwd=$_POST['passwd'];

                    $res=$pdo->log($login,$passwd);
                    if ($res == 0)
                    {
                          include("vues/v_erreur.php");                   
                    }
                    else
                    {
                        $_SESSION['login']=$login;
                        $_SESSION['passwd']=$passwd;
                          include("vues/v_voirProduits.php");                         
                    }                      
                    break;
                }
                    
                case 'login_espace':
                {
                    include("vues/v_bandeau.php") ;
                    if(!isset($_SESSION['login'])&& (!isset($_SESSION['passwd'])))
                    {        
                        include("vues/v_connexionEspace.php");  
                    }
                    else
                    {
                        include("vues/v_voirEspace.php");  
                    }
                    break;
                }
                
                case 'connexion_espace':
                {
                    include("vues/v_bandeau.php") ;
                    $login=$_POST['login'];
                    $mdp=$_POST['passwd'];

                    $res=$pdo->loginUtilisateur($login,$mdp);
                    if ($res == 0)
                    {
                          include("vues/v_erreur.php");                   
                    }
                    else
                    {
                        $_SESSION['login']=$login;
                        $_SESSION['passwd']=$mdp;
                        include("vues/v_voirEspace.php"); 
                    }                      
                    break;  
                }
            }
            include("vues/v_pied.php");
            ?>
    </body>
</html>
