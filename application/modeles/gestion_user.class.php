<?php

class GestionUser{
    
// <editor-fold defaultstate="collapsed" desc="Champs statiques">

    /**
     * Objet de la classe PDO
     * @var PDO
     */
    private static $pdoCnxBase = null;

    /**
     * Objet de la classe PDOStatement
     * @var PDOStatement
     */
    private static $pdoStResults = null;
    private static $requete = ""; //texte de la requête
    private static $resultat = null; //résultat de la requête

// </editor-fold>

/**
     * Permet de se connecter à la base de données
     */
    public static function seConnecter() {

        if (!isset(self::$pdoCnxBase)) { //S'il n'y a pas encore eu de connexion
            try {
                self::$pdoCnxBase = new PDO('mysql:host=' . MysqlConfig::SERVEUR . ';dbname=' . MysqlConfig::BASE, MysqlConfig::UTILISATEUR, MysqlConfig::MOT_DE_PASSE);
                self::$pdoCnxBase->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //méthode de la classe PDO
                self::$pdoCnxBase->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ); //méthode de la classe PDO
                self::$pdoCnxBase->query("SET CHARACTER SET utf8"); //méthode de la classe PDO
            } catch (Exception $e) {
                // l’objet pdoCnxBase a généré automatiquement un objet de type Exception
                echo 'Erreur : ' . $e->getMessage() . '<br />'; // méthode de la classe Exception
                echo 'Code : ' . $e->getCode(); // méthode de la classe Exception
            }
        }
    }

    
    public static function getLesUtilisateurs(){
        self::seConnecter();
        self::$requete = "select * from utilisateur";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->execute();
        self::$resultat = self::$pdoStResults->fetchAll();
        self::$pdoStResults->closeCursor();
        return self::$resultat;
    }

    public static function getInfoUserByLogin($login) {
        self::seConnecter();

        self::$requete = "select * from utilisateur where login=:login";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->bindValue('login', $login);
        self::$pdoStResults->execute();
        self::$resultat = self::$pdoStResults->fetch();

        self::$pdoStResults->closeCursor();

        return self::$resultat;
    }

    public static function verifLogin($login,$id){
        self::seConnecter();
        self::$requete = "select * from utilisateur where login=:login AND id NOT IN (SELECT id FROM utilisateur WHERE id=:id)";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->bindValue('login', $login);
        self::$pdoStResults->bindValue('id', $id);
        self::$pdoStResults->execute();
        self::$resultat = self::$pdoStResults->fetch();
        self::$pdoStResults->closeCursor();
        if(self::$resultat){
            return true;
        }
        else{
            return false;
        }
    }

    public static function verifEmail($email,$id){
        self::seConnecter();
        self::$requete = "select * from utilisateur where email=:email AND id NOT IN (SELECT id FROM utilisateur WHERE id=:id)";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->bindValue('email', $email);
        self::$pdoStResults->bindValue('id', $id);
        self::$pdoStResults->execute();
        self::$resultat = self::$pdoStResults->fetch();
        self::$pdoStResults->closeCursor();
        if(self::$resultat){
            return true;
        }
        else{
            return false;
        }
    }

    public static function selectMaxIdUtilisateur() {
        self::seConnecter();
        self::$requete = "select max(id) as max from utilisateur";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->execute();
        self::$resultat = self::$pdoStResults->fetch();
        self::$pdoStResults->closeCursor();
        return self::$resultat->max;
    }

    public static function inscriptionUser($login, $passe, $email, $isAdmin){
        GestionBoutique::seConnecter();
        self::$requete = "insert into utilisateur(id, login, passe, email, isAdmin) values(:id, :login, :passe, :email, $isAdmin)";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->bindValue('id', self::selectMaxIdUtilisateur()+1);
        self::$pdoStResults->bindValue('login', $login);
        self::$pdoStResults->bindValue('passe', $passe);
        self::$pdoStResults->bindValue('email', $email);
        self::$pdoStResults->execute();
    }

    public static function supprimerUtilisateur($id){
        self::seConnecter();
        self::$requete = "delete from utilisateur where id = :id";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->bindValue('id', $id);
        self::$pdoStResults->execute();
    }

    public static function modifierUtilisateur($id, $login, $passe, $email){
        self::seConnecter();
        self::$requete = "update utilisateur set login = :login, passe = :passe, email = :email where id = :id";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->bindValue('id', $id);
        self::$pdoStResults->bindValue('login', $login);
        self::$pdoStResults->bindValue('passe', $passe);
        self::$pdoStResults->bindValue('email', $email);
        self::$pdoStResults->execute();
    }

    public static function AdminToUtilisateur($id){
        self::seConnecter();
        self::$requete = "update utilisateur set isAdmin = 0 where id = :id";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->bindValue('id', $id);
        self::$pdoStResults->execute();
    }

    public static function UtilisateurToAdmin($id){
        self::seConnecter();
        self::$requete = "update utilisateur set isAdmin = 1 where id = :id";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->bindValue('id', $id);
        self::$pdoStResults->execute();
    }

}


?>