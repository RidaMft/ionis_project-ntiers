<?php
class PdoIonis
{   		
      	private static $serveur='mysql:host=localhost';
      	private static $bdd='dbname=archi_ntiers';   		
      	private static $user='root' ;    		
      	private static $mdp='root' ;	
		private static $monPdo;
		private static $monPdoIonis = null;
/**
 * Constructeur privé, crée l'instance de PDO qui sera sollicitée
 * pour toutes les méthodes de la classe
 */				
	private function __construct()
	{
    		PdoIonis::$monPdo = new PDO(PdoIonis::$serveur.';'.PdoIonis::$bdd, PdoIonis::$user, PdoIonis::$mdp); 
			PdoIonis::$monPdo->query("SET CHARACTER SET utf8");
	}
	public function _destruct(){
		PdoIonis::$monPdo = null;
	}
/**
 * Fonction statique qui crée l'unique instance de la classe
 *
 * Appel : $instancePdoIonis = PdoIonis::getPdoIonis();
 * @return l'unique objet de la classe PdoIonis
 */
	public  static function getPdoIonis()
	{
		if(PdoIonis::$monPdoIonis == null)
		{
			PdoIonis::$monPdoIonis=new PdoIonis();
		}
		return PdoIonis::$monPdoIonis;  
	}
        
	public function getLesProduits()
	{
		$req = "select * from produit";
                $res=  PdoIonis::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}

	public function getLesProduitsDuTableau($lesid)
	{
		$nbProduits = count($lesid);
		$lesProduits=array();
		if($nbProduits != 0)
		{
                    foreach($lesid as $id)
                    {
                        $req = "select * from produit where id = '$id'";
                        $res=  PdoIonis::$monPdo->query($req);
                        $unProduit = $res->fetch();
                        $lesProduits[] = $unProduit;
                    }
		}
		return $lesProduits;
	}
        
       
        public function ajoutProduit($id,$libelle, $prix, $quantite, $description, $tva, $photo)
        {
              $sql = "INSERT  INTO produit (libelle, prix, quantite, description, tva, photo)
                        VALUES ('$libelle', $prix, $quantite, '$description', '$tva','$photo')";

              $res = PdoIonis::$monPdo->query($sql);
              echo $sql;
              //affichage des résultats, pour savoir si l'insertion a marchée:
              if($res)
              {
                  echo'<html><body><br>';
                  echo("L'insertion a été correctement effectuée") ;
                  echo'<br></body></html>';
              }
              else
              {
                echo("L'insertion a  échoué") ;
              }
              return $res;
        }
        public function modifProduit($id,$libelle, $prix, $quantite, $description, $tva, $photo)
        {
            $req = "UPDATE produit SET 
                    id = '$id',
                    libelle = '$libelle',
                    quantite = $quantite ,
                    prix = $prix,
                    description = '$description',
                    tva = '$tva',
                    photo = '$photo',
                    WHERE id = '$id'" ;
            $res=PdoIonis::$monPdo->query($req);
            echo $req;
            return $res;
        }
        
        public function afficheProduit($id)
        {
            $req = "select * from produit where id = '$id'";
            $res =  PdoIonis::$monPdo->query($req);
            $unProduit = $res->fetch();
            return $unProduit;          
        }
        
        public function suppProduit($id)
        {
            $req = "delete from produit where id ='$id'";
            $res =  PdoIonis::$monPdo->query($req);
            return $res;            
        }

        public function log($login,$passwd)
        {
            $req = "select count(*) as nb from utilisateur where login = '$login' and mdp = '$passwd'";
            $res =  PdoIonis::$monPdo->query($req);
            $ligne = $res->fetch();
            $nb=$ligne['nb'];
            return $nb;    
        }
        
        public function loginEspace($login,$mdp)
        {
            $req = "select count(*) as nb from utilisateur where login = '$login' and mdp = '$mdp'";
            $res =  PdoIonis::$monPdo->query($req);
            $ligne = $res->fetch();
            $nb = $ligne['nb'];
            return $nb;    
        }
        
        public function getUnUtilisateur($login)
	{
            $req = "select * from utilisateur where login ='$login";
            $res =  PdoIonis::$monPdo->query($req);
            $lesLignes = $res->fetchAll();
            return $lesLignes;
	}
}
?>
