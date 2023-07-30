<?php

// Inclusion de la classe MysqlConfig
// à partir de l'emplacement actuel (dossier "modeles")
//require_once '../../configs/mysql_config.class.php';

/**
 * Classe utilitaire de gestion de la Base de Données
 *
 * @author OALBERT
 */
class GestionBoutique {
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
// <editor-fold defaultstate="collapsed" desc="Méthodes statiques">

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

    public static function seDeconnecter() {
        self::$pdoCnxBase = null;
        //si on n'appelle pas la méthode, la déconnexion a lieu en fin de script
    }

    /**
     * Vérifie si l'utilisateur est un administrateur présent dans la base
     * @param type $login Login de l'utilisateur
     * @param type $passe Passe de l'utilisateur
     * @return type Booléen
     */
    public static function isAdminOK($login, $passe) {
        self::seConnecter();

        self::$requete = "SELECT * FROM Utilisateur where login=:login and passe=:passe";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->bindValue('login', $login);
        self::$pdoStResults->bindValue('passe', sha1($passe));
        self::$pdoStResults->execute();
        self::$resultat = self::$pdoStResults->fetch();

        self::$pdoStResults->closeCursor();

        if ((self::$resultat != null) and ( self::$resultat->isAdmin))
            return true;
        else
            return false;
    }

    /**
     * Vérifie si l'utilisateur et le mot de passe sont bon
     * @param type $login Login de l'utilisateur
     * @param type $passe Passe de l'utilisateur
     * @return type Booléen
     */
    public static function isUserOK($login, $passe) {
        self::seConnecter();

        self::$requete = "SELECT * FROM Utilisateur where login=:login and passe=:passe";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->bindValue('login', $login);
        self::$pdoStResults->bindValue('passe', sha1($passe));
        self::$pdoStResults->execute();
        self::$resultat = self::$pdoStResults->fetch();

        self::$pdoStResults->closeCursor();

        if (self::$resultat != null)
            return true;
        else
            return false;
    }

    /**
     * Retourne la liste des Catégories
     * @return type Tableau d'objets
     */
    public static function getLesCategories() {
        return self::getLesTuplesByTable("Categorie");
    }

        /**
     * Retourne la liste des Catégories
     * @return type Tableau d'objets
     */
    public static function getLesMarques() {
        return self::getLesTuplesByTable("marque");
    }

    /**
     * Retourne la liste des Produits
     * @return type Tableau d'objets
     */
    public static function getLesProduits() {
        return self::getLesTuplesByTable("produit");
    }

    /**
     * Retourne la liste des produits d'une catégorie donnée
     * @param type $libelleCategorie Libellé de la catégorie
     * @return type
     */
    public static function getLesProduitsByCategorie($libelleCategorie) {
        self::seConnecter();

        self::$requete = "SELECT * FROM Produit P,Categorie C where P.idCategorie = C.id AND libelle = :libCateg";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->bindValue('libCateg', $libelleCategorie);
        self::$pdoStResults->execute();
        self::$resultat = self::$pdoStResults->fetchAll();

        self::$pdoStResults->closeCursor();

        return self::$resultat;
    }

    /**
     * Retourne la liste des produits d'une marque donnée
     * @param type $libelleMarque Libellé de la marque
     * @return type
     */
    public static function getLesProduitsByMarqueOrderByPrixDesc($libelleMarque) {
        self::seConnecter();

        self::$requete = "SELECT * FROM Produit P,Marque M where P.idMarque = M.id AND libelleMarque = :libMarque ORDER BY prix DESC";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->bindValue('libMarque', $libelleMarque);
        self::$pdoStResults->execute();
        self::$resultat = self::$pdoStResults->fetchAll();

        self::$pdoStResults->closeCursor();

        return self::$resultat;
    }

    public static function getLesProduitsByCategorieOrderByPrixDesc($libelleCategorie) {
        self::seConnecter();
        self::$requete = "SELECT * FROM Produit P,Categorie C where P.idMarque = C.id AND libelleCat = :libelleCat ORDER BY prix DESC";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->bindValue('libelleCat', $libelleCategorie);
        self::$pdoStResults->execute();
        self::$resultat = self::$pdoStResults->fetchAll();

        self::$pdoStResults->closeCursor();

        return self::$resultat;
    }

    public static function getLesMarquesByCategorie($idCategorie) {
        self::seConnecter();

        self::$requete = "SELECT * FROM marque";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->bindValue('idCat', $idCategorie);
        self::$pdoStResults->execute();
        self::$resultat = self::$pdoStResults->fetchAll();

        self::$pdoStResults->closeCursor();

        return self::$resultat;
    }

    public static function getToutLesProduitsDesCategories() {
        self::seConnecter();

        self::$requete = "SELECT * FROM Produit P,Marque M where P.idMarque = M.id ORDER BY prix DESC";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->execute();
        self::$resultat = self::$pdoStResults->fetchAll();

        self::$pdoStResults->closeCursor();

        return self::$resultat;
    }

    public static function getLesProduitsEtCategorie() {
        self::seConnecter();

        self::$requete = "SELECT * FROM Produit P,Categorie C where P.idCategorie = C.id ORDER BY libelleCat";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->execute();
        self::$resultat = self::$pdoStResults->fetchAll();

        self::$pdoStResults->closeCursor();

        return self::$resultat;
    }

    public static function getLesProduitsEtCategorieEtMarque(){
        self::seConnecter();

        self::$requete = "SELECT * FROM Produit P,Categorie C,Marque M where P.idCategorie = C.id AND P.idMarque = M.id ORDER BY libelleCat";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->execute();
        self::$resultat = self::$pdoStResults->fetchAll();

        self::$pdoStResults->closeCursor();

        return self::$resultat;
    }
    
    /**
     * Retourne LE produit dont l'id est passé en paramètre
     * @param type $idProduit id du produit
     * @return type
     */
    public static function getProduitById($idProduit) {
        self::seConnecter();

        self::$requete = "select * from produit where idProd=:idProd";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->bindValue('idProd', $idProduit);
        self::$pdoStResults->execute();
        self::$resultat = self::$pdoStResults->fetch();

        self::$pdoStResults->closeCursor();

        return self::$resultat;
    }

    public static function getNbProduits() {
        self::seConnecter();

        //self::$requete = "SELECT Count(*) FROM Produit";
        self::$requete = "SELECT Count(*) AS nbProduits FROM Produit";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->execute();
        self::$resultat = self::$pdoStResults->fetch();

        self::$pdoStResults->closeCursor();

        //return self::$resultat;
        return self::$resultat->nbProduits;
    }

    /**
     * Ajoute une ligne dans la table Catégorie     
     * @param type $libelleCateg Libellé de la Catégorie
     */
    public static function ajouterCategorie($idCateg, $libelleCateg) {
        self::seConnecter();
        self::$requete = "insert into Categorie(id, libelleCat) values(:id, :libelle)";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->bindValue('id', $idCateg);
        self::$pdoStResults->bindValue('libelle', $libelleCateg);
        self::$pdoStResults->execute();
    }

    public static function supprimerCategorie($idCateg) {
        self::seConnecter();
        self::$requete = "delete from Categorie where id = :id";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->bindValue('id', $idCateg);
        self::$pdoStResults->execute();
    }

    public static function renommerCategorie($idCateg, $libelleCateg) {
        self::seConnecter();
        self::$requete = "update Categorie SET libelleCat = ('$libelleCateg') where id = :id";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->bindValue('id', $idCateg);
        self::$pdoStResults->execute();
    }

    public static function selectMaxIdCategorie() {
        self::seConnecter();
        self::$requete = "select max(id) as max from Categorie";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->execute();
        self::$resultat = self::$pdoStResults->fetch();
        self::$pdoStResults->closeCursor();
        return self::$resultat->max;
    }

    public static function ajouterProduit($idProd, $ModeleProd, $dateSortie, $PrixProd, $image, $MarqueProd, $CatProd) {
        self::seConnecter();
        self::$requete = "insert into Produit(idProd,modele,dateSortie,prix,image,idMarque,idCategorie) values(:idProd,(:modeleProd),(:dateSortie),(:prixprod),(:image),(:idMarque),(:idCat))";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->bindValue('idProd', $idProd);
        self::$pdoStResults->bindValue('modeleProd', $ModeleProd);
        self::$pdoStResults->bindValue('dateSortie', $dateSortie);
        self::$pdoStResults->bindValue('prixprod', $PrixProd);
        self::$pdoStResults->bindValue('image', $image);
        self::$pdoStResults->bindValue('idMarque', $MarqueProd);
        self::$pdoStResults->bindValue('idCat', $CatProd);
        self::$pdoStResults->execute();
    }

    public static function supprimerProduit($idProd) {
        self::seConnecter();
        self::$requete = "delete from Produit where idProd = :id";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->bindValue('id', $idProd);
        self::$pdoStResults->execute();
    }

    public static function renommerProduit($idProd, $modeleProd) {
        self::seConnecter();
        self::$requete = "update Produit SET modele = ('$modeleProd') where idProd = :id";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->bindValue('id', $idProd);
        self::$pdoStResults->execute();
    }

    public static function selectMaxIdProduit() {
        self::seConnecter();
        self::$requete = "select max(idProd) as max from Produit";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->execute();
        self::$resultat = self::$pdoStResults->fetch();
        self::$pdoStResults->closeCursor();
        return self::$resultat->max;
    }

    private static function getLesTuplesByTable($table) {
        self::seConnecter();

        self::$requete = "select * from $table";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->execute();
        self::$resultat = self::$pdoStResults->fetchAll();

        self::$pdoStResults->closeCursor();

        return self::$resultat;
    }

    private static function getLeTupleTableById($table, $id) {
        self::seConnecter();

        self::$requete = "select * from $table where id=:idTable";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->bindValue('idTable', $id);
        self::$pdoStResults->execute();
        self::$resultat = self::$pdoStResults->fetch();

        self::$pdoStResults->closeCursor();

        return self::$resultat;
    }

//Fonction qui crée un nouvel utilisateur
public static function inscriptionUser($id, $login, $passe, $email, $isAdmin){
    GestionBoutique::seConnecter();
    self::$requete = "insert into utilisateur(id, login, passe, email, isAdmin) values(:id, :login, :passe, :email, $isAdmin)";
    self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
    self::$pdoStResults->bindValue('id', $id);
    self::$pdoStResults->bindValue('login', $login);
    self::$pdoStResults->bindValue('passe', $passe);
    self::$pdoStResults->bindValue('email', $email);
    self::$pdoStResults->execute();
    var_dump(self::$pdoStResults);
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

public static function isEmailOK($email){
    self::seConnecter();
    self::$requete = "select * from utilisateur where email = :email";
    self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
    self::$pdoStResults->bindValue('email', $email);
    self::$pdoStResults->execute();
    self::$resultat = self::$pdoStResults->fetch();
    self::$pdoStResults->closeCursor();
    return self::$resultat;
}

public static function isLoginOk($login){
    self::seConnecter();
    self::$requete = "select * from utilisateur where login = :login";
    self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
    self::$pdoStResults->bindValue('login', $login);
    self::$pdoStResults->execute();
    self::$resultat = self::$pdoStResults->fetch();
    self::$pdoStResults->closeCursor();
    return self::$resultat;
}
// </editor-fold>
}
?>



<?php

header('Content-Type: text/html; charset=UTF-8');
?>