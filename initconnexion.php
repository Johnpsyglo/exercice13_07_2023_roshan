<?php

use MaConnexion as GlobalMaConnexion;

 class MaConnexion{
    /*
    private $nomBaseDeDonnees = "";
    private $motDePasse = "";
    private $nomUtilisateur = "root";
    private $hote = "localhost";
    */
    private $nomBaseDeDonnees;
    private $motDePasse;
    private $nomUtilisateur;
    private $hote;
    private $connexionPDO;

    public function __construct($nomBaseDeDonnees, $motDePasse , $nomUtilisateur , $hote){
        
        $this->nomBaseDeDonnees = $nomBaseDeDonnees;
        $this->motDePasse = $motDePasse;
        $this->nomUtilisateur = $nomUtilisateur;
        $this->hote = $hote;
        
        try {
            $dsn = "mysql:host=$this->hote;dbname=$this->nomBaseDeDonnees;charset=utf8mb4";
            $this->connexionPDO = new PDO($dsn,$this->nomUtilisateur, $this->motDePasse);
            $this->connexionPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connexion reussi";
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }
    
    public function select($table, $column){
        try {
            $requete = "SELECT $column from $table";
            $resultat = $this->connexionPDO->query($requete);
            $resultat = $resultat->fetchAll(PDO::FETCH_ASSOC); //Recupere le resultat de la requete dans un tableau associatif
            return $resultat;
        
        } catch (PDOException $e) {
            echo "Erreur : ".$e->getMessage();
        }    
    }

    public function insertion($idPrenom, $nom, $email, $mots_de_pass){
        try {
            $requete = "INSERT INTO contact (idprenom, nom, email, mots_de_pass) VALUES(:nom, :prenom, :num, :mail, :adresse)";
            $requete_prepare = $this->connexionPDO->prepare($requete);

            $requete_prepare->bindParam(':idprenom',$idprenom,PDO::PARAM_STR);
            $requete_prepare->bindParam(':prenom',$prenom,PDO::PARAM_STR);
            $requete_prepare->bindParam(':num',$num,PDO::PARAM_STR);
            $requete_prepare->bindParam(':mail',$mail,PDO::PARAM_STR);
            $requete_prepare->bindParam(':adresse',$adresse,PDO::PARAM_STR);

            $requete_prepare->execute();
            echo 'insertion reussie';

            return $requete_prepare;
            
        }catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
        }
    }
   
    public function delete($idPrenom,$nom, $email, $mots_de_pass){
        try {
            $requete = "DELETE FROM $table WHERE $id = $cond";
            $resultat = $this->connexionPDO->query($requete);
            $resultat = $resultat->fetchAll(PDO::FETCH_ASSOC); //Recupere le resultat de la requete dans un tableau associatif
            return $resultat;
        
        } catch (PDOException $e) {
            echo "Erreur : ".$e->getMessage();
        }    
    }
    
    public function insertClient($idPrenom,$nom, $email, $mots_de_pass){
        $sql = "INSERT INTO `utilisateur`(`idPrenom`, `nom`, `email`, `mots_de_pass`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]');
        $stmt= $this->connexionPDO->prepare($sql);
        $stmt->execute([$idPrenom, $nom, $email, $mots_de_pass]);
    }
    
    public function miseAJour($table,$column,$newValue,$id){
        try {
        $requete = "UPDATE `utilisateur` SET `idPrenom`='[value-1]',`nom`='[value-2]',`email`='[value-3]',`mots_de_pass`='[value-4]' WHERE 1;
        $this->connexionPDO->exec($requete);
        return "mise a jour reussi";
        } catch (PDOException $e){
            echo "Erreur : ".$e->getMessage();
        }

    }

    public function insert($Table, $Values , $Column)
    {
      try {
          $ToString = '"' . join('","', $Values) . '"'; //Transforme le tableau Values en chaine de character
          $ToString = str_replace('""', "NULL", $ToString); // Remplace les espaces vides du tableau en valeur NULL
          $ColumConv= '(' . join(',', $Column) . ')'; // Transforme le Array contenant les colonnes en un format propice a la requete SQL ( sans string et entre parenthese)
          
         
          $SQLQueryString = "INSERT INTO $Table $ColumConv VALUES ($ToString)";
    
          $Result = $this->connexionPDO->query($SQLQueryString);
          return true;
    
      } catch (PDOException $e) {
          echo "Erreur: " . $e->getMessage();
          
          return false;
      }
    }
 }

 $test = new MaConnexion("disponibilité_des_salles", "", "root", "localhost");
 

?>